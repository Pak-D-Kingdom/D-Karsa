<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex,nofollow">
    <title>Link Tamu — {{ $invitationTitle }}</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['"Plus Jakarta Sans"', 'sans-serif'] },
                    colors: {
                        brand: '#f63854', accent: '#cf2445', ink: '#1c1417',
                        ink2: '#4a3f43', ink3: '#7a6f73', blush: '#fdf4f5', sunk: '#faf0f2',
                    },
                },
            },
        };
    </script>
</head>
<body class="bg-sunk font-sans text-ink antialiased">
    <main class="mx-auto w-full max-w-lg px-4 py-6 space-y-4">
        <header class="space-y-1">
            <a href="{{ $guestBaseUrl }}" class="inline-flex items-center gap-1.5 text-[11px] font-bold text-ink3 hover:text-brand">
                <span aria-hidden="true">←</span> Buka undangan
            </a>
            <h1 class="text-lg font-extrabold leading-tight">Link Personal per Tamu</h1>
            <p class="text-[11px] text-ink3 break-all">{{ $invitationTitle }}</p>
        </header>

        <section class="rounded-2xl border border-ink/10 bg-white p-4 space-y-3">
            <div class="flex flex-wrap items-center gap-2">
                <label class="inline-flex items-center gap-1.5 px-3 py-2 rounded-xl border border-ink/20 bg-white text-[11px] font-bold text-ink2 cursor-pointer hover:border-brand hover:text-brand transition">
                    <span aria-hidden="true">📄</span> Impor Excel / CSV
                    <input type="file" id="guestImportFile" accept=".csv,.txt,.xlsx,.xls" class="hidden" onchange="importGuestFile(this)">
                </label>
                <a href="{{ route('invitation.guest-sample') }}"
                   class="inline-flex items-center gap-1.5 px-3 py-2 rounded-xl bg-emerald-600 text-white text-[11px] font-bold hover:bg-emerald-700 transition">
                    <span aria-hidden="true">⬇</span> Excel
                </a>
                <a href="{{ route('invitation.guest-sample', ['format' => 'csv']) }}"
                   class="inline-flex items-center gap-1.5 px-3 py-2 rounded-xl border border-ink/20 bg-white text-[11px] font-bold text-ink2 hover:border-brand hover:text-brand transition">
                    <span aria-hidden="true">⬇</span> CSV
                </a>
                <span id="guestImportStatus" class="text-[10px] text-ink3"></span>
            </div>

            <textarea id="guestNamesInput" rows="3" placeholder="Satu nama per baris, contoh:&#10;Bapak Andi Wijaya&#10;Ibu Sari &amp; Keluarga"
                      class="w-full rounded-2xl border border-ink/20 p-3 text-xs focus:outline-none focus:ring-2 focus:ring-brand"></textarea>

            <button type="button" onclick="generateGuestLinks()"
                    class="w-full min-h-[42px] rounded-xl bg-ink text-white text-[11px] font-bold uppercase tracking-wider hover:bg-ink/90 transition">
                Buat Link Tamu
            </button>

            <div id="guestLinkList" class="space-y-1.5 max-h-[60vh] overflow-y-auto pr-1"></div>

            <div id="guestBulkActions" class="hidden">
                <button type="button" id="guestWaAllBtn" onclick="sendAllGuestWa()"
                        class="w-full min-h-[42px] rounded-xl bg-emerald-600 text-white text-[11px] font-bold uppercase tracking-wider hover:bg-emerald-700 transition">
                    Kirim WA Satu per Satu
                </button>
            </div>
        </section>
    </main>

    {{-- Antrean WhatsApp: satu tab per tamu supaya tidak diblokir pop-up --}}
    <div id="guestWaQueue" class="fixed inset-0 z-[70] hidden items-center justify-center p-4" style="background:rgba(0,0,0,.72)" onclick="if(event.target===this)closeWaQueue()">
        <div class="w-full max-w-sm rounded-2xl bg-white p-4 space-y-3 shadow-2xl">
            <div class="flex items-center justify-between gap-2">
                <b class="text-sm font-bold">Kirim Undangan WhatsApp</b>
                <button type="button" onclick="closeWaQueue()" class="w-8 h-8 rounded-full bg-sunk text-ink2 hover:text-brand grid place-items-center text-sm font-bold">✕</button>
            </div>
            <div class="h-1.5 rounded-full bg-sunk overflow-hidden">
                <div id="waQueueBar" class="h-full bg-emerald-500 transition-all" style="width:0%"></div>
            </div>
            <p id="waQueueProgress" class="text-[11px] font-semibold text-ink3">—</p>
            <div class="rounded-xl border border-ink/10 bg-sunk/40 p-3 space-y-1">
                <b id="waQueueName" class="block text-xs font-bold">—</b>
                <span id="waQueuePhone" class="block text-[10.5px] text-ink3">—</span>
                <p id="waQueueText" class="text-[10px] text-ink3 leading-snug break-words pt-1"></p>
            </div>
            <a id="waQueueOpen" href="#" target="_blank" rel="noopener" onclick="markQueueSent()"
               class="flex items-center justify-center gap-2 min-h-[44px] rounded-xl bg-emerald-600 text-white text-[11px] font-bold uppercase tracking-wider hover:bg-emerald-700 transition">
                <span aria-hidden="true">✆</span> Buka WhatsApp &amp; Kirim
            </a>
            <div class="flex gap-2">
                <button type="button" onclick="skipQueueItem()" class="flex-1 min-h-[38px] rounded-xl border border-ink/15 text-[11px] font-bold text-ink2 hover:border-brand">Lewati</button>
                <button type="button" onclick="closeWaQueue()" class="flex-1 min-h-[38px] rounded-xl bg-sunk text-[11px] font-bold text-ink2">Tutup</button>
            </div>
        </div>
    </div>

    <script>
        const GUEST_BASE_URL = @json($guestBaseUrl);
        const STORAGE_KEY = 'dkarsa-guests-' + @json($token);

        let guestRows = [];
        let waQueue = [];
        let waQueueIndex = 0;

        function normalizePhone(value) {
            let digits = String(value || '').replace(/\D/g, '');
            if (!digits) { return ''; }
            if (digits.startsWith('0')) { digits = '62' + digits.slice(1); }
            if (digits.startsWith('8')) { digits = '62' + digits; }
            return digits;
        }

        function guestNameSlug(name) {
            const cleaned = String(name || '').trim()
                .replace(/\s+/g, '-')
                .replace(/[^\p{L}\p{N}&._-]+/gu, '')
                .replace(/-+/g, '-')
                .replace(/^-+|-+$/g, '');
            return cleaned || String(name || '').trim().replace(/\s+/g, '-');
        }

        function guestUrl(row) {
            const sep = GUEST_BASE_URL.indexOf('?') >= 0 ? '&' : '?';
            return GUEST_BASE_URL + sep + 'to=' + encodeURIComponent(guestNameSlug(row.name));
        }

        function guestWaHref(row) {
            const detail = [];
            if (row.pax) { detail.push(row.pax + ' orang'); }
            if (row.seat) { detail.push(row.seat); }
            const text = 'Undangan untuk ' + row.name + ': ' + guestUrl(row) + (detail.length ? '\n(' + detail.join(' • ') + ')' : '');
            return 'https://wa.me/' + normalizePhone(row.phone) + '?text=' + encodeURIComponent(text);
        }

        function escapeAttr(value) {
            return String(value == null ? '' : value).replace(/&/g, '&amp;').replace(/"/g, '&quot;').replace(/</g, '&lt;');
        }

        function saveGuestRows() {
            try { localStorage.setItem(STORAGE_KEY, JSON.stringify(guestRows)); } catch (e) {}
        }

        function loadGuestRows() {
            try { return JSON.parse(localStorage.getItem(STORAGE_KEY) || '[]') || []; } catch (e) { return []; }
        }

        function renderGuestRows() {
            const list = document.getElementById('guestLinkList');
            if (!list) { return; }
            if (!guestRows.length) {
                list.innerHTML = '<p class="text-[11px] text-ink3">Belum ada tamu.</p>';
                updateGuestBulkBar();
                return;
            }

            list.innerHTML = guestRows.map((row, i) => {
                const url = guestUrl(row);
                const waBtn = normalizePhone(row.phone)
                    ? `<a data-guest-wa href="${guestWaHref(row)}" target="_blank" rel="noopener" class="shrink-0 px-2.5 py-1 rounded-lg bg-emerald-600 text-white text-[10px] font-bold">WA</a>`
                    : `<span data-guest-wa class="shrink-0 px-2.5 py-1 rounded-lg bg-ink/10 text-ink3 text-[10px] font-bold">WA</span>`;

                return `<div data-guest-row="${i}" class="rounded-xl border border-ink/10 bg-white p-2 space-y-1.5">
                    <div class="flex items-center gap-1.5">
                        ${row.sent
                            ? `<span class="w-5 h-5 rounded-full bg-emerald-100 text-emerald-700 grid place-items-center text-[10px] font-bold shrink-0">✓</span>`
                            : `<span class="w-5 h-5 rounded-full bg-brand/10 text-brand grid place-items-center text-[10px] font-bold shrink-0">${i + 1}</span>`}
                        <input value="${escapeAttr(row.name)}" oninput="updateGuestRow(${i}, 'name', this.value)" placeholder="Nama tamu" aria-label="Nama tamu"
                               class="flex-1 min-w-0 rounded-lg border border-ink/15 px-2 py-1 text-[11px] font-semibold focus:outline-none focus:ring-2 focus:ring-brand/40">
                    </div>
                    <div class="grid grid-cols-3 gap-1.5">
                        <input value="${escapeAttr(row.phone || '')}" oninput="updateGuestRow(${i}, 'phone', this.value)" placeholder="Nomor WA" aria-label="Nomor WhatsApp" inputmode="tel"
                               class="min-w-0 rounded-lg border border-ink/15 px-2 py-1 text-[10.5px] focus:outline-none focus:ring-2 focus:ring-brand/40">
                        <input value="${escapeAttr(row.pax || 2)}" oninput="updateGuestRow(${i}, 'pax', this.value)" type="number" min="1" max="20" placeholder="Pax" aria-label="Jumlah orang"
                               class="min-w-0 rounded-lg border border-ink/15 px-2 py-1 text-[10.5px] focus:outline-none focus:ring-2 focus:ring-brand/40">
                        <input value="${escapeAttr(row.seat || '')}" oninput="updateGuestRow(${i}, 'seat', this.value)" placeholder="Meja / Zona" aria-label="Meja atau zona"
                               class="min-w-0 rounded-lg border border-ink/15 px-2 py-1 text-[10.5px] focus:outline-none focus:ring-2 focus:ring-brand/40">
                    </div>
                    <div class="flex items-center gap-1.5">
                        <p data-guest-url class="flex-1 min-w-0 text-[9.5px] text-ink3 truncate">${url}</p>
                        <a data-guest-preview href="${url}" target="_blank" rel="noopener" title="Pratinjau undangan dengan nama tamu ini"
                           class="shrink-0 px-2.5 py-1 rounded-lg bg-white border border-ink/15 text-[10px] font-bold text-ink2 hover:border-brand hover:text-brand">Lihat</a>
                        <button type="button" data-guest-copy data-url="${escapeAttr(url)}" onclick="copyGuestUrl(this)"
                                class="shrink-0 px-2.5 py-1 rounded-lg bg-sunk border border-ink/15 text-[10px] font-bold text-ink2 hover:border-brand">Salin</button>
                        ${waBtn}
                    </div>
                </div>`;
            }).join('');

            updateGuestBulkBar();
        }

        function updateGuestRow(index, field, value) {
            if (!guestRows[index]) { return; }
            guestRows[index][field] = value;
            guestRows[index].sent = false;
            const row = document.querySelector('[data-guest-row="' + index + '"]');
            if (row) {
                const url = guestUrl(guestRows[index]);
                const urlEl = row.querySelector('[data-guest-url]');
                if (urlEl) { urlEl.textContent = url; }
                const copyBtn = row.querySelector('[data-guest-copy]');
                if (copyBtn) { copyBtn.dataset.url = url; }
                const previewLink = row.querySelector('[data-guest-preview]');
                if (previewLink) { previewLink.href = url; }
                const wa = row.querySelector('[data-guest-wa]');
                const hasPhone = !!normalizePhone(guestRows[index].phone);
                if (wa && hasPhone && wa.tagName === 'SPAN') {
                    const link = document.createElement('a');
                    link.setAttribute('data-guest-wa', '');
                    link.className = 'shrink-0 px-2.5 py-1 rounded-lg bg-emerald-600 text-white text-[10px] font-bold';
                    link.target = '_blank';
                    link.rel = 'noopener';
                    link.textContent = 'WA';
                    link.href = guestWaHref(guestRows[index]);
                    wa.replaceWith(link);
                } else if (wa && !hasPhone && wa.tagName === 'A') {
                    const off = document.createElement('span');
                    off.setAttribute('data-guest-wa', '');
                    off.className = 'shrink-0 px-2.5 py-1 rounded-lg bg-ink/10 text-ink3 text-[10px] font-bold';
                    off.textContent = 'WA';
                    wa.replaceWith(off);
                } else if (wa && hasPhone) {
                    wa.href = guestWaHref(guestRows[index]);
                }
            }
            saveGuestRows();
            updateGuestBulkBar();
        }

        function updateGuestBulkBar() {
            const bar = document.getElementById('guestBulkActions');
            const btn = document.getElementById('guestWaAllBtn');
            if (!bar || !btn) { return; }
            const withPhone = guestRows.filter((r) => !!normalizePhone(r.phone));
            if (!guestRows.length) { bar.classList.add('hidden'); return; }
            bar.classList.remove('hidden');
            btn.textContent = withPhone.length ? 'Kirim WA Satu per Satu (' + withPhone.length + ')' : 'Belum Ada Nomor WhatsApp';
            btn.disabled = withPhone.length === 0;
            btn.classList.toggle('opacity-50', withPhone.length === 0);
        }

        function copyGuestUrl(btn) {
            const url = btn?.dataset?.url || '';
            const done = () => { const old = btn.textContent; btn.textContent = '✓'; setTimeout(() => { btn.textContent = old; }, 1400); };
            if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText(url).then(done).catch(() => window.prompt('Salin tautan:', url));
            } else {
                window.prompt('Salin tautan:', url);
            }
        }

        function generateGuestLinks() {
            const namesEl = document.getElementById('guestNamesInput');
            const names = (namesEl?.value || '').split(/\r?\n/).map((n) => n.trim()).filter(Boolean);
            const existing = new Map(guestRows.map((r) => [String(r.name).toLowerCase(), r]));
            guestRows = names.map((name) => existing.get(name.toLowerCase()) || { name, phone: '', pax: 2, seat: '' });
            renderGuestRows();
            saveGuestRows();
            const status = document.getElementById('guestImportStatus');
            if (status) { status.textContent = guestRows.length ? guestRows.length + ' tamu siap dibagikan.' : ''; }
        }

        function parseDelimited(text) {
            const clean = text.replace(/^\uFEFF/, '').replace(/\r\n?/g, '\n');
            const firstLine = clean.split('\n')[0] || '';
            const counts = { ',': (firstLine.match(/,/g) || []).length, ';': (firstLine.match(/;/g) || []).length, '\t': (firstLine.match(/\t/g) || []).length };
            const delimiter = Object.keys(counts).sort((a, b) => counts[b] - counts[a])[0] || ',';

            const rows = [];
            let row = [], cell = '', quoted = false;
            for (let i = 0; i < clean.length; i++) {
                const ch = clean[i];
                if (quoted) {
                    if (ch === '"' && clean[i + 1] === '"') { cell += '"'; i++; }
                    else if (ch === '"') { quoted = false; }
                    else { cell += ch; }
                } else if (ch === '"') { quoted = true; }
                else if (ch === delimiter) { row.push(cell.trim()); cell = ''; }
                else if (ch === '\n') { row.push(cell.trim()); rows.push(row); row = []; cell = ''; }
                else { cell += ch; }
            }
            row.push(cell.trim());
            if (row.some((c) => c !== '')) { rows.push(row); }
            return rows.filter((r) => r.some((c) => c !== ''));
        }

        function rowsToGuests(rows) {
            if (!rows.length) { return []; }
            const header = rows[0].map((c) => String(c).toLowerCase());
            const find = (keys) => header.findIndex((h) => keys.some((k) => h.includes(k)));
            const iName = find(['nama', 'name', 'tamu', 'guest']);
            const iPhone = find(['wa', 'whatsapp', 'hp', 'phone', 'nomor', 'telp']);
            const iPax = find(['pax', 'jumlah', 'orang', 'qty', 'kuota']);
            const iSeat = find(['meja', 'seat', 'zona', 'kursi', 'table']);
            const hasHeader = iName >= 0 && rows[0].some((c) => /[a-z]/i.test(String(c))) && !/^\+?\d+$/.test(String(rows[0][0]));

            const body = hasHeader ? rows.slice(1) : rows;
            return body.map((r) => {
                const name = String(r[hasHeader && iName >= 0 ? iName : 0] || '').trim();
                if (!name) { return null; }
                return {
                    name,
                    phone: hasHeader && iPhone >= 0 ? String(r[iPhone] || '').trim() : (String(r[1] || '').match(/^[\d+\s-]+$/) ? String(r[1]).trim() : ''),
                    pax: parseInt((hasHeader && iPax >= 0 ? r[iPax] : r[2]) || 2, 10) || 2,
                    seat: hasHeader && iSeat >= 0 ? String(r[iSeat] || '').trim() : '',
                };
            }).filter(Boolean);
        }

        function loadSheetJS() {
            if (window.XLSX) { return Promise.resolve(); }
            return new Promise((resolve, reject) => {
                const script = document.createElement('script');
                script.src = 'https://cdn.jsdelivr.net/npm/xlsx@0.18.5/dist/xlsx.full.min.js';
                script.onload = resolve;
                script.onerror = reject;
                document.head.appendChild(script);
            });
        }

        async function importGuestFile(input) {
            const file = input?.files?.[0];
            const status = document.getElementById('guestImportStatus');
            if (!file) { return; }
            const isExcel = /\.(xlsx|xls)$/i.test(file.name);

            try {
                let rows;
                if (isExcel) {
                    if (status) { status.textContent = 'Membaca Excel…'; }
                    await loadSheetJS();
                    const buffer = await file.arrayBuffer();
                    const book = window.XLSX.read(buffer, { type: 'array' });
                    const sheet = book.Sheets[book.SheetNames[0]];
                    rows = window.XLSX.utils.sheet_to_json(sheet, { header: 1, blankrows: false, defval: '' });
                } else {
                    rows = parseDelimited(await file.text());
                }

                const guests = rowsToGuests(rows);
                if (!guests.length) {
                    if (status) { status.textContent = 'Tidak ada nama tamu yang terbaca.'; }
                    return;
                }
                guestRows = guests;
                renderGuestRows();
                saveGuestRows();
                const namesEl = document.getElementById('guestNamesInput');
                if (namesEl) { namesEl.value = guests.map((g) => g.name).join('\n'); }
                if (status) { status.textContent = guests.length + ' tamu diimpor dari ' + file.name + '.'; }
            } catch (error) {
                if (status) { status.textContent = 'Gagal membaca file. Coba CSV.'; }
            } finally {
                input.value = '';
            }
        }

        function markGuestSent(index) {
            if (!guestRows[index]) { return; }
            guestRows[index].sent = true;
            saveGuestRows();
        }

        function sendAllGuestWa() {
            const targets = guestRows.map((row, index) => ({ row, index })).filter((item) => !!normalizePhone(item.row.phone));
            if (!targets.length) { return; }
            const pending = targets.filter((item) => !item.row.sent);
            waQueue = pending.length ? pending : targets;
            waQueueIndex = 0;
            renderWaQueueItem();
        }

        function renderWaQueueItem() {
            const item = waQueue[waQueueIndex];
            if (!item) { closeWaQueue(); return; }

            const total = waQueue.length;
            const modal = document.getElementById('guestWaQueue');
            const progress = document.getElementById('waQueueProgress');
            const bar = document.getElementById('waQueueBar');
            if (progress) { progress.textContent = 'Tamu ' + (waQueueIndex + 1) + ' dari ' + total; }
            if (bar) { bar.style.width = Math.round((waQueueIndex / total) * 100) + '%'; }
            document.getElementById('waQueueName').textContent = item.row.name || 'Tamu';
            document.getElementById('waQueuePhone').textContent = '+' + normalizePhone(item.row.phone);
            document.getElementById('waQueueOpen').href = guestWaHref(item.row);

            const detail = [];
            if (item.row.pax) { detail.push(item.row.pax + ' orang'); }
            if (item.row.seat) { detail.push(item.row.seat); }
            document.getElementById('waQueueText').textContent = 'Undangan untuk ' + item.row.name + ': ' + guestUrl(item.row)
                + (detail.length ? ' (' + detail.join(' • ') + ')' : '');

            if (modal) { modal.classList.remove('hidden'); modal.classList.add('flex'); }
        }

        function markQueueSent() {
            const item = waQueue[waQueueIndex];
            if (item) { markGuestSent(item.index); }
            setTimeout(nextQueueItem, 650);
        }

        function nextQueueItem() {
            waQueueIndex += 1;
            if (waQueueIndex >= waQueue.length) { closeWaQueue(); return; }
            renderWaQueueItem();
        }

        function skipQueueItem() { nextQueueItem(); }

        function closeWaQueue() {
            const modal = document.getElementById('guestWaQueue');
            if (modal) { modal.classList.add('hidden'); modal.classList.remove('flex'); }
            renderGuestRows();
        }

        document.addEventListener('DOMContentLoaded', () => {
            guestRows = loadGuestRows();
            if (guestRows.length) {
                const namesEl = document.getElementById('guestNamesInput');
                if (namesEl && !namesEl.value.trim()) { namesEl.value = guestRows.map((g) => g.name).join('\n'); }
                renderGuestRows();
            }
        });
    </script>
</body>
</html>
