<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'mname' =>['required'],
            'lname' =>['required'],
            'username' =>['required'],
            'phone' =>['required'],
            'position' =>['required'],
            'age' =>['required'],
            'expriance' =>['required'],
            'gender' =>['required'],
            'profile' =>['required'],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    // protected function create(array $data, Request $request)
    // {
    //     return $user = User::create([
    //         'name' => $data['name'],
    //         'mname' => $data['mname'],
    //         'lname' => $data['lname'],
    //         'username' => $data['username'],
    //         'phone' => $data['phone'],
    //         'position' => $data['position'],
    //         'age' => $data['age'],
    //         'expriance' => $data['expriance'],
    //         'gender' => $data['gender'],
    //         'profile' => $data['profile'],
    //         'email' => $data['email'],  
    //         'password' => Hash::make($data['password']),

    //     ]);

    //     $role = $request->input('');
    //     $user->assignRole($role);
    // }


    public function store(Request $request){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'mname' =>['required'],
            'lname' =>['required'],
            'username' =>['required'],
            'phone' =>['required'],
            'position' =>['required'],
            'age' =>['required'],
            'expriance' =>['required'],
            'gender' =>['required'],
            'profile' =>['required'],

        ]);

       $user =  User::create([

            'name' => $request->name,
            'mname' => $request->mname,
            'lname' =>$request->lname, 
            'username' => $request->username,
            'phone' => $request->phone,
            'position' => $request->position,
            'age' => $request->age,
            'expriance' => $request->expriance,
            'gender' => $request->gender,
            'profile' => $request->profile,
            'email' => $request->email,  
            'password' => Hash::make($request->password),

        ]);

        $role = $request->input('role');
        $user->assignRole($role);

    }
    
}
