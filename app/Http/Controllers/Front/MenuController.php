<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Models\OrderItem;
use App\Models\Transfer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{

    public function transaction()
    {
        $user = User::find(Auth::user()->id);
        $order = $user->order()->simplePaginate(6);
        return \view('frontend.layouts.user.order', [
            'order' => $order,
        ]);
    }

    public function profile()
    {
        //
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
        //
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
        // \dd($request);
        return \view('frontend.layouts.user.orderEdit', [
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
    public function update(Request $request)
    {
        $data = OrderDetail::find($request->order_detail_id);
        if (isset($data->transfer)) {
            $tf = Transfer::find($data->transfer->id);
            // dd($tf);
            // update
            unlink("storage/transfer/" . $data->transfer->transfer);
            $file = $request->file('file');
            $filename = date('d-m-Y His') . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'public/transfer';
            $file->storeAs($tujuan_upload, $filename);

            $input = $tf->update([
                'transfer' => $filename,
                'order_detail_id' => $request->order_detail_id
            ]);
        } else {
            // create
            $file = $request->file('file');
            // \dd($file);
            $filename = date('d-m-Y His') . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'public/transfer';
            $file->storeAs($tujuan_upload, $filename);

            $input = Transfer::create([
                'transfer' => $filename,
                'order_detail_id' => $request->order_detail_id
            ]);
        }

        $orderDetail = OrderDetail::find($request->order_detail_id);

        $orderDetail->update([
            'status' => $request->status
        ]);

        return \response()->json($input);
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
