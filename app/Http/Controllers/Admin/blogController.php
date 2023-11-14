<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\blog;
use App\Http\Requests\blog\StoreBlogRequest;
use App\Http\Requests\blog\UpdateBlogRequest;
use RealRashid\SweetAlert\Facades\Alert;
class blogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blog = blog::orderBy('updated_at', 'DESC')->paginate(5);
        return view('admin.blog.blog-index',compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.add-blog');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {  

        $file_name=$request->photo->getClientOriginalName();
        $request->photo->storeAs('public/images',$file_name);
        $request->merge(['image'=>$file_name]);  
        try {        
            blog::create($request->all());
            alert()->success('Thêm mới','thành công');
            return redirect()->route('blog.index')->with('success','Thêm mới  thành công');
        } catch (\Throwable $th) { 
            alert()->error('Thêm mới','Thất bại');
            return redirect()->back()->with('error','Thêm mới thất bại');
        }     
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(blog $blog)
    {
        
        return view('admin.blog.edit-blog',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request,blog $blog)
    {   
        if(!$request->photo ==''){
            $file_name=$request->photo->getClientOriginalName();
            $request->photo->storeAs('public/images',$file_name);
            $request->merge(['image'=>$file_name]);  
        }
        
        try {        
            $blog->update($request->all());
            alert()->success('Cập nhật','thành công');
            return redirect()->route('blog.index')->with('success','Cập nhật  thành công');
        } catch (\Throwable $th) { 
            alert()->error('Cập nhật','Thất bại');
            return redirect()->back()->with('error','Cập nhật thất bại');
        }     
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(blog $blog)
    {
        try {
            $blog->delete();
            alert()->success('Xóa','thành công');
            return redirect()->route('blog.index')->with('success','xóa thành công ');
        } catch (\Throwable $th) {
            alert()->error('Xóa','thất bại');
            return redirect()->back()->with('error','xóa không thành công');
        }   
    }

    public function trash(){
       
        $blog=blog::onlyTrashed()->get();
        
        return view('admin.blog.trash-blog',compact('blog'));
    }

    public function restore($id){
        blog::where('id',$id)->restore();
        alert()->success('Khôi phục','thành công');
        return redirect()->route('blog.index')->with('success','khôi phục thành công ');
    }
    public function forcedelete($id){
        blog::where('id',$id)->forceDelete();
        alert()->success('Xóa vĩnh viễn','thành công');
        return redirect()->route('blog.trash')->with('success','xóa thành công ');
    }
    public function find(Request $request) {
        
        $blog= blog::where('name','LIKE',"%$request->keyword%")->orwhere('id','LIKE',"%$request->keyword%")->paginate(5);
        $blog->appends(['keyword' => $request->keyword]);
        return view('admin.blog.blog-index',compact('blog'));
        
    }

}
