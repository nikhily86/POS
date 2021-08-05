<?php

namespace App\Http\Controllers;
use App\Models\Order;
use DB;
use Illuminate\Http\Request;
use App\Models\Temp;
use Response;


class TaskController extends Controller
{
    public function check(Request $request)
    {

        $temp = new Temp();
        $temp->pid = $request->pid;
        $temp->name = $request->name;
        $temp->price = $request->price;
        $temp->quantity = $request->qty;
        $total = $temp->price *  $temp->quantity;
        $temp->total = $total;
       

        $qty1 =  Temp::where('pid',$temp->pid)->first(['quantity','price']);

        if(!empty($qty1)){
            $updateQty = $qty1['quantity'] + $temp->quantity;
            $updatetotal = $qty1['price'] * $updateQty;
            $val = Temp::where('pid', $temp->pid)->update([
                'quantity'=> $updateQty, 
                'total' => $updatetotal
            ]);
        }
        else{
            $temp->save();
        }
        $temps = Temp::all();
        $subtotals = Temp::get()->sum("total");
        $Tax = ($subtotals * 5) / 100;
        $grosstotal = $subtotals + $Tax;

        return Response::json(['temps' => $temps, 'subtotals' => $subtotals, 'Tax' => $Tax, 'grosstotal' => $grosstotal ]);

    }
}
