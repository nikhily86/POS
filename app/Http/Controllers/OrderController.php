<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use DB;
use App\Models\Temp;

class OrderController extends Controller
{

    // FUNCTION FOR CREATING ORDERS

    public function createOrder(Request $request)
    {
       // GETTING ALL DATA FROM AJAX REQUEST

        $data = $request->data;

       // LOOPING ON DATA BECAUSE WE GET AN ARRAY 

        for($i=0;$i<count($request->data);$i++){ 
            $orderData = $data[$i];
       
       // CREATING ARRAY OF DATA 

            $data1 =[
                'pname' => $orderData[1],
                'quantity' => $orderData[2],
                'price' => $orderData[3],
                'total' => $_POST['total'],
                'cid' => $_POST['cid'],
            ];
          
        // CONVERTING IT TO JSON 

            $arr = json_encode($data1);

        // SAVING JSON DATA TO ONE COLUMN OF DATABSE

            $create = Order::create(['data'=>$arr]);
        
        // CLEARING ALL ROWS OF TEMP TABLE 
        
            Temp::truncate();

        }
 
    }

    // FUNCTION FOR CHECKING ALL ORDERS

    public function checkOrder(Request $request)
    {
        $orders = Order::paginate(5);
        return view('checkorder', ['order'=>$orders]);
    }
}



