<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Route;
use App\Models\Tarrif;
use App\Models\Ticket;
use App\Models\User;
use BaconQrCode\Encoder\QrCode;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Milon\Barcode\BarcodeGeneratorPNG;
use Milon\Barcode\BarcodeGenerator;
use Milon\Barcode\DNS1D;

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
        

        $initial_seats = '[1,2,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,24,25,26,27,28,29,30,31,32,33,35,36,37]';
        $initial_reserved = '[]';

       $route = new Route([
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
        $route->save();
        $ticketId =  Str::random(15); 

        if (!ctype_alpha($ticketId[0])) {
            $ticketId = chr(rand(65, 90)) . substr($ticketId, 1);
        }
        $ticketId .= rand(100, 999);

        $ticket = new Ticket([
            'ticketID' => $ticketId, 
            'status' => 'valid', 
            'starttime' => $request->starttime, 
            'departuretime' => $request->departuretime
        ]);
        $ticket->routeID = $route->id;
        $ticket->save();



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


    public function manageEmployee(){

        return view('Admin.manageemployee', [
            'datas' => User::whereNotIn('type', [4])->get()
        ]);
    }

    public function employeeId(string $id){

   
        $barcode = DNS1D::getBarcodePNGPath('4445645656', 'PHARMA2T',3,33);
        

        return view('Admin.employeeID',
        ['data' => User::where('id', '=',  $id)->first(),
          'barcode' => $barcode  
        ]);

    }


}
