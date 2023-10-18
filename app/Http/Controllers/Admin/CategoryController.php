<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Category;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $cate =Category::paginate(5);
        return view('admin.category.category-index',compact('cate'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.add-category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {   
        $category=$request->validated();
        try {
            Category::create($category);
            return redirect()->route('category.index')->with('success','Thêm mới Thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Thêm mới không thành công');
        }     
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {   
        return view('admin.category.edit-category',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $updatecategory=$request->validated();
        try {
            $category->update($updatecategory);
            return redirect()->route('category.index')->with('success','Sửa thành công ');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Sửa không thành công');
        }   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return redirect()->route('category.index')->with('success','xóa thành công ');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','xóa không thành công');
        }   
    }

    public function trash(){
       
        $cate=Category::onlyTrashed()->get();
        
        return view('admin.category.trash-category',compact('cate'));
    }

    public function restore($id){
        Category::where('id',$id)->restore();
        return redirect()->route('category.index')->with('success','khôi phục thành công ');
    }
    public function forcedelete($id){
        Category::where('id',$id)->forceDelete();
        return redirect()->route('category.trash')->with('success','xóa thành công ');
    }

    public function find(Request $request) {
        $cate= Category::where('name','LIKE',"%$request->keyword%")->orwhere('id','LIKE',"%$request->keyword%")->paginate(5);
        
        return view('admin.category.category-index',compact('cate'));
        
    }
}
