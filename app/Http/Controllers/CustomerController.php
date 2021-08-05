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

        // $data = $request->validate([
        // $validator = Validator::make($request->all(), [
        //     "name" => "required|regex:/^[a-zA-Z]+$/u|max:255",
        //     "cphone" => "min:6 | max:10 | numeric",
        //     "address" => "required|regex:/^[a-zA-Z]+$/u|max:255",
        // ]);
        // if ($validator->fails()) {
        //     //return response()->view('home')->header('error', $validator);
        //     return redirect('home')
        //                 ->withErrors($validator)
        //                 ->withInput();
        // }
        // if($data->fails()){
        //     return redirect()->back()->withErrors($data);
        // // return redirect()->route('home')->with('error','Fill Information Properly');
        // }
        //  $request->session()->flash('error', 'fill Details');
        //  return redirect('home');

        $customer = new Customer();
        $customer->name = $request->cname;
        $customer->phone = $request->cphone;      
        $customer->address = $request->caddress;      
        $customer->save();
        // $customers = Customer::all();
        // $customers =  Customer::all()->first(['id']);
        // $customers = Customer::latest()->first(['id']);
        // return response()->json($customers);

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
