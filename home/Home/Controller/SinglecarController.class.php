<!--车辆单页的控制层-->
<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
class SinglecarController extends Controller{ 
/*
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
function  car_message($request){

    $count=count($requests);//总共多少条
    $Page= new Page($count,NUM_PER_PAGE);//调用Page类，每页NUM_PER_PAGE条
    $index=(intval($_GET['p'])-1)*NUM_PER_PAGE;//定位当前的条数
    $requests = array_slice($requests, $index, NUM_PER_PAGE);//显示车辆信息的数组
    $show=$Page->show();
    $this->assign("show",$show);//第几页的页面链接

    return $requests;
}
function check(){

    $requests = json_decode($output,$assoc = true);

    $requests = $this->set_page($requests);

    $this->assign("requests",$requests);
}
*/
}