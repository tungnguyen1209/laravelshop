@extends('admin::layouts.master')
@section('content')
    <div class="content-wrapper">
            <div class="content">
                <!-- Top Statistics -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-default">
                            <div class="card-header card-header-border-bottom">
                                <h2>Recent Orders</h2>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered text-center">
                                    <thead>
                                    <tr>
                                        <th scope="col">#ID</th>
                                        <th scope="col">Customer Name</th>
                                        <th scope="col">Date Order</th>
                                        <th scope="col">Address Shipping</th>
                                        <th scope="col">Subtotal</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($bill))
                                        @foreach($bill as $bl)
                                            <tr>
                                                <td scope="row">{{$bl->id}}</td>
                                                <td>{{$bl->Name}}</td>
                                                <td>{{$bl->date_order}}</td>
                                                <td>{{$bl->Address}}</td>
                                                <td>{{number_format($bl->total)}} đ</td>
                                                <td><span class="badge badge-{{$bl->getstatus($bl->status)['class']}}">{{$bl->getstatus($bl->status)['name']}}</span></td>
                                                <td><a href="{{route('order_detail', $bl->id)}}">View Detail</a></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-5">
                        <!-- New Customers -->
                        <div class="card card-table-border-none"  data-scroll-height="580">
                            <div class="card-header justify-content-between ">
                                <h2>New Customers</h2>
                            </div>
                            <div class="card-body pt-0">
                                <table class="table ">
                                    <tbody>
                                    @if($new_cus)
                                        @foreach($new_cus as $newcus)
                                            <tr>
                                                <td>
                                                    <div class="media">
                                                        <div class="media-image mr-3 rounded-circle">
                                                            <a href="profile.html"><img class="rounded-circle w-45" src="uploads/avatar.jpg" alt="customer image"></a>
                                                        </div>
                                                        <div class="media-body align-self-center">
                                                            <a href="profile.html"><h6 class="mt-0 text-dark font-weight-medium">{{$newcus->full_name}}</h6></a>
                                                            <small>{{$newcus->email}}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{$newcus->order_count}} Orders</td>
                                                <td class="text-dark d-none d-md-block">{{$newcus->phone}}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7">
                        <!-- Top Products -->
                        <div class="card card-default" data-scroll-height="580">
                            <div class="card-header justify-content-between mb-4">
                                <h2>New Products</h2>
                            </div>
                            <div class="card-body py-0">
                                @if($new_pro)
                                    <table class="table table-bordered text-center">
                                        <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Des.</th>
                                            <th>Price</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($new_pro as $newpro)
                                        <tr>
                                            <td><img src="source/image/product/{{$newpro->image}}" width="80px", height="80pc" alt=""></td>
                                            <td>{{$newpro->name}}</td>
                                            <td>{{$newpro->description}}</td>
                                            <td>{{number_format($newpro->unit_price)}} đ</td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
