<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Courier;
use App\Models\CustomerAddress;
use App\Models\Payment;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class CheckoutController extends Controller
{
    public function index()
    {
        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);
        $id= Auth::user()->id;
        return \view('frontend.layouts.shopping.co', [
            'address' => CustomerAddress::where('cst_id', $id )->latest()->get(),
            'payment' => Payment::latest()->get(),
            'shipment' => Courier::latest()->get(),
            'province' => Province::all()
        ])->with('cart_data',$cart_data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        \dd($request);
    }


    public function show($id)
    {
        
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }


    public function data_cart()
    {
        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);
        return view('frontend.layouts.shopping.co')
            ->with('cart_data',$cart_data)
        ;
    }
}
