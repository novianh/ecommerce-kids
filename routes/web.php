<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CmsHomeController;

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
Route::resource('home', CmsHomeController::class)->middleware('admin_user');

Route::get('/kids_ecommerce', function() {
   return view('frontend.layouts.home.index');
});