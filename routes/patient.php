<?php

use App\Models\Appointment;
use App\Models\WaitlistEntry;
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
                ->where('is_active', true)
                ->get();
            return view('patient_dashboard', compact('appointments'));
        })->name('home');

        Route::get('/profile', function () {
            $patient = auth()->user();

            // Get only active appointments for the patient
            $appointments = $patient->activeAppointments()
                ->with(['dentist', 'appointmentType'])
                ->get();
            return view('patient_profile', compact('appointments', 'patient'));
        })->name('profile');

        Route::get('/profile/edit', function () {
            $patient = auth()->user();
            return view('edit_profile', compact('patient'));
        })->name('profile.edit');

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

        Route::get('/waitlist', function () {
            $entries = WaitlistEntry::with(['patient', 'dentist', 'appointmentType'])->get();
            return view('patient_waitlist', compact('entries'));
        })->name('waitlist');

        Route::get('/booking', function () {
            return view('patient_booking');
        })->name('booking');

        Route::get('/waitlist/add', function () {
            return view('patient_waitlistBooking');
        })->name('waitlist.add');
    });
