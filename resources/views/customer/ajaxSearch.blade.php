@foreach ($data as $pro)
    <div class="media">
        <a class="d-flex m-2 " href="{{route('product-detail',$pro->slug)}}">
        <img src="{{asset('storage/images')}}/{{$pro->image}}" width="65px" alt="image"></a>
        <div class="media-body ml-5 mt-2">
            <h4><a href="{{route('product-detail',$pro->slug)}}">{{$pro->name}}</a></h4>
            <h5>
                <p><del>{{number_format($pro->price)}}VNĐ</del> {{number_format($pro->sale_price)}}VNĐ</p>
            </h5>
        </div>
    </div>
@endforeach
