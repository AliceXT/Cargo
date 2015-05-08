<?php
namespace Home\Controller;
use Think\Controller;
use Think\Verify;
use Think\Page;

class AdminController extends Controller{

	public function index(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checkLegal();//验证用户合法性
		$this->display();
	}

	//验证用户的合法性，每个函数开头都要先调用这个函数
	public function checkLegal() {
		if(cookie("admin") != "cookiestr"){
			$url=U('Admin/login');
			$this->error('登录超时，请重新登录',$url);
		}
	}

	//生成验证码函数
	public function showVerify(){
		$config =    array(
    		'fontSize'    =>    30,    // 验证码字体大小
    		'length'      =>    4,     // 验证码位数
    		'useNoise'    =>    false, // 关闭验证码杂点
		);
		$Verify = new Verify($config);
	    $Verify->entry();
	}
	
	public function login(){

		//初次进入与退出
		if(!isset($_POST['username']) && !isset($_POST['password'])){
			$this->display();
			return;
		}

		$Verify = new Verify();
		//判断验证码
		if(!$Verify->check($_POST['verify'])){
			$this->error('验证码错误');
			return;
		}
		//内置管理员用户
		//用户名：admin
		//密码：admin
		$username=$_POST['username'];
		$password=$_POST['password'];

		$map['admin_Name'] = $username;
		$admin = M('admin');
		$user=$admin->where($map)->find();

		if($username==$user['admin_Name'] &&
		 md5($password)==$user['admin_password']){
			cookie('admin','cookiestr',3600);
			$this->success('管理员登录成功！',"index");
		}else{
			$this->error('用户名或密码错误！');
			return ;	
		}	

		
	}

	public function logout(){
		header("Content-Type:text/html; charset=utf-8");

		cookie(null);

		$this->display('login');
	}

	public function newUser() {
		$this->checkLegal();//验证用户合法性
		//创建新用户
		$this->display();
	}

	public function checkUser(){
		$this->checkLegal();//验证用户合法性
		$admin = M('admin');

		$requests = $admin->select();//计算count用的

		$count = count($requests);

		$Page= new Page($count,NUM_PER_PAGE);
		$show = $Page->show();

		$requests = $admin->limit(NUM_PER_PAGE)->page($_GET['p'])->select();//输出用的

		$this->assign("show",$show);
		$this->assign("requests",$requests);
		$this->display();
	}

	public function delete(){
		$this->checkLegal();//验证用户合法性
		$admin = M('admin');

		$map['admin_Name'] = $_GET['name'];
		
		
		$result = $admin->where($map)->delete();

		if($result !== false){//更新成功
			$this->success('删除成功');
		}else{
			$this->error('删除失败');
		}
		

	}

	public function insertUser() {
		$this->checkLegal();//验证用户合法性
		$Verify = new Verify();
		//判断验证码
		if(!$Verify->check($_POST['verify'])){
			$this->error('验证码错误');
			return;
		}
		//判断两次输入的密码是否一样
		if($_POST['password'] != $_POST['passcheck']){
			$this->error('两次输入的密码不一致');
			return;
		}

		$admin = M('admin');

		$data['admin_Name'] = $_POST['name'];
		$data['admin_password']=md5($_POST['password']);

		$result = $admin->add($data);

		if($result == false){
			$this->error('数据库错误注册失败');
			return;
		}
		$this->success('用户创建成功！','newUser');
	}

}