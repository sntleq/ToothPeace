<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use App\Models\WaitlistEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class WaitlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Search for waitlist entries based on a query string.
     */
    public function search(Request $request)
    {
        $query = $request->input('query');

        if (empty($query)) {
            return response()->json([]);
        }

        $waitlistEntries = WaitlistEntry::where('date', 'like', "%{$query}%")
            ->orWhere('time_start', 'like', "%{$query}%")
            ->orWhere('time_end', 'like', "%{$query}%")
            ->orWhereHas('patient', function($q) use ($query) {
                $q->where('first_name', 'like', "%{$query}%")
                  ->orWhere('last_name', 'like', "%{$query}%");
            })
            ->orWhereHas('dentist', function($q) use ($query) {
                $q->where('first_name', 'like', "%{$query}%")
                  ->orWhere('last_name', 'like', "%{$query}%");
            })
            ->orWhereHas('appointmentType', function($q) use ($query) {
                $q->where('name', 'like', "%{$query}%");
            })
            ->with(['patient', 'dentist', 'appointmentType'])
            ->get();

        return response()->json($waitlistEntries);
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
        $request->validate([
            'appointmentType' => 'required|exists:appointment_types,id',
            'preferredDentist' => 'required',
            'preferredDate' => 'required|date',
            'timeFrom' => 'required|date_format:H:i',
            'timeTo' => 'required|date_format:H:i|after:timeFrom',
        ]);

        WaitlistEntry::create([
            'patient_id' => auth()->id(),
            'appointment_type_id' => $request->appointmentType,
            'dentist_id' => $request->preferredDentist !== 'any' ? $request->preferredDentist : null,
            'date' => $request->preferredDate,
            'time_start' => $request->timeFrom,
            'time_end' => $request->timeTo,
        ]);

        return redirect()->route('patient.waitlist')->with('success', 'Waitlist entry submitted successfully!');
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
