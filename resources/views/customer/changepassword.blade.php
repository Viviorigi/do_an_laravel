@section('title')
Đổi mật khẩu
@endsection
@extends('customer.masterviewCustomer')
@section('main-content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('Customer-assets') }}/img/banner.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Đổi mật khẩu</h2>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <section style="background-color: #eee;">
        <div class="container">




            <div class="row">
                <div class="col-lg-6 m-auto ">
                    <div class="card p-5">
                        <h3 class="text-center">
                            Thay đổi mật khẩu
                        </h3>
                        <form method="POST" action="{{ route('changePassword', $user->id) }}" class=" p-4">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mật khẩu cũ</label>
                                <input type="password" name="passwordOld" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="{{ old('passwordOld') }}">
                                @error('passwordOld')
                                    <span class="text-danger"><strong>{{ $message }}</strong></span>
                                @enderror
                                @if ($message = Session::get('error'))                               
                                       <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                       </span>
                                        
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mật khẩu mới</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                                @error('password')
                                    <span class="text-danger"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nhập lại mật khẩu</label>
                                <input type="password" name="repassword" class="form-control" id="exampleInputPassword1">
                                @error('repassword')
                                    <span class="text-danger"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-success w-100 mt-3">Đổi Mật khẩu mới</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
