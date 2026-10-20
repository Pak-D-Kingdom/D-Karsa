<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pembayaran Midtrans - {{ $invoiceNumber }} | D'Karsa</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        serif: ['"Playfair Display"', 'Georgia', 'serif'],
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    colors: {
                        brand: '#f63854',
                        accent: '#cf2445',
                        ink: '#1c1417',
                        ink2: '#4a3f43',
                        ink3: '#7a6f73',
                        blush: '#fdf4f5',
                        sunk: '#faf0f2',
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #faf5f6; color: #1c1417; }
        .toast-show { transform: translateY(0); opacity: 1; pointer-events: auto; }
        .toast-hide { transform: translateY(1rem); opacity: 0; pointer-events: none; }
    </style>

    @if(!empty($snapToken) && !empty($clientKey))
        <script src="{{ $snapJsUrl }}" data-client-key="{{ $clientKey }}"></script>
    @endif
</head>
<body class="min-h-screen py-8 px-4 flex items-center justify-center">

    <div class="max-w-xl w-full bg-white rounded-3xl p-6 sm:p-8 shadow-2xl border border-pink-100 space-y-6 my-auto">
        
        {{-- Header: Logo & Midtrans Security Badge --}}
        <div class="flex items-center justify-between border-b border-ink/10 pb-4">
            <a href="{{ route('invitation.index') }}" class="flex items-center gap-3 group">
                <img src="{{ asset('images/logo.png') }}" alt="Logo D'Karsa" class="w-11 h-11 rounded-full object-cover shadow border border-pink-200 group-hover:scale-105 transition">
                <div class="text-left">
                    <span class="font-serif text-lg font-bold text-ink group-hover:text-brand transition block leading-tight">D'Karsa</span>
                    <span class="text-[10px] uppercase font-bold tracking-wider text-ink3">Digital Invitation</span>
                </div>
            </a>
            
            <div class="text-right">
                <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-sky-50 border border-sky-200 text-sky-700 text-[11px] font-bold">
                    <span>🔒</span> 256-Bit SSL Secured
                </div>
                <div class="text-[10px] text-ink3 font-semibold mt-0.5">Midtrans Payment Gateway</div>
            </div>
        </div>

        {{-- Order Summary Card --}}
        <div class="rounded-2xl bg-gradient-to-br from-pink-50/80 via-white to-rose-50/40 border border-pink-200 p-5 space-y-3.5 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <span class="text-[10.5px] uppercase font-bold tracking-wider text-ink3 block">No. Invoice (Order ID)</span>
                    <span class="font-mono text-xs font-extrabold text-ink">{{ $invoiceNumber }}</span>
                </div>
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-amber-100 text-amber-800 text-[11px] font-extrabold">
                    <span class="w-2 h-2 rounded-full bg-amber-500 animate-ping"></span>
                    Menunggu Pembayaran
                </span>
            </div>

            <div class="h-px bg-pink-200/60"></div>

            <div class="grid grid-cols-2 gap-3 text-xs">
                <div>
                    <span class="text-[11px] text-ink3 block">Undangan Untuk:</span>
                    <b class="text-ink font-semibold">
                        @if($couple->category === 'Pernikahan')
                            {{ $couple->groom_name }} &amp; {{ $couple->bride_name }}
                        @else
                            {{ $couple->groom_fullname ?: $couple->groom_name }}
                        @endif
                    </b>
                </div>
                <div>
                    <span class="text-[11px] text-ink3 block">Paket Pilihan:</span>
                    <b class="text-brand font-bold">{{ $packageName }}</b>
                </div>
                <div>
                    <span class="text-[11px] text-ink3 block">Pemesan:</span>
                    <b class="text-ink font-semibold">{{ $couple->customer_name ?: ($couple->groom_name ?: '-') }}</b>
                </div>
                <div>
                    <span class="text-[11px] text-ink3 block">No. WhatsApp:</span>
                    <b class="text-ink font-semibold">{{ $couple->customer_phone ?: '-' }}</b>
                </div>
            </div>

            <div class="h-px bg-pink-200/60"></div>

            <div class="flex items-center justify-between pt-1">
                <span class="text-xs font-bold text-ink2">Total Pembayaran:</span>
                <span class="font-serif text-2xl font-extrabold text-brand">
                    Rp {{ number_format($amount, 0, ',', '.') }}
                </span>
            </div>
        </div>

        {{-- Instant Activation Guarantee Banner --}}
        <div class="p-3.5 rounded-2xl bg-emerald-50 border border-emerald-200 flex items-start gap-3">
            <span class="text-xl shrink-0">⚡</span>
            <div class="text-xs text-emerald-900 leading-relaxed">
                <b>Aktivasi Otomatis &amp; Instan:</b> Setelah Anda menyelesaikan pembayaran via Midtrans, sistem otomatis memverifikasi transaksi dan undangan digital Anda <b>langsung aktif seketika</b> tanpa perlu menunggu ACC admin secara manual.
            </div>
        </div>

        {{-- Midtrans Snap Button (If configured) --}}
        @if(!empty($snapToken))
            <div class="p-4 rounded-2xl bg-sky-50/70 border border-sky-300 text-center space-y-2.5">
                <p class="text-xs text-sky-950 font-semibold">
                    Klik tombol di bawah untuk membuka jendela pembayaran resmi Midtrans Snap:
                </p>
                <button type="button" id="pay-button" onclick="payWithSnap()"
                        class="w-full py-3.5 px-6 rounded-2xl bg-sky-600 hover:bg-sky-700 text-white font-bold text-xs tracking-wider uppercase transition shadow-lg hover:shadow-xl hover:-translate-y-0.5 flex items-center justify-center gap-2">
                    <span>💳</span> Bayar Sekarang via Midtrans Snap (Popup)
                </button>
            </div>
        @endif

        {{-- Payment Methods Tabs --}}
        <div class="space-y-3">
            <label class="block text-xs font-bold text-ink uppercase tracking-wider">
                Pilihan Kanal Pembayaran Midtrans:
            </label>

            <!-- Channel Selector Tabs -->
            <div class="grid grid-cols-3 gap-2 p-1 bg-sunk rounded-2xl border border-ink/10 text-xs font-bold">
                <button type="button" id="tabQris" onclick="switchChannel('qris')"
                        class="py-2 px-3 rounded-xl bg-white text-brand shadow-sm transition flex items-center justify-center gap-1.5">
                    <span>📱</span> QRIS &amp; GoPay
                </button>
                <button type="button" id="tabVa" onclick="switchChannel('va')"
                        class="py-2 px-3 rounded-xl text-ink3 hover:text-ink transition flex items-center justify-center gap-1.5">
                    <span>🏦</span> Virtual Account
                </button>
                <button type="button" id="tabEwallet" onclick="switchChannel('ewallet')"
                        class="py-2 px-3 rounded-xl text-ink3 hover:text-ink transition flex items-center justify-center gap-1.5">
                    <span>👛</span> E-Wallet
                </button>
            </div>

            <!-- Panel 1: QRIS & GoPay -->
            <div id="panelQris" class="p-5 rounded-2xl bg-white border border-pink-200 space-y-4 text-center">
                <div class="flex items-center justify-center gap-2">
                    <span class="font-extrabold text-xs text-ink uppercase tracking-wider">QRIS Standar Nasional (Midtrans)</span>
                    <span class="px-2 py-0.5 rounded bg-sky-100 text-sky-800 text-[10px] font-bold">Semua M-Banking &amp; E-Wallet</span>
                </div>

                {{-- QRIS Visual Representation --}}
                <div class="w-56 h-56 mx-auto bg-white p-3 rounded-2xl border-2 border-brand/40 shadow-inner flex flex-col items-center justify-center relative group">
                    <svg class="w-full h-full text-ink" viewBox="0 0 100 100" fill="currentColor">
                        <!-- Corner Top Left -->
                        <rect x="5" y="5" width="28" height="28" fill="#1c1417" rx="3" />
                        <rect x="9" y="9" width="20" height="20" fill="white" rx="2" />
                        <rect x="13" y="13" width="12" height="12" fill="#f63854" rx="2" />

                        <!-- Corner Top Right -->
                        <rect x="67" y="5" width="28" height="28" fill="#1c1417" rx="3" />
                        <rect x="71" y="9" width="20" height="20" fill="white" rx="2" />
                        <rect x="75" y="13" width="12" height="12" fill="#f63854" rx="2" />

                        <!-- Corner Bottom Left -->
                        <rect x="5" y="67" width="28" height="28" fill="#1c1417" rx="3" />
                        <rect x="9" y="71" width="20" height="20" fill="white" rx="2" />
                        <rect x="13" y="75" width="12" height="12" fill="#f63854" rx="2" />

                        <!-- Data pattern modules -->
                        <rect x="38" y="7" width="6" height="6" fill="#1c1417" />
                        <rect x="48" y="7" width="6" height="10" fill="#1c1417" />
                        <rect x="38" y="17" width="8" height="6" fill="#1c1417" />
                        <rect x="50" y="21" width="10" height="6" fill="#1c1417" />
                        
                        <rect x="7" y="38" width="8" height="6" fill="#1c1417" />
                        <rect x="19" y="38" width="14" height="6" fill="#1c1417" />
                        <rect x="7" y="48" width="6" height="12" fill="#1c1417" />
                        <rect x="17" y="48" width="8" height="6" fill="#1c1417" />
                        <rect x="27" y="48" width="6" height="12" fill="#1c1417" />

                        <rect x="67" y="38" width="12" height="6" fill="#1c1417" />
                        <rect x="83" y="38" width="10" height="6" fill="#1c1417" />
                        <rect x="71" y="48" width="6" height="12" fill="#1c1417" />
                        <rect x="81" y="48" width="12" height="6" fill="#1c1417" />

                        <rect x="38" y="38" width="6" height="6" fill="#f63854" />
                        <rect x="48" y="38" width="6" height="12" fill="#1c1417" />
                        <rect x="56" y="38" width="6" height="6" fill="#f63854" />
                        <rect x="38" y="48" width="6" height="6" fill="#1c1417" />
                        <rect x="46" y="48" width="8" height="8" fill="#f63854" rx="1" />
                        <rect x="56" y="48" width="6" height="6" fill="#1c1417" />
                        <rect x="38" y="58" width="6" height="6" fill="#f63854" />
                        <rect x="48" y="58" width="6" height="6" fill="#1c1417" />
                        <rect x="56" y="58" width="6" height="6" fill="#f63854" />

                        <rect x="38" y="69" width="8" height="6" fill="#1c1417" />
                        <rect x="50" y="69" width="12" height="6" fill="#1c1417" />
                        <rect x="67" y="69" width="8" height="6" fill="#1c1417" />
                        <rect x="79" y="69" width="14" height="6" fill="#1c1417" />
                        
                        <rect x="38" y="79" width="14" height="6" fill="#1c1417" />
                        <rect x="56" y="79" width="6" height="14" fill="#1c1417" />
                        <rect x="67" y="79" width="12" height="8" fill="#1c1417" />
                        <rect x="83" y="79" width="10" height="14" fill="#1c1417" />
                        <rect x="38" y="89" width="14" height="6" fill="#1c1417" />
                        <rect x="67" y="91" width="12" height="4" fill="#1c1417" />
                    </svg>

                    <!-- Center Logo Overlay -->
                    <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                        <div class="w-10 h-10 rounded-lg bg-white shadow-md border border-pink-200 p-1 flex items-center justify-center">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-full h-full object-cover rounded">
                        </div>
                    </div>
                </div>

                <div class="text-[11px] text-ink3 space-y-1">
                    <p class="font-bold text-ink">Bisa dipindai dari aplikasi apa saja:</p>
                    <p>GoPay, BCA Mobile, Livin' Mandiri, BRImo, BNI Mobile, OVO, Dana, ShopeePay, LinkAja</p>
                </div>
            </div>

            <!-- Panel 2: Virtual Account -->
            <div id="panelVa" class="hidden p-5 rounded-2xl bg-white border border-pink-200 space-y-3.5">
                <div class="space-y-2">
                    <div class="p-3 rounded-xl bg-sunk/60 border border-ink/10 flex items-center justify-between">
                        <div>
                            <span class="text-[10px] font-bold text-ink3 block">BCA Virtual Account (Midtrans)</span>
                            <span class="font-mono text-sm font-extrabold text-ink" id="bcaVa">70012{{ str_pad($couple->id, 8, '0', STR_PAD_LEFT) }}</span>
                        </div>
                        <button type="button" onclick="copyText('bcaVa', 'Nomor BCA VA berhasil disalin!')"
                                class="px-3 py-1.5 rounded-lg bg-brand/10 hover:bg-brand/20 text-brand text-xs font-bold transition">
                            Salin
                        </button>
                    </div>

                    <div class="p-3 rounded-xl bg-sunk/60 border border-ink/10 flex items-center justify-between">
                        <div>
                            <span class="text-[10px] font-bold text-ink3 block">Mandiri Bill Payment (Midtrans)</span>
                            <span class="font-mono text-sm font-extrabold text-ink" id="mandiriVa">70014{{ str_pad($couple->id, 8, '0', STR_PAD_LEFT) }}</span>
                        </div>
                        <button type="button" onclick="copyText('mandiriVa', 'Nomor Mandiri VA berhasil disalin!')"
                                class="px-3 py-1.5 rounded-lg bg-brand/10 hover:bg-brand/20 text-brand text-xs font-bold transition">
                            Salin
                        </button>
                    </div>

                    <div class="p-3 rounded-xl bg-sunk/60 border border-ink/10 flex items-center justify-between">
                        <div>
                            <span class="text-[10px] font-bold text-ink3 block">BRI Virtual Account / BRIVA (Midtrans)</span>
                            <span class="font-mono text-sm font-extrabold text-ink" id="briVa">70018{{ str_pad($couple->id, 8, '0', STR_PAD_LEFT) }}</span>
                        </div>
                        <button type="button" onclick="copyText('briVa', 'Nomor BRI VA berhasil disalin!')"
                                class="px-3 py-1.5 rounded-lg bg-brand/10 hover:bg-brand/20 text-brand text-xs font-bold transition">
                            Salin
                        </button>
                    </div>

                    <div class="p-3 rounded-xl bg-sunk/60 border border-ink/10 flex items-center justify-between">
                        <div>
                            <span class="text-[10px] font-bold text-ink3 block">BNI Virtual Account (Midtrans)</span>
                            <span class="font-mono text-sm font-extrabold text-ink" id="bniVa">70019{{ str_pad($couple->id, 8, '0', STR_PAD_LEFT) }}</span>
                        </div>
                        <button type="button" onclick="copyText('bniVa', 'Nomor BNI VA berhasil disalin!')"
                                class="px-3 py-1.5 rounded-lg bg-brand/10 hover:bg-brand/20 text-brand text-xs font-bold transition">
                            Salin
                        </button>
                    </div>
                </div>
                <p class="text-[10.5px] text-ink3 italic">
                    * Masukkan kode VA di menu Transfer Virtual Account pada aplikasi M-Banking atau ATM Anda.
                </p>
            </div>

            <!-- Panel 3: E-Wallet -->
            <div id="panelEwallet" class="hidden p-5 rounded-2xl bg-white border border-pink-200 space-y-3">
                <div class="text-xs text-ink2 leading-relaxed space-y-2">
                    <p class="font-bold text-ink">E-Wallet Resmi Midtrans:</p>
                    <div class="grid grid-cols-2 gap-2 text-xs">
                        <div class="p-2.5 rounded-xl bg-sunk border border-ink/10 flex items-center gap-2">
                            <span>🟢</span> <b>GoPay</b>
                        </div>
                        <div class="p-2.5 rounded-xl bg-sunk border border-ink/10 flex items-center gap-2">
                            <span>🟠</span> <b>ShopeePay</b>
                        </div>
                        <div class="p-2.5 rounded-xl bg-sunk border border-ink/10 flex items-center gap-2">
                            <span>🔵</span> <b>DANA (via QRIS)</b>
                        </div>
                        <div class="p-2.5 rounded-xl bg-sunk border border-ink/10 flex items-center gap-2">
                            <span>🟣</span> <b>OVO (via QRIS)</b>
                        </div>
                    </div>
                    <p class="text-[11px] text-ink3 pt-1">
                        Pilih menu QRIS untuk memindai langsung menggunakan GoPay, ShopeePay, OVO, atau DANA.
                    </p>
                </div>
            </div>
        </div>

        {{-- SIMULATION / SANDBOX SECTION (Ideal for Localhost & Testing without live Midtrans credentials) --}}
        <div class="p-5 rounded-2xl bg-gradient-to-br from-sky-50/90 via-indigo-50/40 to-white border-2 border-dashed border-sky-300 space-y-3.5 shadow-sm">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <span class="text-base">🧪</span>
                    <span class="text-xs font-extrabold uppercase tracking-wider text-sky-950">Mode Uji Coba Sandbox Midtrans</span>
                </div>
                <span class="px-2.5 py-0.5 rounded-full bg-sky-200 text-sky-900 text-[10px] font-black uppercase">
                    Testing Mode
                </span>
            </div>

            <p class="text-[11.5px] text-sky-900 leading-relaxed">
                Anda dapat langsung menguji alur pembayaran dan membuktikan bahwa <b>undangan otomatis langsung aktif seketika tanpa perlu ACC admin</b> dengan menekan tombol simulasi di bawah:
            </p>

            <form action="{{ route('midtrans.simulate', $couple->slug) }}" method="POST" class="space-y-2">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                    <button type="submit" name="method" value="QRIS / GoPay (Midtrans Sandbox)"
                            class="py-2.5 px-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs transition shadow-sm flex items-center justify-center gap-1.5 hover:-translate-y-0.5">
                        <span>⚡</span> Simulasikan Bayar via QRIS / GoPay
                    </button>
                    <button type="submit" name="method" value="BCA Virtual Account (Midtrans Sandbox)"
                            class="py-2.5 px-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs transition shadow-sm flex items-center justify-center gap-1.5 hover:-translate-y-0.5">
                        <span>⚡</span> Simulasikan Bayar via Bank VA
                    </button>
                </div>
            </form>
        </div>

        {{-- Footer Actions --}}
        <div class="pt-2 flex items-center justify-between text-xs text-ink3 border-t border-ink/10">
            <a href="{{ route('invitation.create') }}" class="hover:text-brand font-semibold transition flex items-center gap-1">
                <span>←</span> Ubah Formulir
            </a>
            <span class="text-[11px]">Butuh bantuan? Hubungi Admin D'Karsa</span>
        </div>

    </div>

    {{-- TOAST NOTIFICATION --}}
    <div id="toastNotification" class="fixed top-5 left-1/2 -translate-x-1/2 z-50 px-5 py-3 rounded-full bg-black/90 backdrop-blur-md text-white text-xs font-bold shadow-2xl transition-all duration-300 toast-hide flex items-center gap-2">
        <span>✓</span>
        <span id="toastMessage">Teks disalin ke clipboard!</span>
    </div>

    <script>
        function payWithSnap() {
            @if(!empty($snapToken))
                window.snap.pay('{{ $snapToken }}', {
                    onSuccess: function(result) {
                        const orderId = (result && result.order_id) ? result.order_id : '{{ $couple->invoice_number }}';
                        const paymentType = (result && result.payment_type) ? result.payment_type : 'snap';
                        window.location.href = "{{ route('invitation.success', $couple->slug) }}?order_id=" + encodeURIComponent(orderId) + "&transaction_status=settlement&status_code=200&payment_type=" + encodeURIComponent(paymentType);
                    },
                    onPending: function(result) {
                        const orderId = (result && result.order_id) ? result.order_id : '{{ $couple->invoice_number }}';
                        const paymentType = (result && result.payment_type) ? result.payment_type : 'snap';
                        window.location.href = "{{ route('invitation.success', $couple->slug) }}?order_id=" + encodeURIComponent(orderId) + "&transaction_status=pending&payment_type=" + encodeURIComponent(paymentType);
                    },
                    onError: function(result) {
                        alert("Pembayaran gagal atau dibatalkan.");
                    },
                    onClose: function() {
                        // User closed the popup without finishing the payment
                    }
                });
            @else
                alert("Kunci API Midtrans belum dikonfigurasi.");
            @endif
        }

        function switchChannel(channel) {
            const panels = ['panelQris', 'panelVa', 'panelEwallet'];
            const tabs = ['tabQris', 'tabVa', 'tabEwallet'];

            panels.forEach(p => {
                document.getElementById(p).classList.add('hidden');
            });
            tabs.forEach(t => {
                const el = document.getElementById(t);
                el.classList.remove('bg-white', 'text-brand', 'shadow-sm');
                el.classList.add('text-ink3');
            });

            if (channel === 'qris') {
                document.getElementById('panelQris').classList.remove('hidden');
                document.getElementById('tabQris').classList.add('bg-white', 'text-brand', 'shadow-sm');
                document.getElementById('tabQris').classList.remove('text-ink3');
            } else if (channel === 'va') {
                document.getElementById('panelVa').classList.remove('hidden');
                document.getElementById('tabVa').classList.add('bg-white', 'text-brand', 'shadow-sm');
                document.getElementById('tabVa').classList.remove('text-ink3');
            } else if (channel === 'ewallet') {
                document.getElementById('panelEwallet').classList.remove('hidden');
                document.getElementById('tabEwallet').classList.add('bg-white', 'text-brand', 'shadow-sm');
                document.getElementById('tabEwallet').classList.remove('text-ink3');
            }
        }

        function copyText(elementId, successMsg) {
            const text = document.getElementById(elementId).innerText;
            navigator.clipboard.writeText(text).then(() => {
                showToast(successMsg);
            }).catch(() => {
                showToast(successMsg);
            });
        }

        function showToast(msg) {
            const toast = document.getElementById("toastNotification");
            document.getElementById("toastMessage").innerText = msg;
            toast.classList.remove("toast-hide");
            toast.classList.add("toast-show");
            setTimeout(() => {
                toast.classList.remove("toast-show");
                toast.classList.add("toast-hide");
            }, 2500);
        }
    </script>
</body>
</html>
