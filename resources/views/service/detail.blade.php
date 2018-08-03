@extends('layouts.cici')

@section('title', $service->name)

@section('content')
    <div class="joinbox">
        <div class="boxmain">
            <div class="content">
                <div class="list">
                    {!! $service->content !!}
                </div>
            </div>
        </div>
    </div>
@endsection