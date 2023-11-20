@extends('customer.masterviewCustomer')
@section('main-content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('Customer-assets') }}/img/banner.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Danh sách yêu thích</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ route('index') }}">Trang chủ</a>
                            <span>Sản phẩm yêu thích</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 m-auto col-md-8">
                    <div class="product__discount">
                    </div>
                    <div class="row">
                        @foreach ($list_products as $value)
                        @foreach ($value as $item)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg"
                                    data-setbg="{{ asset('storage/images') }}/{{ $item->image }}">
                                    <div
                                        style="height: 45px;width: 45px;background: #dd2222;border-radius: 50%;font-size: 14px;color: #ffffff;line-height: 45px;text-align: center;position: absolute;left: 15px;top: 15px;">
                                        -{{ ceil((1 - $item->sale_price / $item->price) * 100) }}%</div>
                                    <ul class="product__item__pic__hover">
                                        <li><a href="{{ route('product-detail', $item->slug) }}"><i
                                                    class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <a href="{{ route('product-detail', $item->slug) }}">
                                        <h4>{{ $item->name }}</h4>
                                    </a>
                                    <h5>{{ number_format($item->sale_price) }}VNĐ <del
                                            style="font-size: 14px">{{ number_format($item->price) }}VNĐ</del></h5>
                                        <a href="{{route('WishList.delete',$item->id)}}"  class="btn btn-danger m-2" >Xóa Yêu thích</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                        @endforeach
                       
                    </div>
                </div>
            </div>
    </section>
    <!-- Product Section End -->
@endsection
@section('custom-js')
    <script>
        function getWishlistCount() {
            $.ajax({
                type: "GET",
                url: "{{ route('WishList.count') }}",
                success: function(data) {
                    $('.wishlist-count').html(data.wishlistCount)
                }
            })
        }
    </script>
       @if ($message = Session::get('success'))
       <script>
           toastr.success("{{ Session::get('success') }}");
       </script>
       @endif
@endsection
