<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class CustomerController extends Controller
{
    public function home() {
        $cate = Category::all();
        $latestProduct =  Product::orderBy('created_at','DESC')->take(8)->get();
        return view('customer.index',compact('cate','latestProduct'));   
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
    public function shoppingCart() {
        return view('customer.cart');   
    }
    public function about() {
        return view('customer.aboutUs');   
    }
    public function products() {
        $cate = Category::all();
        $product = Product::orderBy('created_at','DESC')->paginate(9);        
        $latestProduct =  Product::orderBy('created_at','DESC')->take(4)->get();
        return view('customer.products',compact('product','latestProduct','cate'));   
    }
    public function productDetail($slug) {
        $detail = Product::where('slug',$slug)->first();
        $related = Product::where('category_id',$detail->category_id)->where('id','!=',$detail->id)->get();

        return view('customer.product-detail',compact('detail','related'));   
    }
}
