<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet"
          href="/cargo1/home/Home/Common/main/css/bootstrap-combined.min.css"><!--调用bootstrap-->
    <link href="/cargo1/home/Home/Common/main/css/main.css" rel="stylesheet" type="text/css" />    <!--调用外部的css样式表-->
    <link href="/cargo1/home/Home/Common/main/css/single_car.css" rel="stylesheet" type="text/css" /> 
    <script src="/cargo1/home/Home/Common/main/js/html5shiv.min.js"></script>
    <script src="/cargo1/home/Home/Common/main/js/respond.min.js"></script>
    <script src="/cargo1/home/Home/Common/main/js/tinybox.js"></script><!--弹窗的js-->
    <script src="/cargo1/home/Home/Common/main/js/tab-jquery.min.js"></script>
    <script src="/cargo1/home/Home/Common/main/js/tabulous.js"></script>
    <script src="/cargo1/home/Home/Common/main/js/tab-js.js"></script>

    <title>Cargo|汽车网上交易平台</title>
</head>

<body>
<div class="header">
<img src="/cargo1/home/Home/Common/main/image/run.png"
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
    <h3>欢迎你，<?php echo ($account_name); ?><hr></h3>    
    <h4>
      <form id="search_form" action="/cargo1/index.php/Home/Car/search" method="get">  
      <?php $url = "/cargo1/index.php/Home/Car/search?"; echo $url; ?>
           <select name="brand">
               <option value="">请选择品牌</option>
               <option value="奔驰">奔驰</option>
               <option value="丰田">丰田</option>
               <option value="福特">福特</option>
               <option value="奥迪">奥迪</option>
               <option value="歌诗图">歌诗图</option>
               <option value="宝马">宝马</option>
               <option value="本田">本田</option>
               <option value="别克">别克</option>
           </select>      
         <span><button type="hidden" class="btn-primary">搜索</button></span>
      </form>
         <table class="table" bgcolor="#E0E0E0" algin="center">
        <tr>
           <td>价格:</td>
           <td><a href="<?php echo $url?>loprice=1&hiprice=5">5万以下</button></td> 
            <td><a href="url+loprice=5&hiprice=15">5-15万</a></td>
            <td><a href="url+loprice=15&hiprice=30">15-30万</a></td>
            <td><a href="url+loprice=30&hiprice=60">30-60万</a></td>
            <td><a href="url+loprice=60&hiprice=100">60-100万</a></td>
            <td><a href="url+loprice=100&hiprice=200">100万以上</a></td>       
        </tr>  
        <tr>
           <td>排量:</td>
           <td><a href="url+displacement=1">1.0L</a></td>
            <td><a href="">1.4-1.6L</a></td>
            <td><a href="url+displacement=2">1.6-2.5L</a></td>
            <td><a href="url+displacement=3">2.5-3.0L</a></td>
            <td><a href="url+displacement=4">3.0-4.0L</a></td>
            <td><a href="url+displacement=4">4.0L以上</a></td>           
        </tr>
        <tr>
          <td>级别:</td>
           <td><a href="url+type=两厢">两厢</a></td>
           <td><a href="url+type=三厢">三厢</a></td>
           <td><a href="url+h4type=豪华车">豪华车</a></td>
           <td><a href="url+h4type=SUV越野车">SUV越野车</a></td>
           <td><a href="url+h4type=MPV商务车">MPV商务车</a></td> 
           <td><a href="url+h4type=新能源">新能源</a></td>
         </tr>       
        <tr>
           <td>变速箱:</td>
           <td><a href="url+gearBox=MT">手动</a>
           <td><a href="url+gearBox=AT">自动</a></td>
           <td><a href="url+gearBox=DSG">双离合</a></td>
           <td><a href="url+gearBox=CVT">CVT无级变速</a></td>
        </tr>      
      </table> 
      </h4>  

    </div>
    <div class="cars">
      <?php $j = 0;?>
       <form id="search_form" action="/cargo1/index.php/Home/Main/index" method="post">
        <?php if(is_array($requests)): $i = 0; $__LIST__ = $requests;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$request): $mod = ($i % 2 );++$i;?><div class="car_body">
            <div class='navbar navbar-inverse'><?php echo ($request['type']); ?>
              <div class='nav-collapse'>
                <div class="car_image">
                    <a href="/cargo1/index.php/Home/Single/check/id/<?php echo ($request['id']); ?>" target="_blank"><img src="<?php echo ($request['picture']); ?>"></a></li>
                </div>
                <div class="right">
                  <h3><?php echo ($request['brand']); echo ($request['description']); ?></h3>
                  <p>限量：<strong><?php echo ($request['stock']); ?></strong></p>
                  <!--<p><del>参考价：&yen;480,000</del></p>-->
                  <p>限时特价：<strong>&yen;<?php echo ($request['price']); ?>万</strong></p>
                  <p>咨询电话：400-8888-888</p>
                  <span><a href="/cargo1/index.php/Home/Single/check/id/<?php echo ($request['id']); ?>/name/<?php echo ($account_name); ?>" class="btn btn-primary btn-lg">仔细看看</a></span>
                  <span><button type="submit" class="btn btn-primary" onclick="">加入收藏</button></span>
                </div>
              </div>
            </div>
          </div><?php endforeach; endif; else: echo "" ;endif; ?>
      </form>
    </div>
    <div> 
      <h4><a href='#'>首页 </a> |
        <a href='#'>上一页 </a> |
        <a href='#'>下一页 </a> |
        <a href='#'>尾页 </a></h4>
    </div>
  </div><!--End container_left-->

  <div class="container_right">
    <div class="login"> 
  <form action="/cargo1/index.php/Home/Car/userPost" method="post">      
        <h3>用户登录</h3>             
        <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td><button class="btn btn-primary">用户名</button></td>
                    <td>
                    <input type="text" id="username" name="username" required/>
                    </td>
                </tr>               
                <tr>                    
                    <td><button class="btn btn-primary">密码</button></td>
                    <td>
                    <input type="password" id="pw" name="pw" required/>
                    </td>
                </tr>            
            </table>
            </br>
            <button type="submit" class="btn btn-primary" name="submit"/>登录</button> 
            未注册？<a href="#"id="UsersRegister">点击注册</a>
      <hr>
    </form>
    <form action="/cargo1/index.php/Home/Car/supplyPost" method="post">
        <h3>供销商登录</h3>             
        <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td><button class="btn btn-primary">公司名</button></td>
                    <td>
                    <input type="text" name="supplyname" id="supplyname" required/>
                    </td>
                </tr>               
                <tr>                    
                    <td><button class="btn btn-primary">密码</button></td>
                    <td>
                    <input type="password" name="password" id="password" onchange="" pattern="^\w{6,20}$" required/>
                    </td>
                </tr>            
            </table>
            </br>
            <button type="submit" class="btn btn-primary" name="signin"/>登录</button> 
            未注册？<a href="#"id="SupplyRegister">点击注册</a>
          </form>
    </div>
   
   
