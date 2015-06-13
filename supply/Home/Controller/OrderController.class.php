<?php
namespace Home\Controller;
use Think\Controller;

class OrderController extends Controller{
	public $Title = "订单管理";
	public $car_id;

	function func_begin($curl,$type){
		header("Content-Type:text/html; charset=utf-8");
		$admin = A('Admin');
		$admin->checkLegal();
		if(!$curl){
			return $admin;
		}

		$output = $admin->get_curl($curl);
		$requests = json_decode($output,true);

		foreach($requests as $r){
			if($r['type'] == $type){
				$arr[] = $r;
			}
		}

		//$this->assign("snow",$requests);
		$this->assign("requests",$arr);
	}
	function func_end($str){
		$this->assign("Title",$this->Title);
		$this->display($str);
	}

	function check(){
		$admin = $this->func_begin();
		$this->car_id = $_GET['car_id'];

		$url = BACK_URL."/cars/".$_GET['car_id']."/orders";
		
		$output = $admin->get_curl($url);
		//$assoc当该参数为 TRUE 时，将返回 array 而非 object 。 
		$requests = json_decode($output,$assoc = true);

		//等待后台修复，下面注释去掉
		/*
		foreach($requests as $r)//处理挑选本供销商的车辆
		{
			if($r['owner'] == session("id_session")){
				$arr[] = $r;
			}
		}
		$requests = $arr;
		*/
		$requests = $admin->set_page($requests);//分页处理

		$this->assign("requests",$requests);
		//$this->assign("title","查看车辆");//小标题
		$this->assign("title","查看订单");
		//$this->assign("snow",session("cargo_session"));
		//dump($requests);
		$this->func_end();
	}

	function modify(){
		$this->func_begin();
		$this->assign("submitName","修改状态");
		$this->assign("request",$_GET['result']);
		$this->assign("title","修改订单状态");
		$this->assign("action","Order/patch/id/".$_GET['id']);
		$this->func_end();
	}

	function patch(){
		$json = json_encode($_POST);
		$url = BACK_URL."/orders/".$_GET['id'];

		$admin = $this->func_begin();

		if($admin->patch_curl($url,$json)){
			$url= U("Car/check");
			$this->success("修改成功",$url);
		}
	}

}