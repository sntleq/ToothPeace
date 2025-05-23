<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WaitlistEntry extends Model
{
    // Use only created_at, disable updated_at
    const UPDATED_AT = null;

    protected $table = 'waitlist_entries';

    protected $fillable = [
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

    protected $casts = [
        'date' => 'date',
        'time_start' => 'datetime:H:i',
        'time_end' => 'datetime:H:i',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function dentist()
    {
        return $this->belongsTo(Dentist::class, 'dentist_id');
    }

    public function appointmentType()
    {
        return $this->belongsTo(AppointmentType::class, 'appointment_type_id');
    }
}
