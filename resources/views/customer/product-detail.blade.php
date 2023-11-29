@section('title')
    Chi tiết sản phẩm
@endsection
@extends('customer.masterviewCustomer')
@section('main-content')
    <!-- Breadcrumb Section Begin -->
    <section class="blog-details-hero set-bg" data-setbg="{{ asset('customer-assets') }}/img/banner.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>{{ $detail->name }}</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ route('index') }}">Trang chủ</a>
                            <a href="{{ route('productsByCate', $detail->slug) }}">{{ $detail->category->name }}</a>
                            <span>{{ $detail->name }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="{{ asset('storage/images') }}/{{ $detail->image }}" style="height: 500px !important;"
                                alt="">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            <img data-imgbigurl="{{ asset('storage/images') }}/{{ $detail->image }}"
                                src="{{ asset('storage/images') }}/{{ $detail->image }}" style="height: 150px !important;"
                                alt="">
                            @foreach ($detail->images as $item)
                                <img data-imgbigurl="{{ asset('storage/images') }}/{{ $item->image }}"
                                    src="{{ asset('storage/images') }}/{{ $item->image }}"
                                    style="height: 150px !important;" alt="">
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h2>{{ $detail->name }}</h2>
                        <div class="d-flex mb-5">
                            @if ($detail->sale_price > 0)
                                <h4 class="mt-2 pr-2"><del>{{ number_format($detail->price) }}VNĐ </h4> </del>
                                <h2 class="text-danger mt-1 "> {{ number_format($detail->sale_price) }} VNĐ</h2>
                            @else
                                <h2 class="text-danger mt-1 "> {{ number_format($detail->price) }} VNĐ</h2>
                            @endif
                        </div>
                        <div class="d-lg-flex">
                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $detail->id }}">
                                <div class="product__details__quantity">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="text" value="1" name="quantity">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="primary-btn">ADD TO CARD</button>
                            </form>
                            @if (Auth::check() && Auth::user()->role == 0)
                                <a href="javascript:void(0)" class="heart-icon" id="wishlistadded"
                                    onclick="addProductToWishList({{ $detail->id }})"
                                    {{ $wish != null ? 'style=background-color:#7fad39;color:#fff' : '' }}><span
                                        class="icon_heart_alt"></span></a>
                            @else
                                <a href="{{ route('login') }}" class="heart-icon" onclick="login()"><span
                                        class="icon_heart_alt"></span></a>
                            @endif
                        </div>
                        @if (Auth::check() && Auth::user()->role == 0)
                            <div class="d-flex mt-4">
                                <div id="rateYo"></div>
                                <div>
                                    <h4 class="mt-1 ml-2">Đánh giá {{ round($ratingAvg, 1) }}/5 <i class="fa fa-star"
                                            style="color: #ffff00"></i></h4>
                                    <p class="ml-2">Lượt đánh giá: {{ $ratingcount }}</p>
                                </div>
                            </div>
                        @else
                            <div class="d-flex mt-4">
                                <div id="rateYo1"></div>
                                <div>
                                    <h4 class="mt-1 ml-2">Đánh giá {{ round($ratingAvg, 1) }}/5 <i class="fa fa-star"
                                            style="color: #ffff00"></i></h4>
                                    <p class="ml-2">Lượt đánh giá: {{ $ratingcount }}</p>
                                </div>
                            </div>
                        @endif
                        @if (Auth::check() && Auth::user()->role == 0)
                            <form action="{{ route('rating') }}" method="POST" id="formRating">
                                @csrf
                                <div class="d-flex">
                                    <input type="hidden" name="rating_star" id="rating_star">
                                    <input type="hidden" name="product_id" value="{{ $detail->id }}">
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                </div>
                            </form>
                        @endif
                        <ul>
                            <li><label
                                    class="badge {{ $detail->status ? 'badge-success' : 'badge-danger' }} ">{{ $detail->status ? 'Còn hàng' : 'Hết hàng' }}</label>
                            </li>
                            <li class=""><b>Giao ngay trong hôm nay </b></li>
                            <li><b>Khối lượng</b> <span>1 kg</span></li>
                            <li><b>Chia sẻ ngay :</b><br>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link des-pro active" data-toggle="tab" role="tab"
                                    aria-selected="true">Thông tin sản phẩm</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">

                                    <p>{!! $detail->description !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($related as $item)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg"
                                data-setbg="{{ asset('storage/images') }}/{{ $item->image }}">
                                <ul class="product__item__pic__hover">
                                    @if (Auth::check() && Auth::user()->role == 0)
                                        <li><a href="javascript:void(0)"
                                                onclick="addProductToWishList({{ $item->id }})"><i
                                                    class="fa fa-heart"></i></a></li>
                                    @else
                                        <li><a href="{{ route('login') }}" onclick="login()"><i
                                                    class="fa fa-heart"></i></a></li>
                                    @endif
                                    <li><a href="{{ route('product-detail', $item->slug) }}"><i
                                                class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h4 style="font-weight: bold"><a href="{{ route('product-detail', $item->slug) }}"
                                        style="font-size: 16px">{{ $item->name }}</a></h4>
                                <h6 style="font-weight: bold"><del>{{ number_format($item->price) }}VNĐ</del>
                                    {{ number_format($item->sale_price) }}VNĐ</h6>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- Related Product Section End -->
@endsection
@section('cus-css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
@endsection
@section('custom-js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

    <script>
        function addProductToWishList(id) {
            $.ajax({
                type: 'POST',
                url: "{{ route('WishList.store') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    product_id: id
                },
                success: function(data) {
                    if (data.status == 200) {
                        getWishlistCount();
                        toastr.success(data.message);
                        $('#wishlistadded').css({
                            "background-color": "#7fad39",
                            "color": "#fff"
                        });
                    }
                }
            })
        }

        function login() {
            toastr.success('Vui lòng đăng nhập để tiếp tục');
        }

        function getWishlistCount() {
            $.ajax({
                type: "GET",
                url: "{{ route('WishList.count') }}",
                success: function(data) {
                    $('.wishlist-count').html(data.wishlistCount)
                }
            })
        }

        $(function() {

            $("#rateYo").rateYo({
                rating: {{ $ratingAvg ? $ratingAvg : 0 }},
                normalFill: "#A0A0A0",
                ratedFill: "#ffff00"
            }).on("rateyo.set", function(e, data) {
                $('#rating_star').val(data.rating);
                $('#formRating').submit();
            });;

        });
        $(function() {

            $("#rateYo1").rateYo({
                rating: {{ $ratingAvg ? $ratingAvg : 0 }},
                normalFill: "#A0A0A0",
                ratedFill: "#ffff00"
            }).on("rateyo.set", function(e, data) {
                toastr.error("Bạn chưa đăng nhập vui lòng đăng nhập để đánh giá");
                setTimeout(() => {
                    window.location = "{{ route('login') }}"
                }, 1200);
            });;

        });
    </script>
    @if ($message = Session::get('success'))
        <script>
            toastr.success("{{ Session::get('success') }}");
        </script>
    @endif
@endsection
