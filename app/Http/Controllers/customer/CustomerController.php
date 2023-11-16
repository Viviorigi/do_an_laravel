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
        $latestProduct =  Product::orderBy('created_at','DESC')->where('status',1)->take(8)->get();
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
    public function products(Request $request) {
        $cate = Category::all();
        
        $product = Product::orderBy('created_at','DESC')->where('status',1)->paginate(9);        
        if($request->sort=="name_asc"){
            $product = Product::orderBy('name','ASC')->where('status',1)->paginate(9);  
        }elseif($request->sort=="name_desc"){
            $product = Product::orderBy('name','DESC')->where('status',1)->paginate(9);  
        }elseif($request->sort=="price_asc"){
            $product = Product::orderBy('sale_price','ASC')->where('status',1)->paginate(9);  
        }elseif($request->sort=="price_desc"){
            $product = Product::orderBy('sale_price','DESC')->where('status',1)->paginate(9);  
        }
        if($request->minprice){
            $product = Product::whereBetween('sale_price', [$request->minprice, $request->maxprice])->where('status',1)->paginate(9); 
        }     
        $latestProduct =  Product::orderBy('created_at','DESC')->take(4)->get();
        return view('customer.products',compact('product','latestProduct','cate'));   
    }
    public function productDetail($slug) {
        $detail = Product::where('slug',$slug)->first();
        $related = Product::where('category_id',$detail->category_id)->where('id','!=',$detail->id)->get();

        return view('customer.product-detail',compact('detail','related'));   
    }
    public function ajaxsearch() {
        $data=Product::search()->get();
        return view('customer.ajaxSearch',compact('data'));
    }
    public function productsearch(Request $request) {
        $cate = Category::all();
        $product=Product::where('name','LIKE',"%$request->keyword%")->where('status',1)->paginate(6);
        $productcount=Product::where('name','LIKE',"%$request->keyword%")->where('status',1)->count();
        $latestProduct =  Product::orderBy('created_at','DESC')->take(4)->get();
        if($request->minprice){
            $product = Product::whereBetween('sale_price', [$request->minprice, $request->maxprice])->where('status',1)->paginate(6); 
            $productcount=Product::whereBetween('sale_price', [$request->minprice, $request->maxprice])->where('status',1)->count();
        } 
        return view('customer.productsearch',compact('cate','product','productcount','latestProduct'));
    }
}
