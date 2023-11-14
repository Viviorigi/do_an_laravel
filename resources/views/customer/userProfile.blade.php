@extends('customer.masterviewCustomer')
@section('main-content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{asset('Customer-assets')}}/img/banner.png">
  <div class="container">
      <div class="row">
          <div class="col-lg-12 text-center">
              <div class="breadcrumb__text">
                  <h2>Thông tin</h2>
                
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
              <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="#">User</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{Auth::user()->name}}</li>
            </ol>
          </nav>
        </div>
      </div>
  
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
            @if ($user->image !='')
            <img src="{{asset('storage/images')}}/{{$user->image}}" alt="avatar"
            class=" img-fluid mb-2" style="width: 150px;">
            @else
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
            class=" img-fluid mb-2" style="width: 150px;">
            @endif
                <div class="mb-2 mt-2">
                  <label for="photo">Khách hàng</label>
                  <h4>{{$user->name}}</h4>
                </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8">     
          <div class="card mb-4">
            <h4 class="text-center p-2">Thông tin khách hàng</h4>
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">

                <button type="button" class="close" data-dismiss="alert">×</button>

                <strong>{{ $message }}</strong>

            </div>
        @endif
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Full Name</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$user->name}}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$user->email}}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Address</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$user->address}}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Phone</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$user->phone}}</p>
                </div>
              </div>
              <hr>
              <div class="row justify-content-between">
                <a href="{{route('changePassword.index',$user->id)}}" class="btn btn-warning btn-lg">
                  Đổi mật khẩu
                </a>
                  <a href="{{route('editProfile',$user->id)}}"  class="btn btn-success btn-lg" >
                    Cập nhật thông tin
                  </a>              
                <!-- Modal -->    
                <div class="modal fade" id="modelId2" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <form method="POST" action="" class=" p-4">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Tên</label>
                                <input type="password" name="passwordOld" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >    
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Email</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" >
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Địa chỉ</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" >
                              </div>
                              <button type="button" class="btn btn-success">Đổi ngay</button>
                            </form>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                      </div>
                  </div>
              </div>
              </div>
            </div>
          </div>
          <div class="row px-3">
            <div class="bg-white w-100">
                <table class="table table-hover">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Phương thức thanh toán</th>
                    <th scope="col">Trạng thái đơn hàng</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($user->order_list as $item)
                  <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{($item->methodPayment==1)?"Thẻ tín dụng":"Thanh toán khi nhận hàng"}}</td>
                    @if ($item->Status==0)
                                <td >Chờ xác nhận</td>
                                @elseif($item->Status==1)
                                <td >Đang chuẩn bị hàng</td>
                                @elseif($item->Status==2)
                                <td >Đang chờ đơn vị vận chuyển</td>
                                @elseif($item->Status==3)
                                <td >Đang giao hàng</td>
                                @elseif($item->Status==4)
                                <td >Giao hàng thành công</td>
                                @elseif($item->Status==5)
                                <td >Đã hủy</td>
                                @endif
                  </tr>
                  @endforeach
                  
                </tbody>
              </table>
            </div>
              
        </div>
        </div>
      </div>
    </div>
  </section>
@endsection