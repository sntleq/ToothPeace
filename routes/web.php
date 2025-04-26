<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignUpController;

Route::get('/', function () {
    return view('index');
});

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

Route::get('/appointmentHistory', function(){
    return view('appointment_history');
});

Route::get('/EditProfile', function(){
    return view('edit_profile');
});

Route::get('/ForgotPass', function(){
    return view('forgot_pass');
});

Route::prefix('admin')->group(function () {
    Route::get('/AddDentist', function () {
        return view('admin_add_dentists');
    });

    Route::get('/Appointments', function () {
        return view('admin_appointments');
    });

    Route::get('/Controls', function () {
        return view('admin_controls');
    });

    Route::get('Dashboard', function () {
        return view('admin_dashboard');
    });

    Route::get('/Dentists', function () {
        return view('admin_dentists');
    });

    Route::get('Patients', function () {
        return view('admin_patients');
    });

    Route::get('Waitlist', function () {
        return view('admin_waitlist');
    });
});

Route::prefix('dentist')->group(function () {
    Route::get('/Availability', function () {
        return view('dentist_availability');
    });

    Route::get('/Dashboard', function () {
        return view('dentist_dashboard');
    });

    Route::get('/ScheduleHistory', function () {
        return view('dentist_schedule_history');
    });

    Route::get('/Schedule', function () {
        return view('dentist_schedule');
    });
});

Route::prefix('patient')->group(function () {
    Route::get('/Appointments', function () {
        return view('patient_appointments');
    });

    Route::get('/Profile', function () {
        return view('patient_profile');
    });

    Route::get('/Waitlist', function () {
        return view('patient_waitlist');
    });   
});
