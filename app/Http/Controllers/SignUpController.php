<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class SignUpController extends Controller
{
    public function login(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'first_name' => ['required', 'min:3', 'max:20'],
                'middle_name' => ['required', 'min:3', 'max:20'],
                'last_name' => ['required', 'min:3', 'max:20'],
                'suffix' => ['nullable', 'max:5'],
                'email' => ['required', 'email', 'unique:patients,email'],
                'dob' => ['required', 'date'],
                'password' => ['required', 'min:8']
            ]);

            Patient::create($validatedData);
            session()->flash('success', 'Registration successful!');
            return redirect('/login');

        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->errors();
            if (isset($errors['email']) && str_contains($errors['email'][0], 'taken')) {
                session()->flash('error', 'This email is already registered.');
            } else {
                session()->flash('error', $e->errors()[array_key_first($e->errors())][0]);
            }
            return back()
                ->withInput()
                ->with('isSignUp', true);
        }
    }
}
