<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FakeStoreProductController extends Controller
{
    const GET_ALL_API_URL = 'https://fakestoreapi.com/products';

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

    public function getAll(){
        $response = Http::get( self::GET_ALL_API_URL );

        $products = $response->successful() ? $response->json() : [] ;

        return view( 'FakeStoreProducts.all-products', compact('products') );
    }//index


}//FakeStoreProductController
