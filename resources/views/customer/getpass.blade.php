@extends('customer.masterviewCustomer')
@section('title')
Đặt lại mật khẩu
@endsection
@section('main-content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="POST" action="">
                    @csrf
                    <span class="login100-form-title">
                        Đặt lại mật khẩu
                    </span>
                    <div class="wrap-input100 validate-input" data-validate = "Mật khẩu không để trống">
                        <input class="input100" type="password" name="password" placeholder="Password" value="{{ old('password') }}">
                        <span class="focus-input100"></span>

                    </div>
                    @error('password')
                        <span class="text-danger p-2"><strong>{{ $message }}</strong></span>
                    @enderror
                    <div class="wrap-input100 validate-input mt-3 " data-validate = "Nhập lại mật khẩu">
                        <input class="input100" type="password" name="repassword" placeholder="Repeat ur Password">
                        <span class="focus-input100"></span>

                    </div>
                    @error('repassword')
                        <span class="text-danger p-2"><strong>{{ $message }}</strong></span>
                    @enderror
                    <div class="container-login100-form-btn mb-5 mt-2">
                        <button type="submit" class="login100-form-btn">
                            Đặt lại mật khẩu
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
