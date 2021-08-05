<?php

namespace App\Http\Controllers;
use App\Models\Order;
use DB;
use Illuminate\Http\Request;
use App\Models\Temp;
use Response;


class TaskController extends Controller
{
    // FUNCTION TO CREATE BILLING TABLE ROWS

    public function check(Request $request)
    {

        $temp = new Temp();
        $temp->pid = $request->pid;
        $temp->name = $request->name;
        $temp->price = $request->price;
        $temp->quantity = $request->qty;
        $total = $temp->price *  $temp->quantity;
        $temp->total = $total;
       
    // GETTING QUANTITY FOR ALREADY EXISTING PRODUCT IN TABLE 

        $qty1 =  Temp::where('pid',$temp->pid)->first(['quantity','price']);

    // CHECKING IF PRODUCT IS PRESENT THEN UPDATE ITS QUANTITY ELSE CREATE NEW ROW    

        if(!empty($qty1)){
            $updateQty = $qty1['quantity'] + $temp->quantity; // UPDATE QUANTITY
            $updatetotal = $qty1['price'] * $updateQty;       // UPDATE TOTAL
            $val = Temp::where('pid', $temp->pid)->update([   
                'quantity'=> $updateQty, 
                'total' => $updatetotal
            ]);
        }
        else{
            $temp->save();
        }
        $temps = Temp::all();

    // CALCULATE SUBTOTAL

        $subtotals = Temp::get()->sum("total");

    // CALCULATE TAX

        $Tax = ($subtotals * 5) / 100;

    // CALCULATE FINAL TOTAL

        $grosstotal = $subtotals + $Tax;

    // SEND JSON ARRAY
        
        return Response::json(['temps' => $temps, 'subtotals' => $subtotals, 'Tax' => $Tax, 'grosstotal' => $grosstotal ]);

    }
}
