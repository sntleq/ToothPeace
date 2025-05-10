<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Dentist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class DentistAuthController extends Controller
{
    public function login(Request $request)
    {
        try {

            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            $dentist = Dentist::where('email', $request->email)->first();
            if (!$dentist) {
                throw ValidationException::withMessages([
                    'login' => 'Email not registered.',
                ]);
            }

            if (!Hash::check($request->password, $dentist->password)) {
                throw ValidationException::withMessages([
                    'login' => 'Password incorrect.',
                ]);
            }

            Auth::guard('dentist')->login($dentist);
            $request->session()->regenerate();
            return redirect('/dentist/Dashboard')->with('success', 'Login successfully!');

        } catch (ValidationException $e) {
            return back()->withErrors([
                'login' => 'Fill all the fields',
            ])->withInput();
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('dentist')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.patient.login.form');
    }
}
