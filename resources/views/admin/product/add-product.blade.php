@extends('admin.masterview')
@section('title')
    ADD Category
@endsection

@section('main-content')
    <div class="col-lg-12 mt-5  grid-margin stretch-card">
        <div class="col-lg-10 m-auto">
            <h2 class="mt-5">Add Product</h2>
            <div class="mt-5">
                <form class="forms-sample" method="POST" action="{{ route('product.store') }}">
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">

                        <button type="button" class="close" data-dismiss="alert">×</button>

                        <strong>{{ $message }}</strong>

                    </div>
                @endif
                @csrf
                    <div class="form-group">
                      <label for="exampleInputName1">Product Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name='name' />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Slug</label>
                        <input type="text" class="form-control" id="exampleInputName1"  name='slug' />
                      </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Price</label>
                        <input type="text" class="form-control" id="exampleInputName1"  name='price' />
                      </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Sale Price</label>
                        <input type="text" class="form-control" id="exampleInputName1"  name='sale_price' />
                      </div>
                      <div class="form-group">
                        <label for="">Status</label>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="status" id="" value="1" checked>
                            Còn
                          </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="status" id="" value="0" >
                            Hết
                          </label>
                        </div>
                      </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Category</label>
                      <select class="form-control" id="exampleSelectGender" name="category_id">
                        <option>Category</option>
                        @foreach ($cate as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>                    
                        @endforeach                     
                      </select>
                    </div>
                   <div class="form-group">
                     <label for="">Image</label>
                     <input type="file" class="form-control" name="photo" id="" placeholder="" aria-describedby="fileHelpId">                    
                   </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Description</label>
                      <textarea
                        class="form-control"
                        id="exampleTextarea1"
                        rows="4" 
                      ></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2"> ADD </button>
                    <a href="{{route('product.index')}}" class="btn btn-light">Cancel</a>
                  </form>
            </div>
        </div>
    </div>
@endsection
