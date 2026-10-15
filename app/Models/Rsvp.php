<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rsvp extends Model
{
    protected $fillable = ['guest_id', 'category', 'name', 'attendance', 'guest_count', 'message'];
    public function guest(): BelongsTo { return $this->belongsTo(Guest::class); }
}
