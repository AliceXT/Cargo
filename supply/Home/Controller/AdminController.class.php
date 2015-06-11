<?php
namespace Home\Controller;
use Think\Controller;
use Think\Verify;
use Think\Page;
define(BOUNDARY,"---------------------------22139315522833");
class AdminController extends Controller{

	public function index(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checkLegal();//验证用户合法性
        $this->assign('account_name',session('name_session'));
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

    function set_page($requests){
        //分页处理
        $count=count($requests);//总共多少条
        $Page= new Page($count,NUM_PER_PAGE);//调用Page类，每页NUM_PER_PAGE条
        $index=(intval($_GET['p'])-1)*NUM_PER_PAGE;//定位当前的条数
        $requests = array_slice($requests, $index, NUM_PER_PAGE);
        $show=$Page->show();
        $this->assign("show",$show);//第几页的页面链接

        return $requests;
    }

    public function post_curl($url,$json){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ( $ch, CURLOPT_FILETIME, true );
        curl_setopt ( $ch, CURLOPT_FRESH_CONNECT, false );
        curl_setopt ( $ch, CURLOPT_NOSIGNAL, true );
        curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, 'POST' );

        //说明是json内容
        $aHeader[] = "Content-Type:application/json;charset=UTF-8";
        $aHeader[] = "Authorization:".session('cargo_session');
        curl_setopt( $ch, CURLOPT_HTTPHEADER, $aHeader);

        curl_setopt( $ch, CURLOPT_POSTFIELDS, $json);

        $output = curl_exec($ch);
        $status = curl_getinfo($ch)['http_code'];

        curl_close($ch);
        if($status>250){
            $this->error("前端与后台数据传输错误".$status);
        }else{
            return $output;
        }    
    }

    public function curl_upload($url,$add)
    {
        $post_data = array(
            "data"=>"@".$add);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        $output = curl_exec($ch);
        $status = curl_getinfo($ch)['http_code'];

        curl_close($ch);
        if($status>250){
            $this->error("前端与后台数据传输错误".$status);
        }else{
            return $output;
        }    
        
    }

    public function upload($url,$name,$pic,$add){     
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ( $ch, CURLOPT_FILETIME, true );
        curl_setopt ( $ch, CURLOPT_FRESH_CONNECT, false );
        curl_setopt ( $ch, CURLOPT_NOSIGNAL, true );
        curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, 'POST' );
        //curl_setopt( $ch, CURLOPT_UPLOAD, true);

        //说明是json内容
        //$aHeader[] = "--".BOUNDARY;
        $aHeader[] = "User-Agent:Mozilla/5.0 (Windows NT 5.1; rv:38.0) Gecko/20100101 Firefox/38.0";
        $aHeader[] = "Accept:text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8";
        $aHeader[] = "Connection:keep-alive";
        $aHeader[] ="Content-Type:multipart/form-data;";
        

        curl_setopt( $ch, CURLOPT_HTTPHEADER, $aHeader);

        $post_data = array(
            "data"=>$add
            );
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $post_data);

        $output = curl_exec($ch);
        $status = curl_getinfo($ch)['http_code'];

        curl_close($ch);
        if($status>250){
            $this->error("前端与后台数据传输错误".$status);
        }else{
            return $output;
        }    
    }

    public function patch_curl($url,$json){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ( $ch, CURLOPT_FILETIME, true );
        curl_setopt ( $ch, CURLOPT_FRESH_CONNECT, false );
        curl_setopt ( $ch, CURLOPT_NOSIGNAL, true );
        curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, 'PATCH' );

        //说明是json内容
        $aHeader[] = "Content-Type:application/json;charset=UTF-8";
        $aHeader[] = "Authorization:".session('cargo_session');
        curl_setopt( $ch, CURLOPT_HTTPHEADER, $aHeader);

        curl_setopt( $ch, CURLOPT_POSTFIELDS, $json);

        $output = curl_exec($ch);
        $status = curl_getinfo($ch)['http_code'];

        curl_close($ch);
        if($status>250){
            $this->error("前端与后台数据传输错误".$status);
        }else{
            return $output;
        }    
    }

}