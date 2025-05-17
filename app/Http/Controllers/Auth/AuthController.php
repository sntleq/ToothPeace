<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Dentist;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function signup(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'first_name' => ['required', 'min:3', 'max:20'],
                'last_name' => ['required', 'min:3', 'max:20'],
                'signup_email' => ['required', 'email', 'unique:patients,email'],
                'dob' => ['required', 'date'],
                'password' => ['required', 'min:8']
            ]);

            // Map signup_email to email for the database
            $validatedData['email'] = $validatedData['signup_email'];
            unset($validatedData['signup_email']);
            
            // Hash the password before storing it
            $validatedData['password'] = Hash::make($validatedData['password']);

            Patient::create($validatedData);

            session()->flash('success', 'Registration successful!');
            return redirect()->route('patient.login');

        } catch (ValidationException $e) {
            return back()
                ->withErrors($e->errors())
                ->withInput()
                ->with('isSignUp', true);
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'login_email' => 'required|email',
            'password' => 'required',
        ]);

        $dentist = Dentist::where('email', $request->login_email)->first();
        $patient = Patient::where('email', $request->login_email)->first();

        if (!$dentist && !$patient) {
            throw ValidationException::withMessages([
                'login' => 'Email not registered.',
            ]);
        }

        if ($dentist) {
            if (!Hash::check($request->password, $dentist->password)) {
                throw ValidationException::withMessages([
                    'login' => 'Password incorrect.',
                ]);
            }

            Auth::guard('dentist')->login($dentist);
            $request->session()->regenerate();
            return redirect()->route('dentist.dashboard')->with('success', 'Login successful!');
        }

        if ($patient) {
            if (!Hash::check($request->password, $patient->password)) {
                throw ValidationException::withMessages([
                    'login' => 'Password incorrect.',
                ]);
            }

            Auth::guard('patient')->login($patient);
            $request->session()->regenerate();
            return redirect()->route('patient.home')->with('success', 'Login successful!');
        }

        // Fallback
        return back()->withErrors([
            'login' => 'Login failed.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        // Logout from both guards to ensure session is clean
        Auth::guard('dentist')->logout();
        Auth::guard('patient')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Logged out successfully!');
    }
}
