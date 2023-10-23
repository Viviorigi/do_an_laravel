<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Banner;
use App\Http\Requests\banner\StoreBannerRequest;
class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banner = Banner::all();
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
            return redirect()->route('banner.index')->with('success','Thêm mới  thành công');
        } catch (\Throwable $th) { 
            return redirect()->back()->with('error','Thêm mới thất bại');
        }     
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
