<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, minimum-scale=1,initial-scale=1, maximum-scale=1, user-scalable=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta content="telephone=no" name="format-detection">
    <meta http-equiv="Page-Enter" content="revealTrans(duration=5, transition=2)">
    <meta http-equiv="Page-Exit" content="revealTrans(duration=5, transition=2)">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <title>{{ config('app.name', 'PopSmart') }} - @yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @section('css')
    @show
    <style>
        .top {
            height: 120px;
        }

        .logo {
            margin: 15px;
        }

        .pc_nav ul li {
            height: 120px;
            line-height: 120px;
        }

        .flickerplate ul.flicks > li {
            background-position: center;
        }

        .pc_nav ul li.on a {
            background: #2162e5 url(/images/pc_nav_icon.png) no-repeat center 90px;
        }

        .pc_nav ul li a:hover {
            background: #2162e5 url(/images/pc_nav_icon.png) no-repeat center 90px;
        }

        .today-new {
            color: #000;
            -webkit-transition: color 0.5s;
            -moz-transition: color 0.5s;
            -ms-transition: color 0.5s;
            -o-transition: color 0.5s;
            transition: color 0.5s;
        }

        .today-new:hover {
            color: #007bff;
        }

        @media only screen and (max-width: 1000px) and (min-width: 0px) {
            .solution_l {
                display: none;
            }

            .solution_r, .videoPlay, .videoPlay video {
                width: 100%;
            }

            .solution_l li, .solution_r li {
                text-align: center;
            }

            .solution_l li a, .solution_r li {
                padding-left: 0;
            }

            .c-update .boxmain .c-update-l h4 {
                width: 100%;
            }

            .joinbox .list img {
                width: 100%;
            }
        }

        @media only screen and (min-width: 1002px) {
            .joinbox .list img {
                width: 80%;
            }

            .popsmart-play-video {
                width: 100%;
                height: 670px;
            }
        }

        .mc-footer{display:flex;justify-content:space-between;align-items:center;font-family:"Microsoft YaHei", sans-serif;color:rgb(76, 76, 76)}.footer_top{padding-bottom:39px}.mc-footer .footer-tel{height:18px;line-height:18px;background:url(/images/ft_icon_1.jpg) no-repeat 0;background-size:auto 100%;padding-left:30px;font-size:12px;font-family:"Microsoft YaHei", sans-serif}.mc-footer .footer-add{height:18px;line-height:18px;background:url(/images/ft_icon_2.jpg) no-repeat 0;background-size:auto 100%;padding-left:30px;display:flex;font-size:12px;font-family:"Microsoft YaHei", sans-serif}.mc-footer .footer-add span{margin:0 5px 10px 0;display:inline-block}.mc-footer .footer-add>div{}.mc-footer .footer-web{height:18px;line-height:18px;background:url(/images/ft_icon_3.jpg) no-repeat 0;background-size:auto 100%;padding-left:30px;font-size:12px;font-family:"Microsoft YaHei", sans-serif}
    </style>
</head>
<body style="padding-top: 60px;">
<div id="app">
    <!---头部---->
    <div class="top clearfix">
        <div class="logo fl"><a href="/"><img src="/images/logo.png"></a></div>
        <div class="pc_nav fl clearfix">
            <ul>
                <li @if(Request::fullUrl() == route('home')) class="on" @endif><a href="/">首页</a></li>
                <li @if(starts_with(Request::fullUrl(), route('news'))) class="on" @endif><a href="/news">新闻</a></li>
                <li @if(starts_with(Request::fullUrl(), route('product'))) class="on" @endif><a href="/product">产品</a>
                </li>
                <li @if(starts_with(Request::fullUrl(), route('cases'))) class="on" @endif><a href="/case">案例</a></li>
                {{--<li @if(starts_with(Request::fullUrl(), route('service'))) class="on" @endif><a href="/service">解决方案</a></li>--}}
                <li @if(starts_with(Request::fullUrl(), route('about'))) class="on" @endif><a href="/about">关于我们</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="mobile-inner-header clearfix" id="header">
        <div class="ph_logo fl"><a href="/" class="alist"><img src="/images/logo.png"></a></div>
        <div class="mobile-inner-header-icon mobile-inner-header-icon-out"><span></span><span></span></div>
    </div>
    <div class="mobile-inner-nav">
        <a href="/" class="alist">首页</a>
        <a href="/news" class="alist">新闻</a>
        <a href="/product" class="alist">产品</a>
        <a href="/case" class="alist">案例</a>
        <a href="/service" class="alist">服务</a>
        <a href="/about" class="alist">关于我们</a>
    </div>
    <!---头部---->
    @yield('content')
    <div class="footer">
        <div class="footer_top" style="padding-bottom: 0px;padding-top: 10px;">
            <div class="boxmain">
                <div class="footer_topmain clearfix">
                    <div class="footer_left fl clearfix">
                        <div class="footer_img">
                            <img src="/images/ewm.jpg" style="width: 128px;height: 128px;"/>
                        </div>
                    </div>
                    <div class="footer_right fl clearfix" style="line-height: 128px;">
                        <ul>
                            <li><a href="/">首页</a></li>
                        </ul>
                        <ul>
                            <li class=""><a href="/product">产品</a></li>
                            <!-- <li><a href="#">飞马智能航测系统</a></li>
                            <li><a href="#">MD四旋翼无人机系统</a></li>
                            <li><a href="#">室内移动扫描系统</a></li> -->
                        </ul>
                        <ul>
                            <li class=""><a href="/case">解决方案</a></li>
                            <!-- <li><a href="#">无人机技术服务</a></li>
                            <li><a href="#">室内数字化</a></li>
                            <li><a href="#">地理信息系统</a></li>
                            <li><a href="#">BIM运维</a></li> -->
                        </ul>
                        <ul>
                            <li class=""><a href="/about">关于宝略</a></li>
                            <!-- <li><a href="#">关于宝略</a></li>
                            <li><a href="#">加入我们</a></li>
                            <li><a href="#">联系我们</a></li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_bottom footer_top">
            <div class="boxmain mc-footer">
                <div class="footer-tel">
                    <b>Tel：</b>0574 - 55125939
                </div>
                <div class="footer-add">
                    <b>Add：</b>
                    <div>
                        <span>浙江省杭州市江干区红晋路759号禧福汇4-412室 </span>
                        <span style="margin-left: 20px;">湖北武汉市江夏区大花岭正汤大道鸿发大厦A1座1501室</span>
                        <br>
                        <span>浙江省宁波市鄞州区学士路655号科技孵化园E栋912、913室</span>
                    </div>

                </div>
                <div class="footer-web">
                    <b>Web：</b>www.popsmart.cn
                </div>

            </div>
        </div>
        <div style="height: 80px;background: #061A32;color: #ffffff;display: flex;justify-content: center;align-items: center;">
            <span class="text-center">宁波宝略智能科技有限公司 版权所有 {{date('Y')}} PopSmart Technology Co., Ltd. All Rights Reserved | 浙ICP备17033777号-1</span>
        </div>
    </div>
</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
@section('js')
@show
</body>
</html>
