<div style="width: 600px;margin: 0 auto">
    <div style="text-align: center">
        <h2>Xin chào {{ $cus->name }}</h2>
        <p>Cảm ơn bạn đã đặt đơn hàng này tại cửa hàng chúng tôi,vui lòng kiểm tra thông tin đơn hàng </p>

    </div>
            <h3>Người đặt hàng: {{ $cus->name }}</h3>
            <h3>Email:  {{ $cus->email }}</h3>
            <h3>Số điện thoại:  {{ $cus->phone }}</h3>
            <h3>Địa chỉ:  {{ $cus->address }}</h3>
            <table border="1" cellspacing="0" cellpadding="10" style="width=100%">
                <thead>
                    <tr>
                        <td>STT</td>
                        <td>Tên sp</td>
                        <td>Số lượng</td>
                        <td>Giá</td>
                        <td>Thành tiền</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->details as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->product->name}}</td>
                        <td>{{$item->quantity}}</td>
                        <td>{{number_format($item->product->sale_price?$item->product->sale_price:$item->product->price)}}VNĐ</td>
                        <td>{{number_format($item->total_price)}}VNĐ</td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
            <h3>Vui lòng để ý điện thoại chúng tôi sẽ liên hệ xác nhận đơn hàng và khi giao hàng</h3>
</div>
