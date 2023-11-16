@extends('admin.masterview')
@section('title')
    Trash
@endsection

@section('main-content')
    <div class="col-lg-12 mt-5 grid-margin stretch-card">
        <br>

        <div class="card mt-5">
            <div class="table-responsive">
                <div class="mt-1 d-flex">

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
                            <th>image</th>
                            <th>content</th>
                            <th>created at</th>
                            <th>Action</th>                 
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blog as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->name}}</td>
                            <td>
                                <img src="{{asset('storage/images')}}/{{$item->image}}" width="400px"    alt="">
                            </td>
                            <td>{{$item->Content}}</td>
                            <td>{{date("d/m/Y", strtotime($item->created_at))}}</td>
                            <td >
                                <a href="{{route('blog.restore',$item->id)}}" class="btn btn-primary"> RESTORE</a>
                            </td>          
                            <td>
                                <a href="{{route('blog.forcedelete',$item->id)}}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa')">
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
