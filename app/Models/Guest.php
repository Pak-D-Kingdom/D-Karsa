<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Guest extends Model
{
    protected $fillable = ['couple_id','name','slug','phone','category','address','quota'];

    protected static function booted(): void
    {
        static::creating(function (Guest $guest) {
            if (empty($guest->slug)) {
                $base = Str::slug($guest->name);
                $slug = $base;
                $i = 2;
                while (static::where('slug', $slug)->exists()) {
                    $slug = $base.'-'.$i++;
                }
                $guest->slug = $slug;
            }
        });
    }

    public function couple(): BelongsTo { return $this->belongsTo(Couple::class); }
    public function rsvps() { return $this->hasMany(Rsvp::class); }
}
