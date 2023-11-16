<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use RealRashid\SweetAlert\Facades\Alert;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $blog =Blog::orderBy('updated_at', 'DESC')->paginate(5);
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
    public function store(Request $request)
    {   
        $validate=$request->validate([
            'name'=>'required|unique:blogs',
            'slug'=>'required',
            'photo'=>'required|image',
            'content'=>'required'
        ],
        [
            'name.required'=>'Tên không để trống',
            'name.unique'=>"Tên $request->name đã tồn tại ",
            'slug.required'=>'slug không để trống',
            'photo.required'=>'ảnh không để trống',
            'photo.image'=>'yêu cầu đúng định dạng ảnh',
            'content.required'=>'vui lòng nhập nội dung'
        ]
    );
      
        if(!$request->photo==''){
            $file_name=$request->photo->getClientOriginalName();
            $request->photo->storeAs('public/images',$file_name);
            $request->merge(['image'=>$file_name]);  
        }
        try {
            Blog::create($request->all());
            alert()->success('Thêm mới','thành công');
            return redirect()->route('blog.index')->with('success','Thêm mới Thành công');
        } catch (\Throwable $th) {
            dd($th);
            alert()->error('Thêm mới','thêm mới thất bại');
            return redirect()->back()->with('error','Thêm mới không thành công');
        }     
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {   
        return view('admin.blog.edit-blog',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $validate=$request->validate([
            'name'=>'required|unique:blogs,name,'.$blog->id,
            'slug'=>'required',
            'photo'=>'image',
            'content'=>'required'
        ],
        [
            'name.required'=>'Tên không để trống',
            'name.unique'=>"Tên $request->name đã tồn tại ",
            'slug.required'=>'slug không để trống',
            'photo.image'=>'yêu cầu đúng định dạng ảnh',
            'content.required'=>'vui lòng nhập nội dung'
        ]
    );
        if(!$request->photo==''){
            $file_name=$request->photo->getClientOriginalName();
            $request->photo->storeAs('public/images',$file_name);
            $request->merge(['image'=>$file_name]);  
        }
        try {
            $blog->update($request->all());
            alert()->success('Cập nhật','thành công');
            return redirect()->route('blog.index')->with('success','Sửa thành công ');
        } catch (\Throwable $th) {
            alert()->error('Thêm mới','Cập nhật thất bại');
            return redirect()->back()->with('error','Sửa không thành công');
        }   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
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
       
        $blog=Blog::onlyTrashed()->get();
        return view('admin.blog.trash-blog',compact('blog'));
    }

    public function restore($id){
        Blog::where('id',$id)->restore();
        alert()->success('Khôi phục','thành công');
        return redirect()->route('blog.index')->with('success','khôi phục thành công ');
    }
    public function forcedelete($id){
        Blog::where('id',$id)->forceDelete();
        alert()->success('Xóa vĩnh viễn','thành công');
        return redirect()->route('blog.trash')->with('success','xóa thành công ');
    }

    public function find(Request $request) {
        
        $blog= Blog::where('name','LIKE',"%$request->keyword%")->orwhere('id','LIKE',"%$request->keyword%")->paginate(5);
        $blog->appends(['keyword' => $request->keyword]);
        return view('admin.blog.blog-index',compact('blog'));
        
    }
}
