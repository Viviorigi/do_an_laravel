<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use Auth;
class WishlistController extends Controller
{
    public function addProductToWishList(Request $request)  {
            if(Wishlist::where('product_id',$request->product_id)){
                return response()->json(['status'=>200,'message'=>'sản phẩm đã có tồn tại danh sách yêu thích']); 
            }
                Wishlist::create(['product_id'=>$request->product_id,'user_id'=>Auth::user()->id]);
                return response()->json(['status'=>200,'message'=>'Đã thêm sản phẩm vào danh sách yêu thích']);  

    }
}
