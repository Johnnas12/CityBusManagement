<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Route;
use App\Models\Tarrif;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(){
        return view('Admin.index');
    }

    public function routePage(){
        return view('Admin.routePage', ['datas' => Tarrif::get(), 
                                        'drivers' => User::where('type', 2)->get()
    ]);
    }

    public function storeRoute(Request $request){
        $request->validate([
            'from' => 'required',
            'to' => 'required',
            'via' => 'required',
            'driver' => 'required',
            'starttime' => 'required',
            'departuretime' => 'required',
        ]);

        $startCity = $request->input('from');
        $destinationCity = $request->input('to');

        $trip = Tarrif::where('from', $startCity)
                    ->where('to', $destinationCity)
                    ->first();
        

        if ($trip) {
            $price = $trip->price;
            $busnum = $trip->busnum;
            $distance = $trip->distance;
        }
        

        $initial_seats = '[1, 2, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15]';
        $initial_reserved = '[]';

        Route::create([
            'busnum' => $busnum, 
            'from' => $request->from, 
            'to' => $request->to, 
            'via' => $request->via, 
            'driver' => $request->driver, 
            'starttime' => $request->starttime,
            'departuretime' => $request->departuretime,
            'price' => $price,
            'distance' => $distance,
            'availableseats' => 50, 
            'reserved' => $initial_reserved, 
            'unreserved' => $initial_seats,
        ]);

        return redirect()->back()->with('message', "Route Created Successfully");
    }

    public function tarrifView(){
        return view('Admin.tarrifctrl');
    }

    public function storeTarrif(Request $request){
        $request->validate([
            'busnum' => 'required', 
            'from' => 'required',
            'to' => 'required',
            'via' => 'required',
            'distance' => 'required',
            'price' => 'required', 
        ]);

        Tarrif::create([
            'busnum' => $request->busnum,
            'from' => $request->from, 
            'to' => $request->to, 
            'via' => $request->via, 
            'distance' => $request->distance, 
            'price' => $request->price,
        ]);

        return redirect()->back()->with('message', "Route Created Successfully");
    }

    public function updateTarrif(Request $request,  $id){
        $request->validate([
            'busnum' => 'required', 
            'from' => 'required',
            'to' => 'required',
            'via' => 'required',
            'distance' => 'required',
            'price' => 'required', 
        ]);

        Tarrif::where('id', $id)->update([
            'busnum' => $request->busnum,
            'from' => $request->from, 
            'to' => $request->to, 
            'via' => $request->via, 
            'distance' => $request->distance, 
            'price' => $request->price,
        ]);

        return redirect()->route('manageTarrif')->with('message', "Tarrif Updated Successfully!");
    }


    public function manageTarrif(){
        return view('Admin.tarrifManage', ['datas' => Tarrif::get()]);
    }

    public function payment(){
        return view("Admin.pay");
    }

    public function TarrifshowMore(string $id){

        return view('Admin.tarrifshow',
        ['data' => Tarrif::where('id', '=',  $id)->first(),
        ]);

    }

    
    public function tarrifEdit(string $id){

        return view('Admin.edit.tarrifedit',
        ['data' => Tarrif::where('id', '=',  $id)->first(),
         'datas' => Tarrif::get(), 
         'drivers' => User::where('type', 2)->get()
        ]);
    }


}
