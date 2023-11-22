@extends('customer.masterviewCustomer')
@section('title')
Đăng nhập
@endsection
@section('main-content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="POST" action="">
                    @csrf
                    <span class="login100-form-title">
                        Đăng nhập
                    </span>
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">

                            <button type="button" class="close" data-dismiss="alert">×</button>

                            <strong>{{ $message }}</strong>

                        </div>
                    @endif
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">

                            <button type="button" class="close" data-dismiss="alert">×</button>

                            <strong>{{ $message }}</strong>

                        </div>
                    @endif
                    @if ($message = Session::get('warning'))
                        <div class="alert alert-warning alert-block">

                            <button type="button" class="close" data-dismiss="alert">×</button>

                            <strong>{{ $message }}</strong>

                        </div>
                    @endif
                    @if ($message = Session::get('alert'))
                        <div class="alert alert-warning alert-block">

                            <button type="button" class="close" data-dismiss="alert">×</button>

                            <strong>{{ $message }}</strong>

                        </div>
                    @endif
                    <div class="wrap-input100 validate-input m-b-16" data-validate="Vui lòng nhập email">
                        <input class="input100" type="email" name="Nhập email" value="{{ old('email') }}"
                            placeholder="Email">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Vui lòng nhập mật khẩu">
                        <input class="input100" type="password" name="password" placeholder="Mật khẩu">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="text-right p-t-13 p-b-23">
                        <a href="{{route('forgetpassword')}}" class="txt2">
                            <strong>quên mật khẩu ?</strong>
                        </a>
                    </div>

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            Đăng nhập
                        </button>
                    </div>

                    <div class="flex-col-c p-t-100 p-b-40">
                        <span class="txt1 p-b-9">
                            <strong>Bạn chưa có tài khoản</strong>
                        </span>

                        <a href="{{ route('register') }}" class="txt3">
                            <strong>Tạo tài khoản mới ngay bây giờ!</strong>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('custom-js')
    @if ($message = Session::get('success'))
    <script>
        toastr.success("{{ $message }}");
    </script>
    @endif
    @if ($message = Session::get('error'))
    <script>
        toastr.error("{{ $message }}");
    </script>
    @endif
    @if ($message = Session::get('warning'))
    <script>
        toastr.warning("{{ $message }}");
    </script>
    @endif
     @if ($message = Session::get('alert'))
    <script>
        toastr.warning("{{ $message }}");
    </script>
    @endif
@endsection