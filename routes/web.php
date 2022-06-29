<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cms\Home\HeroController;
use App\Http\Controllers\ProductCms\ProductController;
use App\Http\Controllers\ProductCms\GalleryController;
use App\Http\Controllers\ProductCms\EntityController;
use App\Http\Controllers\ProductCMS\ProductCategoryController;
use App\Http\Controllers\ProductCms\ThumbnailController;

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

Route::get('/', [App\Http\Controllers\Front\HomeController::class, 'index'])->name('home.index')->middleware('admin_user');

Route::group(['prefix' => 'user'], function () {
   Route::get('/', [App\Http\Controllers\Front\HomeController::class, 'index'])->name('home.index');
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
      Route::get('/list/restore/{id}', [GalleryController::class, 'restore'])->name('product.restore');
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
