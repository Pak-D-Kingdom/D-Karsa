{{--
    Kartu E-Ticket & QR Check-In Tamu — #section-guest-qr + #qr-fullscreen-modal.
    Satu partial untuk 6 kategori × 4 tier. Judul, label meja, dan kode template mengikuti $tj['culture'].
    QR digambar inline oleh DKarsaQR (byte mode, ECC-M) — tanpa request gambar eksternal, jadi tidak pernah broken.
--}}
@php
    $catKey = $tj['culture'] ?? 'jawa';
    $pass = match ($catKey) {
        'birthday' => ['tpl' => 'BDY', 'title' => 'VIP Party Access Pass & QR Check-In Tamu', 'sub' => 'AKSES PESTA DIGITAL', 'seatLabel' => 'Zona Pesta / Meja', 'seat' => 'VIP Party Zone - A2'],
        'aqiqah' => ['tpl' => 'AQQ', 'title' => 'Kartu Kehadiran Tasyakuran & QR Buku Tamu', 'sub' => 'REGISTRASI TASYAKURAN', 'seatLabel' => 'Sesi / Meja Tamu', 'seat' => 'Sesi 1 (10.00 WIB) - Reguler'],
        'religious' => ['tpl' => 'REL', 'title' => 'Kartu Registrasi Jamaah / Tamu & QR Kehadiran', 'sub' => 'REGISTRASI JAMAAH', 'seatLabel' => 'Shaf / Area Majelis', 'seat' => 'Area Tamu Undangan - Shaf Utama'],
        'graduate' => ['tpl' => 'GRD', 'title' => 'VIP Commencement & Syukuran Dinner QR Pass', 'sub' => 'AKSES SYUKURAN WISUDA', 'seatLabel' => 'Meja Syukuran / Sesi Foto', 'seat' => 'Meja Keluarga & Sahabat - B1'],
        'corporate' => ['tpl' => 'FRM', 'title' => 'Official VIP Delegate E-Ticket & QR Check-In Pass', 'sub' => 'AKSES DELEGASI RESMI', 'seatLabel' => 'Nomor Kursi / Akses', 'seat' => 'VIP Delegate - Row A Seat 08'],
        default => ['tpl' => 'WED', 'title' => 'E-Ticket Resepsi & QR Buku Tamu Digital', 'sub' => 'AKSES BUKU TAMU DIGITAL', 'seatLabel' => 'Meja / Zona Tamu', 'seat' => 'VIP - Meja Melati 04'],
    };
    $guestName = trim((string) ($guest->name ?? ''));
@endphp

