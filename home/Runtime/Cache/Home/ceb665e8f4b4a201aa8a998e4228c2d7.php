<?php if (!defined('THINK_PATH')) exit();?><form action="" method="POST" name="myform">
      <div class="login"> 
        <h3>用户登录</h3>             
        <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td><button class="btn btn-primary">用户名</button></td>
                    <td>
                    <input type="text" id="username" required/>
                    </td>
                </tr>               
                <tr>                    
                    <td><button class="btn btn-primary">密码</button></td>
                    <td>
                    <input type="password" id="userpassword" onchange="" pattern="^[a-z A-Z 0-9 _]{8}" required/>
                    </td>
                </tr>            
            </table>
            </br>
            <button type="submit" class="btn btn-primary" name="submit"/>登录</button> 
            未注册？<a href="#"id="UsersRegister">点击注册</a>

    <hr>
        <h3>供销商登录</h3>             
        <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td><button class="btn btn-primary">公司名</button></td>
                    <td>
                    <input type="text" id="supplyname" required/>
                    </td>
                </tr>               
                <tr>                    
                    <td><button class="btn btn-primary">密码</button></td>
                    <td>
                    <input type="password" id="supplypassword" onchange="" pattern="^[a-z A-Z 0-9 _]{8}" required/>
                    </td>
                </tr>            
            </table>
            </br>
            <button type="submit" class="btn btn-primary" name="submit"/>登录</button> 
            未注册？<a href="#"id="SupplyRegister">点击注册</a>
    </div>
   </form>
   
<!--设置用户点击时的弹窗-->
<script type="text/javascript">
      
      var url1 = "http://"+window.location.hostname+":"+window.location.port+'/cargo/index.php/Home/Register/InsertSupply';
     //alert(url1);
      T$('SupplyRegister').onclick = function(){
      TINY.box.show(url1,1,400,450,1)
      }//弹出供销商注册的窗口
      var url2 = "http://"+window.location.hostname+":"+window.location.port+'/cargo/index.php/Home/Register/InsertUser';
      T$('UsersRegister').onclick = function(){
      TINY.box.show(url2,1,400,450,1)
      }//弹出用户注册的窗口

</script>