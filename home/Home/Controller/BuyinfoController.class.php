<?php
namespace Home\Controller;
use Think\Controller;
class SupperloginController extends Controller {
    public function index(){	//为页面的名称
    	header("Content-Type:text/html; charset=utf-8");
        $this->display("login");//跨控制器访问
    }
     public function makePost(){	//用户填写订单时的数据交互
        header("Content-Type:text/html; charset=utf-8");

        $url = BACK_URL."/accounts/login";
    	$post_data = array(    
            "buyer"=>$_POST['buyername'],
            "password"=>$_POST['supplypassword'],
            "time"=>$_POST['ordertime'],
            );
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
        
        if($status =="200"){
            //验证用户的cookie
            session(array('name'=>'cargo_session','expire'=>3600));//初始化cargo_session
            session('cargo_session',$data['auth_token']);//将cargo_session赋值为id的值
            $url = U("Supply/index");
            $this->success("登录成功",$url);
        }else{
            $this->error('该用户没有管理员功能');
        }
        
    }
}