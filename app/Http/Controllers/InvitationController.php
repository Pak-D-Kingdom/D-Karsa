<?php

namespace App\Http\Controllers;

use App\Models\Couple;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Guest;
use App\Models\Rsvp;
use App\Models\Wish;
use Illuminate\Http\Request;
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
        $validated = $request->validate([
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
        ]);

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

        // Handle Photo Uploads
        $groomPhotoPath = null;
        if ($request->hasFile('groom_photo')) {
            $groomPhotoPath = $request->file('groom_photo')->store('couples', 'public');
        }

        $bridePhotoPath = null;
        if ($request->hasFile('bride_photo')) {
            $bridePhotoPath = $request->file('bride_photo')->store('couples', 'public');
        }

        $coverPhotoPath = null;
        if ($request->hasFile('cover_photo')) {
            $coverPhotoPath = $request->file('cover_photo')->store('couples/covers', 'public');
        }

        $selectedPackage = $request->input('selected_package');
        $selectedTheme = $request->input('selected_theme');
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

        $couple = Couple::create([
            'slug' => $slug,
            'category' => $category,
            'sub_category' => $validated['sub_category'] ?? null,
            'theme' => $selectedTheme,
            'package_name' => $selectedPackage,
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

        // Create Event 1 (Akad / Acara Utama)
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

        // Create Event 2 (Resepsi / Tasyakuran)
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

        // Create default initial VIP Guests so links are ready right away
        Guest::create([
            'couple_id' => $couple->id,
            'name' => 'Bapak Budi Santoso & Keluarga',
            'category' => 'Keluarga',
            'quota' => 2,
        ]);
        Guest::create([
            'couple_id' => $couple->id,
            'name' => 'Sahabat & Rekan Dekat',
            'category' => 'Teman',
            'quota' => 2,
        ]);

        // Create Galleries
        if ($request->hasFile('gallery_photos')) {
            foreach ($request->file('gallery_photos') as $idx => $photo) {
                $gPath = $photo->store('couples/galleries', 'public');
                Gallery::create([
                    'couple_id' => $couple->id,
                    'image' => $gPath,
                    'sort_order' => $idx + 1,
                ]);
            }
        }

        return redirect()->route('invitation.success', ['slug' => $couple->slug]);
    }

    public function success(string $slug)
    {
        $couple = Couple::with('events')->where('slug', $slug)->firstOrFail();
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

        return view('invitations.show', compact('couple', 'guest', 'wishes', 'isAdminPreview'));
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
        ]);

        Wish::create([
            'couple_id' => $data['couple_id'] ?? null,
            'name' => $data['name'],
            'message' => $data['message'],
            'is_approved' => true,
        ]);

        if (!empty($data['attendance'])) {
            Rsvp::create([
                'name' => $data['name'],
                'attendance' => $data['attendance'],
                'message' => $data['message'],
                'guest_count' => 1,
            ]);
            return back()->with('wish_success', 'Terima kasih atas ucapan doa restu dan konfirmasi kehadiran Anda!')->withFragment('rsvp');
        }

        return back()->with('wish_success', 'Terima kasih atas ulasan & testimoni Anda untuk D\'Karsa!')->withFragment('wishes');
    }
}
