<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
class SingleController extends Controller{ 

    function func_begin(){
        header("Content-Type:text/html; charset=utf-8");
        $admin = A('Admin');
        return $admin;
    }
    function single(){
        if(isset($_GET)){
            $url = BACK_URL."/cars/search?";
            $data = http_build_query($_GET);
            $url =$url.$data;//将参数加到url后面
        }else{
            $url = BACK_URL."/cars/search";
        }
        //dump($url);
        
        //$this->assign("snow",$url);
        $json= $this->get_curl($url);
        $requests = json_decode($json,true);

        $requests = $this->set_page($requests);


        //修改图片路径
        foreach($requests as $r){
            $r['picture'] = BACK_URL."/".$r['picture'];
            $arr[] = $r;
        }
                
        $this->assign("requests",$arr);
        $this->assign("snow",$url);
                
        $this->display("Main/index");
    }

    function check(){

        $admin = $this->func_begin();
        //$admin->single(); 
        $url = BACK_URL."/cars/".$_GET['id'];
        //dump($url);
        $json = $admin->get_curl($url);

        $arr = json_decode($json,true);
        //dump($arr);
        foreach($arr as $key=>$value){
            if(gettype($value) == "array"){
                foreach($value as $keyinner=>$valueinner){
                    if(!isset($combine[$keyinner])){
                        $combine[$keyinner] = $valueinner;
                    }                   
                }
                continue;
            }
            $combine[$key] = $value;
        }
        //dump($combine);
        $combine['picture'] = BACK_URL."/".$combine['picture'];

        $this->assign("request",$combine);
        $this->display();
    }

}