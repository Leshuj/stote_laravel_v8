<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Shopping_cartController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Product;
use App\Models\Shopping_cart;
use App\Models\Category;
use App\Models\Order;

class ShopController extends Controller
{
    //
    
    public function ShopPage(Request $request){        
        $all[] = Product::paginate(3);
        // var_dump($all);die;
        $sum = Shopping_CartController::getTotalPrice($request);
        $products_in_category = ShopController::getCategories();
        return view('shop', ['total' => $sum, 'products' => $all, 'categories' => $products_in_category]);
    }

    public function Filtered_by_category($category_name,Request $request){      
        $sum = Shopping_CartController::getTotalPrice($request);
        $products_in_category = ShopController::getCategories();
        $cat_id = Category::where('category_name',$category_name)->get();        
        $all[] = Product::where('id_category', $cat_id[0]->id)->paginate(3);
        // var_dump($path);die;
        return view('shop', ['total' => $sum,'products' => $all,'categories' => $products_in_category]);
    }

    public function Filtered_by_price($filter_name,Request $request){      
        $sum = Shopping_CartController::getTotalPrice($request);
        $products_in_category = ShopController::getCategories();
        $filters = explode("-", $filter_name);      
        $all[] = Product::where('price', ">=", $filters[0])->where('price', "<=", $filters[1])->paginate(3);

        return view('shop', ['total' => $sum,'products' => $all,'categories' => $products_in_category]);
    }


    protected function getCategories(){
        $categories = Category::all();
        $all_prod = Product::all()->groupBy('id_category');
        foreach ($all_prod as $a_p){  
            $a_p->count = count($a_p);          
            foreach ($categories as $cat){
                if($a_p[0]->id_category == $cat->id){
                    $a_p->cat_name = $cat->category_name;
                }
            }
        }
        return $all_prod;
    }

    public function Sortered_by($sort_by,Request $request){
        var_dump($sort_by);
        if($sort_by === "low-to-high"){
            $sort = "ASC";
            $all[] = Product::orderBy('price',$sort)->paginate(3);
        }elseif($sort_by === "high-to-low"){
            $sort = "DESC";
            $all[] = Product::orderBy('price',$sort)->paginate(3);
        }else{
            $all[] = Product::paginate(3);
        }
        $sum = Shopping_CartController::getTotalPrice($request);
        $products_in_category = ShopController::getCategories();
        // $all[] = Product::orderBy('price',$sort_by)->get()->paginate(3);
        return view('shop',['total' => $sum, 'products' => $all, 'categories' => $products_in_category]);
    }

    public function ShopDetails(){
        return view('shop-details',['total' => $total]);
    }

    public function ShoppingCart(Request $request){
        $sum = Shopping_CartController::getTotalPrice($request);
        $all_ordered_products = Shopping_Cart::where('user_id', '=' , $request->cookie('laravel_session'))->get()->toArray();
        if (empty($all_ordered_products)){
            $products_in_cart = 'No products in the cart';
            return view('shopping-cart',['total' => $sum, 'no_products' => $products_in_cart]);
        }else{
            
            foreach ($all_ordered_products as $ag){
                $a[] = $ag['product_id'];
            }
            $sum_products_in_order = array_count_values($a);
            $index = array_keys($sum_products_in_order);
            $products_in_cart = [];
            for ($i=0; $i < count($index); $i++){
                $products_in_cart[$i] = Product::where('id', '=' , $index[$i])->get()->toArray();
                $products_in_cart[$i]['total'] =  $sum_products_in_order[$index[$i]] * $products_in_cart[$i][0]['price'];
                $products_in_cart[$i]['quantity'] = $sum_products_in_order[$index[$i]];
            }
            return view('shopping-cart',['total' => $sum, 'products' => $products_in_cart]);
        }         
    }

    public function Checkout(Request $request){
        $sum = Shopping_CartController::getTotalPrice($request);
        $all_ordered_products = Shopping_Cart::where('user_id', '=' , $request->cookie('laravel_session'))->get()->toArray();
        $a = [];
        foreach ($all_ordered_products as $ag){
            $a[] = $ag['product_id'];
        }
        $sum_products_in_order = array_count_values($a);
            $index = array_keys($sum_products_in_order);
            $products_in_cart = [];
            for ($i=0; $i < count($index); $i++){
                $products_in_cart[$i] = Product::where('id', '=' , $index[$i])->get()->toArray();
                $products_in_cart[$i]['total'] =  $sum_products_in_order[$index[$i]] * $products_in_cart[$i][0]['price'];
                $products_in_cart[$i]['quantity'] = $sum_products_in_order[$index[$i]];
            }
        return view('checkout',['total' => $sum, 'products' => $products_in_cart]);
    }

    public function RemoveFormCart($id, Request $request){
        $deletedRows = Shopping_cart::where('user_id',$request->cookie('laravel_session'))->where('product_id',  $id)->delete();
        
        return redirect("/shopping-cart");
    }

    public function CreateOrder(Request $request){
        $all = $request->input();
        $username = $all['first_name'] . ' ' . $all['last_name'];
        $email = $all['email'];
        $phone = $all['phone'];
        $address = $all['address'];
        $user_id = $request->cookie('laravel_session');
        
        foreach ($all['product'] as $product) {
            $order = new Order;
            $order->user_id = $user_id;
            $order->product_id = $product['id'];
            $order->price = $product['price'];
            $order->total = $product['price'] * $product['quantity'];
            $order->username = $username;
            $order->email = $email;
            $order->phone = $phone;
            $order->address = $address;
            $order->save();
            unset($order);

        }
        Shopping_cart::where('user_id', $user_id)->delete();        
        
        return redirect("/");
    }

}

