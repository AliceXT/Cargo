<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet"
          href="/cargo/home/Home/Common/main/css/bootstrap-combined.min.css"><!--调用bootstrap-->
    <link href="/cargo/home/Home/Common/main/css/main.css" rel="stylesheet" type="text/css" />    <!--调用外部的css样式表-->
    <link href="/cargo/home/Home/Common/main/css/single_car.css" rel="stylesheet" type="text/css" /> 
    <script src="/cargo/home/Home/Common/main/js/html5shiv.min.js"></script>
    <script src="/cargo/home/Home/Common/main/js/respond.min.js"></script>
    <script src="/cargo/home/Home/Common/main/js/tinybox.js"></script><!--弹窗的js--> <script src="/cargo/home/Home/Common/main/js/tab-jquery.min.js"></script>
    <script src="/cargo/home/Home/Common/main/js/tabulous.js"></script>

    <title>Cargo|汽车网上交易平台</title>
</head>

<body>
<div class="header">
<img src="/cargo/home/Home/Common/main/image/run.png"
 width="500px" height="100%">
</div>
<!--
<div class="header_box"> 
    <ol>      
        <li><a href="index.html">网站主页</a></li>
        <li><a href="#">新款上市</a></li>
        <li><a href="#">促销特价</a></li>      
        <li><a href="#">联系我们</a></li>
    </ol>
</div>

--><!--包含到页面头部的标题和导航条-->

<div class="single_car"><!--主体容器-->
   <!--显示目标车辆的基本信息和详细信息--> 
        <div class='navbar navbar-inverse'>
            <div class='nav-collapse'>
                <div class="s_image">
                    <img src="/cargo/home/Home/Common/main/image/7.jpg">           
                </div>
                <div class="s_right">
                    <h3><?php echo ($description); ?></h3>
                    <p>车源所在地：<?php echo ($car["city"]); ?></p>
                    <p>限量：<strong><?php echo ($stock); ?></strong></p>
                    <p>咨询电话：<strong>400-8888-888</strong></p>
                    <p>参考价：&yen;<?php echo ($car["price"]); ?></p>
                    <span><button type="submit" class="btn btn-danger btn-lg" id="BuyInfo">我要买</button></span> 
                    <span><button type="submit" class="btn btn-danger btn-lg" id="">加入收藏</button></span>                
               </div>
            </div>
        </div>
