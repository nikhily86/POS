<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SalesController extends Controller
{

    public function addsales(){
        return view('addsales');
    }

    

    public function createSalesPerson(Request $request){
        // $sale = new Sale();

        $request->validate([
            "name" => "required|regex:/^[a-zA-Z]+$/u|max:255",
            "phone" => "required | numeric",
            "password" => "min:6 | max:18",
            "email" => 'required|email|unique:users,email|regex:/^.+@.+$/i',
            'gender'=> 'required|in:Male,Female',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048' 
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make( $request->password);
       // $user->password = $request->password;
        $user->gender = $request->gender;
        $user->image = $request->file('file')->store('public/files');
        $user->phone = $request->phone;
        $user->save();
        $users = User::all();
        return view('adminHome',['users'=>$users]);
    }

}
