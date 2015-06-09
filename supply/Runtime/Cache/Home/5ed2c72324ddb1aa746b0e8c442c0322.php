<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>供应商|Cargo</title>
<!--                       CSS                       -->
<!-- Reset Stylesheet -->
<link rel="stylesheet" href="/cargo/supply/Home/Common/resources/css/reset.css" type="text/css" media="screen" />
<!-- Main Stylesheet -->
<link rel="stylesheet" href="/cargo/supply/Home/Common/resources/css/style.css" type="text/css" media="screen" />
<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
<link rel="stylesheet" href="/cargo/supply/Home/Common/resources/css/invalid.css" type="text/css" media="screen" />
<!--                       Javascripts                       -->
<!-- jQuery -->
<script type="text/javascript" src="/cargo/supply/Home/Common/resources/scripts/jquery-1.3.2.min.js"></script>
<!-- jQuery Configuration -->
<script type="text/javascript" src="/cargo/supply/Home/Common/resources/scripts/simpla.jquery.configuration.js"></script>
<!-- Facebox jQuery Plugin -->
<script type="text/javascript" src="/cargo/supply/Home/Common/resources/scripts/facebox.js"></script>
<!-- jQuery WYSIWYG Plugin -->
<script type="text/javascript" src="/cargo/supply/Home/Common/resources/scripts/jquery.wysiwyg.js"></script>
<!-- jQuery Datepicker Plugin -->
<script type="text/javascript" src="/cargo/supply/Home/Common/resources/scripts/jquery.datePicker.js"></script>
<script type="text/javascript" src="/cargo/supply/Home/Common/resources/scripts/jquery.date.js"></script>
<!--xt 导入 prototype.js-->
<!--<script type="text/javascript" src="/cargo/supply/Home/Common/script/prototype-1.5.1.js"></script>-->
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
	   var url = "/cargo/supply.php/Home/Ticket/download/startDate/"+start+"/endDate/"+end;
	}
	else if(type == 2){
	   var url = "/cargo/supply.php/Home/Car/download/startDate/"+start+"/endDate/"+end;
	}
    //var url = "/cargo/supply.php/Home/Ticket/download/startDate/2015-04-21/endDate/2015-04-22";
    //$("#toExcel").attr("href",url);
    //alert(url);
    window.location.assign(url);
  }

  //控制li ul导航栏的展示
  function getID(model,action){
    var id1,id2,id3;
    //alert("ingetID model = "+model+" action = "+ action);
    //if(model == "Admin")
    if(model == "Order"){
      //alert("in Order");
      id1="#li_order";
      id2="#ul_order";
      if(action == "order"){
        id3 = "#order_check";
      }
    }
    //alert(id1+id2+id3);
    if(model == "Adv"){
      id1="#li_adv";
      id2="#ul_adv";
      if(action == "wait"){
        id3 = "#adv_wait";
      }else if(action == "check"){
        id3 = "#adv_check";
      }
    }
    //alert("Adv");
    if(model == "Car"){
      id1="#li_car";
      id2="#ul_car";
      if(action == "check"){
        id3 = "#car_check";
      }else if(action == "add"){
        id3 = "#car_add";
      }
    }
    //alert("car");
    var str = id1+","+id2+","+id3;
    return (str);

  }
  /*********************end****订票管理、车讯管理下载工具*********************/
  window.onload = function(){

    /****************下面是导航菜单的js代码****************/
    var url = "/cargo/supply.php/Home/Car/check";
    

    var model = getName(url,4);
    var action = getName(url,5);
    //alert(model + action);
    //ok();
    var ids = new Array();

    //得到id的名字
    ids = getID(model,action).split(",");
    //alert("outgetID"+model+","+action+","+ids[0]+ids[1]+ids[2]);
    //alert(id0+id1+idul);
    $(ids[0]).addClass("nav-top-item current");
    $(ids[1]).css("display","block");
    $(ids[2]).addClass("current");

    /****************上面是导航菜单的js代码****************/

        
    
  }

