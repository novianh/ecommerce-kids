<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cms\Home\HeroController;
use App\Http\Controllers\ProductCms\ProductController;
use App\Http\Controllers\ProductCms\GalleryController;

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


Route::get('/', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('home')->middleware('admin_user');

   Route::group(['prefix' => 'user'], function () {
      Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
   });



Route::get('/kids_ecommerce', function () {
   return view('cms.products.index');
});

Route::group(['middleware' => 'admin_user'], function () {
   Route::group(['prefix' => 'admin'], function () {
      Route::get('/', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home');
      Route::resource('/home', HeroController::class);
      Route::resource('/product', ProductController::class);
      // Route::resource('/gallery', ProductController::class);
      Route::get('/gallery/{id}/index', [GalleryController::class, 'index'])->name('gallery.index');
      Route::post('/gallery/store', [GalleryController::class, 'store'])->name('gallery.store');
      Route::get('/gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
      Route::delete('/gallery/delete/{id}', [GalleryController::class, 'destroy'])->name('delete');
      Route::get('/gallery/{id}/edit', [GalleryController::class, 'edit'])->name('gallery.edit');
      Route::put('/gallery/update/{id}', [GalleryController::class, 'update'])->name('gallery.update');
   });
});
