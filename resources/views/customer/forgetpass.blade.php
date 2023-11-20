@extends('customer.masterviewCustomer')
@section('title')
Lấy lại mật khẩu
@endsection
@section('main-content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="POST" action="">
                    @csrf
                    <span class="login100-form-title">
                        Nhập Email để lấy lại mật khẩu
                    </span>
                    @if ($message = Session::get('warning'))
                        <div class="alert alert-warning alert-block">

                            <button type="button" class="close" data-dismiss="alert">×</button>

                            <strong>{{ $message }}</strong>

                        </div>
                    @endif
                    <div class="wrap-input100 validate-input m-b-16 mb-3" data-validate="Vui lòng nhập email">
                        <input class="input100" type="email" name="email" value="{{ old('email') }}"
                            placeholder="Email">
                        <span class="focus-input100"></span>    
                    </div>
                    @error('email')
                    <span class="text-danger pb-5 pl-3">{{ $message }}</span>
                    @enderror
                    <div class="container-login100-form-btn mb-5 mt-2">
                        <button type="submit" class="login100-form-btn">
                           Lấy lại mật khẩu
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('custom-js')
    @if ($message = Session::get('warning'))
    <script>
        toastr.success("{{ $message }}");
    </script>
    @endif
@endsection