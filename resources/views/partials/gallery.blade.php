<!-- partials/gallery.blade.php (Portofolio Klien D'Karsa Multi-Kategori) -->
<section id="portofolio" class="py-20 md:py-28 sec--blush overflow-hidden">
    <div class="max-w-[1200px] mx-auto px-5 md:px-8 flex flex-wrap items-end justify-between gap-6 mb-10">
        <div>
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white border border-pink-200 shadow-sm text-xs font-bold text-ink mb-3">
                <span class="text-brand font-extrabold uppercase tracking-wider text-[11px]">Portofolio Klien</span>
                <span class="text-ink/20">•</span>
                <span class="text-ink2 font-medium">Ulasan Nyata dari Pengguna</span>
            </div>
            <h2 class="font-serif text-2xl sm:text-4xl font-bold text-ink tracking-tight">
                Momen Bahagia yang <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand via-accent to-pink-600 font-extrabold">Telah Terwujud</span>
            </h2>
            <p class="mt-2 text-ink2 text-sm sm:text-base max-w-2xl leading-relaxed">
                Hasil karya undangan digital untuk Pernikahan, Halal Bihalal, Khitanan, Aqiqah, Ulang Tahun, dan Syukuran bersama D'Karsa.
            </p>
        </div>
        <div class="flex items-center gap-3">
            <button type="button" onclick="document.getElementById('galleryMarquee').classList.toggle('dijeda')"
                    class="w-11 h-11 rounded-full bg-white grid place-items-center shadow-sm border border-ink/15 hover:border-brand text-ink hover:text-brand transition"
                    title="Jeda / Putar portofolio">
                ⏸
            </button>
            <a href="{{ route('invitation.create') }}" class="tbl tbl--kedua !h-11 !text-sm">Pesan Undangan Sekarang</a>
        </div>
    </div>

    @php
        $portfolios = [
            [
                'img' => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=600&q=80&auto=format&fit=crop',
                'category' => '💍 Pernikahan',
                'client' => 'Rizky & Amanda',
                'theme' => '3D Javanese Royal',
                'quote' => 'Undangan pernikahannya mewah dan modern! Buku tamu digital & konfirmasi kehadiran real-time sangat memudahkan penerima tamu di gedung.',
                'date' => 'Mei 2026',
            ],
            [
                'img' => 'https://images.unsplash.com/photo-1584551246679-0daf3d275d0f?w=600&q=80&auto=format&fit=crop',
                'category' => '🕌 Halal Bihalal',
                'client' => 'Keluarga Besar Bani Sastro',
                'theme' => 'Green Mosque Harmony',
                'quote' => 'Acara silaturahmi Idul Fitri keluarga jadi jauh lebih praktis. Sebar 250 link nama keluarga via WhatsApp selesai dalam sekejap!',
                'date' => 'April 2026',
            ],
            [
                'img' => 'https://images.unsplash.com/photo-1544717305-2782549b5136?w=600&q=80&auto=format&fit=crop',
                'category' => '✂️ Khitanan',
                'client' => 'M. Rayyan (Bpk. Hendra)',
                'theme' => 'Walimatul Khitan Berkah',
                'quote' => 'Desain syukuran khitan anak kami bernuansa islami dan elegan. Fitur kirim doa dan amplop digital langsung via QRIS sangat memudahkan kerabat.',
                'date' => 'Maret 2026',
            ],
            [
                'img' => 'https://images.unsplash.com/photo-1519689680058-324335c77eba?w=600&q=80&auto=format&fit=crop',
                'category' => '👶 Aqiqah',
                'client' => 'Tasyakuran Baby Dania',
                'theme' => 'Sweet Baby Pastel',
                'quote' => 'Lucu banget tema pastelnya! Foto dedek bayi tampil jernih, musiknya lembut, dan tim D\'Karsa bantu setting sampai tuntas cuma dalam 2 jam.',
                'date' => 'Februari 2026',
            ],
            [
                'img' => 'https://images.unsplash.com/photo-1513151233558-d860c5398176?w=600&q=80&auto=format&fit=crop',
                'category' => '🎂 Ulang Tahun',
                'client' => 'Jessica Olivia (Sweet 17th)',
                'theme' => 'Golden Luxury Birthday',
                'quote' => 'Keren banget undangan digital sweet 17th aku! Teman-teman sekolah pada puji karena ada countdown dan fitur RSVP interaktif.',
                'date' => 'Januari 2026',
            ],
            [
                'img' => 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=600&q=80&auto=format&fit=crop',
                'category' => '🎉 Reuni & Syukuran',
                'client' => 'Alumni SMAN 1 Angkatan 2015',
                'theme' => 'Reuni Akbar Temu Kangen',
                'quote' => 'Sangat membantu rekap peserta reuni akbar. Buku tamu QR Code di pintu masuk bikin registrasi tanpa antre sama sekali.',
                'date' => 'Desember 2025',
            ],
        ];
    @endphp

    {{-- Running Portfolio & Testimonial Poster Marquee --}}
    <div id="galleryMarquee" class="marquee py-2">
        <div class="marquee__jalur">
            @foreach(array_merge($portfolios, $portfolios) as $item)
                <figure onclick="openLightbox('{{ $item['img'] }}')"
                        class="w-[260px] md:w-[295px] shrink-0 cursor-pointer group">
                    <div class="aspect-[3/4] rounded-[24px] overflow-hidden bg-sunk shadow-md relative border border-white/60">
                        <img src="{{ $item['img'] }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-700" alt="Portofolio {{ $item['client'] }}">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#120a0c]/95 via-[#120a0c]/35 to-transparent"></div>
                        <span class="absolute top-3 left-3 px-2.5 py-1 rounded-full bg-white/95 text-[10px] font-extrabold uppercase tracking-wider text-accent shadow-sm flex items-center gap-1">
                            {{ $item['category'] }}
                        </span>
                        <figcaption class="absolute inset-x-0 bottom-0 p-5 text-white">
                            <span class="text-[11px] font-semibold text-white/80 block mb-0.5">{{ $item['theme'] }}</span>
                            <p class="font-serif text-2xl font-semibold leading-tight flex items-center gap-1.5">
                                {{ $item['client'] }}
                                <svg aria-hidden="true" class="w-4 h-4 text-sky-400"><use href="#i-centang-biru"></use></svg>
                            </p>
                            <q class="block text-xs text-white/85 mt-2 leading-relaxed line-clamp-3">
                                {{ $item['quote'] }}
                            </q>
                            <div class="mt-3 pt-2.5 border-t border-white/15 flex items-center justify-between text-[11px] text-white/75">
                                <span class="text-amber-400 tracking-widest">★★★★★</span>
                                <span>{{ $item['date'] }}</span>
                            </div>
                        </figcaption>
                    </div>
                </figure>
            @endforeach
        </div>
    </div>
</section>