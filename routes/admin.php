<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('admin_dashboard');
        })->name('dashboard');

        Route::get('/appointments', function () {
            return view('admin_appointments');
        })->name('appointments');

        Route::get('/dentists', function () {
            return view('admin_dentists');
        })->name('dentists');

        Route::get('/dentists/create', function () {
            return view('admin_add_dentists');
        })->name('dentists.create');

        Route::get('/patients', function () {
            return view('admin_patients');
        })->name('patients');

        Route::get('/controls', function () {
            return view('admin_controls');
        })->name('controls');

        Route::get('/waitlist', function () {
            return view('admin_waitlist');
        })->name('waitlist');

    });
