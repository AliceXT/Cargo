<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
class CarController extends Controller{

        function func_begin(){
                header("Content-Type:text/html; charset=utf-8");
                $admin = A('Admin');
                return $admin;
        }
        function func_end($str = ""){
                $this->assign("Title",$this->Title);
                $this->display($str);
        }

	function get_curl($url){
	$ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ( $ch, CURLOPT_FILETIME, true );
        curl_setopt ( $ch, CURLOPT_FRESH_CONNECT, false );
        curl_setopt ( $ch, CURLOPT_NOSIGNAL, true );
        curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, 'GET' );

        //说明是json内容
        $aHeader[] = "Content-Type:application/json;charset=UTF-8";
        $aHeader[] = "Authorization:".session('cargo_session');
        curl_setopt( $ch, CURLOPT_HTTPHEADER, $aHeader);

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

        function check(){
                       
                $this->func_begin();

                $url = BACK_URL."/cars";//cars
                
                $output = $this->get_curl($url);
                //$this->assign("snow",$url);
                //$assoc当该参数为 TRUE 时，将返回 array 而非 object 。 
                $requests = json_decode($output,$assoc = true);

                $requests = $this->set_page($requests);

                $this->assign("requests",$requests);
                //$this->assign("title","查看车辆");//小标题
                $this->assign("title","查看车辆");
                //dump($requests);
                $this->func_end();
        }
        function search(){

		$admin = $this->func_begin();

                $admin->vip();

	}
}