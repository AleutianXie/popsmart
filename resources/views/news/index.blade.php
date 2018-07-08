@extends('layouts.cici')

@section('title', '新闻')

@section('content')

<div class="news_main">
    <news-list news="{{ json_encode($news) }}"></news-list>
    {{ $news->links('pagination::cici') }}
</div>
@endsection