<?php
namespace Home\Controller;
use Think\Controller;

class AdvController extends Controller{

	public $Title = "广告管理";

	function func_begin($curl,$id){
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
			//if(1){
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
		$this->func_begin($url,session('id_session'));
		$this->assign("title","未上线广告");
		$this->func_end("check");
	}

	function check(){
		$url = BACK_URL."/ads/";
		$this->func_begin($url,session('id_session'));
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

	function post1(){
		dump($_POST);
		dump($_FILES);
	}
	function post(){
		$admin = $this->func_begin();

		//$admin->checkVerify($_POST['verify']);

		//先上传图片到后台
		$url = BACK_URL."/upload";
		$name = $_FILES['photo']['name'];
		//由于上传过来的图片被保存在一个临时文件中，所以
		//我们仅需要读取该文件就可以获取传过来的图片
		$fp = fopen($_FILES["photo"]["tmp_name"],"rb");
		$buf = addslashes(fread($fp,$_FILES["photo"]["size"])); 
		//$output = $admin->upload($url,$name,$fp);
		dump($url);
/*
		//创建POST对象
		$_POST['state'] = "Apply";
		$json = $this->make_json($_POST);
		//dump($json);
		
		//POST数据
		$url = BACK_URL."/ads";
		$output = $admin->post_curl($url,$json);//得到返回结果
		
		//返回操作提示
		if($output){
			$url = U('Car/check');
			$this->success("添加成功",$url);
		}else{
			$this->error("添加失败");
		}
*/		
		
	}
}