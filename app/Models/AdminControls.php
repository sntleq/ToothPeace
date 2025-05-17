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

    public static function getValue(string $key, $default = null)
    {
        $record = self::where('key', $key)->first();
        return $record ? $record->value : $default;
    }

    public static function setValue(string $key, $value)
    {
        return self::updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );
    }
}

