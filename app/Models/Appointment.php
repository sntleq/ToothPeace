<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointments';

    public $timestamps = false;

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
            //'time' => 'time',
        ];
    }

    protected $appends = [
        'start_slot',
        'end_slot',
        'timeslots',
    ];

    public function getStartSlotAttribute()
    {
        $dayOfWeek = Carbon::parse($this->date)->dayOfWeekIso;
        return Timeslot::where('day_of_week', $dayOfWeek)
            ->where('start_time', '<=', $this->time)
            ->orderBy('start_time', 'desc')
            ->firstOrFail();
    }

    public function getEndSlotAttribute()
    {
        $dayOfWeek = Carbon::parse($this->date)->dayOfWeekIso;
        $endTime = Carbon::parse($this->time)->addMinutes($this->appointmentType->duration);
        return Timeslot::where('day_of_week', $dayOfWeek)
            ->where('end_time', '>=', $endTime)
            ->orderBy('end_time', 'asc')
            ->firstOrFail();
    }

    public function getTimeslotsAttribute()
    {
        $dayOfWeek = Carbon::parse($this->date)->dayOfWeekIso;
        return Timeslot::where('day_of_week', $dayOfWeek)
            ->where('start_time', '>=', $this->start_slot->start_time)
            ->where('end_time',   '<=', $this->end_slot->end_time)
            ->orderBy('start_time')
            ->get();
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
