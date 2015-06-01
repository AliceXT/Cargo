<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {

    public function index(){

        /*$adv1 = new Adv("group","abc","答题兼打怪，十分理由抢走爸妈电脑。"
    ,"image/61.png","天天练习","bgB","A1","");
$adv2 = new Adv("change","rxfx","直面惨淡的人生，正视自己的“弱项”。"
    ,"image/61.png","弱项分析","bgR","A2","");

$adv = array($adv1,$adv2);*/
//echo json_encode($adv);

    
        $url = "http://".BACK_IP."/CarGo/ads";
        $json = file_get_contents($url);
        $arr = json_decode($json);

        //dump($arr);
        //$arr = $adv;
        $n = count($arr);
                                
        for($i = 0;$i < $n;++$i){
            if($i % 4 == 0 || $i % 4 == 3){
                $type = "group";
            }else{
                $type = "change";
            }
            if($i % 6 == 0){
                $class = "bgB";
            }else if($i % 6 == 1){
                $class = "bgG";
            }else if($i % 6 == 2){
                $class = "bgR";
            }else if($i % 6 == 3){
                $class = "bgY";
            }else if($i % 6 == 4){
                $class = "bgP";
            }else{
                $class = "bgO";
            }
            $strs[$i] = $this->makeBox(
                $box_type = $type,
                $id_name=$arr[$i]->{"id"},
                $hiddenword=$arr[$i]->{"word"},
                $bg_image=$arr[$i]->{"picture"},
                $bottom_title="",
                $color_class = $class,
                $locate_class=""
            );
        }
        $this->assign("strs",$strs);
        //dump($strs);
        $this->display();
    }


    function makeBox($box_type,$id_name,$hiddenword,$bg_image,
        $bottom_title,$color_class,$locate_class,$link){
        $str = "nothing";
        if($box_type == "group"){
            $str='
            <div class="group '.$color_class.' A_group" id="div1_'.$id_name.'" onclick="window.location.href='.$link.'">
                <div class="A_righthidden" id="'.$id_name.'1">
                    <div class="hiddenword">'.$hiddenword.'</div>
                </div>
                <div style="position: absolute; left: -1px; top: 0px;" class="A_slider slider '.$color_class.'" id="'.$id_name.'2">
                    <span class="'.$locate_class.' A_bg"><img src="'.$bg_image.'"></span>
                </div>
                <div class="A_bottom bottom">'.$bottom_title.'</div>
            </div>';
        }else if($box_type == "change"){
            $str='
        <div class="group '.$color_class.' A_change" id="div2_'.$id_name.'" onclick="window.location.href='.$link.'">
            <div class="A_Fbtm " id="'.$id_name.'1">
                <span class="'.$locate_class.' A_bg"><img src="'.$bg_image.'"></span>
            </div>
            <div class="A_Ftop" id="'.$id_name.'2">
                <div class="hiddenword">'.$hiddenword.'</div>
            </div>
            <div class="A_bottom bottom">'.$bottom_title.'</div>
        </div>';
        }
        
        return $str;
    }
}

class Adv{

    public $box_type;
    public $id_name;
    public $hiddenword;
    public $bg_image;   
    public $bottom_title;
    public $color_class;
    public $locate_class;
    public $link;

    function __construct($s1,$s2,$s3,$s4,$s5,$s6,$s7,$s8){
        $this->box_type = $s1;
        $this->id_name = $s2;
        $this->hiddenword = $s3;
        $this->bg_image = $s4;
        $this->bottom_title = $s5;
        $this->color_class = $s6;
        $this->locate_class = $s7;
        $this->link = $s8;
    }
}