<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Order_detail;
use Hash;
use Auth;
use App\Http\Requests\customer\SignUp;

class UserController extends Controller
{

    public function login() {
        return view('customer.signIn');   
    }
    public function register() {
        return view('customer.signUp');   
    }

    public function create(SignUp $req) {
        
        $req->merge(['password'=>Hash::make($req->password)]);
       
        try {
            User::create($req->all());
            return redirect()->route('login')->with('success','Đăng ký thành công');
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
        
    }
    public function postlogin(Request $req) {
        
    //    dd($req->all());
        if(Auth::attempt(['email' => $req->email, 'password' => $req->password])){
            return redirect()->route('index');
        }else{
            return redirect()->back()->with('error','Sai thông tin đăng nhập');
        }       
    }
    public function logout() {
        Auth::logout();
        return redirect()->route('index');
    }
    public function userProfile($id) {
        $user=User::find($id);
        $order=Order::where('user_id',$id)->get();
        return view('customer.userProfile',compact('user','order'));   
    }
    public function changePasswordIndex($id) {
        $user=User::find($id);
        return view('customer.changepassword',compact('user'));   
    }
    public function changePassword(Request $req,$id)  {
        $user=User::find($id);
        $validate=$req->validate([
            'passwordOld'=>'required',
            'password'=>'required|min:6|different:passwordOld',
            'repassword'=>'min:6|same:password|required' 
        ],[
            'passwordOld.required'=>'Vui lòng nhập mật khẩu cũ',
            'password.different'=>'Mật khẩu mới không được trùng mật khẩu cũ',
            'password.required'=>'Vui lòng nhập mật khẩu mới',
            'password.min'=>'Mật khẩu mới tối thiểu 6 ký tự',
            'repassword.required'=>'Vui lòng nhập lại mật khẩu',
            'repassword.same'=>'Nhập lại mật khẩu chưa chính xác',
            'repassword.min'=>'Nhập lại mật khẩu  tối thiểu 6 ký tự',
        ]);
        if(Hash::check($req->passwordOld, $user->password)){
            $user=User::find($id)->update(['password'=>$req->password]);
            if($user){
                Auth::logout();
                return redirect()->route('login')->with('warning','Bạn vừa đổi mật khẩu vui lòng đăng nhập lại');
            }
        }{
            return redirect()->back()->with('error','Sai mật khẩu cũ');
        }
 
    }

    public function editprofile($id) {
        $user=User::find($id);
        return view('customer.edit-userProfile',compact('user'));
    }
    
    public function updateprofile($id,Request $request) {
        if($request->photo!=''){
            $file_name=$request->photo->getClientOriginalName();
            $request->merge(['image'=>$file_name]);
            $request->photo->storeAs('public/images',$file_name);
        }  
        $user=User::find($id)->update($request->all());
        if($user){
            
            return redirect()->route('userProfile',['id'=>$id])->with('success','Cập nhật thành công');
        }
        return redirect()->back()->with('error','Cập nhật thất bại');
        
    }

    public function orderDetail($id){
        $order=Order::find($id);
        $customer=User::find($order->user_id);
        $detail=Order_detail::where('order_id',$id)->get();
        $total_price=Order_detail::where('order_id',$id)->sum('total_price');
        return view('customer.Order_detail-customer',compact('customer','detail','total_price','order'));
    }
}
