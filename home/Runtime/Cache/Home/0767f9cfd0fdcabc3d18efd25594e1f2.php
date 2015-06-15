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
    <script src="/cargo/home/Home/Common/main/js/tinybox.js"></script><!--弹窗的js-->
    <script src="/cargo/home/Home/Common/main/js/tab-jquery.min.js"></script>
    <script src="/cargo/home/Home/Common/main/js/tabulous.js"></script>
    <script src="/cargo/home/Home/Common/main/js/tab-js.js"></script>

    <title>Cargo|汽车网上交易平台</title>
</head>

<body>
<div class="header">
<img src="/cargo/home/Home/Common/main/image/run2.png" width="60%" height="80%">
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
      <form id="search_form" action="/cargo/index.php/Home/Car/search" method="get">  
      <?php $url = "/cargo/index.php/Home/Car/search?";?>
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
        <td><a href="<?php echo $url?>h4loprice=5&hiprice=15">5-15万</a></td>
        <td><a href="<?php echo $url?>h4loprice=15&hiprice=30">15-30万</a></td>
        <td><a href="<?php echo $url?>h4loprice=30&hiprice=60">30-60万</a></td>
        <td><a href="<?php echo $url?>h4loprice=60&hiprice=100">60-100万</a></td>
        <td><a href="<?php echo $url?>h4loprice=100&hiprice=200">100万以上</a></td>   </tr>    
        <tr>
        <td>排量:</td>
        <td><a href="<?php echo $url?>h4displacement=1">1.0L</a></td>
        <td><a href="">1.4-1.6L</a></td>
        <td><a href="<?php echo $url?>h4displacement=2">1.6-2.5L</a></td>
        <td><a href="<?php echo $url?>h4displacement=3">2.5-3.0L</a></td>
        <td><a href="<?php echo $url?>h4displacement=4">3.0-4.0L</a></td>
        <td><a href="<?php echo $url?>h4displacement=4">4.0L以上</a></td>        
      </tr>
      <tr>
        <td>级别:</td>
        <td><a href="<?php echo $url?>h4type=两厢">两厢</a></td>
        <td><a href="<?php echo $url?>h4type=三厢">三厢</a></td>
        <td><a href="<?php echo $url?>h4h4type=豪华车">豪华车</a></td>
        <td><a href="<?php echo $url?>h4h4type=SUV越野车">SUV越野车</a></td>
        <td><a href="<?php echo $url?>h4h4type=MPV商务车">MPV商务车</a></td> 
        <td><a href="<?php echo $url?>h4h4type=新能源">新能源</a></td>
         </tr>       
        <tr>
        <td>变速箱:</td>
        <td><a href="<?php echo $url?>h4gearBox=MT">手动</a>
        <td><a href="<?php echo $url?>h4gearBox=AT">自动</a></td>
        <td><a href="<?php echo $url?>h4gearBox=DSG">双离合</a></td>
        <td><a href="<?php echo $url?>h4gearBox=CVT">CVT无级变速</a></td>
        </tr>      
      </table> 
      </h4>  
    </div>
    <div class="cars">
      <?php $j = 0;?>
        <form id="search_form" action="/cargo/index.php/Home/Car/search?displacement=2" method="get">
        <?php if(is_array($requests)): $i = 0; $__LIST__ = $requests;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$request): $mod = ($i % 2 );++$i;?><div class="car_body">
            <div class='navbar navbar-inverse'>
              <div class='nav-collapse'>
                <div class="car_image">
                    <a href="/cargo/index.php/Home/Single/check/id/<?php echo ($request['id']); ?>" target="_blank"><img src="<?php echo ($request['picture']); ?>"></a></li>
                </div>
                <div class="right">
                  <h3><?php echo ($request['description']); ?></h3>
                  <p><strong><?php echo ($request['type']); ?>--仅存<?php echo ($request['stock']); ?>台</strong></p>
                  <p>限时特价：<strong>&yen;<?php echo ($request['price']); ?>万</strong></p>
                  <span><a href="/cargo/index.php/Home/Single/check/id/<?php echo ($request['id']); ?>/name/<?php echo ($account_username); ?>" ><img src="/cargo/home/Home/Common/main/image/61.png" width=25% heght=60% /></a></span>
                  <span><img src="/cargo/home/Home/Common/main/image/60.png" width=25% heght=60% /></span>
                </div>
              </div>
            </div>
          </div><?php endforeach; endif; else: echo "" ;endif; ?>
      </form>
    </div>
    <div> 
      <h3><?php echo ($show); ?></h3>
    </div>
  </div><!--End container_left-->

  <div class="container_right">
    <div class="login"> 
<h3> 
欢迎你，<a href="#"id="UsersMessage"><?php echo ($account_username); ?></a>用户&nbsp;&nbsp;
<a href="/cargo/index.php/Home/Main/logout">【退出】</a>
</h3>
 <div id="tabs">
           
  <div id="tabs_container">

        <form action="/cargo/index.php/Home/Main/userPost" method="post">                  
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
      </div>

      <!--<div id="tabs-2">
        <form action="/cargo/index.php/Home/Main/supplyPost" method="post">             
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
             <button type="submit" class="btn btn-primary" name="signin"/>登录</button> 
            未注册？<a href="#"id="SupplyRegister">点击注册</a>
          </form>-->
        <!--</div>End tabs-2-->
      </div><!--End tab_container-->
    </div><!--End tabs-->
  </div><!--End login-->



<!--设置用户点击时的弹窗-->
<script type="text/javascript">
      
      T$('SupplyRegister').onclick = function()
      {
      var url1 = "http://"+window.location.hostname+":"+window.location.port+'/cargo/index.php/Home/Register/InsertSupply';
      //alert(url1);
      TINY.box.show(url1,1,400,450,1)
     
      }//弹出供销商注册的窗口

      T$('UsersRegister').onclick = function()
      {

      var url2 = "http://"+window.location.hostname+":"+window.location.port+'/cargo/index.php/Home/Register/InsertUser';
      TINY.box.show(url2,1,400,450,1)
      
      }//弹出用户注册的窗口

      T$('UsersMessage').onclick = function(){

      var url3 = "http://"+window.location.hostname+":"+window.location.port+'/cargo/index.php/Home/Register/modify';
      TINY.box.show(url3,1,400,450,1)

      }//弹出修改资料的窗口

</script><hr><!--登录的文件--></div>
    <!--广告位的推荐-->
    <div class="container_right">
      <hr>
    <div class="ads">
        <?php if(is_array($ads)): $i = 0; $__LIST__ = $ads;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ad): $mod = ($i % 2 );++$i;?><a href="/cargo/index.php/Home/Single/check/id/<?php echo ($ad['id']); ?>" target="_blank"><img src="<?php echo ($ad['picture']); ?>" width="75%"></a><hr><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>      
 </div><!--End container_right-->

</div><!--End contain-->


<div class="clearfix"></div>
<div class="footer"><div class="footer_contain">
</br>
   <h3>联系我们</h3>
    <p>邮编：510006</p>
    <p>邮箱：service@Cargo.com</p>
    <p>地址：广东工业大学计算机软件工程1班Car购小组</p>
	<p>Copyright &copy; 2015-2020 Cargo.com All Rights Reserved　</p>
</div>
</div>
<hr>
</body>
</html>