<style>
    #section-guest-qr .qr-ticket-card { position: relative; border-radius: 18px; overflow: hidden; background: var(--surface); color: var(--ink); border: 1px solid var(--line); box-shadow: 0 18px 40px -34px rgba(0,0,0,.8); }
    #section-guest-qr .qr-head { display: flex; align-items: center; justify-content: space-between; gap: 10px; padding: 14px 16px; border-bottom: 1px solid color-mix(in srgb, var(--ink) 12%, transparent); }
    #section-guest-qr .qr-badge { flex: none; padding: 4px 10px; border-radius: 999px; font-size: 10px; font-weight: 700; letter-spacing: .06em; background: color-mix(in srgb, #10b981 18%, transparent); color: color-mix(in srgb, #10b981 72%, var(--ink)); border: 1px solid color-mix(in srgb, #10b981 45%, transparent); }
    /* Quiet zone putih murni + matriks hitam pekat: wajib di semua tema, termasuk Dark Mode. */
    #guest-qr-box { position: relative; width: 188px; height: 188px; padding: 12px; margin: 0 auto; background: #FFFFFF !important; border-radius: 12px; box-shadow: inset 0 0 0 2px rgba(212,175,55,.35), 0 10px 24px -18px rgba(0,0,0,.7); }
    #guest-qr-mount, #modal-guest-qr-mount { width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; }
    #guest-qr-mount svg, #modal-guest-qr-mount svg { width: 100%; height: 100%; display: block; }
    #guest-qr-box .qr-bracket { position: absolute; width: 15px; height: 15px; border: 2px solid #B8860B; }
    .qr-bracket.tl { top: 5px; left: 5px; border-right: 0; border-bottom: 0; }
    .qr-bracket.tr { top: 5px; right: 5px; border-left: 0; border-bottom: 0; }
    .qr-bracket.bl { bottom: 5px; left: 5px; border-right: 0; border-top: 0; }
    .qr-bracket.br { bottom: 5px; right: 5px; border-left: 0; border-top: 0; }
    #section-guest-qr .qr-scan { display: none; position: absolute; left: 12px; right: 12px; height: 2px; top: 12px; border-radius: 2px; background: linear-gradient(90deg, transparent, #D4AF37, transparent); box-shadow: 0 0 10px 2px rgba(212,175,55,.65); }
    #section-guest-qr .qr-notch { position: absolute; top: 50%; transform: translateY(-50%); width: 22px; height: 22px; border-radius: 999px; background: var(--bg); border: 0; box-shadow: 0 0 0 1px color-mix(in srgb, var(--accent) 22%, transparent); }
    #section-guest-qr .qr-notch.left { left: -12px; }
    #section-guest-qr .qr-notch.right { right: -12px; }
    #section-guest-qr .qr-act span[aria-hidden] { font-size: 12px; line-height: 1; }
    #section-guest-qr .qr-meta { padding: 12px; border-radius: 12px; background: color-mix(in srgb, var(--ink) 6%, transparent); border: 1px solid color-mix(in srgb, var(--ink) 10%, transparent); min-width: 0; }
    #section-guest-qr .qr-meta b { display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; margin-top: 2px; font-size: 12px; font-weight: 700; overflow: hidden; }
    #section-guest-qr .qr-meta span { font-size: 9.5px; letter-spacing: .04em; color: color-mix(in srgb, var(--ink) 82%, transparent); }
    #section-guest-qr .qr-act { min-height: 44px; border-radius: 12px; font-size: 11px; font-weight: 700; letter-spacing: .06em; display: flex; align-items: center; justify-content: center; gap: 6px; padding: 0 10px; border: 1px solid color-mix(in srgb, var(--ink) 22%, transparent); background: color-mix(in srgb, var(--ink) 6%, transparent); color: var(--ink); }
    #section-guest-qr .qr-act.primary { background: var(--deep); color: var(--accent-2); border-color: color-mix(in srgb, var(--accent) 60%, transparent); }
    /* ---- Diferensiasi 4 tier pada kartu QR ---- */
    html[data-tier="premium"] #section-guest-qr .qr-ticket-card { border-color: color-mix(in srgb, var(--accent) 55%, transparent); box-shadow: inset 0 0 0 4px color-mix(in srgb, var(--accent) 12%, transparent), inset 0 0 0 5px color-mix(in srgb, var(--accent) 30%, transparent); }
    html[data-tier="eksklusif"] #section-guest-qr .qr-ticket-card,
    html[data-tier="kustom"] #section-guest-qr .qr-ticket-card { border: 1.5px solid color-mix(in srgb, var(--accent) 75%, transparent); background: linear-gradient(150deg, color-mix(in srgb, var(--accent) 14%, var(--surface)) 0%, var(--surface) 42%, color-mix(in srgb, var(--accent) 10%, var(--surface)) 100%); box-shadow: 0 26px 44px -34px rgba(0,0,0,.9), inset 0 0 0 4px color-mix(in srgb, var(--accent) 22%, transparent); }
    html[data-tier="eksklusif"] #section-guest-qr .qr-scan,
    html[data-tier="kustom"] #section-guest-qr .qr-scan { display: block; animation: qrScan 2.9s ease-in-out infinite; }
    html[data-tier="basic"] #section-guest-qr .qr-notch, html[data-tier="basic"] #section-guest-qr .qr-perf { display: none; }
    @keyframes qrScan { 0%, 100% { transform: translateY(0); opacity: .15; } 50% { transform: translateY(160px); opacity: .9; } }
    @media (prefers-reduced-motion: reduce) { #section-guest-qr .qr-scan { animation: none; opacity: .5; } }
    /* ---- Status RSVP: menunggu konfirmasi vs terkonfirmasi ---- */
    #section-guest-qr .qr-stage { position: relative; }
    #section-guest-qr .qr-veil { position: absolute; inset: 0; display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 3px; padding: 14px; text-align: center; border-radius: 14px; background: color-mix(in srgb, var(--surface) 76%, transparent); -webkit-backdrop-filter: blur(3px); backdrop-filter: blur(3px); cursor: pointer; transition: opacity .3s ease; }
    #section-guest-qr .qr-veil b { font-size: 11px; font-weight: 800; letter-spacing: .04em; color: var(--ink); }
    #section-guest-qr .qr-veil span { font-size: 9.5px; color: var(--soft); }
    #section-guest-qr .qr-veil .qr-veil-lock { font-size: 20px; line-height: 1; margin-bottom: 2px; }
    #section-guest-qr .qr-ribbon { display: flex; align-items: center; gap: 6px; margin: 0 16px; padding: 7px 10px; border-radius: 10px; font-size: 9.5px; font-weight: 700; letter-spacing: .08em; text-transform: uppercase; background: color-mix(in srgb, var(--ink) 8%, transparent); color: var(--soft); border: 1px solid color-mix(in srgb, var(--ink) 12%, transparent); }
    #section-guest-qr .qr-ribbon .dot { width: 6px; height: 6px; border-radius: 999px; background: #d97706; box-shadow: 0 0 0 3px rgba(217,119,6,.18); }
    #section-guest-qr .qr-stamp { display: none; position: absolute; left: 50%; top: 50%; z-index: 3; padding: 2px 10px; border: 2px solid #10b981; border-radius: 8px; color: #10b981; font-size: 8px; font-weight: 800; letter-spacing: .16em; transform: translate(-50%, -50%) rotate(-3deg); background: var(--surface); box-shadow: 0 2px 10px -6px rgba(0,0,0,.6); }
    #section-guest-qr:not(.is-confirmed) .qr-badge { background: color-mix(in srgb, #d97706 18%, transparent); color: color-mix(in srgb, #d97706 76%, var(--ink)); border-color: color-mix(in srgb, #d97706 45%, transparent); }
    /* Terkonfirmasi: QR jernih, veil hilang, cap muncul, kartu diberi cincin emas */
    #section-guest-qr.is-confirmed .qr-veil { opacity: 0; pointer-events: none; }
    #section-guest-qr.is-confirmed .qr-stamp { display: block; animation: qrStampIn .45s cubic-bezier(.2, 1.4, .4, 1) both; }
    #section-guest-qr.is-confirmed .qr-ribbon { background: color-mix(in srgb, #10b981 16%, transparent); border-color: color-mix(in srgb, #10b981 45%, transparent); color: color-mix(in srgb, #10b981 78%, var(--ink)); }
    #section-guest-qr.is-confirmed .qr-ribbon .dot { background: #10b981; box-shadow: 0 0 0 3px rgba(16,185,129,.2); }
    #section-guest-qr.is-confirmed .qr-ticket-card { animation: qrCardConfirm 1.1s ease-out 1; }
    @keyframes qrStampIn { from { opacity: 0; transform: translate(-50%, -50%) rotate(-3deg) scale(1.5); } to { opacity: 1; transform: translate(-50%, -50%) rotate(-3deg) scale(1); } }
    @keyframes qrCardConfirm { 0% { box-shadow: 0 0 0 0 rgba(16,185,129,.55); } 100% { box-shadow: 0 18px 40px -34px rgba(0,0,0,.8); } }
    @media (prefers-reduced-motion: reduce) { #section-guest-qr.is-confirmed .qr-stamp, #section-guest-qr.is-confirmed .qr-ticket-card { animation: none; } }
    #qr-fullscreen-modal .qr-modal-card { background: #fff; color: #0f172a; }
    #dkarsa-toast { position: fixed; left: 50%; bottom: 96px; transform: translate(-50%, 8px); z-index: 70; max-width: 320px; padding: 10px 14px; border-radius: 12px; background: rgba(15,23,42,.94); color: #f4efe6; font-size: 11.5px; font-weight: 600; opacity: 0; pointer-events: none; transition: opacity .25s, transform .25s; text-align: center; }

    /* ---- Mobile (≤430px): kepala kartu ditumpuk, isi rapat, tidak ada teks terjepit ---- */
    @media (max-width: 430px) {
        #section-guest-qr .qr-ticket-card { border-radius: 16px; }
        #section-guest-qr .qr-head { flex-direction: column; align-items: flex-start; gap: 7px; padding: 13px 15px 12px; }
        #section-guest-qr .qr-head > div { min-width: 0; width: 100%; }
        #section-guest-qr #qr-ticket-title { font-size: 1rem; line-height: 1.3; }
        #section-guest-qr .qr-badge { font-size: 9px; letter-spacing: .05em; padding: 3px 9px; }
        #section-guest-qr .qr-ribbon { margin: 0 15px; gap: 5px; }
        #section-guest-qr .qr-ribbon #qr-rsvp-state-text { font-size: 9px; letter-spacing: .05em; line-height: 1.35; white-space: normal; }
        #guest-qr-box { width: 172px; height: 172px; padding: 11px; }
        #section-guest-qr .qr-meta { padding: 10px; border-radius: 11px; }
        #section-guest-qr .qr-meta b { font-size: 11.5px; line-height: 1.35; }
        #section-guest-qr .qr-act { font-size: 10px; letter-spacing: .03em; gap: 4px; padding: 0 6px; }
        #section-guest-qr .qr-act span[aria-hidden] { font-size: 11px; }
    }
</style>


<section id="section-guest-qr" class="px-5 py-8 reveal">
    <div class="qr-ticket-card">
        <div class="qr-head">
            <div class="min-w-0 text-left">
                <p id="qr-ticket-subtitle" class="text-[9.5px] tracking-[0.2em] uppercase font-semibold" style="color:var(--soft);opacity:.9;">{{ $pass['sub'] }}</p>
                <h3 id="qr-ticket-title" class="serif text-[1.05rem] leading-tight mt-0.5" style="color:var(--ink);">{{ $pass['title'] }}</h3>
            </div>
            <span id="qr-status-badge" class="qr-badge">⏳ MENUNGGU KONFIRMASI</span>
        </div>

        <div id="qr-rsvp-state" class="qr-ribbon">
            <span class="dot" aria-hidden="true"></span>
            <span id="qr-rsvp-state-text">QR TERKUNCI • KETUK UNTUK KONFIRMASI</span>
        </div>

        <div class="px-5 pt-4 pb-3 text-center">
            <div class="qr-stage">
                <div id="guest-qr-box" aria-label="QR Code Tamu">
                    <span class="qr-bracket tl"></span><span class="qr-bracket tr"></span>
                    <span class="qr-bracket bl"></span><span class="qr-bracket br"></span>
                    <div class="qr-scan" aria-hidden="true"></div>
                    <div id="guest-qr-mount"></div>
                </div>
                <div id="qr-pending-veil" class="qr-veil" role="button" tabindex="0"
                     onclick="DKarsaScrollToRsvp()" onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();DKarsaScrollToRsvp();}">
                    <span class="qr-veil-lock" aria-hidden="true">🔒</span>
                    <b>QR terbit setelah konfirmasi</b>
                    <span>Ketuk untuk mengisi konfirmasi kehadiran</span>
                </div>
            </div>
            <p class="text-[12px] mt-3 mx-auto leading-relaxed" style="color:var(--soft);max-width:17rem;">
                Tunjukkan QR ini kepada petugas penerima tamu di pintu masuk untuk <strong>check-in buku tamu digital</strong>.
            </p>
            <p id="qr-confirmed-at" class="text-[10px] mt-1 hidden" style="color:var(--soft);opacity:.85"></p>
        </div>

        <div class="qr-perf relative flex items-center px-0 py-1">
            <span class="qr-notch left"></span>
            <span class="flex-1 mx-0" style="border-top:2px dashed color-mix(in srgb, var(--ink) 24%, transparent);"></span>
            <span class="qr-notch right"></span>
            <span id="qr-confirmed-stamp" class="qr-stamp" aria-hidden="true">TERKONFIRMASI</span>
        </div>

        <div class="px-5 py-4 grid grid-cols-2 gap-2.5 text-left">
            <div class="qr-meta">
                <span class="text-[9px] uppercase tracking-wider" style="color:var(--soft);">Nama Tamu Undangan</span>
                <b id="qr-guest-name">{{ $guestName !== '' ? $guestName : 'Tamu Kehormatan' }}</b>
            </div>
            <div class="qr-meta">
                <span class="text-[9px] uppercase tracking-wider" style="color:var(--soft);">Kode ID E-Ticket</span>
                <b id="qr-guest-id" class="font-mono">DKR-00000</b>
            </div>
            <div class="qr-meta">
                <span class="text-[9px] uppercase tracking-wider" style="color:var(--soft);">Jumlah Kehadiran</span>
                <b id="qr-guest-pax">2 Orang</b>
            </div>
            <div class="qr-meta">
                <span class="text-[9px] uppercase tracking-wider" style="color:var(--soft);" id="qr-seat-label">{{ $pass['seatLabel'] }}</span>
                <b id="qr-guest-seat">{{ $pass['seat'] }}</b>
            </div>
        </div>

        <div class="px-5 pb-5 grid grid-cols-2 gap-2.5">
            <button type="button" class="qr-act" onclick="DKarsaZoomQR()"><span aria-hidden="true">🔍</span> Perbesar QR</button>
            <button type="button" class="qr-act primary" onclick="DKarsaCopyTicket(this)"><span aria-hidden="true">📋</span> Salin ID Tiket</button>
        </div>
        <div class="px-5 pb-5" id="qr-kustom-actions" hidden>
            <button type="button" class="qr-act w-full" onclick="DKarsaDownloadTicket(this)"><span aria-hidden="true">📥</span> Unduh E-Ticket PNG</button>
        </div>
    </div>
</section>

<div id="qr-fullscreen-modal" class="fixed inset-0 z-[60] hidden items-center justify-center p-6" style="background:rgba(0,0,0,.9);backdrop-filter:blur(6px);-webkit-backdrop-filter:blur(6px);" onclick="if(event.target===this)DKarsaCloseQR()">
    <div class="qr-modal-card rounded-3xl p-6 w-full max-w-[340px] text-center shadow-2xl">
        <span class="inline-block px-3 py-1 rounded-full text-[9px] font-bold tracking-widest uppercase" style="background:#fef3c7;color:#78350f;">Mode Pindai Loket Penerima Tamu</span>
        <h4 id="modal-qr-guest-name" class="text-lg font-extrabold mt-2">Tamu Kehormatan</h4>
        <p id="modal-qr-guest-meta" class="text-[11px] font-mono mt-0.5 mb-4" style="color:#475569;">ID: DKR-00000 • 2 Orang</p>
        <div id="modal-guest-qr-mount" class="w-[240px] h-[240px] mx-auto p-3 bg-white rounded-2xl" style="border:2px solid #e2e8f0;"></div>
        <button type="button" onclick="DKarsaCloseQR()" class="mt-5 w-full min-h-[44px] rounded-xl text-[11px] font-bold tracking-wider uppercase" style="background:#0f172a;color:#fff;">Tutup Layar Penuh ✕</button>
    </div>
</div>

<div id="dkarsa-toast" role="status" aria-live="polite"></div>

<script>
/* ============ QR encoder deterministik (byte mode, ECC-M, v1–15) ============ */
(function (g) {
    'use strict';
    var EC = {1:[10,1,16,0,0],2:[16,1,28,0,0],3:[26,1,44,0,0],4:[18,2,32,0,0],5:[24,2,43,0,0],6:[16,4,27,0,0],7:[18,4,31,0,0],8:[22,2,38,2,39],9:[22,3,36,2,37],10:[26,4,43,1,44],11:[30,1,50,4,51],12:[22,6,36,2,37],13:[22,8,37,1,38],14:[24,4,40,5,41],15:[24,5,41,5,42]};
    var ALIGN = {1:[],2:[6,18],3:[6,22],4:[6,26],5:[6,30],6:[6,34],7:[6,22,38],8:[6,24,42],9:[6,26,46],10:[6,28,50],11:[6,30,54],12:[6,32,58],13:[6,34,62],14:[6,26,46,66],15:[6,26,48,70]};
    var MAXV = 15, EXP = [], LOG = [], i, x;
    for (i = 0, x = 1; i < 256; i++) { EXP[i] = x; LOG[x] = i; x <<= 1; if (x & 0x100) { x ^= 0x11d; } }
    function mul(a, b) { return (a && b) ? EXP[(LOG[a] + LOG[b]) % 255] : 0; }
    function genPoly(n) {
        var gp = [1], j, ng, k;
        for (k = 0; k < n; k++) {
            ng = new Array(gp.length + 1).fill(0);
            for (j = 0; j < gp.length; j++) { ng[j] ^= gp[j]; ng[j + 1] ^= mul(gp[j], EXP[k]); }
            gp = ng;
        }
        return gp;
    }
    function eccBytes(data, n) {
        var gp = genPoly(n), res = new Array(n).fill(0), f, d;
        for (d = 0; d < data.length; d++) {
            f = data[d] ^ res[0];
            res.shift(); res.push(0);
            for (i = 0; i < n; i++) { res[i] ^= mul(gp[i + 1], f); }
        }
        return res;
    }
    function codewords(text) {
        var bytes = [], s = String(text), c, j, cp;
        for (i = 0; i < s.length; i++) {
            c = s.charCodeAt(i);
            if (c < 0x80) { bytes.push(c); }
            else if (c < 0x800) { bytes.push(0xc0 | (c >> 6), 0x80 | (c & 63)); }
            else if (c >= 0xd800 && c <= 0xdbff && i + 1 < s.length) {
                cp = 0x10000 + ((c - 0xd800) << 10) + (s.charCodeAt(++i) - 0xdc00);
                bytes.push(0xf0 | (cp >> 18), 0x80 | ((cp >> 12) & 63), 0x80 | ((cp >> 6) & 63), 0x80 | (cp & 63));
            } else { bytes.push(0xe0 | (c >> 12), 0x80 | ((c >> 6) & 63), 0x80 | (c & 63)); }
        }
        var ver = 1, cap = 0, e;
        for (; ver <= MAXV; ver++) {
            e = EC[ver]; cap = (e[1] * e[2] + e[3] * e[4]) * 8;
            if (4 + (ver < 10 ? 8 : 16) + bytes.length * 8 <= cap) { break; }
        }
        if (ver > MAXV) {
            ver = MAXV; e = EC[ver]; cap = (e[1] * e[2] + e[3] * e[4]) * 8;
            bytes = bytes.slice(0, Math.max(0, Math.floor((cap - 20) / 8)));
        }
        var bits = [];
        function push(v, len) { for (var b = len - 1; b >= 0; b--) { bits.push((v >> b) & 1); } }
        push(4, 4); push(bytes.length, ver < 10 ? 8 : 16);
        for (j = 0; j < bytes.length; j++) { push(bytes[j], 8); }
        push(0, Math.min(4, cap - bits.length));
        while (bits.length % 8) { bits.push(0); }
        var data = [], v, q;
        for (j = 0; j < bits.length; j += 8) { v = 0; for (q = 0; q < 8; q++) { v = (v << 1) | bits[j + q]; } data.push(v); }
        var pad = [0xec, 0x11], pk = 0;
        while (data.length < cap / 8) { data.push(pad[pk++ % 2]); }
        return { ver: ver, data: data };
    }
    function interleave(ver, data) {
        var e = EC[ver], n1 = e[1], d1 = e[2], n2 = e[3], d2 = e[4], eccN = e[0];
        var blocks = [], p = 0, r, out = [], maxD, eccs;
        for (i = 0; i < n1; i++) { blocks.push(data.slice(p, p += d1)); }
        for (i = 0; i < n2; i++) { blocks.push(data.slice(p, p += d2)); }
        eccs = blocks.map(function (b) { return eccBytes(b, eccN); });
        maxD = Math.max(d1, d2);
        for (i = 0; i < maxD; i++) { for (r = 0; r < blocks.length; r++) { if (i < blocks[r].length) { out.push(blocks[r][i]); } } }
        for (i = 0; i < eccN; i++) { for (r = 0; r < eccs.length; r++) { out.push(eccs[r][i]); } }
        return out;
    }
    function formatBits(mask) {
        var data = mask, v = data << 10;
        for (i = 4; i >= 0; i--) { if ((v >> (10 + i)) & 1) { v ^= 0x537 << i; } }
        return (((data << 10) | (v & 0x3ff)) ^ 0x5412) & 0x7fff;
    }
    function versionBits(ver) {
        var v = ver << 12;
        for (i = 5; i >= 0; i--) { if ((v >> (12 + i)) & 1) { v ^= 0x1f25 << i; } }
        return ((ver << 12) | (v & 0xfff)) & 0x3ffff;
    }
    function matrix(text) {
        var cw = codewords(text), ver = cw.ver, size = 17 + 4 * ver, y, xx, j, r, c, bit;
        var m = [], fn = [];
        for (y = 0; y < size; y++) { m.push(new Array(size).fill(0)); fn.push(new Array(size).fill(0)); }
        function put(cx, cy, v) { if (cx >= 0 && cy >= 0 && cx < size && cy < size) { m[cy][cx] = v; fn[cy][cx] = 1; } }
        function finder(cx, cy) {
            for (var dy = -1; dy <= 7; dy++) {
                for (var dx = -1; dx <= 7; dx++) {
                    var d = Math.max(Math.abs(dx - 3), Math.abs(dy - 3));
                    put(cx + dx, cy + dy, (d === 2 || d === 4) ? 0 : 1);
                }
            }
        }
        finder(0, 0); finder(size - 7, 0); finder(0, size - 7);
        for (j = 8; j < size - 8; j++) { put(j, 6, j % 2 === 0 ? 1 : 0); put(6, j, j % 2 === 0 ? 1 : 0); }
        var al = ALIGN[ver];
        for (j = 0; j < al.length; j++) {
            for (r = 0; r < al.length; r++) {
                var ax = al[j], ay = al[r];
                if ((ax === 6 && ay === 6) || (ax === 6 && ay === al[al.length - 1]) || (ax === al[al.length - 1] && ay === 6)) { continue; }
                for (var d2 = -2; d2 <= 2; d2++) {
                    for (var d3 = -2; d3 <= 2; d3++) { put(ax + d3, ay + d2, Math.max(Math.abs(d3), Math.abs(d2)) === 1 ? 0 : 1); }
                }
            }
        }
        for (j = 0; j < 9; j++) { if (j !== 6) { put(8, j, 0); put(j, 8, 0); } }
        for (j = 0; j < 8; j++) { put(size - 1 - j, 8, 0); put(8, size - 1 - j, 0); }
        put(8, size - 8, 1);
        if (ver >= 7) { for (j = 0; j < 6; j++) { for (r = 0; r < 3; r++) { put(size - 11 + r, j, 0); put(j, size - 11 + r, 0); } } }
        var bits = interleave(ver, cw.data), bi = 0, up = true, col, row;
        for (col = size - 1; col > 0; col -= 2) {
            if (col === 6) { col = 5; }
            for (row = 0; row < size; row++) {
                y = up ? size - 1 - row : row;
                for (xx = col; xx >= col - 1; xx--) {
                    if (!fn[y][xx]) { m[y][xx] = bi < bits.length * 8 ? (bits[bi >> 3] >> (7 - (bi & 7))) & 1 : 0; bi++; }
                }
            }
            up = !up;
        }
        function maskAt(k, r0, c0) {
            switch (k) {
                case 0: return (r0 + c0) % 2 === 0;
                case 1: return r0 % 2 === 0;
                case 2: return c0 % 3 === 0;
                case 3: return (r0 + c0) % 3 === 0;
                case 4: return (Math.floor(r0 / 2) + Math.floor(c0 / 3)) % 2 === 0;
                case 5: return ((r0 * c0) % 2) + ((r0 * c0) % 3) === 0;
                case 6: return (((r0 * c0) % 2) + ((r0 * c0) % 3)) % 2 === 0;
                default: return (((r0 + c0) % 2) + ((r0 * c0) % 3)) % 2 === 0;
            }
        }
        function penalty(mx) {
            var p = 0, run, last, dark = 0, colArr, q;
            for (y = 0; y < size; y++) {
                run = 1; last = mx[y][0];
                for (xx = 1; xx < size; xx++) { if (mx[y][xx] === last) { run++; } else { if (run >= 5) { p += 3 + run - 5; } run = 1; last = mx[y][xx]; } }
                if (run >= 5) { p += 3 + run - 5; }
            }
            for (xx = 0; xx < size; xx++) {
                run = 1; last = mx[0][xx];
                for (y = 1; y < size; y++) { if (mx[y][xx] === last) { run++; } else { if (run >= 5) { p += 3 + run - 5; } run = 1; last = mx[y][xx]; } }
                if (run >= 5) { p += 3 + run - 5; }
            }
            for (y = 0; y < size - 1; y++) {
                for (xx = 0; xx < size - 1; xx++) {
                    q = mx[y][xx];
                    if (q === mx[y][xx + 1] && q === mx[y + 1][xx] && q === mx[y + 1][xx + 1]) { p += 3; }
                }
            }
            var pat = [1, 0, 1, 1, 1, 0, 1, 0, 0, 0, 0], rev = pat.slice().reverse();
            function hits(arr, at) {
                var a = true, b = true;
                for (var q2 = 0; q2 < 11; q2++) {
                    if (arr[at + q2] !== pat[q2]) { a = false; }
                    if (arr[at + q2] !== rev[q2]) { b = false; }
                    if (!a && !b) { return 0; }
                }
                return (a ? 40 : 0) + (b ? 40 : 0);
            }
            for (y = 0; y < size; y++) { for (xx = 0; xx <= size - 11; xx++) { p += hits(mx[y], xx); } }
            for (xx = 0; xx < size; xx++) {
                colArr = [];
                for (y = 0; y < size; y++) { colArr.push(mx[y][xx]); }
                for (y = 0; y <= size - 11; y++) { p += hits(colArr, y); }
            }
            for (y = 0; y < size; y++) { for (xx = 0; xx < size; xx++) { dark += mx[y][xx]; } }
            return p + 10 * Math.floor(Math.abs(dark * 100 / (size * size) - 50) / 5);
        }
        var best = 0, bestScore = Infinity, trial, sc;
        for (var k = 0; k < 8; k++) {
            trial = m.map(function (rowArr) { return rowArr.slice(); });
            for (r = 0; r < size; r++) { for (c = 0; c < size; c++) { if (!fn[r][c] && maskAt(k, r, c)) { trial[r][c] ^= 1; } } }
            sc = penalty(trial);
            if (sc < bestScore) { bestScore = sc; best = k; }
        }
        for (r = 0; r < size; r++) { for (c = 0; c < size; c++) { if (!fn[r][c] && maskAt(best, r, c)) { m[r][c] ^= 1; } } }
        var fmt = formatBits(best);
        for (j = 0; j < 15; j++) {
            bit = (fmt >> j) & 1;
            if (j < 6) { put(8, j, bit); } else if (j === 6) { put(8, 7, bit); } else if (j === 7) { put(8, 8, bit); } else if (j === 8) { put(7, 8, bit); } else { put(14 - j, 8, bit); }
            if (j < 8) { put(size - 1 - j, 8, bit); } else { put(8, size - 15 + j, bit); }
        }
        if (ver >= 7) {
            var vb = versionBits(ver);
            for (j = 0; j < 18; j++) {
                bit = (vb >> j) & 1;
                put(size - 11 + (j % 3), Math.floor(j / 3), bit);
                put(Math.floor(j / 3), size - 11 + (j % 3), bit);
            }
        }
        return m;
    }
    function svg(text, px) {
        var m = matrix(text), size = m.length, d = '', y, xx;
        for (y = 0; y < size; y++) { for (xx = 0; xx < size; xx++) { if (m[y][xx]) { d += 'M' + xx + ' ' + y + 'h1v1h-1z'; } } }
        return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 ' + size + ' ' + size + '" width="' + (px || 156) + '" height="' + (px || 156) + '" shape-rendering="crispEdges" role="img" aria-label="QR Code Tamu"><rect width="' + size + '" height="' + size + '" fill="#FFFFFF"/><path d="' + d + '" fill="#0F172A"/></svg>';
    }
    g.DKarsaQR = { matrix: matrix, svg: svg };
})(window);

/* ============ Reactive guest state + sinkronisasi RSVP → QR ============ */
window.DKarsaGuest = (function () {
    var qs = new URLSearchParams(location.search);
    var TIERS = ['basic', 'premium', 'eksklusif', 'kustom'];
    var TPL = @json($pass['tpl']);
    var DEFAULT_SEAT = @json($pass['seat']);
    var store = 'dkarsa-guest-' + (document.title || 'undangan');

    function hash(s) { var h = 0; for (var i = 0; i < s.length; i++) { h = (h * 31 + s.charCodeAt(i)) >>> 0; } return h; }
    function saved() { try { return JSON.parse(sessionStorage.getItem(store) || '{}'); } catch (e) { return {}; } }
    var seed = saved();
    var nameEl = document.getElementById('qr-guest-name');
    // Tautan bisa memakai tanda hubung (?to=Bapak-Andi-Wijaya) → tampilkan dengan spasi.
    var rawTo = qs.get('to') || '';
    if (rawTo && rawTo.indexOf(' ') < 0 && rawTo.indexOf('-') >= 0) { rawTo = rawTo.replace(/-/g, ' '); }
    var state = {
        to: rawTo || seed.to || (nameEl ? nameEl.textContent.trim() : '') || 'Bapak/Ibu/Saudara/i Tamu Kehormatan',
        pax: qs.get('pax') || seed.pax || '2 Orang',
        seat: qs.get('seat') || seed.seat || DEFAULT_SEAT,
        status: qs.get('status') || seed.status || 'MENUNGGU KONFIRMASI',
        tier: qs.get('tier') || '',
        style: qs.get('style') || '',
        color: qs.get('color') || '',
        confirmed: !!seed.confirmed || /konfirmasi|hadir|berhalangan/i.test(qs.get('status') || ''),
        confirmedAt: seed.confirmedAt || ''
    };
    state.id = qs.get('id') || seed.id || ('DKR-' + String(10000 + hash(state.to) % 90000));

    function payload() {
        return 'DKARSA-PASS|TPL:' + TPL + '|ID:' + state.id + '|NAME:' + state.to + '|PAX:' + state.pax + '|SEAT:' + state.seat + '|STATUS:' + state.status;
    }
    function toast(msg) {
        var el = document.getElementById('dkarsa-toast');
        if (!el) { return; }
        el.textContent = msg;
        el.style.opacity = '1';
        el.style.transform = 'translate(-50%, 0)';
        clearTimeout(el._t);
        el._t = setTimeout(function () { el.style.opacity = '0'; el.style.transform = 'translate(-50%, 8px)'; }, 2600);
    }
    function paint() {
        var map = { 'qr-guest-name': state.to, 'qr-guest-id': state.id, 'qr-guest-pax': state.pax, 'qr-guest-seat': state.seat };
        for (var id in map) { var el = document.getElementById(id); if (el) { el.textContent = map[id]; } }
        var badge = document.getElementById('qr-status-badge');
        if (badge) {
            badge.textContent = !state.confirmed
                ? '⏳ MENUNGGU KONFIRMASI'
                : (/tidak|berhalangan/i.test(state.status) ? '✕ BERHALANGAN' : '✔ TERKONFIRMASI HADIR');
        }
        var nm = document.getElementById('modal-qr-guest-name');
        var meta = document.getElementById('modal-qr-guest-meta');
        if (nm) { nm.textContent = state.to; }
        if (meta) { meta.textContent = 'ID: ' + state.id + ' • ' + state.pax; }
        var gate = document.getElementById('gate-guest-name');
        if (gate) { gate.textContent = state.to; }
        var rsvpName = document.querySelector('#rsvp input[name="name"]');
        if (rsvpName && !rsvpName.value) { rsvpName.value = state.to; }
        var svg = window.DKarsaQR.svg(payload(), 164);
        var mount = document.getElementById('guest-qr-mount');
        if (mount) { mount.innerHTML = svg; }
        var modal = document.getElementById('modal-guest-qr-mount');
        if (modal) { modal.innerHTML = window.DKarsaQR.svg(payload(), 240); }
        try { sessionStorage.setItem(store, JSON.stringify({ to: state.to, pax: state.pax, seat: state.seat, status: state.status, id: state.id, tier: state.tier, confirmed: state.confirmed, confirmedAt: state.confirmedAt })); } catch (e) {}
        applyConfirmUI();
    }

    /* Tampilan kartu berubah setelah konfirmasi: veil hilang, cap muncul, ribbon hijau, QR ditegaskan. */
    function applyConfirmUI() {
        var section = document.getElementById('section-guest-qr');
        if (section) { section.classList.toggle('is-confirmed', !!state.confirmed); }

        var label = document.getElementById('qr-rsvp-state-text');
        if (label) {
            if (!state.confirmed) {
                label.textContent = 'QR TERKUNCI • KETUK UNTUK KONFIRMASI';
            } else if (/tidak|berhalangan/i.test(state.status)) {
                label.textContent = 'BERHALANGAN — KARTU DISIMPAN SEBAGAI ARSIP';
            } else {
                label.textContent = 'TERKONFIRMASI HADIR' + (state.confirmedAt ? ' • ' + state.confirmedAt : '');
            }
        }

        var at = document.getElementById('qr-confirmed-at');
        if (at) {
            if (state.confirmed && state.confirmedAt) {
                at.textContent = 'Dikonfirmasi pada ' + state.confirmedAt;
                at.classList.remove('hidden');
            } else {
                at.classList.add('hidden');
            }
        }
    }

    function confirm(at) {
        state.confirmed = true;
        state.confirmedAt = at || new Date().toLocaleString('id-ID', { day: '2-digit', month: 'short', year: 'numeric', hour: '2-digit', minute: '2-digit' });
        if (!state.status || state.status === 'MENUNGGU KONFIRMASI') { state.status = 'TERKONFIRMASI HADIR'; }
        paint();
        var section = document.getElementById('section-guest-qr');
        if (section && section.scrollIntoView) {
            setTimeout(function () { section.scrollIntoView({ behavior: 'smooth', block: 'center' }); }, 240);
        }
    }
    function setTier(tier) {
        if (TIERS.indexOf(tier) < 0) { return; }
        state.tier = tier;
        document.documentElement.dataset.tier = tier;
        var btns = document.querySelectorAll('[data-tier-btn]');
        for (var i = 0; i < btns.length; i++) { btns[i].setAttribute('aria-pressed', btns[i].dataset.tierBtn === tier ? 'true' : 'false'); }
        var kustom = document.getElementById('qr-kustom-actions');
        if (kustom) { kustom.hidden = tier !== 'kustom'; }
        try {
            var url = new URL(location.href);
            url.searchParams.set('tier', tier);
            history.replaceState(null, '', url);
        } catch (e) {}
        paint();
    }
    function bindRsvp() {
        var form = document.getElementById('rsvp');
        if (!form) { return; }
        form.addEventListener('input', function (ev) {
            var t = ev.target;
            if (t.name === 'name' && t.value.trim()) { state.to = t.value.trim(); paint(); }
            if (t.name === 'guest_count' && t.value) { state.pax = t.value + ' Orang'; paint(); }
        });
        form.addEventListener('change', function (ev) {
            if (ev.target.name === 'attendance') {
                state.status = /tidak/i.test(ev.target.value) ? 'BERHALANGAN' : 'TERKONFIRMASI HADIR';
                paint();
            }
        });
        form.addEventListener('submit', function () { paint(); });
    }
    function init() {
        setTier(state.tier || document.documentElement.dataset.tier || 'eksklusif');
        paint();
        bindRsvp();
    }
    if (document.readyState === 'loading') { document.addEventListener('DOMContentLoaded', init); } else { init(); }
    return { state: state, paint: paint, setTier: setTier, payload: payload, toast: toast, confirm: confirm, applyConfirmUI: applyConfirmUI };
})();

function DKarsaSetTier(tier) { window.DKarsaGuest.setTier(tier); }
function DKarsaScrollToRsvp() {
    var form = document.getElementById('rsvp');
    if (!form) { return; }
    form.scrollIntoView({ behavior: 'smooth', block: 'center' });
    var input = form.querySelector('[name="name"]');
    if (input) { setTimeout(function () { try { input.focus({ preventScroll: true }); } catch (e) {} }, 420); }
    window.DKarsaGuest.toast('Isi konfirmasi kehadiran untuk menerbitkan QR.');
}
function DKarsaZoomQR() {
    var m = document.getElementById('qr-fullscreen-modal');
    if (!m) { return; }
    window.DKarsaGuest.paint();
    m.classList.remove('hidden'); m.classList.add('flex');
}
function DKarsaCloseQR() {
    var m = document.getElementById('qr-fullscreen-modal');
    if (m) { m.classList.add('hidden'); m.classList.remove('flex'); }
}
function DKarsaCopyTicket(btn) {
    var id = window.DKarsaGuest.state.id;
    var done = function () { window.DKarsaGuest.toast('ID Tiket Berhasil Disalin!'); if (btn) { var old = btn.innerHTML; btn.innerHTML = '<span aria-hidden="true">✓</span> Tersalin'; setTimeout(function () { btn.innerHTML = old; }, 1800); } };
    if (navigator.clipboard && navigator.clipboard.writeText) { navigator.clipboard.writeText(id).then(done).catch(function () { window.prompt('Salin ID tiket:', id); }); }
    else { window.prompt('Salin ID tiket:', id); }
}
function DKarsaDownloadTicket(btn) {
    var g = window.DKarsaGuest.state, m = window.DKarsaQR.matrix(window.DKarsaGuest.payload());
    var pad = 16, scale = Math.max(3, Math.floor(360 / m.length)), size = m.length * scale + pad * 2;
    var cv = document.createElement('canvas'); cv.width = size; cv.height = size + 92;
    var ctx = cv.getContext('2d');
    ctx.fillStyle = '#FFFFFF'; ctx.fillRect(0, 0, cv.width, cv.height);
    ctx.fillStyle = '#0F172A';
    for (var y = 0; y < m.length; y++) { for (var x = 0; x < m.length; x++) { if (m[y][x]) { ctx.fillRect(pad + x * scale, pad + y * scale, scale, scale); } } }
    ctx.fillStyle = '#0F172A'; ctx.font = 'bold 16px sans-serif'; ctx.textAlign = 'center';
    ctx.fillText(g.to, size / 2, size + 26);
    ctx.font = '13px monospace'; ctx.fillStyle = '#475569';
    ctx.fillText(g.id + ' • ' + g.pax, size / 2, size + 48);
    ctx.fillText('D\u2019Karsa E-Ticket', size / 2, size + 70);
    var a = document.createElement('a');
    a.download = 'e-ticket-' + g.id + '.png';
    a.href = cv.toDataURL('image/png');
    a.click();
    window.DKarsaGuest.toast('E-Ticket PNG berhasil diunduh');
}
document.addEventListener('keydown', function (ev) { if (ev.key === 'Escape') { DKarsaCloseQR(); } });
</script>
