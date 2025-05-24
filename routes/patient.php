<?php

use App\Models\AdminControls;
use App\Models\Appointment;
use App\Models\AppointmentCategory;
use App\Models\AppointmentType;
use App\Models\Dentist;
use App\Models\Timeslot;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

Route::middleware('auth:patient')
    ->prefix('patient')
    ->name('patient.')
    ->group(function () {
        Route::get('/', function () {
            return view('patient_profile');
        })->name('index');

        Route::get('/home', function () {
            $appointments = Appointment::with(['dentist', 'appointmentType'])
                ->where('patient_id', auth()->id())
                ->where('is_active', true) // Only get active appointments
                ->get();
            return view('patient_dashboard', compact('appointments'));
        })->name('home');

        Route::get('/profile', function () {
            $patient = auth()->user(); // Authenticated Patient model

            // Get only active appointments for the patient
            $appointments = $patient->activeAppointments()
                ->with(['dentist', 'appointmentType'])
                ->get();
            return view('patient_profile', compact('appointments', 'patient'));
        })->name('profile');

        Route::get('/appointments', function () {
            $appointments = Appointment::with(['dentist', 'appointmentType'])
                ->where('patient_id', auth()->id())
                ->where('is_active', true) // Only get active appointments
                ->get();
            $appointmentCancelId = 0;
            return view('patient_appointments', compact('appointments', 'appointmentCancelId'));
        })->name('appointments');

        Route::get('/appointments/history', function () {
            $appointments = Appointment::with(['dentist', 'appointmentType'])
                ->where('patient_id', auth()->id())
                ->where('is_active', false) // Only get active appointments
                ->get();
            return view('appointment_history', compact('appointments'));
        })->name('appointments.history');

        Route::get('/profile/edit', function() {
            $patient = auth()->user();
            return view('edit_profile', compact('patient'));
        })->name('profile.edit');

        Route::get('/booking', function () {
            $categories = AppointmentCategory::with('appointmentTypes')->get();
            $types = AppointmentType::all();
            $dentists = Dentist::all();

            $freeSlots = collect();
            $dates = collect();
            if (old('appointment_type_id')) {
                $type = old('appointment_type_id');
                $dentist = old('dentist_id');

                $nextMonday = Carbon::now()->startOfWeek()->addWeek();
                $dates = collect(range(1,6))
                    ->map(fn($i) => $nextMonday->copy()->addDays($i - 1)->toDateString())
                    ->all();

                $availStart = AdminControls::find('open_time')->value;
                $availEnd = AdminControls::find('close_time')->value;
                $availSlots = collect();

                foreach (collect(range(1, 6)) as $day) {
                    $startSlot = Timeslot::where('day_of_week', $day)
                        ->where('start_time', '<=', $availStart)
                        ->orderBy('start_time', 'desc')
                        ->firstOrFail();
                    $endSlot = Timeslot::where('day_of_week', $day)
                        ->where('end_time', '>=', $availEnd)
                        ->orderBy('end_time', 'asc')
                        ->firstOrFail();
                    $availSlots = $availSlots->merge(
                        Timeslot::where('day_of_week', $day)
                        ->where('start_time', '>=', $startSlot->start_time)
                        ->where('end_time',   '<=', $endSlot->end_time)
                        ->orderBy('start_time')
                        ->get()
                    );
                }

                $appntQ = Appointment::whereIn('date', $dates)->where('is_active', true);
                if ($dentist && $type != 0) {
                    $appntQ->where('dentist_id', $dentist);
                }

                $appntSlots = $appntQ->get()->flatMap->timeslots;
                $freeSlots = $availSlots->diff($appntSlots);
            }

            return view('patient_booking', compact('categories', 'types', 'dentists', 'dates', 'freeSlots'));

        })->name('booking');

        Route::post('/booking', function (Request $request) {
            return redirect()->back()->withInput();
        })->name('booking.queries');

    });
