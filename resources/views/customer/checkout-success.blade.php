@section('title')
Đặt hàng thành công
@endsection
@extends('customer.masterviewCustomer')
@section('main-content')
     <!-- Breadcrumb Section Begin -->
     <section class="breadcrumb-section set-bg" data-setbg="{{asset('Customer-assets')}}/img/banner.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Đặt hàng</h2>
                        <div class="breadcrumb__option">
                            <span>Đặt hàng thành công</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="jumbotron">
        <h1 class="display-3">Đơn hàng của bạn đã được đặt</h1>
        <p class="lead">Đặt hàng thành công vui lòng check email {{$cus->email}}</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="Jumbo action link" role="button">Jumbo action name</a>
        </p>
    </div>

@endsection
@section('custom-js')
@if ($message = Session::get('success'))
<script>
    toastr.success("{{ Session::get('success') }}");
</script>
@endif
@endsection