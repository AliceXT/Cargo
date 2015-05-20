<?php
namespace Home\Controller;
use Think\Controller;

class UserController extends Controller{
	public $Title = "用户管理";

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

	function user(){
		$url = BACK_URL."/accounts";
		$type = "Buyer";
		$this->func_begin($url,$type);
		
		$this->func_end();
	}

	function supply(){
		$url = BACK_URL."/accounts";
		$type = "Solder";
		$this->func_begin($url,$type);
		
		$this->func_end("user");
	}

	function admin(){
		$url = BACK_URL."/accounts";
		$type = "Admin";
		$this->func_begin($url,$type);
		
		$this->func_end("user");
	}

	function delete(){
		//dump("delete function");
		$admin = $this->func_begin();

		if(isset($_GET['id'])){
			$_POST['id']=$_GET['id'];
		}//单独删除
		foreach($_POST as $i=>$id){
			$url = BACK_URL."/accounts/".$id;

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