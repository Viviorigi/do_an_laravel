@extends('admin.masterview')
@section('title')
    ADD banner
@endsection

@section('main-content')
    <div class="col-lg-12  grid-margin stretch-card">
        <div class="col-lg-10 m-auto">
            <h2>Add banner</h2>
            <div class="">
                
                <form class="forms-sample" method="POST" action="{{route('banner.store')}}" enctype="multipart/form-data">
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">

                        <button type="button" class="close" data-dismiss="alert">×</button>

                        <strong>{{ $message }}</strong>

                    </div>
                @endif
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputUsername1">name</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Username" name="name" />
                    @error('name')
                        <span class="mt-2 text-danger">{{$message}}</span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">image</label>
                        <input type="file" class="form-control" id="exampleInputUsername1" placeholder="Username" name="photo" />
                    @error('image')
                        <span class="mt-2 text-danger">{{$message}}</span>
                    @enderror
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="status" id="" value="1" checked>
                        Hiện
                      </label>                  
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="status" id="" value="0" >
                            Ẩn
                          </label>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2"> ADD</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection
