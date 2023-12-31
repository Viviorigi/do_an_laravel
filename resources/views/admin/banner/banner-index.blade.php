@extends('admin.masterview')
@section('title')
    Banner
@endsection

@section('main-content')
    <div class="col-lg-12 mt-5 grid-margin stretch-card">
        <br>

        <div class="card mt-5">
            <div class="table-responsive">
                <div class="mt-1 d-flex">
                    <li class="nav-item nav-search border-0 ml-1 ml-md-3 ml-lg-5 d-none d-md-flex">
                        <form class="nav-link form-inline mt-2 mt-md-0" method="GET" action="{{route('banner.find')}}">
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
                <div class="m-2 d-flex justify-content-between">
                    <a href="{{route('banner.create')}}" class="btn btn-success">ADD new Banner</a>
                    <a href="{{route('banner.trash')}}" class="btn btn-primary mr-5">Trash <i class="mdi mdi-delete"></i></a>
                </div>
                <table class="table text-center">
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
                            <th>Created</th>
                            <th>Status</th>
                            <th>Image   </th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banner as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{date("d/m/Y", strtotime($item->created_at))}}</td>
                            <td>
                                <label class="badge {{$item->status?"badge-success":"badge-danger"}} ">{{$item->status?"HIện":"Ẩn"}}</label>
                            </td>
                            <td>
                                <img src="{{asset('storage/images')}}/{{$item->image}}" style="width: 400px !important;"    alt="">
                            </td>
                            <td >
                                <a href="{{route('banner.edit',$item)}}" class="btn btn-primary"> Edit</a>
                                
                            </td>  
                            <td>
                                <a href="">
                                    <form action="{{route('banner.destroy',$item)}}" method="POST">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger" >DELETE</button>
                                    </form>
                                </a>
                            </td>                         
                        </tr>
                        @endforeach
                        
                      
                    </tbody>
                </table>
                <div class="mt-3 m-4"> 
                    {{ $banner->links() }}
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
