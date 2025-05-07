<?php

namespace App\Http\Controllers;

use App\Models\Dentist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function loginDentist(Request $request)
    {
        // Validate inputs
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Check if Dentist exists
        $dentist = Dentist::where('email', $request->email)->first();

        if (!$dentist) {
            throw ValidationException::withMessages([
                'login' => 'Email not registered.',
            ]);
        }

        // Check password
        if (!\Hash::check($request->password, $dentist->password)) {
            throw ValidationException::withMessages([
                'login' => 'Password incorrect.',
            ]);
        }

        // Log in the dentist
        Auth::login($dentist);

        // Regenerate session
        $request->session()->regenerate();

        // Redirect
        return redirect('/admin/Dentists')->with('success', 'Login successfully!');

        return back()->withErrors([
            'login' => 'Fill all the fields',
        ])->withInput();
    }
}