<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AvailabilityOverride;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class AvailabilityOverrideController extends Controller
{
    public function update(Request $request)
    {
        $dentistId = Auth::guard('dentist')->id();

        if (!$dentistId) {
            return redirect()->back()->with('error', 'Dentist not authenticated.');
        }

        // Step 1: Basic structure validation
        $validated = $request->validate([
            'availability' => 'required|array',
            'availability.*.start_time' => 'nullable|date_format:H:i',
            'availability.*.end_time' => 'nullable|date_format:H:i',
        ]);

        $validEntries = [];

        // Step 2: Additional logical validation
        foreach ($validated['availability'] as $day => $time) {
            $start = $time['start_time'] ?? null;
            $end = $time['end_time'] ?? null;

            // Skip completely empty entries
            if (empty($start) && empty($end)) {
                continue;
            }

            // One is filled but not the other
            if (!empty($start) && empty($end)) {
                throw ValidationException::withMessages([
                    "availability.$day.end_time" => "End time is required when start time is provided.",
                ]);
            }

            if (empty($start) && !empty($end)) {
                throw ValidationException::withMessages([
                    "availability.$day.start_time" => "Start time is required when end time is provided.",
                ]);
            }

            // End time must be after start time
            if (strtotime($end) <= strtotime($start)) {
                throw ValidationException::withMessages([
                    "availability.$day.end_time" => "End time must be after start time.",
                ]);
            }

            $validEntries[$day] = [
                'start_time' => $start,
                'end_time' => $end,
            ];
        }

        // Require at least one valid entry
        if (count($validEntries) === 0) {
            throw ValidationException::withMessages([
                'availability' => ['Please provide at least one valid start and end time.'],
            ]);
        }

        // Step 3: Save to DB
        try {
            DB::transaction(function () use ($dentistId, $validEntries) {
                AvailabilityOverride::where('dentist_id', $dentistId)->delete();

                foreach ($validEntries as $day => $time) {
                    AvailabilityOverride::create([
                        'day_of_week' => $day,
                        'start_time' => $time['start_time'],
                        'end_time' => $time['end_time'],
                        'dentist_id' => $dentistId,
                    ]);
                }
            });

            return redirect()->route('dentist.availability')->with('success', 'Override Schedule Saved Successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to save override availability: ' . $e->getMessage());
        }
    }

}
