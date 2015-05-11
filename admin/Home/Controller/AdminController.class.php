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
		if(!session('?cargo_session')){
			$url=U('Index/index');
			$this->error('登录超时，请重新登录',$url);
		}//dump(session('cargo_session'));
	}

	public function checkVerify($str){
        $Verify = new Verify();
        //判断验证码
        if(!$Verify->check($str)){
            $this->error('验证码错误');
            return;
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
	

	public function logout(){
		header("Content-Type:text/html; charset=utf-8");

		session('cargo_session',null);

		$url = U("Index/index");
		$this->success("退出成功",$url);
	}

}