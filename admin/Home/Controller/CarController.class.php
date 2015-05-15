<?php
namespace Home\Controller;
use Think\Controller;

class CarController extends Controller{

	public $Title = "车辆管理";//大标题

	function func_begin(){
		header("Content-Type:text/html; charset=utf-8");
		$admin = A('Admin');
		$admin->checkLegal();
	}
	function func_end($str = ""){
		$this->assign("Title",$this->Title);
		$this->display($str);
	}

	function check(){
		$this->func_begin();

		$url = BACK_URL."/cars.php";//cars
		$json= file_get_contents($url);
		//$assoc当该参数为 TRUE 时，将返回 array 而非 object 。 
		$requests = json_decode($json,$assoc = true);

		$this->assign("requests",$requests);

		$this->assign("title","查看车辆");//小标题

		//dump($requests);
		$this->func_end();
	}

	function search(){
		$this->func_begin();

		$url = BACK_URL."/search.php";
		$url =$url."?keyword=".$_GET['key'];//将参数加到url后面

		$json= file_get_contents($url);

		$requests = json_decode($json,true);

		$this->assign("requests",$requests);
		$this->assign("title","搜索".$_GET['key']);//小标题
		$this->func_end("check");
	}

//按照总体设计，车辆的删除只有供应商有权限进行
	
	function delete(){
		$this->func_begin();

		if(isset($_GET['id'])){
			$_POST['id']=$_GET['id'];
		}//单独删除
		
		foreach($_POST as $i=>$id){
			$data[]=$id;
		}//批量删除

		$result = ture;
		if($result){
			$this->success("删除成功");
		}else{
			$this->error("删除成功");
		}
	}
	
}