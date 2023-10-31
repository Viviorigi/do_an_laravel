<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Banner;
use App\Http\Requests\banner\StoreBannerRequest;
use App\Http\Requests\banner\UpdateBannerRequest;
class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banner = Banner::orderBy('updated_at', 'DESC')->paginate(5);
        return view('admin.banner.banner-index',compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banner.add-banner');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBannerRequest $request)
    {  

        $file_name=$request->photo->getClientOriginalName();
        $request->photo->storeAs('public/images',$file_name);
        $request->merge(['image'=>$file_name]);  
        try {        
            Banner::create($request->all());
            alert()->success('Thêm mới','thành công');
            return redirect()->route('banner.index')->with('success','Thêm mới  thành công');
        } catch (\Throwable $th) { 
            alert()->error('Thêm mới','Thất bại');
            return redirect()->back()->with('error','Thêm mới thất bại');
        }     
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        
        return view('admin.banner.edit-banner',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBannerRequest $request,Banner $banner)
    {   
        if(!$request->photo ==''){
            $file_name=$request->photo->getClientOriginalName();
            $request->photo->storeAs('public/images',$file_name);
            $request->merge(['image'=>$file_name]);  
        }
        
        try {        
            $banner->update($request->all());
            alert()->success('Cập nhật','thành công');
            return redirect()->route('banner.index')->with('success','Cập nhật  thành công');
        } catch (\Throwable $th) { 
            alert()->error('Cập nhật','Thất bại');
            return redirect()->back()->with('error','Cập nhật thất bại');
        }     
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        try {
            $banner->delete();
            alert()->success('Xóa','thành công');
            return redirect()->route('banner.index')->with('success','xóa thành công ');
        } catch (\Throwable $th) {
            alert()->error('Xóa','thất bại');
            return redirect()->back()->with('error','xóa không thành công');
        }   
    }

    public function trash(){
       
        $cate=Banner::onlyTrashed()->get();
        
        return view('admin.banner.trash-banner',compact('cate'));
    }

    public function restore($id){
        Banner::where('id',$id)->restore();
        alert()->success('Khôi phục','thành công');
        return redirect()->route('banner.index')->with('success','khôi phục thành công ');
    }
    public function forcedelete($id){
        Banner::where('id',$id)->forceDelete();
        alert()->success('Xóa vĩnh viễn','thành công');
        return redirect()->route('banner.trash')->with('success','xóa thành công ');
    }
    public function find(Request $request) {
        
        $banner= Banner::where('name','LIKE',"%$request->keyword%")->orwhere('id','LIKE',"%$request->keyword%")->paginate(5);
        $banner->appends(['keyword' => $request->keyword]);
        return view('admin.banner.banner-index',compact('banner'));
        
    }

}
