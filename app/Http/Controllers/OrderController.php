<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use DB;
use App\Models\Temp;

class OrderController extends Controller
{
    public function createOrder(Request $request)
    {
        // print_r($_POST['cid']); die;
        $data = $request->data;
        // $json = json_encode($request->all());
        // $arr = $request->all();
        // $arr = serialize($arr);
        // $order->cid = $request->cid;
        // $order->total = $request->total;
        //  return $data;
        for($i=0;$i<count($request->data);$i++){ 
            $orderData = $data[$i];
            // DB::table('orders')->insert($orderData);
            $data1 =[
                'pname' => $orderData[1],
                'quantity' => $orderData[2],
                'price' => $orderData[3],
                'total' => $_POST['total'],
                'cid' => $_POST['cid'],
            ];
            // $arr = serialize($data1);
            $arr = json_encode($data1);
            $create = Order::create(['data'=>$arr]);
            Temp::truncate();
          

            //  Order::create(['data' => $json]);

            //   $mydata = JSON.stringify($data1);
            // DB::table('orders')->insert($data1);  MAin
            // $data1->save();
            // var_dump($i);
            //   DB::table('orders')->insert($data[$i]);
        }
             
        // return $data;
        // count($request->data);
        // $order = new Order();
        // $order->data = $request->mainArr;
        // $order->cid = $request->cid;
        
        //  for($i=0;$i<count($request->data);$i++){ 
        //   $order[] = $data[$i];
        //   DB::table('orders')->insert($order);
        //  }
        // return response()->json($order);  
    }

    // public function createOrder(Request $request)
    // {

        // $order->pname = $request->pname;
        // $order->quantity = $request->qty;      
        // $order->price = $request->price;      
        // $order->total = $request->total;
        // $order->cid = $request->cid;

        // $order->save();
    //     $pname = $request->pname;
    //     $quantity = $request->qty;
    //     $price = $request->price; 
    //     $total = $request->total;
    //     $cid = $request->cid;

    //         $order = [
    //             'pname'=>$pname,
    //             'quantity'=>$quantity,
    //             'price'=>$price,
    //             'total'=>$total,
    //             'cid'=>$cid,
    //         ];
    
    //         //  return response()->json($order);
    //         // DB::table('orders')->insert($order);  
    //        $orders = json_encode($order);
    //       print_r($order);
        
    //     return response()->json($order);
    
    // }

    // public function createOrder(array $data)
    // {
    //      return Order::create([
    //     'pname' => $data['pname'],
    //     'quantity' => $data['quantity'],
    //     'price' => $data['price'],
    //     'total' => $data['total'],
    //     'cid' => $data['cid'],
    //     ]);
    // }

    public function checkOrder(Request $request)
    {
        $orders = Order::all();
        
        return view('checkorder', ['order'=>$orders]);

    }


}



