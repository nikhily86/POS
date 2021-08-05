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
        // CHECKING LOGIN USER IS ADMIN OR SALESPERSON

            if (auth()->user()->is_admin == 1) {
                return redirect()->route('admin.home');
            }
            else if (auth()->user()->is_admin == NULL) {

        // CLEARING TEMP TABLE ON EVERY REFRESH 

            Temp::truncate();
          
        // GET PRODUCT VALUES TO USE ON HOME PAGE OF SALES PERSON

            $products = Product::all();
            $customers = Customer::latest()->first(['id']);
            return view ('home', compact('products'),['customers'=>$customers]);

        }
       
    }

    // FUNCTION TO VISIT ADMIN HOME 

    public function adminHome()
    {
        return view('adminHome');
    }
}
