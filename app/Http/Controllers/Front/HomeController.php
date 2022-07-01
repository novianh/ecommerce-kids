<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Entity;
use App\Models\GalleryProduct;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $product = Product::all()->where('status', '=', 'active');
        // \dd($product);
        $categoryLast = ProductCategory::latest()->first();
        $categoryLastPrd = $categoryLast->product;


        return \view('frontend.layouts.home.index', [
            'product' => $product,
            'newPrd' => Product::all()->take(4)->where('status', '=', 'active'),
            'category' => ProductCategory::all()->skip(1)->take(3),
            'categoryLast' => ProductCategory::latest()->first(),
            'entity' => Entity::all(),
            'image' => GalleryProduct::all(),
            'categories' => ProductCategory::all()->sortByDesc("created_at"),
            'productCtgLast' => $categoryLastPrd,

        ]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function detail($id)
    {
        $detail = Product::find($id);
        $image = $detail->gallery;
        $category = $detail->category;
        $entity = $detail->entity;
        return \view('frontend.layouts.shopping.prdDetails',[
            'product' => $detail,
            'image' => $image,
            'category' => $category,
            'entity' => $entity
        ]);
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
    public function process($id)
    {
        $category = ProductCategory::find($id);

        $product = $category->product->where('quantity', '>', '0');
        // \dd($product);

        // return ['success' => true, 'message' => 'show successfully',];
        return response()->json($product);
    }
    public function category()
    {
        return view('frontend.layouts.shopping.categories',[
            'categories'=>ProductCategory::all()
        ]);
    }
    public function about()
    {
        return view('frontend.layouts.shopping.aboutus');
    }
    public function collection()
    {
        return view('frontend.layouts.shopping.collection');
    }
    public function products()
    {
        return view('frontend.layouts.shopping.products');
    }
}
