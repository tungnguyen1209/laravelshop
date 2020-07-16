@extends('admin::layouts.master')
@section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="invoice-wrapper rounded border bg-white py-5 px-3 px-md-4 px-lg-5">
            <div class="d-flex justify-content-between">
                <h2 class="text-dark font-weight-medium">Invoice #{{$bill->id}}</h2>
                <div class="btn-group">
                    <button class="btn btn-sm btn-secondary">
                        <i class="mdi mdi-content-save"></i> Save</button>
                    <button class="btn btn-sm btn-secondary">
                        <i class="mdi mdi-printer"></i> Print</button>
                </div>
            </div>
            <div class="row pt-5">
                <div class="col-xl-3 col-lg-4">
                    <p class="text-dark mb-2">From</p>
                    <address>
                        Nguyen Duy Tung
                        <br> Laravel Shop
                        <br> Email: duytungnguyen.bkhn.95@gmail.com
                        <br> Phone: 0327642297
                    </address>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <p class="text-dark mb-2">To</p>
                    <address>
                        {{$bill->Name}}
                        <br>Address: {{$bill->Address}}
                        <br> Email: {{$bill->Email}}
                        <br> Phone: {{$bill->Phone}}
                    </address>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <p class="text-dark mb-2">Details</p>
                    <address>
                        Invoice ID:
                        <span class="text-dark">#{{$bill->id}}</span>
                        <br>Date Order: {{$bill->date_order}}
                        <br>Payment Method: {{$bill->payment}}
                    </address>
                </div>
                <div class="col-xl-3 col-lg 4">
                    <form action="" method="post">
                        {{csrf_field()}}
                        <div class="text-left mb-2">
                            <p class="text-dark mb-2">Order Status:
                                <select name="bill_status" class="form-coltrol">
                                    <option @if($bill->status == 0) selected @endif value="0">Pending</option>
                                    <option @if($bill->status == 1) selected @endif value="1">Completed</option>
                                </select>
                            </p>
                        </div>
                        <div class="text-left pl-5">
                            <button type="submit" class="btn btn-primary"> Procced </button>
                        </div>
                    </form>

                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($bill_detail))
                    @foreach($bill_detail as $billdetail)
                        <tr>
                            <td>{{$billdetail->id_product}}</td>
                            <td>{{$billdetail->name}}</td>
                            <td>{{$billdetail->description}}</td>
                            <td>{{$billdetail->quantity}}</td>
                            <td>{{number_format($billdetail->unit_price)}} đ</td>
                            <td>{{number_format(($billdetail->quantity) * ($billdetail->unit_price))}} đ</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <div class="row justify-content-end">
                <div class="col-lg-5 col-xl-4 col-xl-3 ml-sm-auto">
                    <ul class="list-unstyled mt-4">
                        <li class="mid pb-3 text-dark"> Subtotal
                            <span class="d-inline-block float-right text-default">{{number_format($bill->total)}}</span>
                        </li>
                        <li class="mid pb-3 text-dark">Shipping
                            <span class="d-inline-block float-right text-default">30,000 đ</span>
                        </li>
                        <li class="pb-3 text-dark">Total
                            <span class="d-inline-block float-right">{{number_format($bill->total + 30000)}} đ</span>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
