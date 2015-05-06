function MFG_Eurocargo() {
    this.show = function () {
        var _html = '<div class ="changeskinbg">' +
                    '<span class ="changeskinP" >换肤</span></div>' +
                    '<div class ="chskinmain">' +
                    ' <ul class="skin">' +
                    '<li><img src="/css/style1/img/skin1.gif" /><div style="height:30px;padding:0px 35px"><span name="skinradio" id="skinradio1" class="'+(minfo.cl_css==1?'skinbuts':'unskinbuts')+'">&nbsp;&nbsp;&nbsp</span><a class="skinbut">清新绿</a><div class ="clearfix"></div></div></li>' +
                    '<li><img src="/css/style1/img/skin2.gif" /><div style="height:30px;padding:0px 35px"><span name="skinradio" id="skinradio2" class="'+(minfo.cl_css==2?'skinbuts':'unskinbuts')+'">&nbsp;&nbsp;&nbsp</span><a class="skinbut">魅力红</a><div class ="clearfix"></div></div></li>' +
                    ' <li><img src="/css/style1/img/skin3.gif" /><div style="height:30px;padding:0px 35px"><span name="skinradio" id="skinradio3" class="'+(minfo.cl_css==3?'skinbuts':'unskinbuts')+'">&nbsp;&nbsp;&nbsp</span><a class="skinbut">深邃蓝</a><div class ="clearfix"></div></div></li>' +
                    ' <li><img src="/css/style1/img/skin4.gif" /><span style="padding:0;line-height:40px;display:block">更多皮肤，敬请期待！</span></li>' +
                    ' <div class ="clearfix"></div>' +
                    '</ul>' +
                    '</div>' +
                    '<div class="bt1" ><a class="hot" href="javascript:void(0)" onclick="MFG_Eurocargo.update()">确定</a><a class="hot" href="javascript:void(0)" onclick="MFG_Eurocargo.close()">取消</a></div>';
        var MFG_Eurocargo_div = new Element('div', { id: 'MFG_Eurocargo_div' });
        MFG_Eurocargo_div.set("class", "skinpop");
        MFG_Eurocargo_div.set("html", _html);
        PopWindow.addCover(70);//遮罩层
        document.body.appendChild(MFG_Eurocargo_div);//显示做题层
        $("MFG_Eurocargo_div").getElements('span[name="skinradio"]').each(function (item) {
            item.addEvents({
                'click': function (event) {
                    var id = (event.srcElement ? event.srcElement : event.target).id;
                    $("MFG_Eurocargo_div").getElements('span[name="skinradio"]').each(function (itemd) {
                        itemd.set("class", "unskinbuts");
                    });
                    $(id).set("class", "skinbuts");
                }
            });
        });
    }
    //提交换肤
    MFG_Eurocargo.update = function () {
        var cssid = 1;
        var skinradiolist = $("MFG_Eurocargo_div").getElements('span[name="skinradio"]');
        for (var a = 0; a < skinradiolist.length; a++) {
            if (skinradiolist[a].getAttribute("class") == "skinbuts") {
                cssid = a + 1;
                break;
            }
        }
        new Request({
            method: 'get',
            noCache: 'true',
            url: '/ajax/amember.ashx?act=updateUserCss&cssid=' + cssid,
            onSuccess: function (txt) {
                if (txt != '') {
                    if (txt == 'NL') {
                        window.location.href = mfg_apidomain.uc+'/Account/Login/?href=' + a0Url.encodePara(a0Url.addr() + '?' + a0Url.pToStr());
                        return;
                    }
                    if (txt > 0) {
                        var oldfile = "/css/style" + minfo.cl_css + "/";
                        var newfile = "/css/style" + cssid + "/";
                        ChangeCss(oldfile, newfile);//更换页面样式
                        minfo.cl_css = txt;//更换成功改掉当前用户里的配置
                        PopWindow.alert(400, 230, "恭喜你，皮肤已成功更换！", MFG_Eurocargo.close);
                    }
                    else {
                        PopWindow.alert(400, 230, "服务器正忙，请稍候再试！");
                    }
                }
                else {
                    PopWindow.alert(400, 230, "服务器正忙，请稍候再试！");
                }
            }
        }).send();
    }
    //取消换肤预览
    MFG_Eurocargo.close = function () {
        $("MFG_Eurocargo_div").dispose();
        PopWindow.delCover();
    }
   
}