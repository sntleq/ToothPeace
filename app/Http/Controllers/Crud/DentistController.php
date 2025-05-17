<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use App\Models\Dentist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class DentistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Define rules
        $rules = [
            'lastName' => ['required', 'string', 'min:2', 'max:20'],
            'firstName' => ['required', 'string', 'min:2', 'max:20'],
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
            'password' => $request->password,
        ]);

        return redirect()->back()->with('success', 'Dentist added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
