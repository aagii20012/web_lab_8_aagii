<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Fligth;
use Illuminate\Http\Request;

class Book extends Controller
{
    public function book(Request $request){
        $book=Fligth::where('flightNumber',$request->flightNumber)
        ->decrement('passengerNumber',1);
        
        $data= new Booking;

        $data->passengerName=$request->passengerName;
        $data->passengerBirth=$request->passengerBirth;
        $data->flightNumber=$request->flightNumber;

        $data->save();
        
        return response()->json(['bookingID'=>$data->id,
        "created_at"=>$data->created_at->format('Y-m-d')]);
    }
}