<?php

namespace App\Http\Controllers\ProductCms;

use App\Http\Controllers\Controller;
use App\Models\GalleryProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $image = Product::find($id);
        // if (!$image) {
        //     return redirect()->route('product.index')
        //         ->with('error_message', 'Data dengan id ' . $id . ' tidak ditemukan');
        // }
        return \view('cms.products.addImage', [
            'image' => $image
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
        // \dd($request->all());
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg,gif',
        ]);

        $input = $request->all();
        $image = $request->file('image');
        $nama_image = uniqid() . "_" . $image->getClientOriginalName();
        $tujuan_upload = 'public/products';
        $image->storeAs($tujuan_upload, $nama_image);
        $input['image'] = "$nama_image";

        //     GalleryProduct::create([
        //         $imageInput,
        //         'product_id' => $request->id,

        // ]);
        GalleryProduct::create($input);
        return redirect()->route('product.index')
            ->with('success_message', 'Berhasil menambah product baru');;
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
