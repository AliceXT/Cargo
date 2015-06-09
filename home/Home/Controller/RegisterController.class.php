<!--参照CarController.php-->
<?php
namespace Home\Controller;
use Think\Controller;
use Think\Verify;
use Think\Page;

class RegisterController extends Controller{

	public function index(){
		header("Content-Type:text/html; charset=utf-8");
		$this->display();
	}
//用户注册时，在后台创建新用户
	function add(){
		$this->assign("InsertUser","post");//触发添加用户动作
		$this->assign("submitName","注册");//用户点击确认按钮
	}
	function make_json($data)
	{
		//一个正常的可以创建新数据的json
		$str = '{"username":"xiaoyajie","password":"12345678","telephone":"12345678912","Email":"123@123.com"}';
		//被替换的数组
		$searchs["username"] = '"username":"xiaoyajie"';
		$searchs['password'] = '"password":"12345678"';
		$searchs['mobile'] = '"telephone":"12345678912"';
		$searchs['Email'] ='"Email":"123@123.com"';
		
		//遍历表单的每一项
		foreach($data as $name=>$key){
			$replace = '"'.$name.'":"'.$key.'"';
			if($name == "verify")
				continue;
			$str = str_replace($searchs[$name], $replace, $str);
		}

		return $str;
	}

	function post(){

		//创建POST对象
		$_POST['owner']=session('id_session');
		$json = $this->make_json($_POST);
		//dump($json);
		
		//POST数据
		$url = BACK_URL."/users";
		$output = $admin->post_curl($url,$json);//得到返回结果
		
		//返回操作提示
		if($output){
			$url = U('index');
			$this->success("用户注册成功",$url);
		}else{
			$this->error("用户注册失败");
		}
				
	}
	
