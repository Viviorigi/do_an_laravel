<div style="width: 600px;margin:0 auto">
    <div style="text-align: center">
        <h2>Xin chào {{$customer->name}}</h2>
        <p>Email này giúp bạn lấy lại mật khẩu tài khoản đã bị quên</p>
        <p>Vui lòng click vào link dưới đây để đặt lại mật khẩu</p>
        <p>
            <a href="{{route('getnewpass',['id'=>$customer->id,'remember_token'=>$customer->remember_token])}}" style="display: inline-block;background:#57b846;
            color:#fff;padding: 7px 20px; font-weight: bold;text-decoration: none">Đặt lại mật khẩu</a>
        </p>
    </div>
</div>