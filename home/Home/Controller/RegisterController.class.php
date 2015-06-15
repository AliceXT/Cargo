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
		$url = BACK_URL."/accounts";	//链接到后台的用户表
		$output = $admin->post_curl($url,$json);//得到返回结果
		
		//返回操作提示
		if($output){
			$url = U('Main/index');
			$this->success("恭喜成为Car购新成员！请返回登录！",$url);
		}else{
			$this->error("注册失败，请再试试");
		}				
	}
//用户注册时，在后台创建新用户
	function InsertUser()
		{
			$admin = $this->func_begin();
			$this->assign("InsertUser","Register/post");//触发添加动作，post数据
			$this->assign("submitName","注册");//用户点击确认按钮
			$this->assign("require","required");
			$this->func_end();
			//dump("ok");
		}
	function InsertSupply()
		{
			$admin = $this->func_begin();
			$this->assign("InsertSupply","Register/post");//触发添加动作，post数据
			$this->assign("submitName","注册");//用户点击确认按钮
			$this->func_end();
			//dump("ok");
		}
		//用户修改资料
		function modify()
		{
			$admin = $this->func_begin();
			$url = BACK_URL."/accounts/".session("id_session");
			//dump($url);
			$request = json_decode($admin->get_curl($url),true);
			$this->assign("request",$request);
			$this->assign("InsertUser","Register/patch");//触发添加动作，post数据
			$this->assign("submitName","修改");//用户点击确认按钮

			//new session
			session(array('name'=>'pass_session','expire'=>60));//初始化cargo_session
			session('pass_session',$request['password']);//将cargo_session赋值为token的值

			$this->func_end("InsertUser");
			//dump("ok");
		}
	function patch(){

		if($_POST['passold'] != session("pass_session")){
			$this->error("原密码不正确");
		}

		$admin = $this->func_begin();

		//$admin->checkVerify($_POST['verify']);

		//创建POST对象
		//$_POST['owner']=session('id_session');
		$_POST['password'] = $_POST['passnew'];
		$json = json_encode($_POST);//encode是变成json,decode是从json变成类
		dump($json);
		
		//POST数据
		$url = BACK_URL."/accounts/".session("id_session");	//链接到后台的用户表
		$output = $admin->patch_curl($url,$json);//得到返回结果
		dump($url);
		dump($output);
		
		//返回操作提示
		if($output){
			$url = U('Main/index');
			$this->success("修改成功！请返回登录！",$url);
		}else{
			$this->error("修改失败，请再试试");
		}				
	}
}
	
