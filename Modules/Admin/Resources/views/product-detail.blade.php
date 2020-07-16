@extends('admin::layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form action="" method="post">
                    {{csrf_field()}}
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom">
                            <h2>{{$product->name}}</h2>
                        </div>
                        <div class="card-body">
                            <label class="text-dark font-weight-medium" for="">Enable</label>
                            <div class="input-group mb-2">
                                <label class="switch switch-icon switch-primary switch-pill form-control-label">
                                    <input type="checkbox" id="checkbox_id" name="pro_status" class="switch-input form-check-input" value="on">
                                    <span class="switch-label"></span>
                                    <span class="switch-handle"></span>
                                </label>
                            </div>
                            <label class="text-dark font-weight-medium" for="">Product Name</label>
                            <div class="input-group mb-2">
                                <input type="text" name="pro_name" value="{{$product->name}}" class="form-control">
                            </div>
                            <label class="text-dark mt-4 font-weight-medium" for="">Category</label>
                            <select class="form-control" name="pro_category_id">
                                    @foreach($category as $cat)
                                        <option value="{{$cat->id}}"
                                            @if($product->id_type == $cat->id)
                                                selected
                                            @endif
                                        >
                                            {{$cat->name}}
                                        </option>
                                    @endforeach
                            </select>
                            <label class="text-dark mt-4 font-weight-medium" for="">Unit Price</label>
                            <div class="input-group mb-2">
                                <input type="text" name="pro_unit_price" class="form-control" value="{{number_format($product->unit_price)}}">
                            </div>
                            <label class="text-dark mt-4 font-weight-medium" for="">Promotion Price</label>
                            <div class="input-group mb-2">
                                <input type="text" name="pro_promotion_price" class="form-control" value="{{number_format($product->promotion_price)}}">
                            </div>
                            <label class="text-dark mt-4 font-weight-medium" for="">Description</label>
                            <div class="input-group mb-2">
                                <input type="text" name="pro_des" class="form-control" value="{{$product->description}}">
                            </div>
                            <label class="text-dark mt-4 font-weight-medium" for="">Image</label>
                            <div class="input-group mb-2">
                                <input type="file" class="form-control" name="pro_image">
                            </div>
                            <div class="input-group mb-2">
                                <img src="uploads/{{$product->image}}" width="80px", height="80px" alt="">
                            </div>
                            <label class="text-dark mt-4 font-weight-medium" for="">Quantity</label>
                            <div class="input-group mb-2">
                                <input type="text" name="pro_qty" class="form-control" value="{{$product->quantity}}">
                            </div>
                        </div>
                    </div>
                    <div class="text-center mb-5">
                        <button type="submit" class="btn btn-success" style="width: 300px" name="placeorder">Update </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if($product->status == 0)
        <script type=text/javascript>
            document.getElementById("checkbox_id").checked = false;
        </script>
    @else
        <script type=text/javascript>
            document.getElementById("checkbox_id").checked = true;
        </script>
    @endif
@endsection
