<?php

namespace App\Http\Controllers;

use App\Models\Couple;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Guest;
use App\Models\Rsvp;
use App\Models\Wish;
use App\Services\MapsLinkResolver;
use App\Services\MidtransService;
use App\Services\TemplateManager;
use App\Services\WhatsAppBulkSender;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class InvitationController extends Controller
{
    public function index(Request $request)
    {
        // Load data; on any DB error fall back to static placeholder values
        try {
            $couple = Couple::with([
                'events' => fn ($q) => $q->orderBy('sort_order')->orderBy('date'),
                'galleries' => fn ($q) => $q->orderBy('sort_order'),
            ])->first();
            if ($couple && ($couple->groom_name === 'Riko' || $couple->bride_name === 'Putri')) {
                $couple->update([
                    'slug' => 'd-karsa',
                    'groom_name' => "D'Karsa",
                    'bride_name' => 'Official',
                    'groom_fullname' => "D'Karsa Digital",
                    'bride_fullname' => "D'Karsa Wedding",
                ]);
            }
            $guest = $request->filled('to') ? Guest::where('slug', $request->query('to'))->first() : null;
            $wishes = Wish::where('is_approved', true)->latest()->take(50)->get();
            if (! $couple) {
                throw new \Exception('No couple data');
            }
        } catch (\Exception $e) {
            // Static placeholder sufficient for view rendering without DB
            $couple = (object) [
                'slug' => 'd-karsa',
                // basic names
                'groom_name' => "D'Karsa",
                'bride_name' => 'Wedding',
                // full names for meta description
                'groom_fullname' => "D'Karsa Digital",
                'bride_fullname' => "D'Karsa Wedding",
                // parental info used in couple partial
                'groom_father' => 'Bapak Hendra',
                'groom_mother' => 'Ibu Ratna',
                'bride_father' => 'Bapak Surya',
                'bride_mother' => 'Ibu Dewi',
                // wedding details
                'wedding_date' => now()->addMonths(2),
                'venue_name' => 'Gedung Serbaguna Bahagia, Jakarta',
                'quote' => 'Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, supaya kamu cenderung dan merasa tenteram kepadanya.',
                // optional photos for hero/couple fallback
                'cover_photo' => null,
                'groom_photo' => null,
                'bride_photo' => null,
                // empty relations used in timeline and gallery
                'events' => collect(),
                'galleries' => collect(),
            ];
            $guest = null;
            $wishes = collect();
        }

        return view('invitation', compact('couple', 'guest', 'wishes'));
    }

    public function create()
    {
        return view('builder.index', ['musicLibrary' => $this->musicLibrary()]);
    }

    /**
     * Pustaka musik latar: semua berkas audio di public/audio dan storage/app/public/audio.
     *
     * @return array<int, array{file: string, label: string, mood: string, url: string}>
     */
    private function musicLibrary(): array
    {
        $sources = [
            ['dir' => public_path('audio'), 'url' => '/audio/'],
            ['dir' => storage_path('app/public/audio'), 'url' => '/storage/audio/'],
        ];

        $library = [];

        foreach ($sources as $source) {
            if (! is_dir($source['dir'])) {
                continue;
            }

            foreach (glob($source['dir'].'/*.{mp3,wav,m4a,ogg}', GLOB_BRACE) ?: [] as $path) {
                $file = basename($path);

                if (isset($library[$file])) {
                    continue;
                }

                $library[$file] = [
                    'file' => $file,
                    'label' => Str::of(pathinfo($file, PATHINFO_FILENAME))
                        ->replace(['-', '_'], ' ')
                        ->title()
                        ->toString(),
                    'mood' => $this->musicMood($file),
                    'url' => $source['url'].$file,
                ];
            }
        }

        ksort($library);

        return array_values($library);
    }

    private function musicMood(string $file): string
    {
        $name = strtolower($file);

        return match (true) {
            str_contains($name, 'wedding') => 'Romantis',
            str_contains($name, 'celebration') => 'Ceria',
            str_contains($name, 'islamic') => 'Islami',
            str_contains($name, 'lullaby') => 'Lembut',
            default => 'Instrumental',
        };
    }

    public function store(Request $request)
    {
        $rules = [
            // Category & Header
            'category' => 'nullable|string|max:100',
            'sub_category' => 'nullable|string|max:150',
            'event_heading' => 'nullable|string|max:150',
            'wedding_date' => 'required|date',
            'quote' => 'nullable|string|max:1000',
            'slug' => 'nullable|string|max:150',

            // Groom
            'groom_name' => 'required|string|max:100',
            'groom_fullname' => 'nullable|string|max:200',
            'groom_birth_order' => 'nullable|string|max:100',
            'groom_father' => 'nullable|string|max:150',
            'groom_mother' => 'nullable|string|max:150',
            'groom_city' => 'nullable|string|max:100',
            'groom_photo' => 'nullable|image|max:5120',

            // Bride / Pihak 2 / Pendamping
            'bride_name' => 'nullable|string|max:100',
            'bride_fullname' => 'nullable|string|max:200',
            'bride_birth_order' => 'nullable|string|max:100',
            'bride_father' => 'nullable|string|max:150',
            'bride_mother' => 'nullable|string|max:150',
            'bride_city' => 'nullable|string|max:100',
            'bride_photo' => 'nullable|image|max:5120',

            // Cover & layout
            'display_order' => 'nullable|in:groom_first,bride_first',
            'cover_photo' => 'nullable|image|max:5120',

            // Event 1 (Akad/Main)
            'event_1_title' => 'nullable|string|max:150',
            'event_1_date' => 'nullable|date',
            'event_1_start_time' => 'nullable|string|max:20',
            'event_1_end_time' => 'nullable|string|max:20',
            'event_1_venue' => 'nullable|string|max:200',
            'event_1_address' => 'nullable|string|max:500',
            'event_1_maps_url' => 'nullable|string|max:500',

            // Event 2 (Resepsi/Party)
            'event_2_title' => 'nullable|string|max:150',
            'event_2_date' => 'nullable|date',
            'event_2_start_time' => 'nullable|string|max:20',
            'event_2_end_time' => 'nullable|string|max:20',
            'event_2_venue' => 'nullable|string|max:200',
            'event_2_address' => 'nullable|string|max:500',
            'event_2_maps_url' => 'nullable|string|max:500',

            // Dynamic events array
            'events' => 'nullable|array',
            'events.*.title' => 'nullable|string|max:150',
            'events.*.date' => 'nullable|date',
            'events.*.start_time' => 'nullable|string|max:30',
            'events.*.end_time' => 'nullable|string|max:30',
            'events.*.venue_name' => 'nullable|string|max:200',
            'events.*.address' => 'nullable|string|max:500',
            'events.*.maps_url' => 'nullable|string|max:500',

            // Digital Bank / Gift
            'bank_name_1' => 'nullable|string|max:80',
            'bank_account_1' => 'nullable|string|max:80',
            'bank_holder_1' => 'nullable|string|max:150',
            'bank_name_2' => 'nullable|string|max:80',
            'bank_account_2' => 'nullable|string|max:80',
            'bank_holder_2' => 'nullable|string|max:150',
            'gift_address' => 'nullable|string|max:500',

            // Customer contact (Wajib untuk verifikasi & ACC)
            'customer_name' => 'required|string|max:150',
            'customer_phone' => 'required|string|max:50',

            // Extras
            'music_url' => 'nullable|string|max:255',
            'music_source' => 'nullable|string|in:library,upload',
            'music_file' => 'nullable|file|mimes:mp3,wav,m4a,ogg|max:10240',
            'thank_you_note' => 'nullable|string|max:1000',
            'story' => 'nullable|string|max:4000',
            'gallery_photos.*' => 'nullable|image|max:5120',
            'is_in_catalog' => 'nullable|boolean',
        ];

        $messages = [
            'groom_photo.max' => 'Ukuran foto mempelai pria tidak boleh lebih dari 5 MB.',
            'groom_photo.image' => 'File foto mempelai pria harus berupa gambar (JPG, PNG, atau WEBP).',
            'bride_photo.max' => 'Ukuran foto mempelai wanita tidak boleh lebih dari 5 MB.',
            'bride_photo.image' => 'File foto mempelai wanita harus berupa gambar (JPG, PNG, atau WEBP).',
            'cover_photo.max' => 'Ukuran foto sampul (cover) tidak boleh lebih dari 5 MB.',
            'cover_photo.image' => 'File foto sampul (cover) harus berupa gambar (JPG, PNG, atau WEBP).',
            'gallery_photos.*.max' => 'Setiap foto galeri tidak boleh lebih dari 5 MB.',
            'gallery_photos.*.image' => 'File foto galeri harus berupa gambar (JPG, PNG, atau WEBP).',
            'wedding_date.required' => 'Tanggal acara / pernikahan wajib diisi.',
            'wedding_date.date' => 'Format tanggal acara tidak valid.',
            'groom_name.required' => 'Nama mempelai / pihak utama wajib diisi.',
            'customer_name.required' => 'Nama lengkap pemesan wajib diisi untuk verifikasi & ACC undangan.',
            'customer_phone.required' => 'Nomor WhatsApp pemesan wajib diisi untuk konfirmasi undangan.',
        ];

        $validated = $request->validate($rules, $messages);

        $category = ! empty($validated['category']) ? ucwords(strtolower(trim($validated['category']))) : 'Pernikahan';
        $isNonWedding = ($category !== 'Pernikahan');
        $brideName = ! empty($validated['bride_name'])
            ? $validated['bride_name']
            : ($isNonWedding ? 'Keluarga' : 'Mempelai Wanita');
        $brideFullName = ! empty($validated['bride_fullname'])
            ? $validated['bride_fullname']
            : ($isNonWedding ? 'Keluarga Besar' : $brideName);

        // Generate unique slug
        $slugBase = $validated['groom_name'];
        if (! $isNonWedding && ! empty($validated['bride_name'])) {
            $slugBase .= '-'.$validated['bride_name'];
        }
        $rawSlug = ! empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($slugBase);
        if (empty($rawSlug)) {
            $rawSlug = 'undangan-'.Str::lower(Str::random(6));
        }
        $slug = $rawSlug;
        $count = 2;
        while (Couple::where('slug', $slug)->exists()) {
            $slug = "{$rawSlug}-{$count}";
            $count++;
        }

        // Handle Photo Uploads (Supports standard binary file upload & base64 session fallback)
        $groomPhotoPath = null;
        if ($request->hasFile('groom_photo')) {
            $groomPhotoPath = $request->file('groom_photo')->store('couples', 'public');
        } elseif ($request->filled('groom_photo_base64')) {
            $groomPhotoPath = $this->saveBase64Image($request->input('groom_photo_base64'), 'couples');
        }

        $bridePhotoPath = null;
        if ($request->hasFile('bride_photo')) {
            $bridePhotoPath = $request->file('bride_photo')->store('couples', 'public');
        } elseif ($request->filled('bride_photo_base64')) {
            $bridePhotoPath = $this->saveBase64Image($request->input('bride_photo_base64'), 'couples');
        }

        $coverPhotoPath = null;
        if ($request->hasFile('cover_photo')) {
            $coverPhotoPath = $request->file('cover_photo')->store('couples/covers', 'public');
        } elseif ($request->filled('cover_photo_base64')) {
            $coverPhotoPath = $this->saveBase64Image($request->input('cover_photo_base64'), 'couples/covers');
        }

        $selectedPackage = $request->input('selected_package') ?: $request->input('package');
        $selectedTheme = $request->input('selected_theme') ?: $request->input('theme');
        $customDesign = $request->input('custom_design_request');

        $storyNotes = [];
        if (! empty($validated['sub_category'])) {
            $storyNotes[] = 'Sub-Kategori: '.$validated['sub_category'];
        }
        if (! empty($selectedPackage)) {
            $storyNotes[] = 'Paket: '.$selectedPackage;
        }
        if (! empty($selectedTheme)) {
            $storyNotes[] = 'Tema: '.$selectedTheme;
        }
        if (! empty($customDesign)) {
            $storyNotes[] = 'Request Kustom Desain: '.$customDesign;
        }

        $amount = MidtransService::getPackagePrice($selectedPackage);
        $invoiceNumber = MidtransService::generateInvoiceNumber();

        $musicUrl = $validated['music_url'] ?? null;
        if ($request->hasFile('music_file')) {
            $musicPath = $request->file('music_file')->store('audio/uploads', 'public');
            $musicUrl = 'storage/'.$musicPath;
        }

        $couple = Couple::create([
            'slug' => $slug,
            'category' => $category,
            'sub_category' => $validated['sub_category'] ?? null,
            'theme' => $selectedTheme,
            'package_name' => $selectedPackage,
            'amount' => $amount,
            'invoice_number' => $invoiceNumber,
            'payment_status' => 'pending',
            'event_heading' => (! empty($validated['event_heading'])) ? $validated['event_heading'] : ($isNonWedding ? 'UNDANGAN '.strtoupper($category) : "WALIMATUL 'URSY"),
            'groom_name' => $validated['groom_name'],
            'groom_fullname' => (! empty($validated['groom_fullname'])) ? $validated['groom_fullname'] : $validated['groom_name'],
            'groom_birth_order' => $validated['groom_birth_order'] ?? null,
            'groom_father' => $validated['groom_father'] ?? null,
            'groom_mother' => $validated['groom_mother'] ?? null,
            'groom_city' => $validated['groom_city'] ?? null,
            'groom_photo' => $groomPhotoPath,

            'bride_name' => $brideName,
            'bride_fullname' => $brideFullName,
            'bride_birth_order' => $validated['bride_birth_order'] ?? null,
            'bride_father' => $validated['bride_father'] ?? null,
            'bride_mother' => $validated['bride_mother'] ?? null,
            'bride_city' => $validated['bride_city'] ?? null,
            'bride_photo' => $bridePhotoPath,

            'display_order' => $validated['display_order'] ?? 'groom_first',
            'cover_photo' => $coverPhotoPath,
            'wedding_date' => $validated['wedding_date'],
            'venue_name' => (! empty($validated['event_2_venue'])) ? $validated['event_2_venue'] : ((! empty($validated['event_1_venue'])) ? $validated['event_1_venue'] : 'Lokasi Acara'),
            'quote' => (! empty($validated['quote'])) ? $validated['quote'] : 'Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya.',

            'bank_name_1' => $validated['bank_name_1'] ?? null,
            'bank_account_1' => $validated['bank_account_1'] ?? null,
            'bank_holder_1' => $validated['bank_holder_1'] ?? null,
            'bank_name_2' => $validated['bank_name_2'] ?? null,
            'bank_account_2' => $validated['bank_account_2'] ?? null,
            'bank_holder_2' => $validated['bank_holder_2'] ?? null,
            'gift_address' => $validated['gift_address'] ?? null,
            'music_url' => $musicUrl,
            'thank_you_note' => $validated['thank_you_note'] ?? null,
            'story' => $validated['story'] ?? (! empty($storyNotes) ? implode("\n", $storyNotes) : null),
            'customer_name' => $validated['customer_name'] ?? null,
            'customer_phone' => $validated['customer_phone'] ?? null,
            'status' => 'pending',
            'is_in_catalog' => $request->boolean('is_in_catalog'),
        ]);

        // Save events: check if dynamic events array was submitted
        if ($request->has('events') && is_array($request->input('events')) && count($request->input('events')) > 0) {
            $sortOrder = 1;
            foreach ($request->input('events') as $evData) {
                if (! empty($evData['title']) || ! empty($evData['venue_name']) || ! empty($evData['address'])) {
                    Event::create([
                        'couple_id' => $couple->id,
                        'title' => ! empty($evData['title']) ? $evData['title'] : 'Rangkaian Acara '.$sortOrder,
                        'date' => ! empty($evData['date']) ? $evData['date'] : $validated['wedding_date'],
                        'start_time' => $evData['start_time'] ?? null,
                        'end_time' => $evData['end_time'] ?? null,
                        'venue_name' => ! empty($evData['venue_name']) ? $evData['venue_name'] : 'Lokasi Acara',
                        'address' => $evData['address'] ?? null,
                        'maps_url' => ! empty($evData['maps_url']) ? MapsLinkResolver::expand($evData['maps_url']) : 'https://maps.google.com',
                        'sort_order' => $sortOrder,
                    ]);
                    $sortOrder++;
                }
            }
        } else {
            // Fallback: Create Event 1 (Akad / Acara Utama)
            if (! empty($validated['event_1_title']) || ! empty($validated['event_1_venue'])) {
                Event::create([
                    'couple_id' => $couple->id,
                    'title' => (! empty($validated['event_1_title'])) ? $validated['event_1_title'] : ($category === 'Pernikahan' ? 'Akad Nikah' : 'Acara Utama'),
                    'date' => (! empty($validated['event_1_date'])) ? $validated['event_1_date'] : $validated['wedding_date'],
                    'start_time' => (! empty($validated['event_1_start_time'])) ? $validated['event_1_start_time'] : '08:00 WIB',
                    'end_time' => (! empty($validated['event_1_end_time'])) ? $validated['event_1_end_time'] : '10:00 WIB',
                    'venue_name' => (! empty($validated['event_1_venue'])) ? $validated['event_1_venue'] : 'Masjid / Lokasi Acara',
                    'address' => $validated['event_1_address'] ?? null,
                    'maps_url' => (! empty($validated['event_1_maps_url'])) ? MapsLinkResolver::expand($validated['event_1_maps_url']) : 'https://maps.google.com',
                    'sort_order' => 1,
                ]);
            }

            // Fallback: Create Event 2 (Resepsi / Tasyakuran)
            if (! empty($validated['event_2_venue']) || ! empty($validated['event_2_title'])) {
                Event::create([
                    'couple_id' => $couple->id,
                    'title' => (! empty($validated['event_2_title'])) ? $validated['event_2_title'] : ($category === 'Pernikahan' ? 'Resepsi Pernikahan' : 'Ramah Tamah & Tasyakuran'),
                    'date' => (! empty($validated['event_2_date'])) ? $validated['event_2_date'] : $validated['wedding_date'],
                    'start_time' => (! empty($validated['event_2_start_time'])) ? $validated['event_2_start_time'] : '11:00 WIB',
                    'end_time' => (! empty($validated['event_2_end_time'])) ? $validated['event_2_end_time'] : '14:00 WIB',
                    'venue_name' => (! empty($validated['event_2_venue'])) ? $validated['event_2_venue'] : 'Ballroom / Gedung Serbaguna',
                    'address' => $validated['event_2_address'] ?? null,
                    'maps_url' => (! empty($validated['event_2_maps_url'])) ? MapsLinkResolver::expand($validated['event_2_maps_url']) : 'https://maps.google.com',
                    'sort_order' => 2,
                ]);
            }
        }

        // Catatan: Pembuatan data tamu dummy (Bapak Budi Santoso & Sahabat) telah dinonaktifkan
        // agar database Daftar Tamu bersih dan hanya diisi tamu riil dari customer/admin.

        // Create Galleries (Supports binary uploads, base64 array, and automatic couple photo showcase)
        $galleryIndex = 1;
        if ($request->hasFile('gallery_photos')) {
            foreach ($request->file('gallery_photos') as $photo) {
                $gPath = $photo->store('couples/galleries', 'public');
                Gallery::create([
                    'couple_id' => $couple->id,
                    'image' => $gPath,
                    'sort_order' => $galleryIndex++,
                ]);
            }
        } elseif ($request->filled('gallery_photos_base64')) {
            $rawGal = json_decode($request->input('gallery_photos_base64'), true);
            if (is_array($rawGal)) {
                foreach ($rawGal as $b64) {
                    $gPath = $this->saveBase64Image($b64, 'couples/galleries');
                    if ($gPath) {
                        Gallery::create([
                            'couple_id' => $couple->id,
                            'image' => $gPath,
                            'sort_order' => $galleryIndex++,
                        ]);
                    }
                }
            }
        }

        // If no gallery photos exist yet, automatically showcase customer's cover and couple photos in the gallery
        if ($galleryIndex === 1) {
            if ($coverPhotoPath) {
                Gallery::create(['couple_id' => $couple->id, 'image' => $coverPhotoPath, 'sort_order' => $galleryIndex++]);
            }
            if ($groomPhotoPath) {
                Gallery::create(['couple_id' => $couple->id, 'image' => $groomPhotoPath, 'sort_order' => $galleryIndex++]);
            }
            if ($bridePhotoPath) {
                Gallery::create(['couple_id' => $couple->id, 'image' => $bridePhotoPath, 'sort_order' => $galleryIndex++]);
            }
        }

        return redirect()->route('midtrans.checkout', ['slug' => $couple->slug]);
    }

    public function success(Request $request, string $slug)
    {
        $couple = Couple::with('events')->where('slug', $slug)->firstOrFail();

        // If returned from Midtrans redirect with settlement / success status
        $status = $request->query('transaction_status');
        $statusCode = $request->query('status_code');
        if (($status === 'settlement' || $status === 'capture' || $statusCode == '200') && $couple->payment_status !== 'paid') {
            app(MidtransService::class)->markAsPaid(
                $couple,
                'Midtrans - '.strtoupper($request->query('payment_type', 'Virtual Account / QRIS')),
                $request->query('order_id')
            );
            session()->flash('payment_success', 'Pembayaran via Midtrans berhasil diverifikasi! Undangan Anda kini telah aktif.');
        }

        return view('builder.success', compact('couple'));
    }

    public function showInvitation(Request $request, string $slug)
    {
        $couple = Couple::with([
            'events' => fn ($q) => $q->orderBy('sort_order')->orderBy('date'),
            'galleries' => fn ($q) => $q->orderBy('sort_order'),
        ])->where('slug', $slug)->firstOrFail();

        // Check if invitation is still pending review
        $isAdminPreview = false;
        if ($couple->status !== 'published') {
            if (auth()->check()) {
                $isAdminPreview = true;
            } else {
                return response()->view('invitations.pending', compact('couple'));
            }
        }

        $toParam = $request->query('to');
        // Tautan memakai tanda hubung (Bapak-Andi-Wijaya) → nama asli dikembalikan dengan spasi.
        $toName = $this->guestNameFromParam($toParam);
        $guest = null;

        if (! empty($toParam)) {
            $guest = Guest::where('couple_id', $couple->id)
                ->where(function ($query) use ($toParam, $toName) {
                    $query->where('slug', $toParam)->orWhere('slug', Str::slug($toName));
                })
                ->first();

            if (! $guest) {
                $guest = Guest::where('slug', $toParam)->orWhere('slug', Str::slug($toName))->first();
            }

            if (! $guest) {
                $guest = (object) [
                    'name' => $toName,
                    'slug' => Str::slug($toName),
                    'category' => 'Tamu Undangan',
                    'quota' => 2,
                ];
            }
        }

        if (! $guest) {
            $guest = (object) [
                'name' => 'Bapak / Ibu / Saudara/i',
                'slug' => 'tamu-kehormatan',
                'category' => 'Tamu Kehormatan',
                'quota' => 2,
            ];
        }

        $wishes = Wish::where('couple_id', $couple->id)
            ->where('is_approved', true)
            ->latest()
            ->take(50)
            ->get();

        $templateKey = TemplateManager::resolveKey($couple->theme, $couple->category, $couple->sub_category);
        $template = TemplateManager::get($templateKey);
        $isDemo = false;
        $galleries = $couple->galleries;

        return view($template['blade'], compact('couple', 'guest', 'wishes', 'isAdminPreview', 'template', 'isDemo', 'galleries'));
    }

    /**
     * Indeks demo lokal: 179 template × 4 paket, dikelompokkan per bab.
     */
    public function demoIndex()
    {
        $rows = json_decode((string) @file_get_contents(base_path('docs/template-pricing-catalog.json')), true) ?: [];
        $themes = collect(TemplateManager::all())->keyBy('key');
        $groups = [];

        foreach ($rows as $row) {
            $key = $row['template_key'] ?? null;
            if (! $key || ! $themes->has($key)) {
                continue;
            }

            $groups[$row['l1_bab'] ?? 'Lainnya'][] = [
                'key' => $key,
                'code' => $row['code'] ?? '',
                'name' => $themes[$key]['name'] ?? $key,
                'style' => $row['l3_style'] ?? '',
                'color' => $row['l4_color_name'] ?? '',
            ];
        }

        ksort($groups);

        return view('demo-index', [
            'groups' => $groups,
            'total' => array_sum(array_map('count', $groups)),
        ]);
    }

    public function demoTemplate(Request $request, string $templateKey, ?string $tier = null)
    {
        // Paket bisa lewat segmen path (/demo/{key}/premium) atau query (?tier=premium).
        if ($tier !== null && in_array($tier, ['basic', 'premium', 'eksklusif', 'kustom'], true)) {
            $request->query->set('tier', $tier);
        }

        $category = $request->query('category');
        $subCategory = $request->query('sub_category');
        $key = TemplateManager::resolveKey($templateKey, $category, $subCategory);
        $template = TemplateManager::get($key);

        // Allow live query parameters (e.g. from Builder Live Preview frame)
        $overrides = [];
        if ($request->filled('groom_name')) {
            $overrides['groom_name'] = $request->query('groom_name');
        }
        if ($request->filled('bride_name')) {
            $overrides['bride_name'] = $request->query('bride_name');
        }
        if ($request->filled('groom_fullname')) {
            $overrides['groom_fullname'] = $request->query('groom_fullname');
        }
        if ($request->filled('bride_fullname')) {
            $overrides['bride_fullname'] = $request->query('bride_fullname');
        }
        if ($request->filled('groom_birth_order')) {
            $overrides['groom_birth_order'] = $request->query('groom_birth_order');
        }
        if ($request->filled('groom_father')) {
            $overrides['groom_father'] = $request->query('groom_father');
        }
        if ($request->filled('groom_mother')) {
            $overrides['groom_mother'] = $request->query('groom_mother');
        }
        if ($request->filled('groom_parents')) {
            $overrides['groom_parents'] = $request->query('groom_parents');
        }
        if ($request->filled('groom_city')) {
            $overrides['groom_city'] = $request->query('groom_city');
        }

        if ($request->filled('bride_birth_order')) {
            $overrides['bride_birth_order'] = $request->query('bride_birth_order');
        }
        if ($request->filled('bride_father')) {
            $overrides['bride_father'] = $request->query('bride_father');
        }
        if ($request->filled('bride_mother')) {
            $overrides['bride_mother'] = $request->query('bride_mother');
        }
        if ($request->filled('bride_parents')) {
            $overrides['bride_parents'] = $request->query('bride_parents');
        }
        if ($request->filled('bride_city')) {
            $overrides['bride_city'] = $request->query('bride_city');
        }

        if ($request->filled('wedding_date')) {
            try {
                $overrides['wedding_date'] = Carbon::parse($request->query('wedding_date'));
            } catch (\Exception $e) {
            }
        }
        if ($request->filled('venue_name')) {
            $overrides['venue_name'] = $request->query('venue_name');
        }
        if ($request->filled('quote')) {
            $overrides['quote'] = $request->query('quote');
        }
        if ($request->filled('event_heading')) {
            $overrides['event_heading'] = $request->query('event_heading');
        }
        if ($request->filled('category')) {
            $overrides['category'] = $request->query('category');
        }
        if ($request->filled('sub_category')) {
            $overrides['sub_category'] = $request->query('sub_category');
        }
        if ($request->filled('cover_photo')) {
            $overrides['cover_photo'] = $request->query('cover_photo');
        }
        if ($request->filled('groom_photo')) {
            $overrides['groom_photo'] = $request->query('groom_photo');
        }
        if ($request->filled('bride_photo')) {
            $overrides['bride_photo'] = $request->query('bride_photo');
        }

        // Bank and Gift parameters with full cross-key compatibility
        $bName1 = $request->query('bank_name_1') ?: $request->query('bank_name');
        if (! empty($bName1)) {
            $overrides['bank_name_1'] = $bName1;
            $overrides['bank_name'] = $bName1;
        }

        $bAcc1 = $request->query('bank_account_1') ?: $request->query('account_number');
        if (! empty($bAcc1)) {
            $overrides['bank_account_1'] = $bAcc1;
            $overrides['account_number'] = $bAcc1;
        }

        $bHolder1 = $request->query('bank_holder_1') ?: $request->query('account_name');
        if (! empty($bHolder1)) {
            $overrides['bank_holder_1'] = $bHolder1;
            $overrides['account_name'] = $bHolder1;
        }

        if ($request->filled('bank_name_2')) {
            $overrides['bank_name_2'] = $request->query('bank_name_2');
        }
        if ($request->filled('bank_account_2')) {
            $overrides['bank_account_2'] = $request->query('bank_account_2');
        }
        if ($request->filled('bank_holder_2')) {
            $overrides['bank_holder_2'] = $request->query('bank_holder_2');
        }
        if ($request->filled('gift_address')) {
            $overrides['gift_address'] = $request->query('gift_address');
        }

        // Custom events override if provided via JSON array or legacy event parameters
        if ($request->filled('events_json')) {
            $rawEvents = json_decode($request->query('events_json'), true);
            if (is_array($rawEvents) && count($rawEvents) > 0) {
                $evList = [];
                $firstRawDate = ! empty($rawEvents[0]['date']) ? $rawEvents[0]['date'] : null;
                $baseDate = ! empty($firstRawDate)
                    ? $firstRawDate
                    : (isset($overrides['wedding_date']) && $overrides['wedding_date'] instanceof Carbon
                        ? $overrides['wedding_date']->format('Y-m-d')
                        : now()->format('Y-m-d'));

                foreach ($rawEvents as $i => $ev) {
                    $evList[] = (object) [
                        'title' => $ev['title'] ?? 'Acara '.($i + 1),
                        'date' => ! empty($ev['date']) ? $ev['date'] : $baseDate,
                        'start_time' => $ev['start_time'] ?? '',
                        'end_time' => $ev['end_time'] ?? '',
                        'venue_name' => $ev['venue_name'] ?? ($overrides['venue_name'] ?? 'Lokasi Acara'),
                        'address' => $ev['address'] ?? '',
                        'maps_url' => $ev['maps_url'] ?? 'https://maps.google.com',
                        'sort_order' => $i + 1,
                    ];
                }
                $overrides['events'] = collect($evList);

                // Harmonize primary date, time, and venue from the first event
                if (! empty($evList[0])) {
                    if (empty($overrides['wedding_date']) && ! empty($evList[0]->date)) {
                        try {
                            $overrides['wedding_date'] = Carbon::parse($evList[0]->date);
                        } catch (\Exception $e) {
                        }
                    }
                    if (! empty($evList[0]->start_time) && empty($overrides['wedding_time'])) {
                        $overrides['wedding_time'] = $evList[0]->start_time;
                    }
                    if (! empty($evList[0]->venue_name) && empty($overrides['venue_name'])) {
                        $overrides['venue_name'] = $evList[0]->venue_name;
                    }
                    if (! empty($evList[0]->address)) {
                        $overrides['venue_address'] = $evList[0]->address;
                        $overrides['address'] = $evList[0]->address;
                    }
                    if (! empty($evList[0]->maps_url)) {
                        $overrides['maps_url'] = $evList[0]->maps_url;
                    }
                }
            }
        } elseif ($request->filled('event_1_title') || $request->filled('event_1_venue') || $request->filled('event_2_title') || $request->filled('event_2_venue')) {
            $evList = [];
            $ev1Date = $request->query('event_1_date', $request->query('wedding_date', now()->format('Y-m-d')));
            $evList[] = (object) [
                'title' => $request->query('event_1_title', 'Akad Nikah / Acara Utama'),
                'date' => $ev1Date,
                'start_time' => $request->query('event_1_start_time', '08:00 WIB'),
                'end_time' => $request->query('event_1_end_time', '10:00 WIB'),
                'venue_name' => $request->query('event_1_venue', $overrides['venue_name'] ?? 'Lokasi Acara'),
                'address' => $request->query('event_1_address', 'Alamat Acara Utama'),
                'maps_url' => $request->query('event_1_maps_url', 'https://maps.google.com'),
                'sort_order' => 1,
            ];

            if ($request->filled('event_2_title') || $request->filled('event_2_venue')) {
                $ev2Date = $request->query('event_2_date', $ev1Date);
                $evList[] = (object) [
                    'title' => $request->query('event_2_title', 'Resepsi / Ramah Tamah'),
                    'date' => $ev2Date,
                    'start_time' => $request->query('event_2_start_time', '11:00 WIB'),
                    'end_time' => $request->query('event_2_end_time', '14:00 WIB'),
                    'venue_name' => $request->query('event_2_venue', $request->query('event_1_venue', 'Lokasi Acara')),
                    'address' => $request->query('event_2_address', 'Alamat Acara Resepsi'),
                    'maps_url' => $request->query('event_2_maps_url', 'https://maps.google.com'),
                    'sort_order' => 2,
                ];
            }
            $overrides['events'] = collect($evList);

            if (empty($overrides['wedding_date']) && ! empty($ev1Date)) {
                try {
                    $overrides['wedding_date'] = Carbon::parse($ev1Date);
                } catch (\Exception $e) {
                }
            }
        }

        // Custom galleries override if provided via JSON array
        if ($request->filled('galleries_json')) {
            $rawGalleries = json_decode($request->query('galleries_json'), true);
            if (is_array($rawGalleries) && count($rawGalleries) > 0) {
                $galList = [];
                foreach ($rawGalleries as $i => $gImg) {
                    $galList[] = (object) [
                        'image' => $gImg,
                        'sort_order' => $i + 1,
                    ];
                }
                $overrides['galleries'] = collect($galList);
            }
        }

        $couple = TemplateManager::getDemoCouple($key, $overrides);
        $guest = TemplateManager::getDemoGuest($request->query('to'));
        $wishes = TemplateManager::getDemoWishes();
        $isDemo = true;
        $isAdminPreview = false;
        $galleries = $couple->galleries ?? collect();

        return view($template['blade'], compact('couple', 'guest', 'wishes', 'isDemo', 'isAdminPreview', 'template', 'galleries'));
    }

    /**
     * Simpan data pratinjau di server dan kembalikan tautan pendek /p/{token}.
     * Dipakai builder untuk tombol "Buka Undangan Tes" supaya URL tidak berisi puluhan parameter.
     */
    public function previewLink(Request $request): JsonResponse
    {
        $params = $request->input('params', []);
        if (! is_array($params)) {
            $params = [];
        }

        $params = array_filter($params, static fn ($value) => is_scalar($value) && $value !== '');
        $params = $this->expandMapsParams($params);
        $key = (string) ($request->input('template_key') ?: ($params['template_key'] ?? 'chibi-red'));
        unset($params['template_key'], $params['_key']);

        $params['_key'] = $key;
        $token = Str::lower(Str::random(9));

        Cache::put('preview:'.$token, $params, now()->addDays(30));

        return response()->json([
            'url' => route('invitation.preview', $token),
            'token' => $token,
        ]);
    }

    /**
     * Tautan pratinjau pendek: muat kembali data tersimpan lalu render seperti /demo/{key}.
     */
    public function shortPreview(string $token)
    {
        $payload = Cache::get('preview:'.$token);
        abort_unless(is_array($payload), 404);

        $key = (string) ($payload['_key'] ?? 'chibi-red');
        unset($payload['_key']);

        return $this->demoTemplate(Request::create('/demo/'.$key, 'GET', $payload), $key);
    }

    /**
     * Rapikan tautan Google Maps pada parameter pratinjau supaya peta mengikuti titik yang dipilih.
     *
     * @param  array<string, mixed>  $params
     * @return array<string, mixed>
     */
    private function expandMapsParams(array $params): array
    {
        foreach (['event_1_maps_url', 'event_2_maps_url'] as $fieldName) {
            if (! empty($params[$fieldName]) && is_string($params[$fieldName])) {
                $params[$fieldName] = MapsLinkResolver::expand($params[$fieldName]);
            }
        }

        if (! empty($params['events_json']) && is_string($params['events_json'])) {
            $events = json_decode($params['events_json'], true);
            if (is_array($events)) {
                foreach ($events as $index => $event) {
                    if (is_array($event) && ! empty($event['maps_url']) && is_string($event['maps_url'])) {
                        $events[$index]['maps_url'] = MapsLinkResolver::expand($event['maps_url']);
                    }
                }
                $params['events_json'] = json_encode($events);
            }
        }

        return $params;
    }

    /**
     * Halaman pengelola link tamu untuk undangan uji (/p/{token}).
     * Link tamu mengikuti tautan undangan yang benar-benar ada, bukan /undangan/{slug} yang belum terbit.
     */
    public function shortPreviewGuestLinks(string $token)
    {
        $payload = Cache::get('preview:'.$token);
        abort_unless(is_array($payload), 404);

        $groom = trim((string) ($payload['groom_name'] ?? $payload['groom_fullname'] ?? ''));
        $bride = trim((string) ($payload['bride_name'] ?? $payload['bride_fullname'] ?? ''));
        $title = trim((string) ($payload['event_heading'] ?? ''));

        if ($groom !== '' && $bride !== '') {
            $title = $groom.' & '.$bride;
        } elseif ($title === '') {
            $title = 'Undangan uji';
        }

        return view('invitation.guest-links', [
            'token' => $token,
            'guestBaseUrl' => route('invitation.preview', $token),
            'invitationTitle' => $title,
        ]);
    }

    /**
     * Ubah parameter ?to= menjadi nama yang enak dibaca.
     * "Bapak-Andi-Wijaya" → "Bapak Andi Wijaya"; nama dengan spasi dibiarkan apa adanya.
     */
    private function guestNameFromParam(?string $param): string
    {
        $raw = trim((string) $param);

        if ($raw === '') {
            return '';
        }

        $decoded = urldecode($raw);

        if (! str_contains($decoded, ' ') && str_contains($decoded, '-')) {
            $decoded = str_replace('-', ' ', $decoded);
        }

        return trim(preg_replace('/\s+/', ' ', $decoded));
    }

    /**
     * Tes kirim satu undangan (untuk memastikan provider benar-benar bekerja).
     */
    public function testSendGuest(Request $request, WhatsAppBulkSender $sender): JsonResponse
    {
        $data = $request->validate([
            'phone' => 'required|string|max:30',
            'name' => 'nullable|string|max:150',
            'slug' => 'nullable|string|max:150',
        ]);

        $name = trim((string) ($data['name'] ?? '')) ?: 'Bapak/Ibu Tamu';
        $link = url('/undangan/'.($data['slug'] ?? 'undangan-anda')).'?to='.rawurlencode($this->guestNameSlug($name));
        $outcome = $sender->send((string) $data['phone'], $name, $link);
        $phone = $sender->normalizePhone((string) $data['phone']);

        return response()->json([
            'mode' => $sender->mode(),
            'ok' => $outcome['ok'],
            'simulated' => $outcome['simulated'],
            'error' => $outcome['error'],
            'phone' => $phone,
            'link' => $link,
            'wa_me' => 'https://wa.me/'.$phone.'?text='.rawurlencode($sender->messageText($name, $link)),
        ]);
    }

    /**
     * Kirim undangan WhatsApp ke banyak tamu dalam satu permintaan (batch).
     * Dipanggil berulang oleh builder sampai semua tamu terkirim.
     */
    public function bulkSendGuests(Request $request, WhatsAppBulkSender $sender): JsonResponse
    {
        $data = $request->validate([
            'slug' => 'nullable|string|max:150',
            'base_url' => 'nullable|string|max:500',
            'guests' => 'required|array|min:1|max:50',
            'guests.*.name' => 'required|string|max:150',
            'guests.*.phone' => 'required|string|max:30',
        ]);

        $base = rtrim((string) ($data['base_url'] ?? ''), '/');
        if ($base === '') {
            $base = url('/undangan/'.($data['slug'] ?: 'undangan-anda'));
        }
        $base = strtok($base, '?') ?: $base;

        $results = [];
        foreach ($data['guests'] as $index => $guest) {
            $name = trim((string) $guest['name']);
            $link = $base.'?to='.rawurlencode($this->guestNameSlug($name));
            $outcome = $sender->send((string) $guest['phone'], $name, $link);

            $results[] = [
                'index' => $index,
                'name' => $name,
                'phone' => $sender->normalizePhone((string) $guest['phone']),
                'ok' => $outcome['ok'],
                'simulated' => $outcome['simulated'],
                'error' => $outcome['error'],
            ];
        }

        return response()->json([
            'mode' => $sender->mode(),
            'sent' => count(array_filter($results, fn ($row) => $row['ok'])),
            'failed' => count(array_filter($results, fn ($row) => ! $row['ok'])),
            'results' => $results,
        ]);
    }

    /**
     * Nama tamu → bentuk tautan: "Bapak Andi Wijaya" → "Bapak-Andi-Wijaya".
     */
    private function guestNameSlug(string $name): string
    {
        $slug = preg_replace('/\s+/u', '-', trim($name)) ?? '';
        $slug = preg_replace('/[^\p{L}\p{N}&._-]+/u', '', $slug) ?? '';
        $slug = preg_replace('/-+/', '-', $slug) ?? '';

        return trim($slug, '-');
    }

    /**
     * Contoh daftar tamu siap isi: Excel berformat (default) atau CSV.
     * Dibangun manual dengan ZipArchive supaya tidak menambah dependensi.
     */
    public function guestTemplateSample(Request $request): Response
    {
        $headers = ['Nama Tamu', 'Nomor WhatsApp', 'Jumlah Orang', 'Meja / Zona'];
        $rows = [
            ['Bapak Andi Wijaya', '081234567890', 2, 'VIP - Meja Melati 04'],
            ['Ibu Sari & Keluarga', '081298765432', 4, 'Reguler A1'],
            ['Tim Marketing PT Maju', '081377778888', 6, 'Meja Sponsor 02'],
        ];

        if ($request->query('format') === 'csv') {
            $lines = [implode(',', $headers)];
            foreach ($rows as $row) {
                $lines[] = implode(',', array_map(fn ($cell) => '"'.str_replace('"', '""', (string) $cell).'"', $row));
            }

            return response("\xEF\xBB\xBF".implode("\r\n", $lines)."\r\n", 200, [
                'Content-Type' => 'text/csv; charset=UTF-8',
                'Content-Disposition' => 'attachment; filename="contoh-daftar-tamu.csv"',
            ]);
        }

        $path = tempnam(sys_get_temp_dir(), 'dkarsa-tamu-').'.xlsx';
        $this->writeGuestWorkbook($path, $headers, $rows);

        return response()->download($path, 'contoh-daftar-tamu.xlsx', [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ])->deleteFileAfterSend(true);
    }

    /**
     * @param  array<int, string>  $headers
     * @param  array<int, array<int, string|int>>  $rows
     */
    private function writeGuestWorkbook(string $path, array $headers, array $rows): void
    {
        $zip = new \ZipArchive;
        $zip->open($path, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

        $col = static fn (int $index): string => chr(65 + $index);
        $escape = static fn (string $value): string => htmlspecialchars($value, ENT_QUOTES | ENT_XML1, 'UTF-8');

        // ---- Sheet 1: daftar tamu (header berwarna, kolom lebar, baris judul dibekukan) ----
        $sheetRows = '';
        $headerCells = '';
        foreach ($headers as $i => $label) {
            $headerCells .= '<c r="'.$col($i).'1" s="1" t="inlineStr"><is><t>'.$escape($label).'</t></is></c>';
        }
        $sheetRows .= '<row r="1" ht="28" customHeight="1">'.$headerCells.'</row>';

        foreach ($rows as $r => $row) {
            $cells = '';
            foreach ($row as $i => $value) {
                $ref = $col($i).($r + 2);
                $style = $i === 2 ? 3 : ($i === 1 ? 5 : 2); // 3 = angka rata tengah, 5 = format teks (nomor HP)
                $cells .= '<c r="'.$ref.'" s="'.$style.'" t="inlineStr"><is><t>'.$escape((string) $value).'</t></is></c>';
            }
            $sheetRows .= '<row r="'.($r + 2).'" ht="20" customHeight="1">'.$cells.'</row>';
        }

        $lastRow = count($rows) + 1;
        $sheet1 = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
            .'<worksheet xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main">'
            .'<sheetViews><sheetView tabSelected="1" workbookViewId="0">'
            .'<pane ySplit="1" topLeftCell="A2" activePane="bottomLeft" state="frozen"/>'
            .'</sheetView></sheetViews>'
            .'<sheetFormatPr defaultRowHeight="18"/>'
            .'<cols>'
            .'<col min="1" max="1" width="34" customWidth="1"/>'
            .'<col min="2" max="2" width="20" customWidth="1"/>'
            .'<col min="3" max="3" width="15" customWidth="1"/>'
            .'<col min="4" max="4" width="26" customWidth="1"/>'
            .'</cols>'
            .'<sheetData>'.$sheetRows.'</sheetData>'
            .'<autoFilter ref="A1:D'.$lastRow.'"/>'
            // Urutan elemen OOXML wajib: autoFilter → dataValidations → ignoredErrors.
            // Jumlah orang dibatasi 1-20 supaya salah isi diberi tahu jelas, bukan tampak seperti error.
            .'<dataValidations count="1">'
            .'<dataValidation type="whole" operator="between" sqref="C2:C400" allowBlank="1"'
            .' showInputMessage="1" promptTitle="Jumlah Orang" prompt="Isi angka 1 sampai 20."'
            .' showErrorMessage="1" errorTitle="Jumlah orang tidak valid" error="Isi angka 1 sampai 20.">'
            .'<formula1>1</formula1><formula2>20</formula2></dataValidation>'
            .'</dataValidations>'
            // Nomor HP disimpan sebagai teks agar 0 di depan tidak hilang; matikan peringatan "angka tersimpan sebagai teks".
            .'<ignoredErrors><ignoredError sqref="A2:D400" numberStoredAsText="1"/></ignoredErrors>'
            .'</worksheet>';

        // ---- Sheet 2: petunjuk pengisian ----
        $guide = [
            ['CARA MENGISI DAFTAR TAMU', 1],
            ['', 0],
            ['1. Tulis satu tamu per baris pada sheet "Daftar Tamu". Jangan mengubah baris judul (baris 1).', 0],
            ['2. Kolom Nama Tamu wajib diisi. Contoh penulisan: Bapak Andi Wijaya / Ibu Sari & Keluarga / Tim Marketing PT Maju.', 0],
            ['3. Nomor WhatsApp opsional, tulis 08xx atau 628xx. Dipakai untuk tombol kirim undangan per tamu.', 0],
            ['4. Jumlah Orang opsional (1-20). Kalau kosong dianggap 2 orang.', 0],
            ['5. Meja / Zona opsional, contoh: VIP - Meja Melati 04.', 0],
            ['6. Simpan sebagai .xlsx atau .csv, lalu unggah lewat tombol "Impor Excel / CSV" di halaman builder.', 0],
            ['7. Baris contoh (Bapak Andi Wijaya, dst.) boleh dihapus sebelum diunggah.', 0],
            ['', 0],
            ['Judul kolom yang dikenali: nama / name / tamu, wa / whatsapp / hp / nomor, pax / jumlah / orang, meja / seat / zona / kursi.', 2],
        ];

        $guideRows = '';
        foreach ($guide as $r => $line) {
            [$text, $style] = $line;
            $rowNum = $r + 1;
            $height = $style === 1 ? ' ht="26" customHeight="1"' : '';
            $guideRows .= '<row r="'.$rowNum.'"'.$height.'>'
                .'<c r="A'.$rowNum.'" s="'.$style.'" t="inlineStr"><is><t>'.$escape($text).'</t></is></c>'
                .'</row>';
        }

        $sheet2 = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
            .'<worksheet xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main">'
            .'<sheetViews><sheetView workbookViewId="0"/></sheetViews>'
            .'<sheetFormatPr defaultRowHeight="18"/>'
            .'<cols><col min="1" max="1" width="104" customWidth="1"/></cols>'
            .'<sheetData>'.$guideRows.'</sheetData>'
            .'</worksheet>';

        $contentTypes = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
            .'<Types xmlns="http://schemas.openxmlformats.org/package/2006/content-types">'
            .'<Default Extension="rels" ContentType="application/vnd.openxmlformats-package.relationships+xml"/>'
            .'<Default Extension="xml" ContentType="application/xml"/>'
            .'<Override PartName="/xl/workbook.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet.main+xml"/>'
            .'<Override PartName="/xl/styles.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.styles+xml"/>'
            .'<Override PartName="/xl/worksheets/sheet1.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.worksheet+xml"/>'
            .'<Override PartName="/xl/worksheets/sheet2.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.worksheet+xml"/>'
            .'</Types>';

        $rootRels = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
            .'<Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships">'
            .'<Relationship Id="rId1" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/officeDocument" Target="xl/workbook.xml"/>'
            .'</Relationships>';

        $workbook = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
            .'<workbook xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main"'
            .' xmlns:r="http://schemas.openxmlformats.org/officeDocument/2006/relationships">'
            .'<sheets>'
            .'<sheet name="Daftar Tamu" sheetId="1" r:id="rId1"/>'
            .'<sheet name="Petunjuk" sheetId="2" r:id="rId2"/>'
            .'</sheets></workbook>';

        $workbookRels = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
            .'<Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships">'
            .'<Relationship Id="rId1" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/worksheet" Target="worksheets/sheet1.xml"/>'
            .'<Relationship Id="rId2" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/worksheet" Target="worksheets/sheet2.xml"/>'
            .'<Relationship Id="rId3" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/styles" Target="styles.xml"/>'
            .'</Relationships>';

        $styles = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
            .'<styleSheet xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main">'
            .'<numFmts count="1"><numFmt numFmtId="164" formatCode="@"/></numFmts>'
            .'<fonts count="4">'
            .'<font><sz val="11"/><name val="Calibri"/></font>'
            .'<font><b/><sz val="11"/><color rgb="FFFFFFFF"/><name val="Calibri"/></font>'
            .'<font><sz val="11"/><color rgb="FF1C1417"/><name val="Calibri"/></font>'
            .'<font><b/><sz val="13"/><color rgb="FFC2185B"/><name val="Calibri"/></font>'
            .'</fonts>'
            .'<fills count="5">'
            .'<fill><patternFill patternType="none"/></fill>'
            .'<fill><patternFill patternType="gray125"/></fill>'
            .'<fill><patternFill patternType="solid"><fgColor rgb="FFF63854"/><bgColor indexed="64"/></patternFill></fill>'
            .'<fill><patternFill patternType="solid"><fgColor rgb="FFFFF1F3"/><bgColor indexed="64"/></patternFill></fill>'
            .'<fill><patternFill patternType="solid"><fgColor rgb="FFFDF4F5"/><bgColor indexed="64"/></patternFill></fill>'
            .'</fills>'
            .'<borders count="2">'
            .'<border><left/><right/><top/><bottom/><diagonal/></border>'
            .'<border>'
            .'<left style="thin"><color rgb="FFF0DDE1"/></left>'
            .'<right style="thin"><color rgb="FFF0DDE1"/></right>'
            .'<top style="thin"><color rgb="FFF0DDE1"/></top>'
            .'<bottom style="thin"><color rgb="FFF0DDE1"/></bottom>'
            .'<diagonal/></border>'
            .'</borders>'
            .'<cellStyleXfs count="1"><xf numFmtId="0" fontId="0" fillId="0" borderId="0"/></cellStyleXfs>'
            .'<cellXfs count="6">'
            .'<xf numFmtId="0" fontId="0" fillId="0" borderId="0" xfId="0"/>'
            .'<xf numFmtId="0" fontId="1" fillId="2" borderId="1" xfId="0" applyFont="1" applyFill="1" applyBorder="1" applyAlignment="1">'
            .'<alignment horizontal="left" vertical="center" indent="1"/></xf>'
            .'<xf numFmtId="0" fontId="2" fillId="3" borderId="1" xfId="0" applyFont="1" applyFill="1" applyBorder="1" applyAlignment="1">'
            .'<alignment vertical="center" wrapText="1"/></xf>'
            .'<xf numFmtId="0" fontId="2" fillId="3" borderId="1" xfId="0" applyFont="1" applyFill="1" applyBorder="1" applyAlignment="1">'
            .'<alignment horizontal="center" vertical="center"/></xf>'
            .'<xf numFmtId="0" fontId="3" fillId="4" borderId="0" xfId="0" applyFont="1" applyFill="1" applyAlignment="1">'
            .'<alignment vertical="center"/></xf>'
            .'<xf numFmtId="164" fontId="2" fillId="3" borderId="1" xfId="0" applyNumberFormat="1" applyFont="1" applyFill="1" applyBorder="1" applyAlignment="1">'
            .'<alignment vertical="center" horizontal="left"/></xf>'
            .'</cellXfs>'
            .'<cellStyles count="1"><cellStyle name="Normal" xfId="0" builtinId="0"/></cellStyles>'
            .'</styleSheet>';

        $zip->addFromString('[Content_Types].xml', $contentTypes);
        $zip->addFromString('_rels/.rels', $rootRels);
        $zip->addFromString('xl/workbook.xml', $workbook);
        $zip->addFromString('xl/_rels/workbook.xml.rels', $workbookRels);
        $zip->addFromString('xl/styles.xml', $styles);
        $zip->addFromString('xl/worksheets/sheet1.xml', $sheet1);
        $zip->addFromString('xl/worksheets/sheet2.xml', $sheet2);
        $zip->close();
    }

    public function rsvp(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
            'whatsapp' => 'nullable|string|max:50',
            'package' => 'nullable|string|max:100',
            'theme' => 'nullable|string|max:120',
            'service_mode' => 'nullable|string|max:100',
            'attendance' => 'nullable|in:hadir,tidak_hadir,ragu',
            'guest_count' => 'nullable|integer|min:1|max:10',
            'message' => 'nullable|string|max:1000',
            'guest_slug' => 'nullable|string',
        ]);

        $category = ! empty($data['category']) ? ucwords(strtolower(trim($data['category']))) : 'Pernikahan';

        $guestId = null;
        if (! empty($data['guest_slug'])) {
            $guestId = Guest::where('slug', $data['guest_slug'])->value('id');
        }

        // Compose structured order summary if submitted from the D'Karsa Order Form
        $orderDetails = [];
        $orderDetails[] = "Kategori: {$category}";
        if (! empty($data['package'])) {
            $orderDetails[] = "Paket: {$data['package']}";
        }
        if (! empty($data['theme'])) {
            $orderDetails[] = "Tema: {$data['theme']}";
        }
        if (! empty($data['service_mode'])) {
            $orderDetails[] = "Layanan: {$data['service_mode']}";
        }
        if (! empty($data['whatsapp'])) {
            $orderDetails[] = "WA: {$data['whatsapp']}";
        }
        if (! empty($data['message'])) {
            $orderDetails[] = "Catatan: {$data['message']}";
        }

        Rsvp::create([
            'guest_id' => $guestId,
            'category' => $category,
            'name' => $data['name'],
            'attendance' => $data['attendance'] ?? 'hadir',
            'guest_count' => $data['guest_count'] ?? 1,
            'message' => ! empty($orderDetails) ? implode(' | ', $orderDetails) : ($data['message'] ?? null),
        ]);

        $pkgText = ! empty($data['package']) ? " ({$data['package']} - ".($data['theme'] ?? 'Tema Pilihan').')' : '';

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => "Pesanan undangan {$category} untuk {$data['name']}{$pkgText} berhasil dikirim! Tim D'Karsa akan segera menghubungi WhatsApp Anda.",
            ]);
        }

        return back()
            ->with('rsvp_success', "Pesanan undangan {$category} untuk {$data['name']}{$pkgText} berhasil dikirim! Tim D'Karsa akan segera menghubungi WhatsApp Anda.")
            ->withFragment('pesan');
    }

    public function wish(Request $request)
    {
        $data = $request->validate([
            'couple_id' => 'nullable|exists:couples,id',
            'name' => 'required|string|max:100',
            'message' => 'required|string|max:500',
            'attendance' => 'nullable|string|in:hadir,tidak_hadir,ragu',
            'guest_count' => 'nullable|integer|min:1|max:10',
            'guest_slug' => 'nullable|string',
            'category' => 'nullable|string|max:100',
        ]);

        Wish::create([
            'couple_id' => $data['couple_id'] ?? null,
            'name' => $data['name'],
            'message' => $data['message'],
            'is_approved' => true,
        ]);

        if (! empty($data['attendance'])) {
            $guestId = null;
            if (! empty($data['guest_slug'])) {
                $guestId = Guest::where('slug', $data['guest_slug'])->value('id');
            } elseif (! empty($data['couple_id'])) {
                $guestId = Guest::where('couple_id', $data['couple_id'])->where('name', $data['name'])->value('id');
            }

            Rsvp::create([
                'guest_id' => $guestId,
                'name' => $data['name'],
                'attendance' => $data['attendance'],
                'message' => $data['message'],
                'guest_count' => (int) ($data['guest_count'] ?? 1),
                'category' => $data['category'] ?? 'Tamu Undangan',
            ]);
        }

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Terima kasih atas ucapan doa restu dan konfirmasi kehadiran Anda!',
            ]);
        }

        if (! empty($data['attendance'])) {
            return back()->with('wish_success', 'Terima kasih atas ucapan doa restu dan konfirmasi kehadiran Anda!')->withFragment('rsvp');
        }

        return back()->with('wish_success', 'Terima kasih atas ulasan & testimoni Anda untuk D\'Karsa!')->withFragment('wishes');
    }

    /**
     * Decode and save base64 image data to public storage disk
     */
    protected function saveBase64Image(?string $base64Data, string $directory): ?string
    {
        if (empty($base64Data) || ! is_string($base64Data)) {
            return null;
        }

        if (str_starts_with($base64Data, 'http://') || str_starts_with($base64Data, 'https://')) {
            return $base64Data;
        }

        $extension = 'png';
        if (str_contains($base64Data, ';base64,')) {
            [$meta, $raw] = explode(';base64,', $base64Data, 2);
            if (str_contains($meta, 'image/jpeg') || str_contains($meta, 'image/jpg')) {
                $extension = 'jpg';
            } elseif (str_contains($meta, 'image/webp')) {
                $extension = 'webp';
            } elseif (str_contains($meta, 'image/gif')) {
                $extension = 'gif';
            }
            $decoded = base64_decode($raw);
        } else {
            $decoded = base64_decode($base64Data);
        }

        if (! $decoded) {
            return null;
        }

        $filename = Str::random(40).'.'.$extension;
        $path = trim($directory, '/').'/'.$filename;
        Storage::disk('public')->put($path, $decoded);

        return $path;
    }
}
