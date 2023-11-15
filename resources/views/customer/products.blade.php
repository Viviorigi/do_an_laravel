@extends('customer.masterviewCustomer')
@section('main-content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{asset('Customer-assets')}}/img/banner.png">
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
                                <h2><a href="#">{{$item->name}}</a></h2>
                                @endforeach
                            </ul>
                        </div>
                        <div class="sidebar__item">
                            <h4>Price</h4>
                            <div class="price-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                    data-min="10" data-max="540">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                </div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <form action="{{route('productsfilterbyprice')}}" method="POST">
                                            @csrf
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
                                <h4>Latest Products</h4>
                                <div class="latest-product__slider owl-carousel">
                                    <div class="latest-prdouct__slider__item">
                                        @foreach ($latestProduct as $item)
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img class="latest-img" src="{{asset('storage/images')}}/{{$item->image}}" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>{{$item->name}}</h6>
                                                <span>{{number_format($item->sale_price)}}VNĐ</span>
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
                        <div class="section-title product__discount__title">
                            <h2>Sale Off</h2>
                        </div>
                        <div class="row">
                            <div class="product__discount__slider owl-carousel">
                                @foreach ($product as $item)
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="{{asset('storage/images')}}/{{$item->image}}">
                                            <div class="product__discount__percent">-{{ceil((1-($item->sale_price/$item->price))*100)}}%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="{{ route('product-detail',$item->slug) }}"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            
                                            <a href="{{ route('product-detail',$item->slug) }}"><h5>{{$item->name}}</h5></a>
                                            <div class="product__item__price">{{number_format($item->sale_price)}} VNĐ <span>{{number_format($item->price)}} VNĐ</span></div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Sort By</span>
                                    <select onchange="location = this.value;">
                                        <option value="{{URL::current()}}?sort=name_asc" {{(Request::get('sort')=='name_asc')?'selected':''}}>A-Z </option>
                                        <option value="{{URL::current()}}?sort=name_desc" {{(Request::get('sort')=='name_desc')?'selected':''}} > Z-a</option>
                                        <option value="{{URL::current()}}?sort=price_asc" {{(Request::get('sort')=='price_asc')?'selected':''}} >Giá tăng dần </option>
                                        <option value="{{URL::current()}}?sort=price_desc" {{(Request::get('sort')=='price_desc')?'selected':''}}>Giá Giảm dần </option>
                                    </select>
                                </div>
                            </div>
                            {{-- <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><span>16</span> Products found</h6>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <div class="row">
                        @foreach ($product as $item)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{asset('storage/images')}}/{{$item->image}}">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="{{ route('product-detail',$item->slug) }}"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <a href="{{ route('product-detail',$item->slug) }}" ><h4>{{$item->name}}</h4></a>
                                    <h5>{{number_format($item->sale_price)}}VNĐ <del style="font-size: 14px">{{number_format($item->price)}}VNĐ</del></h5>
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