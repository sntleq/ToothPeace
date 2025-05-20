<?php

use App\Models\Appointment;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Routes\AdminController;
use App\Http\Controllers\Crud\DentistController;

Route::prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', function () {
            $appointments = Appointment::with(['patient', 'appointmentType', 'dentist'])
                ->where('is_active', false)
                ->get();
            return view('admin_dashboard', compact('appointments'));
        })->name('dashboard');


        Route::get('/appointments',
            [AdminController::class,
                'appointments'])->name('appointments');

        Route::get('/dentists',
            [AdminController::class,
                'dentists'])->name('dentists');

        Route::get('/dentists/create',
            [DentistController::class,
                'create'])->name('dentists.create');

        Route::post('/dentists/store',
            [DentistController::class,
                'store'])->name('dentists.store');

        Route::get('/patients',
            [AdminController::class,
                'patients'])->name('patients');

        Route::get('/controls',
            [AdminController::class,
                'adminControls'])->name('controls');

        Route::post('/controls/save',
            [AdminController::class,
                'saveSettings'])->name('controls.save');

        Route::get('/waitlist',
            [AdminController::class,
                'waitlist'])->name('waitlist');


    });
