<?php

namespace App\Http\Controllers;

use App\Models\Fligth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Flight extends Controller
{
    public function getDPort(){
        $data=DB::table('fligths')
        ->select('departureAirport')->get();
        return $data;
    }
    public function getAPort(){
        $data=DB::table('fligths')
        ->select('arrivalAirport')->get();
        return $data;
    }
    public function search(Request $request)
    {
        $data=Fligth::select('flightNumber','departureAirport'
        ,'arrivalAirport','departureDate')
        ->where('departureAirport',$request->departureAirport)
        ->where('arrivalAirport',$request->arrivalAirport)
        ->where('departureDate','>',$request->departureDate)
        ->where('passengerNumber','>',$request->passengerNumber)->get();
        return $data;
    }
}
