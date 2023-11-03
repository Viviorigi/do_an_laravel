<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

class Dashboard extends Controller
{   
    public function index(){
        $product_count=Product::count();
        $order_count=1;
        $cus_count=User::where('role',0)->count();
        return view('admin.index',compact('product_count','order_count','cus_count'));
    }
}
    
