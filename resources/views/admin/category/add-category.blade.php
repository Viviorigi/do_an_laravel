@extends('admin.masterview')
@section('title')
    ADD Category
@endsection

@section('main-content')
    <div class="col-lg-12  grid-margin stretch-card">
        <div class="col-lg-10 m-auto">
            <h2>Add Category</h2>
            <div class="">
                
                <form class="forms-sample" method="POST" action="{{route('category.store')}}">
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">

                        <button type="button" class="close" data-dismiss="alert">×</button>

                        <strong>{{ $message }}</strong>

                    </div>
                @endif
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputUsername1">Category name</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Username" name="name" />
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
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
                    <a href="{{route('category.index')}}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
