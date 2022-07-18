<?php

use App\Http\Controllers\Cms\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cms\Home\HeroController;
use App\Http\Controllers\Cms\Home\PageController;
use App\Http\Controllers\Cms\OrderController;
use App\Http\Controllers\Front\AddressController;
use App\Http\Controllers\ProductCms\ProductController;
use App\Http\Controllers\ProductCms\GalleryController;
use App\Http\Controllers\ProductCms\EntityController;
use App\Http\Controllers\ProductCMS\ProductCategoryController;
use App\Http\Controllers\ProductCms\ThumbnailController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\ProductCms\CheckoutController as CO;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\SummaryController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Front\MenuController;

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

   Route::post('/add-to-cart', [HomeController::class, 'addtocart'])->name('add-to-cart');
   Route::get('/load-cart-data', [HomeController::class, 'cartloadbyajax'])->name('load-cart-data');
   Route::get('/cart', [HomeController::class, 'cart'])->name('cart');
   Route::post('/update-to-cart', [HomeController::class, 'updatetocart'])->name('update-to-cart');
   Route::delete('/delete-from-cart', [HomeController::class, 'deletefromcart'])->name('delete-from-cart');
   Route::get('/clear-cart', [HomeController::class, 'clearcart'])->name('clear-cart');

   // co
   Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
   Route::get('/checkout/store', [CheckoutController::class, 'store'])->name('checkout.store');

   // address
   // Route::resource('/address', AddressController::class);
   Route::get('/address', [AddressController::class, 'index'])->name('address.index');
   Route::post('/address/store', [AddressController::class, 'store'])->name('address.store');
   Route::post('/address/storeDropdown', [AddressController::class, 'storeDropdown'])->name('address.storeDropdown');


   // summary
   Route::get('/gallery/{id}/index', [GalleryController::class, 'index'])->name('gallery.index');

   // profile
   Route::get('/profile/{id}/index', [MenuController::class, 'profile'])->name('profile');
   Route::get('/profile/{id}/list', [MenuController::class, 'profileAjax'])->name('profile.ajax');
   Route::get('/profile/{id}/edit', [MenuController::class, 'profileEdit'])->name('profile.edit');
   Route::get('/profile/address/{id}/edit', [MenuController::class, 'profileAddressEdit'])->name('profile.address.edit');
   Route::put('/profile/address/update/{id}', [AddressController::class, 'update'])->name('address.update');
   Route::delete('/profile/address/delete/{id}', [AddressController::class, 'destroy'])->name('profile.address.delete');
   // tansaksi
   Route::get('/transaction/index', [MenuController::class, 'transaction'])->name('transaction');
   Route::post('/transfer/store', [CheckoutController::class, 'transfer'])->name('transfer.store');
   
   // menu order
   Route::get('/order/summary/{id}/edit', [MenuController::class, 'edit'])->name('order.summary.edit');
   Route::post('/order/summary/update', [MenuController::class, 'update'])->name('order.summary.update');

   // summary
   Route::get('/summary', [SummaryController::class, 'index'])->name('summary.index');
   Route::post('/summary/store', [SummaryController::class, 'store'])->name('summary.store');


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


      Route::get('/checkout/shipment', [CO::class, 'shipment'])->name('co.shipment');
      Route::get('/checkout/payment', [CO::class, 'payment'])->name('co.payment');
      Route::post('/checkout/payment/store', [CO::class, 'paymentStore'])->name('co.payment.store');
      Route::post('/checkout/shipment/store', [CO::class, 'shipmentStore'])->name('co.shipment.store');
      Route::put('/checkout/payment/update/{id}', [CO::class, 'paymentUpdate'])->name('co.payment.update');
      Route::put('/checkout/shipment/update/{id}', [CO::class, 'shipmentUpdate'])->name('co.shipment.update');
      Route::get('/checkout/payment/{id}/edit', [CO::class, 'paymentEdit'])->name('co.payment.edit');
      Route::delete('/checkout/payment/delete/{id}', [CO::class, 'destroyPayment'])->name('co.payment.delete');
      Route::delete('/checkout/shipment/delete/{id}', [CO::class, 'destroyShipment'])->name('co.shipment.delete');

      // address mng
      Route::get('/address', [AddressController::class, 'index'])->name('address.index');
      Route::put('/checkout/address/update/{id}', [CO::class, 'addressUpdate'])->name('admin.address.update');
      Route::get('/checkout/address/{id}/edit', [CO::class, 'addressEdit'])->name('admin.address.edit');
      Route::delete('/checkout/address/delete/{id}', [CO::class, 'destroyAddress'])->name('admin.address.delete');

      // dashboard
      Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

      // order
      Route::get('/order', [OrderController::class, 'index'])->name('Morder.index');
      Route::get('/order/{id}/edit', [OrderController::class, 'edit'])->name('Morder.edit');
      Route::put('/order/update/{id}', [OrderController::class, 'update'])->name('Morder.update');
      Route::get('/order/{id}/show', [OrderController::class, 'show'])->name('Morder.show');


      // filter date order
      Route::post('/order/filter', [OrderController::class, 'filter'])->name('date.filter.order');

      Route::post('/mark-as-read', [DashboardController::class, 'markNotification'])->name('markNotification');
      
      // page management
      Route::get('/management/page/slider', [PageController::class, 'slider'])->name('slider.index');
      Route::post('/management/page/slider/store', [PageController::class, 'sliderStore'])->name('slider.store');
      Route::get('/management/page/wwd', [PageController::class, 'wwd'])->name('wwd.index');
      Route::post('/management/page/wwd/store', [PageController::class, 'wwdStore'])->name('wwd.store');
      Route::get('/management/page/promo', [PageController::class, 'promo'])->name('promo.index');
      Route::post('/management/page/promo/store', [PageController::class, 'promoStore'])->name('promo.store');
      Route::get('/management/page/about', [PageController::class, 'about'])->name('about.index');
      Route::post('/management/page/about/store', [PageController::class, 'aboutStore'])->name('about.store');
      Route::put('/management/page/about/update/{id}', [PageController::class, 'aboutUpdate'])->name('about.update');
      Route::get('/management/page/about/{id}/edit', [PageController::class, 'aboutEdit'])->name('about.edit');
      Route::delete('/management/page/about/delete/{id}', [PageController::class, 'aboutDestroy'])->name('about.front.destroy');
      Route::post('/management/page/about/subtitle/store', [PageController::class, 'subtitleStore'])->name('about.subtitle.store');
      Route::post('/management/page/about/story/store', [PageController::class, 'storyStore'])->name('about.story.store');
      Route::get('/management/page/about/story/{id}/edit', [PageController::class, 'storyEdit'])->name('about.story.edit');
      Route::put('/management/page/about/story/update/{id}', [PageController::class, 'storyUpdate'])->name('about.story.update');
      Route::delete('/management/page/about/story/delete/{id}', [PageController::class, 'storyDestroy'])->name('about.story.destroy');
   });
});
