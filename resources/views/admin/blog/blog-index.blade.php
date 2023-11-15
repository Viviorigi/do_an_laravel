@extends('admin.masterview')
@section('title')
    blog
@endsection

@section('main-content')
    <div class="col-lg-12 mt-5 grid-margin stretch-card">
        <br>

        <div class="card mt-5">
            <div class="table-responsive">
                <div class="mt-1 d-flex">
                    <li class="nav-item nav-search border-0 ml-1 ml-md-3 ml-lg-5 d-none d-md-flex">
                        <form class="nav-link form-inline mt-2 mt-md-0" method="GET" action="{{route('blog.find')}}">
                           
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
                    <a href="{{route('blog.create')}}" class="btn btn-success">ADD new blog</a>
                    <a href="{{route('blog.trash')}}" class="btn btn-primary mr-5">Trash <i class="mdi mdi-delete"></i></a>
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
                            <th>Slug</th>
                            <th>Image</th>
                            <th>Created at</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blog as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->slug}}</td>
                            <td>
                                <img src="{{asset('storage/images')}}/{{$item->image}}" width="200px"    alt="">
                            </td>
                            <td>{{date("d/m/Y", strtotime($item->created_at))}}</td>
                            <td >
                                <a href="{{route('blog.edit',$item)}}" class="btn btn-primary"> Edit</a>
                                <a href="">
                                    <form action="{{route('blog.destroy',$item)}}" method="POST">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa')">DELETE</button>
                                    </form>
                                </a>
                                
                            </td>                          
                        </tr>
                        @endforeach
                        
                      
                    </tbody>
                </table>
                <div class="mt-3 m-4"> 
                    {{ $blog->links() }}
                </div>
               
            </div>
        </div>
    </div>
    </div>
@endsection
