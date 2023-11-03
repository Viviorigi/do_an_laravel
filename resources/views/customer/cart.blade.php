@extends('customer.masterviewCustomer')
@section('main-content')
  
    <section class="breadcrumb-section set-bg" data-setbg="{{asset('Customer-assets')}}/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shopping Cart</span>
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
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">SubTotal</th>
                                    <th class="text-right"><a href="{{route('cart.clear')}}" onclick="return confirm('Ban chac chan muon xoa het khoi gio')"><span class="icon_close" style="font-size: 22px"></span></a></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart->list() as $item)
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="{{asset('storage')}}/images/{{$item['image']}}" alt="" width="200px">
                                        <h5>{{$item['name']}}</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        <h5 >{{number_format($item['price'])}}Đ</h5>
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty1">                                    
                                                <input type="number" name="quantity" class="qty" data-id="{{$item['product_id']}}" onchange="updateQuantity(this)"  value="{{$item['quantity']}}">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        {{number_format($item['price']*$item['quantity'])}}Đ
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <a href="{{route('cart.remove',$item['product_id'])}}"><span class="icon_close"></span></a>
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="{{route('products')}}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <a href="{{route('cart.index')}}" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Total 
                                @if ($cart->list() !='')
                                <span> {{number_format($cart->getTotalPrice())}} Đ</span>
                                @else
                                <span>0   Đ</span>
                                @endif
                                
                            
                            </li>
                            
                        </ul>
                        <a href="#" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
    <form action="{{route('cart.update')}}" method="POST" id="updateCartQty">
        @csrf
        <input type="hidden" name="id" id='id'>
        <input type="hidden" name="quantity" id='quantity'>
    </form>
@endsection

@section('custom-js')
    <script>
     function updateQuantity(qty){
        $('#id').val($(qty).data('id'));
        $('#quantity').val($(qty).val());
        $('#updateCartQty').submit();     
     }
    </script>
@endsection