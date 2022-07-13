<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\CustomerAddress;
use App\Models\Province;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Redirect,Response;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cms.checkout.address', [
            'address' => CustomerAddress::all(),
            'user' => User::all(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        $request->validate([
            "name" => "required",
            "telephone" => "required",
            "address" => "required",
            "address2" => "required",
            "country" => "required",
            "state" => "required",
            "zip" => "required",
        ]);

        $id = Auth::user()->id;

        $input = $request->all();
        $input['cst_id'] = "$id";

        $create =  CustomerAddress::create($input);
        $inputAll = [
            'id' => $create->id,
            'name' => $create->name
        ];
        // \dd($input);

        return  response()->json($inputAll);
    }

    public function storeDropdown(Request $request)
    {
        $kota = City::where('province_code', $request->code)->get()
        ->pluck('name', 'id');

        return response()->json($kota);
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
        //
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
        $address = CustomerAddress::find($id);
        $result = $address->update($request->all());

        return redirect()->route('profile', Auth::user()->id);
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
