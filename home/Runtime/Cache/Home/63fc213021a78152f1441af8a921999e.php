<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!--<link rel="stylesheet"
          href="/cargo/home/Home/Common/main/css/bootstrap-combined.min.css">
   <script src="/cargo/home/Home/Common/main/js/html5shiv.min.js"></script>
    <script src="/cargo/home/Home/Common/main/js/respond.min.js"></script>-->
    <title>填写需求</title>
</head>

<style type="text/css">
    #main{
        border:2px solid #269abc;
        width: 100%;
        height: 100%;
        font-family: "微软雅黑";
        text-align:center;
        color: blue;
    }

</style>

<body>   
<div id="main">
  <form action="" method="POST" name="myform">
    <h3>填写购车需求</h3>
    <p>请务必填写真实有效的信息</p>
    <p>以确保我们的工作人员会第一时间联系您!</p>
    <hr width="100%" align="center">
    <table width="100%" cellpadding="0" cellspacing="0">
       <tr>           
           <td><button class="btn btn-primary">您的姓名</button></td>
           <td><input type="text" id="buyername" autofocus="autofocus" pattern="[\u4e00-\u9fa5]" required/></td>
        </tr>
        <tr>       
             <td><button class="btn btn-primary">联系方式</button></td>
             <td><input type="tel" id="telphone" pattern="\d{3}\d{4}\d{4}" placeholder="xxx-xxxx-xxxx" required/><!--正则表达式匹配-->
             </td>
        </tr>
        <tr>
            <td><button class="btn btn-primary">预计购车时间</button></td>
            <td>
             <input type="date" id="ordertime" required/>
             </td>          
        </tr> 
    </table>
    </br>
        <button type="submit" class="btn btn-primary" name="submit"/>提交</button>
        <button type="reset" class="btn btn-primary" name="reset"/>重置</button>   
  </form>    
</div>
</body>
</html>