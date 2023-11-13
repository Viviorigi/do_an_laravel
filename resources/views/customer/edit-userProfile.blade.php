@extends('customer.masterviewCustomer')
@section('cus-css')
    <style>
      body{margin-top:20px;}
.avatar{
width:200px;
height:200px;
}		
    </style>
@endsection
@section('main-content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{asset('Customer-assets')}}/img/banner.png">
  <div class="container">
      <div class="row">
          <div class="col-lg-12 text-center">
              <div class="breadcrumb__text">
                  <h2>Cập nhật Thông tin</h2>
                
              </div>
          </div>
      </div>
  </div>
</section>
<!-- Breadcrumb Section End -->
<section style="background-color: #eee;">
  <div class="container bootstrap snippets bootdey card">
    <h1 class="text-primary p-3">Cập nhật thông tin</h1>
      <hr>
	<div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" class="avatar img-circle img-thumbnail" alt="avatar">
          <h6>Upload a different photo...</h6>
          
          <input type="file" class="form-control">
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <h3>Personal info</h3>
        
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-lg-3 control-label">Tên:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="dey-dey">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Số điện thoại</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="bootdey">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Địa chỉ</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="">
            </div>
          </div>
          <button type="submit" class="btn btn-success m-3">Cập nhật thông tin</button>
        </form>
      </div>
  </div>
</div>
<hr>
  </section>
@endsection