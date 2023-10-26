@extends('admin.masterview')
@section('title')
    Edit banner
@endsection

@section('main-content')
    <div class="col-lg-12  grid-margin stretch-card mt-5">
        <div class="col-lg-10 m-auto">
            <h2 class="mt-5">Edit banner</h2>
            <div class="mt-5">
                <form class="forms-sample" action="{{route('banner.update',$banner)}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">

                        <button type="button" class="close" data-dismiss="alert">×</button>

                        <strong>{{ $message }}</strong>

                    </div>
                @endif
                   
                    <div class="form-group">
                        <label for="exampleInputUsername1">Banner name</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" name="name" value="{{$banner->name}}"/>
                        @error('name')
                            <span class="mt-2 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Image</label>
                        <input type="file" class="form-control" id="exampleInputUsername1"  name="photo" onchange="showImg(this,'img')" />
                        @error('photo')
                        <span class="mt-2 text-danger">{{ $message }}</span>
                    @enderror
                        <img id="img" src="{{asset('storage/images')}}/{{$banner->image}}" alt=""  width="300px">
                       
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
@section('script_edit')
<script>
    function showImg(input, target) {
        let file = input.files[0];
        let reader = new FileReader();

        reader.readAsDataURL(file);
        reader.onload = function() {
            let img = document.getElementById(target);
            // can also use "this.result"
            img.src = reader.result;
        }
    }
</script>
@endsection