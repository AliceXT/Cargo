<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
class MainController extends Controller {
    
	/*public function index(){
			
	 	header("Content-Type:text/html; charset=utf-8");
  		$this->display("check");//跨控制器访问

	}*/

    //验证用户的合法性，每个函数开头都要先调用这个函数
    public function checkLegal() {
        if(!session('?cargo_session')){
            $url=U('Main/index');
            $this->error('登录超时，请重新登录',$url);
        }//dump(session('cargo_session'));
    }

        function func_begin(){
                header("Content-Type:text/html; charset=utf-8");
                $admin = A('Admin');
                return $admin;
        }
        function func_end($str = ""){
                $this->assign("Title",$this->Title);
                $this->display($str);
        }
    //处理用户退出
        function logout(){

        header("Content-Type:text/html; charset=utf-8");

        session('cargo_session',null);
        session('id_session',null);
        session('name_session',null);

        $url = U("Main/index");
        $this->success("退出成功",$url);
     }
    //用户登录时的触发
      function userPost(){
        header("Content-Type:text/html; charset=utf-8");

        //判断验证码
        $action = A("Admin");

        $url = BACK_URL."/accounts/login";

        $post_data = array("name"=>$_POST['username'],
            "password"=>$_POST['pw']);
        $post_data = json_encode($post_data);//编码为json格式

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        //得到的数据不直接输出
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ( $ch, CURLOPT_FILETIME, true );
        curl_setopt ( $ch, CURLOPT_FRESH_CONNECT, false );
        curl_setopt ( $ch, CURLOPT_NOSIGNAL, true );
        curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, 'POST' );
        curl_setopt ( $ch, CURLOPT_CONNECTTIMEOUT, 3);

        //说明是json内容
        $aHeader[] = "Content-Type:application/json;charset=UTF-8";
        curl_setopt( $ch, CURLOPT_HTTPHEADER, $aHeader);

        curl_setopt( $ch, CURLOPT_POSTFIELDS, $post_data);
        //curl_exec($ch);
        $output = curl_exec($ch);
        $status = curl_getinfo($ch)['http_code'];//获取返回状态
        curl_close($ch);
        $data = json_decode($output,true);
      
        if($status =="200" && $data['type'] == "Buyer"){
            //验证用户的cookie
            session(array('name'=>'cargo_session','expire'=>3600));//初始化cargo_session
            session(array('name'=>'name_session','expire'=>3600));//初始化name_session
            session(array('name'=>'id_session','expire'=>3600));//初始化name_session
            session('cargo_session',$data['auth_token']);//将cargo_session赋值为token的值
            session('name_session',$data['name']);//将name_session赋值为用户名
            session('id_session',$data['id']);//将id_session赋值为用户id
            $url=U("index");
            $this->success("登录成功",$url);
        }else{
            $this->error('登录失败，请检查信息'.$status);
        }
        
    }
//供销商登录时的触发
     function supplyPost(){
        header("Content-Type:text/html; charset=utf-8");

        //判断验证码
        $action = A("Admin");
       // $action->checkVerify($_POST['verify']);

        $url = BACK_URL."/accounts/login";

        $post_data = array("name"=>$_POST['supplyname'],
            "password"=>$_POST['password']);
        $post_data = json_encode($post_data);//编码为json格式

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        //得到的数据不直接输出
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ( $ch, CURLOPT_FILETIME, true );
        curl_setopt ( $ch, CURLOPT_FRESH_CONNECT, false );
        curl_setopt ( $ch, CURLOPT_NOSIGNAL, true );
        curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, 'POST' );
        curl_setopt ( $ch, CURLOPT_CONNECTTIMEOUT, 3);

        //说明是json内容
        $aHeader[] = "Content-Type:application/json;charset=UTF-8";
        curl_setopt( $ch, CURLOPT_HTTPHEADER, $aHeader);

        curl_setopt( $ch, CURLOPT_POSTFIELDS, $post_data);
        //curl_exec($ch);
        $output = curl_exec($ch);
        $status = curl_getinfo($ch)['http_code'];//获取返回状态
        curl_close($ch);
        $data = json_decode($output,true);
      
        if($status =="200" && $data['type'] == "Solder"){
            //验证用户的cookie
            session(array('name'=>'cargo_session','expire'=>3600));//初始化cargo_session
            session(array('name'=>'name_session','expire'=>3600));//初始化name_session
            session(array('name'=>'id_session','expire'=>3600));//初始化name_session
            session('cargo_session',$data['auth_token']);//将cargo_session赋值为token的值
            session('name_session',$data['name']);//将name_session赋值为用户名
            session('id_session',$data['id']);//将id_session赋值为用户id
            //$url = U("supply.php/Home/Admin/index");
            $url="http://localhost:8080/cargo/supply.php/Home/Admin/index.html";
            //$url = U("http://"+window.location.hostname+":"+window.location.port+'/cargo/supply.php/Home/Admin/index');
            $this->success("登录成功",$url);
        }else{
            $this->error('登录失败，请检查用户名和密码是否正确'.$status);
        }
        
    }

	function get_curl($url){
		$ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ( $ch, CURLOPT_FILETIME, true );
        curl_setopt ( $ch, CURLOPT_FRESH_CONNECT, false );
        curl_setopt ( $ch, CURLOPT_NOSIGNAL, true );
        curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, 'GET' );

        $output = curl_exec($ch);
        $status = curl_getinfo($ch)['http_code'];

        curl_close($ch);
        if($status != 200){
        	$this->error("前端与后台数据传输错误".$status);
        }

        return $output;
	}

//首页车辆显示和广告的分页处理
	function set_page($requests){

		$count=count($requests);//总共多少条
        $Page= new Page($count,NUM_PER_PAGE);//调用Page类，每页NUM_PER_PAGE条
        $index=(intval($_GET['p'])-1)*NUM_PER_PAGE;//定位当前的条数
        $requests = array_slice($requests, $index, NUM_PER_PAGE);
        $show=$Page->show();
        $this->assign("show",$show);//第几页的页面链接

        return $requests;
	}


    
	function index(){
        $admin = $this->func_begin(); 

        $this->assign('account_username',session('name_session'));

        $admin->ads();

        $admin->vip();       

        
    }

//拿到订单信息后传到后台
    function post(){
        $admin = $this->func_begin();

        //创建POST对象
        $data = array("book_time"=>date('Y-m-d H:i:s',time()));
        $json = json_encode($data);
        dump($json);
        //POST数据
        $url = BACK_URL."/cars/".$_POST['id']."/orders";    //链接到后台的订单表
        dump($url);
        $output = $admin->post_curl($url,$json);//得到返回结果
        
        //返回操作提示
        if($output){
            $url = U('Main/index');
            $this->success("预订成功！请等候工作人员与您联系！",$url);
        }else{
            $this->error("预订失败，请再试试");
        }              
    }

    function order()
    {
        $admin = $this->func_begin();
        $this->assign("id",$_GET['id']);  
        $this->assign('account_username',session('name_session'));
        $this->assign("order","Main/post");//触发添加动作，post数据
        $this->assign("submitName","提交");//用户点击确认按钮

        $this->func_end();
       // $this->display();
    }



}