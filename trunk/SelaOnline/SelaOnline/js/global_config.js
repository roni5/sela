
// VARIABLES CONFIGURATIONS ===================================
var STRING_SEPARATE = "abc123"
var STRING_SEPARATE_1 = "def567"
var ADD_MODE = 1;
var EDIT_MODE = 0;
// text strings
var SYSTEM_TITLE ="Hệ Thống";
var SYSTEM_TITLE_ERROR = "Lỗi!"
var SYSTEM_TITLE_WARNING = "Cảnh báo!"
var SYSTEM_TITLE_INFO = "Thông tin!"
var txtSearch = "Tìm kiếm...";
var txtProcessing = "Đang xử lý...";
var txtProcessComplete = "Xử lý hoàn tất !";
var txtProcessError = "Không thể xử lý !";
var txtSuccess = "Thành công !";
var txtDataLoaded = "OK !";
var txtAjaxTimeOut = "Không kết nối được! Xin thử lại sau.";

// Result message

var MSG_RES_OPERATION_FAIL = "Thao tác không thành công. Vui lòng thử lại!";

var MSG_RES_OPERATION_SUCCESS = "Thao tác thành công!";



// jQuery ajax variables
var timeoutAjax = 30000;
$.ajaxSetup({ timeout: timeoutAjax })


// text strings
var txtSearch = "Tìm kiếm...";
var txtProcessing = "Đang xử lý...";
var txtProcessComplete = "Xử lý hoàn tất !";
var txtProcessError = "Không thể xử lý !";
var txtSuccess = "Thành công !"
var txtDataLoaded = "OK !"
var txtAjaxTimeOut = "Không kết nối được! Xin thử lại sau."

// Members Context variables
var url_ReturnMemberInfoInXML = 'member-info.xml';
var url_Chat = "chat.htm";
var url_SendMessage = "profile.htm?d=8";
var url_ViewProfile = "profile.htm?d=1";
var url_DefaultAvatar = 'images/avatar.png';

// PopupDiv variables
var numPopLayers = 4;
var txtAlertType1 = "Chú ý";
var txtAlertType2 = "Xác nhận";

// Advertisements variables
var timeDefaultCycle = 6000;
var timeTopAd = 8000;
var timeBottomAd = 7000;
var timeSideAd = 8000;

// jQuery ajax variables
var timeoutAjax = 30000;
$.ajaxSetup({ timeout: timeoutAjax })


// EXECUTIONS ON DOM-READY ====================================
$(document).ready(function() {


    popDiv = new PopDiv();
    popDiv.init();
    initInfoBar();
  
});

function getSelected() {

    if (window.getSelection) { return window.getSelection(); }

    else if (document.getSelection) { return document.getSelection(); }

    else {

        var selection = document.selection && document.selection.createRange();

        if (selection.text) { return selection.text; }

        return false;

    }

    return false;

}
// CHAT-LINK ==============================================

function initChatlink() {


    $('.chat-link').unbind('click');
    $('.chat-link').click(function(e) {
        e.preventDefault();
        //nêu là IE thì thoát ra.
        if ($.browser.msie) {
            popDiv.alert("Tính năng Chat chưa hỗ trợ trình duyệt này!<br>Vui lòng sử dụng trình duyệt Firefox, Chrome.", SYSTEM_TITLE, 1);
            return;
        }

        var chatLink = $(this).attr('href');
        if (_mainFrame._isLogin == 1) {
            var windowchat = window.open(chatLink, 'hcchatwindow', 'toolbar=no,directories=no,status=no,menubar=no,scrollbars=yes');
            windowchat.window.focus();
        }
        else {
            PopDiv.alert('Bạn phải đăng nhập để sử dụng được chức năng này!');
        }
    });
}


// CHAT-LINK ==============================================

function initTreeFunction() {


    for(index=1;index<=7;index++)
    {
        $("."+classname+index).each(function() {
            
            strPadding = '';
            for(i=0;i<index;i++)
            {
                strPadding += '&nbsp;&nbsp;&nbsp;'
            }
			//alert(strPadding + $(this)[0].innerHTML);
            $(this)[0].innerHTML = strPadding + $(this)[0].innerHTML.replace(/&nbsp;/gi,'');;
        });
    }
}



