@extends('admin.masterview')
@section('title')
    Product
@endsection

@section('main-content')
    <div class="col-lg-12 mt-5 grid-margin stretch-card">
        <br>
        
        <div class="card mt-5">
            <h2>Product Trash</h2>
            
                <table class="table-responsive">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">

                            <button type="button" class="close" data-dismiss="alert">×</button>

                            <strong>{{ $message }}</strong>

                        </div>
                    @endif
                    <thead>
                        <tr>
                            <th class="pl-2">STT</th>
                            <th  >Name</th>                       
                            <th >Image</th>
                            <th >Price/Sale Price</th>                        
                            <th >Category</th>
                            <th >Status</th>            
                            <th >Action</th>   
                            <th ></th>             
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $item)
                        <tr>
                            <td class="pl-2">{{$loop->iteration}}</td>
                            <td class="text-wrap">{{$item->name}}</td>
                            
                            <td><img src="{{asset('storage/images')}}/{{$item->image}}"  width="150px"></td>
                            <td>{{number_format($item->price)}}đ/{{number_format($item->sale_price)}}đ</td>
                           
                            <td class="text-center">{{$item->category->name}}</td>
                            
                            <td>
                                <label class="badge {{$item->status?"badge-success":"badge-danger"}} ">{{$item->status?"Còn hàng":"Hết hàng" }}</label>
                            </td>
                           
                            <td >
                                <a href="{{route('product.restore',$item->id)}}" class="btn btn-primary"> RESTORE</a>
                                
                            </td>    
                            <td>
                                <a href="{{route('product.forcedelete',$item->id)}}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa')">
                                    DELETE
                                 </a>
                            </td>                      
                        </tr>
                        @endforeach
                        
                      
                    </tbody>
                </table>
            
        </div>
    </div>
    </div>
@endsection
