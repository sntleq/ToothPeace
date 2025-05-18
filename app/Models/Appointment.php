<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointments';

    protected $fillable = [
        'date',
        'time',
        'patient_id',
        'dentist_id',
        'appointment_type_id',
    ];

    protected $hidden = [
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'date' => 'date',
            'time' => 'datetime:H:i',
        ];
    }

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
