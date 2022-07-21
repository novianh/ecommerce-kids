<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Contact;
use App\Models\Courier;
use App\Models\CustomerAddress;
use App\Models\Footer;
use App\Models\OrderDetail;
use App\Models\Payment;
use App\Models\Province;
use App\Models\Transfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\Console\Input\Input;

class CheckoutController extends Controller
{
    public function index()
    {
        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);
        $id = Auth::user()->id;
        return \view('frontend.layouts.shopping.co', [
            'address' => CustomerAddress::where('cst_id', $id)->latest()->get(),
            'payment' => Payment::latest()->get(),
            'shipment' => Courier::latest()->get(),
            'province' => Province::all(),
            'social' => Contact::all(),
            'footer' => Footer::latest()->first()
        ])->with('cart_data', $cart_data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);
        $shipment = Courier::find($request->courier);
        $address = CustomerAddress::find($request->address);
        $payment = Payment::find($request->payment);
        $province = Province::find($address->country);
        $city = City::find($address->state);
        // \dd();
        return \view('frontend.layouts.shopping.summary', [
            'request' => $request,
            'shipment' => $shipment,
            'payment' => $payment,
            'address' => $address,
            'province' => $province,
            'city' => $city,
            'social' => Contact::all(),
            'footer' => Footer::latest()->first()
        ])->with('cart_data', $cart_data);
    }


    public function transfer(Request $request)
    {
        // \dd($request);
        // $data = array();
        if ($request->file('file')) {

            $file = $request->file('file');
            $filename = date('d-m-Y His') . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'public/transfer';
            $file->storeAs($tujuan_upload, $filename);
            // dd($filename);

            $data = Transfer::updateOrCreate([
                'order_detail_id' =>  $request->order_detail_id
            ],[
                'transfer' => $filename,
                'order_detail_id' => $request->order_detail_id
            ]);

            $orderDetail = OrderDetail::find($request->order_detail_id);

            $orderDetail->update([
                'status' => $request->status
            ]);
        }
        else{

            $data = ['data not found'];
        }

        // $file = $request->all();
        // if ($request->file) {
        //     unlink("storage/products/thumbnail/" . $data->img_thumbnail);
        // }
        return  response()->json($data);
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
            ->with('cart_data', $cart_data);
    }
}
