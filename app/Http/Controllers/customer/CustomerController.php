<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class CustomerController extends Controller
{
    public function home() {
        return view('customer.index');   
    }
    public function contact() {
        return view('customer.contact');   
    }
    public function blog() {
        return view('customer.blog');   
    }
    public function blogDetails() {
        return view('customer.blog-details');   
    }
    public function checkout() {
        return view('customer.checkout');   
    }
    public function shoppingCart() {
        return view('customer.cart');   
    }
    public function products() {
        $product = Product::orderBy('created_at','DESC')->get();        
        $latestProduct =  Product::orderBy('created_at','DESC')->take(2)->get();
        return view('customer.products',compact('product','latestProduct'));   
    }
    public function productDetail() {
        return view('customer.product-detail');   
    }
}
