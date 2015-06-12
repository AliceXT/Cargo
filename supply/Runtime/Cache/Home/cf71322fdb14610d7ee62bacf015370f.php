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
    var url = "/cargo/supply.php/Home/Car/add";
    

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
          <form action="/cargo/supply.php/Home/Car/<?php echo ($action); ?>" method="post" class="contentform" enctype="multipart/form-data">
          <!--<h4>添加车辆</h4>-->
          <fieldset>
            <?php
 if(isset($request)){ ?>  

            <input type="hidden" name="id" id="id" value="<?php echo ($request['id']); ?>">
            <?php
 } ?>
            <p>
            <h4>车辆基本信息</h4>
            </p>
            <div class="clear"></div>
            <p>
            <label>车辆品牌：</label>
            <input class="text-input" required="required" type="text" name="brand" id="brand" value="<?php echo ($request['brand']); ?>">
            </p>
            <div class="clear"></div>
            <p>
            <label>新车：</label>
            <!--<input class="text-input" required="required" type="text" name="type" id="type" value="<?php echo ($request['type']); ?>">-->
            <select name="type" id="type">
              <option value="两厢">两厢</option>
              <option value="三厢">三厢</option>
              <option value="微面车">微面车</option>
              <option value="新能源车">新能源车</option>
              <option value="SUV越野车">SUV越野车</option>
              <option value="MPV商务车">MPV商务车</option>
            </select>
            </p>
            <div class="clear"></div>
            <p>
            <label>车辆型号：</label>
            <input class="text-input" required="required" type="text" name="model" id="model" value="<?php echo ($request['model']); ?>">
            </p>
            <div class="clear"></div>
            <p>
            <label>车辆描述：</label>
            <input class="text-input" required="required" type="text" name="description" id="description" value="<?php echo ($request['description']); ?>">
            </p>
            <div class="clear"></div>
            <p>
              <?php if($title !="修改车辆"){ ?>
                <label>车辆图片地址：</label>
                <?php
 }else{ ?>
                <label>更改车辆图片：</label>
                <input type="hidden" min="1"name="picture" id="picture" value="<?php echo ($request['picture']); ?>">
                <?php
 } ?>
            
            <input type="file" name="photo" id="photo" requested="requested"  accept="image/gif, image/jpeg">
            </p>
            <div class="clear"></div>
            <p>
            <label>车辆价格：</label>
            <input class="text-input" required="required" type="number" min="1"name="price" id="price" value="<?php echo ($request['price']); ?>">
            </p>
            <div class="clear"></div>
            <p>
            <label>车辆折扣：</label>
            <input class="text-input" type="number" min="1" name="discount" id="discount" value="<?php echo ($request['discount']); ?>">
            </p>
            <div class="clear"></div>
            <p>
            <label>车辆库存：</label>
            <input class="text-input" required="required" type="number" min="1" name="stock" id="stock" value="<?php echo ($request['stock']); ?>">
            </p>
            <div class="clear"></div>
        <p>
            <h4>车身参数</h4>
            </p>
            <div class="clear"></div>
            <p>
            <?php  function get_number_inputs($arr,$len,$request){ foreach($arr as $name=>$value){ $str = '
            <p>
            <label>'.$value.'</label>
            <input class="text-input" required="required" type="number"'; if($len[$name]){ $str .= ' min="'.$len[$name]['min'].'" max="'.$len[$name]['max'].'"'; }else{ $str .= ' min="1"'; } $str .= ' name="'.$name.'" id="'.$name.'" value="'.$request[$name].'">
            </p>
            <div class="clear"></div>
            '; echo $str; } } function get_text_inputs($arr,$request){ foreach($arr as $name=>$value){ $str = '
            <p>
            <label>'.$value.'</label>
            <input class="text-input" required="required" type="text" name="'.$name.'" id="'.$name.'" value="'.$request[$name].'" >
            </p>
            <div class="clear"></div>
            '; echo $str; } } $arr = array( 'length'=>'长（mm）', 'width'=>'宽', 'height'=>'高', 'door'=>'车身结构（X门X座）', 'wheelbase'=>'轴距（204 0-3500mm）', 'weight'=>'车重（kg）', 'fuelTank'=>'油箱容积（L）', 'trunkSpace'=>'行李箱容积（L）', 'groundClearance'=>'最小离地间隙(100～250mm)'); $len = array( 'wheelbase'=>array('min'=>'2040','max'=>'3500'), 'groundClearance'=>array('min'=>'100','max'=>'250') ); get_number_inputs($arr,$len,$request); $arr = array('guarantee'=>'保修政策（X年X万公里）'); get_text_inputs($arr,$request); ?>

            <p>
            <h4>技术参数</h4>
            </p>
            <div class="clear"></div>
            <?php  function get_select_inputs($arr,$option,$request){ foreach($arr as $name=>$value){ $str = '
            <p>
            <label>'.$value.'</label>
            <select name="'.$name.'" id="'.$name.'">'; foreach($option[$name] as $v){ if($v == $reuqest[$name]){ $str .='<option value="'.$v.'" selected="selected">'.$v.'</option>'; continue; } $str .='<option value="'.$v.'">'.$v.'</option>'; } $str .='</select>
            </p>
            <div class="clear"></div>'; echo $str; } } $arr = array( 'gearbox'=>'变速箱（MT,AT,CVT,DSG）', 'driveType'=>'驱动方式', 'resistanceType'=>'助力类型（电动助力,液压助力）' ); $option = array( 'gearbox'=>array('MT', 'AT', 'CVT', 'DSG'), 'driveType'=>array('前置前驱', '前置后驱', '前置四驱', '中置后驱', '中置四驱', '后置后驱', '后置四驱'), 'resistanceType'=>array('电动阻力', '液压助力') ); get_select_inputs($arr,$option,$request); $arr = array( 'maxSpeed'=>'最高车速（180-210Km/h）', 'gearNum'=>'挡位个数（4-8挡）' ); $len = array( 'maxSpeed'=>array('min'=>'180','max'=>'210'), 'gearNum'=>array('min'=>'4','max'=>'8') ); get_number_inputs($arr,$len,$request); ?>
                <!--<input type="hidden" name="trye" id="trye" value="">-->

            <p>
            <h4>发动机参数</h4>
            </p>
            <div class="clear"></div>
            <?php  $arr = array( 'displacement'=> '排量（L）', 'maxPower'=>'最大功率（80-120kw）', 'maxTorque'=> '最大扭矩（100-150Nm）' ); $len = array( 'maxPower'=>array('min'=>'80','max'=>'120'), 'maxTorque'=> array('min'=>'100','max'=>'150') ); get_number_inputs($arr,$len,$request); $arr = array( 'cylinder'=>'汽缸数', 'fuelLabel;'=>'燃油标号', 'intake'=>'进气形式', 'oilFeed'=>'供油方式' , 'environmental'=>'环保标准' ); $option = array( 'cylinder'=>array('3','4','5','6','8','10','12'), 'fuelLabel;'=>array('90','93','97','98'), 'intake'=>array('机械增压', '涡轮增压', '自然吸气'), 'oilFeed'=>array('化油器', '单点电喷', '多点电喷', '直喷'), 'environmental'=>array('国I','国Ⅱ','国Ⅲ','国IV') ); get_select_inputs($arr,$option,$request); ?>


            <p>
              <label>验证码:</label>
              <img style="height: 30%; width: 30%;" src="/cargo/supply.php/Home/Admin/showVerify" onclick="">
              <input class="text-input small-input" type="text" name="verify" id="verify">   
            </p>
            <div class="clear"></div>
            
          <input class="button" type="submit" value="<?php echo ($submitName); ?>" />
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
      &#169; Copyright 2015 CARGO | Powered by AliceXT| <a href="#">Top</a> </small> </div>
    <!-- End #footer -->
  </div>
  <!-- End #main-content -->
</div>
</body>
<!-- Download From www.exet.tk-->
</html>