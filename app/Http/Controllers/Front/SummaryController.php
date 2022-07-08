<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Models\OrderItem;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class SummaryController extends Controller
{
    public function index(Request $request)
    {
        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);
        foreach ($cart_data as $item ) {
            // echo $item['item_name']. '</br>';
            $product = OrderItem::create([

                'quantity' => $item['item_quantity'],
                'order_id' =>$request['input'],
                'product_id' => $item['item_id'],
            ]);
        }
        $order = OrderDetail::find($request['input']);
        Cookie::queue(Cookie::forget('shopping_cart'));
        // \dd($order->shipment_id);

        return \view('frontend.layouts.shopping.summaryCo', [
            'order' => $order
        ])->with('cart_data', $cart_data);;
    }

    public function store(Request $request)
    {
        // \dd($request);
        $request->validate([
            'payment_id' => 'required',
            'note' => 'required',
            'address_id' => 'required',
            'courier_id' => 'required',
        ]);

        $cstId = Auth::user()->id;

        $input = $request->all();
        // dd($input);
        $input['cst_id'] = "$cstId";

        $inputAll = OrderDetail::create($input);
        return \redirect()->route('summary.index', [
            'input' => $inputAll
        ]);
    }
}