<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AvailabilityOverride extends Model
{
    protected $table = 'availability_override';

    protected $fillable = [
        'day_of_week',
        'start_time',
        'end_time',
        'dentist_id',
    ];

    protected function casts(): array
    {
        return [
            'start_time' => 'time',
            'end_time' => 'time',
        ];
    }

    protected $appends = [
        'start_slot',
        'end_slot',
        'timeslots',
    ];

    public function getStartSlotAttribute()
    {
        return Timeslot::where('day_of_week', $this->day_of_week)
            ->where('start_time', '<=', $this->start_time)
            ->orderBy('start_time', 'desc')
            ->firstOrFail();
    }

    public function getEndSlotAttribute()
    {
        return Timeslot::where('day_of_week', $this->day_of_week)
            ->where('end_time', '>=', $this->end_time)
            ->orderBy('end_time', 'asc')
            ->firstOrFail();
    }

    public function getTimeslotsAttribute()
    {
        return Timeslot::where('day_of_week', $this->day_of_week)
            ->where('start_time', '>=', $this->start_slot->start_time)
            ->where('end_time',   '<=', $this->end_slot->end_time)
            ->orderBy('start_time')
            ->get();
    }
}
