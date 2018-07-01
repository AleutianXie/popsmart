@extends('layouts.cici')

@section('title', '产品')

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
            <product-list products="{{ json_encode($products) }}"></product-list>
            <div class="page">
                  <a class="on" href="javascript:;">1</a><a href="#">2</a> <a href="#">下一页</a> 
            </div>
        </div>
    </div>

@endsection