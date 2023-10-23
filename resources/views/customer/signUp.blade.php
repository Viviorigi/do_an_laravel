@extends('customer.masterviewCustomer')
@section('main-content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form p-l-55 p-r-55 p-t-178">
                <span class="login100-form-title">
                    Sign Up
                </span>

                <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
                    <input class="input100" type="text" name="username" placeholder="Username">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Please enter password">
                    <input class="input100" type="password" name="pass" placeholder="Password">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input mt-3" data-validate = "Repeat password">
                    <input class="input100" type="password" name="pass" placeholder="Repeat ur Password">
                    <span class="focus-input100"></span>
                </div>

                <div class="text-right p-t-13 p-b-23">
                    <a href="#" class="txt2">
                        Forgot Password?
                    </a>
                </div>

                <div class="container-login100-form-btn mb-5">
                    <button class="login100-form-btn">
                        Sign up
                    </button>
                </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection