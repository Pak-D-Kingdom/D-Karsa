<?php

namespace Tests\Feature;

use App\Models\Couple;
use Tests\TestCase;

class MidtransPaymentTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        config(['database.connections.sqlite.database' => database_path('database.sqlite')]);
        \Illuminate\Support\Facades\DB::purge('sqlite');
        \Illuminate\Support\Facades\DB::reconnect('sqlite');
    }

    /**
     * Test form submission creates couple and redirects to Midtrans Checkout
     */
    public function test_form_submission_creates_couple_and_redirects_to_midtrans_checkout(): void
    {
        $uniquePhone = '0813' . rand(10000000, 99999999);
        $response = $this->post('/buat-undangan', [
            'category' => 'Pernikahan',
            'wedding_date' => '2026-12-25',
            'groom_name' => 'Faris' . rand(100, 999),
            'bride_name' => 'Aulia' . rand(100, 999),
            'customer_name' => 'Faris Aulia',
            'customer_phone' => $uniquePhone,
            'selected_package' => 'Paket Premium',
            'selected_theme' => 'Simple Minimalist Floral',
        ]);

        $couple = Couple::where('customer_phone', $uniquePhone)->first();
        $this->assertNotNull($couple);

        $response->assertRedirect(route('midtrans.checkout', $couple->slug));
        $this->assertEquals('pending', $couple->payment_status);
        $this->assertEquals('pending', $couple->status);
        $this->assertEquals(110000, $couple->amount);
        $this->assertStringStartsWith('INV-DK-', $couple->invoice_number);
    }

    /**
     * Test Midtrans checkout page renders correctly with invoice and pricing
     */
    public function test_midtrans_checkout_page_renders_correctly(): void
    {
        $inv = 'INV-DK-' . strtoupper(uniqid());
        $couple = Couple::create([
            'slug' => 'test-midtrans-couple-' . uniqid(),
            'category' => 'Pernikahan',
            'groom_name' => 'Dimas',
            'groom_fullname' => 'Dimas Anggara',
            'bride_name' => 'Lestari',
            'bride_fullname' => 'Lestari Dewi',
            'customer_name' => 'Dimas',
            'customer_phone' => '08123456789',
            'wedding_date' => '2026-11-20',
            'package_name' => 'Paket Eksklusif',
            'amount' => 180000,
            'invoice_number' => $inv,
            'payment_status' => 'pending',
            'status' => 'pending',
        ]);

        $response = $this->get(route('midtrans.checkout', $couple->slug));

        $response->assertStatus(200);
        $response->assertSee('Midtrans Payment Gateway');
        $response->assertSee($inv);
        $response->assertSee('180.000');
        $response->assertSee('Mode Uji Coba Sandbox Midtrans');
    }

    /**
     * Test Midtrans Sandbox payment simulation immediately activates invitation
     */
    public function test_midtrans_sandbox_simulation_immediately_activates_invitation(): void
    {
        $couple = Couple::create([
            'slug' => 'test-simulation-' . uniqid(),
            'category' => 'Pernikahan',
            'groom_name' => 'Rangga',
            'groom_fullname' => 'Rangga Pratama',
            'bride_name' => 'Cinta',
            'bride_fullname' => 'Cinta Valerie',
            'customer_name' => 'Rangga',
            'customer_phone' => '08111222333',
            'wedding_date' => '2026-11-25',
            'package_name' => 'Paket Basic',
            'amount' => 50000,
            'invoice_number' => 'INV-DK-' . strtoupper(uniqid()),
            'payment_status' => 'pending',
            'status' => 'pending',
        ]);

        $response = $this->post(route('midtrans.simulate', $couple->slug), [
            'method' => 'QRIS / GoPay (Midtrans Sandbox)',
        ]);

        $response->assertRedirect(route('invitation.success', $couple->slug));

        $couple->refresh();
        $this->assertEquals('paid', $couple->payment_status);
        $this->assertEquals('published', $couple->status); // Instantly published without waiting for manual ACC!
        $this->assertNotNull($couple->paid_at);
        $this->assertEquals('QRIS / GoPay (Midtrans Sandbox)', $couple->payment_method);
    }

    /**
     * Test success page displays active celebration when paid
     */
    public function test_success_page_displays_active_state_when_paid(): void
    {
        $couple = Couple::create([
            'slug' => 'test-success-paid-' . uniqid(),
            'category' => 'Pernikahan',
            'groom_name' => 'Gilang',
            'groom_fullname' => 'Gilang Dirga',
            'bride_name' => 'Nadia',
            'bride_fullname' => 'Nadia Saphira',
            'customer_name' => 'Gilang',
            'customer_phone' => '081234567890',
            'wedding_date' => '2026-12-10',
            'package_name' => 'Paket Premium',
            'amount' => 110000,
            'invoice_number' => 'INV-DK-' . strtoupper(uniqid()),
            'payment_status' => 'paid',
            'status' => 'published',
        ]);

        $response = $this->get(route('invitation.success', $couple->slug));

        $response->assertStatus(200);
        $response->assertSee('Undangan Anda Telah Aktif!');
        $response->assertSee('Lunas (Midtrans) - Aktif');
        $response->assertSee('Telah Aktif');
    }

    /**
     * Test Midtrans Webhook Notification updates payment and activates invitation
     */
    public function test_midtrans_webhook_notification_activates_invitation(): void
    {
        $inv = 'INV-DK-' . strtoupper(uniqid());
        $couple = Couple::create([
            'slug' => 'test-webhook-' . uniqid(),
            'category' => 'Pernikahan',
            'groom_name' => 'Bayu',
            'groom_fullname' => 'Bayu Skak',
            'bride_name' => 'Citra',
            'bride_fullname' => 'Citra Kirana',
            'customer_name' => 'Bayu',
            'customer_phone' => '081234567890',
            'wedding_date' => '2026-12-15',
            'package_name' => 'Paket Premium',
            'amount' => 110000,
            'invoice_number' => $inv,
            'payment_status' => 'pending',
            'status' => 'pending',
        ]);

        $response = $this->postJson(route('midtrans.notification'), [
            'order_id' => $inv,
            'transaction_status' => 'settlement',
            'transaction_id' => 'TRX-MTR-998877',
            'payment_type' => 'gopay',
            'gross_amount' => '110000.00',
        ]);

        $response->assertStatus(200);
        $response->assertJson(['status' => 'OK']);

        $couple->refresh();
        $this->assertEquals('paid', $couple->payment_status);
        $this->assertEquals('published', $couple->status);
        $this->assertNotNull($couple->paid_at);
        $this->assertEquals('Midtrans - GOPAY', $couple->payment_method);
    }

    /**
     * Test returning from Midtrans redirect with settlement query marks couple as paid and published
     */
    public function test_midtrans_redirect_return_with_settlement_query_activates_invitation(): void
    {
        $inv = 'INV-DK-' . strtoupper(uniqid());
        $couple = Couple::create([
            'slug' => 'test-redirect-' . uniqid(),
            'category' => 'Pernikahan',
            'groom_name' => 'Fathan',
            'groom_fullname' => 'Fathan Mubarak',
            'bride_name' => 'Aisyah',
            'bride_fullname' => 'Aisyah Putri',
            'customer_name' => 'Fathan',
            'customer_phone' => '081234567890',
            'wedding_date' => '2026-12-20',
            'package_name' => 'Paket Premium',
            'amount' => 110000,
            'invoice_number' => $inv,
            'payment_status' => 'pending',
            'status' => 'pending',
        ]);

        $response = $this->get(route('invitation.success', [
            'slug' => $couple->slug,
            'order_id' => $inv,
            'status_code' => 200,
            'transaction_status' => 'settlement',
            'payment_type' => 'bank_transfer',
        ]));

        $response->assertStatus(200);
        $response->assertSee('Undangan Anda Telah Aktif!');

        $couple->refresh();
        $this->assertEquals('paid', $couple->payment_status);
        $this->assertEquals('published', $couple->status);
        $this->assertNotNull($couple->paid_at);
    }
}
