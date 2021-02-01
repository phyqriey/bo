@extends('layouts.app2')
@section('head')
<style>
    .clean-product-item .image img {
        width: 100%;
        height: 330px;
        max-width: 330px;
        max-height: 330px;
    }
</style>
@endsection
@section('content')
<main class="page product-page">
    <section class="clean-block clean-product dark">
        <div class="container">
            @if(isset($detail['result']))
            <div class="block-heading">
                <h2 class="text-info">System Maintenance</h2>
            </div>
            @else
            <div class="block-heading">
                <h2 class="text-info">Product Page</h2>
                <p>Buy Now ! Hot Selling</p>
            </div>
            <div class="block-content">
                <div class="product-info">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="gallery">
                                <div class="sp-wrap">
                                    @php
                                    $arr_url=array();
                                    foreach($detail['images'] as $imgurl){
                                    if(!in_array($imgurl,$arr_url)){
                                    echo '<a href="'.$imgurl.'">
                                        <img class="img-fluid d-block mx-auto" src="'.$imgurl.'">
                                    </a>';
                                    array_push($arr_url,$imgurl);
                                    }
                                    }
                                    @endphp
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info">
                                <h3 id="item_name">{{$detail['name']}}</h3>
                                <div class="rating">
                                    <h4>{{$detail['sku']}}</h4>
                                </div>
                                <div class="price">
                                    @if($detail['type']=='variable')
                                    <h3 id="price_text"></h3>
                                    <label>Variant: </label>
                                    <select id="variant" class="form-control-sm">
                                        <option value="" selected disabled>Please Select</option>
                                        @php
                                        foreach($detail['attribute'] as $key=>$value){
                                        $value=($value=='')?$key:$value;
                                        echo '<option value="'.$key.'">'.$value.'</option>';
                                        }
                                        @endphp
                                    </select>
                                    <div id="variant_error" class="text-danger d-none">Please select variant</div>
                                    @else
                                    <input id="price" type="hidden" value="{{$detail['price']}}">
                                    <input id="item_id" type="hidden" value="{{$detail['id']}}">
                                    <h3 id="price_text">RM {{number_format($detail['price'],2)}}</h3>
                                    @endif
                                    <div class="price"><label>Quantity: </label><input id="quantity" type="number" class="form-control-sm" required value="1" min="1" /></div>
                                </div>
                                <button id="addToCart" class="btn btn-primary" type="button"><i class="icon-basket"></i>Add to
                                    Cart</button>
                                <div class="summary">
                                    <p>
                                        @php
                                        if($detail['description']!=''){
                                        echo $detail['description'];
                                        }
                                        else{
                                        echo 'No description';
                                        }
                                        @endphp
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        </div>
    </section>
</main>
@endsection
@section('bottom')
@if(!isset($detail['result']))
<script>
    var type = "{{ $detail['type'] }}";
    @if($detail['type'] == 'variable')
    var price_list = [];

    @foreach($detail['price'] as $key => $price)
    @php
    if ($loop->first) {
        $lowest = $highest = $price;
    } else {
        if ($price < $lowest) {
            $lowest = $price;
        }
        if ($price > $highest) {
            $highest = $price;
        }
    }
    @endphp
    price_list['{{$key}}'] = '{{$price}}';
    @endforeach
    @if($lowest == $highest)
    var price_text = 'RM {{number_format($lowest,2)}}';
    @else
    var price_text = 'RM {{number_format($lowest,2)}} - RM {{number_format($highest,2)}}';
    @endif
    @endif
    $(document).ready(function() {
        if (type == 'variable') {
            $('#price_text').html(price_text);
        }
        $("#variant").change(function() {
            $("#variant_error").hide();
            $('#price_text').html("RM " + (price_list[$(this).val()] * $("#quantity").val()).toLocaleString());
        });

        $("#quantity").change(function(){
            if (type == 'variable') {
                $('#price_text').html("RM " + (price_list[$("#variant").val()] * $(this).val()).toLocaleString());
            }
            else{
                $('#price_text').html("RM " + ($("#price").val() * $(this).val()).toLocaleString());
            }
        });
        $("#addToCart").click(function() {
            var proceed = true;
            var price = 0;
            var quantity = $("#quantity").val();
            var item_id = '0';
            var item_name = $("#item_name").html();
            if (type == 'variable') {
                item_id = $("#variant").val();
                if (item_id == '' || item_id == null) {
                    proceed = false;
                    $("#variant_error").removeClass('d-none');
                    $("#variant_error").show();
                    return;
                }
                price = price_list[item_id];
            } else {
                price = $("#price").val();
                item_id = $("#item_id").val();
            }
            if (proceed) {
                $.ajax({
                    type: 'POST',
                    url: "{{route('cartStore')}}",
                    dataType: 'json',
                    data: {
                        item_id: item_id,
                        item_name: item_name,
                        price: price,
                        quantity: quantity,
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(data) {
                        if(data.status){
                            window.location.replace("{{route('showCart')}}");
                        }
                        else{
                            if(data.msg=='Not Login'){
                                window.location.replace("{{ route('login') }}");
                            }
                        }               
                    },
                    error: function(){
                        window.location.reload();
                    },
                    beforeSend: function() {
                        //do something
                    }
                });


            }
        });

    });
</script>
@endif
@endsection