// POPUP DIV =================================================
function PopDiv(iLayer, parentPop) {
    if (!iLayer || iLayer <= numPopLayers) {
        var self = this;
        this.oPop = null;
        this.iLayer = iLayer ? iLayer : 1;
        this.layerExist = false;
        this.layerShown = false;
        this.childPop = new PopDiv(this.iLayer + 1, this);
        this.parentPop = parentPop ? parentPop : null;

        this.getFrameDoc = function(oIframe) {
            try {
                frameDoc = (oIframe.contentWindow || oIframe.contentDocument);
                if (frameDoc.document) frameDoc = frameDoc.document;
                if (frameDoc.body) frameDoc = frameDoc;
                else frameDoc = false;
            }
            catch (err) {
                frameDoc = false;
            }
            return frameDoc;
        }

        this.minFrameHeight = 0;
        this.originalFrameDocHeight = 0;
        this.setFrameHeight = function(oIframe, restore) {
            var viewportHeight = $(window).height();
            var _minFrameHeight = parseInt($(oIframe).parent().css('height'));
            if (self.minFrameHeight == 0) self.minFrameHeight = _minFrameHeight;
            var defaultFrameHeight = viewportHeight * 80 / 100;
            var safeFrameHeight = (defaultFrameHeight < self.minFrameHeight ? self.minFrameHeight : defaultFrameHeight);
            var frameHeight = safeFrameHeight;
            if (self.getFrameDoc(oIframe)) {
                var _frameDocHeight = $(self.getFrameDoc(oIframe)).height();
                if (self.originalFrameDocHeight == 0) self.originalFrameDocHeight = _frameDocHeight;
                if (restore) frameHeight = self.originalFrameDocHeight;
                else frameHeight = _frameDocHeight;
            }
            if (frameHeight < self.minFrameHeight) frameHeight = self.minFrameHeight;
            $(oIframe).animate(
                { height: frameHeight },
                { duration: 'fast', easing: 'easeOutCubic' }
               )
        }

        this.show = function(handler, trigger, speed) {
            var _speed = speed ? speed : 300;
            $('html').addClass('overlayed');
            $('body').addClass('overlayed');
            $(self.oPop).find('.content-outer').css('overflow', 'hidden');
            $(self.oPop).show();
            if (trigger && $(trigger).attr('popupSize')) {
                var popupWidth = parseInt($(trigger).attr('popupSize').split('x')[0]);
                var popupHeight = parseInt($(trigger).attr('popupSize').split('x')[1]);
                if (!isNaN(popupWidth))
                    $(self.oPop).find('.content').css('width', popupWidth + 'px');
                if (!isNaN(popupHeight))
                    $(self.oPop).find('.content').css({ 'height': popupHeight + 'px', 'min-height': popupHeight + 'px' });
            }
            else if (trigger && typeof (trigger) == 'string') {
                var popupWidth = parseInt(trigger.split('x')[0]);
                var popupHeight = parseInt(trigger.split('x')[1]);
                if (!isNaN(popupWidth))
                    $(self.oPop).find('.content').css('width', popupWidth + 'px');
                if (!isNaN(popupHeight))
                    $(self.oPop).find('.content').css({ 'height': popupHeight + 'px', 'min-height': popupHeight + 'px' });
            }
            $(self.oPop).find('.popupDiv-bg').fadeIn(_speed, function() {
                $(self.oPop).find('.popupDiv-bg').css('-ms-filter', 'progid:DXImageTransform.Microsoft.Alpha(Opacity=70)').css('filter', 'alpha(opacity=70)');
                $(self.oPop).find('.content-outer').css('overflow', 'auto');
            })
            $(self.oPop).find('.content').fadeIn(_speed, function() {
                self.layerShown = true;
                if (handler) handler();
                self.finalizePop();
            })
        }

        this.hide = function(speed) {
            var _speed = speed ? speed : 200;
            $(self.oPop).find('.popupDiv-bg').fadeOut(_speed, function() {
                $(self.oPop).find('.content-outer').css('overflow', 'auto');
            });
            $(self.oPop).find('.content').fadeOut(_speed, function() {
                $(self.oPop).hide();
                $(self.oPop).find('.popupDiv-iframe').attr('src', '');
                $(self.oPop).find('.content').attr('style', '');
                $(self.oPop).find('.popupDiv-iframe').attr('style', '');
                $(self.oPop).find('.content-inner').html('')
                $(self.oPop).find('.dynamic-content').html('');
                $(self.oPop).removeClass('alert');
                self.originalFrameDocHeight = 0;
                self.layerShown = false;
                if (self.iLayer == 1) {
                    $('html').removeClass('overlayed');
                    $('body').removeClass('overlayed');
                }

            });
        }

        this.alert = function(html, title, alertType, handlerOK, handlerCancel) {
            $(self.oPop).addClass('alert');
            $(self.oPop).find('.content').addClass('dark').removeClass('very-dark');
            self.originalFrameDocHeight = 0;
            self.show(function() {
                var alertHtml = '<div id="pop-head">';
                alertHtml += '<b class="icon-big icon-alert">&nbsp;</b>'
                if (title && title != '')
                    alertHtml += '<h1 class="title inline-block">' + title + '</h1>'
                else
                    alertHtml += '<h1 class="title inline-block">' + (alertType && alertType == 2 ? txtAlertType2 : txtAlertType1) + '</h1>'
                alertHtml += '</div>';
                alertHtml += '<div id="pop-content">';
                alertHtml += html;
                alertHtml += '</div>';
                alertHtml += '<div id="pop-foot">';
                alertHtml += '<div id="pop-foot-inner">';
                if (alertType && alertType == 2) {
                    alertHtml += '<a class="btn btn-green btn-ok" href="#">OK</a>';
                    alertHtml += '<a class="btn btn-green btn-cancel popupDiv-close" href="#">Cancel</a>';
                }
                else
                    alertHtml += '<a class="btn btn-green btn-ok popupDiv-close" href="#">OK</a>';
                alertHtml += '</div>';
                alertHtml += '</div>';
                $(self.oPop).find('.dynamic-content').html(alertHtml);
                if (handlerOK) {
                    $(self.oPop).find('.dynamic-content .btn-ok').click(function() {
                        //Thanh Viet edited 20110425 .Trường hợp handlerOK cần thêm tham số thì cũng dùng được
                        //PhongVuHong edited 20110620 Thêm vào tùy chọn, nếu là string thì eval, nếu là function thì execute
                        // Vì một số hàm dài, khó khăn khi đưa vào bằng string
                        //handlerOK()
                        if (typeof (handlerOK) == 'string') {
                            eval(handlerOK);
                        }

                        if (typeof (handlerOK) == 'function') {
                            handlerOK()
                        }
                        //gọi hide trong hàm handlerOK
                        //self.hide();
                        return false;
                    });
                }
                if (handlerCancel) {
                    $(self.oPop).find('.dynamic-content .btn-cancel').click(function() {
                        //Thanh Viet edited 20110425
                        //handlerCancel();
                        eval(handlerCancel)
                        self.hide();
                        return false;
                    });
                }
            }, null, null)
        }

        this.page = function(url, trigger) {
            self.show(function() {
                var frameHtml = '<iframe name="popupDivIframe" id="popupDivIframe" class="popupDiv-iframe" scrolling="auto" frameborder="0"></iframe>';
                $(self.oPop).find('.dynamic-content').html(frameHtml);
                $(self.oPop).find('.popupDiv-iframe').css('height', $(self.oPop).find('.content').css('height'));
                showInfoBar('processing', txtProcessing);
                $(self.oPop).find('.popupDiv-iframe').load(function() {
                    if (self.layerShown) {
                        showInfoBar('success', txtDataLoaded);
                        self.setFrameHeight(this);
                        self.finalizePop();
                    }
                });
                $(self.oPop).find('.popupDiv-iframe').attr('src', url)
            }, (trigger ? trigger : null), null);
        }

        this.data = function(url, trigger) {
            self.show(function() {
                var contentHtml = '<div class="content-inner"></div>';
                $(self.oPop).find('.dynamic-content').html(contentHtml);
                showInfoBar('processing', txtProcessing);
                var jqxhr = $.ajax({ url: url, dataType: 'html' })
				.success(function(data) {
				    if (self.layerShown) {
				        $(self.oPop).find('.content-inner').html(data);
				        showInfoBar('success', txtDataLoaded);
				        self.finalizePop();
				    }
				})
				.error(function(jqXHR, textStatus) {
				    if (self.layerShown) {
				        var txtInfo = textStatus == 'timeout' ? txtAjaxTimeOut : txtProcessError;
				        $(self.oPop).find('.content-inner').html('');
				        showInfoBar('error', txtInfo);
				    }
				})
            }, (trigger ? trigger : null), null);
        }

        this.html = function(html, WidthxHeight) {
            self.show(function() {
                $(self.oPop).find('.dynamic-content').html('').append(html);
            }, WidthxHeight, null)
        }

        this.handleLinksOnPage = function() {
            $('.popupDiv-page').click(function() {
                self.page(this.href, this);
                return false;
            });
            $('.popupDiv-data').click(function() {
                self.data(this.href, this);
                return false;
            });
        }

        this.handleLinksOnParentPop = function() {
            $(self.parentPop.oPop).find('.popupDiv-close').click(function() {
                self.parentPop.hide();
                hideInfoBar();
                return false;
            })
            $(self.parentPop.oPop).find('.popupDiv-iframe').contents().find('.popupDiv-close').bind('click', function() {
                //ThanhViet edit 06152011: Tranh hide popDiv của iframe
                //self.parentPop.hide();
                self.hide();
                hideInfoBar();
                return false;
            })
            $(self.parentPop.oPop).find('.popupDiv-page').click(function() {
                self.page(this.href, this);
                return false;
            });
            $(self.parentPop.oPop).find('.popupDiv-iframe').contents().find('.popupDiv-page').bind('click', function() {
                self.page(this.href, this);
                return false;
            });
            $(self.parentPop.oPop).find('.popupDiv-data').click(function() {
                self.data(this.href, this);
                return false;
            });
            $(self.parentPop.oPop).find('.popupDiv-iframe').contents().find('.popupDiv-data').bind('click', function() {
                self.data(this.href, this);
                return false;
            });
            $(self.parentPop.oPop).find('.mceToolbar a').click(function(e) {
                e.preventDefault();
                setTimeout(function() {
                    var jListBox = $('div[role="listbox"]:visible');
                    jListBox.css('top', parseInt(jListBox.css('top')) + $(window).scrollTop() + 'px');
                }, 1)
            });
        }

        this.handleLinksOnPop = function() {

            $(self.oPop).find('.popupDiv-close').click(function() {
                self.hide();
                hideInfoBar();
                return false;
            });
            $(self.oPop).find('.popupDiv-iframe').contents().find('.popupDiv-close').bind('click', function() {
                self.hide();
                hideInfoBar();
                return false;
            });

        }

        this.finalizePop = function() {
            if (self.iLayer < numPopLayers) self.childPop.init();
            else self.handleLinksOnPop();
        }

        this.init = function() {
            if (!self.layerExist) {
                self.oPop = document.createElement('div');
                self.oPop.className = 'popupDiv layer' + self.iLayer;
                var popupDivHTML = '<div class="popupDiv-bg pos-fixed"></div>';
                popupDivHTML += '<div class="content-outer pos-fixed">';
                popupDivHTML += '<table class="table-layout" align="center" cellpadding="0" cellspacing="0" border="0"><tr><td class="td-layout" align="center" valign="middle">';
                popupDivHTML += '<div class="content shadow very-dark">';
                popupDivHTML += '<a class="btn-close popupDiv-close" href="#">x</a>';
                popupDivHTML += '<div class="dynamic-content"  >';
                //popupDivHTML+=						'<iframe name="popupDivIframe" id="popupDivIframe" class="popupDiv-iframe" scrolling="auto" frameborder="0"></iframe>';
                //popupDivHTML+=						'<div class="content-inner"></div>';
                popupDivHTML += '</div>';
                popupDivHTML += '</div>';
                popupDivHTML += '</td></tr></table>';
                popupDivHTML += '</div>';
                $(self.oPop).append(popupDivHTML);
                $('body').append(self.oPop);
                self.layerExist = true;
            }
            if (self.iLayer == 1) self.handleLinksOnPage();
            else self.handleLinksOnParentPop();
        }

    }
}



