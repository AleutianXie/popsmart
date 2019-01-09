@extends('layouts.cici')

@section('title', '产品')
@section('css')
    <style>
        .boxmain{max-width:1200px}.casepage .ColumnOnenav{display:flex;justify-content:center;align-items:center;flex-wrap:wrap}.casepage .ColumnOnenav li:hover{color:#333}.casepage .ColumnOnenav li{max-width:450px;padding:0;overflow:hidden;margin:15px;cursor:default}.casepage .ColumnOnenav li.cur{color:#333}.product-item{width:25%}.casepage .ColumnOnenav li img{width:100%}.casepage .ColumnOnenav li p{font-size:14px;color:#666}.casepage .ColumnOnenav li a{font-size:12px;color:#000}.product-desc{padding:10px 0;display:inline-block}@media screen and (max-width: 1000px){.casepage .ColumnOnenav{flex-direction:column}.product-item{width:100%}}
    </style>
@endsection
@section('content')
<div class="casepage">
    <div class="gg_title">
        <h1>我们的产品</h1>
        <div class="line"></div>
        <p>OUR PRODUCTS</p>
    </div>
    <div class="boxmain">
        <div class="ColumnOnenav" style="cursor: default;">
            @foreach($products as $product)
                <div class="product-item">
                    <li class="c1_img">
                        <a href="@if($product->is_url) {{$product->is_url}} @else /product/{{$product->id}} @endif">
                        <img src="{{$product->icon}}" alt="">
                        <span class="product-desc">
                            <h5>{{$product->name}}</h5>
                            <p>{{$product->overview}}</p>
                        </span>
                        </a>
                    </li>
                </div>
            @endforeach
        </div>
    </div>
    {{ $products->links('pagination::cici') }}
</div>

@endsection