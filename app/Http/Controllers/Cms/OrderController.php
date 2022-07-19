<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \view('cms.order.index', [
            'order' => OrderDetail::all()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        //filter date
        $orders = OrderDetail::whereDate('created_at', '=', $request->time_start)->get();
        return \view('cms.order.index', [
            'order' => $orders
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = OrderDetail::find($id);
        // dd($order->item[0]->product_id);
        // $product = Product::where('id' , $order->item->product_id)->get();
        return \view('cms.order.show', [
            'order' => $order
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = OrderDetail::find($id);

        return \view('cms.order.edit', [
            'order' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = array(
            'status' => $request->post('status')
        );
        $status = OrderDetail::find($id);
        $input = $request->all();
        $status->update($input);

        // return redirect()->route('product.show', $entity->product_id)
        //     ->with('success_message', 'Update entity successfully');
        // $save = OrderDetail::where('id', '=', $request->post('id'))->update($data);
        return \redirect()->route('Morder.index')->with('success_message', 'Update Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
