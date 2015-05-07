<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet"
          href="/cargo/home/Home/Common/main/css/bootstrap-combined.min.css"><!--调用bootstrap-->
    <link href="/cargo/home/Home/Common/main/css/main.css" rel="stylesheet" type="text/css" />    <!--调用外部的css样式表-->
    <script src="/cargo/home/Home/Common/main/js/html5shiv.min.js"></script>
    <script src="/cargo/home/Home/Common/main/js/respond.min.js"></script>
    <title>Car</title>
</head>
<body>
<!--包含到页面头部的标题和导航条
<iframe src="/cargo/index.php/Home/Main/header" scrolling=no width="100%"height="95px" frameborder=0></iframe>-->

<div class="header">
<img src="/cargo/home/Home/Common/main/image/run.png" width="500px" height="40px">
</div>
<div class="header_box">
    <div class='navbar navbar-inverse'>     <!--使用bootstrap的nav类创建导航元素-->
        <div class='nav-collapse' style="height: auto;">
            <menu class="nav" style="font-size: 22px">
                <li class="active"><a href="#">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp网站主页</a></li>
                <li class="active"><a href="#">新款上市</a></li>
                <li class="active"><a href="#">促销特价</a></li>
                <li class="active"><a href="#">门店查询</a></li>
                <li class="active"><a href="#">售后评价</a></li>
                <li class="active"><a href="#">联系我们</a></li>
            </menu>
        </div>
    </div>
</div>

<div class="container_left">
   <div class="left_header">
       <div style="text-align: center">
           <select name="">
               <option value="">品牌</option>
               <option value="">丰田</option>
               <option value="">骐铃</option>
               <option value="">奥迪</option>
               <option value="">阿斯顿·马丁</option>
               <option value="">宝马</option>
               <option value="">奔驰</option>
               <option value="">别克</option>
           </select>
           <select name="">
               <option value="">车源地</option>
               <option value="">北京</option>
               <option value="">广州</option>
               <option value="">深圳</option>
               <option value="">成都</option>
               <option value="">上海</option>
               <option value="">东北</option>
               <option value="">杭州</option>
           </select>
         <table class="table" bgcolor="#E0E0E0" algin="center">
          <tr>
           <td>价格:</td>
           <td><a href="#">5万以下|</a>
               <a href="#">5-15万|</a>
               <a href="#">15-30万|</a>
               <a href="#">30-60万|</a>
               <a href="#">60-100万|</a>
               <a href="#">80万以上|</a>
           </td>
          </tr>
          <tr>
          <td>级别:</td>
           <td><a href="#">两厢</a>
               <a href="#">三厢</a>
               <a href="#">微面车</a>
               <a href="#">豪华车</a>
               <a href="#">新能源车</a>
               <a href="#">SUV越野车</a>
               <a href="#">MPV商务车</a>
           </td>
           <tr>
           <td>排量:</td>
           <td><a href="#">1.0L以下</a>
               <a href="#">1.0-1.4L</a>
               <a href="#">1.4-1.6L</a>
               <a href="#">1.6-2.0L</a>
               <a href="#">2.0-2.5L</a>
               <a href="#">2.5L以上</a>
           </td>
           </tr>
           <tr>
           <td>变速箱:</td>
           <td><a href="#">手动</a>
               <a href="#">自动</a>
           </td>
           </tr>
         </table>
           </dl>
       </div>
       </div>
    <!--商品列表-->
    <div class="car_body">
        <div class='navbar navbar-inverse'>
            <div class='nav-collapse'>
                <div class="left1">
                    <a href="#" target="_blank">
                        <img src="../ps/9.jpg" width="300" height="200">
                    </a></li>
                </div>
                <div class="right">
                    <h3>2015款卡宴混合动力 S E-Hybrid</h3>
                    <p>车源所在地：广东- 广州市  </p>
                    <p>限量：：<strong>2台</strong></p>
                    <p>咨询电话：<strong>400-8888-888</strong></p>
                    <p><del>参考价：&yen;348,000</del></p>
                    <p>限时特价：&yen;<strong>300,000</strong></p>
                    <span><button type="submit" class="btn btn-danger" onclick="">我要买</button></span>
                    <span><button type="submit" class="btn btn-danger" onclick="">详细咨询</button></span>
                    <span><button type="submit" class="btn btn-danger" onclick="">加入收藏</button></span>
                </div>
            </div>
        </div>
    </div>

    <div class="car_body">
        <div class='navbar navbar-inverse'>
            <div class='nav-collapse'>
                <div class="left1">
                    <a href="#" target="_blank">
                        <img src="../ps/7.jpg" width="300" height="200">
                    </a></li>
                </div>
                <div class="right">
                    <h3>2014款古思特 6.6T 加长版</h3>
                    <p>车源所在地：四川- 成都市</p>
                    <p>咨询电话：<strong>400-8888-888</strong></p>
                    <p><del>参考价：&yen;512,000</del></p>
                    <p>限时特价：&yen;<strong>480,000</strong></p>
                    <span><button type="submit" class="btn btn-danger" onclick="">我要买</button></span>
                    <span><button type="submit" class="btn btn-danger" onclick="">详细咨询</button></span>
                    <span><button type="submit" class="btn btn-danger" onclick="">加入收藏</button></span>
                </div>
            </div>
        </div>
    </div>

    <div class="car_body">
        <div class='navbar navbar-inverse'>
            <div class='nav-collapse'>
                <div class="left1">
                    <a href="#" target="_blank">
                        <img src="../ps/3.jpg" width="300" height="200">
                    </a></li>
                </div>
                <div class="right">
                    <h3>2014款奥迪A8L 6.3 FSI W12 quattro旗舰型</h3>
                    <p>车源所在地：北京- 北京市</p>
                    <p>咨询电话：<strong>400-8888-888</strong></p>
                    <p><del>参考价：&yen;2,612,000</del></p>
                    <p>限时特价：&yen;<strong>2,390,000</strong></p>
                    <span><button type="submit" class="btn btn-danger" onclick="">我要买</button></span>
                    <span><button type="submit" class="btn btn-danger" onclick="">详细咨询</button></span>
                    <span><button type="submit" class="btn btn-danger" onclick="">加入收藏</button></span>                </div>
            </div>
        </div>
    </div>

    <div class="car_body">
        <div class='navbar navbar-inverse'>
            <div class='nav-collapse'>
                <div class="left1">
                    <a href="#" target="_blank">
                        <img src="../ps/112.jpg" width="300" height="200">
                    </a></li>
                </div>
                <div class="right">
                    <h3>2015款碧莲 4.5L 尊贵VIP版(12座)</h3>
                    <p>车源所在地：广东- 广州市</p>
                    <p>咨询电话：<strong>400-8888-888</strong></p>
                    <p><del>参考价：&yen;348,000</del></p>
                    <p>限时特价：&yen;<strong>300,000</strong></p>
                    <span><button type="submit" class="btn btn-danger" onclick="">我要买</button></span>
                    <span><button type="submit" class="btn btn-danger" onclick="">详细咨询</button></span>
                    <span><button type="submit" class="btn btn-danger" onclick="">加入收藏</button></span>
                </div>
            </div>
        </div>
    </div>
