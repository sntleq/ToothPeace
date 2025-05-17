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

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function dentist()
    {
        return $this->belongsTo(Dentist::class);
    }

    public function appointmentType()
    {
        return $this->belongsTo(AppointmentType::class);
    }

}
