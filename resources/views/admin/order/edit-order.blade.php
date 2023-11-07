@extends('admin.masterview')
@section('title')
    Edit Category
@endsection

@section('main-content')
    <div class="col-lg-8  grid-margin stretch-card mt-5">
        <div class="col-lg-10 m-auto">
            <h2 class="mt-5">Edit Order</h2>
            <div class="">
                <form class="forms-sample" action="{{route('order.update',$order->id)}}" method="POST">
                    
                    @csrf
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">

                        <button type="button" class="close" data-dismiss="alert">×</button>

                        <strong>{{ $message }}</strong>

                    </div>
                @endif
                    <div class="form-group">
                        <label for="exampleInputUsername1">Customer Name</label>
                        <input type="text" class="form-control" name="name"  value="{{$order->cus->name}}" readonly />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">OrderNote</label>
                        <input type="text" class="form-control" name="order_note"  value="{{$order->order_note}}" readonly />
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Payment Method</label>
                        <select class="form-control js-example-basic-single" id="exampleSelectGender" name="methodPayment">   
                                <option value="1" {{$order->methodPayment==1?'selected':''}}>Thẻ tín dụng</option>
                                <option value="2" {{$order->methodPayment==2?'selected':''}}> Thanh toán khi nhận hàng</option>                             
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Status</label>
                        <select class="form-control js-example-basic-single" id="exampleSelectGender" name="Status">
                                <option value="0" {{$order->Status==0?'selected':''}}>Chờ xác nhận</option>
                                <option value="1" {{$order->Status==1?'selected':''}}>Đang chuẩn bị hàng</option>
                                <option value="2" {{$order->Status==2?'selected':''}}>Đang giao hàng</option>
                                <option value="3" {{$order->Status==3?'selected':''}}>Giao hàng thành công</option>
                        </select>
                    </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary mr-2"> EDIT</button>
                    <a href="{{route('order.index')}}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection