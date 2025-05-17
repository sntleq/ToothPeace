<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth:patient')
    ->prefix('patient')
    ->name('patient.')
    ->group(function () {
        Route::get('/', function () {
            return view('patient_profile');
        })->name('index');

        Route::get('/home', function () {
            return view('patient_dashboard');
        })->name('home');

        Route::get('/profile', function () {
            return view('patient_profile');
        })->name('profile');

        Route::get('/appointments', function () {
            return view('patient_appointments');
        })->name('appointments');

        Route::get('/appointments/history', function(){
            return view('appointment_history');
        })->name('appointments.history');

        Route::get('/profile/edit', function(){
            return view('edit_profile');
        })->name('profile.edit');

        Route::get('/waitlist', function () {
            return view('patient_waitlist');
        })->name('waitlist');
    });