<center> <a href='#'>首页 </a> |
    <a href='#'>上一页 </a> |
    <a href='#'>下一页 </a> |
    <a href='#'>尾页 </a>
</center>


</div>
    </div>
<div class="container_right1">
    <h3>最新资讯</h3>
        <p>日系车2015在华低调反击，主攻SUV;</p>
        凯迪拉克XT5将成为凯迪拉克SRX的继任者;
        <p>2015.1月汽车库存预警达56.3%; </p>
        <p></p>
</div>

<div class="container_right2">
    <h3>车主晒单</h3>
    <marquee direction="up"behavior="scroll" loop="3"
             scrollamount="1"scrolldelay="20"
             width="200">
        <p>1.昨天我去深圳xx供销商的二手车点看了，价格算合理，服务人员态度也很不错。</br>
        2.我和朋友去广州看了车，和网站内里介绍的一样，各种齐全，也上保险了，一切准备妥当，只等上路了。</br>
        3.请问发动机出了点问题，去哪家汽修厂比较好些？；
        </br><!--不换行标记-->
        </p>
    </marquee>
</div>


</div>

<!--<iframe src="/cargo/index.php/Home/Main/footer" scrolling=no width="100%"height="220px" frameborder=0></iframe>-->

<div class="footer">
    <h3>联系我们</h3>
    <p>客服电话：400-8888-888</p>
    <p>邮箱：service@Cargo.com</p>
    <p>地址：广州市大学城广东工业大学</p>
    <p>邮编：510006</p>
Copyright &copy; 2015-2020 Cargo.com All Rights Reserved　
</div>

</body>
</html>