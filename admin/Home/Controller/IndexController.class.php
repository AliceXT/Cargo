<?php
namespace Home\Controller;
use Think\Controller;
use Org\Post\HttpClient;
class IndexController extends Controller {
    public function index(){
        header("Content-Type:text/html; charset=utf-8");
        $this->display("login");//跨控制器访问
    }

    public function makePost(){
        header("Content-Type:text/html; charset=utf-8");
    	$url = "http://127.0.0.1:80/test/index.php";
    	$params=array('name'=>$_POST['username'],'password'=>$_POST['password']);  	
    	$pageContents = HttpClient::quickPost($url,$params);
    	$result=explode(',',$pageContents);
    	dump($pageContents);
            
    }

}

