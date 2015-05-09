<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录|后台</title>
<!--                       CSS                       -->
<!-- Reset Stylesheet -->
<link rel="stylesheet" href="/cargo/admin/Home/Common/resources/css/reset.css" type="text/css" media="screen" />
<!-- Main Stylesheet -->
<link rel="stylesheet" href="/cargo/admin/Home/Common/resources/css/style.css" type="text/css" media="screen" />
<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
<link rel="stylesheet" href="/cargo/admin/Home/Common/resources/css/invalid.css" type="text/css" media="screen" />
<!--                       Javascripts                       -->
<!-- jQuery -->
<script type="text/javascript" src="/cargo/admin/Home/Common/resources/scripts/jquery-1.3.2.min.js"></script>
<!-- jQuery Configuration -->
<script type="text/javascript" src="/cargo/admin/Home/Common/resources/scripts/simpla.jquery.configuration.js"></script>
<!-- Facebox jQuery Plugin -->
<script type="text/javascript" src="/cargo/admin/Home/Common/resources/scripts/facebox.js"></script>
<!-- jQuery WYSIWYG Plugin -->
<script type="text/javascript" src="/cargo/admin/Home/Common/resources/scripts/jquery.wysiwyg.js"></script>

<!--Ajax-->
<!--解决方法1:fall
<script type="text/javascript">
$(document).ready(function(){
  var url="http://localhost/test/";
  $("button").click(function(){
    $.post(url,
    {
      name:"Donald Duck",
      password:"Duckburg"
    },
    function(data,status){
      alert("数据：" + data + "\n状态：" + status);
    });
  });
});
</script>-->

<!--解决方法2:因为重定向的问题导致失效
<script type="text/javascript" src="/cargo/admin/Home/Common/script/prototype-1.5.1.js"></script>
<script type="text/javascript">
  function submitclick(){

    alert('submitcilck');
    //window.location.assign("http://localhost/test");
    var url = "http://localhost/test";
    new Ajax.Request(
      url,
      {
        method:'post',
        parameters:"name="+$('name').value+"&password="+$('password').value,
        onSuccess:successTo,
        onFailture:function(r) {
              alert 'Updates sizes failed: ' + r.statusText );
            }
      }
    );
    //successTo("a");
  }
  function successTo(r){
    document.cookie="admin=cookiestr";
    window.location.assign("/cargo/admin.php/Home/Admin/index/id/"+r.responseText());
  }
</script>-->

</head>
<body id="login">
<div id="login-wrapper" class="png_bg">
  <div id="login-top">
    <h1>Simpla Admin</h1>
    <!-- Logo (221px width) -->
    <a href="http://www.865171.cn"><img id="logo" src="/cargo/admin/Home/Common/resources/images/logo.png" alt="Simpla Admin logo" /></a> </div>
  <!-- End #logn-top -->
  <div id="login-content">
    <!--
    <form method="post" id="login_form">
      
      <p>
        <label>账号：</label>
        <input class="text-input" type="text" name="username" id="username">
      </p>
      <div class="clear"></div>
      <p>
        <label>密码：</label>
        <input class="text-input" type="password"  name="password" id="password">
      </p>
      <div class="clear"></div>
      <p>
        <label>验证码</label>
        <input class="text-input" type="text" name="verify" id="verify">
        <img style="height: 60%; width: 60%;" src="/cargo/admin.php/Home/Admin/showVerify" onclick="">
      </p>
      <p>
        <button class="button" name="signin" >登录</button>
      </p>
    </form>-->
    <form method="post" id="login_form" action="http://localhost/test/">
      <input type="text" id="name" name="name" value="name">
      <input type="password" id="password" name="password" value="password">
      <input type="submit" value="提交" onclick="submitclick()">
    </form>
  </div>
  <!-- End #login-content -->
</div>
<!-- End #login-wrapper -->
</body>
</html>