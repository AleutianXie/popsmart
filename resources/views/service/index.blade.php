@extends('layouts.cici')

@section('title', '服务')

@section('content')
    <div class="casepage">
        <div class="gg_title">
            <h1>服务项目</h1>
            <div class="line"></div>
            <p>SERVICE ITEMS</p>
        </div>
        <div class="boxmain">
            <module-list modules="{{ $modules }}" cur="{{ $cur }}"></module-list>
            <service-list services="{{ json_encode($services) }}"></service-list>
        </div>
    </div>

@endsection