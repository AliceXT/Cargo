<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="/cargo/home/Home/Common/main/css/main.css" rel="stylesheet" type="text/css" />    
    <link rel="stylesheet" href="/cargo/home/Home/Common/main/css/bootstrap-combined.min.css"><!--调用外部的css样式表-->
</head>


<script type="text/javascript">
    function checkPasswords() {
        var pass1 = document.getElementById("password1");
        var pass2 = document.getElementById("password2");
 
        if (pass1.value != pass2.value)
            pass1.setCustomValidity("两次输入的密码不匹配");
        else
            pass1.setCustomValidity("");
    }
</script>

<body>
    <form action="" method="POST" name="myform">
      <div class="login">
        <h2>欢迎加入Car购</h2>
        <hr>
        <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td><button class="btn btn-primary" disabled="disabled">用户名</button></td>
                    <td>
                        <input type="text" id="username" name="username" autofocus="autofocus" placeholder="5-10位字符，支持字母/数字/下划线" pattern="^\w{5,10}$" required/>
                    </td>
                </tr>
                <tr>                    
                <td><button class="btn btn-primary" disabled="disabled">密码</button></td>
                <td>
                  <input type="password" id="password1" onchange="checkPasswords()" pattern="^\w{6,20}$" placeholder="6-20位，支持字母/数字" required/>
                </td>
                </tr>
            <tr>                
                <td><button class="btn btn-primary" disabled="disabled">确认密码</button></td>
                <td>
                  <input type="password" id="password2" onchange="checkPasswords()" pattern="^\w{6,20}$" required/>
                </td>
            </tr>
                <tr>                    
                   <td><button class="btn btn-primary" disabled="disabled">手机号码</button></td>
                    <td>
                        <input type="tel" id="mobile" name="mobile" pattern="\d{3}\d{4}\d{4}" placeholder="xxx-xxxx-xxxx" required/>
                    </td>
                </tr>
                <tr>            
                <td><button class="btn btn-primary" disabled="disabled">邮箱地址</button></td>
                <td>
                  <input type="email" id="Emailname" name="Emailname" placeholder="xxx@yyy" required/>
                </td>
            </tr>
            </table>
            </br>
            <button type="submit" class="btn btn-primary" name="submit"/>提交</button>
            <button type="reset" class="btn btn-primary" name="reset"/>重置</button>
    </div>
   </form>
</body>
</html>