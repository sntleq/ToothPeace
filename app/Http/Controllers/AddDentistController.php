<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dentist;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AddDentistController extends Controller
{
    public function AddDentist(Request $request)
    {
        // Define rules
        $rules = [
            'lastName' => ['required', 'string', 'min:2', 'max:20'],
            'firstName' => ['required', 'string', 'min:2', 'max:20'],
            'middleName' => ['required', 'string', 'min:2', 'max:20'],
            'username' => [
                'required',
                'string',
                'max:20',
                Rule::unique('dentists', 'username')
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('dentists', 'email')
            ],
            'dob' => ['required', 'date', 'before:today'],
            'password' => ['required', 'string', 'min:8'],
            'confirmPassword' => ['required', 'same:password', 'min:8'],
        ];

        // Custom messages
        $messages = [
            'lastName.required' => 'Last name is required.',
            'lastName.min' => 'Last name must be at least 2 characters.',
            'lastName.max' => 'Last name cannot exceed 20 characters.',

            'firstName.required' => 'First name is required.',
            'firstName.min' => 'First name must be at least 2 characters.',
            'firstName.max' => 'First name cannot exceed 20 characters.',

            'middleName.required' => 'Middle name is required.',
            'middleName.min' => 'Middle name must be at least 2 characters.',
            'middleName.max' => 'Middle name cannot exceed 20 characters.',

            'username.required' => 'Username is required.',
            'username.unique' => 'This username is already taken.',
            'username.max' => 'Username cannot exceed 20 characters.',

            'email.required' => 'Email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already registered.',

            'dob.required' => 'Date of birth is required.',
            'dob.date' => 'Please enter a valid date.',
            'dob.before' => 'Date of birth must be in the past.',

            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 8 characters.',

            'confirmPassword.required' => 'Confirm password is required.',
            'confirmPassword.same' => 'Passwords do not match.',
            'confirmPassword.min' => 'Confirm password must be at least 8 characters.',
        ];

        // Validate request
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create dentist
        Dentist::create([
            'first_name' => $request->firstName,
            'middle_name' => $request->middleName,
            'last_name' => $request->lastName,
            'username' => $request->username,
            'email' => $request->email,
            'dob' => $request->dob,
            'password' => bcrypt($request->password),
        ]);

        return redirect('/admin/Dentists')->with('success', 'Dentist added successfully!');
    }
}