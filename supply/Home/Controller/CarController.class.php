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
		$this->assign("account_name",session("name_session"));
		$this->display($str);
	}


	function check(){
		$admin = $this->func_begin();

		$url = BACK_URL."/cars";//cars
		
		$output = $admin->get_curl($url);
		//$this->assign("snow",$url);
		//$assoc当该参数为 TRUE 时，将返回 array 而非 object 。 
		$requests = json_decode($output,$assoc = true);
		foreach($requests as $r)//处理挑选本供销商的车辆
		{
			if($r['owner'] == session("id_session")){
				$arr[] = $r;
			}
		}

		$requests = $arr;

		$requests = $admin->set_page($requests);//分页处理

		$this->assign("requests",$requests);
		//$this->assign("title","查看车辆");//小标题
		$this->assign("title","查看车辆");
		$this->assign("snow",session("cargo_session"));
		//dump($requests);
		$this->func_end();
	}

	function search(){
		$admin = $this->func_begin();

		$url = BACK_URL."/cars/search";

		$url =$url."?brand=".$_GET['key'];//将参数加到url后面

		//dump($url);
		$this->assign("snow",$url);
		$output = $admin->get_curl($url);
		//$this->assign("snow",$url);
		//$assoc当该参数为 TRUE 时，将返回 array 而非 object 。 
		$requests = json_decode($output,$assoc = true);
		foreach($requests as $r)//处理挑选本供销商的车辆
		{
			if($r['owner'] == session("id_session")){
				$arr[] = $r;
			}
		}

		$requests = $arr;

		$requests = $admin->set_page($requests);//分页处理

		$this->assign("requests",$requests);
		//$this->assign("title","查看车辆");//小标题
		$this->assign("title","搜索车辆");
		//$this->assign("snow",session("cargo_session"));
		//dump($requests);
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

	function add(){
		$admin = $this->func_begin();

		$this->assign("action","post");
		$this->assign("title","添加车辆");
		$this->assign("submitName","添加");
		$this->func_end();
	}

	function modify(){
		$admin = $this->func_begin();

		$url = BACK_URL."/cars/".$_GET['id'];
		$output = $admin->get_curl($url);
		$arr = json_decode($output,true);
		//dump($arr);
		foreach($arr as $key=>$value){
			if(gettype($value) == "array"){
				foreach($value as $keyinner=>$valueinner){
					if(!isset($combine[$keyinner])){
						$combine[$keyinner] = $valueinner;
					}					
				}
				continue;
			}
			$combine[$key] = $value;
		}
		//dump($combine);

		$this->assign("request",$combine);
		$this->assign("action","patch/id/".$_GET['id']);
		$this->assign("title","修改车辆");
		$this->assign("submitName","保存修改");

		$this->func_end("add");
	}
	function make_json($data)
	{
		//一个正常的可以创建新数据的json
		$str = '{"model":"testc1","carTechnique":{"trye":"185/60R14","maxSpeed":120,"resistanceType":"液压助力","driveType":"中置后驱","gearbox":"AT","gearNum":4},"type":"MPV商务车","discount":20000,"picture":"f://...","carEngine":{"oilFeed":"化油器","intake":"机械增压","maxTorque":100,"displacement":400,"fuelLabel":90,"cylinder":4,"maxPower":80,"environmental":"test环保标准001"},"price":20001,"stock":20001,"description":"testc1","owner":1,"brand":"123","carBody":{"wheelbase":2040,"weight":400,"height":140,"seat":4,"width":240,"length":400,"guarantee":"4年4万公里","groundClearance":140,"door":4,"trunkSpace":4,"fuelTank":4}}';

		//被替换的数组
		$searchs["model"] = '"model":"testc1"';
		$searchs['trye'] = '"trye":"185/60R14"';
		$searchs['maxSpeed'] = '"maxSpeed":120';
		$searchs['resistanceType'] = '"resistanceType":"液压助力"';
		$searchs['driveType'] = '"driveType":"中置后驱"';
		$searchs['gearbox'] = '"gearbox":"AT"';
		$searchs['gearNum'] = '"gearNum":4';
		$searchs['type'] = '"type":"MPV商务车"';
		$searchs['discount'] = '"discount":20000';	
		$searchs['picture'] = '"picture":"f://..."';
		$searchs['oilFeed'] = '"oilFeed":"化油器"';
		$searchs['intake'] = '"intake":"机械增压"';
		$searchs['maxTorque'] = '"maxTorque":100';
		$searchs['displacement'] = '"displacement":400';
		$searchs['fuelLabel'] = '"fuelLabel":90';
		$searchs['cylinder'] = '"cylinder":4';
		$searchs['maxPower'] = '"maxPower":80';
		$searchs['environmental'] = '"environmental":"test环保标准001"';
		$searchs['price'] = '"price":20001';
		$searchs['stock'] = '"stock":20001';
		$searchs['description'] = '"description":"testc1"';
		$searchs['owner'] = '"owner":1';
		$searchs['brand'] = '"brand":"123"';
		$searchs['wheelbase'] = '"wheelbase":2040';
		$searchs['weight'] = '"weight":400';
		$searchs['height'] = '"height":140';
		$searchs['seat'] = '"seat":4';
		$searchs['width'] = '"width":240';
		$searchs['length'] = '"length":400';
		$searchs['guarantee'] = '"guarantee":"4年4万公里"';
		$searchs['groundClearance'] = '"groundClearance":140';
		$searchs['door'] = '"door":4';
		$searchs['trunkSpace'] = '"trunkSpace":4';
		$searchs['fuelTank'] = '"fuelTank":4';
		
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
		$admin = $this->func_begin();

		//$admin->checkVerify($_POST['verify']);

		//创建POST对象
		$_POST['owner']=session('id_session');
		$json = $this->make_json($_POST);
		//dump($json);
		
		//POST数据
		$url = BACK_URL."/cars";
		//$json = json_encode($data);
		//$json = '{"model":"testc1","carTechnique":{"id":6,"trye":"185/60R14","maxSpeed":120,"resistanceType":"液压助力","driveType":"中置后驱","gearbox":"AT","gearNum":4},"type":"MPV商务车","discount":20000,"id":6,"picture":"f://...","carEngine":{"id":6,"oilFeed":"化油器","intake":"机械增压","maxTorque":100,"displacement":400,"fuelLabel":90,"cylinder":4,"maxPower":80,"environmental":"test环保标准001"},"price":20001,"stock":20001,"description":"testc1","owner":1,"brand":"123","carBody":{"id":6,"wheelbase":2040,"weight":400,"height":140,"seat":4,"width":240,"length":400,"guarantee":"4年4万公里","groundClearance":140,"door":4,"trunkSpace":4,"fuelTank":4}}';
		$output = $admin->post_curl($url,$json);//得到返回结果
		
		//返回操作提示
		if($output){
			$url = U('Car/check');
			$this->success("添加成功",$url);
		}else{
			$this->error("添加失败");
		}				
	}
	
	function patch(){
		$admin = $this->func_begin();

		//$admin->checkVerify($_POST['verify']);

		//创建POST对象
		$_POST['owner']=session('id_session');
		$json = $this->make_json($_POST);
		
		
		//POST数据
		$url = BACK_URL."/cars/".$_GET['id'];
		//dump($url);
		$output = $admin->patch_curl($url,$json);//得到返回结果
		
		//返回操作提示
		if($output){
			$url = U('Car/check');
			$this->success("修改成功",$url);
		}else{
			$this->error("修改失败");
		}
		
		
	}
}