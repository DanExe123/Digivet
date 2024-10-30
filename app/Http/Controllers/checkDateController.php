<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;

class checkDateController extends Controller
{
    public function checkDate(Request $request)
    {
        \Log::info('Checking date:', ['date' => $request->input('date')]);

        // Parse the input date and format it to 'Y-m-d' format
        $date = Carbon::parse($request->input('date'))->format('Y-m-d');
        
        // Check against the correct column ('start', 'end', etc.)
        $isClosed = Event::whereDate('start', $date)  // Use 'start' or whichever date column you're using
                         ->whereIn('status', ['closed', 'fully_booked'])
                         ->exists();

        \Log::info('Date closed status:', ['date' => $date, 'isClosed' => $isClosed]);

        // Return the response to the AJAX call
        return response()->json(['isClosed' => $isClosed]);
    }
}