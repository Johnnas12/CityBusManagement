<?php

namespace App\Http\Controllers\SystemAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SystemAdminController extends Controller
{
    //

    public function index(){
        return view('dashboard.index');
    }



}
