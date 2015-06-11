<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
class MainController extends Controller {
/*	public function index(){
			
	 	header("Content-Type:text/html; charset=utf-8");
  		$this->display("index");//跨控制器访问

	}*/

     public function makePost(){
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
        //dump($output);

        //把curl关闭
        curl_close($ch);
        $data = json_decode($output,true);
        //dump($data);
        //dump($output);
        //dump($status);
        
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
            $this->error('该用户没有管理员功能,错误代码'.$status);
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

	function set_page($requests){
		//分页处理
		$count=count($requests);//总共多少条
        $Page= new Page($count,NUM_PER_PAGE);//调用Page类，每页NUM_PER_PAGE条
        $index=(intval($_GET['p'])-1)*NUM_PER_PAGE;//定位当前的条数
        $requests = array_slice($requests, $index, NUM_PER_PAGE);
        $show=$Page->show();
        $this->assign("show",$show);//第几页的页面链接

        return $requests;
	}


	function make(){
		/*$str = '    <div class="car_body">
        <div class="navbar navbar-inverse">
            <div class="nav-collapse">
                <div class="car_image">
                    <a href="#" target="_blank">
                        <img src="__ROOT__/home/Home/Common/main/image/112.jpg">
                    </a></li>
                </div>
                <div class="right">
                    <h3>2015款碧莲 4.5L 尊贵VIP版(12座)</h3>
                    <p>车源所在地：广东- 广州市</p>
                    <p>咨询电话：<strong>400-8888-888</strong></p>
                    <p><del>参考价：&yen;348,000</del></p>
                    <p>限时特价：&yen;<strong>300,000</strong></p>
                    <span><button type="submit" class="btn btn-danger" onclick="">我要买</button></span>
                    <span><button type="submit" class="btn btn-danger" onclick="">详细咨询</button></span>
                    <span><button type="submit" class="btn btn-danger" onclick="">加入收藏</button></span>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>';
    return $str;*/
	}
	function index(){

		//$url = BACK_URL."/cars";//cars
		//dump($url);
		
		//$output = $this->get_curl($url);
		//dump($output);
		
		//$this->assign("snow",$url);
		//$assoc当该参数为 TRUE 时，将返回 array 而非 object 。 
		//$requests = json_decode($output,$assoc = true);
		for($i=1;$i<5;++$i){
			$requests[] = $this->make();
		}
		//dump($requests);
		

		$requests = $this->set_page($requests);

		$this->assign("requests",$requests);
		//$this->assign("title","查看车辆");//小标题
		$this->assign("title","查看车辆");
		$this->display();
		//dump($requests);
	}	
	
	

}