<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Middleware\isUser;

class SalesLoginController extends Controller
{
    public function check(){
        return view('saleslogin');
    }

    // public function checklogin(Request $request){
    //     $user = new User();
    //     $email = $request->email;
    //     $password = $request->password;
    //     $sql =  User::where('email',$email)->where('password',$password);
    //     if($sql){
    //         $products = Product::all();
    //         return view('home',['products'=>$products]);
    //     }else{
    //         dd('bg');
    //     }
        
    // }
}
