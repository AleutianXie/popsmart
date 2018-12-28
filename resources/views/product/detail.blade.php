@extends('layouts.cici')

@section('title', $product->name)
@section('css')
    <style>
        .proTop {
            margin-top: -20px;
        }
    </style>
@endsection
@section('content')
    <div class="proTop">
        <div class="gg_title">
            <h1>简单的航测，不简单的无人机</h1>
            <p>Simple navigation, not a simple drone.</p>
            <div class="line"></div>
            <p>飞马智能航测系统</p>
        </div>
    </div>
    <div class="product_main">
        <div class="boxmain">
            <product-list products="{{ json_encode($product->products) }}"></product-list>
        </div>
    </div>
@endsection