<?php

namespace App\Http\Controllers;

use App\Models\Couple;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Guest;
use App\Models\Rsvp;
use App\Models\Wish;
use App\Services\MidtransService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class InvitationController extends Controller
{
    public function index(Request $request)
    {
        // Load data; on any DB error fall back to static placeholder values
        try {
            $couple = Couple::with([
                'events' => fn($q) => $q->orderBy('sort_order')->orderBy('date'),
                'galleries' => fn($q) => $q->orderBy('sort_order'),
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
            if (!$couple) {
                throw new \Exception('No couple data');
            }
        } catch (\Exception $e) {
            // Static placeholder sufficient for view rendering without DB
            $couple = (object)[
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
        return view('builder.index');
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
            'thank_you_note' => 'nullable|string|max:1000',
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

        $category = !empty($validated['category']) ? ucwords(strtolower(trim($validated['category']))) : 'Pernikahan';
        $isNonWedding = ($category !== 'Pernikahan');
        $brideName = !empty($validated['bride_name']) 
            ? $validated['bride_name'] 
            : ($isNonWedding ? 'Keluarga' : 'Mempelai Wanita');
        $brideFullName = !empty($validated['bride_fullname'])
            ? $validated['bride_fullname']
            : ($isNonWedding ? 'Keluarga Besar' : $brideName);

        // Generate unique slug
        $slugBase = $validated['groom_name'];
        if (!$isNonWedding && !empty($validated['bride_name'])) {
            $slugBase .= '-' . $validated['bride_name'];
        }
        $rawSlug = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($slugBase);
        if (empty($rawSlug)) {
            $rawSlug = 'undangan-' . Str::lower(Str::random(6));
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
        if (!empty($validated['sub_category'])) {
            $storyNotes[] = "Sub-Kategori: " . $validated['sub_category'];
        }
        if (!empty($selectedPackage)) {
            $storyNotes[] = "Paket: " . $selectedPackage;
        }
        if (!empty($selectedTheme)) {
            $storyNotes[] = "Tema: " . $selectedTheme;
        }
        if (!empty($customDesign)) {
            $storyNotes[] = "Request Kustom Desain: " . $customDesign;
        }

        $amount = MidtransService::getPackagePrice($selectedPackage);
        $invoiceNumber = MidtransService::generateInvoiceNumber();

        $couple = Couple::create([
            'slug' => $slug,
            'category' => $category,
            'sub_category' => $validated['sub_category'] ?? null,
            'theme' => $selectedTheme,
            'package_name' => $selectedPackage,
            'amount' => $amount,
            'invoice_number' => $invoiceNumber,
            'payment_status' => 'pending',
            'event_heading' => (!empty($validated['event_heading'])) ? $validated['event_heading'] : ($isNonWedding ? "UNDANGAN " . strtoupper($category) : "WALIMATUL 'URSY"),
            'groom_name' => $validated['groom_name'],
            'groom_fullname' => (!empty($validated['groom_fullname'])) ? $validated['groom_fullname'] : $validated['groom_name'],
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
            'venue_name' => (!empty($validated['event_2_venue'])) ? $validated['event_2_venue'] : ((!empty($validated['event_1_venue'])) ? $validated['event_1_venue'] : 'Lokasi Acara'),
            'quote' => (!empty($validated['quote'])) ? $validated['quote'] : 'Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya.',

            'bank_name_1' => $validated['bank_name_1'] ?? null,
            'bank_account_1' => $validated['bank_account_1'] ?? null,
            'bank_holder_1' => $validated['bank_holder_1'] ?? null,
            'bank_name_2' => $validated['bank_name_2'] ?? null,
            'bank_account_2' => $validated['bank_account_2'] ?? null,
            'bank_holder_2' => $validated['bank_holder_2'] ?? null,
            'gift_address' => $validated['gift_address'] ?? null,
            'music_url' => $validated['music_url'] ?? null,
            'thank_you_note' => $validated['thank_you_note'] ?? null,
            'story' => !empty($storyNotes) ? implode("\n", $storyNotes) : null,
            'customer_name' => $validated['customer_name'] ?? null,
            'customer_phone' => $validated['customer_phone'] ?? null,
            'status' => 'pending',
            'is_in_catalog' => $request->boolean('is_in_catalog'),
        ]);

        // Save events: check if dynamic events array was submitted
        if ($request->has('events') && is_array($request->input('events')) && count($request->input('events')) > 0) {
            $sortOrder = 1;
            foreach ($request->input('events') as $evData) {
                if (!empty($evData['title']) || !empty($evData['venue_name']) || !empty($evData['address'])) {
                    Event::create([
                        'couple_id' => $couple->id,
                        'title' => !empty($evData['title']) ? $evData['title'] : 'Rangkaian Acara ' . $sortOrder,
                        'date' => !empty($evData['date']) ? $evData['date'] : $validated['wedding_date'],
                        'start_time' => $evData['start_time'] ?? null,
                        'end_time' => $evData['end_time'] ?? null,
                        'venue_name' => !empty($evData['venue_name']) ? $evData['venue_name'] : 'Lokasi Acara',
                        'address' => $evData['address'] ?? null,
                        'maps_url' => !empty($evData['maps_url']) ? $evData['maps_url'] : 'https://maps.google.com',
                        'sort_order' => $sortOrder,
                    ]);
                    $sortOrder++;
                }
            }
        } else {
            // Fallback: Create Event 1 (Akad / Acara Utama)
            if (!empty($validated['event_1_title']) || !empty($validated['event_1_venue'])) {
                Event::create([
                    'couple_id' => $couple->id,
                    'title' => (!empty($validated['event_1_title'])) ? $validated['event_1_title'] : ($category === 'Pernikahan' ? 'Akad Nikah' : 'Acara Utama'),
                    'date' => (!empty($validated['event_1_date'])) ? $validated['event_1_date'] : $validated['wedding_date'],
                    'start_time' => (!empty($validated['event_1_start_time'])) ? $validated['event_1_start_time'] : '08:00 WIB',
                    'end_time' => (!empty($validated['event_1_end_time'])) ? $validated['event_1_end_time'] : '10:00 WIB',
                    'venue_name' => (!empty($validated['event_1_venue'])) ? $validated['event_1_venue'] : 'Masjid / Lokasi Acara',
                    'address' => $validated['event_1_address'] ?? null,
                    'maps_url' => (!empty($validated['event_1_maps_url'])) ? $validated['event_1_maps_url'] : 'https://maps.google.com',
                    'sort_order' => 1,
                ]);
            }

            // Fallback: Create Event 2 (Resepsi / Tasyakuran)
            if (!empty($validated['event_2_venue']) || !empty($validated['event_2_title'])) {
                Event::create([
                    'couple_id' => $couple->id,
                    'title' => (!empty($validated['event_2_title'])) ? $validated['event_2_title'] : ($category === 'Pernikahan' ? 'Resepsi Pernikahan' : 'Ramah Tamah & Tasyakuran'),
                    'date' => (!empty($validated['event_2_date'])) ? $validated['event_2_date'] : $validated['wedding_date'],
                    'start_time' => (!empty($validated['event_2_start_time'])) ? $validated['event_2_start_time'] : '11:00 WIB',
                    'end_time' => (!empty($validated['event_2_end_time'])) ? $validated['event_2_end_time'] : '14:00 WIB',
                    'venue_name' => (!empty($validated['event_2_venue'])) ? $validated['event_2_venue'] : 'Ballroom / Gedung Serbaguna',
                    'address' => $validated['event_2_address'] ?? null,
                    'maps_url' => (!empty($validated['event_2_maps_url'])) ? $validated['event_2_maps_url'] : 'https://maps.google.com',
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
                'Midtrans - ' . strtoupper($request->query('payment_type', 'Virtual Account / QRIS')),
                $request->query('order_id')
            );
            session()->flash('payment_success', 'Pembayaran via Midtrans berhasil diverifikasi! Undangan Anda kini telah aktif.');
        }

        return view('builder.success', compact('couple'));
    }

    public function showInvitation(Request $request, string $slug)
    {
        $couple = Couple::with([
            'events' => fn($q) => $q->orderBy('sort_order')->orderBy('date'),
            'galleries' => fn($q) => $q->orderBy('sort_order'),
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
        $guest = null;

        if (!empty($toParam)) {
            $guest = Guest::where('couple_id', $couple->id)
                ->where('slug', $toParam)
                ->first();

            if (!$guest) {
                $guest = Guest::where('slug', $toParam)->first();
            }

            if (!$guest) {
                $guest = (object)[
                    'name' => $toParam,
                    'slug' => Str::slug($toParam),
                    'category' => 'Tamu Undangan',
                    'quota' => 2,
                ];
            }
        }

        if (!$guest) {
            $guest = (object)[
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

        $templateKey = \App\Services\TemplateManager::resolveKey($couple->theme, $couple->category, $couple->sub_category);
        $template = \App\Services\TemplateManager::get($templateKey);
        $isDemo = false;
        $galleries = $couple->galleries;

        return view($template['blade'], compact('couple', 'guest', 'wishes', 'isAdminPreview', 'template', 'isDemo', 'galleries'));
    }

    public function demoTemplate(Request $request, string $templateKey)
    {
        $category = $request->query('category');
        $subCategory = $request->query('sub_category');
        $key = \App\Services\TemplateManager::resolveKey($templateKey, $category, $subCategory);
        $template = \App\Services\TemplateManager::get($key);

        // Allow live query parameters (e.g. from Builder Live Preview frame)
        $overrides = [];
        if ($request->filled('groom_name')) $overrides['groom_name'] = $request->query('groom_name');
        if ($request->filled('bride_name')) $overrides['bride_name'] = $request->query('bride_name');
        if ($request->filled('groom_fullname')) $overrides['groom_fullname'] = $request->query('groom_fullname');
        if ($request->filled('bride_fullname')) $overrides['bride_fullname'] = $request->query('bride_fullname');
        if ($request->filled('groom_birth_order')) $overrides['groom_birth_order'] = $request->query('groom_birth_order');
        if ($request->filled('groom_father')) $overrides['groom_father'] = $request->query('groom_father');
        if ($request->filled('groom_mother')) $overrides['groom_mother'] = $request->query('groom_mother');
        if ($request->filled('groom_parents')) $overrides['groom_parents'] = $request->query('groom_parents');
        if ($request->filled('groom_city')) $overrides['groom_city'] = $request->query('groom_city');

        if ($request->filled('bride_birth_order')) $overrides['bride_birth_order'] = $request->query('bride_birth_order');
        if ($request->filled('bride_father')) $overrides['bride_father'] = $request->query('bride_father');
        if ($request->filled('bride_mother')) $overrides['bride_mother'] = $request->query('bride_mother');
        if ($request->filled('bride_parents')) $overrides['bride_parents'] = $request->query('bride_parents');
        if ($request->filled('bride_city')) $overrides['bride_city'] = $request->query('bride_city');

        if ($request->filled('wedding_date')) {
            try {
                $overrides['wedding_date'] = \Carbon\Carbon::parse($request->query('wedding_date'));
            } catch (\Exception $e) {}
        }
        if ($request->filled('venue_name')) $overrides['venue_name'] = $request->query('venue_name');
        if ($request->filled('quote')) $overrides['quote'] = $request->query('quote');
        if ($request->filled('event_heading')) $overrides['event_heading'] = $request->query('event_heading');
        if ($request->filled('category')) $overrides['category'] = $request->query('category');
        if ($request->filled('sub_category')) $overrides['sub_category'] = $request->query('sub_category');
        if ($request->filled('cover_photo')) $overrides['cover_photo'] = $request->query('cover_photo');
        if ($request->filled('groom_photo')) $overrides['groom_photo'] = $request->query('groom_photo');
        if ($request->filled('bride_photo')) $overrides['bride_photo'] = $request->query('bride_photo');

        if ($request->filled('bank_name_1')) $overrides['bank_name_1'] = $request->query('bank_name_1');
        if ($request->filled('bank_account_1')) $overrides['bank_account_1'] = $request->query('bank_account_1');
        if ($request->filled('bank_holder_1')) $overrides['bank_holder_1'] = $request->query('bank_holder_1');
        if ($request->filled('bank_name_2')) $overrides['bank_name_2'] = $request->query('bank_name_2');
        if ($request->filled('bank_account_2')) $overrides['bank_account_2'] = $request->query('bank_account_2');
        if ($request->filled('bank_holder_2')) $overrides['bank_holder_2'] = $request->query('bank_holder_2');
        if ($request->filled('gift_address')) $overrides['gift_address'] = $request->query('gift_address');

        // Custom events override if provided via JSON array or legacy event parameters
        if ($request->filled('events_json')) {
            $rawEvents = json_decode($request->query('events_json'), true);
            if (is_array($rawEvents) && count($rawEvents) > 0) {
                $evList = [];
                $baseDate = isset($overrides['wedding_date']) && $overrides['wedding_date'] instanceof \Carbon\Carbon
                    ? $overrides['wedding_date']->format('Y-m-d') 
                    : now()->format('Y-m-d');
                foreach ($rawEvents as $i => $ev) {
                    $evList[] = (object)[
                        'title' => $ev['title'] ?? 'Acara ' . ($i + 1),
                        'date' => !empty($ev['date']) ? $ev['date'] : $baseDate,
                        'start_time' => $ev['start_time'] ?? '',
                        'end_time' => $ev['end_time'] ?? '',
                        'venue_name' => $ev['venue_name'] ?? ($overrides['venue_name'] ?? 'Lokasi Acara'),
                        'address' => $ev['address'] ?? '',
                        'maps_url' => $ev['maps_url'] ?? 'https://maps.google.com',
                        'sort_order' => $i + 1,
                    ];
                }
                $overrides['events'] = collect($evList);
            }
        } elseif ($request->filled('event_1_title') || $request->filled('event_1_venue') || $request->filled('event_2_title') || $request->filled('event_2_venue')) {
            $evList = [];
            $ev1Date = $request->query('event_1_date', $request->query('wedding_date', now()->format('Y-m-d')));
            $evList[] = (object)[
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
                $evList[] = (object)[
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
        }

        // Custom galleries override if provided via JSON array
        if ($request->filled('galleries_json')) {
            $rawGalleries = json_decode($request->query('galleries_json'), true);
            if (is_array($rawGalleries) && count($rawGalleries) > 0) {
                $galList = [];
                foreach ($rawGalleries as $i => $gImg) {
                    $galList[] = (object)[
                        'image' => $gImg,
                        'sort_order' => $i + 1,
                    ];
                }
                $overrides['galleries'] = collect($galList);
            }
        }

        $couple = \App\Services\TemplateManager::getDemoCouple($key, $overrides);
        $guest = \App\Services\TemplateManager::getDemoGuest($request->query('to'));
        $wishes = \App\Services\TemplateManager::getDemoWishes();
        $isDemo = true;
        $isAdminPreview = false;
        $galleries = $couple->galleries ?? collect();

        return view($template['blade'], compact('couple', 'guest', 'wishes', 'isDemo', 'isAdminPreview', 'template', 'galleries'));
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

        $category = !empty($data['category']) ? ucwords(strtolower(trim($data['category']))) : 'Pernikahan';

        $guestId = null;
        if (!empty($data['guest_slug'])) {
            $guestId = Guest::where('slug', $data['guest_slug'])->value('id');
        }

        // Compose structured order summary if submitted from the D'Karsa Order Form
        $orderDetails = [];
        $orderDetails[] = "Kategori: {$category}";
        if (!empty($data['package'])) {
            $orderDetails[] = "Paket: {$data['package']}";
        }
        if (!empty($data['theme'])) {
            $orderDetails[] = "Tema: {$data['theme']}";
        }
        if (!empty($data['service_mode'])) {
            $orderDetails[] = "Layanan: {$data['service_mode']}";
        }
        if (!empty($data['whatsapp'])) {
            $orderDetails[] = "WA: {$data['whatsapp']}";
        }
        if (!empty($data['message'])) {
            $orderDetails[] = "Catatan: {$data['message']}";
        }

        Rsvp::create([
            'guest_id' => $guestId,
            'category' => $category,
            'name' => $data['name'],
            'attendance' => $data['attendance'] ?? 'hadir',
            'guest_count' => $data['guest_count'] ?? 1,
            'message' => !empty($orderDetails) ? implode(' | ', $orderDetails) : ($data['message'] ?? null),
        ]);

        $pkgText = !empty($data['package']) ? " ({$data['package']} - " . ($data['theme'] ?? 'Tema Pilihan') . ")" : '';

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

        if (!empty($data['attendance'])) {
            $guestId = null;
            if (!empty($data['guest_slug'])) {
                $guestId = Guest::where('slug', $data['guest_slug'])->value('id');
            } elseif (!empty($data['couple_id'])) {
                $guestId = Guest::where('couple_id', $data['couple_id'])->where('name', $data['name'])->value('id');
            }

            Rsvp::create([
                'guest_id' => $guestId,
                'name' => $data['name'],
                'attendance' => $data['attendance'],
                'message' => $data['message'],
                'guest_count' => (int)($data['guest_count'] ?? 1),
                'category' => $data['category'] ?? 'Tamu Undangan',
            ]);
        }

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Terima kasih atas ucapan doa restu dan konfirmasi kehadiran Anda!',
            ]);
        }

        if (!empty($data['attendance'])) {
            return back()->with('wish_success', 'Terima kasih atas ucapan doa restu dan konfirmasi kehadiran Anda!')->withFragment('rsvp');
        }

        return back()->with('wish_success', 'Terima kasih atas ulasan & testimoni Anda untuk D\'Karsa!')->withFragment('wishes');
    }

    /**
     * Decode and save base64 image data to public storage disk
     */
    protected function saveBase64Image(?string $base64Data, string $directory): ?string
    {
        if (empty($base64Data) || !is_string($base64Data)) {
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

        if (!$decoded) {
            return null;
        }

        $filename = Str::random(40) . '.' . $extension;
        $path = trim($directory, '/') . '/' . $filename;
        Storage::disk('public')->put($path, $decoded);

        return $path;
    }
}
