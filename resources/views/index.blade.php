@extends('layouts.cici')

@section('title', '首页')

@section('content')
    @if (count($banners) > 0)
        <!---banner---->
        <div class="banner active" style="margin-top: -20px;">
            <!--Basic example-->
            <div class="flicker-example clearfix" data-block-text="false">
                <ul>
                    @foreach ($banners as $item)

                        <li data-background="{{ $item->pic }}">
                            <div class="banner_txt">
                                @empty ($item->name)
                                @else
                                    <h2>{{ $item->name }}</h2>
                                @endempty
                                @empty ($item->summary)
                                @else
                                    <dl>
                                        {{ $item->summary }}
                                    </dl>
                                @endempty
                            </div>
                            <a href="{{ $item->link }}"></a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <!---banner---->
    @endif

    @if (!empty($news))
        <div class="c-update">
            <div class="boxmain clearfix">
                <div class="c-update-l">
                    <h4>@if ($news->is_today) 今日最新 @else {{ $news->created_at->toDateString() }}@endif</h4>
                    <div class="line"></div>
                    <dl>
                        <dt><a href="{{ route('news.detail', $news->id) }}"></a>{{ $news->name }}</dt>
                        <div class="line"></div>
                        <dd>{{ $news->summary }}</dd>
                    </dl>
                </div>
                <div class="c-update-r">
                    <img src="{{ $news->cover }}" alt="{{ $news->name }}" />
                </div>
            </div>
        </div>
    @endif

    @if (count($series) > 0)
        <div class="c1">
            <div class="gg_title">
                <h1>我们的产品</h1>
                <div class="line"></div>
                <p>OUR PRODUCTS</p>
            </div>
            <div class="boxmain">
                {{--<div class="ColumnOnenav">--}}
                {{--@foreach ($series as $item)--}}
                {{--<li class=""><a href="#tab{{ $loop->iteration }}">{{ $item->name }}</a></li>--}}
                {{--@endforeach--}}
                {{--</div>--}}

                <div class="c1_list clearfix">
                    <ul>
                        @foreach ($series as $item)
                            <li>
                                <a @if(isset($item->is_url) && !empty($item->is_url)) href="{{ $item->is_url }}" @else href="{{ route('product.detail', $item->id) }}"@endif>
                                    <div class="c1_img"><img src="{{ $item->icon }}" alt="{{ $item->name }}"></div>
                                    <div class="c1_titleText">{{ $item->name }}</div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                {{--@foreach ($products as $listItem)--}}
                {{--<div class="c1_list clearfix" id="tab{{ $loop->iteration }}"--}}
                {{--@if ($loop->first)--}}
                {{--style="display: block;" @else style="display: none;" --}}
                {{--@endif>--}}
                {{--<ul>--}}
                {{--@foreach ($listItem as $item)--}}
                {{--<li>--}}
                {{--<a @if(isset($item->is_url) && !empty($item->is_url)) href="{{ $item->is_url }}" @else href="{{ route('product.detail', $item->id) }}"@endif>--}}
                {{--<div class="c1_img"><img src="{{ $item->cover }}" alt="{{ $item->name }}"></div>--}}
                {{--<div class="c1_titleText">{{ $item->name }}</div>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--@endforeach--}}
                {{--</ul>--}}
                {{--</div>--}}
                {{--@endforeach--}}
            </div>
        </div>
    @endif

    {{--     @if (count($cases) > 0)
        <div class="c-case">
            <div class="c-case-l">
                @foreach ($cases as $item)
                    <div><img src="{{ $item->cover }}" alt="{{ $item->name }}" class="case{{ $loop->iteration }}"></div>
                @endforeach
            </div>
            <div class="c-case-r">
                <div class="cont">
                    <a href="{{ route('cases') }}">查看更多<span>&gt;</span></a>
                </div>
                <img src="images/case_more.jpg" alt="更多..." style="width: 100%;" />
            </div>
        </div>
        @endif --}}

    {{--    @if (count($modules) > 0)
       <div class="c-service">
               <div class="gg_title">
                   <h1>服务内容</h1>
                   <div class="line"></div>
                   <p>利用无人机结合航空摄影测量技术,快速采集数据,提供4D(DOM、DLG、DEM、DRG)产品<br/>制作，改变传统测绘作业模式</p>
               </div>
           <div class="boxmain">
               <div class="c2_list clearfix">
                   <ul>
                       @foreach ($modules as $item)
                           <li>
                               <a href="/service?module={{ $item->id }}">
                                   <div class="c2_img"><div><img src="{{ $item->icon }}" alt="{{ $item->name }}"></div></div>
                                   <div class="c2_ch">{{ $item->name }}</div>
                               </a>
                           </li>
                       @endforeach
                   </ul>
               </div>
           </div>
       </div>
       @endif --}}

    <div class="solution">
        <div class="gg_title">
            <h1>解决方案</h1>
            <div class="line"></div>
            <p>Our Solution</p>
        </div>
        <div class="boxmain">
            <div class="solution_l">
                <h2>行业应用</h2>
                {{--                 <ul>
                                    <li><a href="" class="active">城市管理</a></li>
                                    <li><a href="">电力应用</a></li>
                                    <li><a href="">测绘</a></li>
                                    <li><a href="">工程建设</a></li>
                                    <li><a href="">古建筑/展览/博物馆</a></li>
                                </ul> --}}
                <ul>
                    @foreach ($modules as $module)
                        <li><a href="javascript:void(0);" @if ($loop->first) class="active" @endif>{{ $module->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            @foreach ($services as $key => $serviceList)
                <div @if ($loop->first) class="solution_r" @else class="d-none solution_r" @endif>
                    <h2>解决方案</h2>
                    <ul>
                        @if (!empty($serviceList))
                            @foreach ($serviceList as $service)
                                <li><a href="{{ route('service.detail', $service->id) }}" target="_blank" @if ($loop->first) class="active" @endif>{{ $service->name }}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            @endforeach

            {{--             <div class="solution_r">
                            <h2>解决方案</h2>
                            <ul>
                                <li><a href="" class="active">PopCity</a></li>
                                <li><a href="">测量</a></li>
                                <li><a href="">倾斜系统获取处理</a></li>
                                <li><a href="">无人机遥感技术</a></li>
                                <li><a href="">施工监测</a></li>
                                <li><a href="">数字化平面图</a></li>
                                <li><a href="">实景三维地图</a></li>
                                <li><a href="">室内导航</a></li>
                                <li><a href="">虚拟现实</a></li>
                            </ul>
                        </div> --}}
        </div>
        <div class="videoPlay">
            <img class="play_btn" src="images/play_btn.png" alt="play_btn" style="">
            <video src="images/video.mp4" poster="images/gxt.png"></video>
        </div>
    </div>

    <div class="c-aboutus">
        <a href="{{ route('about') }}"><img src="images/aboutus.jpg" alt="关于宝略" /></a>
    </div>

@endsection
