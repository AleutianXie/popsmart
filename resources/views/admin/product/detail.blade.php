@extends('adminlte::page')

@section('content_header')
    <h1>product</h1>
@stop

@section('content')
    <p>detail!</p>
    @foreach ($product as $element)
        {{ $element }}
    @endforeach
@stop