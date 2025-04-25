<?php

namespace App\Models;

use Fixture\PHP74\Regression\Issue1402\Service;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Dentist extends Authenticatable
{
    use Notifiable;

    protected $table = 'dentists';

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'suffix',
        'username',
        'email',
        'dob',
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
        return $this->hasMany(Appointment::class, 'dentist_id')->where('is_active', true);
    }

    public function pastAppointments()
    {
        return $this->hasMany(Appointment::class, 'dentist_id')->where('is_active', false);
    }

    public function availability()
    {
        return $this->hasMany(Availability::class, 'dentist_id');
    }

    public function availabilityOverride()
    {
        return $this->hasMany(AvailabilityOverride::class, 'dentist_id');
    }

    public function services()
    {
        return $this->hasMany(DentistService::class, 'dentist_id');
    }

    public function waitlist()
    {
        return $this->hasMany(WaitlistEntry::class, 'dentist_id');
    }
}
