@section('title')
Về chúng tôi
@endsection
@extends('customer.masterviewCustomer')
@section('main-content')
     <!-- Breadcrumb Section Begin -->
     <section class="breadcrumb-section set-bg" data-setbg="{{asset('Customer-assets')}}/img/banner.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Về chúng tôi</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ route('index') }}">Trang chủ</a>
                            <span>Về chung tôi</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- about Section Begin -->
    <div class="bg-white">
        <div class="container py-5">
          <div class="row h-100 align-items-center py-5">
            <div class="col-lg-6">
              <h1 class="display-4">Giới thiệu</h1>
              <p class="lead text-muted mb-0">Giò chả, nem chua là những món ăn đặc trưng truyền thống của nước Việt Nam chúng ta. Những món ăn này xuất hiện từ rất lâu trong văn hóa nước ta, nhiệm vụ chúng ta chính là giữ gìn và phát triển nó. 

                Mỗi một vùng miền đều có một món ăn mang hơi thở đặc trưng riêng của vùng ấy. Không chỉ người Việt chúng ta yêu thích mà người nước ngoài hiện nay cũng rất ưa chuộng. Thực phẩm đóng gói sẵn mang hương vị truyền thống đã và đang được xuất khẩu khắp mọi nơi trong nước và quốc tế. </p>
            </div>
            <div class="col-lg-6 d-none d-lg-block"><img src="{{asset('Customer-assets')}}/img/about/1.png" alt="" class="img-fluid"></div>
          </div>
        </div>
      </div>
      
      <div class="bg-white py-5">
        <div class="container py-5">
          <div class="row align-items-center mb-5">
            <div class="col-lg-6 order-2 order-lg-1"><i class="fa fa-bar-chart fa-2x mb-3 text-primary"></i>
              <h2 class="font-weight-light">Những món ăn BigBite đang sản xuất và phân phối</h2>
              <p style="font-size:18px" class=" mb-4">BigBite tự hào khi nói rằng các món ăn truyền thống, thực phẩm chế biến sẵn do chúng tôi sản xuất hiện đang có mặt tại nhiều chuỗi cửa hàng, siêu thị trên toàn quốc. 

                Gia Truyền Food ngày càng phong phú về chủng loại, đa dạng về mẫu mã và đặc biệt là chất lượng, hương vị không thay đổi. Gồm các loại: nem huế, nem chua, nem nướng, giò chả lụa,... và còn nhiều sản phẩm khác. Mỗi đợt sản xuất sản phẩm, chỉ trong một thời gian ngắn các sản phẩm này đều được khách hàng mua hết. Điều đó nói lên độ ưa chuộng Bigbite từ phía khách hàng và độ uy tín của chúng tôi. 
                
                Vì thế, nếu bạn có nhu cầu nhập sỉ lẻ thực phẩm ăn liền, thực phẩm truyền thống Việt Nam về để phân phối. Thì Hùng Gia Truyền chính là công ty bạn có thể tin tưởng và nhập hàng. Bigbite sẽ hỗ trợ bạn về các thông tin sản phẩm và đồng hành cùng bạn đến khi nào bạn phân phối được hết mặt hàng, nên bạn hoàn toàn có thể yên tâm.</p><a href="{{ route('products') }}" class="btn btn-light px-5 rounded-pill shadow-sm">Tìm hiểu</a>
            </div>
            <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2"><img src="{{asset('Customer-assets')}}/img/about/2.png" alt="" class="img-fluid mb-4 mb-lg-0"></div>
          </div>
          <div class="row align-items-center">
            <div class="col-lg-5 px-5 mx-auto"><img src="{{asset('Customer-assets')}}/img/about/3.png" alt="" class="img-fluid mb-4 mb-lg-0"></div>
            <div class="col-lg-6"><i class="fa fa-leaf fa-2x mb-3 text-primary"></i>
              <h2 class="font-weight-light">Công nghệ sản xuất thực phẩm chế biến</h2>
              <p style="font-size:18px" class=" mb-4">Những loại máy chế biến thực phẩm của chúng tôi được nghiên cứu và sản xuất theo công nghệ tiên tiến nhất, tối ưu hóa thời gian sản xuất sản phẩm. Các loại máy đều được làm từ inox 304 chất lượng cao, không bị rỉ sét trong suốt quá trình sản xuất sản phẩm. 

                Các sản phẩm nhờ có máy móc hỗ trợ sẽ có chất lượng đồng đều, chúng tôi hoàn toàn kiểm soát được lượng sản phẩm sản xuất, luôn kịp thời sản xuất đáp ứng được nhu cầu của thị trường. 
                
                Bigbite rất coi trọng việc nâng cao công nghệ sản xuất nhằm nâng cao trải nghiệm thực phẩm của khách hàng, các sản phẩm được sản xuất đều được đánh giá và kiểm nghiệm vệ sinh sau đó mới được cung cấp ra thị trường. </p>
            </div>
          </div>
        </div>
        <div class="container mt-5">
          <h1 class="mb-2">Bigbite - Sứ mệnh và tầm nhìn</h1>
          <p style="font-size:18px">Sứ mệnh Bigbite đặt ra: "Luôn mang đến cho khách hàng những sản phẩm chất lượng nhất", chúng tôi luôn cố gắng không ngừng hàng ngày, cải thiện công thức chế biến, sản xuất ra những món ngon chất lượng đảm bảo từ hương vị cho đến mức độ dinh dưỡng.

            Tầm nhìn Bigbite: “Đem thực phẩm gia truyền Việt Nam vươn ra thị trường quốc tế.” Chúng tôi mong muốn lưu giữ những nét đẹp truyền thống trong món ăn của nước ta và mang những nét đẹp đó quảng bá ra thị trường quốc tế. 
            
            Vì thế hãy cùng đồng hành với Bigbite để quảng bá những thực phẩm chế biến sẵn, những món ăn truyền thống này nhé!</p>
        </div>
      </div>
      
          </div>
        </div>
      </div>
@endsection