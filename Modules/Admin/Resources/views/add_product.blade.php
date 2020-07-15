@extends('admin::layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form action="" method="post">
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom">
                            <h2>Add Product</h2>
                        </div>
                        <div class="card-body">
                            <label class="text-dark font-weight-medium" for="">Product Name</label>
                            <div class="input-group mb-2">
                                <input type="text" value="" class="form-control">
                            </div>
                            <label class="text-dark mt-4 font-weight-medium" for="">Category</label>
                            <select class="form-control" name="category">
                                @foreach($category as $cat)
                                    <option>{{$cat->name}}</option>
                                @endforeach
                            </select>
                            <label class="text-dark mt-4 font-weight-medium" for="">Unit Price</label>
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" value="">
                            </div>
                            <label class="text-dark mt-4 font-weight-medium" for="">Promotion Price</label>
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" value="">
                            </div>
                            <label class="text-dark mt-4 font-weight-medium" for="">Description</label>
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" value="">
                            </div>
                            <label class="text-dark mt-4 font-weight-medium" for="">Image</label>
                            <div class="input-group mb-2">
                                <input type="file" class="form-control">
                            </div>
                            <label class="text-dark mt-4 font-weight-medium" for="">Quantity</label>
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" value="">
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success" style="width: 300px" name="placeorder">Update </button>
                    </div>
                    <br>
                </form>
            </div>
        </div>
    </div>
@endsection
