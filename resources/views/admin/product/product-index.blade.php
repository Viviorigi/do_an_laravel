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
                        <form class="nav-link form-inline mt-2 mt-md-0" method="GET" action="{{route('product.find')}}">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search" name="keyword" value="{{Request::get('keyword')}}" />
                                <div class="input-group-append">
                                    <button type="submit" class="input-group-text">
                                        <i class="mdi mdi-magnify"></i>
                                    </button>

                                </div>
                            </div>
                        </form>
                    </li>                 
                </div>
                
                <div class="m-2 d-flex justify-content-lg-between justify-content-md-around ">
                    <a href="{{route('product.create')}}" class="btn btn-success ml-3">ADD new Product</a>
                    <a href="{{route('product.trash')}}" class="btn btn-primary mr-3 ">Trash <i class="mdi mdi-delete"></i></a>
                </div>
                <table class="table-responsive " >
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">

                            <button type="button" class="close" data-dismiss="alert">×</button>

                            <strong>{{ $message }}</strong>

                        </div>
                    @endif
                    <thead>
                        <tr>
                            <th class="pl-2">STT</th>
                            <th >Name</th>                        
                            <th >Image</th>
                            <th >Price/Sale Price</th>                        
                            <th >Category</th>
                            <th >Created</th>
                            <th >Status</th>            
                            <th >Action</th>   
                            <th></th>             
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $item)
                        <tr>
                            <td class="pl-2 mr-3">{{$loop->iteration}}</td>
                            <td class="text-wrap" >{{$item->name}}</td>
                            
                            <td ><img src="{{asset('storage/images')}}/{{$item->image}}"  width="150px"></td>
                            <td >{{number_format($item->price)}}đ/{{number_format($item->sale_price)}}đ</td>
                           
                            <td class="text-center">{{$item->category->name}}</td>
                            <td >{{date("d/m/Y", strtotime($item->created_at))}}</td>
                            <td >
                                <label class="badge {{$item->status?"badge-success":"badge-danger"}} ">{{$item->status?"Còn hàng":"Hết hàng" }}</label>
                            </td>
                           
                            <td >
                                <a href="{{route('product.edit',$item)}}" class="btn btn-primary "> Edit</a>             
                            </td>
                            <td >                              
                                    <form action="{{route('product.destroy',$item)}}" method="POST">
                                        @csrf @method('DELETE')
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger show-alert-delete-box" >DELETE</button>
                                    </form>                              
                            </td>                           
                        </tr>
                        @endforeach
                        
                      
                    </tbody>
                </table>
                <div class="mt-3 m-4"> 
                    {{ $product->links() }}
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('script_edit')
    
@endsection