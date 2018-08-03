@extends('layouts.cici')

@section('title', $product->name)

@section('content')
    <div class="joinbox">
        <div class="boxmain">
            <div class="content">
                <div class="list">
                    {!! $product->content !!}
                </div>
            </div>
        </div>
    </div>
@endsection