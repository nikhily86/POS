<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['data'];
    public $timestamps = false;

    public static function getAllOrders(){
        $result = DB::table('orders')->select('id','data')->get()->toArray();
        return $result;
    }
}
