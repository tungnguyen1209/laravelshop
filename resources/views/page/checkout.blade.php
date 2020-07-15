@extends('master-checkout')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Checkout</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="index.html">Home</a> / <span>Checkout</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div id="content">
        <form action="" method="post" class="beta-form-checkout">
            {{ csrf_field()}}
            <div class="row">
                @if(Auth::check())
                    <div class="col-sm-6">
                        <div class="space20">&nbsp;</div>
                        <div class="form-block">
                            <label for="name">Full Name*</label>
                            <input type="text" name="fullname" placeholder="Full name" value="{{Auth::user()->full_name}}" required>
                        </div>
                        <div class="form-block">
                            <label for="email">Email*</label>
                            <input type="email" name="email" required placeholder="expample@gmail.com" value="{{Auth::user()->email}}">
                        </div>
                        <div class="form-block">
                            <label for="adress">Address*</label>
                            <input type="text" name="address" placeholder="Street Address" required value="{{Auth::user()->address}}">
                        </div>
                        <div class="form-block">
                            <label for="phone">Phone*</label>
                            <input type="text" name="phone" required value="{{Auth::user()->phone}}">
                        </div>
                        <div class="form-block">
                            <label for="notes">Note</label>
                            <textarea name="notes"></textarea>
                        </div>
                    </div>
                @else
                <div class="col-sm-6">
                    <div class="space20">&nbsp;</div>
                    <div class="form-block">
                        <label for="name">Full Name*</label>
                        <input type="text" name="fullname" placeholder="Full name" required>
                    </div>
                    <div class="form-block">
                        <label for="email">Email*</label>
                        <input type="email" name="email" required placeholder="expample@gmail.com">
                    </div>
                    <div class="form-block">
                        <label for="adress">Address*</label>
                        <input type="text" name="address" placeholder="Street Address" required>
                    </div>
                    <div class="form-block">
                        <label for="phone">Phone*</label>
                        <input type="text" name="phone" required>
                    </div>
                    <div class="form-block">
                        <label for="notes">Note</label>
                        <textarea name="notes"></textarea>
                    </div>
                </div>
                @endif
                <div class="col-sm-6">
                    <div class="your-order">
                        <div class="your-order-head"><h5>Your Cart</h5></div>
                        <div class="your-order-body" style="padding: 0px 10px">
                            <div class="your-order-item">
                                <div>
                                    <!--  one item	 -->
                                    @if(Session::has('Cart') != null || isset(Session::get('Cart')->totalQty))
                                        @foreach(Session::get('Cart')->items as $item)
                                            <div class="media">
                                                <input type="hidden" name="image-{{$item['item']->id}}" value="{{$item['item']->image}}">
                                                <img name="image-{{$item['item']->id}}" width="10%" src="source/image/product/{{$item['item']->image}}" alt="" class="pull-left">
                                                <div class="media-body">
                                                    <input type="hidden" name="name-pro-{{$item['item']->id}}" value="{{$item['item']->name}}">
                                                    <p class="font-large">{{$item['item']->name}}</p>
                                                    <input type="hidden" name="price-pro-{{$item['item']->id}}" value="{{$item['item']->unit_price}}">
                                                    <p class="font-large">Price: {{number_format($item['item']->unit_price)}} đ</p>
                                                    <input type="hidden" name="qty-pro-{{$item['item']->id}}" value="{{$item['qty']}}">
                                                    <span class="color-gray your-order-info">Quantity: {{$item['qty']}}</span>
                                                </div>
                                            </div>
                                        @endforeach

                                    <!-- end one item -->
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="your-order-item">
                                <div class="pull-left"><p class="your-order-f18">Subtotal:</p></div>
                                <input type="hidden" name="subtotal" value="{{Session::get('Cart')->totalPrice}}">
                                <div class="pull-right"><h5 class="color-black">{{number_format(Session::get('Cart')->totalPrice)}} đ</h5></div>
                                <div class="clearfix"></div>
                                @endif
                            </div>
                        </div>
                        <div class="your-order-head"><h5>Paymemt Method</h5></div>
                        <div class="your-order-body">
                            <ul class="payment_methods methods">
                                <li class="payment_method_bacs">
                                    <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
                                    <label for="payment_method_bacs">COD </label>
                                    <div class="payment_box payment_method_bacs" style="display: block;">
                                        The store will send the goods to your address, you see the goods and then pay the delivery staff.
                                    </div>
                                </li>
                                <li class="payment_method_cheque">
                                    <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
                                    <label for="payment_method_cheque">Payment Online </label>
                                    <div class="payment_box payment_method_cheque" style="display: none;">
                                        Transfer funds to the following account:
                                        <br>- Account Number: 123 456 789 000
                                        <br>- Account holder: Nguyen Duy Tung
                                        <br>- Vietcombank
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="beta-btn primary" name="placeorder">Place Order <i class="fa fa-chevron-right"></i></button>
                        </div>
                    </div> <!-- .your-order -->
                </div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
