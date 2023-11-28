<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\Blog;

class Dashboard extends Controller
{   
    public function index(){
        $product_count=Product::count();
        $order_count=Order::count();
        $cus_count=User::where('role',0)->count();
        $blog_count=Blog::count();
        return view('admin.index',compact('product_count','order_count','cus_count','blog_count'));
    }
}
    
