@extends('admin.masterview')
@section('title')
    ADD Category
@endsection

@section('main-content')
    <div class="col-lg-12  grid-margin stretch-card mt-5">
        <div class="col-lg-10 m-auto">
            <h2 class="mt-5">Add Category</h2>
            <div class="">
                
                <form class="forms-sample" method="POST" action="{{route('category.store')}}" enctype="multipart/form-data">
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">

                        <button type="button" class="close" data-dismiss="alert">×</button>

                        <strong>{{ $message }}</strong>

                    </div>
                @endif
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputUsername1">Category name</label>
                        <input type="text" class="form-control" id="name" placeholder="Category" name="name" 
                        onkeyup="ChangeToSlug()" onkeydown="ChangtoSlug()" value="{{old('name')}} "/>
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
                    <div class="form-group">
                        <label for="exampleInputUsername1">Image</label>
                        <input type="file" class="form-control" id="exampleInputUsername1" onchange="showImg(this,'img')" name="photo" />
                    @error('image')
                        <span class="mt-2 text-danger">{{$message}}</span>
                    @enderror
                    <div >
                        <img id="img"  alt="" width="300px">
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2"> ADD</button>
                    <a href="{{route('category.index')}}" class="btn btn-light">Cancel</a>
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
          
            img.src = reader.result;
        }
    }
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



    </script>
@endsection