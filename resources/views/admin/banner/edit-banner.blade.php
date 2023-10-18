@extends('admin.masterview')
@section('title')
    Edit banner
@endsection

@section('main-content')
    <div class="col-lg-12  grid-margin stretch-card">
        <div class="col-lg-10 m-auto">
            <h2>Edit banner</h2>
            <div class="">
                <form class="forms-sample" action="{{route('banner.update',$banner)}}" method="POST">
                    @method('PUT')
                    @csrf
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">

                        <button type="button" class="close" data-dismiss="alert">×</button>

                        <strong>{{ $message }}</strong>

                    </div>
                @endif
                    <div class="form-group">
                        <label for="exampleInputUsername1">banner name</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Username" name="name" value="{{$banner->name}}"/>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">banner name</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Username" name="name" value="{{$banner->image}}"/>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="status" id="" value="1" {{$banner->status?'checked':''}}>
                        Hiện
                      </label>                  
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="status" id="" value="0" {{!$banner->status?'checked':''}}>
                            Ẩn
                          </label>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2"> EDIT</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection
