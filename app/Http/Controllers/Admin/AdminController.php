<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\admin\logonRequest;
use Auth;

class AdminController extends Controller
{
    public function logon(){
        return view('admin.login-admin');
    }
    public function postlogon(logonRequest $request) {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password,'role'=>1])){
            return redirect()->route('admin.index');
        }
        return redirect()->back()->with('err','Sai thong tin dang nhap ');
    }
    public function adminlogout() {
        Auth::logout();
       return redirect()->route('logon');
         
      }

}
