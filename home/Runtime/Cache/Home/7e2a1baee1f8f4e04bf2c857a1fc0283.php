<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>jQuery实现的弹出层特效 在线演示 www.divcss5.com</title>
<link rel="stylesheet" href="/cargo/home/Home/Common/main/css/tinybox.css" type="text/css" />
<link rel="stylesheet" href="/cargo/home/Home/Common/main/css/bootstrap-combined.min.css">
<style type="text/css">
.divcss5_list_title{background:#eeeeee; border:1px solid #cccccc; padding:1em;}
.divcss5_list_content{padding:1em;}
#tinybox{position:absolute; display:none; padding:10px; background:#ffffff url(image/preload.gif) no-repeat 50% 50%; border:10px solid #e3e3e3; z-index:2000;}
#tinymask{position:absolute; display:none; top:0; left:0; height:100%; width:100%; background:#000000; z-index:1500;}
#tinycontent{background:#ffffff; font-size:1.1em;}

#n{margin:10px auto; width:920px; border:1px solid #CCC;font-size:12px; line-height:30px;}
#n a{ padding:0 4px; color:#333}
</style>
<script type="text/javascript" src="/cargo/home/Home/Common/main/js/tinybox.js"></script>
</head>

<body>
<p>&nbsp;</p>
	<div class="divcss5_out_box">
    	<div class="divcss5_in_box">
            <h3 class="divcss5_title">jQuery实现的弹出层效果 在线演示效果如下：</h3>
            <div class="divcss5_main_con">
            	            
</div><div class="divcss5_list_title"><b>加载一个静态页面</b><a class="ml20" id="click_test1">效果预览</a></div>
        </div>
    </div>
    
	<script type="text/javascript">
        T$('click_test1').onclick = function(){TINY.box.show('BuyInfo.html',1,500,500,1)}//test.html为弹出层对应网页      
    </script>
</body>
</html>