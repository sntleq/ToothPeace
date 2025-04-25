<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class SignUpController extends Controller
{
    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => ['required', 'min:3', 'max:20'],
            'middle_name' => ['required', 'min:3', 'max:20'],
            'last_name' => ['required', 'min:3', 'max:20'],
            'suffix' => ['nullable', 'max:5'],
            'email' => ['required', 'email'],
            'dob' => ['required', 'date'],
            'password' => ['required', 'min:8']
        ]);

        Patient::create($validatedData);

        return redirect('/login')->with('success', 'Registration successful!');
    }
}
