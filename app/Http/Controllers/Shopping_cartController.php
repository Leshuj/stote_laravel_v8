<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Shopping_cart;

class Shopping_cartController extends Controller
{
    //
    public function Add_product_to_cart($id,Request $request){
        if (Auth::user()){
            // echo "1";
        }else {
            // echo "2";
        }
        $product = Product::where('id', $id)->first();
        
        $order = new Shopping_cart;
        $order->user_id = $request->cookie('laravel_session');
        $order->product_id = $id;
        $order->price = $product->price;
        $order->total = $product->price;
        $order->save();
       return redirect ('/shop');
    }

    static public function getTotalPrice(Request $request){
        $total = Shopping_cart::where('user_id', $request->cookie('laravel_session'))->get();
        $sum = 0;
        foreach ($total as $t) {
            $sum += $t->total;
        }
        return $sum;
    }
}
