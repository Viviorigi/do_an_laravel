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
    <div class="jumbotron text-center">
        <h1 class="display-3">Đơn hàng của bạn đã được đặt</h1>
        <p class="lead">Đặt hàng thành công vui lòng check email {{$cus->email}}</p>
        <p>Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất vui lòng kiểm tra điện thoại</p>
        <h1>
            <i class="fa fa-check " style="font-size: 150px"></i>
        </h1>
    </div>

@endsection
@section('custom-js')
@if ($message = Session::get('success'))
<script>
    toastr.success("{{ Session::get('success') }}");
</script>
@endif
@endsection