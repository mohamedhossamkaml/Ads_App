<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('ads', App\Http\Controllers\AdsController::class);
Route::resource('category', App\Http\Controllers\CategoryController::class);
Route::resource('products', App\Http\Controllers\ProductController::class);
Route::resource('tags', App\Http\Controllers\tagsController::class);
Route::resource('advertiser', App\Http\Controllers\AdvertiserController::class);



Route::get('/edit_ads/{id}' , [App\Http\Controllers\AdsController::class, 'edit']);
Route::get('/categorys/{id}' , [App\Http\Controllers\AdsController::class, 'getproducts']);
Route::get('/adstags/{id}' , [App\Http\Controllers\AdsController::class, 'getAdsTags'])->name('ads.tags');
Route::get('/getads' , [App\Http\Controllers\AdsController::class, 'getads'])->name('get.ads');
Route::post('addadstags' , [App\Http\Controllers\AdsController::class, 'adsTags'])->name('add/adstags');


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/{page}', [App\Http\Controllers\AdminController::class, 'index']);
