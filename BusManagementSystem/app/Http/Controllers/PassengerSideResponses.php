<?php

namespace App\Http\Controllers;

use App\Models\Route;
use App\Models\Tariff;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PassengerSideResponses extends Controller
{
    //
    public function searchResults(Request $request){
        $request->validate([
            'source' => 'required|string',
            'destination' => 'required|string',
        ]);

        $searchResults = Route::where('from', $request->source)
        ->where('to', $request->destination)
        ->get();


        // Return the search results as JSON response
            return response()->json(['data' => $searchResults]);

    }


    public function updateUnreservedSeats(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            //'unreservedSeats' => 'required|array',
            //'unreservedSeats.*' => 'integer', // Ensure each item is an integer
            'unreservedSeats'=>'required',
        ]);

        try {
            // Find the route by ID
            $route = Route::findOrFail($id);

            // Update the unreserved seats for the route
            $route->unreserved = $request->unreservedSeats;
            $route->save();

            // Return a success response
            return response()->json([
                'message' => 'Unreserved seats updated successfully',
                'data' => $request->unreservedSeats,
            ]);
        } catch (\Exception $e) {
            // Return an error response if something goes wrong
            return response()->json([
                'message' => 'Failed to update unreserved seats',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    public function ticket(Request $request){
        $request->validate([
            'routeID'=> 'required', 
            'starttime' => 'required', 
            'departuretime'=> 'required', 
            'starttime' => 'required',
            'departuretime' => 'required',
        ]);

        $ticketId =  Str::random(15); 

        if (!ctype_alpha($ticketId[0])) {
            $ticketId = chr(rand(65, 90)) . substr($ticketId, 1);
        }
        $ticketId .= rand(100, 999);

        $user = Ticket::create([
            'routeID' => $request->routeID,
            'ticketID' => $ticketId,
            'passengerID'=>$request->passengerID,
            'from' => $request->from, 
            'to' => $request->to,
            'status' => 'Valid',
            'starttime' => $request->starttime,
            'departuretime' => $request->departuretime,
            
        ]);
        return response()->json([
            'message' => 'Ticket Created Successfully',

        ]);

    }

    public function ticketRefresh($id){
        

        $tickets = Ticket::all();

        //$ticketsnumber = count($tickets);
        foreach ($tickets as $ticket) {
            $now =  Carbon::now();
            $starttime = Carbon::createFromFormat('H:i', $ticket->starttime);
            $departuretime = Carbon::createFromFormat('H:i', $ticket->departuretime);

            if ($now->between($starttime, $departuretime)) {
                $ticket->status = 'Valid';
            } else {
                $ticket->status = 'Invalid';
            }

            $ticket->save(); 
        }


        $data = Ticket::where('passengerID',  $id)->get();
        return response()->json(([
            'message' => 'Refresh Successfully', 
            'data' => $data,
            
        ]));


    }


    
}
