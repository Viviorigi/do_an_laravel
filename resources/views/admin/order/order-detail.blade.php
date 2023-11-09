@extends('admin.masterview')
@section('title')
    Order
@endsection

@section('main-content')
    <div class="col-lg-12 mt-5 grid-margin stretch-card">
        <br>

        <div class="card mt-5">
            <div class="table-responsive">
                <div class="mt-1 d-flex">
                   
                </div>
                <div class="m-2 d-flex justify-content-lg-between justify-content-md-around ">
                    <a href="{{route('order.index')}}" class="btn btn-primary ml-3">Back</a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>OrderID</th>   
                            <th>Product Name</th>   
                            <th>Product Image</th>
                            <th>Product Price</th>
                            <th>Quantity</th>   
                            <th>Subtotal</th>                
                            <th>Created</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detail as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->order_id}}</td>
                            <td>{{$item->product->name}}</td>
                            <td><img src="{{asset('storage')}}/images/{{$item->product->image}}" style="width:100px !important;height:120px !important"></td>
                            <td>{{number_format(($item->product->sale_price>0)
                            ?$item->product->sale_price:$item->product->price)}}Đ</td>   
                            <td>{{$item->quantity}}</td>         
                            <td>{{number_format($item->total_price)}}Đ</td>
                            <td>{{date("d/m/Y", strtotime($item->created_at))}}</td>
                                                   
                        </tr>
                        @endforeach
                        
                      
                    </tbody>
                </table>

               
            </div>
        </div>
    </div>
    </div>
@endsection
