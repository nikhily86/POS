<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SalesController extends Controller
{

  // ROUTING FUNCTION FOR ADD SALES PERSON PAGE

    public function addsales(){
        return view('addsales');
    }

    // FUNCTION FOR CREATING A NEW SALES PERSON

    public function createSalesPerson(Request $request){

    // VALIDATION OF SALES PERSON DETAILS 

        $request->validate([
            "name" => "required|regex:/^[a-zA-Z]+$/u|max:255",
            "phone" => "required|min:11|numeric",
            "password" => "min:6 | max:18",
            "email" => 'required|email|unique:users,email|regex:/^.+@.+$/i',
            'gender'=> 'required|in:Male,Female',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048' 
        ]);

    // SAVING SALES PERSON DETAILS TO DATABASE

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make( $request->password);
        $user->gender = $request->gender;
        $user->image = $request->file('file')->store('public/files');
        $user->phone = $request->phone;
        $user->save();
        return view('adminHome');
    }
}
