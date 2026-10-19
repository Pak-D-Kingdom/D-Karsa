<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Couple extends Model
{
    protected $fillable = [
        'slug', 'category', 'sub_category', 'theme', 'package_name', 'event_heading',
        'groom_name', 'groom_fullname', 'groom_birth_order', 'groom_father', 'groom_mother', 'groom_city', 'groom_photo',
        'bride_name', 'bride_fullname', 'bride_birth_order', 'bride_father', 'bride_mother', 'bride_city', 'bride_photo',
        'display_order', 'cover_photo', 'wedding_date', 'venue_name', 'quote',
        'bank_name_1', 'bank_account_1', 'bank_holder_1',
        'bank_name_2', 'bank_account_2', 'bank_holder_2',
        'gift_address', 'music_url', 'thank_you_note', 'story',
        'status', 'is_in_catalog',
        'customer_name', 'customer_phone',
    ];

    protected $casts = [
        'wedding_date' => 'date',
        'is_in_catalog' => 'boolean',
    ];

    public function events(): HasMany { return $this->hasMany(Event::class); }
    public function guests(): HasMany { return $this->hasMany(Guest::class); }
    public function galleries(): HasMany { return $this->hasMany(Gallery::class); }
    public function wishes(): HasMany { return $this->hasMany(Wish::class); }

    /**
     * Accessor untuk nama kedua orang tua mempelai pria
     */
    public function getGroomParentsAttribute(): ?string
    {
        return \App\Services\TemplateManager::formatParentNames(
            $this->groom_father,
            $this->groom_mother,
            'Bapak & Ibu Keluarga Mempelai Pria'
        );
    }

    /**
     * Accessor untuk nama kedua orang tua mempelai wanita
     */
    public function getBrideParentsAttribute(): ?string
    {
        return \App\Services\TemplateManager::formatParentNames(
            $this->bride_father,
            $this->bride_mother,
            'Bapak & Ibu Keluarga Mempelai Wanita'
        );
    }

    /**
     * Accessor untuk foto cover undangan (menggunakan cover undangan pengguna atau fallback ke default template)
     */
    public function getCoverPhotoUrlAttribute(): string
    {
        $fallback = \App\Services\TemplateManager::getDefaultCoverImage($this->theme ?? $this->category ?? 'chibi-red');
        return \App\Services\TemplateManager::resolvePhotoUrl($this->cover_photo, $fallback);
    }
}
