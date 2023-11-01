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
                    <a href="">Hello {{Auth::user()->name}}<i class="fa fa-user"></i></a>
                    <a href="{{route('logout')}}"><strong> | Logout</strong></a>
                </li>  
                @else
                <li><a href="{{route('login')}}"> <strong>Login</strong><i class="fa fa-user"></i></a></li>
                @endif
                
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="{{route('cart.index')}}"><i class="fa fa-shopping-bag"></i> <span>{{$cart->getTotalQuantity()}}</span></a></li>
            </ul>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="{{asset('Customer-assets')}}/img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="{{ route('index') }}">Home</a></li>
                <li><a href="./shop-grid.html">Shop</a></li>
                <li><a href="{{ route('blog') }}">Blog</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
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
                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                <li>Free Shipping for all Order of $99</li>
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
                                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                                <li>Free Shipping for all Order of $99</li>
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
                            <div class="header__top__right__language">
                                <img src="{{asset('Customer-assets')}}/img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>    
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{ route('index') }}"><img class="logo-img" src="{{asset('Customer-assets')}}/img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul class="w-100">
                            <li class="active"><a href="{{ route('index') }}">Home</a></li>
                            <li><a href="{{ route('products') }}">Shop</a></li>
                            <li><a href="{{ route('blog') }}">Blog</a></li>
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                            
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            @if (Auth::check() && Auth::user()->role == 0)
                                                          
                                    <li>
                                        <a href="">Hello {{Auth::user()->name}}<i class="fa fa-user"></i></a>
                                        <a href="{{route('logout')}}"><strong> | Logout</strong></a>
                                    </li>                            
                                                 
                            @else
                            <li><a href="{{route('login')}}"> <strong>Login</strong> <i class="fa fa-user"></i></a></li>
                            @endif                    
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
                            <li>Address: 60-49 Road 11378 New York</li>
                            <li>Phone: +65 11.188.888</li>
                            <li>Email: hello@colorlib.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
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
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p></div>
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