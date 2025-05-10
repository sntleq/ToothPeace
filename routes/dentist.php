<?php

use Illuminate\Support\Facades\Route;

Route::prefix('dentist')
    ->name('dentist.')
    ->group(function () {

        Route::get('/login', function() {
            return view('login');
        })->name('login');

        Route::get('/password-reset', function(){
            return view('forgot_pass');
        })->name('password.reset');

    });

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

        Route::get('/schedule', function () {
            return view('dentist_schedule');
        })->name('schedule');

        Route::get('/schedule/history', function () {
            return view('dentist_schedule_history');
        })->name('schedule.history');

    });