// INFO BAR ===================================================
function initInfoBar() {
    $('body').append('<div class="info-bar no-shadow"><b class="icon"></b><span></span></div>');
}
var timerInfoBar;
function showInfoBar(status, text, handler, speed) {
    var _speed = speed ? speed : 'slow';
    if (status == "success") $('.info-bar .icon').attr('class', 'icon icon-tick');
    else if (status == "error") $('.info-bar .icon').attr('class', 'icon icon-x');
    $('.info-bar span').text(text);
    $('.info-bar').css('left', ($(window).width() / 2) - ($('.info-bar').outerWidth() / 2) + 'px');
    $('.info-bar').attr('class', 'info-bar ' + status).stop().animate(
		{ top: 0 },
		{ duration: _speed, easing: 'easeOutCubic', complete: handler }
	);
    $('.info-bar').click(hideInfoBar);
    if (status != 'processing') {
        clearInterval(timerInfoBar);
        timerInfoBar = setInterval(hideInfoBar, 3000);
    }
}
function hideInfoBar(speed) {
    clearInterval(timerInfoBar);
    var _speed = speed ? speed : 1000;
    $('.info-bar').stop().animate(
		{ top: '-30px' },
		{ duration: _speed, easing: 'easeOutCubic', complete: function() { $('.info-bar').addClass('no-shadow'); } }
	);
}

