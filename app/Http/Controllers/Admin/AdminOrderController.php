<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Order_detail;
use DB;
use Carbon;
class AdminOrderController extends Controller
{
    public function index() {
        $order=Order::orderby('Status','asc')->orderBy('updated_at', 'DESC')->paginate(5);
        return view('admin.order.order-index',compact('order'));
    }
    public function edit($id)  {
        $order=Order::find($id);
       
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
    public function find(Request $request) {
        if($request->date_from==''){
            $request->date_from=Carbon\Carbon::now()->subday(15);
        }
        if($request->date_to==''){
            $request->date_to= Carbon\Carbon::now();
        }
        $order=Order::whereBetween('created_at',[$request->date_from,$request->date_to])->orderBy('updated_at', 'DESC')->paginate(5);
        return view('admin.order.order-index',compact('order'));
    }
    public function detail($id)  {
        $detail=Order_detail::where('order_id',$id)->get();
        return view('admin.order.order-detail',compact('detail'));
    }
}
