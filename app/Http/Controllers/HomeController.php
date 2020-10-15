<?php

namespace App;
namespace App\Http\Controllers;
use App\Http\Controllers\Shopping_cartController;

use Database\Factories\UserFactory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\Product;



class HomeController extends Controller
{
    //
    public function ShowForm(){
        
        
        return view('welcome');
    }

    public function MainPage(Request $request){
        $sum = Shopping_CartController::getTotalPrice($request);
        return view('mainpage',['total' => $sum]);
    }
}
