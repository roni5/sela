/***************************************************************

*

* Name         : Core class

* Desciption   :

* Author       :
* Created on   : 

* 

* ************************************************************/
//var CLASS_INPUT_INVALID = "input-text-invalid";
//var CLASS_PARENT_ERROR = "input-error";
var core = {};

core.constant = {
    ClassInvalid: "input-text-invalid",
    ClassInputError: "input-error",
	// text strings
	MsgSearch: "Tìm kiếm...",
	MsgProcessing: "Đang xử lý...",
	MsgProcessComplete: "Xử lý hoàn tất !",
	MsgProcessError: "Không thể xử lý !",
	MsgSuccess: "Thành công !",
	MsgDataLoaded: "OK !",
	MsgAjaxTimeOut: "Không kết nối được! Xin thử lại sau.",
};

core.request = {
	status:
	{
		processing: "processing", //"0"
		success: "success",//"1"
		error: "error",//"2"
	},
    execute: function(urlVal, data, fx, method, fxFail) {
        if (method == undefined) method = 'GET';
        $.ajax({
            url: urlVal,
            type: method,
            cache: false,
            data: data,
            crossDomain: true,
            beforeSend: function() {
                core.ui.showInfoBar(0, core.constant.MsgProcessing);
            },
            success: function(data, textStatus, jqXHR) {
				if (!core.util.isNull(fxFail)) {
                     fx(data, { textStatus: textStatus, jqXHR: jqXHR });	
                }
                else {
                   core.ui.showInfoBar(1, core.constant.MsgSuccess);	
                }
               			
            },
            error: function(data, ajaxOptions, thrownError) {
                if (!core.util.isNull(fxFail)) {
                    fxFail();
                }
                else {
                    //console.log('fail connection');
					core.ui.showInfoBar(2, core.constant.MsgProcessError);
                }
				
            },
            complete: function() {
                //core.ui.hideInfoBar();
            }

        });
    },
    execute2: function(url, data, fx, method, host, fxFail) {
        if (method == undefined) method = 'GET';
        $.ajax({
            url: host + url,
            type: method,
            cache: false,
            success: function(data, textStatus, jqXHR) {
                var ct = jqXHR.getResponseHeader("content-type") || "";
                fx(data, { textStatus: textStatus, jqXHR: jqXHR, contentType: ct });
            },
            error: function(xhr, ajaxOptions, thrownError) {
                core.ui.hideLoading();
            }

        });
    },
    post: function(url, data, fx, fxFail) {
        this.execute(url, data, fx, 'POST', fxFail)
    },
    get: function(url, data, fx, fxFail) {
        this.execute(url, data, fx, 'GET', fxFail);
    }
};
// common for ui
core.ui = {    
    
    timerInfoBar:0,
        
    // INFO BAR ===================================================    
    initInfoBar: function (){
	    $('body').append('<div class="info-bar no-shadow"><b class="icon"></b><span></span></div>');
    },
    showInfoBar: function(status,text,handler,speed){
		if(typeof(status) == "undefined")
		{
			status = 2;
		}
		switch(status)
		{
			case 0:
				status = core.request.status.processing;
				break;
			case 1:
				status = core.request.status.success;
				break;
			case 2:
				status = core.request.status.error;
				break;
		}
	    var _speed=speed?speed:'slow';
	    if(status == core.request.status.success) $('.info-bar .icon').attr('class','icon icon-tick');
	    else if(status== core.request.status.error) $('.info-bar .icon').attr('class','icon icon-x');
	    $('.info-bar span').text(text);
	    $('.info-bar').css('left',($(window).width()/2)-($('.info-bar').outerWidth()/2)+'px');
	    $('.info-bar').attr('class','info-bar '+status).stop().animate(
		    {top : 0},
		    {duration: _speed, easing: 'easeOutCubic', complete:handler}
	    );
	    //$('.info-bar').click(hideInfoBar);
	    if(status == core.request.status.success){
		    clearInterval(timerInfoBar);
		    timerInfoBar = setInterval(hideInfoBar, 3000);
	    }
    },
    hideInfoBar: function(speed){
	    clearInterval(timerInfoBar);
	    var _speed=speed?speed:1000;
	    $('.info-bar').stop().animate(
		    {top : '-30px'},
		    {duration: _speed, easing: 'easeOutCubic', complete:function(){$('.info-bar').addClass('no-shadow');}}
	    );		
    },
    getWindowDimensions: function() {
        var wind = $(window);
        var docu = $(document);
        // fix a jQuery/Opera bug with determining the window height
        var h = $.browser.opera && $.browser.version > '9.5' && $.fn.jquery < '1.3'
						|| $.browser.opera && $.browser.version < '9.5' && $.fn.jquery > '1.2.6'
				? wind[0].innerHeight : wind.height();

        return {
            d: [docu.height(), docu.width()],
            w: [h, wind.width()]
        };
    },
    showLoading: function() {
        var dimension = core.ui.getWindowDimensions();

        var overlay = $('<div></div>')
				.attr('id', "loading_overlay")
				.addClass('loading-overlay')
				.css({
				    display: 'none',
				    opacity: 0.5,
				    height: 50,
				    width: 50,
				    position: 'fixed',
				    left: dimension.d[1] / 2,
				    top: dimension.w[0] / 2,
				    zIndex: 3000
				})
				.appendTo($('body'));

        //console.log(dimension.d);
        var loading_image = $('<div id="loading_content">&nbsp;<img src="/images/loading.gif"></div>')
		            .css({
		                width: '100%',
		                height: dimension.w[0],
		                background: 'none'
		            }).appendTo(overlay);

        overlay.show();
    },
    showLoadingByClassName: function(className) {
        //var dimension = core.ui.getWindowDimensions();
        var parentControl = $("." + className);
        var overlay = $('<div></div>')
				.attr('id', "loading_overlay")
				.addClass('loading-overlay')
				.css({
				    display: 'none',
				    opacity: 0.5,
				    height: parentControl.height(),
				    width: parentControl.width(),
				    position: 'fixed',
				    left: 0,
				    top: 0,
				    zIndex: 3000
				})
				.appendTo($('.' + className));

        var loading_image = $('<div id="loading_content">&nbsp;</div>')
		            .css({
		                width: '100%',
		                height: parentControl.height()
		            }).appendTo(overlay);

        overlay.show();
    },
    showLoadingByID: function(controlID) {
        var dimension = core.ui.getWindowDimensions();
        var control = $("#" + controlID);
        if (control != null && control.length > 0) {
            var overlay = $('<div></div>')
				.attr('id', "loading_overlay_" + controlID)
				.addClass('loading-overlay')
				.css({
				    display: 'none',
				    opacity: 0.5,
				    height: control.height(),
				    width: control.width(),
				    position: 'absolute',
				    left: 0,
				    top: -30,
				    zIndex: 3000
				})
				.appendTo($('#' + controlID));

            var loading_image = $('<div id="loading_content">&nbsp;</div>')
		            .css({
		                width: '100%',
		                height: control.height(),
		                zIndex: 3000
		            }).appendTo(overlay);

            overlay.show();
        }
        else {
            core.ui.showLoading();
        }
    },
    hideLoadingByID: function(controlID) {
        var loadding_overlay = $("#loading_overlay_" + controlID);
        if (loadding_overlay.length > 0) {
            loadding_overlay.hide();
            loadding_overlay.remove();
        }
    },
    hideLoading: function() {
        var loadding_overlay = $("#loading_overlay");
        if (loadding_overlay.length > 0) {
            loadding_overlay.hide();
            loadding_overlay.remove();
        }
    },
    loadContent: function(url, data, replaceElement, fx) {
        this.showLoading();
        olc.request.get(url, data, function(data, textStatus, jqXHR) {
            if (replaceElement) {
                replaceElement.replaceWidth(data);
            }
            if (fx) {
                fx(data, textStatus, jqXHR);
            }
            this.hideLoading();
        });
    },
    showMessage: function(message) {
        jAlert(message, "Message");
    }

};
core.util = {
    /*
    * Function: getObject(strObjectName)
    * Description: get obeject in document by id    
    */
    getObjectByID: function(strObjectID) {
        //Tránh những ID có ký tự đặc biệt
        return $('[id="' + strObjectID + '"]');
    },

    /*
    * Function: getObjectByClass(strObjectName)
    * Description: get obeject by class name
    */
    getObjectByClass: function(className) {
        //Tránh những ID có ký tự đặc biệt
        return $('.' + className + '');
    },

    /*
    * Function: getObjectValue(obj)
    * Description: get value of Object
    */
    getObjectValueByID: function(strObjectID) {
        var obj = this.getObjectByID(strObjectID);
        if (obj != null) {
            return obj.val();
        }
        return "";
    },
    validateInputTextBox: function(controlId, msg, isFocus) {
		
        var control = this.getObjectByID(controlId);
		
        if (this.trim(msg) != "") {
            control.addClass(core.constant.ClassInvalid);
            control.tooltip();
            if (isFocus) this.focusControl(controlId);
            control.attr("title", msg);
			control.closest(".controls").addClass(core.constant.ClassInputError);
			control.closest(".controls").find('.message').html(msg);
			
        }
        else {
            control.removeClass(core.constant.ClassInvalid);
            control.attr("title", msg);
            control.tooltip();
			control.closest(".controls").removeClass(core.constant.ClassInputError);
        }
    },

    validateDateTime: function (input) {
		var dtRegex = new RegExp(/\b\d{1,2}[\/-]\d{1,2}[\/-]\d{4}\b/);
		return dtRegex.test(input);
    },
    
	formatDateTimeVN: function (input) {
		var dtArray = input.split('/');
		dtDay= dtArray[0];
		dtMonth = dtArray[1];		
		dtYear = dtArray[2];
		return dtMonth+'/'+dtDay+'/'+dtYear;
    },
	
    focusControl: function (controlID) {
        try {
            var control = this.getObjectByID(controlID)
            if (control != "undefined") {
                control.focus();
                var type = control.attr("type");
                type = type.toLowerCase();
                var tagName = control[0].tagName;
                tagName = tagName.toLowerCase();
                if (type == 'text' || type == 'textbox' || type == 'password' || type == '' || tagName == 'textarea') {
                    control.select();
                }
            }
        } catch (e) {

        }
    },
    trim: function(str) {
            return $.trim(str);
    },
	
	// Disable/Enable a control
    disableControl: function (idControl, isDisable) {
		var control =   this.getObjectByID(idControl);
        if (typeof(control) != 'undefined' ) {

            if (isDisable) {
                control[0].style.cursor = "default";
                control[0].disabled = isDisable;
            }

            else {
                control[0].style.cursor = "pointer";
                setTimeout(function() {
                    control[0].disabled = isDisable;
                }, 200);
            }
        }
    },
	
    isChecked: function (controlID) {
        return $("#" + controlID).is(':checked');
    },
	
	parserXML: function(text) {
        text = text.replace(/(\r\n|\n|\r)/gm, "");
        var xmlDoc;
        //debugger;
        if (window.DOMParser) {
            parser = new DOMParser();
            // TODO: TinhDoan edited [20100522] - can phai xem lai cho nay

            // DoNguyen editted [20100522] - Anh trim() no truoc khi dung cho chac an (vi khong biet co phai luon luon du 2 ky tu khong)

            // Anh cung chua biet nguyen nhan vi sao du 2 ky tu nay, anh nghi la do header, nhung anh doi roi van khong an thua gi
            //var text_temp = trim(text); //.substr(2);
            xmlDoc = parser.parseFromString(text, "text/xml");

        }

        else // Internet Explorer
        {
            //var text_temp = trim(text);//.substr(2);
            xmlDoc = new ActiveXObject("Microsoft.XMLDOM");
            xmlDoc.async = "false";
            xmlDoc.loadXML(text);

        }

        var root = xmlDoc.getElementsByTagName("r")[0];
        var intArray = root.childNodes.length;
        var arrResult = new Array(intArray);
        var i, j;
        var node, intNode, nodeValue;

        // TODO: DoNguyen reviewed - O day co mot vai diem khong hop ly lam

        // 1. O server truyen vao la KEY-VALUE, nhung o client lai parse ra la INDEX-VALUE, anh muon van la KEY-VALUE

        //    (tuc la se khong dung "arrValue.push" ma se la arrValue[ten cua node]=...)

        //    de coder luc su dung lay gia tri cho de.

        // 2. Khong nen dung "arrResult.push" ma hay kiem tra neu la con cua node "h" thi gan vao arrResult[0],

        //    neu la con cua node "c" thi gan vao arrResult[1].

        //    Nhu vay minh chac chan chay dung, minh push kieu nay anh so no khong giong nhau giua cac browser.

        // => Khi su dung ket qua function nay, chung ta se goi nhu sau: 

        //    - Doi voi Header: arrResult[0]["h1"], arrResult[0]["h2"], arrResult[0]["h3"]

        //    - Doi voi noi dung: arrResult[1]["rs"], arrResult[1]["inf"],...

        for (i = 0; i < intArray; i++) {
            node = root.childNodes[i];
            intNode = node.childNodes.length;
            var arrValue = new Array(intNode);

            for (j = 0; j < intNode; j++) {
                nodeValue = node.childNodes[j];
                arrValue[nodeValue.nodeName] = nodeValue.childNodes[0] == null ? "" : nodeValue.childNodes[0].nodeValue;
            }

            switch (node.nodeName) {
                case "h":
                    arrResult[0] = arrValue;
                    break;
                case "c":
                    arrResult[1] = arrValue;
                    break;
                default:
                    break;
            }
        }

        return arrResult;
    },
	
    isNull: function(varOject) {
        if (typeof (varOject) == 'undefined' || !varOject || core.util.trim(varOject) == '' ) {
            return true;
        }
        else {
            return false;
        }
    },
	goTo: function(url) {
        window.location.href = url;
    },
	
	isPhoneNumber: function(sText){
        var ValidChars = "0123456789.() +";
        var isPhone = true;
        var Char;
		//sText += ";"
		var phones = sText.split(';');
		$.each(phones, function(key,value){
			if(value.length>0 && value.length <7)
			{
				return false;
			}
			for (i = 0; i < value.length && isPhone == true; i++) 
			{
				Char = value.charAt(i);
				if (ValidChars.indexOf(Char) == -1) {
					isPhone = false;
				}
			}	
		});
       
        return isPhone;
	},
	compareTime: function(start, end){
		if(Date.parse("1-1-2000 " + start) < Date.parse("1-1-2000 " + end)) {
			return true;
		}
		return false;
	},
	deSelectOption: function(controlID){
		core.util.getObjectByID(controlID).val([]);
		core.util.getObjectByID(controlID).trigger("liszt:updated");
	},
	clearValue: function(controlID){
		core.util.getObjectByID(controlID).val('');		
	}
};

