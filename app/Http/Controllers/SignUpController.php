<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Validation\ValidationException;

class SignUpController extends Controller
{
    public function signup(Request $request)
    {
        try {
            // Validate request
            $validatedData = $request->validate([
                'first_name' => ['required', 'min:3', 'max:20'],
                'last_name' => ['required', 'min:3', 'max:20'],
                'Email' => ['required', 'email', 'unique:patients,email'],
                'dob' => ['required', 'date'],
                'Password' => ['required', 'min:8']
            ]);

            // Create patient
            Patient::create($validatedData);

            // Success flash message
            session()->flash('success', 'Registration successful!');
            return redirect('/login');

        } catch (ValidationException $e) {
            // Pass all validation errors back with input
            return back()
                ->withErrors($e->errors())
                ->withInput()
                ->with('isSignUp', true);
        }
    }
}