@extends('layouts.cici')

@section('title', '联系我们')

@section('content')
    <div class="joinTop">
        <div class="gg_title">
            <h1>我们始终坚持以人为本、创新为根、客户至上为出发点,全力协助客户发挥最大的潜力,创造更大的价值。</h1>
        </div>
    </div>
    <div class="joinbox">
        <div class="boxmain">
            <div class="nav">
                <ul>
                    <li><a href="{{ route('about') }}" title="about">关于我们</a></li>
                    <li><a href="{{ route('about', 'join') }}" title="join">加入我们</a></li>
                    <li><a href="{{ route('about', 'contact') }}" title="contact" class="cur">联系我们</a></li>
                </ul>
            </div>
            <div class="content">
                <div class="list">
                    {!! $article->content !!}
                </div>
            </div>
        </div>
    </div>
@endsection