<!--设置用户点击时的弹窗-->
<script type="text/javascript">
      
      var url1 = "http://"+window.location.hostname+":"+window.location.port+'/cargo1/index.php/Home/Register/InsertSupply';
     //alert(url1);
      T$('SupplyRegister').onclick = function(){
      TINY.box.show(url1,1,400,450,1)
      }//弹出供销商注册的窗口
      var url2 = "http://"+window.location.hostname+":"+window.location.port+'/cargo1/index.php/Home/Register/InsertUser';
      T$('UsersRegister').onclick = function(){
      TINY.box.show(url2,1,400,450,1)
      }//弹出用户注册的窗口

</script>
      
 </div><!--End container_right-->

</div><!--End contain-->

<!--设置用户点击时的弹窗
<script type="text/javascript">
  
      T$('IndexBuy').onclick = function(){
        var url = "http://"+window.location.hostname+":"+window.location.port+'/cargo1/index.php/Home/Main/order';       
        TINY.box.show(url,1,400,350,1)

        }//弹出填写购车需求的窗口

</script>-->

<div class="clearfix"></div>
<div class="footer">
</br>
    <h3>联系我们</h3>
    <p>邮编：510006</p>
    <p>客服电话：400-8888-888</p>
    <p>邮箱：service@Cargo.com</p>
    <p>地址：广东工业大学计算机软件工程1班Car购小组</p>
Copyright &copy; 2015-2020 Cargo.com All Rights Reserved　
</div>
<hr>
</body>
</html>