<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Contact;
use App\Models\CustomerAddress;
use App\Models\Footer;
use App\Models\OrderDetail;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Province;
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
            'social' => Contact::all(),
            'footer' => Footer::latest()->first()

        ]);
    }

    public function profile()
    {
        $user = User::find(Auth::user()->id);
        $order = $user->order;
        $orderData = json_decode($order, true);
        // \dd(OrderDetail::find(69)->item);
        $address = $user->address;
        return \view('frontend.layouts.user.profile', [
            'user' => $user,
            'order' => $order,
            'address' => $address,
            'social' => Contact::all(),
            'footer' => Footer::latest()->first()
        ])->with('ordered', $orderData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function profileAjax(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $order = $user->order;
        // $orderData = json_decode($order, true);

        $address = $user->address;
        return response()->json($order);
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
            'order' => $data,
            'social' => Contact::all(),
            'footer' => Footer::latest()->first()
        ]);
    }
    public function profileEdit($id)
    {
        $data = User::find($id);
        // \dd($request);
        return \view('auth.edit', [
            'user' => $data,
            'social' => Contact::all(),
            'footer' => Footer::latest()->first()
        ]);
    }
    public function profileUpdate(Request $request, $id)
    {
        // \dd($request);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'sometimes|nullable|confirmed'
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) $user->password = bcrypt($request->password);
        $user->save();

        // $user = User::find();
        if (Auth::user()->id == 1) {
            return \redirect()->route('dashboard.index')->with('success_message', 'Update Success');
        } else {
            return \redirect()->route('profile', Auth::user()->id);
        }
    }
    public function profileAddressEdit($id)
    {
        $data = CustomerAddress::find($id);
        $province = Province::find($data->country);
        $city = $province->city;
        // \dd($request);
        return \view('frontend.layouts.user.addressEdit', [
            'address' => $data,
            'province' => Province::all(),
            'city' => $city,
            'social' => Contact::all(),
            'footer' => Footer::latest()->first()
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
    public function profileDestroy(Request $request, $id)
    {
        $user = User::find($id);

        if ($id == $request->user()->id) return redirect()->route('dashboard.index')
            ->with('error_message', 'You can\'t delete yourself');

        if ($user) $user->delete();

        return redirect()->route('dashboard.index')
            ->with('success_message', 'success delete customer');
    }
}
