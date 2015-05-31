<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <title>用户登录</title>
</head>

<style>
    #main{
        border:2px solid #269abc;
        width: 500px;
        height: 400px;
        margin: 5px;
        font-family: "微软雅黑";
        color: #444444;
        text-align:center;
        font-size: 16px;
    }
</style>
<script language=javascript>
    function CheckPost()
    {
        if((myform.username.value=="")||(myform.firstpassword.value=="")||(myform.password.value=="")
                ||(myform.address.value=""))
        {
            alert("请填写完整资料");
            myform.username.focus();
            return false;
        }
        if(myform.firstpassword.value== "/^[a-zA-Z0-9]+$/")
        {
            alter("只支持字母/数字/下划线");
        }
        if (myform.firstpassword.value.length<6)
        {
            alert("密码长度不得小于6位");
            myform.firstpassword.focus();
            return false;
        }
        if (myform.password.value!=myform.firstpassword.value)
        {
            alert("密码不正确，请重新输入");
            myform.password.focus();
            return false;
        }

    }
</script>


<body>
<div id="main">
    <form action="" class="form-inline" name="myform" onsubmit="return CheckPost();">
        <h2><button type="submit" class="btn btn-primary btn-lg" disabled="disabled">用户登录</button></h2>
        <hr width="500"color="#269abc"align="center"><!--设置下划线，align为对齐方式-->
        <h4>欢迎登录Car购</h4>
        <div class="form-group">
            <table class="table">
            <table class="table">
                <tr>
                    <label class="sr-only" for="username"></label><!---.sr-only类设置了隐藏的lable标签-->
                    <td><button type="submit"class="btn btn-primary" disabled="disabled">用户名</button></td>
                    <td>
                        <input type="text" size="30" class="form-control" id="name" name="username">
                    </td>
                </tr>

                <tr>
                    <label class="sr-only" for="firstpassword"></label><!---.sr-only类设置了隐藏的lable标签-->
                    <td><button type="submit" class="btn btn-primary" disabled="disabled">密码</button></td>
                    <td>
                        <input type="text" size="30" class="form-control" id="password" name="password">
                    </td>
                </tr>            
            </table>
            <dl>
                <button type="submit"  name="submit" class="btn btn-primary">确认</button>
                <button type="reset" name="reset" class="btn btn-primary">取消</button>
            </dl>
        </div>
        <div style="text-align: center">未注册？<a href="register.html">点击注册</a></div>
    </form>
</div>


</body>
</html>