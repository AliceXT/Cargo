<?php
namespace Home\Controller;
use Think\Controller;

class UserController extends Controller{
	public $Title = "用户管理";

	function func_begin(){
		header("Content-Type:text/html; charset=utf-8");
		$admin = A('Admin');
		$admin->checkLegal();
	}
	function func_end($str){
		$this->assign("Title",$this->Title);
		$this->display($str);
	}

	function user(){
		$this->func_begin();
		
		$this->func_end();
	}

	function supply(){
		$this->func_begin();
		
		$this->func_end("user");
	}
}