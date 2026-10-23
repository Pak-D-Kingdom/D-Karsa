<!-- partials/wishes.blade.php (Ulasan & Testimoni Pelanggan D'Karsa) -->
<div id="wishes" class="sel sel--motif !p-4 sm:!p-7 md:!p-9 w-full min-w-0">
    <div class="flex items-center gap-3 mb-6">
        <span class="poin__ikon">
            <svg aria-hidden="true" class="w-5 h-5"><use href="#i-chats-circle"></use></svg>
        </span>
        <div>
            <span class="text-xs font-extrabold uppercase tracking-wider text-accent">Rating 4.9/5.0 ★★★★★</span>
            <h3 class="font-serif text-2xl font-semibold text-ink">Ulasan Pelanggan D'Karsa</h3>
        </div>
    </div>

    @if(session('wish_success'))
        <div class="mb-5 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-2xl px-4 py-3.5 text-sm font-medium">
            ✓ {{ session('wish_success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('invitation.wish') }}" class="space-y-3.5 bg-blush/80 rounded-2xl p-3.5 sm:p-5 border border-brand/15">
        @csrf
        <input name="name" required placeholder="Nama Anda / Nama Pasangan" value="{{ old('name') }}"
               class="w-full rounded-xl border border-ink/15 px-4 py-3 bg-white text-sm font-medium focus:outline-none focus:ring-2 focus:ring-brand/30 focus:border-brand transition">
        <textarea name="message" required rows="2" placeholder="Bagikan pengalaman memesan undangan digital di D'Karsa..."
                  class="w-full rounded-xl border border-ink/15 px-4 py-3 bg-white text-sm focus:outline-none focus:ring-2 focus:ring-brand/30 focus:border-brand transition">{{ old('message') }}</textarea>
        <button type="submit" class="tbl tbl--utama w-full justify-between !pl-6 !h-11 !text-sm">
            <span>Kirim Ulasan &amp; Testimoni</span>
            <span class="tbl__ikon !w-8 !h-8">
                <svg aria-hidden="true" class="w-3.5 h-3.5"><use href="#i-arrow-up-right"></use></svg>
            </span>
        </button>
    </form>

    <div class="mt-6 space-y-3 max-h-[380px] overflow-auto pr-1" id="wishList">
        @forelse($wishes as $w)
            <div class="bg-white border border-ink/10 rounded-2xl p-4 shadow-sm">
                <div class="flex items-center justify-between gap-2">
                    <div class="flex items-center gap-2.5">
                        <div class="w-8 h-8 rounded-full bg-accent-soft text-accent flex items-center justify-center text-xs font-extrabold">
                            {{ strtoupper(substr($w->name, 0, 1)) }}
                        </div>
                        <div>
                            <p class="text-sm font-bold text-ink leading-none flex items-center gap-1">
                                {{ $w->name }}
                                <svg aria-hidden="true" class="w-3.5 h-3.5"><use href="#i-centang-biru"></use></svg>
                            </p>
                            <p class="text-[11px] text-ink3 mt-0.5">{{ $w->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    <span class="text-amber-400 text-xs tracking-widest">★★★★★</span>
                </div>
                <p class="text-sm leading-relaxed mt-2.5 text-ink2 font-serif italic text-[16px]">"{{ $w->message }}"</p>
            </div>
        @empty
            <div class="bg-white border border-ink/10 rounded-2xl p-4 shadow-sm">
                <div class="flex items-center justify-between gap-2">
                    <div class="flex items-center gap-2.5">
                        <div class="w-8 h-8 rounded-full bg-accent-soft text-accent flex items-center justify-center text-xs font-extrabold">L</div>
                        <div>
                            <p class="text-sm font-bold text-ink leading-none flex items-center gap-1">
                                Laras &amp; Bima
                                <svg aria-hidden="true" class="w-3.5 h-3.5"><use href="#i-centang-biru"></use></svg>
                            </p>
                            <p class="text-[11px] text-ink3 mt-0.5">Klien Paket Eksklusif</p>
                        </div>
                    </div>
                    <span class="text-amber-400 text-xs tracking-widest">★★★★★</span>
                </div>
                <p class="text-sm leading-relaxed mt-2.5 text-ink2 font-serif italic text-[16px]">"Desainnya simpel tapi estetik, pengerjaan terima beres juga super cepat! Admin D'Karsa sangat ramah membantu."</p>
            </div>
        @endforelse
    </div>
</div>