<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('couples', function (Blueprint $table) {
            $table->unsignedInteger('amount')->default(0)->after('package_name');
            $table->string('invoice_number')->nullable()->unique()->after('amount');
            $table->string('payment_status')->default('unpaid')->after('invoice_number'); // unpaid, pending, paid, expired, failed
            $table->string('payment_method')->nullable()->after('payment_status'); // QRIS, VIRTUAL_ACCOUNT, etc.
            $table->timestamp('paid_at')->nullable()->after('payment_method');
            $table->text('payment_token')->nullable()->after('paid_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('couples', function (Blueprint $table) {
            $table->dropColumn([
                'amount',
                'invoice_number',
                'payment_status',
                'payment_method',
                'paid_at',
                'payment_token',
            ]);
        });
    }
};
