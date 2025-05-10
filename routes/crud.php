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
Route::resource('availability', AvailabilityController::class);
Route::resource('availability.override', AvailabilityOverrideController::class);
Route::resource('dentist.services', DentistServiceController::class);
Route::resource('waitlist', WaitlistController::class);
Route::resource('admin.controls', AdminControlsController::class);
