<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    // ROUTING FUNCTION FOR ADD PRODUCT PAGE

    public function addproduct(){
        return view('addproduct');
    }

    // FUNCTION FOR CREATING A NEW PRODUCT 

    public function createProduct(Request $request){

    // VALIDATION OF PRODUCT DETAILS 

        $request->validate([
            "name" => "required|unique:products|regex:/^[a-zA-Z]+$/u|max:255",
            "desc" => "required|regex:/^[a-zA-Z]+$/u|max:255",
            "price" => 'required|numeric',
            "quantity" => 'required|numeric',
            "file" => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048' 
        ]);

    // SAVING PRODUCT DETAILS TO DATABASE

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

    // FUNCTION FOR GETTING PRODUCT PRICE ON PRODUCT SELECTION FROM DROPDOWN ON SALES PERSON HOME PAGE

    public function getprice($name){      
        $price =  Product::where('name',$name)->first(['id','name','price']);
         return response()->json($price);
    }
}
