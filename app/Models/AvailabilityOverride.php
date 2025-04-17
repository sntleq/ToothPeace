<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AvailabilityOverride extends Model
{
    protected $table = 'availability_override';

    protected $fillable = [
        'day_of_week',
        'start_time',
        'end_time',
        'dentist_id',
    ];

    protected function casts(): array
    {
        return [
            'start_time' => 'time',
            'end_time' => 'time',
        ];
    }
}
