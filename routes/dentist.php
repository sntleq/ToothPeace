<?php

use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:dentist')
    ->prefix('dentist')
    ->name('dentist.')
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('dentist_dashboard');
        })->name('dashboard');

        Route::get('/schedule', function () {
            $appointments = Appointment::where('dentist_id', auth()->id())->where('is_active', true)->get();
            return view('dentist_schedule', compact('appointments'));
        })->name('schedule');

        Route::get('/schedule/history', function () {
            $appointments = Appointment::where('dentist_id', auth()->id())->where('is_active', false)->get();
            return view('dentist_schedule_history', compact('appointments'));
        })->name('schedule.history');

    });

