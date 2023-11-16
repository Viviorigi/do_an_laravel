@extends('customer.masterviewCustomer')
@section('main-content')
     <!-- Breadcrumb Section Begin -->
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
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__search">
                            <form action="#">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Recent News</h4>
                            <div class="blog__sidebar__recent">
                                @foreach ($latestBlog as $item)
                                <a href="{{ route('blog-detail',$item->slug) }}" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic">
                                        <img src="{{ asset('storage/images') }}/{{ $item->image }}" width="150px" alt="">
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h6>{{$item->name}}</h6>
                                        <span>{{date("d/m/Y", strtotime($item->created_at))}}</span>
                                    </div>
                                </a>
                                @endforeach  
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="row">
                        @foreach ($blog as $item)
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src="{{ asset('storage/images') }}/{{ $item->image }}" alt="">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i>{{date("d/m/Y", strtotime($item->created_at))}}</li>
                                    </ul>
                                    <h5><a href="{{ route('blog-detail',$item->slug) }}">{{$item->name}}</a></h5>
                                    <p>{!!$item->content!!}</p>
                                    <a href="{{ route('blog-detail',$item->slug) }}" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
@endsection