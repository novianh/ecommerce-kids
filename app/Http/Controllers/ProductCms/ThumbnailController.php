<?php

namespace App\Http\Controllers\ProductCms;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ThumbnailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return \view('cms.products.thumbnail', [
            'product' => Product::find($id)
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'img_thumbnail' => 'required|image|mimes:jpeg,png,jpg,svg,gif',
        ]);

        $data = Product::find($id);
        $thumbnail = $request->all();
        // \dd($thumbnail);
        if ($data->img_thumbnail) {
            unlink("storage/products/thumbnail/" . $data->img_thumbnail);
        }
        $image = $request->file('img_thumbnail');
        $nama_image = date('d-m-Y His') . "_" . $image->getClientOriginalName();
        $tujuan_upload = 'public/products/thumbnail';
        $image->storeAs($tujuan_upload, $nama_image);
        $thumbnail['img_thumbnail'] = "$nama_image";


        $data->update([
            'img_thumbnail' => $nama_image,
            'name' => $request->name,
            'price' =>  $request->price,
            'quantity' =>  $request->quantity,
            'desc' =>  $request->desc,
            'sku' => $request->sku,
            'status' => $request->status,
            'id_category' => $request->id_category,
        ]);
        $data->save;

        return \redirect()->route('product.show', $request->id)->with('success_message', 'Add thumbnail image successfully');
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
        //
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
