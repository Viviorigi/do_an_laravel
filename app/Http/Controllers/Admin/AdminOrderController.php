<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
class AdminOrderController extends Controller
{
    public function index() {
        $order=Order::orderBy('updated_at', 'DESC')->paginate(5);
        return view('admin.order.order-index',compact('order'));
    }
    public function edit($id)  {
        $order=Order::find($id)->first();
       
        return view('admin.order.edit-order',compact('order'));
    }
    public function update(Request $request,$id){
        try {
            $order=Order::find($id)->update($request->all());
            alert()->success('Cập nhật','thành công');
            return redirect()->route('order.index')->with('success','Cập nhật thành công');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->with('error','Cập nhật thất bại');
        }
    }
}
