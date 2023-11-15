@extends('admin.masterview')
@section('title')
    Manage Customer
@endsection

@section('main-content')
    <div class="col-lg-12 mt-5 grid-margin stretch-card">
        <br>
        
        <div class="card mt-5">
            
            <div class="table-responsive">
                <h2 class="m-2 text-center">List Customer</h2>
                <div class="mt-1 d-flex">
                   
                    <li class="nav-item nav-search border-0 ml-1 ml-md-3 ml-lg-5 d-none d-md-flex">
                        <form class="nav-link form-inline mt-2 mt-md-0" method="GET" action="{{route('admin.customer.find')}}">
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
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Email</th>   
                            <th>Name</th>   
                            <th>Phone</th>
                            <th>Address</th>              
                            <th>Created</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customer as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->phone}}</td>
                            <td>{{$item->address}}</td>
                            <td>{{date("d/m/Y", strtotime($item->created_at))}}</td>    
                            <td>{{$item->role==0?'Customer':'Admin'}}</td>                                             
                        </tr>
                        @endforeach
                        
                      
                    </tbody>
                </table>
                <div class="mt-3 m-4"> 
                    {{ $customer->links() }}
                </div>
               
               
            </div>
        </div>
    </div>
    </div>
@endsection
