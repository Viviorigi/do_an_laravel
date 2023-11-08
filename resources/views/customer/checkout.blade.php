@extends('customer.masterviewCustomer')
@section('main-content')
     <!-- Breadcrumb Section Begin -->
     <section class="breadcrumb-section set-bg" data-setbg="{{asset('Customer-assets')}}/img/banner.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Thanh toán</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ route('index') }}">Trang chủ</a>
                            <span>Thanh toán</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
            </div>
            <div class="checkout__form">
                <h4>Thông tin đơn hàng</h4>
                <form action="{{route('post.checkout')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p>Họ và Tên<span>*</span></p>
                                        @if (Auth::check() && Auth::user()->role == 0)
                                        <input type="text" name="name" placeholder="Điền họ và tên" value="{{ Auth::user()->name}}">
                                        @else
                                        <input type="text" name="name" placeholder="Điền họ và tên">
                                        @endif
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Địa chỉ<span>*</span></p>
                                @if (Auth::check() && Auth::user()->role == 0)
                                <input type="text" name="address" placeholder="Điền địa chỉ" class="checkout__input__add" value="{{ Auth::user()->address}}">
                                @else
                                <input type="text" name="address" placeholder="Điền địa chỉ" class="checkout__input__add">
                                @endif
                                    @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror 
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        @if (Auth::check() && Auth::user()->role == 0)
                                        <input type="text" name="email" placeholder="Điền email" value="{{ Auth::user()->email}}">
                                        @else
                                        <input type="text" name="email" placeholder="Điền email" >
                                        @endif
                                        @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror 
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Số điện thoại<span>*</span></p>
                                        @if(Auth::check() && Auth::user()->role == 0)
                                        <input type="text" name="phone" placeholder="Điền số điện thoại" value="{{ Auth::user()->phone}}">
                                        @else
                                        <input type="text" name="phone" placeholder="Điền số điện thoại">
                                        @endif

                                        @error('phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror 
                                    </div>
                                </div>
                      
                            </div>
                            <div class="checkout__input">
                                <p>Ghi chú<span>*</span></p>
                                <input type="text"
                                    placeholder="Điền bạn có yêu cầu gì thêm với shop" name="order_note">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Đơn hàng của bạn</h4>
                                <div class="checkout__order__products">Sản phẩm <span>Tổng giá</span> <span class="mr-3"> Số lượng</span></div>
                                <ul>
                                    @foreach ($cart->list() as $item)
                                        <li>{{$item['name']}} <span> {{number_format($item['price']*$item['quantity'])}}Đ</span> <span class="mr-3"> {{$item['quantity']}}</span></li>
                                    @endforeach
                                </ul>
                                <div class="checkout__order__subtotal">Phụ thu <span>0 Đ</span></div>
                                <div class="checkout__order__total">Tổng số tiền <span>{{number_format($cart->getTotalPrice())}} Đ</span></div>
                                <div class="form-group">
                                  <select class="form-control text-center" name="methodPayment" id="">
                                    <option value="0">Phương thức thanh toán</option>
                                    <option value="1">Thẻ tín dụng</option>
                                    <option value="2">Thanh toán khi nhận hàng</option>
                                  </select>
                                  @error('methodPayment')
                                  <span class="text-danger mt-2"> <strong>{{ $message }}</strong></span>
                                   @enderror 
                                </div>
                                <button type="submit" class="site-btn">Thanh toán</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
@endsection