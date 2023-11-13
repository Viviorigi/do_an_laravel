<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
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
       return redirect()->back();
    }
    public function userProfile($id) {
        $user=User::find($id);
       
        return view('customer.userProfile',compact('user'));   
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
        return view('customer.edit-userProfile');
    }
}
