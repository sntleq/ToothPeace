<?php

use App\Http\Controllers\Crud\PatientController;
use App\Http\Controllers\Crud\DentistController;
use App\Http\Controllers\Crud\AppointmentController;
use App\Http\Controllers\Crud\AvailabilityController;
use App\Http\Controllers\Crud\AvailabilityOverrideController;
use App\Http\Controllers\Crud\DentistServiceController;
use App\Http\Controllers\Crud\WaitlistController;
use App\Http\Controllers\Crud\AdminControlsController;
use Illuminate\Support\Facades\Route;

Route::resource('patients', PatientController::class);
Route::resource('dentists', DentistController::class);
Route::resource('appointments', AppointmentController::class);
Route::resource('dentist-services', DentistServiceController::class);
Route::resource('waitlist', WaitlistController::class);
Route::resource('admin-controls', AdminControlsController::class);

Route::put('patients/{patient}/password-reset', [PatientController::class, 'updatePassword'])
    ->name('patients.update.password');
Route::put('appointments/{appointment}/cancel', [AppointmentController::class, 'cancel'])
    ->name('appointments.cancel');
Route::put('appointments/{appointment}/complete', [AppointmentController::class, 'complete'])
    ->name('appointments.complete');
// Search routes
Route::get('search/dentists', [DentistController::class, 'search'])->name('dentists.search');
Route::get('search/patients', [PatientController::class, 'search'])->name('patients.search');
Route::get('search/appointments', [AppointmentController::class, 'search'])->name('appointments.search');
Route::get('search/waitlist', [WaitlistController::class, 'search'])->name('waitlist.search');