</div><!--End single_car-->

 <div id="s_detail">
    <div id="tabs">
    <ul>
     <li><a href="#tabs-1">基本信息</a></li>
     <li><a href="#tabs-2">车身参数</a></li>
     <li><a href="#tabs-3">发动机参数</a></li>
     <li><a href="#tabs-4">技术参数</a></li>
     <li><a href="#tabs-5">保修政策</a></li>
     <li><a href="#tabs-6">累计评价</a></li>
    </ul>            
    <div id="tabs_container">
        <div id="tabs-1">
            <table border="0" width=100% align="center" cellpadding="4">
              <tr>
                <td>品牌：</td><td><?php echo ($request['brand']); ?></td>                
                <td>型号：</td><td><?php echo ($request['model']); ?></td>
              </tr>
              <tr>
                <td>级别：</td><td><?php echo ($request['type']); ?></td>               
                <td>限量：</td><td><?php echo ($request['stock']); ?></td>               
              </tr>
              <tr>
                <td>车源地：</td><td><?php echo ($request['city']); ?></td>
                <td>供销商：</td><td><?php echo ($request['account']); ?></td> 
              </tr>            
            </table><hr>
          </div>
         <div id="tabs-2">
            <table border="0" width=100% align="center" cellpadding="4">
              <tr>
                <td>长：</td><td><?php echo ($request['length']); ?></td>                
                <td>宽：</td><td><?php echo ($request['width']); ?></td>
                <td>高：</td><td><?php echo ($request['height']); ?></td>
              </tr>
              <tr>
                <td>结构：</td><td><?php echo ($request['door']); ?></td>               
                <td>车重：</td><td><?php echo ($request['weight']); ?></td>
                <td>轴距：</td><td><?php echo ($request['wheelbase']); ?></td>               
              </tr>
              <tr>
                <td>油箱容积：</td><td><?php echo ($request['fuelTank']); ?></td>
                <td>行李箱容积：</td><td><?php echo ($request['trunkSpace']); ?></td>
                </tr>
              <tr>
                <td>最小离地间隙：</td><td><?php echo ($request['groundClearance']); ?></td>
                <td>保修政策：</td><td><?php echo ($request['guarantee']); ?></td>    
              </tr>            
            </table><hr>
        </div>
         <div id="tabs-3">
                 <table border="0" width=100% align="center" cellpadding="4">
              <tr>
                <td>变速箱：</td><td><?php echo ($request['gearbox']); ?></td>
                <td>最高车速：</td><td><?php echo ($request['maxSpeed']); ?></td>
                <td>轮胎规格：</td><td><?php echo ($request['tyre']); ?></td>
              </tr>
              <tr>
                <td>挡位个数：</td><td><?php echo ($request['gearNum']); ?></td>
                <td>驱动方式：</td><td><?php echo ($request['driveType']); ?></td>
                <td>助力类型：</td><td><?php echo ($request['resistanceType']); ?></td               
              </tr>       
            </table><hr>
        </div>
        <div id="tabs-4">
              <table border="0" width=100% align="center" cellpadding="4">
              <tr>
                <td>排量：</td><td><?php echo ($request['displacement']); ?></td>                
                <td>进气形式：</td><td><?php echo ($request['intake']); ?></td>
                <td>汽缸数：</td><td><?php echo ($request['cylinder']); ?></td>
              </tr>
              <tr>
                <td>最大功率：</td><td><?php echo ($request['maxPower']); ?></td>               
                <td>最大扭矩：</td><td><?php echo ($request['maxTorque']); ?></td>
                <td>燃油标号：</td><td><?php echo ($request['fuelLabel']); ?></td>               
              </tr>  
              <tr>
                <td>供油方式：</td><td><?php echo ($request['oilFeed']); ?></td>
                <td>环保标准：</td><td><?php echo ($request['environmental']); ?></td>
              </tr>                   
            </table><hr>
        </div>
        <div id="tabs-5">
<h4>一、保修期内，用户在规定的使用条件下使用，而车辆由于材料、装配及质量问题所造成的故障或零部件的损坏,经厂家授权维修站检验并确认后均由厂家提供无偿维修或更换相应备件。</h4>
<h4>二、购买新车后，厂家都会给用户一个“免费强制保养”，这次保养中的机油、机油滤芯等及相应的工时费由汽车公司支付。若用户不按规定的时间进行强制保养，就会被视为自动放弃保修和质量担保服务权利。</h4>
<h4>三 、在发生故障后，没有及时到维修店维修而继续使用所导致的故障扩大，厂家会酌情赔偿引发原事故的原零部件，而扩大部分的损失由车主自己负责。</h4>
<h4>四 、对于服务站维修操作不当造成的损坏,服务站应当承担由此产生的责任并进行修复；因车辆故障引起的附加费损失均不属于质量担保范围。</h4><hr>
        </div>
        <div id="tabs-6">
            hello
        </div>
    </div><!--End tabs container-->
  </div><!--End tabs-->
</div><!--End s_detail-->
    
    <script type="text/javascript" >
        T$('BuyInfo').onclick = function(){
            TINY.box.show('BuyInfo.html',1,400,350,1)
        }//弹出填写购车需求的窗口
        $(document).ready(function($) {
            $('#tabs').tabulous({effect: 'scaleUp' });
        });//参数表tabs的js
    </script>

<div class="clearfix"></div>
<div class="footer">
</br>
    <h3>联系我们</h3>
    <p>客服电话：400-8888-888</p>
    <p>邮箱：service@Cargo.com</p>
    <p>地址：广东工业大学计算机软件工程1班Car购小组</p>
    <p>邮编：510006</p>
Copyright &copy; 2015-2020 Cargo.com All Rights Reserved　
</div>
<hr>
</body>
</html>