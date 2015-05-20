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

	public function get_curl($url){
		$ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ( $ch, CURLOPT_FILETIME, true );
        curl_setopt ( $ch, CURLOPT_FRESH_CONNECT, false );
        curl_setopt ( $ch, CURLOPT_NOSIGNAL, true );
        curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, 'GET' );

        //说明是json内容
        $aHeader[] = "Content-Type:application/json;charset=UTF-8";
        $aHeader[] = "Authorization:".session('cargo_session');
        curl_setopt( $ch, CURLOPT_HTTPHEADER, $aHeader);

        $output = curl_exec($ch);
        $status = curl_getinfo($ch)['http_code'];

        curl_close($ch);
        if($status != 200){
        	$this->error("前端与后台数据传输错误".$status);
        }

        return $output;
	}

		public function delete_curl($url){
		$ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ( $ch, CURLOPT_FILETIME, true );
        curl_setopt ( $ch, CURLOPT_FRESH_CONNECT, false );
        curl_setopt ( $ch, CURLOPT_NOSIGNAL, true );
        curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, 'DELETE' );

        //说明是json内容
        $aHeader[] = "Content-Type:application/json;charset=UTF-8";
        $aHeader[] = "Authorization:".session('cargo_session');
        curl_setopt( $ch, CURLOPT_HTTPHEADER, $aHeader);

        $output = curl_exec($ch);
        $status = curl_getinfo($ch)['http_code'];

        curl_close($ch);
        if($status != 204){
        	$this->error("前端与后台数据传输错误".$status);
        }else{
        	return true;
        }
	}

}