/**
 * Created by Administrator on 2015/4/1.
 */
// 立即询价对话框
(function() {
    var buyDialog = function(){
        var _d = this;

        var domBox = $('#car_buy_dialog');
        var domForm = $('#car_buy_form');
        var domList = $('.x-car-list');

        var inputPhone = document.getElementById('dialog_buyer_phone');
        var inputName = document.getElementById('dialog_buyer_name');
        var inputProvince = document.getElementById('dialog_buyer_province');
        var inputCity = document.getElementById('dialog_buyer_city');
        var inputTitle = document.getElementById('dialog_goods_title');
        var inputModel = document.getElementById('dialog_goods_model');
        var selectModel = document.getElementById('dialog_model_set');

        _d.domBox = domBox;

        $('#dialog_city_box').cxSelect({
            selects: ['province', 'city'],
            url: window.GLOBAL.url.cityData
        });

        domBox.on('click', 'a', function() {
            var _rel = this.rel;

            if (_rel === 'close') {
                _d.hide();
                return false;
            };
        });

        var car;
        if (selectModel) {
            car = new brandSelect();
            car.dom.modelSelect = $(selectModel);
        };

        domList.on({
            'xcar:buy': function(e, $that, target) {
                var _the = $(target);

                if (selectModel) {
                    //car.buildModel($that.attr('href').replace(/.*=/, ''));
                    car.buildModel(_the.data('id'));
                }

                if (inputTitle) {
                    inputTitle.value = _the.data('title');
                }

                if (inputModel) {
                    inputModel.value = _the.data('id');
                }

                if ($('#dialog_goods')[0]) {
                    $('#dialog_goods').val(_the.data('goods'));
                }

                _d.show();
            }
        });

        domList.on('click', '.abox', function(e) {
            if ($(e.target).hasClass('x-buy-btn')) {
                e.preventDefault();
                domList.trigger('xcar:buy', [$(this), e.target]);
            };
        });

        domForm.on('submit', function() {
            if (!inputName.value) {
                inputName.focus();
                return false;
            };
            if (!inputPhone.value) {
                inputPhone.focus();
                return false;
            };
            if (!inputProvince.value) {
                inputProvince.focus();
                return false;
            };
            if (!inputCity.value) {
                inputCity.focus();
                return false;
            };

            $.ajax({
                url: domForm.attr('action'),
                type: domForm.attr('method'),
                data: domForm.serializeArray(),
                dataType: 'json'
            }).done(function(data, textStatus, jqXHR){
                if (data.state === 'success') {
                    domForm.trigger('reset');
                    _d.hide();
                    $.cxDialog({
                        title: '操作提示',
                        info: data.message
                    });

                    window._hmt.push(['_trackEvent', 'Saleleads', 'click', 'Success']);
                    window.ga("send", "event", 'Saleleads', 'click', 'Success');

                } else {
                    $.cxDialog({
                        title: '操作提示',
                        info: data.message
                    });
                };

            }).fail(function(jqXHR, textStatus, errorThrown){
                $.cxDialog({
                    title: '错误提示',
                    info: errorThrown
                });
            });

            return false;
        });

        return {
            show: function(){
                _d.show();
            },
            hide: function(){
                _d.hide();
            }
        };
    };

    buyDialog.prototype.show = function(){
        this.domBox.show();
    };

    buyDialog.prototype.hide = function(){
        this.domBox.hide();
    };

    window.buyDialog = new buyDialog();
})();