<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Dentist;
use App\Models\Timeslot;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Search for appointments based on a query string.
     */
    public function search(Request $request)
    {
        $query = $request->input('query');

        if (empty($query)) {
            return response()->json([]);
        }

        $appointments = Appointment::where('date', 'like', "%{$query}%")
            ->orWhere('time', 'like', "%{$query}%")
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

        return response()->json($appointments);
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
        $rules = [
            'appointment_type_id' => ['required', 'exists:appointment_types,id'],
            'dentist_id' => ['nullable', 'exists:dentists,id'],
            'slot_id' => ['required', 'exists:timeslots,id'],
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $slot = Timeslot::find($request->slot_id);
        $nextMonday = Carbon::now()->startOfWeek()->addWeek();
        $dates = collect(range(1,6))
            ->map(fn($i) => $nextMonday->copy()->addDays($i - 1)->toDateString())
            ->all();

        Appointment::create([
            'date'                  => $dates[$slot->day_of_week - 1],
            'time'                  => $slot->start_time,
            'patient_id'            => auth()->id(),
            'dentist_id'            => $request->dentist_id,
            'appointment_type_id'   => $request->appointment_type_id,
        ]);

        return redirect()->back()->with('success', 'Appointment booked successfully!');
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

    public function cancel(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->is_active = false;
        $appointment->save();

        return back()->with('success', 'Appointment cancelled. Waitlist will be notified in 30 minutes.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
