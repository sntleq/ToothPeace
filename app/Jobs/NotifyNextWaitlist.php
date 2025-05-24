<?php

namespace App\Jobs;

use App\Models\Appointment;
use App\Models\Waitlist;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\WaitlistNotification;

class NotifyNextWaitlist implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $appointmentId;

    public function __construct($appointmentId)
    {
        $this->appointmentId = $appointmentId;
    }

    public function handle()
    {
        $appointment = Appointment::find($this->appointmentId);

        if (!$appointment) return;

        // Example: Get the next person in waitlist for this appointment type
        $waitlistEntry = \App\Models\Waitlist::where('appointment_type_id', $appointment->appointment_type_id)
            ->orderBy('created_at')
            ->first();

        if ($waitlistEntry && $waitlistEntry->patient && $waitlistEntry->patient->email) {
            Mail::to($waitlistEntry->patient->email)
                ->send(new WaitlistNotification($appointment));
        }
    }
}
