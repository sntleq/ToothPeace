<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use Notifiable;

    protected $table = 'admins';

    protected $fillable = [
        'email',
        'password'
    ];


    protected $hidden = [
        'password',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function dentist()
    {
        return $this->belongsTo(Dentist::class, 'dentist_id');
    }

    public function appointmentType()
    {
        return $this->belongsTo(AppointmentType::class, 'appointment_type_id');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

}
