@extends('admin::layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form action="" method="post">
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom">
                            <h2>{{$product->name}}</h2>
                        </div>
                        <div class="card-body">
                            <label class="text-dark font-weight-medium" for="">Product Name</label>
                            <div class="input-group mb-2">
                                <input type="text" value="{{$product->name}}" class="form-control">
                            </div>
                            <label class="text-dark mt-4 font-weight-medium" for="">Category</label>
                            <select class="form-control" name="category">
                                <option>{{$cat->type_products->name}}</option>
                                @foreach($category as $cat)
                                <option>{{$cat->name}}</option>
                                    @endforeach
                            </select>
                            <label class="text-dark mt-4 font-weight-medium" for="">Unit Price</label>
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" value="{{$product->unit_price}}">
                            </div>
                            <label class="text-dark mt-4 font-weight-medium" for="">Promotion Price</label>
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" value="{{$product->promotion_price}}">
                            </div>
                            <label class="text-dark mt-4 font-weight-medium" for="">Description</label>
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" value="{{$product->description}}">
                            </div>
                            <label class="text-dark mt-4 font-weight-medium" for="">Quantity</label>
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" value="{{$product->quantity}}">
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success" style="width: 300px" name="placeorder">Update </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
