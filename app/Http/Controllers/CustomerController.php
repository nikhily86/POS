<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;
use Validator;

class CustomerController extends Controller
{
    public function createCustomer(Request $request)
    {

    // CREATING NEW CUSTOMER BY AJAX REQUEST 

        $customer = new Customer();
        $customer->name = $request->cname;
        $customer->phone = $request->cphone;      
        $customer->address = $request->caddress;      
        $customer->save();

        if (auth()->user()->is_admin == NULL) {
            $customers = Customer::latest()->first(['id']);
            return response()->json($customers);
        }
        else{
            $customers = Customer::latest()->first(['id']);
            return response()->json($customers);
        }
      
    }
}
