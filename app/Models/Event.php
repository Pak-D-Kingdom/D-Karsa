<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    protected $fillable = ['couple_id','title','date','start_time','end_time','venue_name','address','maps_url','maps_embed','sort_order'];
    protected $casts = ['date' => 'date'];
    public function couple(): BelongsTo { return $this->belongsTo(Couple::class); }
}
