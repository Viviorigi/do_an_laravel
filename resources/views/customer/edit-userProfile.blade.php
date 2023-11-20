@section('title')
Cập nhật thông tin khách hàng
@endsection
@extends('customer.masterviewCustomer')
@section('cus-css')
    <style>
        .avatar {
            width: 200px;
            height: 200px;
        }
    </style>
@endsection
@section('main-content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('Customer-assets') }}/img/banner.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Cập nhật Thông tin</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <section style="background-color: #eee;" class="">
        <div class="container bootstrap snippets bootdey card ">
            <h1 class=" p-3">Cập nhật thông tin</h1>
            <hr>
            <div class="row">
                <!-- left column -->

                <div class="col-md-3">
                    <form class="form-horizontal" role="form" method="POST"
                        action="{{ route('updateProfile', $user->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="text-center mt-4">
                          @if($user->image !='')
                          <img id='img' src="{{asset('storage/images')}}/{{$user->image}}" alt="avatar"
                          class=" img-fluid mb-2" style="width: 150px;">
                          @else
                          <img id='img' src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                          class=" img-fluid mb-2" style="width: 150px;">
                          @endif
                            <h6 class="mt-2 mb-2">Thay đổi ảnh đại diện</h6>
                            <input type="file" class="form-control" onchange="showImg(this,'img')" name="photo">
                        </div>
                </div>

                <!-- edit form column -->
                <div class="col-md-9 personal-info">
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">

                            <button type="button" class="close" data-dismiss="alert">×</button>

                            <strong>{{ $message }}</strong>

                        </div>
                    @endif
                    <h3 class=" p-3">Personal info</h3>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Tên:</label>
                        <div class="col-lg-10">
                            <input name="name" class="form-control" type="text" value="{{ old('name')?old('name'):$user->name }}">
                        </div>
                        @error('name')
                        <span class="text-danger ml-3"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Số điện thoại</label>
                        <div class="col-lg-10">
                            <input name="phone" class="form-control" type="text" value="{{ old('phone')?old('phone'):$user->phone }}">
                        </div>
                        @error('phone')
                        <span class="text-danger ml-3"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Email</label>
                        <div class="col-lg-10">
                            <input name="email" class="form-control" type="text" value="{{ old('email')?old('email'):$user->email }}">
                        </div>
                        @error('email')
                        <span class="text-danger ml-3"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Địa chỉ</label>
                        <div class="col-lg-10">
                            <input name="address" class="form-control" type="text" value="{{ old('address')?old('address'):$user->address }}">
                        </div>
                        @error('address')
                        <span class="text-danger ml-3"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success m-3">Cập nhật thông tin</button>

                </div>
                </form>
            </div>
        </div>

    </section>
@endsection

@section('custom-js')
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
    </script>
@endsection
