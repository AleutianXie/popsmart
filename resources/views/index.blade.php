@extends('layouts.cici')

@section('title', '首页')

@section('content')
    <!---banner---->
    <div class="banner active">
        <!--Basic example-->
        <div class="flicker-example clearfix" data-block-text="false">
            <ul>
              <li data-background="images/banner1.jpg">
                    <a href="#"></a>
                </li><li data-background="images/banner2.jpg">
                    <a href="#"></a>
                </li>
            </ul>
        </div>
    </div>
    <!---banner---->

    <div class="c-update">
        <div class="boxmain clearfix">
            <div class="c-update-l">
                <h4>今日最新</h4>
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

    <div class="c1">
        <div class="gg_title">
            <h1>我们的产品</h1>
            <div class="line"></div>
            <p>OUR PRODUCTS</p>
        </div>
        <div class="boxmain">
            <div class="ColumnOnenav">
                @foreach ($series as $item)
                    <li class=""><a href="#tab{{ $loop->iteration }}">{{ $item->name }}</a></li>
                @endforeach
            </div>
            @foreach ($products as $listItem)
                <div class="c1_list clearfix" id="tab{{ $loop->iteration }}"
                    @if ($loop->first)
                        style="display: block;" @else style="display: none;" 
                    @endif>
                    <ul>
                        @foreach ($listItem as $item)
                            <li>
                                <a href="{{ route('product.detail', $item->id) }}">
                                    <div class="c1_img"><img src="{{ $item->cover }}" alt="{{ $item->name }}"></div>
                                    <div class="c1_titleText">{{ $item->name }}</div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>

    <div class="c-case">
        <div class="c-case-l">
            @foreach ($cases as $item)
                <div><img src="{{ $item->cover }}" alt="{{ $item->name }}" class="case{{ $loop->iteration }}"></div>
            @endforeach
        </div>
        <div class="c-case-r">
            <a href="{{ route('cases') }}"><img src="images/case_more.jpg" alt="更多..." /></a>
        </div>
    </div>

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

    <div class="c-aboutus">
        <a href="{{ route('about') }}"><img src="images/aboutus.jpg" alt="关于宝略" /></a>
    </div>

@endsection