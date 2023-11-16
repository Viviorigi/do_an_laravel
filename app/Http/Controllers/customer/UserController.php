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
            return redirect()->route('index')->with('success','Đăng nhập thành công');
        }else{
            return redirect()->back()->with('error','Sai thông tin đăng nhập');
        }       
    }
    public function logout() {
        Auth::logout();
        return redirect()->route('index')->with('success','Đăng xuất thành công');
    }
    public function userProfile($id) {
        $user=User::find($id);
        $order=Order::where('user_id',$id)->orderBy('updated_at', 'DESC')->paginate(10);
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
        $validate= $validate=$request->validate([
            'name'=>'required|min:2',
            'phone'=>['required','regex: /(84|0[3|5|7|8|9])+([0-9]{8})/'],
            'email'=>'required',
            'address'=>'required' 
        ],[
            'name.required'=>'Vui lòng nhập Tên',
            'name.min'=>'Tên tối thiểu 2 ký tự',
            'phone.required'=>'Vui lòng nhập Số điện thoại',
            'phone.regex'=>'Nhập đúng dạng số điện thoại Việt Nam',
            'address.required'=>'Vui lòng nhập Địa chỉ',
            'email.required'=>'Vui lòng nhập email',
        ]);
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
    public function cancelorder($id) {
        $cancelorder=Order::find($id)->update(['Status'=>5]);
        return redirect()->back()->with('success','Hủy thành công');
    }
}
