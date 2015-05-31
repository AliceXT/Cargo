<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="/cargo/home/Home/Common/main/css/main.css" rel="stylesheet" type="text/css" />    <!--调用外部的css样式表-->
    <script src="/cargo/home/Home/Common/main/js/html5shiv.min.js"></script>
    <script src="/cargo/home/Home/Common/main/js/respond.min.js"></script>
    <script src="/cargo/home/Home/Common/main/js/tinybox.js"></script>
    <title>用户登录</title>
</head>

<style>
    #main{
         border:2px solid #269abc;
        width: 100%;
        height: 100%;
        text-align:center;
        font-family: "微软雅黑";
    }
</style>

<style type="text/css">
#tinybox{position:absolute; display:none; padding:10px; background:#FFFFFF url(image/preload.gif) no-repeat 50% 50%; border:5px solid #e3e3e3; z-index:2000;}
#tinymask{position:absolute; display:none; top:0; left:0; height:100%; width:100%; background:#000000; z-index:1500;}
#tinycontent{background:#FFFFFF; font-size:1.1em;}
</style>

<body>
  <font style="FONT-SIZE: 13pt; color:blue">
    <form action="" method="POST" name="myform">
      <div id="main">
        <h2>欢迎登录Car购</h2>
        <hr>
        <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td>公司名称</td>
                    <td>
                    <input type="text" id="company" name="company" autofocus="autofocus" required/>
                    </td>
                </tr>               
                <tr>                    
                    <td>密码</td>
                    <td>
                    <input type="password" id="password1" onchange="checkPasswords()" pattern="^[a-z A-Z 0-9 _]{8}" required/>
                    </td>
                </tr>            
            </table>
            </br>
            <input type="submit"name="submit" value="确定"/>
            <input type="reset"name="reset" value="取消"/> <hr>      
            <p>未注册？<a href="#"id="supplyregister">点击注册</a></p>
        
    </div>
   </form>
 </font>
 <script type="text/javascript">    
      T$('supplyregister').onclick = function(){
      TINY.box.show('supplyregister.html',1,400,550,1)
      }//弹出供销商注册的窗口
</script>
</body>
</html>