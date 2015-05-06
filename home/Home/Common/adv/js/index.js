var minfo = a0UserClient().get();
(function() {
    //$('shangwumail').set('html', 'mofangge@139.com');
    //禁止竖向滚轮事件，启用横向滚轮事件
    $(document).addEvent('mousewheel', mouseWheel);
    $(document).addEvent('DOMMouseScroll', mouseWheel);
    //获取浏览器可见区域高度（注意，此时document.documentElement.clientHeight还没有包括横向滚轮的厚度）
    var _clientHeight = document.documentElement.clientHeight;
    var _classType = -1;
    var x1 = 0; //长方形色块滚动相对x偏移量
    var x2 = 0; //长方形色块回滚相对x偏移量
    var x3 = 0; //点击“about us”时页面滑动相对x偏移量
    var x4 = 0; //点击“about us”时页面回滚相对x偏移量
    var y = 0; //点击“about us”时页面回滚相对y偏移量
    var toggle_var = 0; //页面是否偏移（0：没有偏移；1：正在偏移着）
    var toggle_element = '';
    var myInterval1 = setInterval(function() {
        if ($('classMain1')) {
            clearInterval(myInterval1);
            _clientHeight = document.documentElement.clientHeight;
            set_style_sheet();
            if ($('xxtTip1')) {
                var bxtPosition = $('div1_bxt').getPosition();
                var _className = $('classMain1').get('class').split('_')[0];
                $('xxtTip1').set('class', 'tip_' + _className);
                $('xxtTip2').set('class', 'tip_' + _className);
                bxtPosition.x = bxtPosition.x;
                switch (_className) {
                    case 'A': bxtPosition.y = bxtPosition.y - 270; break;
                    case 'B': bxtPosition.y = bxtPosition.y - 270; break;
                    case 'C': bxtPosition.y = bxtPosition.y - 270; break;
                    case 'D': bxtPosition.y = bxtPosition.y - 270; break;
                }

                $('xxtTip1').setPosition(bxtPosition);
                $('xxtTip2').setPosition(bxtPosition);
                PopWindow.addCover(10, 'CoverDivBlack', 0.5);

                $('xxtTip1').setStyle('display', '');
            }
            var myInterval2 = setInterval(function() {
                set_style_sheet();
            }, 1000);
            var mover = {};
            //为长方形色块添加事件
            $('classMain1').getElements('div[id^=div1_]').addEvents({
                'mouseenter': function(event) {
                    if (mover[this.id] && mover[this.id].isRunning()) {
                        mover[this.id].pause();
                    }
                    var divName = this.id.split('_')[1];

                    mover[this.id] = new Fx.Move($(divName + 2), {
                        relativeTo: $(divName + 1),
                        position: 'upperRight',
                        edge: 'upperLeft',
                        //offset: {x: (_x1-_x2) - 301, y: 0}
                        offset: {
                            x: x1,
                            y: -1
                        }
                    });
                    mover[this.id].start();
                },
                'mouseleave': function(event) {
                    if (mover[this.id] && mover[this.id].isRunning()) {
                        mover[this.id].pause();
                    }
                    var divName = this.id.split('_')[1];
                    mover[this.id] = new Fx.Move($(divName + 2), {
                        relativeTo: $(divName + 1),
                        position: 'upperRight',
                        edge: 'upperLeft',
                        offset: {
                            x: x2,
                            y: -1
                        }
                    });
                    mover[this.id].start();
                }
            });
            //为正方形色块添加事件
            $('classMain1').getElements('div[id^=div2_]').addEvents({
                //				'mouseenter': function(event) {

                //					$(this.id.split('_')[1] + 2).set('tween', {
                //						duration: 500,
                //						transition: Fx.Transitions.Quad.easeOut,
                //						onComplete: function() {

                //						}
                //					}).fade('in')
                //				},
                //				'mouseleave': function(event) {

                //					$(this.id.split('_')[1] + 2).set('tween', {
                //						duration: 500,
                //						transition: Fx.Transitions.Quad.easeOut,
                //						onComplete: function() {

                //						}
                //					}).fade('out')
                //				}
                'mouseenter': function(event) {
                    var id = this.id;
                    $(this.id.split('_')[1] + 2).set('tween', {
                        duration: 500,
                        transition: Fx.Transitions.Quad.easeOut,

                        onComplete: function() {
                            $(id.split('_')[1] + 1).setStyles({
                                'visibility': 'hidden',
                                'opacity': 0,
                                'filter': 'alpha(opacity=0)'
                            });
                            $(id.split('_')[1] + 2).setStyles({
                                'visibility': 'visible',
                                'opacity': 1,
                                'filter': 'alpha(opacity=100)'
                            });
                        }

                    }).fade('in')
                },
                'mouseleave': function(event) {
                    var id = this.id;
                    $(this.id.split('_')[1] + 2).set('tween', {
                        duration: 500,
                        transition: Fx.Transitions.Quad.easeOut,
                        onComplete: function() {
                            $(id.split('_')[1] + 2).setStyles({
                                'visibility': 'hidden',
                                'opacity': 0,
                                'filter': 'alpha(opacity=0)'
                            });
                            $(id.split('_')[1] + 1).setStyles({
                                'visibility': 'visible',
                                'opacity': 1,
                                'filter': 'alpha(opacity=100)'
                            });
                        }
                    }).fade('out')
                }
            })

            //为“about us”添加事件
            $('div_link').getElements('div[id^=link]').addEvents({
                'click': function() {
                    switch (this.id) {
                        case 'link1':
                            {  
                                
                            }
                        case 'link3':
                            {
                                toggle_func(this, mover);
                            }
                            break;
                        case 'link2':
                            {

                            }
                            break;
                    }
                }
            });
        }
    }, 100);

    function toggle_func(element, mover) {
        if (toggle_element == element.id) {
            toggle();
        } else {
            toggle_element = element.id;
            if (element.id == 'link3') {
                $('about_us').setStyle('display', 'none');
                $('mfg_links').setStyle('display', 'block');
            } else {
                //
                $('mfg_links').setStyle('display', 'none');
                $('about_us').setStyle('display', 'block');

            }
            if (!toggle_var) {
                //alert($$('.wrappercenter').getStyle('top'));
                toggle();
                //alert($$('.wrappercenter').getStyle('top'));

            }
        }
        function toggle() {
            if (!window.onscroll) {
                window.onscroll = function() {
                    if (toggle_var) {
                        toggle();
                    }
                }
            }
            var id = element.id.substr(0, element.id.length - 1);
            if (mover[id] && mover[id].isRunning()) {
                mover[id].pause();
            }
            if (!toggle_var) {
                mover[id] = new Fx.Move($('ulandright'), {
                    relativeTo: $('a'),
                    duration: 'normal',
                    position: 'center',
                    edge: false,
                    offset: {
                        x: x3,
                        y: y
                    }
                });
                toggle_var = 1;
                mover[id].start();
            } else {
                mover[id] = new Fx.Move($('ulandright'), {
                    relativeTo: $('a'),
                    duration: 'normal',
                    position: 'center',
                    edge: false,
                    offset: {
                        x: x4,
                        y: y
                    }
                });
                toggle_var = 0;
                mover[id].start();
            }
        }
    }
    //设置样式
    function set_style_sheet() {
        if ((_clientHeight != document.documentElement.clientHeight) || _classType == -1) {
            var _cH = document.documentElement.clientHeight;
            var _className = '';
            //_cH = 722;
            if (_cH <= 722) { //645
                //425
                _className = 'C_wrappermain';
                _cT = 4;
                x1 = -368;
                x2 = -249;
            
                x3 = 142;
                x4 = 492;
                y = -15;

            } else if (_cH <= 850) { //722
                //450
                _className = 'D_wrappermain';
                _cT = 3;
                x1 = -399;
                x2 = -270;
                x3 = 184;
                x4 = 584;
                y = -21.5; 
            } else if (_cH <= 1200) { //915
                //565
                _className = 'B_wrappermain';
                _cT = 2;
                x1 = -491;
                x2 = -331;
                x3 = 448;
                x4 = 893;
                y = -33;
            } else {
                //784
                _className = 'A_wrappermain';
                _cT = 1;
                x1 = -703;
                x2 = -473;
                x3 = 1126;
                x4 = 1656;
                y = -22.5;
            }
            if (_cT != _classType && !(Math.abs(_cT - _classType) == 1 && Math.abs(_clientHeight.toInt() - _cH.toInt()) < 20)) {
                $('classMain1').set('class', _className);
            }
            _clientHeight = _cH;
            _classType = _cT;
        }
    }
    //鼠标滚轮事件
    function mouseWheel(event) {
        event.preventDefault();
        var scrollLeft = document.body.scrollLeft || (document.documentElement && document.documentElement.scrollLeft);
        scrollTo(scrollLeft + getWheelDelta(), 0)

        function getWheelDelta() {
            if (event.event.wheelDelta) {
                return -(Browser.opera && Browser.opera < 9.5 ? -event.event.wheelDelta : event.event.wheelDelta);
            } else {
                return event.event.detail * 40;
            }
        }
    }
    if (Browser.ie6 || Browser.ie5) {
        //PopWindow. alert(250,200,'ok');
        PopWindow.show(570, 280, '温馨提示', ' <table style="margin:20px auto 10px;width:480px; line-height:26px" align="center"><tr><td width="68px"><div class="pop_reminder"></div></td><td class="pop_content2">您正在使用IE6浏览器，魔方格账号正在遭遇严重安全风险，建议升级最新浏览器保护账号安全，同时确保获得最佳的产品体验。</br>导读：<a href="http://www.theie6countdown.cn/" style="color:#ff1d77">对IE6说再见！</></br></td></tr></table><div class="browser">推荐安装&nbsp;>>&nbsp;&nbsp;<a href="http://se.360.cn/" class="logo360" target="_blank">360安全浏览器</a><a  href="http://download.microsoft.com/download/1/6/1/16174D37-73C1-4F76-A305-902E9D32BAC9/IE8-WindowsXP-x86-CHS.exe" class="logoie"  target="_blank">Internet Exploer</a ></div>');
    }

    //	setTimeout(function(){
    //	
    //	    if(!getCookie('gonggao')){
    //	         parent.PopWindow.show(640,290,'公告','<table style="margin:20px auto 10px;width:90% line-height:26px" align="left"><tr><td width="70px" align="left"></td><td class="pop_content2">亲萌：<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;魔方格QQ空间已炫丽升级哦～<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;首批好礼庆元旦，<b>3000M码疯狂抢，赶紧去围观吧！^_^<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<a style="color:blue" href="http://mofangge.qzone.qq.com/ " target="_blank">http://mofangge.qzone.qq.com/</a></td></tr></table><div class="popbutdiv"><input type="button"  value="我知道了" class="a9tcqd" style="width:100px;height:40px" onclick="write_gonggao();PopWindow.close(false)"/></div>','write_gonggao()');  
    //	    }
    //	},500);
})();
function logout() {
    new Request({
        url: '/Ajax/acomm.ashx?act=logout',
        noCache: true,
        onSuccess: function(txt) {
            window.location.href = mfg_apidomain.uc+'/Account/Login/';
        }
    }).send();
}
function show_msg() {
    //$('div_info').setStyle('top', ($('img_photo').getCoordinates().bottom + 8) + 'px');
    //$('div_info').setStyle('left', $('img_news').getCoordinates().left + 'px');
    $('div_info').setStyle('display', 'block');
    new Request({
        url: '/Ajax/amember.ashx?act=getUserBean2',
        onCache: true,
        onSuccess: function(txt) {
            txt = JSON.decode(txt);
            $('uExp').set('html', txt.uExp);
            $('uVip').set('html', txt.uVip);
            $('uBean').set('html', txt.uBean);
        }
    }).send();
}
function close_msg() {
    $('div_info').setStyle('display', 'none');
}
function write_gonggao() {

    setCokie('gonggao', '1', 10000);
}

function getCookie(cname) {
    var str1 = document.cookie.split(';');
    for (var i = 0; i < str1.length; i++) {
        var str2 = str1[i].split('=');
        if (str2[0].trim() == cname) {
            return str2[1].trim();
        }
    }
    return '';
}
function setCokie(cname, cvalue, chours) {
    var str1 = cname + '=' + cvalue;
    if (chours > 0) {
        var date = new Date();
        var ms = chours * 3600 * 1000;
        date.setTime(date.getTime() + ms);
        str1 += "; expires=" + date.toGMTString();
    }
    document.cookie = str1;
}
function closeXxtTip1() {
    $('xxtTip1').setStyle('display', 'none');
    $('xxtTip2').setStyle('display', '');
}

function closeXxtTip2() {
    $('xxtTip2').fade('out');
    PopWindow.delCover();
}