<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use App\Models\Availability;
use App\Models\AvailabilityOverride;
use Illuminate\Support\Facades\Auth;

class DentistAvailabilityController extends Controller
{
    public function editAvailability()
    {
        $dentistId = Auth::guard('dentist')->id();

        if (!$dentistId) {
            return redirect()->route('dentist.login')->with('error', 'Please login first.');
        }

        // Initialize empty array for all days
        $days = range(1, 6);
        $regularAvailability = array_fill_keys($days, ['start_time' => '', 'end_time' => '']);
        $overrideAvailability = array_fill_keys($days, ['start_time' => '', 'end_time' => '']);

        // Merge with existing data
        $existingRegular = Availability::where('dentist_id', $dentistId)
            ->get()
            ->keyBy('day_of_week')
            ->toArray();

        $existingOverride = AvailabilityOverride::where('dentist_id', $dentistId)
            ->get()
            ->keyBy('day_of_week')
            ->toArray();

        return view('edit_availability'
        );
    }
}
