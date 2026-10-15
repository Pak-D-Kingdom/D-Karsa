@extends('layouts.app')

@section('title')
    Buat Undangan – Layanan Digital
@endsection

@section('meta_description')
    Isi form berikut untuk memesan undangan digital Anda.
@endsection

@section('content')
    <section class="max-w-3xl mx-auto px-6 py-12">
        <h1 class="font-serif text-3xl md:text-4xl text-center mb-8">Pesan Undangan</h1>
        @if(session('order_success'))
            <div class="bg-green-50 border border-green-200 text-green-800 rounded-xl p-4 mb-6">
                {{ session('order_success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('order.store') }}" class="space-y-5">
            @csrf

            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium text-sm mb-1">Kategori Undangan</label>
                    <select name="type" required class="w-full rounded-xl border-gray-300 p-2">
                        @foreach($types as $key => $label)
                            <option value="{{ $key }}">{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block font-medium text-sm mb-1">Judul / Tema</label>
                    <input type="text" name="title" required class="w-full rounded-xl border-gray-300 p-2">
                </div>
                <div>
                    <label class="block font-medium text-sm mb-1">Tanggal Acara</label>
                    <input type="date" name="event_date" required class="w-full rounded-xl border-gray-300 p-2">
                </div>
                <div>
                    <label class="block font-medium text-sm mb-1">Paket (Plan)</label>
                    <select name="plan" required class="w-full rounded-xl border-gray-300 p-2">
                        <option value="standard">Standard (gratis)</option>
                        <option value="premium">Premium (fitur tambahan)</option>
                    </select>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-4 mt-4">
                <div>
                    <label class="block font-medium text-sm mb-1">Nama Kontak</label>
                    <input type="text" name="contact_name" required class="w-full rounded-xl border-gray-300 p-2">
                </div>
                <div>
                    <label class="block font-medium text-sm mb-1">Email Kontak</label>
                    <input type="email" name="contact_email" required class="w-full rounded-xl border-gray-300 p-2">
                </div>
            </div>

            <div>
                <label class="block font-medium text-sm mb-1">Keterangan / Tema (opsional)</label>
                <textarea name="theme_json" rows="4" class="w-full rounded-xl border-gray-300 p-2" placeholder="Masukkan JSON tema atau catatan tambahan"></textarea>
            </div>

            <button type="submit" class="w-full bg-primary text-cream rounded-full py-3 font-medium hover:bg-primary/80 transition">
                Kirim Pesanan
            </button>
        </form>
    </section>

    @include('partials.footer', ['couple' => (object)['groom_name'=>'','bride_name'=>'']])
@endsection
