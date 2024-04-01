<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
     
            if (auth()->user()->type == 'SystemAdmin') {
                return redirect()->route('sysadminDashboard');
            }else if (auth()->user()->type == 'Admin') {
                return redirect()->route('admin.index');
            }elseif (auth()->user()->type == 'Maintainance'){
                return redirect()->route('maintainance.index');
            }elseif (auth()->user()->type == 'Driver'){
                return redirect()->route('driver.index');
            }
        }else{
            return redirect()->route('login')
                ->with('error','Invalid User cridentials ');
        }




    }


    public function logout(Request $request)
    {
        // Store the current URL in the session before logout
        session(['previous_url' => URL::current()]);

        $this->guard()->logout();

        $request->session()->invalidate();

        // Customize the logout redirect path here
        return redirect()->route('landingPage'); // Replace 'frontend' with your desired logout redirect route
    }



}