// MISC =================================================
function updatePopupUI(restore) {
    if ($('body').hasClass('keyword-edit')) {
        if (restore) top.popDiv.setFrameHeight($(top.popDiv.oPop).find('#popupDivIframe')[0], 'restore');
        else top.popDiv.setFrameHeight($(top.popDiv.oPop).find('#popupDivIframe')[0]);
    }
}
function cycleItems(parent) {
    if ($(parent).data('childrenSelector'))
        var items = $(parent).find($(parent).data('childrenSelector'));
    else
        var items = $(parent).children();
    if (items.length > 1) {
        clearInterval($(parent).data('timerID'));
        var speed = $(parent).data('speed');
        var _speed = speed ? speed : 'slow'
        var showTime = $(parent).data('showTime') ? $(parent).data('showTime') : timeDefaultCycle;
        $(parent).data('showTime', showTime);

        var lastItem = $(parent).data('lastItem');
        if (!lastItem) {
            $(parent).data('lastItem', items[items.length - 1]);
            var lastItem = $(parent).data('lastItem');
        }
        if ($(lastItem).index() == items.length - 1)
            var nextItem = items[0];
        else var nextItem = $(lastItem).next()[0];

        items.hide();
        $(nextItem).fadeIn(_speed);
        $(parent).data('lastItem', nextItem);

        items.hover(function() {
            clearInterval($(this).parent().data('timerID'));
        }, function() {
            var self = this;
            clearInterval($(this).parent().data('timerID'));
            $(this).parent().data('timerID', setInterval(function() { cycleItems($(self).parent()[0]) }, $(self).parent().data('showTime')));
        });

        $(parent).data('timerID', setInterval(function() { cycleItems(parent) }, $(parent).data('showTime')));
    }
}
function getCurrentPageName() {
    var strURL = window.location.href;
    strURL = strURL.split('.php');
    strURL = strURL[0].split('/');
    return strURL[strURL.length - 1];

}
function getUrlValue(url, key) {
    key = key.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
    var regexS = "[\\?&]" + key + "=([^&#]*)";
    var regex = new RegExp(regexS);
    var results = regex.exec(url);
    if (results == null)
        return "";
    else
        return decodeURIComponent(results[1].replace(/\+/g, " "));
}
function putUrlParam(url, key, value) {
    var urlSearch = url.indexOf('?') != -1 ? '?' + url.split('?')[1] : '?';
    var currQuery = urlSearch.substring(1);
    url = url.split('?')[0] + urlSearch + (currQuery ? "&" : "") + key + "=" + value;
    return url;
}
function scrollToTop(handler, speed) {
    var _speed = speed ? speed : 'fast';
    jDocWrapper.scrollTo(0, { easing: 'easeOutCubic', onAfter: handler, duration: _speed });
}

