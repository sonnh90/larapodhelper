<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FakeStoreProductController as FakeStoreProductController;

Route::get('/', function () {
    return view('welcome');
});

/** 
 * Define route to get dedicated view to all fake store products 
 * - Source Info: https://fakestoreapi.com/docs
 * */ 
// 1. Define route to get to the page displaying all fake store products:
/* 
Route::get('/all-fake-store-products', function () {
    return view('FakeStoreProducts.all-products');
});
 */
// 2. Define route to specific action at controller
// View for Fake Store Products in FaceStoreProducts directory - all-products template.
Route::get('/all-fake-store-products',
    [FakeStoreProductController::class,'getAll'] 
);

// Route for general product display
Route::get('/fake-store-products-display-all', 
    [FakeStoreProductController::class,'showAllProducts'] 
);

Route::get('/fake-store-products-display', 
    [FakeStoreProductController::class,'showProductsWithPagination'] 
);

Route::get('/fake-store-products-display-ajax', 
    [FakeStoreProductController::class,'showAllProductsWithAJAX'] 
);

// Define Route to handle AJAX request
Route::get(
    'fake-store-products-display/fetch',
    [ FakeStoreProductController::class , 'fetchProducts']
)->name('FakeStoreProducts.fetch');
