<?php

namespace App\Http\Controllers\Maintainance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MaintainanceController extends Controller
{
    //
    public function index(){
        return view('Maintainance.index');
    }
}
