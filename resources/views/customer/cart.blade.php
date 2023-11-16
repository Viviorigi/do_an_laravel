@extends('customer.masterviewCustomer')
@section('main-content')
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('Customer-assets') }}/img/banner.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Giỏ hàng</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ route('index') }}">Trang chủ</a>
                            <span>Giỏ hàng</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        @if ($message = Session::get('error'))
                            <div class="alert alert-warning alert-block">

                                <button type="button" class="close" data-dismiss="alert">×</button>

                                <strong>{{ $message }}</strong>

                            </div>
                        @endif
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Tên sản phẩm</th>
                                    <th class="text-center">Giá sản phẩm</th>
                                    <th class="text-center">Số lượng</th>
                                    <th class="text-center">Tổng Giá</th>
                                    <th class="text-right"><a href="{{ route('cart.clear') }}"
                                            onclick="return confirm('Ban chac chan muon xoa het khoi gio')"><span
                                                class="icon_close" style="font-size: 22px"></span></a></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($cart->list() as $item)
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="{{ asset('storage') }}/images/{{ $item['image'] }}" alt=""
                                            width="200px">
                                        <h5>{{ $item['name'] }}</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        <h5>{{ number_format($item['price']) }}Đ</h5>
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty1">
                                                <input type="number" name="quantity" class="qty"
                                                    data-id="{{ $item['product_id'] }}" onchange="updateQuantity(this)"
                                                    value="{{ $item['quantity'] }}">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        {{ number_format($item['price'] * $item['quantity']) }}Đ
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <a href="{{ route('cart.remove', $item['product_id']) }}"><span
                                                class="icon_close"></span></a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td style="border-bottom:none !important">
                                        <h4 >Giỏ hàng trống</h4>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="{{ route('products') }}" class="primary-btn cart-btn">Tiếp tục mua sắm</a>
                        <a href="{{ route('cart.index') }}" class="primary-btn cart-btn cart-btn-right"><span
                                class="icon_loading"></span>
                            Cập nhật giỏ hàng</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Mã giảm giá</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">Xác nhận</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Giỏ hàng</h5>
                        <ul>
                            <li>Tổng giá
                                @if ($cart->list() != '')
                                    <span> {{ number_format($cart->getTotalPrice()) }} Đ</span>
                                @else
                                    <span>0 Đ</span>
                                @endif


                            </li>

                        </ul>
                        <a href="{{ route('checkout') }}" class="primary-btn">Thanh toán ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <form action="{{ route('cart.update') }}" method="POST" id="updateCartQty">
        @csrf
        <input type="hidden" name="id" id='id'>
        <input type="hidden" name="quantity" id='quantity'>
    </form>
@endsection

@section('custom-js')
    <script>
        function updateQuantity(qty) {
            $('#id').val($(qty).data('id'));
            $('#quantity').val($(qty).val());
            $('#updateCartQty').submit();
        }
    </script>
    @if ($message = Session::get('success'))
    <script>
        toastr.success("{{ $message }}");
    </script>
    @endif
@endsection
