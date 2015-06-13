<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
class CarController extends Controller{

	public $Title = "车辆管理";//大标题

	function func_begin(){
		header("Content-Type:text/html; charset=utf-8");
		$admin = A('Admin');
		$admin->checkLegal();
		return $admin;
	}
	function func_end($str = ""){
		$this->assign("Title",$this->Title);
		$this->display($str);
	}

	function get_curl($url){
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

	function check(){
		$this->func_begin();

		$url = BACK_URL."/cars";//cars
		
		$output = $this->get_curl($url);
		//$this->assign("snow",$url);
		//$assoc当该参数为 TRUE 时，将返回 array 而非 object 。 
		$requests = json_decode($output,$assoc = true);

		$requests = 
		$this->set_page($requests);

		$this->assign("requests",$requests);
		//$this->assign("title","查看车辆");//小标题
		$this->assign("title","查看车辆");
		//dump($requests);
		$this->func_end();
	}

	function search(){
		$this->func_begin();
		$url = BACK_URL."/cars/search?";
		$data = urlencode(http_build_query($_GET));
		$url =$url.$data;//将参数加到url后面
		//dump($url);
		
		
		//$url = urlencode($url);
		//$this->assign("snow",$url);
		//$json= $this->get_curl($url);

		$requests = json_decode($json,true);

		$requests = $this->set_page($requests);

		$this->assign("requests",$requests);
		$this->assign("title","搜索".$_GET['key']);//小标题
		$this->assign("title","搜索".$_GET['brand']);//小标题
		//$this->assign("snow",$url);
		$this->func_end("check");
	}

//按照总体设计，车辆的删除只有供应商有权限进行
	
	function delete(){
		//dump("delete function");
		$admin = $this->func_begin();

		if(isset($_GET['id'])){
			$_POST['id']=$_GET['id'];
		}//单独删除
		foreach($_POST as $i=>$id){
			$url = BACK_URL."/cars/".$id;

			//dump($url);
			if($admin->delete_curl($url)){
				continue;
			}else{
				$this->error("删除用户账号ID为 ".$id." 时，发生了错误。");
			}
			
		}
		$this->success("删除成功");
	}
	
}