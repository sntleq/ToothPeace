<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignUpController;

Route::get('/index', function () {
    return view('index');
});

Route::post('/login', [SignUpController::class, 'login']);

Route::get('/login', function(){
    return view('login');
});

Route::get('/services', function(){
    return view('services');
});