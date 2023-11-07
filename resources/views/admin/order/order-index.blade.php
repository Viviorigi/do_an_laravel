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
                    <li class="nav-item nav-search border-0 ml-1 ml-md-3 ml-lg-5 d-none d-md-flex">
                        <form class="nav-link form-inline mt-2 mt-md-0" method="GET" action="{{route('category.find')}}">
                           
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search" name="keyword" value="{{Request::get('keyword')}}" />
                                <div class="input-group-append">
                                    <button type="submit" class="input-group-text">

                                        <i class="mdi mdi-magnify"></i>

                                    </button>

                                </div>
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
                            <th>Name</th>                          
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
                                <label class="badge">Đang giao hàng</label>
                                @elseif($item->Status==3)
                                <label class="badge">Giao hàng thành công</label>
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
