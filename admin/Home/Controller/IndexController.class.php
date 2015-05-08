<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        header("Content-Type:text/html; charset=utf-8");
        $this->display("admin:login");//跨控制器访问
    }
}