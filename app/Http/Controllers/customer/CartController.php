<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\Cart;
use App\Models\Product;
class CartController extends Controller
{
    public function index(Cart $cart){
        
        return view("customer.cart",compact('cart'));
    }
    public function add(Request $request,Cart $cart) {
        $product=Product::find($request->id);
        $quantity=$request->quantity;
        $cart->add($product,$quantity);
        return redirect()->route('cart.index')->with('success','Đã thêm sản phẩm vào giỏ hàng');
    }
    public function remove(Cart $cart,$id)  {
        $cart->remove($id);
        return redirect()->back()->with('success','Đã xóa sản phẩm khỏi giỏ hàng');
    }
    public function update(Cart $cart,Request $request)  {
      
        $cart->update($request->id,$request->quantity);
        return redirect()->back()->with('success','Cập nhật giỏ hàng thành công');
    }
    public function clear(Cart $cart){
        $cart->clear();
        return redirect()->back()->with('success','Đã xóa hết sản phẩm khỏi giỏ hàng');
    }
}