// jQuery.scrollTo  |  http://flesler.blogspot.com/2007/10/jqueryscrollto.html
; (function(d) { var k = d.scrollTo = function(a, i, e) { d(window).scrollTo(a, i, e) }; k.defaults = { axis: 'xy', duration: parseFloat(d.fn.jquery) >= 1.3 ? 0 : 1 }; k.window = function(a) { return d(window)._scrollable() }; d.fn._scrollable = function() { return this.map(function() { var a = this, i = !a.nodeName || d.inArray(a.nodeName.toLowerCase(), ['iframe', '#document', 'html', 'body']) != -1; if (!i) return a; var e = (a.contentWindow || a).document || a.ownerDocument || a; return d.browser.safari || e.compatMode == 'BackCompat' ? e.body : e.documentElement }) }; d.fn.scrollTo = function(n, j, b) { if (typeof j == 'object') { b = j; j = 0 } if (typeof b == 'function') b = { onAfter: b }; if (n == 'max') n = 9e9; b = d.extend({}, k.defaults, b); j = j || b.speed || b.duration; b.queue = b.queue && b.axis.length > 1; if (b.queue) j /= 2; b.offset = p(b.offset); b.over = p(b.over); return this._scrollable().each(function() { var q = this, r = d(q), f = n, s, g = {}, u = r.is('html,body'); switch (typeof f) { case 'number': case 'string': if (/^([+-]=)?\d+(\.\d+)?(px|%)?$/.test(f)) { f = p(f); break } f = d(f, this); case 'object': if (f.is || f.style) s = (f = d(f)).offset() } d.each(b.axis.split(''), function(a, i) { var e = i == 'x' ? 'Left' : 'Top', h = e.toLowerCase(), c = 'scroll' + e, l = q[c], m = k.max(q, i); if (s) { g[c] = s[h] + (u ? 0 : l - r.offset()[h]); if (b.margin) { g[c] -= parseInt(f.css('margin' + e)) || 0; g[c] -= parseInt(f.css('border' + e + 'Width')) || 0 } g[c] += b.offset[h] || 0; if (b.over[h]) g[c] += f[i == 'x' ? 'width' : 'height']() * b.over[h] } else { var o = f[h]; g[c] = o.slice && o.slice(-1) == '%' ? parseFloat(o) / 100 * m : o } if (/^\d+$/.test(g[c])) g[c] = g[c] <= 0 ? 0 : Math.min(g[c], m); if (!a && b.queue) { if (l != g[c]) t(b.onAfterFirst); delete g[c] } }); t(b.onAfter); function t(a) { r.animate(g, j, b.easing, a && function() { a.call(this, n, b) }) } }).end() }; k.max = function(a, i) { var e = i == 'x' ? 'Width' : 'Height', h = 'scroll' + e; if (!d(a).is('html,body')) return a[h] - d(a)[e.toLowerCase()](); var c = 'client' + e, l = a.ownerDocument.documentElement, m = a.ownerDocument.body; return Math.max(l[h], m[h]) - Math.min(l[c], m[c]) }; function p(a) { return typeof a == 'object' ? a : { top: a, left: a} } })(jQuery);

// jQuery Easing v1.3 - http://gsgd.co.uk/sandbox/jquery/easing/   =====================
jQuery.easing.jswing = jQuery.easing.swing; jQuery.extend(jQuery.easing, { def: "easeOutQuad", swing: function(e, f, a, h, g) { return jQuery.easing[jQuery.easing.def](e, f, a, h, g) }, easeInQuad: function(e, f, a, h, g) { return h * (f /= g) * f + a }, easeOutQuad: function(e, f, a, h, g) { return -h * (f /= g) * (f - 2) + a }, easeInOutQuad: function(e, f, a, h, g) { if ((f /= g / 2) < 1) { return h / 2 * f * f + a } return -h / 2 * ((--f) * (f - 2) - 1) + a }, easeInCubic: function(e, f, a, h, g) { return h * (f /= g) * f * f + a }, easeOutCubic: function(e, f, a, h, g) { return h * ((f = f / g - 1) * f * f + 1) + a }, easeInOutCubic: function(e, f, a, h, g) { if ((f /= g / 2) < 1) { return h / 2 * f * f * f + a } return h / 2 * ((f -= 2) * f * f + 2) + a }, easeInQuart: function(e, f, a, h, g) { return h * (f /= g) * f * f * f + a }, easeOutQuart: function(e, f, a, h, g) { return -h * ((f = f / g - 1) * f * f * f - 1) + a }, easeInOutQuart: function(e, f, a, h, g) { if ((f /= g / 2) < 1) { return h / 2 * f * f * f * f + a } return -h / 2 * ((f -= 2) * f * f * f - 2) + a }, easeInQuint: function(e, f, a, h, g) { return h * (f /= g) * f * f * f * f + a }, easeOutQuint: function(e, f, a, h, g) { return h * ((f = f / g - 1) * f * f * f * f + 1) + a }, easeInOutQuint: function(e, f, a, h, g) { if ((f /= g / 2) < 1) { return h / 2 * f * f * f * f * f + a } return h / 2 * ((f -= 2) * f * f * f * f + 2) + a }, easeInSine: function(e, f, a, h, g) { return -h * Math.cos(f / g * (Math.PI / 2)) + h + a }, easeOutSine: function(e, f, a, h, g) { return h * Math.sin(f / g * (Math.PI / 2)) + a }, easeInOutSine: function(e, f, a, h, g) { return -h / 2 * (Math.cos(Math.PI * f / g) - 1) + a }, easeInExpo: function(e, f, a, h, g) { return (f == 0) ? a : h * Math.pow(2, 10 * (f / g - 1)) + a }, easeOutExpo: function(e, f, a, h, g) { return (f == g) ? a + h : h * (-Math.pow(2, -10 * f / g) + 1) + a }, easeInOutExpo: function(e, f, a, h, g) { if (f == 0) { return a } if (f == g) { return a + h } if ((f /= g / 2) < 1) { return h / 2 * Math.pow(2, 10 * (f - 1)) + a } return h / 2 * (-Math.pow(2, -10 * --f) + 2) + a }, easeInCirc: function(e, f, a, h, g) { return -h * (Math.sqrt(1 - (f /= g) * f) - 1) + a }, easeOutCirc: function(e, f, a, h, g) { return h * Math.sqrt(1 - (f = f / g - 1) * f) + a }, easeInOutCirc: function(e, f, a, h, g) { if ((f /= g / 2) < 1) { return -h / 2 * (Math.sqrt(1 - f * f) - 1) + a } return h / 2 * (Math.sqrt(1 - (f -= 2) * f) + 1) + a }, easeInElastic: function(f, h, e, l, k) { var i = 1.70158; var j = 0; var g = l; if (h == 0) { return e } if ((h /= k) == 1) { return e + l } if (!j) { j = k * 0.3 } if (g < Math.abs(l)) { g = l; var i = j / 4 } else { var i = j / (2 * Math.PI) * Math.asin(l / g) } return -(g * Math.pow(2, 10 * (h -= 1)) * Math.sin((h * k - i) * (2 * Math.PI) / j)) + e }, easeOutElastic: function(f, h, e, l, k) { var i = 1.70158; var j = 0; var g = l; if (h == 0) { return e } if ((h /= k) == 1) { return e + l } if (!j) { j = k * 0.3 } if (g < Math.abs(l)) { g = l; var i = j / 4 } else { var i = j / (2 * Math.PI) * Math.asin(l / g) } return g * Math.pow(2, -10 * h) * Math.sin((h * k - i) * (2 * Math.PI) / j) + l + e }, easeInOutElastic: function(f, h, e, l, k) { var i = 1.70158; var j = 0; var g = l; if (h == 0) { return e } if ((h /= k / 2) == 2) { return e + l } if (!j) { j = k * (0.3 * 1.5) } if (g < Math.abs(l)) { g = l; var i = j / 4 } else { var i = j / (2 * Math.PI) * Math.asin(l / g) } if (h < 1) { return -0.5 * (g * Math.pow(2, 10 * (h -= 1)) * Math.sin((h * k - i) * (2 * Math.PI) / j)) + e } return g * Math.pow(2, -10 * (h -= 1)) * Math.sin((h * k - i) * (2 * Math.PI) / j) * 0.5 + l + e }, easeInBack: function(e, f, a, i, h, g) { if (g == undefined) { g = 1.70158 } return i * (f /= h) * f * ((g + 1) * f - g) + a }, easeOutBack: function(e, f, a, i, h, g) { if (g == undefined) { g = 1.70158 } return i * ((f = f / h - 1) * f * ((g + 1) * f + g) + 1) + a }, easeInOutBack: function(e, f, a, i, h, g) { if (g == undefined) { g = 1.70158 } if ((f /= h / 2) < 1) { return i / 2 * (f * f * (((g *= (1.525)) + 1) * f - g)) + a } return i / 2 * ((f -= 2) * f * (((g *= (1.525)) + 1) * f + g) + 2) + a }, easeInBounce: function(e, f, a, h, g) { return h - jQuery.easing.easeOutBounce(e, g - f, 0, h, g) + a }, easeOutBounce: function(e, f, a, h, g) { if ((f /= g) < (1 / 2.75)) { return h * (7.5625 * f * f) + a } else { if (f < (2 / 2.75)) { return h * (7.5625 * (f -= (1.5 / 2.75)) * f + 0.75) + a } else { if (f < (2.5 / 2.75)) { return h * (7.5625 * (f -= (2.25 / 2.75)) * f + 0.9375) + a } else { return h * (7.5625 * (f -= (2.625 / 2.75)) * f + 0.984375) + a } } } }, easeInOutBounce: function(e, f, a, h, g) { if (f < g / 2) { return jQuery.easing.easeInBounce(e, f * 2, 0, h, g) * 0.5 + a } return jQuery.easing.easeOutBounce(e, f * 2 - g, 0, h, g) * 0.5 + h * 0.5 + a } });

