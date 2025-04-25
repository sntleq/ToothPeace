<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Patient extends Authenticatable
{
    use Notifiable;

    protected $table = 'patients';

    protected $fillable = [
        'first_name', 
        'middle_name', 
        'last_name', 
        'suffix',
        'email', 
        'dob', 
        'password'
    ];
    

    protected $hidden = [
        'password',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'dob' => 'date',
        ];
    }

    protected $appends = [
        'name',
        'age',
    ];

    public function getNameAttribute(): string
    {
        return implode(' ',
            array_filter([
                $this->first_name,
                $this->middle_name,
                $this->last_name,
                $this->suffix
            ])
        );
    }

    public function getAgeAttribute(): int
    {
        return $this->dob->age;
    }

    public function activeAppointments()
    {
        return $this->hasMany(Appointment::class, 'patient_id')->where('is_active', true);
    }

    public function pastAppointments()
    {
        return $this->hasMany(Appointment::class, 'patient_id')->where('is_active', false);
    }

    public function waitlistEntry(): HasOne
    {
        return $this->hasOne(WaitlistEntry::class, 'patient_id');
    }
}
