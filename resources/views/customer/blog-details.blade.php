@extends('customer.masterviewCustomer')
@section('main-content')
    <!-- Blog Details Hero Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{asset('Customer-assets')}}/img/banner.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Blog</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ route('index') }}">Trang chủ</a>
                            <span>Blog</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Hero End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
                <div class="order-md-1 order-1">
                    <h3 class="text-center">{{$blogdetail->name}}</h3>
                    <div class="blog__details__text mt-5 w-100">
                        <div class="w-100 d-flex justify-content-center mb-4" style="height: 500px">
                            <img src="{{ asset('storage/images') }}/{{ $blogdetail->image }}" class="w-75"  alt="">
                        </div>
                        {!!$blogdetail->content!!}
                    </div>
                </div>
    </section>
    <!-- Blog Details Section End -->

    <!-- Related Blog Section Begin -->
    <section class="related-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related-blog-title">
                        <h2>Post You May Like</h2>
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
                                    <p>{!! Str::limit($item->content,50) !!}</p>
                                </div>
                            </div>
                        </div>
                @endforeach  
            </div>
        </div>
    </section>
    <!-- Related Blog Section End -->
@endsection