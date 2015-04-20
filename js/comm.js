/*
获取科目名称
年级名称
*/
(function() {
    if (window.$G == null) {
        Window.implement('$G', function(g) {
            if (g) {
                return { 'x1': '一年级', 'x2': '二年级', 'x3': '三年级', 'x4': '四年级', 'x5': '五年级', 'x6': '六年级', 'c1': '七年级', 'c2': '八年级', 'c3': '九年级', 'g1': '高一', 'g2': '高二', 'g3': '高三', 'x': '小学', 'c': '初中', 'g': '高中'}[g];
            }
            else {
                return '';
            }
        });
    }
    if (window.$S == null) {
        Window.implement('$S', function(s) {
            if (s) {
                return { '01': '语文', '02': '数学', '03': '英语', '04': '物理', '05': '化学', '06': '地理', '07': '历史', '08': '政治', '09': '生物'}[s];
            }
            else { return ''; }
        });
    }
    if ($('main_user_info')) {
        b4setUserInfo();
    }

})();
//loadinfo
//参数rd：true：需要请求新的数据（例如扣费之后）；flase：不需要请求新的数据
function b4setUserInfo(rd) {

    new Request({
        url: '/ajax/amember.ashx?act=getheaduserinfo' + (rd ? '&rd=' + String.uniqueID() : ''),
        metdod: 'get',
        onSuccess: function(txt) {
            if (txt == 'NL') {
                //这里填写未登录信息
            }
            else {
                $('main_user_info').set('html', txt);
            }
        }
    }).send();
}
function a1UserOutLogin() {
    new Request({
        url: '/ajax/acomm.ashx?act=logout',
        onSuccess: function(txt) {
            if ($CA(txt) && txt == 'OK') {
                window.location.href = mfg_apidomain.uc + '/Account/Login/';
            }
        }
    }).send();
}

//实现stringbulider
var a0StringBuilder = (function(A) { var _a = new Array(); if (A) { _a[0] = A; } return { 'Append': function(A) { _a[_a.length] = A; }, 'ToString': function() { if (!_a) { return ""; } if (_a.length < 2) { return (_a[0]) ? _a[0] : ""; } var _aStr = _a.join(''); _a = new Array(); _a[0] = _aStr; return _aStr; }, 'Length': function() { if (!_a) { return ""; } if (_a.length < 2) { return ((_a[0]) ? _a[0] : "").length; } var _aStr = _a.join(''); _a = new Array(); _a[0] = _aStr; return _aStr.length; }, 'Clear': function() { _a.empty(); } }; });
/*改变验证码的方法
//modify by liyj
objid 容器的id 容器应为img
codeCount验证码的个数
width 图片宽度
height 图片高度*/
function b4ChangeImageCode(objid, codeCount, width, height, op) {
    $(objid).setProperty("src", "/Ajax/inc/checkstr.aspx?codecount=" + codeCount + "&width=" + width + "&height=" + height + "&bc=fefedf&time=" + Date.now() + '&op=' + op);
}

/*输入验证*/
//邮箱
function regCheckEmail(emailstr) {
    return /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/.test(emailstr);
}
//验证qq
function regCheckQQ(qqStr) {
    return /^\d{5,10}$/.test(qqStr);
}
//验证昵称
function resCheckAlias(alias) {
    return /^[a-zA-Z0-9_\u4e00-\u9fa5]+$/.test(alias);
}
//返回字符串的长度，在GBK编码里，除了ASCII字符，其它都占两个字符宽   
function a0GetSrtlen(str) { return str.replace(/[^\x00-\xff]/g, 'xx').length; }


//截取字符串，中英文都能用 
function a0cutstr(str, len) { var str_length = 0; var str_len = 0; str_cut = new String(); str_len = str.length; var i = 0; for (; i < str_len; i++) { a = str.charAt(i); str_length++; if (escape(a).length > 4) { str_length++; } str_cut = str_cut.concat(a); if (str_length > len) { i++; break; } } if (i < str_len) { return str_cut.concat("…"); } else { return str; } }

