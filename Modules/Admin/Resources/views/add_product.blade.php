@extends('admin::layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form action="" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom">
                            <h2>Add Product</h2>
                        </div>
                        <div class="card-body">
                            <label class="text-dark font-weight-medium" for="">Enable</label>
                            <div class="input-group mb-2">
                                <label class="switch switch-icon switch-primary switch-pill form-control-label">
                                    <input type="checkbox" id="checkbox_id" name="pro_status" class="switch-input form-check-input" value="on" checked>
                                    <span class="switch-label"></span>
                                    <span class="switch-handle"></span>
                                </label>
                            </div>
                            <label class="text-dark font-weight-medium" for="">Product Name</label>
                            <div class="input-group mb-2">
                                <input type="text" name="pro_name" class="form-control" required>
                            </div>
                            <label class="text-dark mt-4 font-weight-medium" for="">Category</label>
                            <select class="form-control" name="pro_category_id">
                                @foreach($category as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                            <label class="text-dark mt-4 font-weight-medium" for="">Unit Price</label>
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" name="pro_unit_price" required>
                            </div>
                            <label class="text-dark mt-4 font-weight-medium" for="">Promotion Price</label>
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" name="pro_promotion_price" required>
                            </div>
                            <label class="text-dark mt-4 font-weight-medium" for="">Description</label>
                            <div class="input-group mb-2">
                                <textarea type="text" class="form-control" name="pro_des" required></textarea>
                            </div>
                            <label class="text-dark mt-4 font-weight-medium" for="">Image</label>
                            <div class="input-group mb-2">
                                <input type="file" class="form-control" name="pro_image" required>
                            </div>
                            <label class="text-dark mt-4 font-weight-medium" for="">Quantity</label>
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" name="pro_qty" required>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success" style="width: 300px" name="placeorder">Submit </button>
                    </div>
                    <br>
                </form>
            </div>
        </div>
    </div>
@endsection
