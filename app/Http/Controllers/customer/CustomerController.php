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
        $product = Product::orderBy('created_at','DESC')->paginate(9);        
        $latestProduct =  Product::orderBy('created_at','DESC')->take(4)->get();
        return view('customer.products',compact('product','latestProduct'));   
    }
    public function productDetail($slug) {
        $detail = Product::where('slug',$slug)->first();
        $related = Product::where('category_id',$detail->category_id)->where('id','!=',$detail->id)->get();

        return view('customer.product-detail',compact('detail','related'));   
    }
}
