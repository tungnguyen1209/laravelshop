<div  class="row">
    @foreach($new_product as $newproduct)
        <div  class="col-sm-3">
            <div class="single-item">
                <div class="single-item-header">
                    <a href="{{route('product-details',$newproduct->id)}}"><img src="source/image/product//{{$newproduct->image}}" alt="" height="320px" width="270px"></a>
                </div>
                <div class="single-item-body">
                    <p class="single-item-title">{{$newproduct->name}}</p>
                    <p class="single-item-price">
                        <span class="flash-del">{{$newproduct->unit_price}}</span>
                        <span class="flash-sale">{{$newproduct->promotion_price}}</span>
                    </p>
                </div>
                <div class="single-item-caption">
                    <a class="add-to-cart pull-left" onclick="AddCart({{$newproduct->id}})" href="javascript:void(0)"><i class="fa fa-shopping-cart"></i></a>
                    <a class="beta-btn primary" href="{{route('product-details',$newproduct->id)}}">Details <i class="fa fa-chevron-right"></i></a>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    @endforeach
</div>
