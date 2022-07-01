<?php

namespace App\Http\Controllers\ProductCms;

use App\Http\Controllers\Controller;
use App\Models\GalleryProduct;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\Datatables;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $product = Product::all();
        if ($request->ajax()) {
            return Datatables::of($product)
                ->addColumn('action', function ($row) {
                    $html = '<div class="dropdown">
                    <a class="btn text-secondary " href="#" role="button"
                        id="dropdownMenuLink{{ $prd->id }}" data-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <div class="dropdown-menu"
                        aria-labelledby="dropdownMenuLink{{ $prd->id }}">
                        <a href="product/' . $row->id . '"
                            class="dropdown-item text-dark btn-show" >
                            <i class="fa fa-search"></i> See More</a>
                        <a href="#"
                            class="dropdown-item text-success btn-edit"><i class="fa fa-edit"
                                data-toggle="modal" data-target="#edit"></i> Edit</a>
                        <button data-rowid="' . $row->id . '" class="text-danger btn-delete dropdown-item"><i class="fa fa-trash"></i> Delete</button>

                        <a href="gallery/' . $row->id . '/index"
                            class="dropdown-item text-primary"><i class="fa fa-plus"></i> Add
                            image</a>
                    </div>
                </div>';
                    // $html = '<a href="#" class="btn btn-xs btn-secondary btn-edit">Edit</a> ';
                    // $html .= '<button data-rowid="' . $row->id . '" class="btn btn-xs btn-danger btn-delete">Del</button>';
                    return $html;
                })
                ->toJson();
        }
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
            'status' => 'required',
            'id_category' => 'required|exists:product_categories,id',
        ]);

        $product = $request->all();

        Product::create($product);


        return ['success' => true, 'message' => 'Delete successfully',];
    }

    public function show($id)
    {
        $product = Product::find($id);
        $image = $product->gallery;
        $category = $product->category;
        // $categories = $category->product;
        $entity = $product->entity;

        if (!$product) {
            return redirect()->route('product.index')
                ->with('error_message', 'Data dengan id ' . $id . ' tidak ditemukan');
        }
        return \view('cms.products.show', [
            'product' => $product,
            'image' => $image,
            'category' => $category,
            'entity' => $entity
        ]);
        // return response()->json($categories);
    }

    public function edit($id)
    {
        $product = Product::find($id);
        if ($product == \null) {
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
        if ($image = $request->file('img_thumbnail')) {
            unlink("storage/category/" . $product->img_thumbnail);

            $image = $request->file('img_thumbnail');
            $nama_image = date('Y-m-d His') . "_" . $image->getClientOriginalName();
            $tujuan_upload = 'public/category';
            $image->storeAs($tujuan_upload, $nama_image);
            $product->update([
                'img_thumbnail' => $nama_image,
                'name' => $request->name,
                'price' =>  $request->price,
                'quantity' =>  $request->quantity,
                'desc' =>  $request->desc,
                'sku' => $request->sku,
                'status' => $request->status,
                'id_category' => $request->id_category,
            ]);
            $product->save();
        } else {
            $product->update([
                'name' => $request->name,
                'price' =>  $request->price,
                'quantity' =>  $request->quantity,
                'desc' =>  $request->desc,
                'sku' => $request->sku,
                'status' => $request->status,
                'id_category' => $request->id_category,
            ]);
            $product->save();
        }
        // $input = $request->all();
        // $product->update($input);

        return ['success' => true, 'message' => 'Update entity successfully',];
    }

    public function destroy($id)
    {
        $products = Product::find($id);
        $image = $products->gallery;
        unlink("storage/products/thumbnail/" . $products->img_thumbnail);
        if ($image == !null) {
            foreach ($image as $projectImage) {
                $image_path = public_path() . '/storage/products/' . $projectImage->image;
                unlink($image_path);
            }
        }
        $products->delete();


        return ['success' => true, 'message' => 'Delete successfully',];
    }
}
