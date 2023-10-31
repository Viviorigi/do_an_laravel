@extends('customer.masterviewCustomer')
@section('main-content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="POST" action="">
                    @csrf
                    <span class="login100-form-title">
                        Sign Up
                    </span>
                    <div class="wrap-input100 validate-input m-b-16" data-validate="Vui lòng nhập email">
                        <input class="input100" type="text" name="name" placeholder="Name" value="{{ old('name') }}">
                        <span class="focus-input100"></span>

                    </div>
                    @error('name')
                        <span class="text-danger p-2">{{ $message }}</span>
                    @enderror
                    <div class="wrap-input100 validate-input m-b-16" data-validate="Vui lòng nhập email">
                        <input class="input100" type="email" name="email" placeholder="Email"
                            value="{{ old('email') }}">
                        <span class="focus-input100"></span>
                    </div>
                    @error('email')
                        <span class="text-danger pb-3">{{ $message }}</span>
                    @enderror
                    <div class="wrap-input100 validate-input" data-validate = "Mật khẩu không để trống">
                        <input class="input100" type="password" name="password" placeholder="Password" value="{{ old('password') }}">
                        <span class="focus-input100"></span>

                    </div>
                    @error('password')
                        <span class="text-danger p-2">{{ $message }}</span>
                    @enderror
                    <div class="wrap-input100 validate-input mt-3" data-validate = "Nhập lại mật khẩu">
                        <input class="input100" type="password" name="repassword" placeholder="Repeat ur Password">
                        <span class="focus-input100"></span>

                    </div>
                    @error('repassword')
                        <span class="text-danger p-2">{{ $message }}</span>
                    @enderror
                    <div class="text-right p-t-13 p-b-23">
                        <a href="#" class="txt2">
                            Forgot Password?
                        </a>
                    </div>

                    <div class="container-login100-form-btn mb-5">
                        <button type="submit" class="login100-form-btn">
                            Sign up
                        </button>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
@endsection
