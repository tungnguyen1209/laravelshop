@extends('admin::layouts.master')
@section('content')
    <div class="content-wrapper">
            <div class="content">
                <!-- Top Statistics -->
                <div class="row">
                    <div class="col-12">
                        <!-- Recent Order Table -->
                        <div class="card card-table-border-none" id="recent-orders">
                            <div class="card-header justify-content-between">
                                <h2>Recent Orders</h2>
                            </div>
                            <div class="card-body pt-0 pb-5">
                                <table class="table card-table table-responsive table-responsive-large" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Customer Name</th>
                                        <th class="d-none d-md-table-cell">Date Order</th>
                                        <th class="d-none d-md-table-cell">Address Shipping</th>
                                        <th class="d-none d-md-table-cell">Subtotal</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        @if($bills)
                                            @foreach($bills as $bill)
                                                <td >{{$bill->id}}</td>
                                                <td >
                                                    <a class="text-dark" href=""> {{$bill->Name}}</a>
                                                </td>
                                                <td class="d-none d-md-table-cell">{{$bill->date_order}}</td>
                                                <td class="d-none d-md-table-cell">{{$bill->Address}}</td>
                                                <td class="d-none d-md-table-cell">{{number_format($bill->total)}} đ</td>
                                                <td >
                                                    <span class="badge badge-success">Completed</span>
                                                </td>
                                                <td class="text-right">
                                                    <div class="dropdown show d-inline-block widget-dropdown">
                                                        <a class="dropdown-toggle icon-burger-mini" href="" role="button" id="dropdown-recent-order1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"></a>
                                                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-recent-order1">
                                                            <li class="dropdown-item">
                                                                <a href="#">View</a>
                                                            </li>
                                                            <li class="dropdown-item">
                                                                <a href="#">Remove</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            @endforeach
                                        @endif
                                    </tr>
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
                                                            <a href="profile.html"><img class="rounded-circle w-45" src="source/assets_admin/img/user/{{$newcus->avatar}}" alt="customer image"></a>
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
