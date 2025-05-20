<?php

namespace App\Http\Controllers;

use App\Models\Dentist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AddDentistController extends Controller
{
    /**
     * Show the "Add Dentist" form.
     */
    public function create()
    {
        return view('admin_add_dentists');
    }

    /**
     * Handle the POST from the "Add Dentist" form.
     */
    public function store(Request $request)
    {
        // 1) Validate incoming data
        $data = $request->validate([
            'lastName' => ['required', 'string', 'min:3', 'max:20'],
            'firstName' => ['required', 'string', 'min:3', 'max:20'],
            'middleName' => ['nullable', 'string', 'min:2', 'max:20'],
            'username' => ['required', 'string', 'min:3', 'max:20', 'unique:dentists,username'],
            'email' => ['required', 'email', 'unique:dentists,email'],
            'dob' => ['required', 'date'],
            'password' => ['required', 'confirmed', 'min:8'],  // adds password_confirmation
        ]);

        // 2) Hash the password
        $data['password'] = Hash::make($data['password']);

        // 3) Create the dentist
        Dentist::create([
            'last_name' => $data['lastName'],
            'first_name' => $data['firstName'],
            'middle_name' => $data['middleName'],
            'username' => $data['username'],
            'email' => $data['email'],
            'dob' => $data['dob'],
            'password' => $data['password'],
        ]);

        // 4) Flash success & redirect
        session()->flash('success', 'New dentist added successfully!');
        return redirect()->route('admin.dentists');
    }
}
