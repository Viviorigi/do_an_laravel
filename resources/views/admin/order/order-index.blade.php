@extends('admin.masterview')
@section('title')
    Order
@endsection

@section('main-content')
    <div class="col-lg-12 mt-5 grid-margin stretch-card">
        <br>

        <div class="card mt-5">
            <h2 class="ml-3 mt-2"><strong>Order news</strong></h2>
            <div class="table-responsive">
                <div class="mt-1 d-flex">
               
                        <form class="nav-link form-inline mt-2 mt-md-0" method="GET" action="{{route('order.find')}}" class="form-inline">
                           
                           <div class="d-flex">
                            <div class="form-group">       
                                <input type="date" class="form-control" name="date_from" id="">
                            </div>
                            <div class="form-group">       
                                <input type="date" class="form-control" name="date_to" id="">
                            </div>
                            <button class="btn btn-success">Tìm kiếm</button>
                           </div>
                           
                        </form>
                    </li>                 
                </div>
                <table class="table">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">

                            <button type="button" class="close" data-dismiss="alert">×</button>

                            <strong>{{ $message }}</strong>

                        </div>
                    @endif
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>CustomerName</th>                          
                            <th>Created</th>
                            <th>Status</th>
                            <th>Payment Method</th>
                            <th>Order Note</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->cus->name}}</td>               
                            <td>{{date("d/m/Y", strtotime($item->created_at))}}</td>
                            <td>
                                @if ($item->Status==0)
                                <label class="badge">Chờ xác nhận</label>
                                @elseif($item->Status==1)
                                <label class="badge">Đang chuẩn bị hàng</label>
                                @elseif($item->Status==2)
                                <label class="badge">Đang chờ đơn vị vận chuyển</label>
                                @elseif($item->Status==3)
                                <label class="badge">Đang giao hàng</label>
                                @elseif($item->Status==4)
                                <label class="badge">Giao hàng thành công</label>
                                @elseif($item->Status==5)
                                <label class="badge">Đã hủy</label>
                                @endif
                                
                            </td>
                            <td>
                                <label class="badge badge-success">{{($item->methodPayment==1)?"Thẻ tín dụng":"Thanh toán khi nhận hàng"}}</label>
                            </td>    
                            <td>
                                <label class="badge">{{$item->order_note}}</label>
                            </td> 
                            <td >
                                <a href="{{route('order.edit',$item->id)}}" class="btn btn-primary"> Edit</a>
                                <a href="{{route('order.detail',$item->id)}}" class="btn btn-success">Detail</a>
                            </td>                         
                        </tr>
                        @endforeach
                        
                      
                    </tbody>
                </table>
                <div class="mt-3 m-4"> 
                    {{ $order->links() }}
                </div>
               
            </div>
        </div>
    </div>
    </div>
@endsection
