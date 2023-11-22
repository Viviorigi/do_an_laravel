@section('title')
Trang chủ
@endsection
@extends('customer.masterviewCustomer')
@section('load')
    {{-- <div id="preloder">
    <div class="loader"></div>
</div> --}}
@endsection
@section('cus-css')
    <style>
        .form-search {
            position: relative !important;
        }

        .search-ajax {
            position: absolute;
            top: 50px;
            background-color: #f1f1f1;
            z-index: 1000;
        }

        .search-ajax .media a {
            font-size: 18px;
            font-weight: bold;
        }

        .search-ajax .media h5 {
            font-size: 15px;
        }
    </style>
@endsection
@section('main-content')
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Danh mục</span>
                        </div>
                        <ul>
                            @foreach ($cate as $item)
                                <li><a href="{{ route('productsByCate', $item->slug) }}">{{ $item->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search w-100">
                        <div class="w-75 ">
                            <div class="hero__search__form ">
                                <form action="{{ route('productseach') }}" class="form-search" method="POST">
                                    @csrf
                                    <i class="fa fa-search" style="position: absolute;top:30%;left:3%;"></i>
                                    <input class="pl-5 input-search-ajax" type="text" placeholder="nhập tên sản phẩm"
                                        name="keyword" autocomplete="off">
                                    <button type="submit" class="site-btn">Tìm Kiếm</button>
                                </form>
                            </div>
                            <div class="search-ajax w-50">

                            </div>
                        </div>
                        <div class="hero__search__phone w-25 pl-2 d-none d-lg-block d-md-block">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text ">
                                <p>+84 981-673-718</p>
                                <span>Hỗ trợ 24/7</span>
                            </div>
                        </div>
                    </div>
                    <div class="hero__item p-4 set-bg">
                        <div class="banner__slider owl-carousel">
                            @foreach ($banner as $item)
                                <div class="w-100">
                                    <div class="categories__item_banner set-bg"
                                        data-setbg="{{ asset('storage/images') }}/{{ $item->image }}">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    @foreach ($cate as $item)
                        <div class="col-lg-3">
                            <div class="categories__item set-bg"
                                data-setbg="{{ asset('storage/images') }}/{{ $item->image }}">
                                <h5><a class="bg-light" href="{{ route('productsByCate', $item->slug) }}">{{ $item->name }}</a></h5>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Sản phẩm mới nhất</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">Tất cả</li>
                            @foreach ($cate as $item)
                                <li data-filter=".{{ $item->slug }}">{{ $item->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                @foreach ($latestProduct as $item)
                    <div class="col-lg-3 col-md-4 col-sm-6 mix {{ $item->category->slug }}">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg"
                                data-setbg="{{ asset('storage/images') }}/{{ $item->image }}">
                                <ul class="featured__item__pic__hover">
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
                            <div class="featured__item__text">
                                <h6><a href="{{ route('product-detail', $item->slug) }}">{{ $item->name }}</a></h6>
                                <div class="d-flex justify-content-around">
                                    <h6 style="line-height: 1.25rem"><del>{{ number_format($item->price) }}VNĐ</del> </h6>
                                    <h5> {{ number_format($item->sale_price) }}VNĐ</h5>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row w-100">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{ asset('Customer-assets') }}/img/banner/banner-1.png" class="w-100" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{ asset('Customer-assets') }}/img/banner/banner-2.jpg" class="w-100" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>Bài viết nổi bật</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($latestBlog as $item)
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{ asset('storage/images') }}/{{ $item->image }}" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> {{date("d/m/Y", strtotime($item->created_at))}}</li>
                            </ul>
                            <h5><a href="{{ route('blog-detail',$item->slug) }}">{{$item->name}}</a></h5>
                            {!! Str::limit($item->content,50) !!}
                            <a href="{{ route('blog-detail',$item->slug) }}" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@section('custom-js')
    <script>
        $('.search-ajax').hide();
        $('.input-search-ajax').keyup(function() {
            var _text = $(this).val();

            var _url = "{{ url('storage/images') }}"
            if (_text != '') {
                $.ajax({
                    url: "{{ route('ajaxSearchProduct') }}?keyword=" + _text,
                    type: 'GET',
                    success: function(res) {
                        $('.search-ajax').show();
                        $('.search-ajax').html(res);
                    }
                });
            } else {
                $('.search-ajax').html('');
                $('.search-ajax').hide();
            }
        })
    </script>
    @if ($message = Session::get('success'))
        <script>
            toastr.success("{{ Session::get('success') }}");
        </script>
    @endif
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
