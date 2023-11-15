<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('Customer-assets')}}/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('Customer-assets')}}/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('Customer-assets')}}/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="{{asset('Customer-assets')}}/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="{{asset('Customer-assets')}}/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('Customer-assets')}}/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('Customer-assets')}}/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('Customer-assets')}}/css/style.css" type="text/css">

    {{-- Css account  --}}
   
        <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
        <link rel="stylesheet" type="text/css" href="{{asset('account')}}/vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="{{asset('account')}}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="{{asset('account')}}/vendor/animate/animate.css">
        <link rel="stylesheet" type="text/css" href="{{asset('account')}}/vendor/css-hamburgers/hamburgers.min.css">
        <link rel="stylesheet" type="text/css" href="{{asset('account')}}/vendor/animsition/css/animsition.min.css">
        <link rel="stylesheet" type="text/css" href="{{asset('account')}}/vendor/select2/select2.min.css">
        <link rel="stylesheet" type="text/css" href="{{asset('account')}}/vendor/daterangepicker/daterangepicker.css">
        <link rel="stylesheet" type="text/css" href="{{asset('account')}}/css/util.css">
        <link rel="stylesheet" type="text/css" href="{{asset('account')}}/css/main.css">  
        @yield('cus-css')
</head>

<body>
    <!-- Page Preloder -->
    @yield('load')

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="{{ route('index') }}"><img class="logo-img" src="{{asset('Customer-assets')}}/img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                @if (Auth::check() && Auth::user()->role == 0)
                <li>
                    <a href="{{route('userProfile',Auth::user()->id)}}">Xin chào {{Auth::user()->name}}<i class="fa fa-user"></i></a>
                    <a href="{{route('logout')}}"><strong> | Đăng xuất</strong></a>
                </li>  
                @else
                <li><a href="{{route('login')}}"> <strong>Đăng nhập</strong><i class="fa fa-user"></i></a></li>
                @endif
                
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="{{route('cart.index')}}"><i class="fa fa-shopping-bag"></i> <span>{{$cart->getTotalQuantity()}}</span></a></li>
            </ul>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="{{ route('index') }}">Trang chủ</a></li>
                <li><a href="{{ route('products') }}">Sản phẩm</a></li>
                <li><a href="{{ route('blog') }}">Blog</a></li>
                <li><a href="{{ route('contact') }}">Liên hệ</a></li>
                <li><a href="{{ route('about') }}">Về chúng tôi</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> mkccl1810@gmail.com</li>
                <li><a href="{{ route('contact') }}">Free ship trong bán kính 10km</a></li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->
   
    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> mkccl1810@gmail.com</li>
                                <li><a href="{{ route('contact') }}">Free ship trong bán kính 10km</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="color-nav">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="header__logo">
                            <a href="{{ route('index') }}"><img class="logo-img" src="{{asset('Customer-assets')}}/img/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <nav class="header__menu">
                            <ul>
                                    <li class="active"><a href="{{ route('index') }}">Trang chủ</a></li>
                                    <li><a href="{{ route('products') }}">Sản phẩm</a></li>
                                    <li><a href="{{ route('blog') }}">Blog</a></li>
                                    <li><a href="{{ route('contact') }}">Liên hệ</a></li>
                                    <li><a href="{{ route('about') }}">Giới thiệu</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-3 d-lg-block d-none">
                        <div class="header__cart">
                            <ul>
<<<<<<< HEAD
                                @if (Auth::check() && Auth::user()->role == 0)
                                        <span>{{Auth::user()->name}}</span>                    
                                        <li>gi
                                            <a href="{{route('userProfile',Auth::user()->id)}}"><i class="fa fa-user"></i></a>
=======
                                @if (Auth::check() && Auth::user()->role == 0)                   
                                        <li>
                                            <a href="{{route('userProfile',Auth::user()->id)}}">{{Auth::user()->name}}<i class="fa fa-user"></i></a>
>>>>>>> 2ec7708e921b63d694fee5b3216aab9ebab280b6
                                            <a href="{{route('logout')}}"><strong> | Đăng xuất</strong></a>
                                        </li>                                                   
                                @else
                                <li><a href="{{route('login')}}"> <strong>Đăng nhập</strong> <i class="fa fa-user"></i></a></li>
                                @endif                    
                            </ul>
                            <ul>
                                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                                <li><a href="{{route('cart.index')}}"><i class="fa fa-shopping-bag"></i> <span>{{$cart->getTotalQuantity()}}</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="humberger__open">
                    <i class="fa fa-bars"></i>
                </div>
        </div>
    </header>

    @yield('main-content')

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="{{ route('index') }}"><img class="logo-img" src="{{asset('Customer-assets')}}/img/logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Địa chỉ: Tòa Nhà HTC, 250 Hoàng Quốc Việt, Cổ Nhuế, Cầu Giấy, Hà Nội, Việt Nam</li>
                            <li>Điện Thoại: +84 981-673-718</li>
                            <li>Email: mkccl1810@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Dấu trang</h6>
                        <ul>
                            <li><a href="#">Về chúng tôi</a></li>
                            <li><a href="#">Tính an toàn mau sắm</a></li>
                            <li><a href="#">Thông tin giao hàng</a></li>
                            <li><a href="#">Điều khoản dịch vụ</a></li>
                            <li><a href="#">Địa chỉ trên bản đồ</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Dịch vụ</a></li>
                            <li><a href="{{ route('contact') }}">Liên hệ</a></li>
                            <li><a href="#">Góp ý</a></li>
                            <li><a href="#">Xác minh kinh doanh</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Tham gia với chúng tôi</h6>
                        <p>Gửi email để nhận ưu đãi</p>
                        <form action="#">
                            <input type="text" placeholder="Điền email vào đây">
                            <button type="submit" class="site-btn">Đăng ký</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> <i class="fa fa-heart" aria-hidden="true"></i> by <a href="{{ route('index') }}" target="_blank">Bigbite</a></p></div>
                        <div class="footer__copyright__payment"><img src="{{asset('Customer-assets')}}/img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->
    
    <!-- Js Plugins -->
    <script src="{{asset('Customer-assets')}}/js/jquery-3.3.1.min.js"></script>
    <script src="{{asset('Customer-assets')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('Customer-assets')}}/js/jquery.nice-select.min.js"></script>
    <script src="{{asset('Customer-assets')}}/js/jquery-ui.min.js"></script>
    <script src="{{asset('Customer-assets')}}/js/jquery.slicknav.js"></script>
    <script src="{{asset('Customer-assets')}}/js/mixitup.min.js"></script>
    <script src="{{asset('Customer-assets')}}/js/owl.carousel.min.js"></script>
    <script src="{{asset('Customer-assets')}}/js/main.js"></script>
    
    {{-- account js --}}
    {{-- <script src="{{asset('account')}}/vendor/jquery/jquery-3.2.1.min.js"></script> --}}
	<script src="{{asset('account')}}/vendor/animsition/js/animsition.min.js"></script>
	<script src="{{asset('account')}}/vendor/bootstrap/js/popper.js"></script>
	<script src="{{asset('account')}}/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="{{asset('account')}}/vendor/select2/select2.min.js"></script>
	<script src="{{asset('account')}}/vendor/daterangepicker/moment.min.js"></script>
	<script src="{{asset('account')}}/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="{{asset('account')}}/vendor/countdowntime/countdowntime.js"></script>
	<script src="{{asset('account')}}/js/main.js"></script>
    @yield('custom-js')
   
</body>

</html>