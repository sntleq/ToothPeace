<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DentistService extends Model
{
    protected $table = 'dentist_services';

    protected $fillable = [
        'dentist_id',
        'appointment_type_id',
    ];
}
