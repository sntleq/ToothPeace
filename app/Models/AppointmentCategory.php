<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppointmentCategory extends Model
{
    protected $table = 'appointment_categories';

    protected $fillable = [
        'name',
    ];

    protected $hidden = [
        'is_active',
    ];

    public function appointmentTypes()
    {
        return $this->hasMany(AppointmentType::class, 'appointment_category_id');
    }
}
