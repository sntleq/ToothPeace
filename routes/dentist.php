<?php

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

        Route::get('/availability', function () {
            return view('dentist_availability');
        })->name('availability');

        Route::get('/availability/edit', [DentistAvailabilityController::class, 'editAvailability'])
        ->name('availability.edit');
        
        Route::put('/availability/update', [AvailabilityController::class, 'update'])
            ->name('availability.update');
            
        Route::put('/availability-override/update', [AvailabilityOverrideController::class, 'update'])
            ->name('availability.override.update');

        Route::get('/schedule', function () {
            return view('dentist_schedule');
        })->name('schedule');

        Route::get('/schedule/history', function () {
            return view('dentist_schedule_history');
        })->name('schedule.history');

    });