//返回大年级 根据学制
function GetBigGradeByEdu(grade, enu) {
    var _big = '';
    if (grade == 'x6') {
        _big = (enu == '0') ? 'x' : 'c';
    }
    else {
        _big = grade.substr(0, 1);
    }
    return _big;
}


var _PopWindow = function() {
    var windowIndex = 99;
    this.curIndex = function() { return windowIndex; };
    this.addCover = function(pidx, id, opa) {
        if (!pidx) { return; }
        var w_pos = 'fixed';
        if (Browser.ie6 || Browser.ie5) { w_pos = 'absolute'; }
        var divId = 'CoverDivBlack';
        if (id) { divId = id; }
        //兼容ie6，盖住下拉框，但会造成本层只能是白色的
        var backi = new Element('div', {
            id: divId + pidx,
            styles: {
                'position': w_pos,
                'background': 'black',
                'top': '0px',
                'left': '0px',
                'z-index': pidx,
                'width': '100%',
                'height': '100%',
                'opacity': opa || 0.1
            }
        });
        backi.set('html', '<iframe width="100%" height="100%" frameborder="0"></iframe>');
        pidx++;
        var back = new Element('div', {
            id: divId + pidx,
            styles: {
                'position': w_pos,
                'background': 'black',
                'top': '0px',
                'left': '0px',
                'z-index': pidx,
                'width': '100%',
                'height': '100%',
                'opacity': 0.3
            }
        });
        document.body.appendChild(backi);
        document.body.appendChild(back);
    };
    this.delCover = function() {
        $$('div[id^=CoverDivBlack]').each(function(item, k) { ; item.dispose(); });
    }
    this.show = function(w, h, t, html, _do) {
        if (!_do) {
            _do = '';
        }
        windowIndex++;
        this.addCover(windowIndex, 'popBack_');
        var w_pos = 'fixed';
        if (Browser.ie6 || Browser.ie5) { w_pos = 'absolute'; }
        windowIndex += 2;
        var h_ = Math.ceil(h / 2);
        var w_ = Math.ceil(w / 2);
        var win = new Element('div', {
            id: 'popWin_' + windowIndex,
            styles: {
                'position': w_pos,
                'width': '' + w + 'px',
                'height': '' + h + 'px',
                'top': '50%',
                'left': '50%',
                'margin': '-' + h_ + 'px 0px 0px -' + w_ + 'px',
                'overflow': 'hidden',
                'z-index': windowIndex
            }
        });
        win.set('html', '<div class="pop_window" ><div class="pop_title"><span>' + t + '</span><input id="popWindowClose_' + windowIndex + '" type="button" class="pop_but1" onmouseover="$(this).set(\'class\',\'pop_but2\')" onmouseout="$(this).set(\'class\',\'pop_but1\')" /></div><div class="pop_content" id="pop_content_' + windowIndex + '" style=" height:' + (h - 55) + 'px">' + html + '</div></div>');
        document.body.appendChild(win);
        $('popWindowClose_' + windowIndex).addEvent('click', function(ev) {
            PopWindow.close(false);
            if (_do) {
                if (typeof (_do) == 'function') {
                    _do();
                } else {
                    eval(_do);
                }
            }
        });
    };

    this.show_hgl = function(w, h, t, html, _do) {
        if (!_do) {
            _do = '';
        }
        windowIndex++;
        this.addCover(windowIndex, 'popBack_');
        var w_pos = 'fixed';
        if (Browser.ie6 || Browser.ie5) { w_pos = 'absolute'; }
        windowIndex += 2;
        var h_ = Math.ceil(h / 2);
        var w_ = Math.ceil(w / 2);
        var win = new Element('div', {
            id: 'popWin_' + windowIndex,
            styles: {
                'position': w_pos,
                'width': '' + w + 'px',
                'height': '' + h + 'px',
                'top': '50%',
                'left': '50%',
                'margin': '-' + h_ + 'px 0px 0px -' + w_ + 'px',
                'overflow': 'hidden',
                'z-index': windowIndex
            }
        });
        win.set('html', '<div class="pop_window" ><div class="pop_title"><span>' + t + '</span></div><div class="pop_content" id="pop_content_' + windowIndex + '" style=" height:' + (h - 55) + 'px">' + html + '</div></div>');
        document.body.appendChild(win);
    };
    this.showPopTips = function(w, h, html, timeOut, _do) {

        if (!_do) {
            _do = '';
        }
        windowIndex++;
        this.addCover(windowIndex, 'popBack_');
        var w_pos = 'fixed';
        if (Browser.ie6 || Browser.ie5) { w_pos = 'absolute'; }
        windowIndex += 2;
        var h_ = Math.ceil(h / 2);
        var w_ = Math.ceil(w / 2);
        var win = new Element('div', {
            id: 'popWin_' + windowIndex,
            styles: {
                'position': w_pos,
                'width': '' + w + 'px',
                'height': '' + h + 'px',
                'top': '50%',
                'left': '50%',
                'margin': '-' + h_ + 'px 0px 0px -' + w_ + 'px',
                'overflow': 'hidden',
                'z-index': windowIndex,
                'background': '#00aaa9'
            }
        });
        win.set('html', '<div style="width:100%;height:100%"><div style="width:100%;height:100%;margin-left:50%;"><table align="center" style="position:relative;left:-50%;width:auto;height:100%;margin:0 auto;font-size:28px;color:#fff"><tr><td style="text-align:left;">' + html + '</td></tr></table></div></div>');
        document.body.appendChild(win);
        new Fx.Tween('popWin_' + windowIndex, {
            duration: 1000,
            property: 'opacity',
            onComplete: function() {
                PopWindow.close(false);
                if (_do) {
                    if (typeof (_do) == 'function') {
                        _do();
                    } else {
                        eval(_do);
                    }
                }
            }
        }).start(0);
    }
    this.close = function(all) {
        if (all) {
            for (var i = windowIndex; i > 99; i -= 3) {
                if ($('popWin_' + i)) {
                    $('popWin_' + i).dispose();
                    $('popBack_' + (i - 1)).dispose();
                    $('popBack_' + (i - 2)).dispose();
                }
            }
            windowIndex = 99;
        } else {
            if ($('popWin_' + windowIndex)) {
                $('popWin_' + windowIndex).dispose();
                $('popBack_' + (windowIndex - 1)).dispose();
                $('popBack_' + (windowIndex - 2)).dispose();
            }
            windowIndex -= 3;

        }
    };
    this.closeIndex = function(_index) {
        $('popWin_' + _index).dispose();
        $('popBack_' + (_index - 1)).dispose();
        $('popBack_' + (_index - 2)).dispose();
    };
    this.alert = function(w, h, msg, _ok) {
        this.show(w, h, '温馨提示', '<table style="margin:20px auto 10px;width:90% line-height:26px" align="center"><tr><td width="68px"><div class="pop_reminder"></div></td><td class="pop_content2">' + msg + '</td></tr></table><div class="popbutdiv"><input type="button" id="pop_btn_alert' + (windowIndex + 3) + '" value="确定" class="a9tcqd"/></div>', _ok);
        $('pop_btn_alert' + windowIndex).addEvent('click', function() {
            PopWindow.close(false);
            if (typeof (_ok) == 'function') {
                _ok();
            } else {
                eval(_ok);
            }
        });
    };
    this.alert_hgl = function(w, h, msg, _ok) {
        this.show(w, h, '温馨提示', '<table style="margin:20px auto 10px;width:90% line-height:26px" align="center"><tr><td width="68px"><div class="pop_reminder"></div></td><td class="pop_content2">' + msg + '</td></tr></table>', _ok);
        $('pop_btn_alert' + windowIndex).addEvent('click', function() {
            PopWindow.close(false);
            if (typeof (_ok) == 'function') {
                _ok();
            } else {
                eval(_ok);
            }
        });
    };
    this.right = function(w, h, msg, _ok) {
        this.show(w, h, '温馨提示', '<table style="margin:20px auto 10px;width:90% line-height:26px" align="center"><tr><td width="68px"><div class="pop_right"></div></td><td class="pop_content2">' + msg + '</td></tr></table><div class="popbutdiv"><input type="button" id="pop_btn_alert' + (windowIndex + 3) + '" value="确定" class="a9tcqd"/></div>', _ok);
        $('pop_btn_alert' + windowIndex).addEvent('click', function() {
            PopWindow.close(false);
            if (typeof (_ok) == 'function') {
                _ok();
            } else {
                eval(_ok);
            }
        });
    };
    this.confirm = function(w, h, msg, _ok) {
        this.show(w, h, '询问', '<table style="margin:20px auto 10px;width:90%" align="center" ><tr><td width="68px"><div class="pop_ask"></div></td><td class="pop_content2">' + msg + '</td></tr></table><div class="popbutdiv"><input type="button"  id="pop_btn_confirm' + (windowIndex + 3) + '"  value="确定" class="a9tcqd"/><input type="button" value="取消" onclick="PopWindow.close(false);" class="a9tcqd"/></div>'); //一下程序mxk 修改
        $('pop_btn_confirm' + windowIndex).addEvent('click', function() {
            PopWindow.close(false);
            if (typeof (_ok) == 'function') {
                _ok();
            } else {
                eval(_ok);
            }
        });
    };
    this.confirm_hgl = function(w, h, msg, _ok, _sub) {
        this.show(w, h, '询问', '<table style="margin:20px auto 10px;width:90%" align="center" ><tr><td width="68px"><div class="pop_ask"></div></td><td class="pop_content2">' + msg + '</td></tr></table><div class="popbutdiv"><input type="button"  id="pop_btn_confirm' + (windowIndex + 3) + '"  value="确定" class="a9tcqd"/></div>'); //一下程序hgl 修改
        $('pop_btn_confirm' + windowIndex).addEvent('click', function() {
            PopWindow.close(false);
            if (typeof (_ok) == 'function') {
                _ok(_sub, true);
            } else {
                eval(_ok);
            }
        });
    };
    this.error = function(w, h, msg, _ok) {
        this.show(w, h, '警告', '<table style="margin:20px auto 10px;width:90%"  align="center"><tr><td width="68px"><div class="pop_woring"></div></td><td class="pop_content2">' + msg + '</td></tr></table><div class="popbutdiv"><input type="button"  id="pop_btn_error' + (windowIndex + 3) + '"   value="确定" class="a9tcqd"/></div>', _ok);
        $('pop_btn_error' + windowIndex).addEvent('click', function() {
            PopWindow.close(false);
            if (typeof (_ok) == 'function') {
                _ok();
            } else {
                eval(_ok);
            }
        });
    }
}
var PopWindow = new _PopWindow();
/*
建议箱
*/
function showjyt() {
    PopWindow.show(650, 380, '建议箱', '<div style=" font-size:14px; line-height:28px;margin:10px 20px"  id ="yjdiv"><span style="float:left;">您有什么意见和建议，在这里告诉我们吧(∩_∩)</span><span style="float:right;display:inline;">还可输入<span id="txttitnote"></span>个字</span><textarea name="textarea" style="width:570px; height:180px; border:#dadada solid 1px;overflow:hidden; padding:10px; line-height:25px" id="textV"></textarea></div><div class="popbutdiv">' +
    '<input type="button" class="a9tcqd" value="提 交" id="jysubmit"/></div>');
    var lim = new limit();
    lim.init(document.getElementById("textV"), document.getElementById("txttitnote"), 125, true);
    $("jysubmit").addEvents({
        click: function(e) {
            var _value = $('textV').get("value");
            if (_value == '') {
                PopWindow.alert(350, 250, "请您留下宝贵的建议！");
                return;
            }
            if (a0GetSrtlen(_value) > 250) {
                PopWindow.alert(460, 250, "您输入的过长，请输入125以内的汉字！");
                return;
            }
            new Request({
                url: '/ajax/amember.ashx?act=suyant&textV=' + encodeURIComponent($('textV').get('value')),
                // method: 'get',
                onSuccess: function(txt) {
                    if ($CA(txt)) {
                        var _delCt = txt.toInt();
                        if (_delCt > -1) {
                            PopWindow.close(true);
                            PopWindow.alert(450, 250, "提交成功，谢谢您给予的宝贵意见！");

                        }
                        else {
                            PopWindow.close(true);
                            PopWindow.alert(350, 250, "服务器繁忙删除失败！");
                        }
                    }
                }
            }).send();
        }
    });
}



