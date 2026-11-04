{{-- Indeks demo lokal: 179 template × 4 paket, dikelompokkan per bab. --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Demo 179 Template × 4 Paket — D'Karsa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background: #0F0E0D; color: #e7e1de; font-family: ui-sans-serif, system-ui, sans-serif; }
        .serif { font-family: Georgia, 'Times New Roman', serif; }
        a { text-decoration: none; }
        .tier { display: inline-block; padding: 2px 8px; border-radius: 999px; font-size: 10px; font-weight: 700; letter-spacing: .06em; text-transform: uppercase; border: 1px solid rgba(229,193,88,.35); color: #E5C158; }
        .tier:hover { background: #E5C158; color: #141311; }
        .tier.basic { border-color: #34d399; color: #6ee7b7; }
        .tier.basic:hover { background: #34d399; color: #052e1b; }
        .tier.premium { border-color: #60a5fa; color: #93c5fd; }
        .tier.premium:hover { background: #60a5fa; color: #0b1a33; }
        .tier.kustom { border-color: #c084fc; color: #d8b4fe; }
        .tier.kustom:hover { background: #c084fc; color: #240b3a; }
    </style>
</head>
<body class="p-6 sm:p-10">
<header class="max-w-6xl mx-auto mb-8">
    <p class="text-[11px] tracking-[0.3em] uppercase" style="color:#E5C158">D&rsquo;Karsa — Local Demo Index</p>
    <h1 class="serif text-3xl sm:text-4xl mt-1">{{ $total }} template × 4 paket = {{ $total * 4 }} halaman</h1>
    <p class="text-sm mt-2" style="color:#b8ae9a">
        Klik salah satu paket untuk membuka demo. Semua tautan memakai tier di path
        (<code>/demo/{template}/{tier}</code>) sehingga pratinjau langsung memakai desain paket tersebut.
        Tambahkan <code>?to=Nama Tamu&amp;pax=2&amp;seat=VIP-01</code> untuk menguji data tamu.
    </p>
</header>

<main class="max-w-6xl mx-auto space-y-8">
    @foreach($groups as $bab => $items)
        <section>
            <h2 class="serif text-xl mb-3" style="color:#E5C158">{{ $bab }} <span class="text-xs" style="color:#8b8371">({{ count($items) }} template)</span></h2>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-2">
                @foreach($items as $item)
                    <div class="rounded-lg border border-white/10 bg-white/[.03] px-3 py-2">
                        <div class="flex items-center justify-between gap-2">
                            <div class="min-w-0">
                                <p class="text-[13px] font-semibold truncate">{{ $item['name'] }}</p>
                                <p class="text-[11px] truncate" style="color:#8b8371">{{ $item['code'] }} · {{ $item['style'] }} · {{ $item['color'] }}</p>
                            </div>
                            <code class="text-[10px]" style="color:#6b6456">{{ $item['key'] }}</code>
                        </div>
                        <div class="flex flex-wrap gap-1.5 mt-2">
                            @foreach(['basic', 'premium', 'eksklusif', 'kustom'] as $tier)
                                <a class="tier {{ $tier }}" href="{{ url('/demo/' . $item['key'] . '/' . $tier) }}" target="_blank" rel="noopener">{{ $tier }}</a>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endforeach
</main>

<footer class="max-w-6xl mx-auto mt-10 text-[11px]" style="color:#6b6456">
    Jalankan <code>php artisan serve</code> lalu buka <code>{{ url('/demo') }}</code>.
</footer>
</body>
</html>
