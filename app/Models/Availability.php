<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    protected $table = 'availability';

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
