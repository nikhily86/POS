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

  // FUNCTION TO GET DATA FOR SHOWING CHART

    public function statics()
    {
      // GET JSON DATA SAVED IN DATABASE IN ONE COLUMN

        $post = DB::table('orders')->get('*')->toArray();
        foreach($post as $row)
        {
            $orderdata = json_decode($row->data); //DECODE JSON DATA 
            $data[] = array
            (
                'label' =>  $orderdata->pname,
                'y' => $orderdata->quantity
            );                                   // CREATE ARRAY OF DATA
        }
       return view('statics',['data' => $data]); 

    }

    // FUNCTION TO EXPORT CSV 

    public function exportToCSV()
    {
        return Excel::download(new OrderExport,'order-csv.csv');
    }
}
