@extends ('admin::layouts.master')
@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>All Products</h2>
    </div>
    <div class="card-body">
        <div class="text-right mb-3">
            <a href="{{route('add_product')}}"><button class="btn btn-success">Add Product</button></a>
        </div>
        <br>
        <table class="table table-bordered text-center">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Description</th>
                <th scope="col">Unit Price</th>
                <th scope="col">Promotion Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @if($product)
                @foreach($product as $pro)
                        <tr href="{{route('index')}}">
                            <td scope="row">{{$pro->id}}</td>
                            <td>{{$pro->name}}</td>
                            <td>{{$pro->type_products->name}}</td>
                            <td>{{$pro->description}}</td>
                            <td>{{number_format($pro->unit_price)}}</td>
                            <td>{{number_format($pro->promotion_price)}}</td>
                            <td>{{$pro->quantity}}</td>
                            <td><span class="badge badge-{{$pro->getstatus($pro->status)['class']}}">{{$pro->getstatus($pro->status)['name']}}</span></td>
                            <td><a href="{{route('product-detail',$pro->id)}}">Edit</a> || <a href="#">Delete</a></td>
                        </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="">Previous</a></li>
                <li class="page-item"><a class="page-link" href="admin/product?page=1">1</a></li>
                <li class="page-item"><a class="page-link" href="admin/product?page=2">2</a></li>
                <li class="page-item"><a class="page-link" href="admin/product?page=3">3</a></li>
                <li class="page-item"><a class="page-link" href="">Next</a></li>
            </ul>
        </nav>
    </div>
</div>
@endsection
