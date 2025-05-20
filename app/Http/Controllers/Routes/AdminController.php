<?php

namespace App\Http\Controllers\Routes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Appointment;
use App\Models\WaitlistEntry;
use App\Models\Dentist;
use App\Models\AdminControls;


class AdminController extends Controller
{
    public function patients()
    {
        $patients = Patient::all();
        return view('admin_patients', compact('patients'));
    }

    public function appointments()
    {
        $appointments = Appointment::with(['patient', 'dentist', 'appointmentType'])->get();
        return view('admin_appointments', compact('appointments'));
    }

    public function waitlist()
    {
        $waitlists = WaitlistEntry::with(['patient', 'dentist', 'appointmentType'])->get();
        return view('admin_waitlist', compact('waitlists'));
    }

    public function dentists()
    {
        $dentists = Dentist::all();
        return view('admin_dentists', compact('dentists'));
    }

    public function saveSettings(Request $request)
    {
        $validated = $request->validate([
            'opening_time' => 'required|date_format:H:i',
            'closing_time' => 'required|date_format:H:i|after:opening_time',
        ]);

        AdminControls::setValue('opening_time', $validated['opening_time']);
        AdminControls::setValue('closing_time', $validated['closing_time']);

        return redirect()->back()->with('success', 'Settings saved successfully.');
    }

    public function adminControls()
    {
        $settings = [
            'opening_time' => AdminControls::getValue('opening_time', ''),
            'closing_time' => AdminControls::getValue('closing_time', ''),
        ];

        return view('admin_controls', compact('settings'));
    }


}