//for Search box
focusSearchBox = function() {
    //jSearchInput.focus();
    //   if (core.getObject("sct") != null) {
    //       core.getObject("sct").focus();
    //       core.getObject("sct").select();
    //   }
};

try {
    google.load("language", "1");
    submitSearch = function() {
        lenKeyword = core.trim(core.getObject("sct")[0].value).length;
        if (core.getObject("sct")[0].value == 'Tìm kiếm...') {
            lenKeyword = 0;
        }

        if (lenKeyword > 1 && lenKeyword < 255) {
            //nếu search cặp câu cần lấy thêm lang rồi mới search
            if ($('.combo-box')[0].value == 'search.php') {
                google.language.detect(core.getObject("sct")[0].value, checklangCallback);
                return false;
            }
            else {
                if ($('.combo-box')[0].value == 'chat.php') {
                    google.language.detect(core.getObject("sct")[0].value, checklangCallback);
                    return false;
                }
                else {
                    return true;
                }
            }
        }
        else {

            if (lenKeyword < 1) {

                popDiv.alert("Chuỗi tìm kiếm không được rỗng.", SYSTEM_TITLE);
            }
            else {
                if (lenKeyword > 255) {
                    popDiv.alert("Chuỗi tìm kiếm quá dài.", SYSTEM_TITLE);
                }
                else {
                    if (lenKeyword == 1) {

                        popDiv.alert("Chuỗi tìm kiếm quá ngắn.", SYSTEM_TITLE);
                    }
                }


            }
            return false;
        }


    }
    var _strKeyword;
    submitSearchMenucontext = function(strKeyword) {
        _strKeyword = strKeyword;
        google.language.detect(strKeyword, checklangContextMenuCallback);
        //return false;
    }
    //thực thi việc lấy language rồi search luôn trong menu context
    function checklangContextMenuCallback(result) {
        if (result.language != 'en' && result.language != 'vi') {
            //popDiv.alert("Không xác định được ngôn ngữ!.", SYSTEM_TITLE);
            //return false;
            result.language = 'vi';
        }
        core.getObject("lang")[0].value = result.language;
        var ajax = new Ajax(METHOD_GET);
        var strRequest = "chat.php?act=" + ACT_SEARCH + "&sct=" + _strKeyword + "&lang=" + core.getObject("lang")[0].value + "&num=" + NUM_SEARCH_CONTEXT; // + "&sid=" + core.getObject("sid").value + "&lang=" + (core.getObject("langen").checked ? "0" : "1"); // +"&kid=" + core.getObject("kid").value;
        ajax.SendRequestToServerWithCustomMsg(strRequest, null, getAjaxSearchMenuContext_OnCallBack, true, MSG_AJAX_FETCHING_VN);

    }
    //lấy giá trị search trả về và hiển thị trong messagebox
    getAjaxSearchMenuContext_OnCallBack = function(xmlHTTPRequest) {
        if (xmlHTTPRequest.readyState == 4) {
            if (xmlHTTPRequest.status == 200) {
                var strRespond = parserXML(xmlHTTPRequest.responseText);
                if (!headerProcessingArr(strRespond[0], Array(true, true, false))) {
                    popDiv.alert(MSG_RES_OPERATION_FAIL, SYSTEM_TITLE, 1);
                    return;
                }
                if (parseInt(strRespond[1]["rs"]) == 1) {
                    //showInfoBar('success', MSG_RES_OPERATION_SUCCESS);
                    var HTMLCONTENT = '<div id="pop-head">';
                    HTMLCONTENT += '<b class="icon-big icon-alert">&nbsp;</b>';
                    HTMLCONTENT += '<h1 class="title inline-block">Từ khóa: <b>' + _strKeyword + '</h1>';
                    HTMLCONTENT += '</div>';
                    HTMLCONTENT += '<div id="pop-content">';
                    HTMLCONTENT += strRespond[1]["info"];
                    HTMLCONTENT += '</div>';

                    popDiv.html(HTMLCONTENT, '760x_');
                    //Do hiển thị alert lên nhưng chưa rebind lại được
                    //khỏi tạo lại sự kiện từ file global-script.js
                    setTimeout(function() {
                        initTblSentences();
                        initMembersContext();
                    }, 1000);
                    //khởi tạo lại tooltip user

                }
                else {
                    if (parseInt(strRespond[1]["rs"]) == 2) {
                        objSearch.showSecCode();
                    }
                    else {
                        popDiv.alert(MSG_RES_OPERATION_FAIL, SYSTEM_TITLE, 1);
                        return
                    }
                }
            }
        }
    }

    //lấy giá trị search trả về và hiển thị
    getAjaxSearch_OnCallBack = function(xmlHTTPRequest) {
        if (xmlHTTPRequest.readyState == 4) {
            if (xmlHTTPRequest.status == 200) {
                var strRespond = parserXML(xmlHTTPRequest.responseText);
                if (!headerProcessingArr(strRespond[0], Array(true, true, false))) {
                    popDiv.alert(MSG_RES_OPERATION_FAIL, SYSTEM_TITLE, 1);
                    return;
                }
                if (parseInt(strRespond[1]["rs"]) == 1) {
                    showInfoBar('success', MSG_RES_OPERATION_SUCCESS);
                    core.getObject("page-content").html(strRespond[1]["info"]);
                    //khỏi tạo lại sự kiện từ file global-script.js
                    initTblSentences();
                    //khởi tạo lại tooltip user
                    initMembersContext();
                }
                else {
                    if (parseInt(strRespond[1]["rs"]) == 2) {
                        objSearch.showSecCode();
                    }
                    else {
                        popDiv.alert(MSG_RES_OPERATION_FAIL, SYSTEM_TITLE, 1);
                        return
                    }
                }
            }
        }
    }
    //thực thi việc lấy language rồi search luôn
    function checklangCallback(result) {
        if (result.language != 'en' && result.language != 'vi') {
            //popDiv.alert("Không xác định được ngôn ngữ!.", SYSTEM_TITLE);
            //return false;
            result.language = 'vi';
        }
        core.getObject("lang")[0].value = result.language;
        if ($('.combo-box')[0].value != 'chat.php') {
            document.forms[0].submit();
        }
        else {
            var ajax = new Ajax(METHOD_GET);
            var strRequest = "chat.php?act=" + ACT_SEARCH + "&sct=" + urlencode(core.getObject("sct")[0].value) + "&lang=" + core.getObject("lang")[0].value; // + "&sid=" + core.getObject("sid").value + "&lang=" + (core.getObject("langen").checked ? "0" : "1"); // +"&kid=" + core.getObject("kid").value;
            ajax.SendRequestToServerWithCustomMsg(strRequest, null, getAjaxSearch_OnCallBack, true, MSG_AJAX_FETCHING_VN);

        }


    }

} catch (err) { }
var importLibSocial = false;
function addLinkToSocial(jbntAdd, jContent, typeIcon) {

    var htmls = '';

    //htmls+='<div id="user-menu" class="ctx-menu shadow callout" style="display: block;">';
    //htmls+='<b class="icon icon-callout"></b>';

    if (typeof (typeIcon) == 'undefined') {
        typeIcon = 1;

    }
    if (typeIcon == 1) {
        htmls += '<div id="addlinktsocial" class="addthis_toolbox addthis_default_style">'; // style="display:none;margin:5px;"
    }
    if (typeIcon == 2) {
        htmls += '<div id="addlinktsocial" class="addthis_toolbox addthis_default_style addthis_32x32_style">';
    }


    htmls += '<a class="addthis_button_facebook"></a>';
    htmls += '<a class="addthis_button_twitter"></a>';
    htmls += '<a class="addthis_button_google"></a>';
    htmls += '<a class="addthis_button_zingme"></a>';
    htmls += '<a class="addthis_button_yahoomail"></a>';
    htmls += '</div>';
    //htmls+='</div>';
    //$(jContent).html(htmls);

    //$(jbntAdd).toggle(
    //	function(){$("div[id='addlinktsocial']").fadeIn('slow');},
    //	function(){$("div[id='addlinktsocial']").fadeOut('slow');}									
    //	);


    var htmlCtx = '<div class="sharesocial callout"><b class="icon icon-callout"></b><div class="box-inner">' + htmls + '</div></div>';

    var jWrap = $(jbntAdd).parent('span.likes-count-wrap');
    if (jWrap.length == 0) {
        $(jbntAdd).wrap('<span class="likes-count-wrap inline-block" ></span>')
        jWrap = $(jbntAdd).parent();
    }
    var jCtx = jWrap.find('.ctx-sheet');
    if (jCtx.length == 0) {
        jCtx = $(htmlCtx);
        jWrap.append(jCtx);
    }
    //position: absolute
    isContextMenu('click', $(jbntAdd), jCtx);
    if (!importLibSocial) {
        var addthis_config = { "data_track_clickback": true };
        document.write('<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4dfccec67f881afc"></script>');
        importLibSocial = true;
    }

}