core.init = function() {
    core.ui.initInfoBar();
}

$(document).ready(function() {
     core.init();
});

$.fn.outerHTML = function() {

    // IE, Chrome & Safari will comply with the non-standard outerHTML, all others (FF) will have a fall-back for cloning
    return (!this.length) ? this : (this[0].outerHTML || (
        function(el) {
            var div = document.createElement('div');
            div.appendChild(el.cloneNode(true));
            var contents = div.innerHTML;
            div = null;
            return contents;
        })(this[0]));

};

function sessionExpireProcessing() {

    dlgBox.showDialog(LOGIN_TITLE, "Bạn chưa login. Vui lòng login!", "sessionExpireProcessing_OK()", null, 2);

    //core.getObject("divLogin").innerHTML = "<form method=\"post\"><div id=\"tblAlert\" style=\"display:none\" align=\"center\"><table style=\"padding:0px;margin:0px\"><tr><td><div id=\"nifty\"><b class=\"rtop\"><b class=\"r1\"></b><b class=\"r2\"></b><b class=\"r3\"></b><b class=\"r4\"></b></b><div id=\"lblAlert\" align=\"center\" style=\"margin-left:10px;margin-right:10px;\" class=\"alert-msg-normal\"></div><b class=\"rbottom\"><b class=\"r4\"></b><b class=\"r3\"></b><b class=\"r2\"></b><b class=\"r1\"></b></b></div></td></tr></table></div><div style=\"width:52px;float:left;height:16px;padding-top:3px;margin-bottom:2px;cursor:default;\">Email</div> <div style=\"float:left;width:158px;margin-bottom:2px\"><input style=\"height:15px;width:100%\" id=\"email\" type=\"text\" value=\"\" /></div><div class=\"clearfix\" style=\"width:52px;float:left;height:16px;padding-top:3px;margin-bottom:2px;cursor:default;\">Mật khẩu</div> <div style=\"float:left;width:158px;margin-bottom:2px\"><input style=\"height:15px;width:100%\" id=\"cpassword\" type=\"Password\" value=\"\" /></div><div class=\"clearfix\" style=\"height:2px\">&nbsp;</div><div style=\"margin-bottom:5px;\">Nhập mã xác nhận</div><div style=\"float:left;margin-left:0px\"><img id=\"imgSecChar\" src=\"capcha.php?type=0\" /></div><div style=\"float:left;width:20px;\">&nbsp;</div><div style=\"float:left;margin-top:-1px;\"><input id=\"txtCode\" type=\"text\" maxlength=5 style=\"width:90px;height:16px;\" /></div><div class=\"clearfix\" style=\"height:2px\">&nbsp;</div><div style=\"float:left;width:208px;margin-left:5px;margin-top:1px;\"><div style=\"float:left\"><input type=\"checkbox\" id=\"chkRemember\" style=\"margin-left:0\" /></div><div style=\"float:left;margin-top:2px;cursor:default;\" onclick=\"document.getElementById('chkRemember').checked=!document.getElementById('chkRemember').checked\">Tự động đăng nhập</div><div style=\"float:right\"><input class=\"button-style button-submit\" type=\"button\" value=\"Login\" style=\"width:43px;height:20px;padding:0;margin:0px;margin-top:-1px;\" onclick=\"login()\" /></div></div><div class=\"clearfix\" style=\"height:2px\">&nbsp;</div><div class=\"bd_t1 pdg_t5\" align=\"center\"> <a href=\"user.php?d=30\" style=\"text-decoration:none\">Trợ giúp Login</a>| <a href=\"user.php\" style=\"font-color:#4866de;text-decoration:none\"><font color=\"#4866de\">Đăng ký</font></a></div></form>";

    core.getObject("divLogin").innerHTML = "<div class=\"hr_title\"></div><div class=\"title\">Đăng nhập</div><div class=\"frame_bgc\"><form method=\"post\" onsubmit=\"login();return false;\"><div id=\"tblAlertLogin\" style=\"display: none;\" align=\"center\"><table style=\"padding: 0px; margin: 0px;\">  <tbody><tr><td><div id=\"nifty\"><b class=\"rtop\"><b class=\"r1\"></b><b class=\"r2\"></b><b class=\"r3\"></b><b class=\"r4\"></b></b><div id=\"lblAlertLogin\" style=\"margin-left: 10px; margin-right: 10px;\" class=\"alert-msg-small\" align=\"center\"></div><b class=\"rbottom\"><b class=\"r4\"></b><b class=\"r3\"></b><b class=\"r2\"></b><b class=\"r1\"></b></b></div></td>  </tr></tbody></table></div><div class=\"divinline pdg_t3\"><label for=\"email\">Email</label></div> <div class=\"divinline div_alg_r wdh70p\"><input style=\"height: 16px; width: 100%;\" id=\"email\" value=\"\" type=\"text\"></div><div class=\"clearfix hgt5\">&nbsp;</div><div class=\"divinline pdg_t3\">Mật khẩu</div> <div class=\"divinline div_alg_r wdh70p\"><input style=\"height: 16px; width: 100%;\" id=\"cpassword\" value=\"\" type=\"Password\"></div><div class=\"clearfix hgt5\">&nbsp;</div><div class=\"divinline pdg_t3\"><input id=\"chkRemember\" type=\"checkbox\"></div><div class=\"divinline pdg_t5\"><label for=\"chkRemember\">Tự động login lần sau</label></div><div class=\"divinline flt-r\"><input class=\"button-style button-submit\" value=\"Log in\" type=\"submit\"></div><div class=\"clearfix hgt3\">&nbsp;</div><div class=\"bd_t1 pdg_t5\" align=\"center\"> <a href=\"javascript:helpLogin_login();\" class=\"m_link\">Trợ giúp Login</a>| <a href=\"javascript:regUser_login();\" class=\"m_link\">Đăng ký</a></div></form></div>";
}

