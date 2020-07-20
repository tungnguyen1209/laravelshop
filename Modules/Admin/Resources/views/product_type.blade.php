@extends ('admin::layouts.master')
@section('content')
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>All Products</h2>
        </div>
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-sm-4">
                    <form role="search" method="get" id="searchform" action="{{route('product_search')}}">
                        <input class="" type="text" value=""  name="search" id="search" placeholder="Type Keyword..." />
                        <button class="btn btn-outline-success"  type="submit" id="searchsubmit">Search</button>
                    </form>
                </div>
                <div class="col-sm-4">
                    <select class="form-control" name="pro_category_id">
                        @foreach($category as $cat)
                            <option href="product_type/{{$cat->id}}" value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-4">
                    <div class="text-right">
                        <a href="{{route('add_product')}}"><button class="btn btn-success">Add Product</button></a>
                    </div>
                </div>
            </div>
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
            <div class="row">
                <div class="text-center">
                    {{$product->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
