<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\ProductController;


// ROUTES RELATED TO PRODUCTS
Route::get('/', 'App\Http\Controllers\featuredController@index');

Route::get('/featuredCategories', 'App\Http\Controllers\featuredController@getCategories');

Route::get('/item/{tcin}/{store_id}',[
    'uses' => 'App\Http\Controllers\DetailsController@getInfo',
    'as'   => 'item'
]);

Route::get('/category/{category}',[
    'uses' => 'App\Http\Controllers\CategoryController@index',
    'as'   => 'category'
]);

Route::get('/category/{subCategory}',[
    'uses' => 'App\Http\Controllers\DetailsController@getInfo',
    'as'   => 'subCategory'
]);

// ROUTES RELATED TO STORES

Route::get('/stores', 'App\Http\Controllers\featuredController@getLocation');

Route::get('/store-info/{location_id}',[
    'uses' => 'App\Http\Controllers\featuredController@getStoreInfo',
    'as'   => 'store-info'
]);


Route::get('/about', function () {
    return view('about');
});


// USER AUTHENTICATION ROUTES
Route::get('/login', function () {
    return view('login');
});

Route::post('/login',[UserController::class,'login']);

Route::get('/logout', function () {
    Session::forget('user');
    return redirect('login');
});

Route::view('/register','register');

Route::post('/register',[UserController::class,'register']);



// ROUTES RELATED TO SHOPPING CART
Route::post('/add_to_cart',[ProductController::class, 'addToCart']);

Route::get('/removecart/{id}',[ProductController::class, 'removeCart']);

Route::get('/cart', [ProductController::class, 'cartList']);

Route::get('ordernow',[ProductController::class, 'orderNow']);

Route::post('orderplace',[ProductController::class, 'orderPlace']);

Route::get('myorders',[ProductController::class, 'myOrders']);

Route::get('/success', function () {
    return view('success');
});