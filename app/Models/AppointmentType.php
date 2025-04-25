<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppointmentType extends Model
{
    protected $table = 'appointment_types';

    protected $fillable = [
        'name',
        'duration',
        'appointment_category_id',
    ];

    protected $hidden = [
        'is_active',
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'appointment_type_id');
    }

    public function dentistServices()
    {
        return $this->hasMany(DentistService::class, 'appointment_type_id');
    }

    public function dentists()
    {
        return $this->hasManyThrough(
            Dentist::class,
            DentistService::class,
            'appointment_type_id',
            'id'
        );
    }

    public function waitlistEntries()
    {
        return $this->hasMany(WaitlistEntry::class, 'appointment_type_id');
    }
}