function sessionExpireProcessing_OK() {
    core.getObject("email").focus();
}



/**
*
*  MD5 (Message-Digest Algorithm)
*  http://www.webtoolkit.info/
*
**/

var MD5 = function(string) {

    function RotateLeft(lValue, iShiftBits) {
        return (lValue << iShiftBits) | (lValue >>> (32 - iShiftBits));
    }

    function AddUnsigned(lX, lY) {
        var lX4, lY4, lX8, lY8, lResult;
        lX8 = (lX & 0x80000000);
        lY8 = (lY & 0x80000000);
        lX4 = (lX & 0x40000000);
        lY4 = (lY & 0x40000000);
        lResult = (lX & 0x3FFFFFFF) + (lY & 0x3FFFFFFF);
        if (lX4 & lY4) {
            return (lResult ^ 0x80000000 ^ lX8 ^ lY8);
        }
        if (lX4 | lY4) {
            if (lResult & 0x40000000) {
                return (lResult ^ 0xC0000000 ^ lX8 ^ lY8);
            } else {
                return (lResult ^ 0x40000000 ^ lX8 ^ lY8);
            }
        } else {
            return (lResult ^ lX8 ^ lY8);
        }
    }

    function F(x, y, z) { return (x & y) | ((~x) & z); }
    function G(x, y, z) { return (x & z) | (y & (~z)); }
    function H(x, y, z) { return (x ^ y ^ z); }
    function I(x, y, z) { return (y ^ (x | (~z))); }

    function FF(a, b, c, d, x, s, ac) {
        a = AddUnsigned(a, AddUnsigned(AddUnsigned(F(b, c, d), x), ac));
        return AddUnsigned(RotateLeft(a, s), b);
    };

    function GG(a, b, c, d, x, s, ac) {
        a = AddUnsigned(a, AddUnsigned(AddUnsigned(G(b, c, d), x), ac));
        return AddUnsigned(RotateLeft(a, s), b);
    };

    function HH(a, b, c, d, x, s, ac) {
        a = AddUnsigned(a, AddUnsigned(AddUnsigned(H(b, c, d), x), ac));
        return AddUnsigned(RotateLeft(a, s), b);
    };

    function II(a, b, c, d, x, s, ac) {
        a = AddUnsigned(a, AddUnsigned(AddUnsigned(I(b, c, d), x), ac));
        return AddUnsigned(RotateLeft(a, s), b);
    };

    function ConvertToWordArray(string) {
        var lWordCount;
        var lMessageLength = string.length;
        var lNumberOfWords_temp1 = lMessageLength + 8;
        var lNumberOfWords_temp2 = (lNumberOfWords_temp1 - (lNumberOfWords_temp1 % 64)) / 64;
        var lNumberOfWords = (lNumberOfWords_temp2 + 1) * 16;
        var lWordArray = Array(lNumberOfWords - 1);
        var lBytePosition = 0;
        var lByteCount = 0;
        while (lByteCount < lMessageLength) {
            lWordCount = (lByteCount - (lByteCount % 4)) / 4;
            lBytePosition = (lByteCount % 4) * 8;
            lWordArray[lWordCount] = (lWordArray[lWordCount] | (string.charCodeAt(lByteCount) << lBytePosition));
            lByteCount++;
        }
        lWordCount = (lByteCount - (lByteCount % 4)) / 4;
        lBytePosition = (lByteCount % 4) * 8;
        lWordArray[lWordCount] = lWordArray[lWordCount] | (0x80 << lBytePosition);
        lWordArray[lNumberOfWords - 2] = lMessageLength << 3;
        lWordArray[lNumberOfWords - 1] = lMessageLength >>> 29;
        return lWordArray;
    };

    function WordToHex(lValue) {
        var WordToHexValue = "", WordToHexValue_temp = "", lByte, lCount;
        for (lCount = 0; lCount <= 3; lCount++) {
            lByte = (lValue >>> (lCount * 8)) & 255;
            WordToHexValue_temp = "0" + lByte.toString(16);
            WordToHexValue = WordToHexValue + WordToHexValue_temp.substr(WordToHexValue_temp.length - 2, 2);
        }
        return WordToHexValue;
    };

    function Utf8Encode(string) {
        string = string.replace(/\r\n/g, "\n");
        var utftext = "";

        for (var n = 0; n < string.length; n++) {

            var c = string.charCodeAt(n);

            if (c < 128) {
                utftext += String.fromCharCode(c);
            }
            else if ((c > 127) && (c < 2048)) {
                utftext += String.fromCharCode((c >> 6) | 192);
                utftext += String.fromCharCode((c & 63) | 128);
            }
            else {
                utftext += String.fromCharCode((c >> 12) | 224);
                utftext += String.fromCharCode(((c >> 6) & 63) | 128);
                utftext += String.fromCharCode((c & 63) | 128);
            }

        }

        return utftext;
    };

    var x = Array();
    var k, AA, BB, CC, DD, a, b, c, d;
    var S11 = 7, S12 = 12, S13 = 17, S14 = 22;
    var S21 = 5, S22 = 9, S23 = 14, S24 = 20;
    var S31 = 4, S32 = 11, S33 = 16, S34 = 23;
    var S41 = 6, S42 = 10, S43 = 15, S44 = 21;

    string = Utf8Encode(string);

    x = ConvertToWordArray(string);

    a = 0x67452301; b = 0xEFCDAB89; c = 0x98BADCFE; d = 0x10325476;

    for (k = 0; k < x.length; k += 16) {
        AA = a; BB = b; CC = c; DD = d;
        a = FF(a, b, c, d, x[k + 0], S11, 0xD76AA478);
        d = FF(d, a, b, c, x[k + 1], S12, 0xE8C7B756);
        c = FF(c, d, a, b, x[k + 2], S13, 0x242070DB);
        b = FF(b, c, d, a, x[k + 3], S14, 0xC1BDCEEE);
        a = FF(a, b, c, d, x[k + 4], S11, 0xF57C0FAF);
        d = FF(d, a, b, c, x[k + 5], S12, 0x4787C62A);
        c = FF(c, d, a, b, x[k + 6], S13, 0xA8304613);
        b = FF(b, c, d, a, x[k + 7], S14, 0xFD469501);
        a = FF(a, b, c, d, x[k + 8], S11, 0x698098D8);
        d = FF(d, a, b, c, x[k + 9], S12, 0x8B44F7AF);
        c = FF(c, d, a, b, x[k + 10], S13, 0xFFFF5BB1);
        b = FF(b, c, d, a, x[k + 11], S14, 0x895CD7BE);
        a = FF(a, b, c, d, x[k + 12], S11, 0x6B901122);
        d = FF(d, a, b, c, x[k + 13], S12, 0xFD987193);
        c = FF(c, d, a, b, x[k + 14], S13, 0xA679438E);
        b = FF(b, c, d, a, x[k + 15], S14, 0x49B40821);
        a = GG(a, b, c, d, x[k + 1], S21, 0xF61E2562);
        d = GG(d, a, b, c, x[k + 6], S22, 0xC040B340);
        c = GG(c, d, a, b, x[k + 11], S23, 0x265E5A51);
        b = GG(b, c, d, a, x[k + 0], S24, 0xE9B6C7AA);
        a = GG(a, b, c, d, x[k + 5], S21, 0xD62F105D);
        d = GG(d, a, b, c, x[k + 10], S22, 0x2441453);
        c = GG(c, d, a, b, x[k + 15], S23, 0xD8A1E681);
        b = GG(b, c, d, a, x[k + 4], S24, 0xE7D3FBC8);
        a = GG(a, b, c, d, x[k + 9], S21, 0x21E1CDE6);
        d = GG(d, a, b, c, x[k + 14], S22, 0xC33707D6);
        c = GG(c, d, a, b, x[k + 3], S23, 0xF4D50D87);
        b = GG(b, c, d, a, x[k + 8], S24, 0x455A14ED);
        a = GG(a, b, c, d, x[k + 13], S21, 0xA9E3E905);
        d = GG(d, a, b, c, x[k + 2], S22, 0xFCEFA3F8);
        c = GG(c, d, a, b, x[k + 7], S23, 0x676F02D9);
        b = GG(b, c, d, a, x[k + 12], S24, 0x8D2A4C8A);
        a = HH(a, b, c, d, x[k + 5], S31, 0xFFFA3942);
        d = HH(d, a, b, c, x[k + 8], S32, 0x8771F681);
        c = HH(c, d, a, b, x[k + 11], S33, 0x6D9D6122);
        b = HH(b, c, d, a, x[k + 14], S34, 0xFDE5380C);
        a = HH(a, b, c, d, x[k + 1], S31, 0xA4BEEA44);
        d = HH(d, a, b, c, x[k + 4], S32, 0x4BDECFA9);
        c = HH(c, d, a, b, x[k + 7], S33, 0xF6BB4B60);
        b = HH(b, c, d, a, x[k + 10], S34, 0xBEBFBC70);
        a = HH(a, b, c, d, x[k + 13], S31, 0x289B7EC6);
        d = HH(d, a, b, c, x[k + 0], S32, 0xEAA127FA);
        c = HH(c, d, a, b, x[k + 3], S33, 0xD4EF3085);
        b = HH(b, c, d, a, x[k + 6], S34, 0x4881D05);
        a = HH(a, b, c, d, x[k + 9], S31, 0xD9D4D039);
        d = HH(d, a, b, c, x[k + 12], S32, 0xE6DB99E5);
        c = HH(c, d, a, b, x[k + 15], S33, 0x1FA27CF8);
        b = HH(b, c, d, a, x[k + 2], S34, 0xC4AC5665);
        a = II(a, b, c, d, x[k + 0], S41, 0xF4292244);
        d = II(d, a, b, c, x[k + 7], S42, 0x432AFF97);
        c = II(c, d, a, b, x[k + 14], S43, 0xAB9423A7);
        b = II(b, c, d, a, x[k + 5], S44, 0xFC93A039);
        a = II(a, b, c, d, x[k + 12], S41, 0x655B59C3);
        d = II(d, a, b, c, x[k + 3], S42, 0x8F0CCC92);
        c = II(c, d, a, b, x[k + 10], S43, 0xFFEFF47D);
        b = II(b, c, d, a, x[k + 1], S44, 0x85845DD1);
        a = II(a, b, c, d, x[k + 8], S41, 0x6FA87E4F);
        d = II(d, a, b, c, x[k + 15], S42, 0xFE2CE6E0);
        c = II(c, d, a, b, x[k + 6], S43, 0xA3014314);
        b = II(b, c, d, a, x[k + 13], S44, 0x4E0811A1);
        a = II(a, b, c, d, x[k + 4], S41, 0xF7537E82);
        d = II(d, a, b, c, x[k + 11], S42, 0xBD3AF235);
        c = II(c, d, a, b, x[k + 2], S43, 0x2AD7D2BB);
        b = II(b, c, d, a, x[k + 9], S44, 0xEB86D391);
        a = AddUnsigned(a, AA);
        b = AddUnsigned(b, BB);
        c = AddUnsigned(c, CC);
        d = AddUnsigned(d, DD);
    }

    var temp = WordToHex(a) + WordToHex(b) + WordToHex(c) + WordToHex(d);

    return temp.toLowerCase();
}