//add share link vào trang
function addLikeToSocial() {

    var htmls = '';

    htmls += '<div class="addthis_toolbox addthis_default_style">';
    htmls += '<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>';


    htmls += '<a class="addthis_button_tweet"></a>';
    //htmls+='<a class="addthis_button_google_plusone"></a>';	
    htmls += '</div>';
    //$(jContent).html(htmls);
    document.write(htmls);
    if (!importLibSocial) {
        var addthis_config = { "data_track_clickback": true };
        document.write('<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4dfccec67f881afc"></script>');
        importLibSocial = true;
    }

}

// Hien popup khi rê chuột lên số người đã kết bạn
function initFriendContext(e) {
    // FRIEND-CONTEXT

    $('a.friend_context').each(function(index, element) {
        if ($(this).next().is('.ctx-menu'))
            $(this).hover(function(e) {
                $(this).next().show();
            }, function() {
                $(this).next().hide();
            });
    });
}

/*init combobox*/
(function($) {
    $.widget("ui.combobox", {
        _create: function() {
            var self = this,
					select = this.element.hide(),
					selected = select.children(":selected"),
					value = selected.val() ? selected.text() : "";
            var input = this.input = $("<input>")
					.insertAfter(select)
					.val(value)
					.autocomplete({
					    delay: 0,
					    minLength: 0,
					    source: function(request, response) {
					        var matcher = new RegExp($.ui.autocomplete.escapeRegex(request.term), "i");
					        response(select.children("option").map(function() {
					            var text = $(this).text();
					            if (this.value && (!request.term || matcher.test(text)))
					                return {
					                    label: text.replace(
											new RegExp(
												"(?![^&;]+;)(?!<[^<>]*)(" +
												$.ui.autocomplete.escapeRegex(request.term) +
												")(?![^<>]*>)(?![^&;]+;)", "gi"
											), "<strong>$1</strong>"),
					                    value: text,
					                    option: this
					                };
					        }));
					    },
					    select: function(event, ui) {
					        ui.item.option.selected = true;
					        //alert(ui.item.option.value+":"+ui.item.option.text);
					        //$(".selectedd").each(function() {
					        //	$( this ).removeClass('selectedd');
					        //});

					        //ui.item.option.setAttribute("class", "selectedd");

					        //alert($(ui.item.option).parent().attr("id"));
					        $("#" + $(ui.item.option).parent().attr("id") + "_input").val(ui.item.option.value);
					        //alert($(this).attr("id"));
					        self._trigger("selected", event, {
					            item: ui.item.option
					        });
					    },
					    change: function(event, ui) {
					        if (!ui.item) {
					            var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex($(this).val()) + "$", "i"),
									valid = false;
					            select.children("option").each(function() {
					                //chọn từ combobox
					                if ($(this).text().match(matcher)) {
					                    this.selected = valid = true;

					                    return false;
					                }
					            });
					            if (!valid) {
					                // remove invalid value, as it didn't match anything
					                //$( this ).val( "" );
					                //select.val( "" );
					                //input.data( "autocomplete" ).term = "";
					                //alert(input.data( "autocomplete" ).term);
					                return false;
					            }
					        }
					    }
					})
					.addClass("ui-widget ui-widget-content ui-corner-left");

            input.data("autocomplete")._renderItem = function(ul, item) {
                return $("<li></li>")
						.data("item.autocomplete", item)
						.append("<a>" + item.label + "</a>")
						.appendTo(ul);
            };
            $(".ui-widget-content").click(function() {
            // Select field contents
                
                $(this).select();
            });
            this.button = $("<button type='button'>&nbsp;</button>")
					.attr("tabIndex", -1)
					.attr("title", "Show All Items")
					.insertAfter(input)
					.button({
					    icons: {
					        primary: "ui-icon-triangle-1-s"
					    },
					    text: false
					})
					.removeClass("ui-corner-all")
					.addClass("ui-corner-right ui-button-icon")
					.click(function() {
					    // close if already visible
					    if (input.autocomplete("widget").is(":visible")) {
					        input.autocomplete("close");
					        return;
					    }

					    // work around a bug (likely same cause as #5265)
					    $(this).blur();

					    // pass empty string as value to search for, displaying all results
					    input.autocomplete("search", "");
					    input.focus();
					});
        },

        destroy: function() {
            this.input.remove();
            this.button.remove();
            this.element.show();
            $.Widget.prototype.destroy.call(this);
        }
    });
})(jQuery);
