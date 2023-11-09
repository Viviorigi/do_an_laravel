<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class ManageCustomerController extends Controller
{
    public function index() {
        $customer=User::where('role',0)->paginate(5);
        return view('admin.customer.customer-index',compact('customer'));
    }
    public function find(Request $request){  
            $customer= User::where('name','LIKE',"%$request->keyword%")
            ->where('role','=',0 ,'AND','email','LIKE',"%$request->keyword%")
            ->orwhere('address','LIKE',"%$request->keyword%")        
            ->paginate(5);
            $customer->appends(['keyword' => $request->keyword]);
            return view('admin.customer.customer-index',compact('customer'));   
    }
}
