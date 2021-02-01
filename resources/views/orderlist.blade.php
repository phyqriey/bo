@extends('layouts.app2')
@section('head')
@endsection
@section('content')
<main class="page shopping-cart-page">
    <section class="clean-block clean-cart dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Your Purchased</h2>
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
                                        <h5 class="mb-0"><a data-toggle="collapse" aria-expanded="true" aria-controls="accordion-1 .item-{{$order->id}}" href="#accordion-1 .item-{{$order->id}}">Order #BT{{str_pad($order->id,5,"0",STR_PAD_LEFT)}}</a><span class="float-right">Order Status: <b>{{$order->status}}</b><span></h5>
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
                                            @foreach($order->order_items as $item)
                                            <div class="product">
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
@endsection
@section('bottom')
@endsection