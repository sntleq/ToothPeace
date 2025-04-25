<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WaitlistEntry extends Model
{
    protected $table = 'waitlist_entries';

    protected $fillable = [
        'created_at',
        'date',
        'time_start',
        'time_end',
        'patient_id',
        'dentist_id',
        'appointment_type_id',
    ];

    protected $hidden = [
        'status',
    ];

    protected function casts(): array
    {
        return [
            'date' => 'date',
            'time' => 'time',
        ];
    }
}
