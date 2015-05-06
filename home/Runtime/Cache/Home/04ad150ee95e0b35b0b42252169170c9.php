<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title>Cargo|汽车网上交易平台</title>
	<meta nsmr="keywords" content="买二手车，汽车交易，买车，卖车">
	<meta name="description" content="Cargo是网上汽车交易平台，提供卖方信息供买主更容易的找到需要的购车信息">
	<!--<meta name="renderer" content="webkit">-->
	<link href="/cargo/home/Home/Common/adv/css/main.css" rel="stylesheet" type="text/css">
	<link href="/cargo/home/Home/Common/adv/css/index.css" rel="stylesheet" type="text/css">
	<script type="text/javascript">
		var msgCt = -1;
	</script>
	<link id="favicon" href="image/logo.png" rel="icon" >
	<script src="/cargo/home/Home/Common/adv/js/mootools-core.js"></script>
	<script src="/cargo/home/Home/Common/adv/js/mootools-more.js" type="text/javascript"></script>
	<script src="/cargo/home/Home/Common/adv/js/comm.js" type="text/javascript"></script>
	<script type="text/javascript">
		function a0UserClient(){
			return {
				'get':function(){
					return null;
				}
			}
		};
	</script>
	<script type="text/javascript" src="/cargo/home/Home/Common/adv/js/logger.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bdsstyle.css">
	<!--<script type="text/javascript" src="js/prototype-1.5.1.js"></script>-->
	<!--<script type="text/javascript" src="js/json_index.js"></script>-->
</head>
<body>
    <div>
                <div class="header" id="top">
            <!--header开始-->
            <div class="headercenter">
                <div class="headerlog">
                    <div style="float: left; vertical-align: text-bottom;">
                        <img id="indexlogo" src="/cargo/home/Home/Common/adv/image//changeskinlogo.png" title="logo"></div>
                    <!--<a style="margin-left: 30px" target="_blank" href="App/Download">
                        <img id="img_logo_right" src="image/mfgappadv.gif"></a>  -->
                </div>
            </div>
        </div>
        <div class="clearfix">
        </div>

        <!--head 结束-->

        <div class="wrapper">
    <div class="wrappercenter" id="test1">
        <div style="width: 1459px" id="a">
            <div class="C_wrappermain" id="classMain1">
                <div class="ulandright" id="ulandright">
                    <ul class="uldaceng">
