<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理|奔驰快线</title>
<!--                       CSS                       -->
<!-- Reset Stylesheet -->
<link rel="stylesheet" href="/cyc2.8/admin/Home/Common/resources/css/reset.css" type="text/css" media="screen" />
<!-- Main Stylesheet -->
<link rel="stylesheet" href="/cyc2.8/admin/Home/Common/resources/css/style.css" type="text/css" media="screen" />
<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
<link rel="stylesheet" href="/cyc2.8/admin/Home/Common/resources/css/invalid.css" type="text/css" media="screen" />
<!--                       Javascripts                       -->
<!-- jQuery -->
<script type="text/javascript" src="/cyc2.8/admin/Home/Common/resources/scripts/jquery-1.3.2.min.js"></script>
<!-- jQuery Configuration -->
<script type="text/javascript" src="/cyc2.8/admin/Home/Common/resources/scripts/simpla.jquery.configuration.js"></script>
<!-- Facebox jQuery Plugin -->
<script type="text/javascript" src="/cyc2.8/admin/Home/Common/resources/scripts/facebox.js"></script>
<!-- jQuery WYSIWYG Plugin -->
<script type="text/javascript" src="/cyc2.8/admin/Home/Common/resources/scripts/jquery.wysiwyg.js"></script>
<!-- jQuery Datepicker Plugin -->
<script type="text/javascript" src="/cyc2.8/admin/Home/Common/resources/scripts/jquery.datePicker.js"></script>
<script type="text/javascript" src="/cyc2.8/admin/Home/Common/resources/scripts/jquery.date.js"></script>
<!--xt 导入 prototype.js-->
<!--<script type="text/javascript" src="/cyc2.8/admin/Home/Common/script/prototype-1.5.1.js"></script>-->
<script type="text/javascript">
  
  function getName(url,i){
    var strs = new Array();
    strs = url.split('/');
    return strs[i];
  }
  /*******************start******订票管理、车讯管理下载工具*********************/
  function ok(type){

    
    if(typeof($("#startTime").attr("value")) == "undefined"){
      alert("请填写开始时间");
      return ;
    }
    if (typeof($("#endTime").attr("value")) == "undefined"){
      alert("请填写结束时间");
      return ;
    }
    var start = $("#startTime").attr("value");
    
    var end =$("#endTime").attr("value");
	
	if (start!=start.match(/\d{4}-\d{2}-\d{2}/ig))  {  
        alert('请输入日期格式为：yyyy-mm-dd!');  
        return false;  
    }  
	if (end!=end.match(/\d{4}-\d{2}-\d{2}/ig))  {  
        alert('请输入日期格式为：yyyy-mm-dd!');  
        return false;  
    }  

	if(type == 1){
	   var url = "/cyc2.8/admin.php/Home/Ticket/download/startDate/"+start+"/endDate/"+end;
	}
	else if(type == 2){
	   var url = "/cyc2.8/admin.php/Home/Car/download/startDate/"+start+"/endDate/"+end;
	}
    //var url = "/cyc2.8/admin.php/Home/Ticket/download/startDate/2015-04-21/endDate/2015-04-22";
    //$("#toExcel").attr("href",url);
    //alert(url);
    window.location.assign(url);
  }
  /*********************end****订票管理、车讯管理下载工具*********************/
  window.onload = function(){

    /****************下面是导航菜单的js代码****************/
    var url = window.location.pathname;

    var model = getName(url,3);
    var action = getName(url,4);

    //ok();
    var id0,id1,idul;

    if(model == "Ticket"){
      id0="#dpgl";
      idul = "#ul_dpgl";
      if(action == "checkToday"){
        id1=id0+"_jtjzh";
      }else if (action == "checkRes"){
        id1=id0+"_qbdp";
      }else if(action  == "checkPast"){
		id1=id0+"_cjgqp";
	  }
    }
    if(model == "Car"){
      id0="#cxgl";
      idul="#ul_cxgl";
      
      if(action == "newCar"){
        id1 = id0+"_tjcx";
      }else if (action == "checkPast"){
        id1=id0+"_cjgqp";
      }else if(action  == "checkCar"){
		id1=id0+"_qbdp";
	  }else if(action  == "checkToday"){
		id1=id0+"_jtjzh";
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

    /****************上面是导航菜单的js代码****************/

        
    
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
      <a href="http://www.865171.cn"><img id="logo" src="/cyc2.8/admin/Home/Common/resources/images/logo.png" alt="Simpla Admin logo" /></a>
      <!-- Sidebar Profile links -->
      <div id="profile-links"> 你好, <a href="#" title="Edit your profile">后台管理员</a><br />
        <br />
        <a href="/cyc2.8" title="View the Site">View the Site</a> | <a href="/cyc2.8/admin.php/Home/Admin/login" title="Sign Out">退出</a> </div>
        <ul id="main-nav">
        <!-- Accordion Menu -->
        <li> <a href="#" class="nav-top-item" id="dpgl">订票管理 </a>
          <!-- Add the class "current" to current menu item -->
          
          <ul id="ul_dpgl">
            <li><a href="/cyc2.8/admin.php/Home/Ticket/checkToday/p/1" id="dpgl_jtjzh">今天及之后</a></li>
            <li><a href="/cyc2.8/admin.php/Home/Ticket/checkRes/p/1" id="dpgl_qbdp">全部订票</a></li>
			<li><a href="/cyc2.8/admin.php/Home/Ticket/checkPast/p/1" id="dpgl_cjgqp">处理过期票</a></li>
          </ul>
        </li>
        <li> <a href="#" class="nav-top-item" id="cxgl">车讯管理 </a>
          <ul id="ul_cxgl">
            <li><a href="/cyc2.8/admin.php/Home/Car/checkToday/p/1" id="cxgl_jtjzh">今天及之后</a></li>
            <li><a href="/cyc2.8/admin.php/Home/Car/checkCar/p/1" id="cxgl_qbdp">全部车讯</a></li>
			<li><a href="/cyc2.8/admin.php/Home/Car/checkPast/p/1" id="cxgl_cjgqp">处理过期车讯</a></li>
            <li><a href="/cyc2.8/admin.php/Home/Car/newCar" id="cxgl_tjcx">添加车讯</a></li>

          </ul>
        </li>
        <li> <a href="#" class="nav-top-item" id="yhgl">用户管理</a>
          <ul id="ul_yhgl">
            <li><a href="/cyc2.8/admin.php/Home/Admin/newUser" id="tjgly">添加管理员</a></li>
            <li><a href="/cyc2.8/admin.php/Home/Admin/checkUser/p/1" id="ckyh">查看用户</a></li>
          </ul>
        </li>
        <li> <a href="#" class="nav-top-item" id="ddgl">地点管理</a>
          <ul id="ul_ddgl">
            <li><a href="/cyc2.8/admin.php/Home/Place/newPlace" id="tjdd">添加地点</a></li>
            <li><a href="/cyc2.8/admin.php/Home/Place/checkPlace/p/1" id="ckdd">查看地点</a></li>
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
    <h2>车讯管理</h2>

    <!-- End .shortcut-buttons-set -->
    <div class="clear"></div>
    <!-- End .clear -->
    <div class="content-box">
      <!-- Start Content Box -->
      <div class="content-box-header">
        <h3><?php echo ($title); ?></h3>
        <?php if($title == "全部车讯") {?>
        <div style="padding-top: 7px;float: left;">
        <form action="/cyc2.8/admin.php/Home/Car/checkCar/p/1" method="post" id="timeForm">
          <input type="text" name="startTime" id="startTime" pattern="[0-9]{4}[-][0-9]{2}[-][0-9]{2}" placeholder="日期(xxxx-xx-xx)" value="<?=session('startdate')?>">到
          <input type="text" name="endTime" id="endTime" pattern="[0-9]{4}[-][0-9]{2}[-][0-9]{2}" placeholder="日期(xxxx-xx-xx)" value="<?=session('enddate')?>">
          <input type="submit" class="button" value="筛选">
        </form>
        </div>
        <?php }?>
    
    <?php if($title != "处理过期车讯") {?>
        <a class="button" style="float: left;margin-top: 7px;margin-left: 15px;line-height: 15px;" id="toExcel" onclick="ok(2)">导出成Excel
        </a>
    <?php }?>
    
    <?php if($title == "处理过期车讯") {?>
        <a class="button" style="float: left;margin-top: 7px;margin-left: 15px;line-height: 15px;" id="deletePass" 
    href=<?="/cyc2.8/admin.php/Home/Car/deletePass"; ?>>一键删除
        </a>
    <?php }?>
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
          <form action="/cyc2.8/admin.php/Home/Car/delete" method="post">
          <table>
            <thead>
              <tr>
                <th>
                  <input class="check-all" type="checkbox"  />
                </th>
                <th>车讯ID</th>
                <th>时间</th>
                <th>起点</th> 
                <th>终点</th>
                <th>余票</th>
                <th>车牌号</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <td colspan="6">
                  <div class="pagination">
                    <?php echo ($show); ?>
                  </div>
                  <!-- End .pagination -->
                  <div class="clear"></div>
                </td>
              </tr>
            </tfoot>
            <tbody>
              <?php if(is_array($requests)): $i = 0; $__LIST__ = $requests;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$request): $mod = ($i % 2 );++$i;?><tr>
                <td>
                  <input type="checkbox" id="<?php echo ($request['car_id']); ?>" name="<?php echo ($request['car_id']); ?>" value="<?php echo ($request['car_id']); ?>"/>
                </td>
                <td><?php echo ($request['car_id']); ?></td>
                <td><?php echo ($request['car_time']); ?></td>
                <td><?php echo ($request['start_add']); ?></td>
                <td><?php echo ($request['end_add']); ?></td>
                <td><?php echo ($request['remain_ticket']); ?></td>
                <td><?php echo ($request['car_plate']); ?></td>
                <td>
                  <!-- Icons -->
                  <a href=<?="/cyc2.8/admin.php/Home/Car/modifyCar/id/".$request['car_id']; ?> title="Edit"><img src="/cyc2.8/admin/Home/Common/resources/images/icons/pencil.png" alt="Edit" /></a><a href=<?="/cyc2.8/admin.php/Home/Car/delete/id/".$request['car_id'];?> title="Delete"><img src="/cyc2.8/admin/Home/Common/resources/images/icons/cross.png" alt="Delete" /></a></td>
              </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
          </table>
          <input class="button" type="submit" value="批量删除">
        </form>
        </div>
        <!-- End #tab1 -->
        
      </div>


      <!-- End .content-box-content -->
    </div><div><?php echo ($snow); ?></div>
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