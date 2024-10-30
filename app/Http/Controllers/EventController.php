<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use App\Models\Appointment;

use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    // Return the view
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Event::where('user_id', Auth::id()) // Only fetch events for the logged-in user
                ->whereDate('start', '>=', $request->start)
                ->whereDate('end', '<=', $request->end)
                ->get(['id', 'title', 'start', 'end', 'status']);
    
            return response()->json($data);
        }
    
        return view('admin.FullCalendar');
    }
    
    /**
     * Handle AJAX requests
     *
     * @return response()
     */
    public function ajax(Request $request)
    {
        // Ensure the user is logged in
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        switch ($request->type) {
            case 'add':
                $event = Event::create([
                    'user_id' => Auth::id(), // Associate the event with the logged-in user
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                    'status' => $request->status,
                    
                ]);
    
                return response()->json($event);
    
            case 'update':
                $event = Event::where('id', $request->id)
                    ->where('user_id', Auth::id()) // Ensure the event belongs to the logged-in user
                    ->first();
                    
                if ($event) {
                    $event->update([
                        'title' => $request->title,
                        'start' => $request->start,
                        'end' => $request->end,
                        'status' => $request->status,
                    ]);
                    return response()->json($event);
                } else {
                    return response()->json(['error' => 'Event not found or unauthorized'], 404);
                }
    
            case 'delete':
                $event = Event::where('id', $request->id)
                    ->where('user_id', Auth::id()) // Ensure the event belongs to the logged-in user
                    ->first();
                    
                if ($event) {
                    $event->delete();
                    return response()->json(['success' => 'Event deleted successfully']);
                } else {
                    return response()->json(['error' => 'Event not found or unauthorized'], 404);
                }
    
            default:
                return response()->json(['error' => 'Invalid request'], 400);
        }
    }
    public function getEvents(Request $request)
    {
        // Ensure the user is logged in
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    
        // Fetch events for the logged-in user
        $events = Event::where('user_id', Auth::id())->get();
    
        return response()->json($events);
    }
   
 
    
}
