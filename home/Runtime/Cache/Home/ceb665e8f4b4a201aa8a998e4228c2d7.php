<?php if (!defined('THINK_PATH')) exit();?><div class="login"> 
<h3> 欢迎你，<a href="#"id="UsersMessage"><?php echo ($account_username); ?></a>用户
<a href="/cargo/index.php/Home/Main/logout">退出</a></h3>
 <div id="tabs">
    <ul>
     <li><a href="#tabs-1">用户登录</a></li>
     <li><a href="#tabs-2">供销商入口</a></li>
    </ul>            
  <div id="tabs_container">
      <div id="tabs-1">
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
            </br>
            <button type="submit" class="btn btn-primary" name="signin"/>登录</button> 
            未注册？<a href="#"id="SupplyRegister">点击注册</a>
          </form>
        </div><!--End tabs-2-->
      </div><!--End tab_container-->
    </div><!--End tabs-->
  </div><!--End login-->

<!--设置用户点击时的弹窗-->
<script type="text/javascript">
      
      var url1 = "http://"+window.location.hostname+":"+window.location.port+'/cargo/index.php/Home/Register/InsertSupply';
     //alert(url1);
      T$('SupplyRegister').onclick = function(){
      TINY.box.show(url1,1,400,450,1)
      }//弹出供销商注册的窗口
      var url2 = "http://"+window.location.hostname+":"+window.location.port+'/cargo/index.php/Home/Register/InsertUser';
      T$('UsersRegister').onclick = function(){
      TINY.box.show(url2,1,400,450,1)
      }//弹出用户注册的窗口
      T$('UsersMessage').onclick = function(){
      TINY.box.show(url2,1,400,450,1)
      }//弹出修改资料的窗口

</script>