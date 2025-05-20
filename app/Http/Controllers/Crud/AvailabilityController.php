<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Availability;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AvailabilityController extends Controller
{
    public function update(Request $request)
    {
        $dentistId = Auth::guard('dentist')->id();

        if (!$dentistId) {
            return redirect()->back()->with('error', 'Dentist not authenticated.');
        }

        // Validate input structure
        $validated = $request->validate([
            'availability' => 'required|array',
            'availability.*.start_time' => 'nullable|date_format:H:i',
            'availability.*.end_time' => 'nullable|date_format:H:i|after:availability.*.start_time',
        ]);

        try {
            // Use transaction for data consistency
            \DB::transaction(function () use ($dentistId, $validated) {
                // Delete old availability entries for this dentist
                Availability::where('dentist_id', $dentistId)->delete();

                // Save new availability entries
                foreach ($validated['availability'] as $day => $time) {
                    if (!empty($time['start_time']) && !empty($time['end_time'])) {
                        Availability::create([
                            'day_of_week' => $day,
                            'start_time' => $time['start_time'],
                            'end_time' => $time['end_time'],
                            'dentist_id' => $dentistId,
                        ]);
                    }
                }
            });

            return redirect()->route('dentist.availability')->with('success', 'Recurring Schedule Saved Successfully!');
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to save availability: ' . $e->getMessage());
        }
    }
}