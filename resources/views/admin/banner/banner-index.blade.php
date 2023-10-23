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
                        <form class="nav-link form-inline mt-2 mt-md-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search" />
                                <div class="input-group-append">
                                    <button type="submit" class="input-group-text">

                                        <i class="mdi mdi-magnify"></i>

                                    </button>

                                </div>
                            </div>
                        </form>
                    </li>

                </div>
                <div class="m-2">
                    <a href="{{route('banner.create')}}" class="btn btn-success">ADD new Banner</a>
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
                            <th>Created</th>
                            <th>Status</th>
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
                                <img src="{{asset('storage/images')}}/{{$item->image}}" width="200px" alt="">
                            </td>
                            <td class="d-flex">
                                <a href="{{route('banner.edit',$item)}}" class="btn btn-primary"> Edit</a>
                                <a href="">
                                    <form action="{{route('banner.destroy',$item)}}" method="POST">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa')">DELETE</button>
                                    </form>
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
