<?php

// app/Http/Middleware/CheckRole.php


namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;


class CheckRole
{
    // public function handle($request, Closure $next, ...$roles)
    // {
        
    //     if (Auth::check() && Auth::user()->hasRoles($roles)) {
    //         return $next($request);
    //     }

    //     abort(403, 'Unauthorized.');
    // }


    public function handle(Request $request, Closure $next, $userType)
    {
        if(auth()->user()->type == $userType){
            return $next($request);
        }
        else{


        $response = [
            'error' => 'You do not have permission to access this resource.',
            'back_link' => $this->getPreviousUrl($request),
        ];

        return response()->json($response, 403);
    }


}

        private function getPreviousUrl(Request $request)
        {
            $previousUrl = url()->previous();

            // Ensure we don't redirect to the same route (to prevent an infinite loop)
            if ($previousUrl == $request->url()) {
                // Return the application's root URL as a fallback
                return route('home'); // Change 'home' to your desired route
            }

            return $previousUrl;
        }

}
 