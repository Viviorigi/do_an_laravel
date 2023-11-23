@extends('customer.masterviewCustomer')
@section('title')
    Sản phẩm
@endsection
@section('main-content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('Customer-assets') }}/img/banner.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Sản phẩm</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ route('index') }}">Trang chủ</a>
                            <span>Sản phẩm</span>
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
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Danh mục</h4>
                            <ul>
                                @foreach ($cate as $item)
                                    <h2><a href="{{ route('productsByCate', $item->slug) }}">{{ $item->name }}</a></h2>
                                @endforeach
                            </ul>
                        </div>
                        <div class="sidebar__item">
                            <h4>Giá</h4>
                            <div class="price-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                    data-min="10" data-max="540">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                </div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <form action="" method="GET">

                                            <div class="d-flex">
                                                <input type="text" id="minamount" name="minprice">
                                                <input type="text" id="maxamount" name="maxprice">
                                            </div>
                                            <button type="submit" class="btn btn-success mt-2 ">Lọc giá sản phẩm</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Sản phẩm mới nhất</h4>
                                <div class="latest-product__slider owl-carousel">
                                    <div class="latest-prdouct__slider__item">
                                        @foreach ($latestProduct as $item)
                                            <a href="{{ route('product-detail', $item->slug) }}"
                                                class="latest-product__item row">
                                                <div class="latest-product__item__pic col-6">
                                                    <img class="latest-img"
                                                        src="{{ asset('storage/images') }}/{{ $item->image }}"
                                                        alt="">
                                                </div>
                                                <div class="latest-product__item__text col-6">
                                                    <h6>{{ $item->name }}</h6>
                                                    @if ($item->sale_price > 0)
                                                        <span>{{ number_format($item->sale_price) }}VNĐ</span>
                                                    @else
                                                        <span>{{ number_format($item->price) }}VNĐ</span>
                                                    @endif
                                                    
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="product__discount">
                        <div class="section-title">
                            <h2>{{ $cate_slug->name }}</h2>
                        </div>
                    </div>
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Sắp xếp</span>
                                    <select onchange="location = this.value;">
                                        <option>Sắp xếp</option>
                                        <option
                                            value="{{ Route('productsByCate', ['slug' => $slug, 'minprice' => Request::get('minprice'), 'maxprice' => Request::get('maxprice'), 'sort' => 'name_asc']) }}"
                                            {{ Request::get('sort') == 'name_asc' ? 'selected' : '' }}>A-Z </option>
                                        <option
                                            value="{{ Route('productsByCate', ['slug' => $slug, 'minprice' => Request::get('minprice'), 'maxprice' => Request::get('maxprice'), 'sort' => 'name_desc']) }}"
                                            {{ Request::get('sort') == 'name_desc' ? 'selected' : '' }}> Z-a</option>
                                        <option
                                            value="{{ Route('productsByCate', ['slug' => $slug, 'minprice' => Request::get('minprice'), 'maxprice' => Request::get('maxprice'), 'sort' => 'price_asc']) }}"
                                            {{ Request::get('sort') == 'price_asc' ? 'selected' : '' }}>Giá tăng dần
                                        </option>
                                        <option
                                            value="{{ Route('productsByCate', ['slug' => $slug, 'minprice' => Request::get('minprice'), 'maxprice' => Request::get('maxprice'), 'sort' => 'price_desc']) }}"
                                            {{ Request::get('sort') == 'price_desc' ? 'selected' : '' }}>Giá Giảm dần
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($product as $item)
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg"
                                            data-setbg="{{ asset('storage/images') }}/{{ $item->image }}">
                                            <div class="@if ($item->sale_price >0)
                                                d-block
                                            @else
                                                d-none
                                            @endif"
                                                style="height: 45px;width: 45px;background: #dd2222;border-radius: 50%;font-size: 14px;color: #ffffff;line-height: 45px;text-align: center;position: absolute;left: 15px;top: 15px;">
                                                -{{ ceil((1 - $item->sale_price / $item->price) * 100) }}%</div>
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
                                            <a href="{{ route('product-detail', $item->slug) }}">
                                                <h4>{{ $item->name }}</h4>
                                            </a>
                                            @if ($item->sale_price > 0)
                                                <h5>{{ number_format($item->sale_price) }}VNĐ <del
                                                        style="font-size: 14px">{{ number_format($item->price) }}VNĐ</del>
                                                </h5>
                                            @else
                                                <h5>{{ number_format($item->price) }}VNĐ</h5>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="">
                            {{ $product->links() }}
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- Product Section End -->
@endsection
@section('custom-js')
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
    </script>
@endsection
