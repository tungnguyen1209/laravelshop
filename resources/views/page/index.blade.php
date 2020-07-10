@extends('master')
@section('content')
    <div class="fullwidthbanner-container">
        <div class="fullwidthbanner">
            <div class="bannercontainer" >
                <div class="banner" >
                    <ul>
                        <!-- THE FIRST SLIDE -->
                        @foreach($slide as $sl)
                        <li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                            <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
                                <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="source/image/slide/{{$sl->image}}" data-src="source/image/slide/{{$sl->image}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('source/image/slide/{{$sl->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="tp-bannertimer"></div>
        </div>
    </div>
    <!--slider-->
</div>
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
                <div class="col-sm-12">
                    <div class="beta-products-list">
                        <h4>New Products</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">438 styles found</p>
                            <div class="clearfix"></div>
                        </div>
                        <div id="filter-product">
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
                        </div>
                    </div> <!-- .beta-products-list -->
                    <div class="space50">&nbsp;</div>
                    <div class="beta-products-list">
                        <h4>Top Products</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">438 styles found</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href="product.html"><img src="source/assets/dest/images/products/1.jpg" alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">Sample Woman Top</p>
                                        <p class="single-item-price">
                                            <span>$34.55</span>
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="space40">&nbsp;</div>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href="product.html"><img src="source/assets/dest/images/products/1.jpg" alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">Sample Woman Top</p>
                                        <p class="single-item-price">
                                            <span>$34.55</span>
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- .beta-products-list -->
                </div>
            </div> <!-- end section with sidebar and main content -->
        </div> <!-- .main-content -->
    </div> <!-- #content -->
    <script>
        function AddCart(id) {
            jQuery.ajax({
                url:'add-cart/'+id,
                type:'GET',
            }).done(
                function (response) {
                console.log(response);
                    RenderCart(response)
                    alertify.success('Added!');
            });
        }
        jQuery("#change-cart-item").on("click", ".cart-item-delete i", function () {
        jQuery.ajax({
            url:'del-cart/'+jQuery(this).data("id"),
            type:'GET',
        }).done(
            function (response) {
                RenderCart(response)
                alertify.error('Deleted!');
            });
        });
        function filterbyprice(price) {
            jQuery.ajax({
                url:'price/'+price,
                type:'GET',
            }).done(
                function (response) {
                    console.log(response);
                    RenderListProduct(response);
                    alertify.success('Success!');
                });
        }
        jQuery("#statusID").on('change', function () {
            var val = jQuery(this).val();
            console.log(val);
            jQuery.ajax({
                url:'feature/'+val,
                type:'GET',
            }).done(
                function (response) {
                    console.log(response)
                    RenderListProduct(response)
                    alertify.success('Success!');
                });
        })
        function RenderListProduct(response) {
            jQuery("#filter-product").empty();
            jQuery("#filter-product").html(response);
        }
        function RenderCart(response) {
            jQuery("#change-cart-item").empty();
            jQuery("#change-cart-item").html(response);
            jQuery("#total-quantity").text("("+(jQuery("#total-quantity-cart").val())+" items)");
        }
        jQuery(function () {
            jQuery(".feature").change(function () {
                jQuery("#form-filter").submit();
            })
        })
    </script>
@endsection