//跳转到配置教材页面
function b4nagtiveToBookpage(callback) {
    PopWindow.close(false);
    book_hgl.OkCall = function() {
        PopWindow.close(false);
        clientInfo_hgl["p_bk02"] = this.bookId;
        if (typeof clientInfo != "undefined") {
            //弱项分析
            clientInfo["p_bk02"] = this.bookId;
        }
        if (typeof _clientObj != "undefined") {
            //试题搜索
            _clientObj["p_bk02"] = this.bookId;
        }
        if (typeof minfo != "undefined") {
            //专项猜题 错题本 高频考点
            minfo["p_bk02"] = this.bookId;
        }
        if (typeof userInfo != "undefined") {
            // 竞技场
            userInfo["p_bk02"] = this.bookId;
        }
        this.bookId = undefined;
        callback();
    }
    book_hgl.getUserRequserBook("02");
}
//文本框输入长度验证
function limit() {
    var txtNote; //文本框  
    var txtLimit; //提示字数的input  
    var limitCount; //限制的字数（双字节个数）  
    var isbyte; //是否使用字节长度限制（1汉字=2字符）
    var tempstr = "";
    this.init = function(_txtnote, _txtLimit, _limitCount, _isbyte) {
        txtNote = _txtnote;
        txtLimit = _txtLimit;
        limitCount = _limitCount;
        isbyte = _isbyte;
        txtNote.onkeydown = function() { wordsLimit() }; txtNote.onkeyup = function() { wordsLimit() };
        txtLimit.innerHTML = limitCount;
    }
    function wordsLimit() {
        var noteCount = 0;
        if (isbyte) { noteCount = Math.round(txtNote.value.replace(/[^\x00-\xff]/g, "xx").length / 2) } else { noteCount = txtNote.value.length }
        txtLimit.innerHTML = limitCount - noteCount;
        if (limitCount - noteCount < 0) {
            txtLimit.style.color = "red";
        }
        else {
            txtLimit.style.color = "black";
        }
    }
}
///消息盒子弹出
function MSG_BOX_show() {
    PopWindow.show(780, 600, '消息', '<iframe src="/app/message/show.aspx"  frameborder="0" height="500" width="770"   ></iframe>');
}
//无课本信息的弹出层
function ShowNoBook(callback, _sub) {
    PopWindow.confirm_hgl(600, 250, '魔方格还不知道亲所学的教材是神马呢~~(>_<)~~<div style="padding:15px 0px 0px 50px">请亲点击<span class="colP">“确定”</span>马上完善吧^_^</div>', callback, _sub);
}
//非会员点击受限制科目弹出层
function ShowVipsub() {
    PopWindow.show(450, 200, '温馨提示', '<table style="margin:10px 20px;width:90% line-height:26px" align="center"><tr><td width="68px"><div class="pop_reminder"></div></td><td class="pop_content2"><div id="leavenotbooknote" class="tipcontents" style="font-size:19px;text-align:left;margin:20px 20px 20px 20px">该学科仅对VIP会员开放哦 >_< !</div></td></tr><tr><td colspan="2"><a href="http://17.mofangge.com/showtopic-38.html" target="_blank" style="color:#069; margin-left:40px"><span style="padding-left:50px;font-size: 16px;">VIP免费获得哦，了解戳这>></span></a></td></tr></table>');
}
//验证 qq或者魔方号
function regCheckQQ(qqStr) {
    return /^\d{5,13}$/.test(qqStr);
}
function show_user_info() {
    $('userInfoDivL').setStyle('display', 'block');
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
function JY_make_height_width() {
    var elements = document.getElements('div[muststretch=v]');
    for (var i = 0; i < elements.length; i++) {
        var parent = elements[i].getParent();
        if (parent.tagName != 'td' && parent.tagName != 'TD') {
            parent = parent.getParent();
        }

        var H = parent.clientHeight.toInt();
        if (H != 0) {
            if (elements[i].style.background.contains('8730U.png')) {
                elements[i].setStyle('height', (H - 10) + 'px');
            } else if (elements[i].style.background.contains('{M.png')) {
                elements[i].setStyle('height', (H - 41) / 2 + 'px');
            }
        }
    }
    var elements2 = document.getElements('div[muststretch=h]');
    for (var i = 0; i < elements2.length; i++) {
        var parent = elements2[i].getParent();
        if (parent.tagName != 'td' && parent.tagName != 'TD') {
            parent = parent.getParent();
        }
        var W = parent.clientWidth.toInt();
        if (W != 0) {
            elements2[i].setStyle('width', (W - 0) + 'px');
        }
    }
}
//add by yn 2013-01-12
//alert hgl 2014-04-16 修改
var clientInfo_hgl;
if (typeof a0UserClient != "undefined") {
    clientInfo_hgl = a0UserClient().get();
}
function chkBook(callback) {
    if (!clientInfo_hgl.p_bk02) {
        //无课本信息的弹出层
        PopWindow.alert(600, 250, '魔方格还不知道亲所学的教材是神马呢~~(>_<)~~<div style="padding:15px 0px 0px 50px">请亲点击<span class="colP">“确定”</span>马上完善吧^_^</div>', 'b4nagtiveToBookpage(' + callback + ')');
        //        $('popWindowClose_' + PopWindow.curIndex()).addEvent('click', function() {
        //            PopWindow.close(false);
        //            b4nagtiveToBookpage();
        //        }); 
    }
    return !clientInfo_hgl.p_bk02;
}


//add by hgl 2014-04-14
//跨域请求用户请求教材的信息


var book_hgl = new bookRequset();

function bookRequset() {
    var sub; //科目
    var bookId; //教材版本id
    var OkCall; //点击确定后的回调函数
    this.getUserRequserBook = function(subject, tag, callback) {
        if (subject) {
            book_hgl.sub = subject;
            if (Request.JSONP) {
                new Request.JSONP({
                    url: mfg_apidomain.uc + "/UserBook/getUserBookJson",
                    data: {
                        subject: subject
                    }, //提交的参数, 没有参数可以不写
                    callbackKey: 'JSONP', //自己定义回调函数的参数名称
                    onComplete: function(txt) {
                        var _obj = txt;
                        if (typeof callback == 'function') {
                            callback(_obj);
                        }
                        else {
                            book_hgl.getBookCall(_obj, tag);
                        }

                    }
                }).send();
            }
            else {
                setTimeout(function() { book_hgl.getUserRequserBook(subject); }, 200);
            }
        }
    }
    //请求教材回调函数
    this.getBookCall = function(obj, tag) {
        var _html = '<div class="imgScroll">' +
    '<div class="left"><a class="imgScrollz2" id="bk_l_btn" title="上一组"></a></div>' +
    '<div class="imgScrollCon left" id="div_bk_boder">' +
    '  <ul id="select_book_ul">';
        if (!obj) {
            _html += '<div class="nonum" style="padding: 130px 0px 0px 115px;font-size: 19px;">抱歉，亲所在年级下没有' + { '01': '语文', '02': '数学', '03': '英语', '04': '物理', '05': '化学', '06': '地理', '07': '历史', '08': '政治', '09': '生物'}[book_hgl.sub] + '教材哦～（>_<）～</div>';
        }
        else {
            for (var i = 0; i < obj.length; i++) {
                _html += '<li id="book_' + obj[i].f_id + '" onclick="book_hgl.clickBookImg(this)">' +
                     '<img id="img_' + obj[i].f_id + ')" src="' + obj[i].f_pic + '" width="154" /> <span tag="select" class="" style="text-align:center" >' + obj[i].f_edition1 + '</span>' +
                     '</li>';
            }
        }
        _html += ' </ul> ' +
    ' </div><div class="left"><a class="imgScrolly2" title="下一组" id="bk_r_btn"></a></div>' +
    '<div><a class="F14 hgl_addCss" href="http://17.mofangge.com/showtopic-15978.html" target="_blank">没有所学教材，戳这>></a></div>' +
    '<div class="clearfix" style="height: 0"></div></div>' +
    '<div class="popbutdiv">' +
    ' <p class="colP mar_t10" style="display:none;">如果你无法确定教材版本，可以随意配置，稍后在“个人中心”进行修正(∩_∩)</p>' +
    '<input type="button" style="margin-top: -6px;" class="a9tcqd" value="确定" id="bookbtn">' +
    '</div>';
        if (!tag) {
            PopWindow.show_hgl(810, 450, '为了更好同步你的学习，请选择教材', _html, false);
        }
        else {
            PopWindow.show(810, 450, '为了更好同步你的学习，请选择教材', _html, false);
        }
        //给两个按钮实现滚动效果

        //        $('bookbtnCansle').addEvents({
        //            click: function() {
        //                PopWindow.close(false);
        //            }
        //        });
        $('bookbtn').addEvents({
            click: function() {
                if ($('select_book_ul').getChildren('li').length) {
                    book_hgl.setBookId();
                }
                else {
                    PopWindow.close(false);
                }
            }
        });
        book_hgl.scrollAnimate();
        //PopWindow.close(false);
    }
    //设置教材函数
    this.setBookId = function() {
        if (this.sub && this.bookId) {
            //设置了科目和教材id
            new Request.JSONP({
                url: mfg_apidomain.uc + "/UserBook/setUserBook",
                data: {
                    sub: this.sub,
                    bookid: this.bookId
                }, //提交的参数, 没有参数可以不写
                callbackKey: 'JSONP', //自己定义回调函数的参数名称
                onComplete: function(txt) {
                    if (txt) {
                        var _result = txt.result;
                        if (_result > 0) {
                            //设置成功!
                            PopWindow.showPopTips(350, 250, '设置成功！', 300, function() {
                                if (book_hgl.OkCall) {
                                    //确定回调函数
                                    book_hgl.OkCall();
                                }
                            });
                        }
                    }
                }
            }).send();
        }
        else {
            PopWindow.alert(500, 230, '请选择课本！');
        }
    }
    this.clickBookImg = function(element) {
        $$('.wzbj').set('class', '');
        $(element).getChildren('span').set('class', 'wzbj');
        this.bookId = $(element).id.split('_')[1];
    }
    this.scrollAnimate = function() {
        var bookCount = $$('.imgScroll li').length;
        var totalCount = bookCount % 3 == 0 ? (parseInt(bookCount / 3) - 1) : parseInt(bookCount / 3);
        var running = false;
        if (totalCount > 0) {
            $('bk_r_btn').set('class', 'imgScrolly1');
            $('bk_r_btn').addEvents({ click:
             function() {
                 if (!running) {
                     var nowCount = parseInt($$('.imgScroll ul').getStyle('marginLeft')) / -492
                     if (totalCount == nowCount) {
                         return;
                     } else {
                         $(this).set('class', 'imgScrolly1');
                         running = true;
                         var curMarLe = $('select_book_ul').getStyle('marginLeft');
                         myEffect = new Fx.Morph('select_book_ul', { duration: 'long' }).start({ 'margin-left': curMarLe.substring(0, curMarLe.length - 2) - 492 + "px" }).chain(function() {
                             running = false;
                             if (nowCount + 1 == totalCount) {
                                 $('bk_r_btn').set('class', 'imgScrolly2');
                             }
                             $('bk_l_btn').set('class', 'imgScrollz1');
                         });
                     }
                 }
             }
            });
            $('bk_l_btn').addEvents({ click: function() {
                if (!running) {
                    var nowCount = parseInt($$('.imgScroll ul').getStyle('marginLeft')) / -492
                    if (nowCount == 0) {
                        $(this).set('class', 'imgScrollz2');
                        return;
                    } else {
                        $(this).set('class', 'imgScrollz1');
                        running = true;
                        var curMarLe = $('select_book_ul').getStyle('marginLeft');
                        myEffect = new Fx.Morph('select_book_ul', { duration: 'long' }).start({ 'margin-left': parseInt(curMarLe.substring(0, curMarLe.length - 2), 10) + 492 + "px" }).chain(function() {
                            running = false;
                            if (nowCount == 1) {
                                $('bk_l_btn').set('class', 'imgScrollz2');
                            }
                            $('bk_r_btn').set('class', 'imgScrolly1');
                        });
                    }
                }
            }
            });
        }
    }
}



//全科王接口
function ApiHref(href, sourceId, parenterId) {
    if (href == "http://www.mofangge.com") {
        return;
    }
    if (top != this && sourceId == "201" && parenterId == "2") {
        //嵌入到frame中去的
        $('allgoback').set('href', href).set('title', "返回首页");
        $('menu_daohang_IndexA').set('href', href);
        $('main_user_info').setStyle('display', 'none');
        $$('.copyright').setStyle('display', 'none');

        //动态调整高度

        (function() {
            var iframeC = new Element('iframe', {
                id: 'iframeC',
                name: 'iframeC',
                src: '',
                width: 0,
                height: 0,
                styles: {
                    display: 'none'
                }
            });

            $$('body').adopt(iframeC);
            //跨域iframe自动高度
            window.sethash = function(top) {
                var hashH = 0;
                var Sys = {};
                var ua = navigator.userAgent.toLowerCase();
                var s;
                (s = ua.match(/msie ([\d.]+)/)) ? Sys.ie = s[1] :
		(s = ua.match(/firefox\/([\d.]+)/)) ? Sys.firefox = s[1] :
		(s = ua.match(/chrome\/([\d.]+)/)) ? Sys.chrome = s[1] :
		(s = ua.match(/opera.([\d.]+)/)) ? Sys.opera = s[1] :
		(s = ua.match(/version\/([\d.]+).*safari/)) ? Sys.safari = s[1] : 0;


                //以下进行测试
                if (Sys.ie || Sys.firefox || Sys.opera || Sys.safari) {
                    hashH = document.body.scrollHeight;
                }
                else //if(Sys.chrome) 
                {
                    hashH = document.documentElement.scrollHeight;
                }
                if (hashH == window.hashH2) {
                    return;
                }
                window.hashH2 = hashH;
                var urlC;

                var domain = href ? href.split('/')[2] : "v.52ku.com:80";
                //                                if (!a0Url.get('domain')) {
                //                                    var domain = a0Url.get('domain') ? a0Url.get('domain') : "v.52ku.com:80"; //获取到域名放在domain变量里
                //                                    a0Url.set('domain', domain);
                //                                }
                urlC = "http://" + domain + "/agent.html?r=" + Math.random();
                hashH = eval(hashH) < 660 ? '660' : hashH;
                hashTOP = (top == "undefined") ? '' : top;

                document.getElementById("iframeC").src = urlC + "#" + hashH + "#" + hashTOP;
            }
            //自动高度
            //window.onload = sethash;

            //跨域滚动
            window.setScrollTop = function(top) {
                sethash(top);
            }
            window.addEvent('domready', function(top) {
                sethash(top);
                setInterval(function(top) {
                    sethash(top);
                }, 500);
            });
        })();

    }
}


   
            
             
             
            



           
            
