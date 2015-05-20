<?php
namespace Home\Controller;
use Think\Controller;

class AdvController extends Controller{

	public $Title = "广告管理";

	function func_begin($curl,$type){
		header("Content-Type:text/html; charset=utf-8");
		$admin = A('Admin');
		$admin->checkLegal();
		if(!$curl){
			return ;
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
	function wait(){
		$url = BACK_URL."/ads/";
		$this->func_begin($url);
		$this->assign("title","带批准申请");
		$this->func_end("check");
	}

	function check(){
		$url = BACK_URL."/ads/";
		$this->func_begin($url);
		$this->assign("title","查看现有广告");
		$this->func_end();
	}
}