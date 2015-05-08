<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理|教材赠送</title>
<!--                       CSS                       -->
<!-- Reset Stylesheet -->
<link rel="stylesheet" href="/cyc/admin/Home/Common/resources/css/reset.css" type="text/css" media="screen" />
<!-- Main Stylesheet -->
<link rel="stylesheet" href="/cyc/admin/Home/Common/resources/css/style.css" type="text/css" media="screen" />
<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
<link rel="stylesheet" href="/cyc/admin/Home/Common/resources/css/invalid.css" type="text/css" media="screen" />
<!--                       Javascripts                       -->
<!-- jQuery -->
<script type="text/javascript" src="/cyc/admin/Home/Common/resources/scripts/jquery-1.3.2.min.js"></script>
<!-- jQuery Configuration -->
<script type="text/javascript" src="/cyc/admin/Home/Common/resources/scripts/simpla.jquery.configuration.js"></script>
<!-- Facebox jQuery Plugin -->
<script type="text/javascript" src="/cyc/admin/Home/Common/resources/scripts/facebox.js"></script>
<!-- jQuery WYSIWYG Plugin -->
<script type="text/javascript" src="/cyc/admin/Home/Common/resources/scripts/jquery.wysiwyg.js"></script>
<!-- jQuery Datepicker Plugin -->
<script type="text/javascript" src="/cyc/admin/Home/Common/resources/scripts/jquery.datePicker.js"></script>
<script type="text/javascript" src="/cyc/admin/Home/Common/resources/scripts/jquery.date.js"></script>
<script type="text/javascript">
  

  function getModelName(url){
    var strs = new Array();
    strs = url.split('/');
    return strs[strs.length-1];
  }
 /*--------------------实现2(返回 $_GET 对象, 仿PHP模式)----------------------*/
 var $_GET = (function(){
    var url = window.document.location.href.toString();
    var u = url.split("?");
    if(typeof(u[1]) == "string"){
        u = u[1].split("&");
        var get = {};
        for(var i in u){
            var j = u[i].split("=");
            get[j[0]] = j[1];
        }
        return get;
    } else {
        return {};
    }
  })();
  /*--------------------实现2(返回 $_GET 对象, 仿PHP模式)----------------------*/
  window.onload = function(){
  var url = window.location.pathname;
  var last = getModelName(url);
  var id0,id1,id2;
  lastfirst = last.split('?')[0];
  var day = $_GET['day'];
  //alert(lastfirst);
  
  //导航菜单的固定显示
  if(lastfirst == "checkRes"){
    id0="#dpgl";
    id2="#ul_dpgl";
    if(day == "1"){
      id1="#jtsc";
    }else if(day == "2"){
      id1="#mtsc";
    }else{
      id1="#qbdd";
    }
  }else if(lastfirst == "checkCar"){
    id0="#cxgl";
    id2="#ul_cxgl";
    if(day == "1"){
      id1="#jtcf";
    }else if(day == "2"){
      id1="#mtcf";
    }else{
      id1="#qbcx";
    }
  }else if(lastfirst == "newUser"){
    id0="#yhgl";
    id2="#ul_yhgl";
    id1="#tjgly"
  }else if(lastfirst == "checkUser"){
    id0="#yhgl";
    id2="#ul_yhgl";
    id1="#ckyh";
  }

  $(id0).addClass("nav-top-item current");
  $(id2).css("display","block");
  $(id1).addClass("current");
  
  }
</script>
</head>
<body>
<div id="body-wrapper">
  <!-- Wrapper for the radial gradient background -->
  <div id="sidebar">
    <div id="sidebar-wrapper">
      <!-- Sidebar with logo and menu -->
      <h1 id="sidebar-title"><a href="#">Simpla Admin</a></h1>
      <!-- Logo (221px wide) -->
      <a href="http://www.865171.cn"><img id="logo" src="/cyc/admin/Home/Common/resources/images/logo.png" alt="Simpla Admin logo" /></a>
      <!-- Sidebar Profile links -->
      <div id="profile-links"> 你好, <a href="#" title="Edit your profile">后台管理员</a><br />
        <br />
        <a href="/cyc" title="View the Site">View the Site</a> | <a href="/cyc/admin.php/Home/Admin/login" title="Sign Out">退出</a> </div>
        <ul id="main-nav">
        <!-- Accordion Menu -->
        <li> <a href="#" class="nav-top-item" id="dpgl">订票管理 </a>
          <!-- Add the class "current" to current menu item -->
          
          <ul id="ul_dpgl">
            <li><a href="/cyc/admin.php/Home/Ticket/checkRes?day=1&p=1" id="jtsc">今天上车</a></li>
            <li><a href="/cyc/admin.php/Home/Ticket/checkRes?day=2&p=1" id="mtsc">明天上车</a></li>
            <li><a href="/cyc/admin.php/Home/Ticket/checkRes" id="qbdd">全部订单</a></li>
          </ul>
        </li>
        <li> <a href="#" class="nav-top-item" id="cxgl">车讯管理 </a>
          <ul id="ul_cxgl">
            <li><a href="/cyc/admin.php/Home/Car/checkCar?day=1&p=1" id="jtcf">今天出发</a></li>
            <li><a href="/cyc/admin.php/Home/Car/checkCar?day=2&p=1" id="mtcf">明天出发</a></li>
            <li><a href="/cyc/admin.php/Home/Car/checkCar" id="qbcx">全部车讯</a></li>
          </ul>
        </li>
        <li> <a href="#" class="nav-top-item" id="yhgl">用户管理</a>
          <ul id="ul_yhgl">
            <li><a href="/cyc/admin.php/Home/Admin/newUser" id="tjgly">添加管理员</a></li>
            <li><a href="/cyc/admin.php/Home/Admin/checkUser" id="ckyh">查看用户</a></li>
          </ul>
        </li>
        
      </ul>
    </div>
  </div>
  <!-- End #sidebar -->
  <div id="main-content">
    <!-- Main Content Section with everything -->
    <noscript>
    <!-- Show a notification if the user has disabled javascript -->
    <div class="notification error png_bg">
      <div> Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
        Download From <a href="http://www.exet.tk">exet.tk</a></div>
    </div>
    </noscript>
        <!-- Page Head -->
    <h2>Welcome</h2>


    <div id="footer"> <small>
      <!-- Remove this notice or replace it with whatever you want -->
      &#169; Copyright 2015 ZSSYS | Powered by AliceXT| <a href="#">Top</a> </small> </div>
    <!-- End #footer -->
  </div>
  <!-- End #main-content -->
</div>
</body>
<!-- Download From www.exet.tk-->
</html>