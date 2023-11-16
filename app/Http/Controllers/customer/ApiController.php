<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class ApiController extends Controller
{
    public function ajaxSearch() {
        $data=Product::search()->get();
        
        return  $data;
    }
}
