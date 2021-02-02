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
<main class="page catalog-page">
    <section class="clean-block clean-catalog dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Catalogue Page</h2>
                <p>CNY Sales Shop now!</p>
            </div>
            <div class="content">
                @if($result['header']['X-WP-Total'] == '0')
                <h4>System Maintenance</h4>
                @else
                <div class="row">
                    <div class="col-md-12">
                    <div class="col-12 pt-3 text-right"> Showing <b>10</b> of <b>{{$result['header']['X-WP-Total']}}</b> products</div>
                        <div class="products p-3">
                            <div class="row no-gutters">
                                @foreach($result['body'] as $product)
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="clean-product-item">
                                        <div class="image"><a href="{{ url('/') }}/product/{{$product->id}}"><img class="img-fluid d-block mx-auto" src="{{$product->images[0]->src}}"></a></div>
                                        <div class="product-name"><a href="{{ url('/') }}/product/{{$product->id}}">{{$product->name}}</a>
                                        @php
                                        if(strlen($product->name)<35){
                                            echo '<br><br>';
                                        }
                                        @endphp
                                        </div>
                                        <div class="about">
                                                @if($product->type=='variable')

                                                @foreach($product->variations as $price)
                                                @php
                                                if($loop->first){
                                                $lowest = $highest = $price->regular_price;
                                                }
                                                else{
                                                if($price->regular_price>$highest){
                                                $highest = $price->regular_price;
                                                }
                                                if($price->regular_price<$lowest){ $lowest=$price->regular_price;
                                                    }
                                                    }
                                                    @endphp
                                                    @endforeach
                                                    @if($lowest==$highest)
                                                    <h6>RM {{number_format($lowest,2)}}</h6>
                                                    @else
                                                    <h6>RM {{number_format($lowest,2)}} - RM {{number_format($highest,2)}}</h6>
                                                    @endif
                                                    @else
                                                    @if($product->regular_price!='')
                                                    <h6>RM {{number_format($product->regular_price,2)}}</h6>
                                                    @else
                                                    <h6></h6>
                                                    @endif
                                                    @endif
                                                    <a class="btn btn-primary btn-sm" href="{{ url('/') }}/product/{{$product->id}}"  type="button"><i class="icon-basket"></i>
                                                    Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <nav>
                                <ul class="pagination">
                                    @php
                                    $total_page = $result['header']['X-WP-TotalPages'];
                                    if($current_page==1){
                                        echo '<li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>';
                                    }
                                    else{
                                        $prev_link= route('catalogueList').'/'.($current_page-1);
                                        echo '<li class="page-item"><a class="page-link" href="'.$prev_link.'" aria-label="Previous"><span aria-hidden="true">«</span></a></li>';
                                    }

                                    for($i=1;$i<=$total_page;$i++){ 
                                        if($i==$current_page){ 
                                            echo '<li class="page-item active"><span class="page-link">' .$i.'</span></li>';
                                        }
                                        else{
                                            $link = route('catalogueList')."/$i";
                                            echo '<li class="page-item"><a class="page-link" href="'.$link.'">'.$i.'</a></li>';
                                        }
                                    }
                                    if($current_page==$total_page){
                                        echo '<li class="page-item disabled"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>';
                                    }
                                    else{
                                        $next_link= route('catalogueList').'/'.($current_page+1);
                                        echo '<li class="page-item"><a class="page-link" href="'.$next_link.'" aria-label="Next"><span aria-hidden="true">»</span></a></li>';
                                    }
                                    @endphp
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
</main>
@endsection