<?php

use App\Models\Appointment;
use App\Models\Availability;
use App\Models\AvailabilityOverride;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Crud\AvailabilityController;
use App\Http\Controllers\Crud\AvailabilityOverrideController;
use App\Http\Controllers\Crud\DentistAvailabilityController;

Route::middleware('auth:dentist')
    ->prefix('dentist')
    ->name('dentist.')
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('dentist_dashboard');
        })->name('dashboard');

        Route::get('/availability/edit', [DentistAvailabilityController::class, 'editAvailability'])
            ->name('availability.edit');

        Route::get('/availability', [AvailabilityController::class, 'index'])
            ->name('availability');

        Route::put('/availability/update', [AvailabilityController::class, 'update'])
            ->name('availability.update');

        Route::put('/availability-override/update', [AvailabilityOverrideController::class, 'update'])
            ->name('availability.override.update');

        Route::get('/schedule', function () {
            $appointments = Appointment::with(['patient', 'appointmentType'])->get();
            return view('dentist_schedule', compact('appointments'));
        })->name('schedule');

        Route::get('/schedule/history', function () {
            $appointments = Appointment::with(['patient', 'appointmentType'])
                ->where('is_active', false)
                ->get();
            return view('dentist_schedule_history', compact('appointments'));
        })->name('schedule.history');

    });

