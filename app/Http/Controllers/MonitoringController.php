<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MonitoringController extends Controller
{
   public function index(Request $request){

        return view('monitoring.index',compact('request'));
    }
}
