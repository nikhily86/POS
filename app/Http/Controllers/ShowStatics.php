<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customer;
use DB;
use Excel;
use App\Exports\OrderExport;


class ShowStatics extends Controller
{
    public function statics()
    {
        // $order = Order::get(['pname', 'quantity'])->map(function($order) {
        //     return array_values((array)$order);
        // })->toArray();
        // $post = Order::all()->toArray();
        $post = DB::table('orders')->get('*')->toArray();
        //  dd($post);
        foreach($post as $row)
       
         
        {
            $orderdata = json_decode($row->data); 
            $data[] = array
            (
                'label' =>  $orderdata->pname,
                'y' => $orderdata->quantity
            );
        }
       return view('statics',['data' => $data]); 

    }

    public function exportToCSV()
    {
        return Excel::download(new OrderExport,'order-csv.csv');
    }
}
