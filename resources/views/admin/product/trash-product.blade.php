@extends('admin.masterview')
@section('title')
    Product
@endsection

@section('main-content')
    <div class="col-lg-12 mt-5 grid-margin stretch-card">
        <br>

        <div class="card mt-5">
            <div class="table-responsive">
                <table class="table">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">

                            <button type="button" class="close" data-dismiss="alert">×</button>

                            <strong>{{ $message }}</strong>

                        </div>
                    @endif
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Sale Price</th>
                            <th>Category</th>
                            <th>Created</th>
                            <th>Status</th>            
                            <th colspan="1">Action</th>   
                            <th></th>             
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->slug}}</td>
                            <td><img src="{{asset('storage/images')}}/{{$item->image}}"  width="300px"></td>
                            <td>{{number_format($item->price)}}đ</td>
                            <td>{{number_format($item->sale_price)}}đ</td>
                            <td>{{$item->category->name}}</td>
                            <td>{{date("d/m/Y", strtotime($item->created_at))}}</td>
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
    </div>
@endsection
