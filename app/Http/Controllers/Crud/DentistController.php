<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use App\Models\Dentist;
use App\Models\Patient;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
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
     * Search for dentists based on a query string.
     */
    public function search(Request $request)
    {
        $query = $request->input('query');

        if (empty($query)) {
            return response()->json([]);
        }

        $dentists = Dentist::where('first_name', 'like', "%{$query}%")
            ->orWhere('last_name', 'like', "%{$query}%")
            ->orWhere('email', 'like', "%{$query}%")
            ->get();

        return response()->json($dentists);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin_add_dentists');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'last_name' => ['required', 'string', 'min:2', 'max:20'],
            'first_name' => ['required', 'string', 'min:2', 'max:20'],
            'email' => [
                'required',
                'email',
                Rule::unique('dentists', 'email'),
                Rule::unique('patients', 'email'),
                Rule::unique('admins', 'email')
            ],
            'dob' => ['required', 'date', 'before:today'],
            'password' => ['required', 'string', 'min:8'],
            'password_confirm' => ['required', 'same:password', 'min:8'],
        ];

        $messages = [
            'email.unique' => 'This email is already registered.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        Dentist::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'dob' => $request->dob,
            'password' => Hash::make($request->password), // Make sure to hash the password
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
