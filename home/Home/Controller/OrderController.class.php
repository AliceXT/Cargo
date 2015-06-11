<?php
namespace Home\Controller;
use Think\Controller;
use Think\Verify;
use Think\Page;
class RegisterController extends Controller{

	function func_begin(){
		header("Content-Type:text/html; charset=utf-8");
		$admin = A('Admin');
		return $admin;
	}
	function func_end($str = ""){
		$this->assign("account_name",session("name_session"));
		$this->display($str);
	}
  
	function post(){
		$admin = $this->func_begin();

		//$admin->checkVerify($_POST['verify']);

		//创建POST对象
		$_POST['owner']=session('id_session');
		$json = json_encode($_POST);//encode是变成json,decode是从json变成类
		//dump($json);
		
		//POST数据
		$url = BACK_URL."/cars/{car_id}/orders";//连接到后台的订单表
		$output = $admin->post_curl($url,$json);//得到返回结果
		
		//返回操作提示
		if($output){
			$url = U('Main/index/');
			$this->success("订单已提交，客服人员会尽快与您联系！",$url);
		}else{
			$this->error("预订失败，请再试试");
		}				
	}
//用户注册时，在后台创建新用户
	function ordermessage()
		{
			$admin = $this->func_begin();
			$this->assign("ordermessage","orders/post");//触发添加动作，post数据
			$this->assign("submitName","注册");//用户点击确认按钮
			$this->func_end();
			//dump("ok");
		}
	
}
	
