<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\wishlist;
use Auth;
use App\Models\Blog;
use App\Models\rating;
use Illuminate\Support\Facades\Http;
class CustomerController extends Controller
{
    public function home() {
        $cate = Category::all();
        $latestProduct =  Product::orderBy('created_at','DESC')->take(8)->get();
        $latestBlog =  Blog::orderBy('created_at','DESC')->take(3)->get();
        if(Auth::check() && Auth::user()->role == 0){
            $wishlistcount= wishlist::where('user_id',Auth::user()->id)->count();
        }
        return view('customer.index',compact('cate','latestProduct','latestBlog'));   
    }
    public function contact() {
        return view('customer.contact');   
    }
    public function blog() {
        $blog = Blog::orderBy('created_at','DESC')->paginate(6);
        $latestBlog =  Blog::orderBy('created_at','DESC')->take(6)->get();
        return view('customer.blog',compact('blog','latestBlog'));   
    }
    public function blogDetails($slug) {
        $blogdetail = Blog::where('slug',$slug)->first();
        $latestBlog =  Blog::orderBy('created_at','DESC')->take(6)->get();
        return view('customer.blog-details',compact('blogdetail','latestBlog'));   
    }
    public function shoppingCart() {
        return view('customer.cart');   
    }
    public function about() {
        return view('customer.aboutUs');   
    }
    public function products(Request $request) {
        $cate = Category::all();
        
        $product = Product::orderBy('created_at','DESC')->paginate(9);        
        if($request->sort=="name_asc"){
            $product = Product::orderBy('name','ASC')->paginate(9);  
        }elseif($request->sort=="name_desc"){
            $product = Product::orderBy('name','DESC')->paginate(9);  
        }elseif($request->sort=="price_asc"){
            $product = Product::orderBy('sale_price','ASC')->paginate(9);  
        }elseif($request->sort=="price_desc"){
            $product = Product::orderBy('sale_price','DESC')->paginate(9);  
        }
        if($request->minprice){
            $product = Product::whereBetween('sale_price', [$request->minprice, $request->maxprice])->paginate(9); 
            if($request->sort=="name_asc"){
                $product = Product::whereBetween('sale_price', [$request->minprice, $request->maxprice])->orderBy('name','ASC')->paginate(9);  
            }elseif($request->sort=="name_desc"){
                $product = Product::whereBetween('sale_price', [$request->minprice, $request->maxprice])->orderBy('name','DESC')->paginate(9);  
            }elseif($request->sort=="price_asc"){
                $product = Product::whereBetween('sale_price', [$request->minprice, $request->maxprice])->orderBy('sale_price','ASC')->paginate(9);  
            }elseif($request->sort=="price_desc"){
                $product = Product::whereBetween('sale_price', [$request->minprice, $request->maxprice])->orderBy('sale_price','DESC')->paginate(9);  
            }
        }     
        $latestProduct =  Product::orderBy('created_at','DESC')->take(4)->get();
        return view('customer.products',compact('product','latestProduct','cate'));   
    }
    public function productDetail($slug) {
        $detail = Product::where('slug',$slug)->first();
        $related = Product::where('category_id',$detail->category_id)->where('id','!=',$detail->id)->get();
        $ratingAvg=rating::where('product_id',$detail->id)->avg('rating_star');
        $ratingcount=rating::where('product_id',$detail->id)->count();
        return view('customer.product-detail',compact('detail','related','ratingAvg','ratingcount'));   
    }
    public function ajaxsearch() {
        $data=Product::search()->get();
        return view('customer.ajaxSearch',compact('data'));
    }
    public function productsearch(Request $request) {
        $cate = Category::all();
        $product=Product::where('name','LIKE',"%$request->keyword%")->paginate(6);
        $product->appends(['keyword' => $request->keyword]);
        $productcount=Product::where('name','LIKE',"%$request->keyword%")->count();
        $latestProduct =  Product::orderBy('created_at','DESC')->take(6)->get();
            if($request->sort=="name_asc"){
                $product = Product::where('name','LIKE',"%$request->keyword%")->orderBy('name','ASC')->paginate(9);  
            }elseif($request->sort=="name_desc"){
                $product = Product::where('name','LIKE',"%$request->keyword%")->orderBy('name','DESC')->paginate(9);  
            }elseif($request->sort=="price_asc"){
                $product = Product::where('name','LIKE',"%$request->keyword%")->orderBy('sale_price','ASC')->paginate(9);  
            }elseif($request->sort=="price_desc"){
                $product = Product::where('name','LIKE',"%$request->keyword%")->orderBy('sale_price','DESC')->paginate(9);  
            }
        
        return view('customer.productsearch',compact('cate','product','productcount','latestProduct'));
    }
    public function rating(Request $request)  {
        $rating=rating::where(['user_id'=>$request->user_id,'product_id'=>$request->product_id])->first();
        if($rating){
            $rating->update($request->all());
        }else{
            rating::create($request->all());
        }
        return redirect()->back()->with('success','Đánh giá thành công');
    }
}
