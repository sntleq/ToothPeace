<?php


use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::name('auth.')
    ->controller(AuthController::class)
    ->group(function () {
        Route::post('/signup', 'signup')->name('signup');
        Route::post('/login', 'login')->name('login');
        Route::post('/password-reset', 'resetPassword')->name('auth.user.password.reset');
        Route::post('/logout', 'logout')->name('logout');
    });



