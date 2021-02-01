@extends('layouts.app2')
@section('head')
@endsection
@section('content')
<main class="page shopping-cart-page">
    <section class="clean-block clean-cart dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Manage Order</h2>
                <p></p>
            </div>
            <div class="content">
                @if(!$orders->isEmpty())
                <div class="row no-gutters">
                    <div class="col-md-12">
                        <div class="items">
                            <div role="tablist" id="accordion-1">
                                @foreach($orders as $order)
                                <div class="card">
                                    <div role="tab" class="card-header">
                                        <h5 class="mb-0">
                                            <a data-toggle="collapse" aria-expanded="true" aria-controls="accordion-1 .item-{{$order->id}}" href="#accordion-1 .item-{{$order->id}}">Order #BT{{str_pad($order->id,5,"0",STR_PAD_LEFT)}}</a>
                                            <span class="float-right">Order Status : 
                                                <select data-order_id="{{$order->id}}" class="orderStatus border rounded shadow">
                                                    @php
                                                    foreach($arrStatus as $status)
                                                    if($status == $order->status){
                                                    echo '<option value="'.$status.'" selected>'.$status.'</option>';
                                                    }
                                                    else{
                                                    echo '<option value="'.$status.'">'.$status.'</option>';
                                                    }
                                                    @endphp
                                                </select>
                                            </span>
                                        </h5>
                                    </div>
                                    @php
                                    if($loop->first){
                                    $display="show";
                                    }
                                    else{
                                    $display="";
                                    }
                                    @endphp
                                    <div role="tabpanel" data-parent="#accordion-1" class="collapse {{$display}} item-{{$order->id}}">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-5 col-md-3 col-xl-3">
                                                    <h5>Customer</h5>
                                                </div>
                                                <div class="col">
                                                    <h5>{{$order->user->name}}</h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-5 col-md-3 col-xl-3">
                                                    <h5>Order Date</h5>
                                                </div>
                                                <div class="col">
                                                    <h5>{{
                                                    date_format(date_create($order->created_at),'jS M Y \a\\t H:i:s')}}
                                                    </h5>
                                                </div>
                                            </div>
                                            @foreach($order->order_items as $item)
                                            <hr>
                                            <div class="product mt-3">
                                                <div class="row justify-content-center align-items-center">
                                                    <div class="col-md-3">
                                                        <div class="product-image"><img class="img-fluid d-block mx-auto image" src="{{$arrImgUrl[$item->item_id]}}" /></div>
                                                    </div>
                                                    <div class="col-md-7 product-info"><a class="product-name" href="{{ url('/') }}/product/{{$item->item_id}}">{{$item->item_name}}</a>
                                                        <div class="product-specs">
                                                            <div>
                                                                <span>Price: </span>
                                                                <span class="value">RM {{number_format($item->price,2)}}</span>
                                                            </div>
                                                            <div>
                                                                <span>Quantity: </span>
                                                                <span class="value">{{$item->quantity}}</span>
                                                            </div>
                                                            <div>
                                                                <span>Sub Total: </span>
                                                                <span class="value">RM {{number_format(($item->quantity * $item->price),2)}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-md-2 price"><span>RM {{number_format(($item->quantity * $item->price),2)}}</span></div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="row no-gutters">
                    <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="items">
                            <div class="jumbotron">
                                <h1>No orders found</h1>
                                <p>You have not made any purchased yet</p>
                                <p><a class="btn btn-primary" role="button" href="{{route('catalogueList')}}">Continue Shopping</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
</main>
<div id="loading" role="dialog" tabindex="-1" class="modal fade">
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
        $('#loading').on('hidden.bs.modal', function(e) {
            // do something...
            $("#success").hide();
            $("#fail").hide();
            $("#spinner").show();
        })
        //update qty function
        $(".orderStatus").change(function() {
            var id = $(this).data('order_id');
            var status = $(this).val();
            if (id > 0) {
                $.ajax({
                    type: 'POST',
                    url: "{{route('orderUpdate')}}",
                    dataType: 'json',
                    data: {
                        id: id,
                        status: status,
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(data) {
                        if (data.status) {
                            $("#spinner").hide();
                            $("#success").show();
                            $("#desc").html("Update Successful !");
                            setTimeout(function() {
                                $('#loading').modal('hide')
                            }, 1500);
                        } else {
                            if (data.msg == 'Not Login') {
                                window.location.replace("{{ route('login') }}");
                            }
                        }
                    },
                    error: function() {
                        $("#spinner").hide();
                        $("#fail").show();
                        $("#desc").html("Update Failed !");
                        setTimeout(function() {
                            $('#loading').modal('hide')
                        }, 1500);
                    },
                    beforeSend: function() {
                        //do something
                        $("#spinner").show();
                        $('#loading').modal({
                            backdrop: 'static'
                        });
                    }
                });
            }
        });
    });
</script>
@endsection