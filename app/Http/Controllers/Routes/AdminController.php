<?php

namespace App\Http\Controllers\Routes;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Appointment;
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
        $appointments = Appointment::all()->sortByDesc('time')->sortByDesc('date');
        return view('admin_appointments', compact('appointments'));
    }

    public function dentists()
    {
        $dentists = Dentist::all();
        return view('admin_dentists', compact('dentists'));
    }

    public function adminControls()
    {
        $settings = [
            'opening_time' => AdminControls::find('open_time')->value,
            'closing_time' => AdminControls::find('close_time')->value,
        ];

        return view('admin_controls', compact('settings'));
    }


}
