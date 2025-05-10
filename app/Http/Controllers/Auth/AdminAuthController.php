<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AdminAuthController extends Controller
{
    public function signup(Request $request)
    {
        try {

            $validatedData = $request->validate([
                'first_name' => ['required', 'min:3', 'max:20'],
                'last_name' => ['required', 'min:3', 'max:20'],
                'email' => ['required', 'email', 'unique:patients,email'],
                'dob' => ['required', 'date'],
                'password' => ['required', 'min:8']
            ]);

            Patient::create($validatedData);
            session()->flash('success', 'Registration successful!');
            return redirect('/login');

        } catch (ValidationException $e) {
            return back()
                ->withErrors($e->errors())
                ->withInput()
                ->with('isSignUp', true);
        }
    }

    public function login(Request $request)
    {
        try {

            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            $patient = Patient::where('email', $request->email)->first();
            if (!$patient) {
                throw ValidationException::withMessages([
                    'login' => 'Email not registered.',
                ]);
            }

            if (!Hash::check($request->password, $patient->password)) {
                throw ValidationException::withMessages([
                    'login' => 'Password incorrect.',
                ]);
            }

            Auth::guard('patient')->login($patient);
            $request->session()->regenerate();
            return redirect('/patient/Appointments')->with('success', 'Login successfully!');

        } catch (ValidationException $e) {
            return back()->withErrors([
                'login' => 'Fill all the fields',
            ])->withInput();
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('patient')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.patient.login.form');
    }
}
