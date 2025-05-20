<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Availability extends Model
{
    public $timestamps = false;
    
    protected $table = 'availability';

    protected $fillable = [
        'day_of_week',
        'start_time',
        'end_time',
        'dentist_id',
    ];

    protected $casts = [
        'start_time' => 'datetime:H:i',
        'end_time' => 'datetime:H:i',
        'day_of_week' => 'integer',
    ];

    public function dentist(): BelongsTo
    {
        return $this->belongsTo(Dentist::class);
    }
}
