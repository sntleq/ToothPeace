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
        $days = range(0, 6);
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

        return view('edit_availability', [
            'regularAvailability' => array_replace($regularAvailability, $existingRegular),
            'overrideAvailability' => array_replace($overrideAvailability, $existingOverride),
            'days' => [
                0 => 'Sunday',
                1 => 'Monday',
                2 => 'Tuesday', 
                3 => 'Wednesday',
                4 => 'Thursday',
                5 => 'Friday',
                6 => 'Saturday',
            ]
        ]);
    }
}