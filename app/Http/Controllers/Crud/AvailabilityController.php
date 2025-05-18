<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AvailabilityController extends Controller
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
        $dentistId = auth()->id(); // or however you're getting the dentist ID

        foreach ($request->input('availability', []) as $dayOfWeek => $times) {
            if (!empty($times['start_time']) && !empty($times['end_time'])) {
                Availability::updateOrCreate(
                    ['dentist_id' => $dentistId, 'day_of_week' => $dayOfWeek],
                    ['start_time' => $times['start_time'], 'end_time' => $times['end_time']]
                );
            }
        }

        return response()->json(['message' => 'Recurring availability saved.']);
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
