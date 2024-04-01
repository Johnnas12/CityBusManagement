<?php

namespace App\Http\Controllers;

use App\Models\Route;
use App\Models\Tariff;
use Illuminate\Http\Request;

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

    
}
