<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Order_detail;
use Auth;
class OrderController extends Controller
{
    public function checkout(Cart $cart) {
        return view('customer.checkout',compact('cart'));   
    }
    public function success() {
        return view('customer.checkout-success');
    }
    public function postcheckout(Request $request,Cart $cart)  {
        
       
       $cus=User::create($request->all());
       
       try {
       if( 
        $order=Order::create([
        'user_id'=>$cus->id,
        'methodPayment'=>$request->methodPayment,
        'order_note'=>$request->order_note,
        ])){
            $order_id=$order->id;
            foreach($cart->items as $product_id => $item){
                $quantity=$item['quantity'];
                $price=$item['price'];
                $total_price=$quantity*$price;
                Order_detail::create([
                    'order_id'=>$order_id,
                    'product_id'=>$product_id,
                    'total_price'=>$total_price,
                    'quantity'=>$quantity
                ]);
            }
         };
        session(['cart'=>'']);
        return redirect()->route('checkout.success')->with('success','Đặt hàng thành công');
       } catch (\Throwable $th) {
        dd($th);
       }
    
    }
}
