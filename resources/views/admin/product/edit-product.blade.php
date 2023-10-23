@extends('admin.masterview')
@section('title')
   EDIT Product
@endsection

@section('main-content')
    <div class="col-lg-12 mt-5  grid-margin stretch-card">
        <div class="col-lg-10 m-auto">
            <h2 class="mt-5">Edit Product</h2>
            <div class="mt-5">
                <form class="forms-sample" method="POST" action="{{ route('product.update',$product)}}" enctype="multipart/form-data">
                @method('PUT')
                  @csrf
                  
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">

                            <button type="button" class="close" data-dismiss="alert">×</button>

                            <strong>{{ $message }}</strong>

                        </div>
                    @endif
                   
                    <div class="form-group">
                        <label for="exampleInputName1">Product Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Name"
                            name='name' onkeyup="ChangeToSlug()" onkeydown="ChangtoSlug()" value="{{old('name')? old('name') : $product->name }}" />
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Slug</label>
                        <input type="text" class="form-control" id="slug" name='slug' value="{{$product->slug}}" />
                        @error('slug')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Price</label>
                        <input type="text" class="form-control" id="exampleInputName1" name='price' value="{{old('price') ? old('price') : $product->price}}" />
                        @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Sale Price</label>
                        <input type="text" class="form-control" id="exampleInputName1" name='sale_price' value="{{old('sale_price')?old('sale_price') : $product->sale_price }} " />
                        @error('sale_price')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" id="" value="1"
                                    {{$product->status?'checked':''}}>
                                Còn
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" id="" value="0" {{!$product->status?'checked':''}}>
                                Hết
                            </label>
                        </div>
                        @error('status')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Category</label>
                        <select class="form-control" id="exampleSelectGender" name="category_id">
                            <option>Category</option>
                            @foreach ($cate as $item)
                                <option value="{{ $item->id }}" {{$item->id==$product->category_id?'selected':''}}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
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
                              <img id="img" src="{{asset('storage/images')}}/{{$product->image}}" alt="" width="300px">
                            </div>
                    </div>
                    
                      <div class="form-group">
                        <label for="exampleInputEmail1">Image Description</label>
                        <div class="box pt-2">                        
                            <input type="file" name="photos[]" class="form-control"   id="input" multiple onchange="preview(this)" >                                              
                        </div>
                        <div class="row" id="imgs">  
                            @if ($product->images )
                            @foreach ($product->images as $item)
                            <div class="col-md-3" id="img-old">
                
                                <div class="card "> 
                                    <img class="card-img-bottom" src="{{asset('storage/images')}}/{{$item->image}}"  alt="" width="100%" >
                                </div>
                            </div>
                        @endforeach        
                            @endif
                               
                        </div>
                        @error('photos')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    <div class="form-group">
                        <label for="exampleTextarea1">Description</label>
                      <textarea name="description" id="editor1"  rows="10" cols="80">
                        {{old('description') ? old('description') : $product->description}}
                      </textarea>
                      @error('description')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mr-2"> UPDATE </button>
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
            // can also use "this.result"
            img.src = reader.result;
        }
    }

    function preview(elem, output = '') {
        const i = 0;
        Array.from(elem.files).map((file) => {
            const blobUrl = window.URL.createObjectURL(file)
            output +=
                `<div class="col-md-3" id="img-add">
                    
                    <div class="card "> 
                        <img class="card-img-bottom" src=${blobUrl} alt="" width="100%" >
                    </div>
                </div>`
            })
            document.getElementById('imgs').innerHTML += output    
            for (let index = 0; index < 10 ; index++) {
            let toRemove = document.querySelector('#img-old');
            toRemove.remove();   
        }
        }
       



    </script>
   
@endsection
