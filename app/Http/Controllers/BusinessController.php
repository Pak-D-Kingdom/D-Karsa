<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    /**
     * Landing page – hero + penjelasan layanan.
     */
    public function index()
    {
        $hero = [
            'title'      => 'Undangan Digital',
            'subtitle'   => 'Buat undangan pernikahan, khitan, halal‑bihalal, ulang‑tahun \u0026 lainnya',
            'ctaText'    => 'Pesan Sekarang',
            'ctaLink'    => route('order.create'),
            // jika tidak ada video, gunakan image (letakkan di public/images/hero.jpg)
            'heroImage'  => asset('images/hero.jpg'),
            // explicit null to avoid undefined variable in hero partial
            'heroVideo'  => null,
        ];

        return view('business.landing', compact('hero'));
    }

    /**
     * Tampilkan form pemesanan.
     */
    public function create()
    {
        $types = [
            'wedding'  => 'Pernikahan',
            'khitan'   => 'Khitan',
            'halal'    => 'Halal Bihalal',
            'birthday' => 'Ulang Tahun',
        ];

        return view('business.create', compact('types'));
    }

    /**
     * Simpan order ke database.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'type'          => 'required|in:wedding,khitan,halal,birthday',
            'title'         => 'required|string|max:255',
            'event_date'    => 'required|date',
            'theme_json'    => 'nullable|string',
            'contact_name'  => 'required|string|max:100',
            'contact_email' => 'required|email',
            'plan'          => 'required|string',
        ]);

        Order::create($data + ['status' => 'pending']);

        return redirect()
            ->route('order.index')
            ->with('order_success', 'Pesanan berhasil diterima! Tim kami akan menghubungi Anda dalam 24 jam.');
    }
}
