@extends('customer.masterviewCustomer')
@section('main-content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{asset('Customer-assets')}}/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>{{$detail->name}}</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ route('index') }}">Home</a>
                            <a href="">{{$detail->category->name}}</a>
                            <span>{{$detail->name}}</span>
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
                                src="{{asset('storage/images')}}/{{$detail->image}}" alt="">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            <img data-imgbigurl="{{asset('storage/images')}}/{{$detail->image}}"
                            src="{{asset('storage/images')}}/{{$detail->image}}" alt="">
                            @foreach ($detail->images as $item)
                            <img data-imgbigurl="{{asset('storage/images')}}/{{$item->image}}"
                            src="{{asset('storage/images')}}/{{$item->image}}" alt="">
                            @endforeach
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h2>{{$detail->name}}</h2>  
                        <div class="d-flex "><h4 class="mt-2 pr-2"><del >{{number_format($detail->price)}}VNĐ  </h4> </del><h2 class="text-danger mt-1 ">  {{number_format($detail->sale_price)}} VNĐ</h2></div>
                        <div>{!!$detail->description!!}</div>
                        <div class="d-flex">
                            <form action="{{route('cart.add')}}"   method="POST">    
                                @csrf            
                                <input type="hidden" name="id" value="{{$detail->id}}">
                            <div class="product__details__quantity">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" value="1" name="quantity">
                                    </div>
                                </div>
                            </div>
                            <button  type="submit" class="primary-btn" >ADD TO CARD</button>
                            </form>
                            <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        </div>
                        <ul>
                            <li><label class="badge {{$detail->status?"badge-success":"badge-danger"}} ">{{$detail->status?"Còn hàng":"Hết hàng" }}</label></li>
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
                                    
                                    <p>{!!$detail->description!!}</p>
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
                        <div class="product__item__pic set-bg" data-setbg="{{asset('storage/images')}}/{{$item->image}}">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="{{ route('product-detail',$item->slug) }}"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                        <h4 style="font-weight: bold"><a href="{{ route('product-detail',$item->slug) }}" style="font-size: 16px">{{$item->name}}</a></h4>
                            <h6 style="font-weight: bold"><del>{{number_format($item->price)}}VNĐ</del>  {{number_format($item->sale_price)}}VNĐ</h6>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </section>
    <!-- Related Product Section End -->
@endsection