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
                            <th>Created</th>
                            <th>Status</th>
                            <th>Image   </th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cate as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{date("d/m/Y", strtotime($item->created_at))}}</td>
                            <td>
                                <label class="badge {{$item->status?"badge-success":"badge-danger"}} ">{{$item->status?"HIện":"Ẩn"}}</label>
                            </td>
                            <td>
                                <img src="{{asset('storage/images')}}/{{$item->image}}" width="400px"    alt="">
                            </td>
                            <td >
                                <a href="{{route('banner.restore',$item->id)}}" class="btn btn-primary"> RESTORE</a>
                                
                            </td>    
                            <td>
                                <a href="{{route('banner.forcedelete',$item->id)}}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa')">
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
