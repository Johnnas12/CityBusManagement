<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function registrationForm(){

        return view('registerusers');
        
    }


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
            'type' => $request->role,

        ]);


        //defining roles

        //   Role::create(['name' => 'Admin']);
        //   Role::create(['name' => 'SystemAdmin']);
        //   Role::create(['name' => 'Driver']);
        //   Role::create(['name' => 'Maintainance']);


        $customeRoleName = '';
        if ($request->role == "1") {
            $customeRoleName = 'SystemAdmin';
        }else if($request->role == "2"){
            $customeRoleName = 'Admin';
        }else if($request->role == "3"){
            $customeRoleName = 'Driver';
        }else if($request->role == "4"){
            $customeRoleName = 'Maintainance';
        }
    
        //$role = $request->input('role');
        $user->assignRole($customeRoleName);


    
    
        return redirect()->back()->with('message', 'user Registered successfully!');
    }


}
