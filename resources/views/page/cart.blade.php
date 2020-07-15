@if(Session::has('Cart') != null || isset(Session::get('Cart')->totalQty))
    @foreach(Session::get('Cart')->items as $item)
<div class="cart-item">
    <a class="cart-item-delete" href="javascript:" ><i class="fa fa-times" data-id="{{$item['item']->id}}"></i></a>
    <div class="media">
        <a class="pull-left" href="#"><img src="source/image/product/{{$item['item']->image}}" width="50px", height="50px" alt=""></a>
        <div class="media-body">
            <span class="cart-item-title">{{$item['item']->name}}</span>
            <span class="cart-item-options">Size: XS; Colar: Navy</span>
            <span class="cart-item-amount">{{$item['qty']}}*<span>{{number_format($item['item']->unit_price)}}</span></span>
        </div>
    </div>
</div>
    @endforeach
</div>
<div class="cart-caption">
    <div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{{Session::get('Cart')->totalPrice}}đ</span></div>
    <input hidden id="total-quantity-cart" type="number" value="{{Session::get('Cart')->totalQty}}">
    <div class="clearfix"></div>
</div>
@endif
