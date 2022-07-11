<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class SummaryController extends Controller
{
    public function index(Request $request)
    {
        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);

        $order = OrderDetail::find($request['input']);
        Cookie::queue(Cookie::forget('shopping_cart'));
        return \view('frontend.layouts.shopping.summaryCo', [
            'order' => $order,
        ])->with('cart_data', $cart_data);
    }

    public function store(Request $request)
    {
        // \dd($request);
        $request->validate([
            'payment_id' => 'required',
            'note' => 'required',
            'address_id' => 'required',
            'courier_id' => 'required',
            'status' => 'required'
        ]);
        
        $cstId = Auth::user()->id;
        $input = $request->all();
        $input['cst_id'] = "$cstId";
        $input['transaction_number'] = Str::random(3).date('dmYHis');
        $total = floatval( $input['total'] );
        $input['total'] = "$total";
        // \dd($input['total']);
        
        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);
        
        $inputAll = OrderDetail::create($input);
        // \dd($total);

        // saving order_items
        foreach ($cart_data as $item ) {
            OrderItem::create([

                'quantity' => $item['item_quantity'],
                'order_id' =>$inputAll->id,
                'product_id' => $item['item_id'],
                'price' => $item['item_price'],
            ]);
        }
        return \redirect()->route('summary.index', [
            'input' => $inputAll
        ]);
    }
}
