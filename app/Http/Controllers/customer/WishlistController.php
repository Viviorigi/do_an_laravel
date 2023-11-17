<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Category;
use App\Models\Product;
use Auth;
class WishlistController extends Controller
{
    public function addProductToWishList(Request $request)  {
            if(Wishlist::where('product_id',$request->product_id)->exists()){
                return response()->json(['status'=>200,'message'=>'sản phẩm đã có tồn tại danh sách yêu thích']); 
            }else{
                Wishlist::create(['product_id'=>$request->product_id,'user_id'=>Auth::user()->id]);
                return response()->json(['status'=>200,'message'=>'Đã thêm sản phẩm vào danh sách yêu thích']);  
            }
    }
    public function getWishListCount(){
        $wishlistCount=Wishlist::where('user_id',Auth::user()->id)->count();
        return response()->json(['status'=>200,'wishlistCount'=>$wishlistCount]);  
    }
    public function WishList(){
        $cate=Category::all();
        $wishlist=WishList::where('user_id',Auth::user()->id)->get();
        $list_products=[];
        foreach ($wishlist as  $value) {
            $product=Product::where('id',$value->product_id)->get();
            array_push($list_products,$product);
        }
        
        return view('customer.wishlist-product',compact('cate','wishlist','list_products'));
    }
}
