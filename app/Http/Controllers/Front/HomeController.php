<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\AboutHome;
use App\Models\Contact;
use App\Models\DiscHome;
use App\Models\Entity;
use App\Models\Footer;
use App\Models\GalleryProduct;
use App\Models\Hero;
use App\Models\NewHome;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Story;
use App\Models\WwdHome;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{

    public function index()
    {
        $product = Product::where([['status', '=', 'active'], ['quantity', '>', 0]])->get();
        // \dd($product);
        $categoryLast = ProductCategory::latest()->first();
        if ($categoryLast) {
            $categoryLastPrd = $categoryLast->product()->where([['status', '=', 'active'], ['quantity', '>', 0]])->get();
        }

        // \dd($categoryLastPrd);

        return \view('frontend.layouts.home.index', [
            'product' => $product,
            'newPrd' => Product::latest()->take(4)->where([['status', '=', 'active'], ['quantity', '>', 0]])->get(),
            'category' => ProductCategory::all()->skip(1)->take(3),
            'categoryLast' => ProductCategory::first(),
            'entity' => Entity::all(),
            'image' => GalleryProduct::all(),
            'categories' => ProductCategory::all()->sortByDesc("created_at"),
            'productCtgLast' => $categoryLastPrd,
            'slider' => Hero::latest()->first(),
            'newArrival' => NewHome::latest()->first(),
            'wwd' => WwdHome::latest()->first(),
            'promo' => DiscHome::latest()->first(),
            'icon' => About::all(),
            'about' => AboutHome::latest()->first(),
            'social' => Contact::all(),
            'footer' => Footer::latest()->first()

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
        // \dd($id);
        $image = $detail->gallery;
        $category = $detail->category;
        // \dd($category->id);
        $entity = $detail->entity;
        $productsLike = Product::with('category')
            ->where([['id_category', $category->id],['status', '=', 'active'], ['quantity', '>', 0]])
            ->inRandomOrder()->take(6)->get();
        return \view('frontend.layouts.shopping.prdDetails', [
            'product' => $detail,
            'image' => $image,
            'category' => $category,
            'entity' => $entity,
            'productLike' => $productsLike,
            'social' => Contact::all(),
            'footer' => Footer::latest()->first()
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
            'categories' => ProductCategory::all(),
            'social' => Contact::all(),
            'footer' => Footer::latest()->first()
        ]);
    }
    public function about()
    {
        return view('frontend.layouts.shopping.aboutus',[
            'social' => Contact::all(),
            'footer' => Footer::latest()->first(),
            'icon' => About::all(),
            'icon2' => About::latest()->take(2)->get(),
            'story' => Story::all(),
        ]);
    }
    public function collection()
    {
        $product = Product::where('quantity', 0)->get();
        // \dd($product);

        return view('frontend.layouts.shopping.collection', [
            'product' => $product,
            'social' => Contact::all(),
            'footer' => Footer::latest()->first()
        ]);
    }
    public function products()
    {
        return view('frontend.layouts.shopping.products', [
            'products' => Product::where([['status', '=', 'active'], ['quantity', '>', 0]])->simplePaginate(12),
            'categoryAll' => ProductCategory::all(),
            'social' => Contact::all(),
            'footer' => Footer::latest()->first()
        ]);
    }


    public function productByCategory($id)
    {
        $category = ProductCategory::find($id);
        $product = $category->product()->where([['status', '=', 'active'], ['quantity', '>', 0]])->simplePaginate(12);
        return view('frontend.layouts.shopping.products', [
            'category' => $category,
            'categoryAll' => ProductCategory::all(),
            'product' => $product,
            'social' => Contact::all(),
            'footer' => Footer::latest()->first()
        ]);
    }


    public function filterStore(Request $request)
    {
        // \dd($request->category_id);
        $products = Product::where([['status', '=', 'active'], ['quantity', '>', 0]])->simplePaginate(12);
        if ($request->category_id && !$request->new == 'new') {
            $category = ProductCategory::find($request->category_id);
            $products = $category->product()->where([['status', '=', 'active'], ['quantity', '>', 0]])->simplePaginate(12);
        }
        if ($request->search) {
            $products = Product::where([['name', 'LIKE', "%{$request->search}%"], ['quantity', '>', 0], ['status', '=', 'active']])
                ->simplePaginate(12);
        }
        if ($request->new == 'new' && $request->price_from && $request->price_to && !$request->category_id) {
            // \dd('no');
            $filter_min_price = $request->price_from;
            $filter_max_price = $request->price_to;
            if ($filter_min_price && $filter_max_price) {
                $products = Product::whereBetween('price', [$filter_min_price, $filter_max_price])->where([['quantity', '>', 0], ['status', '=', 'active']])->latest()->simplePaginate(12);
            }
        }
        if (!$request->new == 'new' && !$request->category_id && $request->price_from && $request->price_to) {

            // This will only execute if you received any price
            // Make you you validated the min and max price properly
            $min_price = Product::min('price');
            $max_price = Product::max('price');
            $filter_min_price = $request->price_from;
            $filter_max_price = $request->price_to;
            if ($filter_min_price && $filter_max_price) {
                $products = Product::whereBetween('price', [$filter_min_price, $filter_max_price])->where([['quantity', '>', 0], ['status', '=', 'active']])->simplePaginate(12);
            }
        }

        return \view('frontend.layouts.shopping.products', [
            'productFilter' => $products,
            'categoryAll' => ProductCategory::all(),
            'social' => Contact::all(),
            'footer' => Footer::latest()->first()
        ]);
    }







    public function addtocart(Request $request)
    {
        // \dd($request);
        $prod_id = $request->input('product_id');
        $quantity = $request->input('quantity');

        if (Cookie::get('shopping_cart')) {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);
        } else {
            $cart_data = array();
        }

        $item_id_list = array_column($cart_data, 'item_id');
        $prod_id_is_there = $prod_id;

        if (in_array($prod_id_is_there, $item_id_list)) {
            foreach ($cart_data as $keys => $values) {
                if ($cart_data[$keys]["item_id"] == $prod_id) {
                    $cart_data[$keys]["item_quantity"] = $request->input('quantity');
                    $item_data = json_encode($cart_data);
                    $minutes = 60;
                    Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                    return response()->json(['status' => '"' . $cart_data[$keys]["item_name"] . '" Already Added to Cart', 'status2' => '2']);
                }
            }
        } else {
            $products = Product::find($prod_id);
            $prod_name = $products->name;
            $prod_image = $products->img_thumbnail;
            $priceval = $products->price;

            if ($products) {
                $item_array = array(
                    'item_id' => $prod_id,
                    'item_name' => $prod_name,
                    'item_quantity' => $quantity,
                    'item_price' => $priceval,
                    'item_image' => $prod_image
                );
                $cart_data[] = $item_array;

                $item_data = json_encode($cart_data);
                $minutes = 60;
                Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                return response()->json(['status' => '"' . $prod_name . '" Added to Cart']);
            }
        }
    }

    public function cartloadbyajax()
    {

        if (Cookie::get('shopping_cart')) {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);
            $totalcart = count($cart_data);

            echo json_encode(array('totalcart' => $totalcart));
            die;
            return;
        } else {
            $totalcart = "0";
            echo json_encode(array('totalcart' => $totalcart));
            die;
            return;
        }
    }

    public function cart()
    {
        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);
        return view('frontend.layouts.shopping.cart')
            ->with('cart_data', $cart_data);
    }
    public function updatetocart(Request $request)
    {
        $prod_id = $request->input('product_id');
        $quantity = $request->input('quantity');

        if (Cookie::get('shopping_cart')) {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);

            $item_id_list = array_column($cart_data, 'item_id');
            $prod_id_is_there = $prod_id;

            if (in_array($prod_id_is_there, $item_id_list)) {
                foreach ($cart_data as $keys => $values) {
                    if ($cart_data[$keys]["item_id"] == $prod_id) {
                        $cart_data[$keys]["item_quantity"] =  $quantity;
                        $item_data = json_encode($cart_data);
                        $minutes = 60;
                        Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                        return response()->json(['status' => '"' . $cart_data[$keys]["item_name"] . '" Quantity Updated']);
                    }
                }
            }
        }
    }

    public function deletefromcart(Request $request)
    {
        $prod_id = $request->input('product_id');

        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);

        $item_id_list = array_column($cart_data, 'item_id');
        $prod_id_is_there = $prod_id;

        if (in_array($prod_id_is_there, $item_id_list)) {
            foreach ($cart_data as $keys => $values) {
                if ($cart_data[$keys]["item_id"] == $prod_id) {
                    unset($cart_data[$keys]);
                    $item_data = json_encode($cart_data);
                    $minutes = 60;
                    Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                    return response()->json(['status' => 'Item Removed from Cart']);
                }
            }
        }
    }

    public function clearcart()
    {
        Cookie::queue(Cookie::forget('shopping_cart'));
        return response()->json(['status' => 'Your Cart is Cleared']);
    }

    public function try()
    {
        $product = Product::where([['status', '=', 'active'], ['quantity', '>', 0]])->get();
        // \dd($product);
        $categoryLast = ProductCategory::latest()->first();
        $categoryLastPrd = $categoryLast->product;


        return \view('frontend.layouts.home.index', [
            'product' => $product,
            'newPrd' => Product::latest()->take(4)->where([['status', 'active'], ['quantity', '>', 0]])->get(),
            'category' => ProductCategory::all()->skip(1)->take(3),
            'categoryLast' => ProductCategory::latest()->first(),
            'entity' => Entity::all(),
            'image' => GalleryProduct::all(),
            'categories' => ProductCategory::all()->sortByDesc("created_at"),
            'productCtgLast' => $categoryLastPrd,
            'social' => Contact::all(),
            'footer' => Footer::latest()->first()

        ]);
    }
}
