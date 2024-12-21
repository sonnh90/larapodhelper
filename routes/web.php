<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FakeStoreProductController as FakeStoreProductController;

Route::get('/', function () {
    return view('welcome');
});

// Define route to get dedicated view to all fake store products
// 1. Define route to get to the page displaying all fake store products:
/* 
Route::get('/all-fake-store-products', function () {
    return view('FakeStoreProducts.all-products');
});
 */
// 2. Define route to specific action at controller
Route::get('/all-fake-store-products', [FakeStoreProductController::class,'getAll'] );


