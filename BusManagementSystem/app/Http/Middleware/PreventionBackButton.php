<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PreventionBackButton
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // public function handle($request, Closure $next)
    // {
    //     $response= $next($request);


    //     return $response->header( 'Cache-Control','nocache,no-store,max-age=0,must-revalidate')
    //                     ->header('pragma','no-cache')
    //                     ->header('Expires','sat, 26 jul 1997 05:00:00 GMT');





    // }

    public function handle($request, Closure $next)
{
    $handle = $next($request);

    if(method_exists($handle, 'header'))
    {
        $handle->header('Access-Control-Allow-Origin' , '*')
               ->header('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE')
               ->header('Access-Control-Allow-Headers', 'Content-Type, Accept, Authorization, X-Requested-With, Application');
    }

    return $handle;
    
}
}
