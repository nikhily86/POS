<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    public function addproduct(){
        return view('addproduct');
    }

    public function createProduct(Request $request){

        $request->validate([
            "name" => "required|unique:products|regex:/^[a-zA-Z]+$/u|max:255",
            "desc" => "required|regex:/^[a-zA-Z]+$/u|max:255",
            "price" => 'required|numeric',
            "quantity" => 'required|numeric',
            "file" => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048' 
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->desc = $request->desc;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->image = $request->file('file')->store('public/Productfiles');
        $product->save();
        $products = Product::all();
        return view('adminHome',['products'=>$products]);
    }

    public function getprice($name){
        // $price =  Product::pluck('price')->where('id',$id)->toSql();
        
        $price =  Product::where('name',$name)->first(['id','name','price']);
        // return $price;
        //  return view ('home', compact('price'));
         return response()->json($price);
    }
}
