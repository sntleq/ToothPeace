<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginDentist(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        // Return a generic error if any field is empty
        if (empty($email) || empty($password)) {
            return back()->withErrors([
                'login' => 'Invalid Email or Password',
            ]);
        }

        // Attempt to authenticate the user
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $request->session()->regenerate();
            return redirect()->intended('/dentist/Dashboard');
        }

        return back()->withErrors([
            'login' => 'Invalid Email or Password',
        ])->withInput();
    }

}
