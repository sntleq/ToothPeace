<?php

use App\Models\Appointment;
use App\Models\AppointmentCategory;
use App\Models\Dentist;
use App\Models\WaitlistEntry;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;

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
                ->get();
            return view('patient_appointments', compact('appointments'));
        })->name('appointments');

        Route::get('/appointments/history', function () {
            $patient = auth()->user();
            $appointments = $patient->pastAppointments()
                ->with(['dentist', 'appointmentType'])
                ->get();
            return view('appointment_history', compact('appointments'));
        })->name('appointments.history');

        Route::get('/profile/edit', function(){
            return view('edit_profile');
        })->name('profile.edit');

        Route::get('/waitlist', function () {
            $entries = WaitlistEntry::with(['patient', 'dentist', 'appointmentType'])->get();
            return view('patient_waitlist', compact('entries'));
        })->name('waitlist');

        Route::get('/booking', function () {
            $categories = AppointmentCategory::with('appointmentTypes')->get();
            $dentists = Dentist::all();
            return view('patient_booking', compact('categories', 'dentists'));
        })->name('booking');

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
    });
