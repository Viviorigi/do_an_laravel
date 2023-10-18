@extends('admin.masterview')
@section('title')
    Product
@endsection

@section('main-content')
    <div class="col-lg-12 mt-5 grid-margin stretch-card">
        <br>

        <div class="card mt-5">
            <div class="table-responsive">
                <div class="mt-1 d-flex">
                    <li class="nav-item nav-search border-0 ml-1 ml-md-3 ml-lg-5 d-none d-md-flex">
                        <form class="nav-link form-inline mt-2 mt-md-0" method="POST" action="{{route('product.find')}}">
                            @csrf
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search" name="keyword"/>
                                <div class="input-group-append">
                                    <button type="submit" class="input-group-text">
                                        <i class="mdi mdi-magnify"></i>
                                    </button>

                                </div>
                            </div>
                        </form>
                    </li>                 
                </div>
                
                <div class="m-2 d-flex justify-content-between">
                    <a href="{{route('product.create')}}" class="btn btn-success">ADD new Product</a>
                    <a href="{{route('product.trash')}}" class="btn btn-primary mr-5">Trash <i class="mdi mdi-delete"></i></a>
                </div>
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
                                <a href="{{route('product.edit',$item)}}" class="btn btn-primary "> Edit</a>             
                            </td>
                            <td>
                                <a href="" >
                                    <form action="{{route('product.destroy',$item)}}" method="POST">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa')">DELETE</button>
                                    </form>
                                </a>    
                            </td>                           
                        </tr>
                        @endforeach
                        
                      
                    </tbody>
                </table>
                <div class="mt-3 ml-5"> 
                    {{ $product->links() }}
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
