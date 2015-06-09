<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="/cargo/home/Home/Common/main/css/main.css" rel="stylesheet" type="text/css" />    
    <link rel="stylesheet" href="/cargo/home/Home/Common/main/css/bootstrap-combined.min.css"><!--调用外部的css样式表-->
</head>

<body>
    <form action="/cargo/index.php/Home/InsertUser" method="post">
      <div class="login">
        <h2>欢迎加入Car购</h2>
        <hr>
        <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td><button class="btn btn-primary">用户名</button></td>
                    <td>
                        <input type="text" id="username" name="username" autofocus="autofocus" placeholder="5-12位字符，支持字母/数字/下划线" pattern="^\w{5,10}$" required/>
                    </td>
                </tr>
                <tr>                    
                <td><button class="btn btn-primary" >密码</button></td>
                <td>
                  <input type="password" name="password" id="password" pattern="^\w{6,20}$" placeholder="6-20位，支持字母/数字" required/>
                </td>
                </tr>
            <tr>                
                <td><button class="btn btn-primary" >确认密码</button></td>
                <td>
                  <input type="password" id="passcheck" name="passcheck" pattern="^\w{6,20}$" required/>
                </td>
            </tr>
                <tr>                    
                   <td><button class="btn btn-primary" >手机号码</button></td>
                    <td>
                        <input type="tel" id="telephone" name="telephone" pattern="\d{3}\d{4}\d{4}" placeholder="xxx-xxxx-xxxx" required/>
                    </td>
                </tr>
                <tr>            
                <td><button class="btn btn-primary" >邮箱地址</button></td>
                <td>
                  <input type="email" id="Email" name="Email" placeholder="xxx@yyy" required/>
                </td>
            </tr>
            </table>
            </br>
            <button type="submit" class="btn btn-primary" name="submit" value="<?php echo ($submitName); ?>"/>提交</button>
            <button type="reset" class="btn btn-primary" name="reset"/>重置</button>
    </div>
   </form>
</body>
</html>