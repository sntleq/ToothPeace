<?php

use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('patient')
    ->name('auth.')
    ->controller(AuthController::class)
    ->group(function () {
        Route::post('/signup', 'signup')->name('signup');
        Route::post('/login', 'login')->name('login');
        Route::post('/password-reset', 'resetPassword')->name('password.reset');
        Route::get('/logout', 'logout')->name('logout');
    });

Route::prefix('dentist')
    ->name('auth.')
    ->controller(AuthController::class)
    ->group(function () {
        Route::post('/login', 'login')->name('login');
        Route::post('/password-reset', 'resetPassword')->name('password.reset');
        Route::get('/logout', 'logout')->name('logout');
    });

Route::prefix('admin')
    ->name('auth.admin.')
    ->controller(AdminAuthController::class)
    ->group(function () {
        Route::post('/login', 'login')->name('login');
        Route::post('/password-reset', 'resetPassword')->name('password.reset');
        Route::post('/logout', 'logout')->name('logout');
    });
