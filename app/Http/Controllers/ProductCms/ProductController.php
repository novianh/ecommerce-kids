<?php

namespace App\Http\Controllers\ProductCms;

use App\Http\Controllers\Controller;
use App\Models\GalleryProduct;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return \view('cms.products.index', [
            'product' => Product::all(),
            'image' => GalleryProduct::all(),
            'category' => ProductCategory::all() 
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // \dd($request->all());
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'desc' => 'required',
            'sku' => 'required',
            'id_category' => 'required|exists:product_categories,id',

        ]);

        $product = $request->all();

        Product::create($product);

        return redirect()->route('product.index')
            ->with('success_message', 'Berhasil menambah product baru');
    }

    public function show($id)
    {
        $product = Product::find($id);
        $image = $product->gallery;
        $category = $product->category;

        if (!$product) {
            return redirect()->route('product.index')
                ->with('error_message', 'Data dengan id ' . $id . ' tidak ditemukan');
        }
        return \view('cms.products.show', [
            'product' => $product,
            'image' => $image,
            'category' =>$category,
        ]);
    }

    public function edit($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('product.index')
                ->with('error_message', 'Data dengan id ' . $id . ' tidak ditemukan');
        }
        return \view('cms.products.edit', [
            'product' => $product,
            'category' => ProductCategory::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'desc' => 'required',
            'sku' => 'required',
            'id_category' => 'required',
        ]);
        $product = Product::find($id);
        $input = $request->all();
        $product->update($input);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->desc = $request->desc;
        $product->sku = $request->sku;
        $product->status = $request->status;
        $product->id_category = $request->id_category;
        $product->save();
        return redirect()->route('product.index')
            ->with('success_message', 'Berhasil mengubah product');
    }

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
