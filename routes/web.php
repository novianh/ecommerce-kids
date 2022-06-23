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

Route::get('/home/user', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('admin_user');
Route::resource('home', HeroController::class)->middleware('admin_user');
Route::resource('product', ProductController::class)->middleware('admin_user');
Route::get('gallery/{id}/index', [GalleryController::class, 'index'])->name('gallery.index')->middleware('admin_user');
Route::post('gallery/store', [GalleryController::class, 'store'])->name('gallery.store')->middleware('admin_user');

Route::get('/kids_ecommerce', function () {
   return view('cms.products.index');
});

// Route::get('/login/user', [LoginController::class, 'showUserLoginForm']);
// Route::get('/login/customer', [LoginController::class, 'showCustomerLoginForm']);
// Route::get('/register/user', [RegisterController::class, 'showUserRegisterForm']);
// Route::get('/register/customer', [RegisterController::class, 'showCustomerRegisterForm']);

// Route::post('/login/user', [LoginController::class, 'userLogin']);
// Route::post('/login/customer', [LoginController::class, 'customerLogin']);
// Route::post('/register/user', [RegisterController::class, 'createUser']);
// Route::post('/register/customer', [RegisterController::class, 'createCustomer']);

// Route::group(['middleware' => 'auth:customer'], function () {
//    Route::view('/customer', 'home');
// });

// Route::group(['middleware' => 'auth:user'], function () {

//    Route::view('/user', 'adminHome');
// });

// Route::get('logout', [LoginController::class, 'logout']);
