<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Category;
use  App\Models\Product;
use  App\Models\img_products;
use App\Http\Requests\Product\StoreProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product=Product::all();
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
                    img_products::create([
                        'product_id'=>$product->id,
                        'image'=>$file_names
                    ]);
                }
            }
            return redirect()->route('product.index')->with('success','thêm mới thành công');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->with('error','thêm mới thất bại');
        }

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
