<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        header("Content-Type:text/html; charset=utf-8");
        $this->display("login");//跨控制器访问
    }

    public function makePost(){
        header("Content-Type:text/html; charset=utf-8");
        $url = "http://127.0.0.1/test/index.php";
        $post_data = array("name"=>$_POST['username'],
            "password"=>$_POST['password']);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNRANSFER, 1);
        //设置为POST
        curl_setopt($ch, CURLOPT_POST, 1);
        //把post变量加上
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        $output = curl_exec($ch);
        dump($output);
    }
}

