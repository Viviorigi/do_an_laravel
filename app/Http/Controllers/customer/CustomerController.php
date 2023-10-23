<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        return view('customer.products');   
    }
    public function productDetail() {
        return view('customer.product-detail');   
    }
    public function signIn() {
        return view('customer.signIn');   
    }
    public function signUp() {
        return view('customer.signUp');   
    }
    
}
