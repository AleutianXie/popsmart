<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, minimum-scale=1,initial-scale=1, maximum-scale=1, user-scalable=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta content="telephone=no" name="format-detection">
    <meta http-equiv="Page-Enter" Content="revealTrans(duration=5, transition=2)">
    <meta http-equiv="Page-Exit" Content="revealTrans(duration=5, transition=2)">
    <meta name="keywords" content="">
    <meta name="description" content="">


    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @section('css')
    @show
</head>
<body>
    <div id="app">
    <!---头部---->
    <div class="top clearfix">
        <div class="logo fl"><a href="index.html"><img src="images/logo.png"></a></div>
        <div class="pc_nav fl clearfix">
            <ul>
                <li class="on"><a href="index.html">首页</a></li>
                <li ><a href="about.html">新闻</a></li>
                <li ><a href="pro.html">产品</a></li>
                <li ><a href="join.html">案例</a></li>
                <li ><a href="news.html">服务</a></li>
                <li ><a href="job.html">关于我们</a></li>
            </ul>
        </div>
    </div>
    <div class="mobile-inner-header clearfix" id="header">
        <div class="ph_logo fl"><a href="/" class="alist"><img src="images/logo.png"></a></div>
        <div class="mobile-inner-header-icon mobile-inner-header-icon-out"><span></span><span></span></div>
    </div>
    <div class="mobile-inner-nav">
        <a href="index.html" class="alist">首页</a>
        <a href="about.html" class="alist">新闻</a>
        <a href="pro.html" class="alist">产品</a>
        <a href="join.html" class="alist">案例</a>
        <a href="news.html" class="alist">服务</a>
        <a href="job.html" class="alist">关于我们</a>
    </div>
    <!---头部---->
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
                    <dt>国内和国外<br/>有哪些著名的无人机公司？</dt>     
                    <div class="line"></div>
                    <dd>Dji uav, I'm afraid nobody knows, and it is said that the headlines have contributed a lot. But before that, dji had sold well. According to Reuters, the xinjiang innovative products in the United States commercial unmanned aerial vehicle (uav) market.</dd>
                </dl>
            </div>
            <div class="c-update-r">
                <img src="images/t-update.jpg" alt="" />
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
                <li class=""><a href="#tab1">固定翼</a></li>
                <li><a href="#tab2">旋翼</a></li>
                <li><a href="#tab3">扫描仪</a></li>
            </div>
            <div class="c1_list clearfix" id="tab1" style="display: block;">
                <ul>
                    <li>
                        <a href="#">
                            <div class="c1_img"><img src="images/products_1.png"></div>
                            <div class="c1_titleText">D200</div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="c1_img"><img src="images/products_2.png"></div>
                            <div class="c1_titleText">F1000-1</div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="c1_img"><img src="images/products_3.png"></div>
                            <div class="c1_titleText">F1000-12</div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="c1_img"><img src="images/products_4.png"></div>
                            <div class="c1_titleText">F200-11</div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="c1_img"><img src="images/products_1.png"></div>
                            <div class="c1_titleText">D200</div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="c1_img"><img src="images/products_2.png"></div>
                            <div class="c1_titleText">F1000-1</div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="c1_img"><img src="images/products_3.png"></div>
                            <div class="c1_titleText">F1000-12</div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="c1_img"><img src="images/products_4.png"></div>
                            <div class="c1_titleText">F200-11</div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="c1_list clearfix" id="tab2" style="display: none;">
                <ul>
                    <li>
                        <a href="#">
                            <div class="c1_img"><img src="images/products_1.png"></div>
                            <div class="c1_titleText">2D200</div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="c1_img"><img src="images/products_2.png"></div>
                            <div class="c1_titleText">F1000-1</div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="c1_img"><img src="images/products_3.png"></div>
                            <div class="c1_titleText">F1000-12</div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="c1_img"><img src="images/products_4.png"></div>
                            <div class="c1_titleText">F200-11</div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="c1_img"><img src="images/products_1.png"></div>
                            <div class="c1_titleText">D200</div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="c1_img"><img src="images/products_2.png"></div>
                            <div class="c1_titleText">F1000-1</div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="c1_img"><img src="images/products_3.png"></div>
                            <div class="c1_titleText">F1000-12</div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="c1_img"><img src="images/products_4.png"></div>
                            <div class="c1_titleText">F200-11</div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="c1_list clearfix" id="tab3" style="display: none;">
                <ul>
                    <li>
                        <a href="#">
                            <div class="c1_img"><img src="images/products_1.png"></div>
                            <div class="c1_titleText">3D200</div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="c1_img"><img src="images/products_2.png"></div>
                            <div class="c1_titleText">F1000-1</div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="c1_img"><img src="images/products_3.png"></div>
                            <div class="c1_titleText">F1000-12</div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="c1_img"><img src="images/products_4.png"></div>
                            <div class="c1_titleText">F200-11</div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="c1_img"><img src="images/products_1.png"></div>
                            <div class="c1_titleText">D200</div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="c1_img"><img src="images/products_2.png"></div>
                            <div class="c1_titleText">F1000-1</div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="c1_img"><img src="images/products_3.png"></div>
                            <div class="c1_titleText">F1000-12</div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="c1_img"><img src="images/products_4.png"></div>
                            <div class="c1_titleText">F200-11</div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="c-case">
        <div class="c-case-l">
            <img src="images/case_1.jpg" alt="" />
        </div>
        <div class="c-case-r">
            <a href="#" title=""><img src="images/case_more.jpg" alt="" /></a>
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
                    <li>
                        <a href="javascript:;">
                            <div class="c2_img"><div><img src="images/service_1.png"></div></div>
                            <div class="c2_ch">无人机技术服务</div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <div class="c2_img"><div><img src="images/service_2.png"></div></div>
                            <div class="c2_ch">室内数字化</div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <div class="c2_img"><div><img src="images/service_3.png"></div></div>
                            <div class="c2_ch">地理信息系统</div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <div class="c2_img"><div><img src="images/service_4.png"></div></div>
                            <div class="c2_ch">BIM运维</div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="c-aboutus">
        <a href="#" title=""><img src="images/aboutus.jpg" alt="" /></a>
    </div>


    <div class="footer">
        <div class="footer_top">
            <div class="boxmain">
                <div class="footer_topmain clearfix">
                    <div class="footer_left fl clearfix">
                       <div class="footer_img">
                            <img src="images/ewm.jpg" /> 
                        </div>
                    </div>
                    <div class="footer_right fl clearfix">
                        <ul>
                            <li class="footer_navTitle"><a href="#">产品</a></li>
                            <li><a href="#">飞马智能航测系统</a></li>
                            <li><a href="#">MD四旋翼无人机系统</a></li>
                            <li><a href="#">室内移动扫描系统</a></li>
                        </ul>
                        <ul>
                            <li class="footer_navTitle"><a href="#">服务</a></li>
                            <li><a href="#">无人机技术服务</a></li>
                            <li><a href="#">室内数字化</a></li>
                            <li><a href="#">地理信息系统</a></li>
                            <li><a href="#">BIM运维</a></li>
                        </ul>
                        <ul>
                            <li class="footer_navTitle"><a href="#">技术支持</a></li>
                            <li><a href="#">无人机技术服务</a></li>
                            <li><a href="#">室内数字化</a></li>
                            <li><a href="#">地理信息系统</a></li>
                            <li><a href="#">BIM运维</a></li>
                        </ul>
                        <ul>
                            <li class="footer_navTitle"><a href="#">关于我们</a></li>
                            <li><a href="#">关于宝略</a></li>
                            <li><a href="#">加入我们</a></li>
                            <li><a href="#">联系我们</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_bottom">
            <div class="boxmain">
                <ul>
                    <li class="tel">Tel：0574 - 55125939</li>
                    <li class="add">Add：浙江省宁波市鄞州区学士路655号科技孵化园E栋912、913室</li>
                    <li class="web">Web：www.popsmart.cn</li>
                </ul>
            </div>
        </div>
    </div>


        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @section('js')
    @show
</body>
</html>
