@extends('admin.masterview')
@section('title')
    Edit blog
@endsection

@section('main-content')
    <div class="col-lg-12  grid-margin stretch-card mt-5">
        <div class="col-lg-10 m-auto">
            <h2 class="mt-5">Edit blog</h2>
            <div class="mt-5">
                <form class="forms-sample" action="{{route('blog.update',$blog)}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">

                        <button type="button" class="close" data-dismiss="alert">×</button>

                        <strong>{{ $message }}</strong>

                    </div>
                @endif
                   
                  <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="exampleInputUsername1">blog name</label>
                            <input type="text" class="form-control" id="exampleInputUsername1" name="name" value="{{$blog->name}}"/>
                            @error('name')
                                <span class="mt-2 text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Slug</label>
                            <input type="text" class="form-control" id="slug" name='slug'  value="{{$blog->slug}}"/>
                            @error('slug')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Image</label>
                            <input type="file" class="form-control" id="exampleInputUsername1"  name="photo" onchange="showImg(this,'img')" />
                            @error('photo')
                            <span class="mt-2 text-danger">{{ $message }}</span>
                        @enderror
                            <img id="img" src="{{asset('storage/images')}}/{{$blog->image}}" alt=""  width="300px">
                           
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="exampleTextarea1">Description</label>
                          <textarea name="description" id="editor1"  rows="10" cols="80" value="{{$blog->description}}" >
                          </textarea>
                          @error('description')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1">content</label>
                          <textarea name="content" id="editor1"  rows="10" cols="50" value="{{$blog->content}}" >
                          </textarea>
                          @error('content')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                    </div>
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