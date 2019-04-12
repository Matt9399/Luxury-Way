<?php

namespace App\Http\Controllers;

use App\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function suiteInfo(Request $request){
        return view('course/info',['address_start' => $request['start'],
            'address_arrival' => $request['end'], 'price' => $request['price'],
            'distance' => $request['distance'], 'duration' => $request['duration'],
            'date_start' => $request['date'], 'distance_text' => $request['distance_text']
            ]);
    }

}
