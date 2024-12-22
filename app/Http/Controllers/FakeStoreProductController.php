<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as Request;
use Illuminate\Support\Facades\Http as Http;
use Illuminate\Pagination\LengthAwarePaginator as LengthAwarePaginator;

class FakeStoreProductController extends Controller
{
    const GET_ALL_API_URL = 'https://fakestoreapi.com/products';

    /** 1. Read all data */
    public function index(){
        $response = Http::get( self::GET_ALL_API_URL );

        $products = $response->successful() ? $response->json() : [] ;

        if( $response->successful() ){
            $products = $response->json();
        } else {
            $products = [];
        }

        return view( 'FakeStoreProducts.all-products', compact('products') );
    }//index
    
    // 1.2. Display all data without pagination
    public function getAll(){
        $response = Http::get( self::GET_ALL_API_URL );

        $products = $response->successful() ? $response->json() : [] ;

        return view( 'FakeStoreProducts.all-products', compact('products') );
    }//getAll

    public function showAllProducts(){
        $response = Http::get( self::GET_ALL_API_URL );

        $products = $response->successful() ? $response->json() : [] ;

        return view( 'FakeStoreProducts.product-display-all', compact('products') );
    }//showAllProducts

    // 1.3. Display data with pagination at Laravel
    public function showProductsWithPagination(Request $request){
        // 1. Obtain data from remote API
        $response = Http::get( self::GET_ALL_API_URL );

        $products = $response->successful() ? $response->json() : [] ;

        // 2. Create a paginator object
        $currentPage = $request->get('page',1);
        $perPageAmount = 6;
        $totalAmount = count( $products );
        $currentPageItems = array_slice( 
            $products, 
            ($currentPage - 1) * $perPageAmount,
            $perPageAmount
        );

        $paginator = new LengthAwarePaginator(
            $currentPageItems,
            $totalAmount,
            $perPageAmount,
            $currentPage,
            ['path' => url('fake-store-products-display')]
        );

        // 2. Return a view & parse data to the view
        return view( 
            'FakeStoreProducts.product-display-pagination', 
            ['products' => $currentPageItems, 'paginator' => $paginator ] 
        );
    }//showProductsWithPagination

    // 1.4. 
    public function showAllProductsWithAJAX(Request $request){
        // 1. Obtain data from remote API
        $response = Http::get( self::GET_ALL_API_URL );

        $products = $response->successful() ? $response->json() : [] ;

        // 2. Create a paginator object
        $currentPage = $request->get('page',1);
        $perPageAmount = 6;
        $totalAmount = count( $products );
        $currentPageItems = array_slice( 
            $products, 
            ($currentPage - 1) * $perPageAmount,
            $perPageAmount
        );

        $paginator = new LengthAwarePaginator(
            $currentPageItems,
            $totalAmount,
            $perPageAmount,
            $currentPage,
            ['path' => url('fake-store-products-display')]
        );


        // 2. Return a view & parse data to the view

        if( $request->ajax() ){
            return view(
                'FakeStoreProducts.partials.product-list',
                ['products' => $currentPageItems, 'paginator' => $paginator ] 
            )->render();
        }

        return view( 
            'FakeStoreProducts.product-display-all-ajax', 
            ['products' => $currentPageItems, 'paginator' => $paginator ] 
        );
    }//showAllProductsWithAJAX

    public function fetchProducts( Request $request ){
        // 1. Obtain data from remote API
        $response = Http::get( self::GET_ALL_API_URL );

        $products = $response->successful() ? $response->json() : [] ;  

        // 2. Create a paginator object
        $currentPage = $request->get('page',1);
        $perPageAmount = 6;
        $offsetPage = ($currentPage - 1) * $perPageAmount;
        $currentPageItems = array_slice( 
            $products, 
            $offsetPage,
            $perPageAmount
        );

        // 3. Return JSON response to AJAX
        return response()->json( $currentPageItems );        
    }//fetchProducts

}//FakeStoreProductController
