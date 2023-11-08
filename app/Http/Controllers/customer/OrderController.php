<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Order_detail;
use App\Http\Requests\order\orderRequest;
use Auth;
class OrderController extends Controller
{
    public function checkout(Cart $cart) {
        
        if($cart->items==[]){
            return redirect()->back()->with('error','Đơn hàng trống vui lòng thêm sản phẩm vào giỏ hàng ');
        }
        return view('customer.checkout',compact('cart'));   
    }
    public function success() {
        return view('customer.checkout-success');
    }
    public function postcheckout(orderRequest $request,Cart $cart)  {
        
       if(Auth::check() && Auth::user()->role == 0){
        $cus_id= Auth::user()->id;
        $user=User::find($cus_id)->update($request->all());
       }else{
        $cus=User::create($request->all());
        $cus_id=$cus->id;
       }
       
       try {
       if( 
        $order=Order::create([
        'user_id'=>$cus_id,
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
