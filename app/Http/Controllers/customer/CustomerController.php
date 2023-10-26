<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use  App\Models\ImgProducts;
use  App\Models\Category;
    
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
    public function products() {
        $product = Product::orderBy('created_at','DESC')->get();        
        $latestProduct =  Product::orderBy('created_at','DESC')->take(2)->get();
        return view('customer.products',compact('product','latestProduct'));   
    }
    public function productDetail() {
        return view('customer.product-detail');   
    }
    public function login() {
        return view('customer.signIn');   
    }
    public function register() {
        return view('customer.signUp');   
    }
    
}
