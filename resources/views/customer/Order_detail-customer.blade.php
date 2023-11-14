@extends('customer.masterviewCustomer')
@section('main-content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('Customer-assets') }}/img/banner.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Thông tin Khách Hàng</h2>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('userProfile', $customer->id) }}">Customer</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Order Detail</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="row px-3">
                        <div class="bg-white w-100">
                            <h2 class="text-center p-3"><strong>Chi tiết đơn hàng</strong></h2>
                            <table class="table table-hover table-responsive-md">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col">Mã đơn hàng</th>
                                        <th scope="col">Tên sản phẩm</th>
                                        <th scope="col">Ảnh sản phẩm</th>
                                        <th scope="col">Giá sản phẩm</th>
                                        <th scope="col">Số lượng</th>
                                        <th scope="col">Tạm Tính</th>
                                        <th scope="col">Ngày Đặt Hàng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($detail as $item)
                                        <tr>
                                            <td style="line-height: 120px">{{ $loop->iteration }}</td>
                                            <td style="line-height: 120px">{{ $item->order_id }}</td>
                                            <td style="line-height: 120px">{{ $item->product->name }}</td>
                                            <td><img src="{{ asset('storage') }}/images/{{ $item->product->image }}"
                                                    style="width:100px !important;height:120px !important"></td>
                                            <td style="line-height: 120px">
                                                {{ number_format($item->product->sale_price > 0 ? $item->product->sale_price : $item->product->price) }}Đ
                                            </td>
                                            <td style="line-height: 120px">{{ $item->quantity }}</td>
                                            <td style="line-height: 120px">{{ number_format($item->total_price) }}Đ</td>
                                            <td style="line-height: 120px">
                                                {{ date('d/m/Y', strtotime($item->created_at)) }}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-between">
                                @if ($order->Status == 0)
                                    <div>
                                        <h4 class="p-5">Trạng thái đơn hàng: Chờ xác nhận</h4>                 
                                            <button type="button" class="btn btn-danger ml-5 mb-5" data-toggle="modal" data-target="#exampleModal">
                                                Hủy đơn hàng
                                            </button>
                                    </div>
                                @elseif($order->Status == 1)
                                    <h4 class="p-5"> Trạng thái đơn hàng: <strong>Đang chuẩn bị hàng</strong></h4>
                                @elseif($order->Status == 2)
                                    <h4 class="p-5">Trạng thái đơn hàng: <strong>Đang chờ đơn vị vận chuyển</strong></h4>
                                @elseif($order->Status == 3)
                                    <h4 class="p-5">Trạng thái đơn hàng: <strong>Đang giao hàng</strong></h4>
                                @elseif($order->Status == 4)
                                    <h4 class="p-5">Trạng thái đơn hàng: <strong class="text-warning">Giao hàng thành
                                            công</strong></h4>
                                @elseif($order->Status == 5)
                                    <h4 class="p-5">Trạng thái đơn hàng: <strong class="text-danger">Đã hủy đơn
                                            hàng</strong></h4>
                                @endif
                                <h4 class="p-5"><strong>Tổng tiền: {{ number_format($total_price) }} VNĐ</strong></h4>
                            </div>

                        </div>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hủy đơn hàng</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                       Bạn có chắc chắn muốn hủy đơn hàng?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
                                        <a href="{{ route('cancelorder', $order->id) }}"class="btn btn-danger">Có</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
