@extends('layouts.cici')

@section('title', '案例')

@section('content')
    <div class="casepage">
        <div class="gg_title">
            <h1>我们的案例</h1>
            <div class="line"></div>
            <p>OUR CASE</p>
        </div>
        <div class="boxmain">
            <case-cate cates="{{ $categories }}" cur="{{ $cur }}"></case-cate>
            <case-list cases="{{ $cases }}"></case-list>
        </div>
    </div>
@endsection