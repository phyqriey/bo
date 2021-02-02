@extends('layouts.app2')
@section('head')
@endsection
@section('content')
<main class="page shopping-cart-page">
    <section class="clean-block clean-cart dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Shopping Cart</h2>
            </div>
            @if($cartItems->isEmpty())
            <div class="content">
                <div class="row no-gutters">
                    <div class="col-md-12 col-lg-8">
                        <div class="items">
                            <div class="jumbotron">
                                <h1>Cart Empty</h1>
                                <p>Your cart is empty.</p>
                                <p><a href="{{route('catalogueList')}}" class="btn btn-primary" role="button">Continue Shopping</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="summary" style="background: url('{{ url('/') }}/assets/img/Cart.JPG') center / cover no-repeat;"></div>
                    </div>
                </div>
            </div>
            @else
            <div class="content">
                <div class="row no-gutters">
                    <div class="col-md-12 col-lg-8">
                        <div class="items">
                            @foreach($cartItems as $item)
                            <div class="product border-bottom mt-1" data-item_id="{{$item->id}}">
                                <div class="row justify-content-center align-items-center">
                                    <div class="col-md-3">
                                        <div class="product-image"><img class="img-fluid d-block mx-auto image" src="{{$arrImgUrl[$item->item_id]}}"></div>
                                    </div>
                                    <div class="col-md-5 product-info"><a class="product-name" href="{{ url('/') }}/product/{{$item->item_id}}">{{$item->item_name}}</a>
                                        <div class="product-specs">
                                            <div>
                                                <span>Price:&nbsp;</span><span class="value">RM {{number_format($item->price,2)}}</span>
                                            </div>
                                            <div class="mt-2">
                                                <button class="removeItem btn btn-outline-danger btn-sm" type="button"><i class="fa fa-remove"></i>Remove Item</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-2 quantity">
                                        <label class="d-none d-md-block" for="quantity">Quantity</label>
                                        <input min='1' type="number" class="quantityItem form-control quantity-input" value="{{$item->quantity}}">
                                    </div>
                                    <div class="col-6 col-md-2 price"><span>RM {{number_format(($item->quantity * $item->price),2)}}</span></div>
                                </div>
                            </div>
                            @php
                            if($loop->first){
                            $subtotal = 0;
                            }
                            $subtotal = $subtotal + $item->quantity * $item->price;
                            @endphp
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div id="cartSummary" class="summary" data-cart_id="{{$cartId}}">
                            <h3>Summary</h3>
                            <h4><span class="text">Subtotal</span><span class="price">RM {{number_format($subtotal,2)}}</span></h4>
                            <h4><span class="text">Discount</span><span class="price">RM 0.00</span></h4>
                            <h4><span class="text">Shipping</span><span class="price">RM 0.00</span></h4>
                            <h4><span class="text">Total</span><span class="price">RM {{number_format($subtotal,2)}}</span></h4>
                            <a id="checkout" class="btn btn-primary btn-block btn-lg" type="button">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>
</main>
<div id="loading" role="dialog" tabindex="-1" class="modal fade">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <p class="text-center text-info mb-0"><i class="fa fa-circle-o-notch spin"></i> Updating Cart</p>
            </div>
        </div>
    </div>
</div>
<div id="loading_checkout" role="dialog" tabindex="-1" class="modal fade">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h1 class="display-4 text-center text-info">
                    <i id="spinner" style="display:none" class="text-secondary fa fa-circle-o-notch spin"></i>
                    <i id="fail" style="display:none" class="text-danger fa fa-times-circle-o"></i>
                    <i id="success" style="display:none" class="text-success fa fa-check-circle-o"></i>
                </h1>
                <p id="desc" class="text-center">Payment in progress, do not close the browser</p>
            </div>
        </div>
    </div>
</div>
@endsection
@section('bottom')
<script>
    $(document).ready(function() {
        //remove item function
        $(".removeItem").click(function() {
            var id = $(this).closest(".product").data('item_id');
            if (id > 0) {
                $.ajax({
                    type: 'POST',
                    url: "{{route('cartItemRemove')}}",
                    dataType: 'json',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(data) {
                        if (data.status) {
                            window.location.replace("{{route('showCart')}}");
                        } else {
                            if (data.msg == 'Not Login') {
                                window.location.replace("{{ route('login') }}");
                            }
                        }
                    },
                    error: function() {
                        window.location.reload();
                    },
                    beforeSend: function() {
                        //do something
                        $('#loading').modal({
                            backdrop: 'static'
                        });
                    }
                });
            }
        });
        //update qty function
        $(".quantityItem").focusout(function() {
            var id = $(this).closest(".product").data('item_id');
            var qty = $(this).val();
            if (id > 0) {
                $.ajax({
                    type: 'POST',
                    url: "{{route('cartItemQty')}}",
                    dataType: 'json',
                    data: {
                        id: id,
                        qty: qty,
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(data) {
                        if (data.status) {
                            window.location.replace("{{route('showCart')}}");
                        } else {
                            if (data.msg == 'Not Login') {
                                window.location.replace("{{ route('login') }}");
                            }
                        }
                    },
                    error: function() {
                        window.location.reload();
                    },
                    beforeSend: function() {
                        //do something
                        $('#loading').modal({
                            backdrop: 'static'
                        });
                    }
                });
            }
        });

        //checkout function
        $("#checkout").click(function() {
            var id = $(this).closest("#cartSummary").data('cart_id');
            if (id > 0) {
                $.ajax({
                    type: 'POST',
                    url: "{{route('orderStore')}}",
                    dataType: 'json',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(data) {
                        if (data.status) {
                            $("#spinner").hide();
                            $("#success").show();
                            $("#desc").html("Payment Successful !");
                            setTimeout(function() {
                                window.location.replace("{{route('showOrder')}}");
                            }, 1500);
                        } else {
                            if (data.msg == 'Not Login') {
                                $("#desc").html("Payment Failed. Please Try Again !");
                                $("#spinner").hide();
                                $("#fail").show();
                                setTimeout(function() {
                                    window.location.replace("{{ route('login') }}");
                                }, 1500);
                            } else {
                                $("#desc").html("Payment Failed. Please Try Again !");
                                $("#spinner").hide();
                                $("#fail").show();
                                setTimeout(function() {
                                    window.location.reload();
                                }, 1500);
                            }
                        }
                    },
                    error: function() {
                        setTimeout(function() {
                            $("#desc").html("Payment Failed. Please Try Again !");
                            $("#spinner").hide();
                            $("#fail").show();
                            setTimeout(function() {
                                window.location.reload();
                            }, 1500);
                        }, 4000);
                    },
                    beforeSend: function() {
                        //do something
                        $("#spinner").show();
                        $('#loading_checkout').modal({
                            backdrop: 'static'
                        });
                    }
                });
            }
        });
    });
</script>
@endsection