<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminControls extends Model
{
    protected $table = 'admin_controls';

    protected $primaryKey = 'key';    // Primary key is 'key'
    public $incrementing = false;     // Not auto-incrementing
    protected $keyType = 'string';

    protected $fillable = [
        'key',
        'value',
    ];

    public $timestamps = false; // disable timestamps if not used


}

