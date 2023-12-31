@extends('admin.masterview')
@section('title')
    ADD Blog
@endsection

@section('main-content')
    <div class="col-lg-12 mt-5  grid-margin stretch-card">
        <div class="col-lg-10 m-auto">
            <h2 class="mt-5">Add BLog</h2>
            <div class="mt-5">
                <form class="forms-sample" method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data">
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
                                <label for="exampleInputName1">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Name"
                                    name='name' onkeyup="ChangeToSlug()" onkeydown="ChangtoSlug()" value="{{old('name')}}" />
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Slug</label>
                                <input type="text" class="form-control" id="slug" name='slug'  />
                                @error('slug')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Image</label>
                                <input type="file" class="form-control" name="photo" id="" onchange="showImg(this,'img')">
                                    @error('photo')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div >
                                      <img id="img" src="" alt="" width="300px">
                                    </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleTextarea1">content</label>
                                <textarea name="content" id="editor1"  rows="10" cols="50"></textarea>
                              @error('content')
                              <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2"> ADD </button>
                    <a href="{{ route('product.index') }}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script_edit')
    <script src="{{asset('admin-assets')}}/ckeditor/ckeditor.js"></script>
    <script>
        function ChangeToSlug() {
            var name, slug;
            //Lấy text từ thẻ input name 
            name = document.getElementById("name").value;

            //Đổi chữ hoa thành chữ thường
            slug = name.toLowerCase();

            //Đổi ký tự có dấu thành không dấu
            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
            slug = slug.replace(/đ/gi, 'd');
            //Xóa các ký tự đặt biệt
            slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
            //Đổi khoảng trắng thành ký tự gạch ngang
            slug = slug.replace(/ /gi, "-");
            //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
            //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
            slug = slug.replace(/\-\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-/gi, '-');
            slug = slug.replace(/\-\-/gi, '-');
            //Xóa các ký tự gạch ngang ở đầu và cuối
            slug = '@' + slug + '@';
            slug = slug.replace(/\@\-|\-\@|\@/gi,'');
            //In slug ra textbox có id “slug”
            document.getElementById('slug').value = slug;
        }

        CKEDITOR.replace( 'editor1' );

        function showImg(input, target) {
        let file = input.files[0];
        let reader = new FileReader();

        reader.readAsDataURL(file);
        reader.onload = function() {
            let img = document.getElementById(target);
          
            img.src = reader.result;
        }
    }




    </script>
   
@endsection
