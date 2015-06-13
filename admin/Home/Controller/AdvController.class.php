<?php
namespace Home\Controller;
use Think\Controller;

class AdvController extends Controller{

	public $Title = "广告管理";

	function func_begin($curl,$flag){
		header("Content-Type:text/html; charset=utf-8");
		$admin = A('Admin');
		$admin->checkLegal();
		if(!$curl){
			return $admin;
		}

		$output = $admin->get_curl($curl);
		$requests = json_decode($output,true);

		if($flag){
			foreach($requests as $r){

				if($r['adstate'] == "Apply"){
					$arr[] = $r;
				}
			}
			$requests = $arr;
		}

		//$this->assign("snow",$requests);
		$requests = $admin->set_page($requests);
		$this->assign("requests",$requests);

	}

	function func_end($str){
		$this->assign("Title",$this->Title);
		$this->display($str);
	}
	function wait(){
		$url = BACK_URL."/ads/";
		$this->func_begin($url,true);
		$this->assign("title","待批准申请");
		$this->func_end("check");
	}

	function check(){
		$url = BACK_URL."/ads/";
		$this->func_begin($url);
		$this->assign("title","查看现有广告");
		$this->func_end();
	}

	function modify()
	{
		$url = BACK_URL."/ads/".$_GET['id'];

		$admin = $this->func_begin();

		$json = $admin->get_curl($url);
		//dump($json);
		$request = json_decode($json,true);

		$this->assign("request",$request);
		$this->assign("action","Adv/patch");
		$this->assign("title","修改广告状态");
		$this->assign("submitName","提交");
		//$this->assign("snow",$json);
		$this->func_end();

	}

	function patch(){
		$url = BACK_URL."/ads/".$_POST['id'];
		//dump($url);
		$admin = $this->func_begin();

		//得到原来数据
		//$json = $admin->get_curl($url);
		//dump($json);
		//$request = json_decode($json,true);
		//dump($request);
		//$arr['picture'] = $request['picture'];
		//$arr['link'] = $request['link'];
		$arr['adstate'] = $_POST['adstate'];//只更新adstate
		//$arr['position'] = $request['position'];
		//$arr['word'] = $request['word'];

		$json = json_encode($arr);
		//dump($json);
		$result = $admin->patch_curl($url,$json);
		
		if($result){
			$url = U("Adv/check");
			$this->success("更改成功",$url);
		}
	}

}