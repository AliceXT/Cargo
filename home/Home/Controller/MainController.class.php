<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
class MainController extends Controller {
/*	public function index(){
			
	 	header("Content-Type:text/html; charset=utf-8");
  		$this->display("index");//跨控制器访问


	}*/
	function get_curl($url){
		$ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ( $ch, CURLOPT_FILETIME, true );
        curl_setopt ( $ch, CURLOPT_FRESH_CONNECT, false );
        curl_setopt ( $ch, CURLOPT_NOSIGNAL, true );
        curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, 'GET' );

        //说明是json内容
        //$aHeader[] = "Content-Type:application/json;charset=UTF-8";
        //$aHeader[] = "Authorization:".session('cargo_session');
        //curl_setopt( $ch, CURLOPT_HTTPHEADER, $aHeader);

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
		$str = '    <div class="car_body">
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
    return $str;
	}
	function index(){

		//$url = BACK_URL."/cars";//cars
		//dump($url);
		
		//$output = $this->get_curl($url);
		//dump($output);
		
		//$this->assign("snow",$url);
		//$assoc当该参数为 TRUE 时，将返回 array 而非 object 。 
		//$requests = json_decode($output,$assoc = true);
		for($i=1;$i<10;++$i){
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