<?php  function makeBox($box_type,$id_name,$hiddenword,$bg_image, $bottom_title,$color_class,$locate_class,$link){ if($box_type == "group"){ $str='
            <div class="group '.$color_class.' A_group" id="div1_'.$id_name.'" onclick="window.location.href='.$link.'">
                <div class="A_righthidden" id="'.$id_name.'1">
                    <div class="hiddenword">'.$hiddenword.'</div>
                </div>
                <div style="position: absolute; left: -1px; top: 0px;" class="A_slider slider '.$color_class.'" id="'.$id_name.'2">
                    <span class="'.$locate_class.' A_bg"><img src="'.$bg_image.'"></span>
                </div>
                <div class="A_bottom bottom">'.$bottom_title.'</div>
            </div>'; }else if($box_type == "change"){ $str='
        <div class="group '.$color_class.' A_change" id="div2_'.$id_name.'" onclick="window.location.href='.$link.'">
            <div class="A_Fbtm " id="'.$id_name.'1">
                <span class="'.$locate_class.' A_bg"><img src="'.$bg_image.'"></span>
            </div>
            <div class="A_Ftop" id="'.$id_name.'2">
                <div class="hiddenword">'.$hiddenword.'</div>
            </div>
            <div class="A_bottom bottom">'.$bottom_title.'</div>
        </div>'; } echo $str; } ?>
                        <li class="li1">
                        <div>
                            <?php  $url = "http://localhost/cargo/json.php"; $json = file_get_contents($url); $arr = json_decode($json); $n = count($arr); for($i = 0;$i < $n;++$i){ makeBox( $box_type=$arr[$i]->{"box_type"}, $id_name=$arr[$i]->{"id_name"}, $hiddenword=$arr[$i]->{"hiddenword"}, $bg_image=$arr[$i]->{"bg_image"}, $bottom_title=$arr[$i]->{"bottom_title"}, $color_class=$arr[$i]->{"color_class"}, $locate_class=$arr[$i]->{"locate_class"} ); } ?>
                            
                            <div class="group bgG A_change" id="div2_ctb" onclick="window.location.href='/app/ctb/ctrecord.aspx'">
                                <div style="visibility: visible; opacity: 1;" class="A_Fbtm " id="ctb1">
                                    <span class="A3 A_bg"></span>
                                </div>
                            <div style="visibility: hidden; opacity: 0;" class="A_Ftop " id="ctb2">
                                <div class="hiddenword">一定要将错题进行到底。</div>
                            </div>
                            <div class="A_bottom bottom">错题本</div>
                            </div>
                            <div class="group bgY A_group" id="div1_jjc" onclick="window.location.href='/app/jjc/index.aspx'">
                                <div class="A_righthidden" id="jjc1">
                                    <div class="hiddenword">嘿，同学，输了别哭哈。</div>
                                </div>
                                <div style="position: absolute; left: -1px; top: 0px;background-image:url('image/61.png');" class="A_slider slider bgY" id="jjc2">
                                    <span class="A4 A_bg"></span>
                                </div>
                                <div class="A_bottom bottom">竞技场</div>
                            </div>
                            <div class="group bgP A_group" id="div1_dzzy" onclick="window.location.href='/app/work/sdjwork.aspx'">
                                <div class="A_righthidden" id="dzzy1">
                                    <div class="hiddenword">我的作业，必须为我量身定制。</div>
                                </div>
                                <div style="position: absolute; left: -1px; top: 0px;background-image:url('image/35.png');" class="A_slider slider bgP" id="dzzy2">
                                    <span class="A5 A_bg"></span>
                                </div>
                                <div class="A_bottom bottom">电子作业</div>
                            </div>
                            
                            <div class="clearfix">
                            </div>
                        </div>
                        </li>
                        <li class="li1">
                            <div>
                                        <div class="group bgG A_group" id="div1_stss" onclick="window.location.href='/app/search/searchindex.aspx'">
                                            <div class="A_righthidden" id="stss1">
                                                <div class="hiddenword">
                                                    MY GOD，千万道试题，够多了。</div>
                                            </div>
                                            <div style="position: absolute; left: -1px; top: 0px;" class="A_slider slider bgG" id="stss2">
                                                <span class="A6 A_bg"></span>
                                            </div>
                                            <div class="A_bottom bottom">
                                                试题搜索</div>
                                        </div>
                                        <div class="group bgY A_change" id="div2_srtk" onclick="window.location.href='/app/collect/problemset.aspx'">
                                            <div style="visibility: visible; opacity: 1;" class="A_Fbtm " id="srtk1">
                                                <span class="A8 A_bg"></span>
                                            </div>
                                            <div style="visibility: hidden; opacity: 0;" class="A_Ftop " id="srtk2">
                                                <div class="hiddenword">
                                                    易错题、好题、难题，一个都跑不了。</div>
                                            </div>
                                            <div class="A_bottom bottom">
                                                私人题库</div>
                                        </div>
                                        <div class="group bgP A_change" id="div2_tsj" onclick="window.location.href='/app/tsj/tsjindex.aspx'">
                                            <div style="visibility: visible; opacity: 1;" class="A_Fbtm " id="tsj1">
                                                <span class="A7 A_bg"></span>
                                            </div>
                                            <div style="visibility: visible; opacity: 0;" class="A_Ftop " id="tsj2">
                                                <div class="hiddenword">
                                                    这的试卷连起来，可以绕地球三圈。</div>
                                            </div>
                                            <div class="A_bottom bottom">
                                                淘试卷</div>
                                        </div>
                                        <a href="http://zuoye.mofangge.com/Propagate/DownLoad/" target="_blank" style="border: 0">
                                            <div class="group bgO A_group" id="div1_zysq">
                                                <div class="A_righthidden" id="zysq1">
                                                    <div class="hiddenword">
                                                        将百万题库装入口袋。
                                                    </div>
                                                </div>
                                                <div style="position: absolute; left: -1px; top: 0px;" class="A_slider slider bgO" id="zysq2">
                                                    <span class="A21 A_bg"></span>
                                                </div>
                                                <div class="A_bottom bottom">
                                                    魔方格APP</div>
                                            </div>
                                        </a>
                                        
                                        <a href="http://zuowen.mofangge.com/" target="_blank">
                                            <div class="group bgB A_group" id="div1_zw">
                                                <div class="A_righthidden" id="zw1">
                                                    <div class="hiddenword">
                                                        笔下的点滴，就是你我成长的印记。</div>
                                                </div>
                                                <div style="position: absolute; left: -1px; top: 0px;" class="A_slider slider bgB" id="zw2">
                                                    <span class="A25 A_bg"></span>
                                                </div>
                                                <div class="A_bottom bottom">
                                                    作文</div>
                                            </div>
                                        </a>
                                        <div class="clearfix">
                                        </div>
                            </div>
                        </li>
                        <li class="li1">
                            <div>
                                        <div class="group bgP A_group" id="div1_zxct" onclick="window.location.href='/app/zxct/index.aspx'">
                                            <div class="A_righthidden" id="zxct1">
                                                <div class="hiddenword">
                                                    猜出命题老师的心思。</div>
                                            </div>
                                            <div style="position: absolute; left: -1px; top: 0px;" class="A_slider slider bgP " id="zxct2">
                                                <span class="A9 A_bg"></span>
                                            </div>
                                            <div class="A_bottom bottom">
                                                专项猜题</div>
                                        </div>
                                        <div class="group bgY A_change" id="div2_yzt" onclick="window.location.href='lateropen.aspx'">
                                            <div class="A_Fbtm " id="yzt1">
                                                <span class="A12 A_bg"></span>
                                            </div>
                                            <div class="A_Ftop " id="yzt2">
                                                <div class="hiddenword">
                                                    超级重要的，总是压轴登场。</div>
                                            </div>
                                            <div class="A_bottom bottom">
                                                压轴题</div>
                                        </div>
                                        <div class="group bgG A_group" id="div1_gpkd" onclick="window.location.href='/app/highfren/index.aspx'">
                                            <div class="A_righthidden" id="gpkd1">
                                                <div class="hiddenword">
                                                    满分大本营，赶快去报名。</div>
                                            </div>
                                            <div style="position: absolute; left: -1px; top: 0px;" class="A_slider slider bgG" id="gpkd2">
                                                <span class="A10 A_bg"></span>
                                            </div>
                                            <div class="A_bottom bottom">
                                                高频考点</div>
                                        </div>
                                        <div class="group bgR A_group" id="div1_kdbk" onclick="window.location.href='lateropen.aspx'">
                                            <div class="A_righthidden" id="kdbk1">
                                                <div class="hiddenword">
                                                    我的课前预习好帮手。</div>
                                            </div>
                                            <div style="position: absolute; left: -1px; top: 0px;" class="A_slider slider bgR" id="kdbk2">
                                                <span class="A11 A_bg"></span>
                                            </div>
                                            <div class="A_bottom bottom">
                                                考点百科</div>
                                        </div>
                                        <div class="clearfix">
                                        </div>
                            </div>
                        </li>
                        <li class="li1">
                            <div>
                                        <div class="group bgR A_change" id="div2_qd" onclick="window.location.href='http://bxt.mofangge.com/qd/index/index'">
                                            <div class="A_Fbtm " id="qd1">
                                                <span class="A13 A_bg"></span>
                                            </div>
                                            <div class="A_Ftop " id="qd2">
                                                <div class="hiddenword">
                                                    每日必签，证明我才是魔方格元老。</div>
                                            </div>
                                            <div class="A_bottom bottom">
                                                签到</div>
                                        </div>
                                        <div class="group bgO A_group" id="div1_mrrw" onclick="window.location.href='http://bxt.mofangge.com/mrrw/index/index'">
                                            <div class="A_righthidden" id="mrrw1">
                                                <div class="hiddenword">
                                                    变身VIP会员的免费必经之路。</div>
                                            </div>
                                            <div class="A_slider slider bgO " id="mrrw2">
                                                <span class="A14 A_bg"></span>
                                            </div>
                                            <div class="A_bottom bottom">
                                                每日任务</div>
                                        </div>
                                        <div class="group bgB A_group" id="div1_yjjd" onclick="window.location.href='/app/correct/newevent.aspx'">
                                            <div class="A_righthidden" id="yjjd1">
                                                <div class="hiddenword">
                                                    竟然还奖这个？太稀奇了！</div>
                                            </div>
                                            <div class="A_slider slider bgB" id="yjjd2">
                                                <span class="A15 A_bg"></span>
                                            </div>
                                            <div class="A_bottom bottom">
                                                有奖竞答</div>
                                        </div>
                                        <a href="http://bxt.mofangge.com/yaoqing/yaoqing/index/" target="_blank">
                                            <div class="group bgY A_change" id="div2_jxj">
                                                <div class="A_Fbtm " id="jxj1">
                                                    <span class="A16 A_bg"></span>
                                                </div>
                                                <div class="A_Ftop " id="jxj2">
                                                    <div class="hiddenword">
                                                        加入"财主"集训营，魔豆赚疯了～</div>
                                                </div>
                                                <div class="A_bottom bottom">
                                                    财主集训营</div>
                                            </div>
                                        </a>
                                        <div class="group  A_group" id="div1_mdsc" onclick="window.location.href='/app/mdsc/draw.aspx'">
                                            <div class="A_righthidden" id="mdsc1">
                                                <div class="hiddenword">
                                                    在魔方格，学习不是付出，是收获！</div>
                                            </div>
                                            <div class="A_slider slider bgP" id="mdsc2">
                                                <span class="A17 A_bg"></span>
                                            </div>
                                            <div class="A_bottom bottom">
                                                奖品中心</div>
                                        </div>
                                        <!--a块大层结束-->
                                        
                                        <div class="clearfix">
                                        </div>
                            </div>
                        </li>                     

                        <li class="li3" style="margin: 0">
                            <div style="float: left">
                                        <div class="gaodu">
                                            <div class="h4leftbot">
                                                <a href="http://zone.mofangge.com/" target="_blank">
                                                    <div class="group bgG A_group" id="div1_mfqy">
                                                        <div class="A_righthidden" id="mfqy1">
                                                            <div class="hiddenword">
                                                                寻找你我的魔方奇缘。</div>
                                                        </div>
                                                        <div class="A_slider slider bgG" id="mfqy2">
                                                            <span class="A22 A_bg"></span>
                                                        </div>
                                                        <div class="A_bottom bottom">
                                                            魔方空间</div>
                                                    </div>
                                                </a>
                                                <div class="group bgB A_change" id="div2_grzx" onclick="window.location.href='http://user.mofangge.com/Grzx/Index'">
                                                    <div class="A_Fbtm " id="grzx1">
                                                        <span class="A23 A_bg"></span>
                                                    </div>
                                                    <div class="A_Ftop " id="grzx2">
                                                        <div class="hiddenword">
                                                            真实的我，一定会更受欢迎。</div>
                                                    </div>
                                                    <div class="A_bottom bottom">
                                                        个人中心</div>
                                                </div>
                                                <a href="http://17.mofangge.com/" target="_blank">
                                                    <div class="group bgR A_group" id="div1_zyq">
                                                        <div class="A_righthidden" id="zyq1">
                                                            <div class="hiddenword">
                                                                吐槽、交友、知识分享就来这儿。</div>
                                                        </div>
                                                        <div class="A_slider slider bgR" id="zyq2">
                                                            <span class="A19 A_bg"></span>
                                                        </div>
                                                        <div class="A_bottom bottom">
                                                            在一起论坛</div>
                                                    </div>
                                                </a>
                                                <div class="group bgO A_group" id="div1_mfld" onclick="window.location.href='/app/mfld/index.aspx'">
                                                    <div class="A_righthidden" id="mfld1">
                                                        <div class="hiddenword">
                                                            圣魔导师成长秘笈，必看的！</div>
                                                    </div>
                                                    <div class="A_slider slider bgO" id="mfld2">
                                                        <span class="A20 A_bg"></span>
                                                    </div>
                                                    <div class="A_bottom bottom">
                                                        魔法领地</div>
                                                </div>
                                            </div>
                                        </div>
                            </div>                          
                            <div class="h4rightbot">
                                <div class="A_linkleft" id="div_link">
                                    <div class="A_link1" id="link1">
                                        <img src="/cargo/home/Home/Common/adv/image//link3.png">
                                    </div>
                                    <div class="A_link2" id="link2"> 
                                    </div>
                                    <div class="A_link3" id="link3">
                                        <img src="/cargo/home/Home/Common/adv/image//link1.png">
                                    </div>
                                </div>
                                <div class="clearfix">
                                </div>
                            </div>
                        </li>
                                
                    </ul>

                            
                    <div class="A_linkright">
                        <div class="A_linkrightbg" id="link_content">&nbsp;</div>
                            <div class="touming">
                                <div id="about_us" style="line-height: 25px;">
                                    <h2>团队简介</h2>
                                    <div id="h4GroupName">
                                        <h4>软件项目课程设</h4>
                                            <p>组长：</p>
                                            <p>组员：</p>
                                            <p class="member">柏安健 方雪婷 胡楚晴</p>
                                            <p class="member">蔡伟龙 梁嘉怡 肖雅洁</p>
                                    </div>                                                
                                </div>
                            </div>
                            <div class="clearfix">
                            </div>
                    </div>

                </div>
                <div class="A_copyright">
                    <span class="right">©2015&nbsp;广州大学城广东工业大学软件工程1班</span>
                </div>
                <div class="left">提示：滚动鼠标滚轮，即可实现左右横拉哦</div>

            </div>
        </div>
    </div>
</div>                
    </div>
        <script src="/cargo/home/Home/Common/adv/js/mfgconfig.js" type="text/javascript"></script>
	<script type="text/javascript" src="/cargo/home/Home/Common/adv/js/index.js"></script>
	<script src="/cargo/home/Home/Common/adv/js/jxjcomm.js" type="text/javascript"></script>

	<script type="text/javascript">
        $$('div[id^=link]').each(function(item) {
            if (item.getProperty('id').substr(4, 1) != '2' && item.getProperty('id').substr(4, 1) != '_') {
                item.addEvents({
                    mouseover: function() {
                        item.setProperty('class', 'A_link' + item.getProperty('id').substr(4) + '1');
                    },
                    mouseout: function() {
                        item.setProperty('class', 'A_link' + item.getProperty('id').substr(4));
                    }
                });
            }
        });
        
    </script>

	

</body>	
</html>