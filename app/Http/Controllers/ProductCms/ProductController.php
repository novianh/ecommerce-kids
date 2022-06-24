<?php

namespace App\Http\Controllers\ProductCms;

use App\Http\Controllers\Controller;
use App\Models\GalleryProduct;
use App\Models\Product;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File as FacadesFile;

use function GuzzleHttp\Promise\all;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \view('cms.products.index', [
            'product' => Product::all(),
            'image' => GalleryProduct::all(),

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
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'desc' => 'required',
            'sku' => 'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,svg,gif',
        ]);

        $product = $request->all();
        // $imageInput= $request->only([
        //     'image'
        // ]);
        // $image = $request->file('image');
        // $nama_image = uniqid() . "_" . $image->getClientOriginalName();
        // $tujuan_upload = 'image_product';
        // $image->storeAs($tujuan_upload, $nama_image);
        // $imageInput['image'] = "$nama_image";

        Product::create($product);
        //     GalleryProduct::create([
        //         $imageInput,
        //         'product_id' => $request->id,

        // ]);

        return redirect()->route('product.index')
            ->with('success_message', 'Berhasil menambah product baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $product = Product::with(['gallery'])->orderBy('created_at', 'DESC')->paginate(10);
        // $image = GalleryProduct::find($id);
        $product = Product::find($id);
        $image = $product->gallery;
        // \dd($image);
        if (!$product) {
            return redirect()->route('product.index')
                ->with('error_message', 'Data dengan id ' . $id . ' tidak ditemukan');
        }
        return \view('cms.products.show', [
            'product' => $product,
            'image' => $image
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
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('product.index')
                ->with('error_message', 'Data dengan id ' . $id . ' tidak ditemukan');
        }
        return \view('cms.products.edit', [
            'product' => $product
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
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'desc' => 'required',
            'sku' => 'required',
        ]);
        $product = Product::find($id);
        $input = $request->all();
        $product->update($input);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->desc = $request->desc;
        $product->sku = $request->sku;
        $product->save();
        return redirect()->route('product.index')
            ->with('success_message', 'Berhasil mengubah product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::find($id);
        $image = $products->gallery;
        foreach ($image as $projectImage) {
            $image_path = public_path() . '/storage/products/' . $projectImage->image;
            unlink($image_path);
        }
        $products->delete();

        return redirect()->route('product.index')
            ->with('success_message', 'Berhasil menghapus user');
    }
}
