<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gallery extends Model
{
    protected $fillable = ['couple_id','image','caption','sort_order'];
    public function couple(): BelongsTo { return $this->belongsTo(Couple::class); }
}
