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
            <div><img class="case1" src="images/case_1.jpg" alt="" /></div>
            <div><img class="case2" src="images/case_2.jpg" alt="" /></div>
            <div><img class="case3" src="images/case_3.jpg" alt="" /></div>
            <div><img class="case4" src="images/case_4.jpg" alt="" /></div>
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

@endsection