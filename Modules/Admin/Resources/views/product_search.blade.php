@extends ('admin::layouts.master')
@section('content')
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>All Products</h2>
        </div>
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-sm-3">
                    <form role="search" method="get" id="searchform" action="{{route('product_search')}}">
                        <input class="" type="text" value="{{Request::get('search')}}"  name="search" id="search" placeholder="Type Keyword..." />
                        <button class="btn btn-outline-success"  type="submit" id="searchsubmit">Search</button>
                    </form>
                </div>
                <div class="col-sm-3">
                    <form action="" id="form_cat" method="get">
                        <select class="form-control pro_status" name="pro_status">
                            <option {{Request::get('pro_status') == 0 ? 'selected': ''}} value="0">All</option>
                            <option {{Request::get('pro_status') == 1 ? 'selected': ''}} value="1">Public</option>
                            <option {{Request::get('pro_status') == 2 ? 'selected': ''}} value="2">Private</option>
                        </select>
                    </form>
                </div>
                <div class="col-sm-3">
                    <form action="" method="get" id="form_price">
                        <select name="price" class="form-control price">
                            <option value="0">All</option>
                            <option {{Request::get('price') == 1 ? 'selected': ''}} value="1">< 100,000 đ</option>
                            <option {{Request::get('price') == 2 ? 'selected': ''}} value="2">100,000 - 200,000 đ</option>
                            <option {{Request::get('price') == 3 ? 'selected': ''}} value="3">200,000 - 300,000 đ</option>
                            <option {{Request::get('price') == 4 ? 'selected': ''}} value="4">> 300,000 đ</option>
                        </select>
                    </form>
                </div>
                <div class="col-sm-3">
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
    <script>
        function addUrlParameter(name, value) {
            var searchParams = new URLSearchParams(window.location.search)
            searchParams.set(name, value)
            window.location.search = searchParams.toString()
        }
        jQuery(function () {
            jQuery(".price").change(function () {
                const selectedprice = jQuery(this).children("option:selected").val();
                addUrlParameter('price', selectedprice);
            });
        });
        jQuery(function () {
            jQuery(".pro_status").change(function () {
                const selectedstatus = jQuery(this).children("option:selected").val();
                addUrlParameter('pro_status', selectedstatus);
            });
        });
    </script>
@endsection
