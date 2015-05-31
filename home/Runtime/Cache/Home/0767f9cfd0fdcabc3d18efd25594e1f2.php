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

<div class="contain"><!--主体容器-->
  <div class="container_left"> <!--左部内容-->
    <div class="left_header">
      <h4>
           <select name="">
               <option value="">选择品牌</option>
               <option value="">丰田</option>
               <option value="">骐铃</option>
               <option value="">奥迪</option>
               <option value="">阿斯顿·马丁</option>
               <option value="">宝马</option>
               <option value="">奔驰</option>
               <option value="">别克</option>
           </select>
           <select name="">
               <option value="">选择车源地</option>
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
           <td><a href="#">5万以下</a></td>
            <td><a href="#">5-15万</a></td>
            <td><a href="#">15-30万</a></td>
            <td><a href="#">30-60万</a></td>
            <td><a href="#">60-100万</a></td>
            <td><a href="#">100万以上</a></td>           
        </tr>  
        <tr>
          <td>级别:</td>
           <td><a href="#">两厢</a></td>
           <td><a href="#">三厢</a></td>
           <td><a href="#">豪华车</a></td>
           <td><a href="#">新能源</a></td>
           <td><a href="#">SUV越野车</a></td>
           <td><a href="#">MPV商务车</a></td>
         </tr>
        <tr>
           <td>排量:</td>
           <td><a href="#">1.0L以下</a></td>
            <td><a href="#">1.4-1.6L</a></td>
            <td><a href="#">1.6-2.5L</a></td>
            <td><a href="#">2.5-4.0L</a></td>
            <td><a href="#">4.0L以上</a></td>           
        </tr>
        <tr>
           <td>变速箱:</td>
           <td><a href="#">手动</a>
           <td><a href="#">自动</a></td>
           <td><a href="#">手自一体</a></td>
           <td><a href="#">双离合</a></td>
           <td><a href="#">CVT无级变速</a></td>
        </tr>      
      </table> 
      </h4>  
    </div>

<!--<?php if(is_array($requests)): $i = 0; $__LIST__ = $requests;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$request): $mod = ($i % 2 );++$i;?><div class='navbar navbar-inverse'>
            <div class='nav-collapse'>
                <div class="car_image"><?php echo ($request['id']); ?>
                    <a href="SingleCar.html"><?php echo ($request['picture']); ?>
                        车辆单页
                    </a></li>
                </div>
                <div class="right">
                    <h3><a href="SingleCar.html"><?php echo ($request['description']); ?></a></h3>
                    <p>车源所在地：<?php echo ($request['city']); ?></p>
                    <p>限量：<strong><?php echo ($request['stock']); ?></strong></p>
                    <p>咨询电话：<strong>400-8888-888</strong></p>
                    <p>参考价：&yen;<?php echo ($request['price']); ?></p>
                    <span><button type="submit" class="btn btn-danger btn-lg" id="BuyInfo">我要买</button></span> 
                    <span><button type="submit" class="btn btn-danger btn-lg" onclick="">加入收藏</button></span>
                </div>
            </div>
        </div>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>-->
<div class="cars">
<?php if(is_array($requests)): $i = 0; $__LIST__ = $requests;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$request): $mod = ($i % 2 );++$i;?><div class="car_body">
        <div class='navbar navbar-inverse'>
            <div class='nav-collapse'>
                <div class="car_image">
                    <a href="#" target="_blank">
                        <img src="/cargo/home/Home/Common/main/image/7.jpg">
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
    </div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<!--
    <div class="car_body">
        <div class='navbar navbar-inverse'>
            <div class='nav-collapse'>
                <div class="car_image ">
                    <a href="#" target="_blank">
                        <img src="/cargo/home/Home/Common/main/image/3.jpg">
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
                    <span><button type="submit" class="btn btn-danger" onclick="">加入收藏</button></span>               
                 </div>
            </div>
        </div>
    </div>

    <div class="car_body">
        <div class='navbar navbar-inverse'>
            <div class='nav-collapse'>
                <div class="car_image">
                    <a href="#" target="_blank">
                        <img src="/cargo/home/Home/Common/main/image/112.jpg">
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
  -->
    <style:text-algin='center';> 
    <h4><a href='#'>首页 </a> |
    <a href='#'>上一页 </a> |
    <a href='#'>下一页 </a> |
    <a href='#'>尾页 </a></h4>
    </style>
  </div>

 <div class="container_right">
    <form action="" method="POST" name="myform">
      <div class="login"> 
        <h3>用户登录</h3>             
        <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td><button class="btn btn-primary">用户名</button></td>
                    <td>
                    <input type="text" id="username" required/>
                    </td>
                </tr>               
                <tr>                    
                    <td><button class="btn btn-primary">密码</button></td>
                    <td>
                    <input type="password" id="userpassword" onchange="" pattern="^[a-z A-Z 0-9 _]{8}" required/>
                    </td>
                </tr>            
            </table>
            </br>
            <button type="submit" class="btn btn-primary" name="submit"/>登录</button> 
            未注册？<a href="#"id="UsersRegister">点击注册</a>

    <hr>
        <h3>供销商登录</h3>             
        <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td><button class="btn btn-primary">公司名</button></td>
                    <td>
                    <input type="text" id="supplyname" required/>
                    </td>
                </tr>               
                <tr>                    
                    <td><button class="btn btn-primary">密码</button></td>
                    <td>
                    <input type="password" id="supplypassword" onchange="" pattern="^[a-z A-Z 0-9 _]{8}" required/>
                    </td>
                </tr>            
            </table>
            </br>
            <button type="submit" class="btn btn-primary" name="submit"/>登录</button> 
            未注册？<a href="#"id="SupplyRegister">点击注册</a>
    </div>
   </form>

      
 </div>

</div>
</div>
<!--设置用户点击时的弹窗-->
<script type="text/javascript">
      T$('BuyInfo').onclick = function(){
        TINY.box.show('BuyInfo.html',1,400,350,1)
        }//弹出填写购车需求的窗口
      T$('SupplyRegister').onclick = function(){
      TINY.box.show('SupplyRegister.html',1,400,550,1)
      }//弹出供销商注册的窗口
      T$('UsersRegister').onclick = function(){
      TINY.box.show('UsersRegister.html',1,400,350,1)
      }//弹出供销商注册的窗口
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