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

    protected $appends = [
        'end_time',
        'day_of_week',
        'start_slot',
        'end_slot',
        'timeslots',
    ];

    public function getEndTimeAttribute()
    {
        return $this->time->copy()->addMinutes($this->appointmentType->duration);
    }

    public function getDayOfWeekAttribute()
    {
        return $this->date->dayOfWeek;
    }

    public function getStartSlotAttribute()
    {
        return Timeslot::where('day_of_week', $this->day_of_week)
            ->where('start_time', '<=', $this->time)
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
