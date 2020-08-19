<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
class ProductController extends Controller
{
    function product(){
        $products = Product::all();
        foreach($products as $product){
            $product->category;
        }
        return $products;
    }
    function category(){
        $category = Category::all();
        foreach($category as $item){
            $item->products;
        }
        return $category;
    }
    function detail($id){
        $products = Product::find($id);
        return $products;
    }
    function search(Request $request){
        $search = $request->txtsearch;
        $products = Product::where('name', 'LIKE', '%' . $search. '%')->get();
        return $products;
    }
    function softDesc(Request $request){
        $search = $request->txtsearch;
        $products = Product::orderBy('price','DESC')->where('name', 'LIKE', '%' . $search. '%')->get();
        return $products;
    }
    function softAsc(Request $request){
        $search = $request->txtsearch;
        $products = Product::orderBy('price','ASC')->where('name', 'LIKE', '%' . $search. '%')->get();
        return $products;

    }
}
