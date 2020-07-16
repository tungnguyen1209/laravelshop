@extends ('admin::layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>All Orders</h2>
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
    </div>
@endsection
