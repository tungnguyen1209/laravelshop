@extends('admin::layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>All Customer</h2>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Address</th>
                            <th scope="col">Avatar</th>
                            <th scope="col">Order Count</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if(isset($customer))
                                @foreach($customer as $cus)
                                    <tr>
                                        <td scope="row">{{$cus->id}}</td>
                                        <td>{{$cus->full_name}}</td>
                                        <td>{{$cus->email}}</td>
                                        <td>{{$cus->phone}}</td>
                                        <td>{{$cus->address}}</td>
                                        <td><img src="uploads/{{$cus->avatar}}" alt=""></td>
                                        <td>{{$cus->order_count}}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
