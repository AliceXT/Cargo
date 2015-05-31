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
        <h4>申请条件：全国各地各厂商授权4S店及经销商</h4>
        <hr>
        <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td><button class="btn btn-primary" disabled="disabled">公司名称</button></td>
                    <td>
                        <input type="text" id="company" name="company" autofocus="autofocus" required/>
                    </td>
                </tr>
                <tr>
                    <td><button class="btn btn-primary" disabled="disabled">公司座机</button></td>
                    <td>
                        <input type="tel" id="phone" name="phone" pattern="\d{3}-\d{8}|\d{4}-\d{7}" placeholder="区号-电话号码" required/>
                    </td>
                </tr>
                <tr>
                    <td><button class="btn btn-primary" disabled="disabled">公司地址</button></td>
                    <td><input type="text" id="address" name="address" placeholder="请填写具体地址" required/></td>
                </tr>
                <tr>           
                    <td><button class="btn btn-primary" disabled="disabled">销售经理</button></td>
                    <td>
                        <input type="text" id="manager" name="manager"required/>
                    </td>
                </tr>
                <tr>                    
                   <td><button class="btn btn-primary" disabled="disabled">经理手机</button></td>
                    <td>
                        <input type="tel" id="mobile" name="mobile" pattern="\d{3}\d{4}\d{4}" placeholder="xxx-xxxx-xxxx" required/>
                    </td>
                </tr>
                <tr>            
                <td><button class="btn btn-primary" disabled="disabled">联系邮箱</button></td>
                <td>
                  <input type="email" id="Emailname" name="Emailname" placeholder="xxx@yyy" required/>
                </td>
            </tr>
                <tr>                    
                <td><button class="btn btn-primary" disabled="disabled">密码</button></td>
                <td>
                  <input type="password" id="password1" onchange="checkPasswords()" pattern="^[a-z A-Z 0-9 ]{8}" placeholder="8-20位，支持字母/数字" required/>
                </td>
                </tr>
            <tr>                
                <td><button class="btn btn-primary" disabled="disabled">确认密码</button></td>
                <td>
                  <input type="password" id="password2" onchange="checkPasswords()" pattern="^\w+$" required/>
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