</script>
<script language="JavaScript" type="text/javascript">
<!--
$(button).click=function deleteCookie(name){
var date=new Date();
date.setTime(date.getTime()-10000);
document.cookie=name+"=cookiestr; expires="+date.toGMTString();
}
//-->
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
      <a href="http://www.865171.cn"><img id="logo" src="/cargo/supply/Home/Common/resources/images/logo.png" alt="Simpla Admin logo" /></a>
      <!-- Sidebar Profile links -->
      <div id="profile-links"> 你好, <a href="#" title="Edit your profile"><?php echo ($account_name); ?></a><br />
        <br />
        <a href="/cargo" title="View the Site">View the Site</a> | <a href="/cargo/supply.php/Home/Admin/logout"title="Sign Out">退出</a> </div>
        <ul id="main-nav">
        <!-- Accordion Menu -->
        <li> <a href="#" class="nav-top-item" id="li_adv">广告位管理</a>
          <ul id="ul_adv">
            <li><a href="/cargo/supply.php/Home/Adv/check" id="adv_check">在线广告</a></li>
            <li><a href="/cargo/supply.php/Home/Adv/wait" id="adv_wait">未上线广告</a></li>
          </ul>
        </li>
        <li> <a href="#" class="nav-top-item" id="li_car">车辆管理</a>
          <ul id="ul_car">
            <li><a href="/cargo/supply.php/Home/Car/check" id="car_check">查看车辆</a></li>
            <li><a href="/cargo/supply.php/Home/Car/add" id="car_add">增加车辆</a></li>
          </ul>
        </li>
<!--        <li> <a href="#" class="nav-top-item" id="li_order">订单管理</a>
          <ul id="ul_order">
            <li><a href="/cargo/supply.php/Home/Order/check" id="order_check">查看订单</a></li>
          </ul>
        </li>
        -->
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
    <h2><?php echo ($Title); ?></h2>

    <!-- End .shortcut-buttons-set -->
    <div class="clear"></div>
    <!-- End .clear -->
    <div class="content-box">
      <!-- Start Content Box -->
      <div class="content-box-header">
        <h3><?php echo ($title); ?></h3>
        <form id="search_form" action="/cargo/supply.php/Home/Car/search" method="get">
          <input type="text" patten="输入关键词" id="key" name="key">
          <input type="submit" value="搜索">
        </form>
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
          <form action="/cargo/supply.php/Home/Car/delete" method="post">
          <table>
            <thead>
              <tr>
                <th>
                  <input class="check-all" type="checkbox">
                </th>
                <th>车辆代号</th>
                <th>品牌</th>
                <th>型号</th>
                <th>描述</th>
                <th>图片地址</th>
                <th>价格</th>
                <th>库存</th>
                <th>车辆类型</th>
                <!--<th>所属供销商</th>-->
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
                  <input type="checkbox" id="<?php echo ($request['id']); ?>" name="<?php echo ($request['id']); ?>" value="<?php echo ($request['id']); ?>" >
                </td>
                <td><?php echo ($request['id']); ?></td>
                <td><?php echo ($request['brand']); ?></td>
                <td><?php echo ($request['model']); ?></td>
                <td><?php echo ($request['description']); ?></td>
                <td><?php echo ($request['picture']); ?></td>
                <td><?php echo ($request['price']); ?></td>
                <td><?php echo ($request['stock']); ?></td>
                <td><?php echo ($request['type']); ?></td>
                <!--<td><?php echo ($request['owner']); ?></td>-->
                <td>
                  <!-- Icons -->
                  <a href=<?="/cargo/supply.php/Home/Car/modify/id/".$request['id']; ?> title="Edit"><img src="/cargo/supply/Home/Common/resources/images/icons/pencil.png" alt="Edit" /></a>
                  <a href=<?="/cargo/supply.php/Home/Order/check/car_id/".$request['id']; ?> title="查看订单"><img src="/cargo/supply/Home/Common/resources/images/icons/order.jpg" alt="Edit" /></a>
                  <a href=<?="/cargo/supply.php/Home/Adv/add/car_id/".$request['id']; ?> title="申请广告"><img src="/cargo/supply/Home/Common/resources/images/icons/adv.jpg" alt="Edit" /></a>
                  <a href=<?="/cargo/supply.php/Home/Car/delete/id/".$request['id'];?> title="Delete"><img src="/cargo/supply/Home/Common/resources/images/icons/cross.png" alt="Delete"></a></td>
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
      &#169; Copyright 2015 CARGO | Powered by AliceXT| <a href="#">Top</a> </small> </div>
    <!-- End #footer -->
  </div>
  <!-- End #main-content -->
</div>
</body>
<!-- Download From www.exet.tk-->
</html>