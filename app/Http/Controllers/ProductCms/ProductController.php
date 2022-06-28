<?php

namespace App\Http\Controllers\ProductCms;

use App\Http\Controllers\Controller;
use App\Models\GalleryProduct;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Validation\Validator as ValidationValidator;
// use Illuminate\Support\Facades\Validator;
use JeroenNoten\LaravelAdminLte\View\Components\Tool\Datatable;
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
                        <a href="gallery/'.$row->id.'/index"
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
        $validator = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'desc' => 'required',
            'sku' => 'required',
            'id_category' => 'required|exists:product_categories,id',
        ]);

        $product = $request->all();

        Product::create($product);

        // return redirect()->route('product.index')
        //     ->with('success_message', 'Berhasil menambah product baru');

        return ['success' => true, 'message' => 'Delete successfully',];

        // return ['success' => true, 'message' => 'Post Created successfully',];
    }

    public function show($id)
    {
        $product = Product::find($id);
        $image = $product->gallery;
        $category = $product->category;
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
        // return response()->json($product);
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
        $input = $request->all();
        $product->update($input);

        return ['success' => true, 'message' => 'Update entity successfully',];
    }

    public function destroy($id)
    {
        $products = Product::find($id);
        $image = $products->gallery;
        if ($image == !\null) {
            foreach ($image as $projectImage) {
                $image_path = public_path() . '/storage/products/' . $projectImage->image;
                unlink($image_path);
            }
        }
        $products->delete();

        // return redirect()->route('product.index')
        //     ->with('success_message', 'Berhasil menghapus data');
        return ['success' => true, 'message' => 'Delete successfully',];
        // return response()->json(['success' => 'Post Deleted successfully']);
    }


}
