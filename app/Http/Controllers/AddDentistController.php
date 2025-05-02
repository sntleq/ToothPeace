<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dentist;

class AddDentistController extends Controller
{
    public function AddDentist(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'lastName' => ['required', 'min:3', 'max:20'],
                'firstName' => ['required', 'min:3', 'max:20'],
                'middleName' => ['required', 'min:3', 'max:20'],
                'username' => ['required', 'max:20', 'unique:dentists,username'],
                'email' => ['required', 'email', 'unique:dentists,email'],
                'dob' => ['required', 'date'],
                'password' => ['required', 'min:8'],
                'confirmPassword' => ['required', 'same:password', 'min:8']
            ]);

            Dentist::create([
                'first_name' => $validatedData['firstName'],
                'middle_name' => $validatedData['middleName'],
                'last_name' => $validatedData['lastName'],
                'username' => $validatedData['username'],
                'email' => $validatedData['email'],
                'dob' => $validatedData['dob'],
                'password' => bcrypt($validatedData['password'])
            ]);

            session()->flash('success', 'Dentist added successfully!');
            return redirect('/admin/Dentists')->with('success', 'Dentist added successfully!');

        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->errors();
            
            if (isset($errors['email']) && str_contains($errors['email'][0], 'taken')) {
                session()->flash('error', 'This email is already registered.');
            } elseif (isset($errors['username']) && str_contains($errors['username'][0], 'taken')) {
                session()->flash('error', 'This username is already taken.');
            } else {
                session()->flash('error', $e->errors()[array_key_first($e->errors())][0]);
            }

            return back()->withInput();
        }
    }
}
