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
    public function userProfile() {
        return view('customer.userProfile');   
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
}
