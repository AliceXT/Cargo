<?php
namespace Home\Controller;
use Think\Controller;

class AdvController extends Controller{

	public $Title = "广告管理";

	//$id是供销商的ID,$flag是表示是否是线上广告,真表示为是线上广告
	function func_begin($curl,$id,$flag){
		header("Content-Type:text/html; charset=utf-8");
		$admin = A('Admin');
		$admin->checkLegal();
		if(!$curl){
			return $admin;
		}

		$output = $admin->get_curl($curl);
		$requests = json_decode($output,true);

		foreach($requests as $r){
			if($r['account_id'] == $id){
				if($flag){
					if($r['state'] == "Approval"){
						$arr[] = $r;
					}
				}else{
						$arr[] = $r;
				}
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
		$this->func_begin($url,session('id_session'),false);
		$this->assign("title","未上线广告");
		$this->func_end("check");
	}

	function check(){
		$url = BACK_URL."/ads/";
		$this->func_begin($url,session('id_session'),true);
		$this->assign("title","在线广告");
		$this->func_end();
	}

	function add(){
		$admin = $this->func_begin();

		$this->assign("action","post");
		$this->assign("title","申请广告");
		$this->assign("submitName","提交申请");
		$this->func_end();
	}
	function post(){
		$admin = $this->func_begin();

		//$admin->checkVerify($_POST['verify']);

		//先上传图片到后台
		$url = BACK_URL."/upload";
		$add = $_FILES['photo']['tmp_name'];
		$output = $admin->curl_upload($url,$add);
		//dump($url);
		fclose($fp);
		//dump($output);
		$_POST['picture'] =json_decode($output,1)['picture'];//后面的参数1为表示输出数组

		
		//创建POST对象
		$_POST['adstate'] = "Apply";
		//dump($_POST);
		
		$json = json_encode($_POST);
		//dump($json);
		
		//POST数据
		$url = BACK_URL."/ads";
		$output = $admin->post_curl($url,$json);//得到返回结果
		
		//返回操作提示
		if($output){
			$url = U('Adv/check');
			$this->success("添加成功",$url);
		}else{
			$this->error("添加失败");
		}
		
		
	}
}