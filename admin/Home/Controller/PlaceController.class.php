<?php
namespace Home\Controller;
use Think\Controller;
use Think\Verify;
use Think\Page;
class PlaceController extends Controller{

	public function newPlace(){
		header("Content-Type:text/html; charset=utf-8");
		$Admin = A('Admin');
		$Admin->checkLegal();

		$this->display();
	}

	public function insertPlace(){
		header("Content-Type:text/html; charset=utf-8");
		$Admin = A('Admin');
		$Admin->checkLegal();

		$Verify = new Verify();
		//判断验证码
		if(!$Verify->check($_POST['verify'])){
			$this->error('验证码错误');
			return;
		}
		
		$place = M('place');

		$data['place_name'] = $_POST['place_name'];
		$data['place_tip'] = $_POST['place_tip'];

		$result=$place->add($data);
		
		if($result){
			//更新成功
			$this->success('添加成功', 'checkPlace');
		}else{
			//更新失败
			$this->error('添加失败');
		}

	}
	//展示修改页面
	public function modifyPlace() {
		header("Content-Type:text/html; charset=utf-8");
		$Admin = A('Admin');
		$Admin->checkLegal();

		$data['place_id'] = $_GET['id'];

		$place = M('place');

		$request = $place->where($data)->find();
		
		$this->assign("request",$request);

		$this->display();

	}
	public function modify(){
		header("Content-Type:text/html; charset=utf-8");
		$Admin = A('Admin');
		$Admin->checkLegal();

		$place = M('place');

		$data['place_id'] = $_POST['place_id'];
		$data['place_name'] = $_POST['place_name'];
		$data['place_tip'] = $_POST['place_tip'];

		$result=$place->where('place_id='.$data['place_id'])->save($data);
		
		if($result){
			//更新成功
			$this->success('更改成功', 'checkPlace');
		}else{
			//更新失败
			$this->error('更改失败');
		}
	}

	public function checkPlace(){
		header("Content-Type:text/html; charset=utf-8");
		$Admin = A('Admin');
		$Admin->checkLegal();


		$place = M('place');

		$requests = $place->select();//计算count用的

		$count = count($requests);

		$Page= new Page($count,NUM_PER_PAGE);
		$show = $Page->show();

		$requests = $place->limit(NUM_PER_PAGE)->page($_GET['p'])->select();//输出用的

		$this->assign("show",$show);
		$this->assign("requests",$requests);
		$this->display();
	}

}
