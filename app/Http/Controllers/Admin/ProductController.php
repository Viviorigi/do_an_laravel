<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Category;
use  App\Models\Product;
use  App\Models\ImgProducts;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use RealRashid\SweetAlert\Facades\Alert;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product=Product::orderBy('updated_at', 'DESC')->paginate(5);
        return view('admin.product.product-index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cate=Category::all();
        return view('admin.product.add-product',compact('cate'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {   
       
        $file_name=$request->photo->getClientOriginalName();
        $request->photo->storeAs('public/images',$file_name);
        $product=$request->merge(['image'=>$file_name]);        

        try {
            $product=Product::create($request->all());
            if($product && $request->hasFile('photos')){
                foreach ($request->photos as $key => $value) {
                    $file_names=$value->getClientOriginalName();
                    $value->storeAs('public/images',$file_names);
                    ImgProducts::create([
                        'product_id'=>$product->id,
                        'image'=>$file_names
                    ]);
                }
            }
            alert()->success('Thêm mới','thành công');
            return redirect()->route('product.index')->with('success','Thêm mới thành công');
        } catch (\Throwable $th) {
           
            alert()->error('Thêm mới','thêm mới thất bại');
            return redirect()->back()->with('error','thêm mới thất bại');
        }

    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $cate=Category::all();
        return view('admin.product.edit-product',compact('cate','product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $file_name='';
        
        if(!$request->photo==''){
            $file_name=$request->photo->getClientOriginalName();
            $request->photo->storeAs('public/images',$file_name);
            $request->merge(['image'=>$file_name]);
        }   
        try {
            $product->update($request->all());    
            if($product && $request->hasFile('photos')){   
                ImgProducts::where('product_id',$product->id)->delete();         
                foreach ($request->photos as  $value) {
                    $file_names=$value->getClientOriginalName();
                    $value->storeAs('public/images',$file_names);                   
                    ImgProducts::create([
                        'product_id'=>$product->id,
                        'image'=>$file_names
                    ]);
                }
                
            } 
            alert()->success('Cập nhật','thành công');
            return redirect()->route('product.index')->with('success','Cập nhật thành công');
        } catch (\Throwable $th) {
            alert()->error('Thêm mới','Cập nhật thất bại');
            return redirect()->back()->with('success','Cập nhật thất bại');
        }
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {   
        $product->delete();
        try {
            
            alert()->success('Xóa','thành công');
            return redirect()->route('product.index')->with('success','xóa thành công ');
        } catch (\Throwable $th) {
            alert()->error('Xóa','thất bại');
            return redirect()->back()->with('error','xóa không thành công');
        }   
    }
    public function trash(){
        $product=Product::onlyTrashed()->get();
        return view('admin.product.trash-product',compact('product'));
    }

    public function restore($id){
        Product::where('id',$id)->restore();
        alert()->success('Khôi phục','thành công');
        return redirect()->route('product.index')->with('success','khôi phục thành công ');
    }
    public function forcedelete($id){
        ImgProducts::where('product_id',$id)->delete();
        Product::where('id',$id)->forceDelete();    
        alert()->success('Xóa vĩnh viễn','thành công');
        return redirect()->route('product.trash')->with('success','xóa thành công ');
    }
    public function find(Request $request) {
        $product= Product::where('name','LIKE',"%$request->keyword%")
        ->orwhere('id','LIKE',"%$request->keyword%")
        ->orwhere('price','LIKE',"%$request->keyword%")
        ->orwhere('sale_price','LIKE',"%$request->keyword%")
        ->orderBy('updated_at', 'DESC')
        ->paginate(5);
        $product->appends(['keyword' => $request->keyword]);
        return view('admin.product.product-index',compact('product'));
        
    }
}
