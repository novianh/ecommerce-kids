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
        if (!$image) {
            return redirect()->route('product.index')
                ->with('error_message', 'Data dengan id ' . $id . ' tidak ditemukan');
        }
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
        $nama_image = date('d-m-Y His') . "_" . $image->getClientOriginalName();
        $tujuan_upload = 'public/products';
        $image->storeAs($tujuan_upload, $nama_image);
        $input['image'] = "$nama_image";

        GalleryProduct::create($input);

        return redirect()->route('product.show', $request->product_id)
            ->with('success_message', 'Add new image successfully');
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
        $image = GalleryProduct::find($id);
        if (!$image) {
            return redirect()->route('product.index')
                ->with('error_message', 'Data dengan id ' . $id . ' tidak ditemukan');
        }
        return \view('cms.products.gallery.edit', [
            'image' => $image
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
        $request->validate([
            'product_id' => 'required',
            'id' => 'required',
        ]);
        // \dd($request);

        $data = GalleryProduct::find($id);

        if ($image = $request->file('image')) {
            unlink("storage/products/" . $data->image);

            $image = $request->file('image');
            $nama_image = date('Y-m-d His') . "_" . $image->getClientOriginalName();
            $tujuan_upload = 'public/products';
            $image->storeAs($tujuan_upload, $nama_image);
            $data->update([
                'image' => $nama_image,
            ]);
        } else {
            return redirect()->route('product.show', $request->product_id)
            ->with('success_message', 'Image not updated');
        }

        $data->image = $nama_image;
        $data->save();

        return redirect()->route('product.show', $request->product_id)
            ->with('success_message', 'Image updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = GalleryProduct::find($id);
        unlink("storage/products/" . $image->image);
        $image->delete();
        return redirect()->back()->with('success_message', 'Delete Completed');
    }

    public function trash()
    {
        // mengampil data product yang sudah dihapus
        $product = Product::onlyTrashed()->get();
        // $image = $product->gallery;
        return view('cms.products.trash', ['product' => $product,]);
    }
    public function restore($id)
    {
        $product = Product::onlyTrashed()->find($id);
        $product->restore();
        return redirect()->route('product.index')->with('success_message', 'Restore Completed');
    }
    public function restoreAll()
    {
        $product = Product::onlyTrashed();
    	$product->restore();

        return redirect()->route('product.index')->with('success_message', 'Restore Completed');
    }
}
