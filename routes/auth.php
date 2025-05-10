<?php

use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\DentistAuthController;
use App\Http\Controllers\Auth\PatientAuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('patient')
    ->name('auth.patient.')
    ->controller(PatientAuthController::class)
    ->group(function () {
        Route::post('/signup', 'signup')->name('signup');
        Route::post('/login', 'login')->name('login');
        Route::post('/password-reset', 'resetPassword')->name('password.reset');
        Route::post('/logout', 'logout')->name('logout');
    });

Route::prefix('dentist')
    ->name('auth.dentist.')
    ->controller(DentistAuthController::class)
    ->group(function () {
        Route::post('/login', 'login')->name('login');
        Route::post('/password-reset', 'resetPassword')->name('password.reset');
        Route::post('/logout', 'logout')->name('logout');
    });

Route::prefix('admin')
    ->name('auth.admin.')
    ->controller(AdminAuthController::class)
    ->group(function () {
        Route::post('/login', 'login')->name('login');
        Route::post('/password-reset', 'resetPassword')->name('password.reset');
        Route::post('/logout', 'logout')->name('logout');
    });
