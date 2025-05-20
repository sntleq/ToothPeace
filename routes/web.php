<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForgotPasswordController;

require __DIR__ . '/auth.php';
require __DIR__ . '/crud.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/patient.php';
require __DIR__ . '/dentist.php';

// GET routes for views only

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/login', function () {
    session(['isSignUp' => false]);
    return view('login');
})->name('login');

Route::get('/signup', function () {
    session(['isSignUp' => true]);
    return view('login');
})->name('signup');


Route::get('/forgot-password', 
[ForgotPasswordController::class, 
'showForgotPasswordForm'])->name('password.request');

Route::post('/forgot-password/email', 
[ForgotPasswordController::class, 
'sendResetCode'])->name('password.email');

Route::post('/forgot-password/reset', 
[ForgotPasswordController::class, 
'resetPassword'])->name('password.update');

