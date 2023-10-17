@extends('admin.masterview')
@section('title')
    Edit Category
@endsection

@section('main-content')
    <div class="col-lg-12  grid-margin stretch-card">
        <div class="col-lg-10 m-auto">
            <h2>Edit Category</h2>
            <div class="">
                <form class="forms-sample" action="{{route('category.update',$category)}}" method="POST">
                    @method('PUT')
                    @csrf
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">

                        <button type="button" class="close" data-dismiss="alert">×</button>

                        <strong>{{ $message }}</strong>

                    </div>
                @endif
                    <div class="form-group">
                        <label for="exampleInputUsername1">Category name</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Username" name="name" value="{{$category->name}}"/>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="status" id="" value="1" {{$category->status?'checked':''}}>
                        Hiện
                      </label>                  
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="status" id="" value="0" {{!$category->status?'checked':''}}>
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
