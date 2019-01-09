@extends('layouts.cici')

@section('title', '新闻')
@section('css')
    <style>
        .page a.on, .page a:hover {background: #246af8;-webkit-border-radius: 10%;-moz-border-radius: 10%;border-radius: 10%;}.page span,.page a{-webkit-border-radius: 10%;-moz-border-radius: 10%;border-radius: 10%;margin-left: 5px;}.float-right {margin-top: -70px;}
    </style>
@endsection
@section('content')

    <div class="news_main">
        <news-list news="{{ json_encode($news) }}"></news-list>
        {{ $news->links('pagination::cici') }}
    </div>
@endsection