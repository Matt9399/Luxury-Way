<?php

namespace App\Http\Controllers;

use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Cart;
use Session;

class ReservationController extends Controller
{

    public function store(Request $request)
    {
        $this->validate($request,[
            'id_utilisateur'  => 'required|integer',
            'date_start' => 'required|date',
            'address_start' => 'required|string',
            'address_arrival' => 'required|string',
            'distance' => 'required|integer',
            'price' => 'required',
            'duration' => 'required|integer'
        ]);
        DB::insert('insert into reservations (id_customer, isPaid, address_start, address_arrival, price, distance, duration, state_request) values (?, 0, ?, ?, ?, ?, ?, 0)',
            [$request['id_utilisateur'], $request['address_start'], $request['address_arrival'], $request['price'], $request['distance'],
                $request['duration']]);

        $this->getAddToCart($request, $request['id_utilisateur']);
        return view('course.index');
    }



    public function suiteInfo(Request $request){
        return view('course/info',['address_start' => $request['start'],
            'address_arrival' => $request['end'], 'price' => $request['price'],
            'distance' => $request['distance'], 'duration_text' => $request['duration_text'],
            'date_start' => $request['date'], 'distance_text' => $request['distance_text'],
            'duration' => $request['duration']
            ]);
    }

    public function getAddToCart(Request $request, $id) {
        $idRes = DB::table('reservations')->where('id_customer', $id)->first();
        $idRes = $idRes->id;
        $reservation = Reservation::findOrFail($idRes);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($reservation, $reservation->id);

        $request->session()->put('cart', $cart);
        return redirect()->route('shop');
    }

    public function getDelCart(Request $request, $id) {
        If(!Session::has('cart')){
            return view('home');
        }
        $reservation = Reservation::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->del($reservation, $reservation['id']);

        $request->session()->put('cart', $cart);
        return redirect()->route('product.shoppingCart');
    }

   /* public function getCheckout(){
        If(!Session::has('cart')){
            return view('cart');
        }
        $oldCart =  Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view(shop.checkout, ['total' => $total]);
    }
*/

}
