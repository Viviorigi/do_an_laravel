@extends('customer.masterviewCustomer')
@section('title')
Đăng ký tài khoản
@endsection
@section('main-content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="POST" action="">
                    @csrf
                    <span class="login100-form-title">
                        Đăng ký tài khoản
                    </span>
                    <div class="wrap-input100 validate-input m-b-16" data-validate="Vui lòng nhập email">
                        <input class="input100" type="text" name="name" placeholder="Tên tài khoản" value="{{ old('name') }}">
                        <span class="focus-input100"></span>

                    </div>
                    @error('name')
                        <span class="text-danger p-2">{{ $message }}</span>
                    @enderror
                    <div class="wrap-input100 validate-input m-b-16" data-validate="Vui lòng nhập email">
                        <input class="input100" type="email" name="email" placeholder="Nhập Email"
                            value="{{ old('email') }}">
                        <span class="focus-input100"></span>
                    </div>
                    @error('email')
                        <span class="text-danger pb-3">{{ $message }}</span>
                    @enderror
                    <div class="wrap-input100 validate-input" data-validate = "Mật khẩu không để trống">
                        <input class="input100" type="password" name="password" placeholder="Mật khẩu" value="{{ old('password') }}">
                        <span class="focus-input100"></span>

                    </div>
                    @error('password')
                        <span class="text-danger p-2">{{ $message }}</span>
                    @enderror
                    <div class="wrap-input100 validate-input mt-3 " data-validate = "Nhập lại mật khẩu">
                        <input class="input100" type="password" name="repassword" placeholder="Nhập lại mật khẩu">
                        <span class="focus-input100"></span>

                    </div>
                    @error('repassword')
                        <span class="text-danger p-2">{{ $message }}</span>
                    @enderror
                    <div class="container-login100-form-btn mt-3 mb-5">
                        <button type="submit" class="login100-form-btn">
                            Đăng ký 
                        </button>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
@endsection
