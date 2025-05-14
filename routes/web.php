<?php

use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';
require __DIR__.'/crud.php';
require __DIR__.'/admin.php';
require __DIR__.'/patient.php';
require __DIR__.'/dentist.php';

// GET routes for views only

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/services', function() {
    return view('services');
})->name('services');

Route::get('/login', function() {
    return redirect()->route('home');
})->name('login');
