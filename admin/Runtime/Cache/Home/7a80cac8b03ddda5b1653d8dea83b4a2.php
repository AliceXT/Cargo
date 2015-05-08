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
  
  function getName(url,i){
    var strs = new Array();
    strs = url.split('/');
    return strs[i];
  }
  
  window.onload = function(){
    var url = window.location.pathname;
    var model = getName(url,4);
    var action = getName(url,5);
    var varName = getName(url,6);
    var day = getName(url,7);
    //alert(model+action+day);
  
    var id0,id1,idul;

    if(model == "Ticket"){
      id0="#dpgl";
      idul = "#ul_dpgl";
      if(action == "checkToday"){
        id1=id0+"_jtjzh";
      }else{
        id1=id0+"_qbdp";
      }
    }
    if(model == "Car"){
      id0="#cxgl";
      idul="#ul_cxgl";
      if(varName == "day" && day == "1"){
        id1=id0+"_jtjzh";
      }else{
        id1=id0+"_qbdp";
      }
    }
    if(model == "Admin"){
      if(action == "index")
      {
        return;
      }
      id0 = "#yhgl";
      idul="#ul_yhgl";
      if(action == "newUser"){
        id1="#tjgly";
      }else{
        id1 = "#ckyh";
      }
    }
    if(model == "Place"){
      id0="#ddgl";
      idul="#ul_ddgl";
      if(action == "newPlace"){
        id1="#tjdd";
      }else{
        id1="#ckdd";
      }
    }
    //alert(id0+id1+idul);
    $(id0).addClass("nav-top-item current");
    $(idul).css("display","block");
    $(id1).addClass("current");

    $("#toExcel").onclick = function(event){
            if(!event) event = window.event;
            var target = event.target ? event.target : event.srcElement;

            var start = $("#startTime").value;
            var end = $("#endTime").value;
            var url = "/cyc/admin.php/Home/Ticket/download/startDate/"+start+"/endDate/"+end;

            this.href = url;
          }
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
            <li><a href="/cyc/admin.php/Home/Ticket/checkToday/p/1" id="dpgl_jtjzh">今天及之后</a></li>
            <li><a href="/cyc/admin.php/Home/Ticket/checkRes/p/1" id="dpgl_qbdp">全部订票</a></li>
          </ul>
        </li>
        <li> <a href="#" class="nav-top-item" id="cxgl">车讯管理 </a>
          <ul id="ul_cxgl">
            <li><a href="/cyc/admin.php/Home/Car/checkCar/day/1/p/1" id="cxgl_jtjzh">今天及之后</a></li>
            <li><a href="/cyc/admin.php/Home/Car/checkCar/p/1" id="cxgl_qbdp">全部车讯</a></li>
          </ul>
        </li>
        <li> <a href="#" class="nav-top-item" id="yhgl">用户管理</a>
          <ul id="ul_yhgl">
            <li><a href="/cyc/admin.php/Home/Admin/newUser" id="tjgly">添加管理员</a></li>
            <li><a href="/cyc/admin.php/Home/Admin/checkUser/p/1" id="ckyh">查看用户</a></li>
          </ul>
        </li>
        <li> <a href="#" class="nav-top-item" id="ddgl">地点管理</a>
          <ul id="ul_ddgl">
            <li><a href="/cyc/admin.php/Home/Place/newPlace" id="tjdd">添加地点</a></li>
            <li><a href="/cyc/admin.php/Home/Place/checkPlace/p/1" id="ckdd">查看地点</a></li>
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
    <h2>地点管理</h2>

    <!-- End .shortcut-buttons-set -->
    <div class="clear"></div>
    <!-- End .clear -->
    <div class="content-box">
      <!-- Start Content Box -->
      <div class="content-box-header">
        <h3>修改地点</h3>
        <ul class="content-box-tabs">
          <!--<li><a href="#tab1" class="default-tab">Table</a></li>-->
          <!-- href must be unique and match the id of target div -->
        </ul>
        <div class="clear"></div>
      </div>
      <!-- End .content-box-header -->
      <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1">
          <!-- This is the target div. id must match the href of this div's tab -->
          <form action="/cyc/admin.php/Home/Place/modify" method="post">
          <!--<h4>添加管理员</h4>-->
          <fieldset>
            <div><label>地点ID：<?php echo ($request['place_id']); ?><input type="hidden" name="place_id" id="place_id" value="<?php echo ($request['place_id']); ?>"></label></div><br>
            <div><label>地点名称：<input type="place_name" name="place_name" id="password" required="required" placeholder="请输入地点名称" value="<?php echo ($request['place_name']); ?>" ></label></div><br>
            <div><label>地点提示：<input type="place_tip" name="place_tip" id="password" placeholder="请输入地点提示" value="<?php echo ($request['place_tip']); ?>" ></label></div><br>
            <div>
              <label>验证码：<input type="text" name="verify" required="required" placeholder="请输入验证码"></label>
              <img style="height: 20%; width: 20%;" src="/cyc/admin.php/Home/Admin/showVerify" onclick="">
            </div><br>
          <input class="button" type="submit" value="保存更改" />
          </fieldset>
        </form>
        </div>
        <!-- End #tab1 -->
        
      </div>
      <!-- End .content-box-content -->
    </div>
    <!-- End .content-box -->


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