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
        return redirect()->route('cart.index');
    }
    public function remove(Cart $cart,$id)  {
        $cart->remove($id);
        return redirect()->back();
    }
    public function update(Cart $cart,$id,$quantity)  {
        $cart->update($id,$quantity);
        return redirect()->back();
    }
    public function clear(Cart $cart){
        $cart->clear();
        return redirect()->back();
    }
}
