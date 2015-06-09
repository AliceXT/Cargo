<?php
namespace Home\Controller;
use Think\Controller;
use Think\Verify;
use Think\Page;
class RegisterController extends Controller{

	public function index(){
		header("Content-Type:text/html; charset=utf-8");
		$this->display();
	}
//用户注册时，在后台创建新用户
	function add(){
		$this->assign("InsertUser","post");//触发添加用户动作
		$this->assign("submitName","注册");//用户点击确认按钮
	}

	function post(){

		//创建POST对象
		$_POST['owner']=session('id_session');
		$json = json_decode($_POST);
		//dump($json);
		
		//POST数据
		$url = BACK_URL."/users";
		$output = $admin->post_curl($url,$json);//得到返回结果
		
		//返回操作提示
		if($output){
			$url = U('index');
			$this->success("用户注册成功",$url);
		}else{
			$this->error("用户注册失败");
		}
	}
	function InsertUser()
		{
			$this->assign("InsertUser","post");//触发添加用户动作
			$this->assign("InsertUser","Register/post");
			//$this->assign("")
			$this->display();
			//dump("ok");
		}
	function abc()
		{
			dump("ok");
		}	
}
	
