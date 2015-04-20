<?php 
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

$adv1 = new Adv("group","ttlx","答题兼打怪，十分理由抢走爸妈电脑。"
	,"image/61.png","天天练习","bgB","A1","");
$adv2 = new Adv("change","rxfx","直面惨淡的人生，正视自己的“弱项”。"
	,"image/61.png","弱项分析","bgR","A2","");

$adv = array($adv1,$adv2);
echo json_encode($adv);
/*
$str[0] = '"group","ttlx","答题兼打怪，十分理由抢走爸妈电脑。"
	,"image/61.png","天天练习","bgB","A1"';
$str[1] = '"change","rxfx","直面惨淡的人生，正视自己的“弱项”。"
	,"image/61.png","弱项分析","bgR","A2"';

echo json_encode($str);*/