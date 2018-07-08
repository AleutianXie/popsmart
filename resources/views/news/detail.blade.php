@extends('layouts.cici')

@section('title', $news->name)

@section('content')
    <div class="joinbox">
        <div class="boxmain">
            <div class="content">
                <div class="list">
                    {!! $news->content !!}
                </div>
            </div>
        </div>
    </div>
@endsection