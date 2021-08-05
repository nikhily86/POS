<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Temp;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->is_admin == 1) {
            return redirect()->route('admin.home');
        }else if (auth()->user()->is_admin == NULL) {

            $products = Product::all();
            Temp::truncate();
            // $customers = Customer::all();,['customers'=>$customers]
            $customers = Customer::latest()->first(['id']);
            return view ('home', compact('products'),['customers'=>$customers]);
            // $customers = Customer::latest()->first(['id']);
            // return response()->json($customers);
            
            // return view ('home',['customers'=>$customers]);
        }
        
        // $products = Product::all();
        // return view('home',['products'=>$products]);
       
    }
    

    public function adminHome()
    {
        return view('adminHome');
    }
}
