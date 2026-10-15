<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Wish extends Model
{
    protected $fillable = ['couple_id', 'name', 'message', 'is_approved'];
    protected $casts = ['is_approved' => 'boolean'];

    public function couple(): BelongsTo
    {
        return $this->belongsTo(Couple::class);
    }
}
