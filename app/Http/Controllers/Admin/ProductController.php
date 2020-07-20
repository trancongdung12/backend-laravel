<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
class ProductController extends Controller
{
    function index(){
        $categories = Category::all();
        $products = Product::all();
        foreach($products as $product){
            $product->category;
        }
        //echo "<pre>".json_encode($products,JSON_PRETTY_PRINT)."<\pre>";
        return view("admin.product.index", ["categories" => $categories,"products"=>$products]);
    }
       
        public function store(Request $request){

        $image = $request->file("image")-> store("public");
        $name =$request->name;  
        $category_id=$request->category;
        $price=$request->price;
        $quantity=$request->quantity;
        $description=$request->description;
    
        $product= new Product;
        $product->name= $name;
        $product->category_id= $category_id;
        $product->image= $image;
        $product->price= $price;
        $product->quantity= $quantity;
        $product->description= $description;
        $product->save(); 
        return redirect("admin/product");
    
        }
    
        public function edit($id)
        {
            $categories= Category::all();
            $products= Product::all();
            $productFind= Product::find($id);
          return view("admin.product.edit", ["products"=>$products,"productFind"=> $productFind,"categories" => $categories]);
        }
    
       
        public function update(Request $request)
        {
            $product = Product::find($request->id);
            $name=$request->name;  
            $category_id=$request->category;
            $price=$request->price;
            $quantity=$request->quantity;
            $description=$request->description;
            $image= $request->file("image");
            if($image == null){
                $image = $product->image;
            }else{
                $image-> store("public");
            }
            $product->name= $name;
            $product->category_id= $category_id;
            $product->price= $price;
            $product->quantity= $quantity;
            $product->description= $description;
            $product->save();
        
        
             return redirect("admin/product");
            
        }
    
    
        public function destroy($id)
        {
            Product::find($id)->delete();
             return redirect("admin/product");
        }

}
