{{--
    Kartu ATM Metalik & Kado Fisik — #section-digital-gift.
    Wajib tampil di keenam kategori dan keempat tier; bingkai judul mengikuti kategori.
--}}
@php
    $giftCat = $tj['culture'] ?? 'jawa';
    $gift = match ($giftCat) {
        'birthday' => ['label' => 'Kado Ulang Tahun', 'title' => 'Kado Digital', 'lead' => 'Kehadiran Anda adalah hadiah terindah. Bila ingin menambah kebahagiaan, tanda kasih dapat dikirim ke:'],
        'aqiqah' => ['label' => 'Tali Asih', 'title' => 'Kado & Tali Asih', 'lead' => 'Doa restu Anda adalah anugerah yang tak ternilai. Bila ingin memberikan tanda kasih:'],
        'religious' => ['label' => 'Infaq & Tanda Kasih', 'title' => 'Infaq Digital', 'lead' => 'Doa restu Anda adalah anugerah yang tak ternilai. Bila ingin menyalurkan infaq atau tanda kasih:'],
        'graduate' => ['label' => 'Tanda Kasih Kelulusan', 'title' => 'Kado Digital', 'lead' => 'Terima kasih atas doa dan dukungan Anda. Bila ingin memberikan tanda kasih kelulusan:'],
        'corporate' => ['label' => 'Amplop Digital & Karangan Bunga', 'title' => 'Amplop Digital', 'lead' => 'Bagi relasi atau institusi yang berkenan mengirimkan ucapan selamat secara digital maupun karangan bunga:'],
        default => ['label' => 'Tanda Kasih', 'title' => 'Kado Digital', 'lead' => 'Doa restu Anda adalah anugerah yang tak ternilai. Jika ingin memberikan tanda kasih:'],
    };
    $giftBanks = collect([
        ['name' => $couple->bank_name_1 ?? null, 'account' => $couple->bank_account_1 ?? null, 'holder' => $couple->bank_holder_1 ?? null],
        ['name' => $couple->bank_name_2 ?? null, 'account' => $couple->bank_account_2 ?? null, 'holder' => $couple->bank_holder_2 ?? null],
    ])->filter(fn ($b) => !empty($b['account']));
    if ($giftBanks->isEmpty()) {
        $giftBanks = collect([['name' => 'BCA', 'account' => '0372918291', 'holder' => $couple->groom_name ?? ($couple->host_name ?? 'Mempelai')]]);
    }
    $giftAddress = trim((string) ($couple->gift_address ?? ''));
@endphp

<section id="section-digital-gift" class="px-5 py-10 reveal">
    <div class="card p-6 text-center">
        @include('templates.partials.adat-jawa-corners')
        <span class="label block" style="color: var(--accent-ink);">{{ $gift['label'] }}</span>
        <h2 class="serif text-[1.6rem] mt-1" style="color: var(--ink);">{{ $gift['title'] }}</h2>
        <div class="sec-rule"><span></span><i></i><span></span></div>
        <p class="text-[15px] mt-4 mb-4 leading-relaxed" style="color: var(--soft);">{{ $gift['lead'] }}</p>

        <div class="space-y-3">
            @foreach($giftBanks as $bank)
                <div class="atm-card">
                    <div class="flex items-start justify-between">
                        <div>
                            <span class="atm-label block">Kartu Debit</span>
                            <b class="serif text-[15px] block mt-0.5" style="letter-spacing:.06em;">{{ $bank['name'] }}</b>
                        </div>
                        <span class="atm-label" style="opacity:.9;">GPN</span>
                    </div>
                    <div class="flex items-center justify-between mt-3">
                        {{-- chip EMV emas --}}
                        <svg width="36" height="27" viewBox="0 0 36 27" aria-hidden="true">
                            <rect x="0.8" y="0.8" width="34.4" height="25.4" rx="4.5" fill="{{ $tj['c']['accent2'] }}" opacity=".26"/>
                            <rect x="0.8" y="0.8" width="34.4" height="25.4" rx="4.5" fill="none" stroke="{{ $tj['c']['accent2'] }}" stroke-width="1.3"/>
                            <path d="M0.8 9.2h34.4M0.8 17.8h34.4M12.6 0.8v25.4M23.4 0.8v25.4" stroke="{{ $tj['c']['accent2'] }}" stroke-width="1" opacity=".8"/>
                            <rect x="6" y="6.4" width="24" height="14.2" rx="2" fill="none" stroke="{{ $tj['c']['accent2'] }}" stroke-width="1" opacity=".55"/>
                        </svg>
                        <svg width="20" height="20" viewBox="0 0 20 20" aria-hidden="true" fill="none" stroke="{{ $tj['c']['accent2'] }}" stroke-width="1.4" stroke-linecap="round">
                            <path d="M4 6a6 6 0 0 1 0 8M8 3.5a10 10 0 0 1 0 13M12 1.5a14 14 0 0 1 0 17" opacity=".85"/>
                        </svg>
                    </div>
                    <p class="atm-number mt-3" id="atm-account-number">{{ $bank['account'] }}</p>
                    <div class="flex items-end justify-between mt-3">
                        <div>
                            <span class="atm-label block">Atas Nama</span>
                            <span class="text-[13px] block">{{ $bank['holder'] }}</span>
                        </div>
                        <button type="button" data-copy="{{ $bank['account'] }}" onclick="DKarsaCopyGift(this, 'Nomor Rekening Disalin ✓')"
                                class="btn-copy">
                            Salin Rekening
                        </button>
                    </div>
                </div>
            @endforeach
        </div>

        @if($giftAddress !== '')
            <div class="gift-address mt-4 text-left">
                <span class="label block" style="color: var(--accent-ink);">Kirim Kado Fisik</span>
                <p class="text-[15px] mt-1 leading-relaxed" style="color: var(--soft);">{{ $giftAddress }}</p>
                <button type="button" data-copy="{{ $giftAddress }}" onclick="DKarsaCopyGift(this, 'Alamat Kado Disalin ✓')"
                        class="btn-copy btn-copy--wide mt-3">
                    Salin Alamat Kado 📦
                </button>
            </div>
        @endif
    </div>
</section>

<script>
function DKarsaCopyGift(btn, message) {
    var text = btn.getAttribute('data-copy') || '';
    var done = function () {
        if (window.DKarsaGuest && window.DKarsaGuest.toast) { window.DKarsaGuest.toast(message); }
        var old = btn.textContent;
        btn.textContent = '✓ Tersalin';
        setTimeout(function () { btn.textContent = old; }, 1800);
    };
    if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard.writeText(text).then(done).catch(function () { window.prompt('Salin manual:', text); });
    } else {
        window.prompt('Salin manual:', text);
    }
}
</script>
