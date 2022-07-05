<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cms\Home\HeroController;
use App\Http\Controllers\Front\AddressController;
use App\Http\Controllers\ProductCms\ProductController;
use App\Http\Controllers\ProductCms\GalleryController;
use App\Http\Controllers\ProductCms\EntityController;
use App\Http\Controllers\ProductCMS\ProductCategoryController;
use App\Http\Controllers\ProductCms\ThumbnailController;
use App\Http\Controllers\ProductCms\CheckoutController;
use App\Http\Controllers\Front\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//    return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\Front\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'user'], function () {
   Route::get('/', [App\Http\Controllers\Front\HomeController::class, 'index'])->name('user.home');
   Route::get('/home/process/{id}', [App\Http\Controllers\Front\HomeController::class, 'process'])->name('home.process');
   Route::get('/detail/{id}', [App\Http\Controllers\Front\HomeController::class, 'detail'])->name('home.detail');
   Route::get('/category', [App\Http\Controllers\Front\HomeController::class, 'category'])->name('home.category');
   Route::get('/collection', [App\Http\Controllers\Front\HomeController::class, 'collection'])->name('collection.index');
   Route::get('/products/all', [App\Http\Controllers\Front\HomeController::class, 'products'])->name('products.index');
   Route::get('/products/{id}/category', [App\Http\Controllers\Front\HomeController::class, 'productByCategory'])->name('products.category');
   Route::post('/products/filter', [HomeController::class, 'filterStore'])->name('products.filter');
   Route::get('/about', [App\Http\Controllers\Front\HomeController::class, 'about'])->name('about.index');

   Route::post('/add-to-cart',[HomeController::class, 'addtocart'])->name('add-to-cart');
   Route::get('/load-cart-data',[HomeController::class, 'cartloadbyajax'])->name('load-cart-data');
   Route::get('/cart',[HomeController::class, 'cart'])->name('cart');
   Route::post('/update-to-cart',[HomeController::class, 'updatetocart'])->name('update-to-cart');
   Route::delete('/delete-from-cart',[HomeController::class, 'deletefromcart'])->name('delete-from-cart');
   Route::get('/clear-cart',[HomeController::class, 'clearcart'])->name('clear-cart');

   // co
   Route::get('/checkout',[CheckoutController::class, 'index'])->name('checkout');
   Route::get('/checkout/store',[CheckoutController::class, 'store'])->name('checkout.store');

   // address
   Route::resource('/address', AddressController::class);


   Route::get('/try', function () {
      return view('frontend.layouts.shopping.prdDetails');
   });
});




Route::group(['middleware' => 'admin_user'], function () {
   Route::group(['prefix' => 'admin'], function () {
      Route::get('/', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home');
      Route::resource('/hero', HeroController::class);
      Route::resource('/product', ProductController::class);

      Route::get('/list/trash', [GalleryController::class, 'trash'])->name('product.trash');
      Route::get('/list/restore/{id}', [GalleryController::class, 'restore'])->name('proproduduct.restore');
      Route::get('/list/restoreAll', [GalleryController::class, 'restoreAll'])->name('product.restoreAll');

      Route::get('/thumbnail/{id}/index', [ThumbnailController::class, 'index'])->name('thumbnail.index');
      Route::put('/thumbnail/store/{id}', [ThumbnailController::class, 'store'])->name('thumbnail.store');
      Route::get('/thumbnail/create', [ThumbnailController::class, 'create'])->name('thumbnail.create');
      Route::delete('/thumbnail/delete/{id}', [ThumbnailController::class, 'destroy'])->name('thumbnail.delete');
      Route::get('/thumbnail/{id}/edit', [ThumbnailController::class, 'edit'])->name('thumbnail.edit');
      Route::put('/thumbnail/update/{id}', [ThumbnailController::class, 'update'])->name('thumbnail.update');

      Route::get('/gallery/{id}/index', [GalleryController::class, 'index'])->name('gallery.index');
      Route::post('/gallery/store', [GalleryController::class, 'store'])->name('gallery.store');
      Route::get('/gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
      Route::delete('/gallery/delete/{id}', [GalleryController::class, 'destroy'])->name('delete');
      Route::get('/gallery/{id}/edit', [GalleryController::class, 'edit'])->name('gallery.edit');
      Route::put('/gallery/update/{id}', [GalleryController::class, 'update'])->name('gallery.update');

      Route::get('/entity/{id}/index', [EntityController::class, 'index'])->name('entity.index');
      Route::post('/entity/store', [EntityController::class, 'store'])->name('entity.store');
      Route::get('/entity/{id}/edit', [EntityController::class, 'edit'])->name('entity.edit');
      Route::put('/entity/update/{id}', [EntityController::class, 'update'])->name('entity.update');
      Route::delete('/entity/delete/{id}', [EntityController::class, 'destroy'])->name('entity.delete');

      Route::resource('category', ProductCategoryController::class)->except(['create', 'show']);
   });
});
