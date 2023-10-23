<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;
class UserController extends Controller
{

    public function login() {
        return view('customer.signIn');   
    }
    public function register() {
        return view('customer.signUp');   
    }
    public function create(Request $req) {
        
        $req->merge(['password'=>Hash::make($req->password)]);
       
        try {
            User::create($req->all());
            return redirect()->route('login');
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
