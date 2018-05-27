@extends('adminlte::page')

@section('content_header')
    <h1>case</h1>
@stop

@section('content')
    <p>detail!</p>
    @foreach ($cases as $element)
        {{ $element }}
    @endforeach
@stop