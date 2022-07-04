<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Entity;
use App\Models\GalleryProduct;
use App\Models\Product;
use App\Models\ProductCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $product = Product::all()->where('status', '=', 'active');
        // \dd($product);
        $categoryLast = ProductCategory::latest()->first();
        $categoryLastPrd = $categoryLast->product;
        // $g=Product::latest()->take(4)->where('status', 'active')->get();
        // \dd($g);


        return \view('frontend.layouts.home.index', [
            'product' => $product,
            'newPrd' => Product::latest()->take(4)->where([['status','active'],['quantity','>', 0]])->get(),
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
        return \view('frontend.layouts.shopping.prdDetails', [
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
        return view('frontend.layouts.shopping.categories', [
            'categories' => ProductCategory::all()
        ]);
    }
    public function about()
    {
        return view('frontend.layouts.shopping.aboutus');
    }
    public function collection()
    {
        $product=Product::where('quantity', 0)->get();
        // \dd($product);

        return view('frontend.layouts.shopping.collection',[
            'product' => $product ,
        ]);
    }
    public function products()
    {
        return view('frontend.layouts.shopping.products', [
            'products' => Product::simplePaginate(12),
            'categoryAll' => ProductCategory::all()
        ]);
    }
    public function productByCategory($id)
    {
        $category = ProductCategory::find($id);
        $product = $category->product()->simplePaginate(12);
        return view('frontend.layouts.shopping.products', [
            'category' => $category,
            'categoryAll' => ProductCategory::all(),
            'product' => $product
        ]);
    }
    public function filterStore(Request $request)
    {
        if($request->search){
            $products = Product::where('name', 'LIKE', "%{$request->search}%") 
            ->simplePaginate(12);
        }
        if ($request->new == 'new' && $request->price_from && $request->price_to) {
            $filter_min_price = $request->price_from;
            $filter_max_price = $request->price_to;
            if ($filter_min_price && $filter_max_price) {
                $products = Product::whereBetween('price', [$filter_min_price, $filter_max_price])->latest()->simplePaginate(12);
            }
        }
        if (!$request->new == 'new' && $request->price_from && $request->price_to) {

            // This will only execute if you received any price
            // Make you you validated the min and max price properly
            $min_price = Product::min('price');
            $max_price = Product::max('price');
            $filter_min_price = $request->price_from;
            $filter_max_price = $request->price_to;
            if ($filter_min_price && $filter_max_price) {
                $products = Product::whereBetween('price', [$filter_min_price, $filter_max_price])->simplePaginate(12);
            }
        }
        return \view('frontend.layouts.shopping.products', [
            'productFilter' => $products,
            'categoryAll' => ProductCategory::all(),
        ]);
    }
}
