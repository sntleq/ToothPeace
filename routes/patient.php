<?php

use App\Models\AdminControls;
use App\Models\Appointment;
use App\Models\AppointmentCategory;
use App\Models\AppointmentType;
use App\Models\Dentist;
use App\Models\Timeslot;
use App\Models\WaitlistEntry;
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
            return view('patient_appointments', compact('appointments'));
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

        Route::get('/waitlist', function () {
            $patientId = Auth::id();
            $entries = WaitlistEntry::with(['patient', 'dentist', 'appointmentType'])
                ->where('patient_id', $patientId)
                ->get();
            return view('patient_waitlist', compact('entries'));
        })->name('waitlist');

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

        Route::get('/waitlist/add', function () {
            $categories = AppointmentCategory::with('appointmentTypes')->get();
            $dentists = Dentist::all();

            $today = Carbon::today();

            $nextMonday = $today->copy()->next('Monday');
            $nextSaturday = $today->copy()->next('Saturday')->addWeek();

            $minDate = $nextMonday->toDateString();
            $maxDate = $nextSaturday->toDateString();

            return view('patient_waitlistBooking', compact('categories', 'dentists', 'minDate', 'maxDate'));
        })->name('waitlist.add');

        Route::post('/waitlist/store', function (Request $request) {
            $validated = $request->validate([
                'appointmentType' => 'required|exists:appointment_types,id',
                'preferredDentist' => 'required',
                'preferredDate' => 'required|date',
                'timeFrom' => 'required|date_format:H:i',
                'timeTo' => 'required|date_format:H:i|after:timeFrom',
            ]);

            WaitlistEntry::create([
                'patient_id' => auth()->id(),
                'appointment_type_id' => $validated['appointmentType'],
                'dentist_id' => $validated['preferredDentist'] !== 'any' ? $validated['preferredDentist'] : null,
                'date' => $validated['preferredDate'],
                'time_start' => $validated['timeFrom'],
                'time_end' => $validated['timeTo'],
            ]);

            return redirect()->route('patient.waitlist')->with('success', 'You’ve been added to the waitlist!');
        })->name('waitlist.store');

    });
