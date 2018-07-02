@extends('layouts.cici')

@section('title', $cases->name)

@section('content')
    <div class="joinbox">
        <div class="boxmain">
            <div class="content">
                <div class="list">
                    {!! $cases->content !!}
                </div>
            </div>
        </div>
    </div>
@endsection