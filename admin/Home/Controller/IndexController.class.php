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

        //判断验证码
        $action = A("Admin");
       // $action->checkVerify($_POST['verify']);

        $url = BACK_URL."/index.php";
        $post_data = array("name"=>$_POST['username'],
            "password"=>$_POST['password']);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        //得到的数据不直接输出
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //设置为POST
        curl_setopt($ch, CURLOPT_POST, 1);
        //把post变量加上
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        //curl_exec($ch);
        $output = curl_exec($ch);
        //dump($output);
        //把curl关闭
        curl_close($ch);
        $data = json_decode($output);
        //dump($data->{'auth_token'});
        //在admin.php文件中设置了ADMIN_TOKEN常量
        if($data->{'auth_token'} == ADMIN_TOKEN){
            //验证用户的cookie
            session(array('name'=>'cargo_session','expire'=>3600));//初始化cargo_session
            session('cargo_session',$data->{'id'});//将cargo_session赋值为id的值
            $url = U("Admin/index");
            $this->success("登录成功",$url);
        }else{
            $this->error('该用户没有管理员功能');
        }
        
    }
}

