
function global_core() {

    var p;
    this.changePage = changePage;
    function changePage(strPage, action, intPage) {
        var strRequest = "?isAJ=1&act=" + action + "&p=" + intPage + '&uptime=' + core.getMilliseconds();
        var ajax = new Ajax();
        p = intPage;
        ajax.SendRequestToServerWithCustomMsgCache(strPage + strRequest, null, changePage_OnCallBack, true, MSG_AJAX_SENDING_VN);
    }

    function changePage_OnCallBack(xmlHTTPRequest) {

        if (xmlHTTPRequest.readyState == 4) {
            if (xmlHTTPRequest.status == 200) {
                var strRespond = core.parserXML(xmlHTTPRequest.responseText);

                if (!core.headerProcessingArr(strRespond[0], Array(true, false, false))) {
                    //show fail
                    popDiv.alert(MSG_RES_OPERATION_FAIL, SYSTEM_TITLE_ERROR, 1);
                    return;
                }
                if (parseInt(strRespond[1]["rs"]) == 1) {
                    showInfoBar('success', "Thao tác thành công.");
                    // alert(strRespond[1]["inf"]);
                    core.getObject('list-content').html(strRespond[1]["inf"]);
                    core.getObject("txtPage")[0].value = p;
                }
            }
        }
    }
    this.ValidateInputTextBox = ValidateInputTextBox;
    function ValidateInputTextBox(controlId, msg, isFocus) {
        if ($.trim(msg) != "") {
            $("#" + controlId).addClass(CLASS_INPUT_INVALID);
            if (isFocus) focusControl(controlId);
            $("#" + controlId).attr("title", msg);
            $("#" + controlId).tooltip();
        }
        else {
            $("#" + controlId).removeClass(CLASS_INPUT_INVALID);
            $("#" + controlId).attr("title", msg);
            $("#" + controlId).tooltip();
        }
    }

    this.ValidateDateTime = ValidateDateTime;
    function ValidateDateTime(input) {
        return true;
    }
    
    this.focusControl = focusControl;
    function focusControl(controlID) {
        try {
            if (typeof ($("#" + controlID)) != "undefined") {
                $("#" + controlID).focus();
                var type = $("#" + controlID).attr("type");
                type = type.toLowerCase();
                var tagName = $("#" + controlID)[0].tagName;
                tagName = tagName.toLowerCase();
                if (type == 'text' || type == 'textbox' || type == 'password' || type == '' || tagName == 'textarea') {
                    $("#" + controlID).select();
                }
            }
        } catch (e) {

        }
    }
    /*
    * Function: getObject(strObjectName)
    * Description: get obeject in document by id    
    */
    this.getObject = getObject;
    function getObject(strObjectID) {
        //Tránh những ID có ký tự đặc biệt
        return $('[id="' + strObjectID + '"]');
    }
    /*
    * Function: getObjectAny(strObject)
    * Description: get obeject in document by any. 
    * Author: Thanh Viet [20110421]
    */
    this.getObjectAny = getObjectAny;
    function getObjectAny(strObject) {
        return $(strObject);
    }

    this.getObjectByName = getObjectByName;
    function getObjectByName(strObjectName) {
        return document.getElementsByName(strObjectName);
    }
    /*

    * Function: getObjectID(obj)
    * Description: get id from object
    */
    this.getObjectID = getObjectID;
    function getObjectID(obj) {
        return obj.id;
    }

    /*
    * Function: getObjectValue(obj)
    * Description: get value of Object
    */
    this.getObjectValue = getObjectValue;
    function getObjectValue(strObjectID) {
        var obj = core.getObject(strObjectID);
        if (obj != null) {
            return obj.value;
        }
        return "";
    }

    /*
    * Function: trim(str)
    * Description: Removes leading and ending more than one whitespaces
    */
    this.trim = trim;
    function trim(str) {
        if (str == null || typeof (str) == 'undefined')
            return "";
        str = core.stripHTML(str);
        return str.replace(/^[\s]+/, '').replace(/[\s]+$/, '').replace(/[\s]{2,}/, ' ');
    }

    /*
    * Function: trimAll(str)
    * Description: removes all space
    */
    this.trimAll = trimAll;
    function trimAll(str) {
        return str.replace(/^[\s]+/, '').replace(/[\s]+$/, '').replace(/[\s]{1,}/, '');
    }

    this.showHide = showHide;
    function showHide(obj, isVisiblity) {
        try {
            obj = document.getElementById(obj);
            //
            if (obj) {
                if (isVisiblity)
                    obj.style.display = "block";
                else
                    obj.style.display = "none";
            }
        }
        catch (e) {
            //alert("Error function showHide: Object not found: " + e);
        }
    }

    this.showHideObject = showHideObject;
    function showHideObject(obj, isVisiblity) {
        try {
            obj = document.getElementById(obj);
            //
            if (obj) {
                if (isVisiblity)
                    obj.style.visibility = "visible";
                else
                    obj.style.visibility = "hidden";
            }
        }
        catch (e) {
            //alert("Error function showHide: Object not found: " + e);
        }
    }

    this.isInteger = isInteger;
    function isInteger(value) {
        return Math.ceil(value) == Math.floor(value);
    }

    this.getInsideWindowHeight = getInsideWindowHeight;
    function getInsideWindowHeight() {
        var intHeight = 0;
        if (typeof (window.innerWidth) == 'number') {
            intHeight = window.innerHeight;
        }
        else if (document.documentElement && (document.documentElement.clientWidth || document.documentElement.clientHeight)) {
            intHeight = document.documentElement.clientHeight;
        }
        else if (document.body && (document.body.clientWidth || document.body.clientHeight)) {
            intHeight = document.body.clientHeight;
        }
        return intHeight;
    }
    this.getInsideWindowWidth = getInsideWindowWidth;
    function getInsideWindowWidth() {

        var intWidth = 0;
        if (window.innerWidth) {
            intWidth = window.innerWidth;
        }
        else if (document.body && document.body.clientWidth) {
            intWidth = document.body.clientWidth;
        }
        else {
            intWidth = document.body.parentElement.clientWidth;
        }
        return intWidth;
    }

    // Retrieve the rendered height of an element
    this.getObjectHeight = getObjectHeight;
    function getObjectHeight(obj) {
        var elem = (typeof obj == 'string') ? document.getElementById(obj) : obj;
        var result = 0;
        if (elem.offsetHeight) {
            result = elem.offsetHeight;
        } else if (elem.clip && elem.clip.height) {
            result = elem.clip.height;
        } else if (elem.style && elem.style.pixelHeight) {
            result = elem.style.pixelHeight;
        } else if (elem.style && elem.style.height) {
            result = elem.style.height;
        }
        return parseInt(result);
    }

    // Set the height for an element
    this.setObjectHeight = setObjectHeight;
    function setObjectHeight(obj, heightValue) {
        var elem = document.getElementById(obj);
        var valuePX = heightValue + "px";
        if (elem.style) {
            elem.style.height = valuePX;
        } else if (elem.clip) {
            elem.clip.height = valuePX;
        } else if (elem.style) {
            elem.style.pixelHeight = valuePX;
        }
    }

    // Retrieve the rendered width of an element
    this.getObjectWidth = getObjectWidth;
    function getObjectWidth(obj) {
        var elem = (typeof obj == 'string') ? document.getElementById(obj) : obj;
        var result = 0;
        if (elem.offsetWidth) {
            result = elem.offsetWidth;
        } else if (elem.clip && elem.clip.width) {
            result = elem.clip.width;
        } else if (elem.style && elem.style.pixelWidth) {
            result = elem.style.pixelWidth;
        } else if (elem.style && elem.style.width) {
            result = elem.style.width;
        }
        return parseInt(result);
    }

    // Set the width for an element
    this.setObjectWidth = setObjectWidth;
    function setObjectWidth(obj, widthValue) {
        var elem = document.getElementById(obj);
        var valuePX = widthValue + "px";
        if (elem.style) {
            elem.style.width = valuePX;
        } else if (elem.clip) {
            elem.clip.width = valuePX;
        } else if (elem.style) {
            elem.style.pixelWidth = valuePX;
        }
    }

    this.getObjectScrollHieght = getObjectScrollHieght;
    function getObjectScrollHieght(obj) {
        var elem = document.getElementById(obj);
        return elem.scrollHeight;
    }

    this.moveTo = moveTo;
    function moveTo(strObjectID, intX, intY) {
        var obj = getObject(strObjectID);
        if (obj != null) {
            obj.style.top = intY + "px";
            obj.style.left = intX + "px";
        }
    }

    this.centerOnWindow = centerOnWindow;
    function centerOnWindow(strObjectID) {
        moveTo(strObjectID, (getInsideWindowWidth() - getObjectWidth(strObjectID)) / 2,
            (getInsideWindowHeight() - getObjectHeight(strObjectID)) / 2);
    }

    this.findPos = findPos;
    function findPos(obj) {
        var curleft = curtop = 0;
        if (obj.offsetParent) {
            curleft = obj.offsetLeft
            curtop = obj.offsetTop
            while (obj = obj.offsetParent) {
                curleft += obj.offsetLeft;
                curtop += obj.offsetTop;
            }
        }
        return [curleft, curtop];
    }

    this.scrollLeft = scrollLeft;
    function scrollLeft() {
        return this.filterResults(
		    window.pageXOffset ? window.pageXOffset : 0,
		    document.documentElement ? document.documentElement.scrollLeft : 0,
		    document.body ? document.body.scrollLeft : 0
	    );
    }

    this.scrollTop = scrollTop;
    function scrollTop() {
        return this.filterResults(
		    window.pageYOffset ? window.pageYOffset : 0,
		    document.documentElement ? document.documentElement.scrollTop : 0,
		    document.body ? document.body.scrollTop : 0
	    );
    }

    this.filterResults = filterResults;
    function filterResults(n_win, n_docel, n_body) {
        var n_result = n_win ? n_win : 0;
        if (n_docel && (!n_result || (n_result > n_docel)))
            n_result = n_docel;
        return n_body && (!n_result || (n_result > n_body)) ? n_body : n_result;
    }

    //get scroll value, position of scroll
    this.getScroll = getScroll;
    function getScroll() {
        // window scroll factors
        var scrollX = 0, scrollY = 0;
        if (document.body && typeof document.body.scrollTop != "undefined") {
            scrollX += document.body.scrollLeft;
            scrollY += document.body.scrollTop;
            if (document.body.parentNode &&
	            typeof document.body.parentNode.scrollTop != "undefined") {
                scrollX += document.body.parentNode.scrollLeft;
                scrollY += document.body.parentNode.scrollTop;
            }
        } else if (typeof window.pageXOffset != "undefined") {
            scrollX += window.pageXOffset;
            scrollY += window.pageYOffset;
        }
        //
        return { x: scrollX, y: scrollY };
    }

    /***************************************************
    *
    * Validate function
    *
    ***************************************************/
    this.isValidTextBoxValue = isValidTextBoxValue;
    function isValidTextBoxValue(strID, strMessage) {
        var objTextBox = getObject(strID);

        if (objTextBox != null) {
            if (trimAll(objTextBox.value).length == 0) {
                //alert(strMessage);
                return false;
            }
        }
        return true;
    }

    this.isValidEmail = isValidEmail;
    function isValidEmail(strEmail) {
        var validchars = "abcdefghijklmnopqrstuvwxyz0123456789@.-_";
        //
        if (strEmail == null) {
            return false;
        }
        if (strEmail.length == 0) {
            return false;
        }
        // check to make sure all characters are valid
        for (var i = 0; i < strEmail.length; i++) {
            var letter = strEmail.charAt(i).toLowerCase();
            if (validchars.indexOf(letter) != -1)
                continue;
            return false;
        }
        //
        if (strEmail.indexOf("@") < 1) { //  must contain @, and it must not be the first character
            return false;
        } else if (strEmail.lastIndexOf(".") <= strEmail.indexOf("@")) {  // last dot must be after the @
            return false;
        } else if (strEmail.indexOf("@") == strEmail.length) {  // @ must not be the last character
            return false;
        } else if (strEmail.indexOf("..") >= 0) { // two periods in a row is not valid
            return false;
        } else if (strEmail.indexOf(".") == strEmail.length) {  // . must not be the last character
            return false;
        } else if (strEmail.indexOf(".") == strEmail.indexOf("@") - 1) {  // . must not be the last character
            return false;
        }
        return true;
    }

    this.isValidDate = isValidDate;
    function isValidDate(day, month, year) {

        if (day < 1 || month < 1 || year < 1)
            return false;
        var DateVal = month + "/" + day + "/" + year;
        var now = new Date();
        var flagDate = new Date(DateVal);
        if (year != flagDate.getFullYear() || month != (flagDate.getMonth() + 1) || day != flagDate.getDate() || flagDate > now) {
            return false;
        }
        return true;
    }

    this.isValidDateAny = isValidDateAny;
    function isValidDateAny(day, month, year) {
        if (day < 1 || month < 1 || year < 1)
            return false;
        var DateVal = month + "/" + day + "/" + year;
        var now = new Date();
        var flagDate = new Date(DateVal);
        if (year != flagDate.getFullYear() || month != (flagDate.getMonth() + 1) || day != flagDate.getDate()) {
            return false;
        }
        return true;
    }

    this.isNumeric = isNumeric;
    function isNumeric(sText) {
        var ValidChars = "0123456789.";
        var IsNumber = true;
        var Char;
        for (i = 0; i < sText.length && IsNumber == true; i++) {
            Char = sText.charAt(i);
            if (ValidChars.indexOf(Char) == -1) {
                IsNumber = false;
            }
        }
        return IsNumber;
    }

    this.getAbsoluteY = getAbsoluteY;
    function getAbsoluteY(oElement) {
        var iReturnValue = 0;
        while (oElement != null) {
            iReturnValue += oElement.offsetTop;
            oElement = oElement.offsetParent;
        }

        return iReturnValue;
    }

    this.getParentObject = getParentObject;
    function getParentObject(strObject) {
        return window.opener.document.getElementById(strObject);
    }

    //get element from Parent Window
    this.getParentObjectToFrame = getParentObjectToFrame;
    function getParentObjectToFrame(strObjectID) {
        var myFrame = window.parent.document
        return $('[id="' + strObjectID + '"]', window.parent.document);
    }

    //get element from iframe
    this.getParentIFrameObject = getParentIFrameObject;
    function getParentIFrameObject(strFrameID, strObjectID) {
        //var myFrame = window.frames[strFrameID];

        //        if (typeof (myFrame) == 'undefined' && !myFrame.document) {
        //            myFrame.contentDocument = myFrame.contentWindow.document;
        //        }
        //return $('[id="' + strObjectID + '"]', myFrame.document);
        return top.$('#' + strFrameID).contents().find('#' + strObjectID.replace('~', '\\~'));
    }

    this.getCurrentPath = getCurrentPath;
    function getCurrentPath(strString) {
        for (var i = strString.length; i >= 1; i--) {
            if (strString.substr(i - 1, 1) == "/") {
                return strString.substr(0, i);
            }
        }
    }

    this.getMilliseconds = getMilliseconds;
    function getMilliseconds() {
        return new Date().getTime();
    }

    this.addElementInput = addElementInput;
    function addElementInput(parentid, type) {
        //Create an input type dynamically.
        var element = document.createElement("input");

        //Assign different attributes to the element.
        element.setAttribute("type", type);
        element.setAttribute("value", type);
        element.setAttribute("name", type);

        var foo = getObject(parentid);

        //Append the element in page (in span).
        foo.append(element);
    }

    this.addElementComboBox = addElementComboBox;
    function addElementComboBox(parentid) {
        //Create an input type dynamically.
        var element = document.createElement("select");
        element.setAttribute("name", "property");
        //Assign different attributes to the element.
        var foo = getObject(parentid);

        //Append the element in page (in span).
        foo.append(element);
    }

    this.createElementInput = createElementInput;
    function createElementInput(type) {
        //Create an input type dynamically.
        var element = document.createElement("input");

        //Assign different attributes to the element.
        element.setAttribute("type", type);
        //element.setAttribute("value", type);
        //element.setAttribute("name", type);


        return element;
    }

    /*Tạo element select option*/
    this.createElementComboBox = createElementComboBox;
    function createElementComboBox() {
        //Create an input type dynamically.
        var element = document.createElement("select");
        //element.setAttribute("name", "property");
        return element;
    }
    /*Tạo element text area*/
    this.createElementArea = createElementArea;
    function createElementArea() {
        //Create an input type dynamically.
        var element = document.createElement("textarea");

        return element;
    }

    this.disableLink = disableLink;
    function disableLink(idControl, isDisable, strFunc) {
        //@ThanhViet edited [20101223]
        if (getObject(idControl)) {

            if (isDisable) {
                getObject(idControl)[0].style.cursor = "default";
                getObject(idControl).removeAttr("href");
            }
            else {
                getObject(idControl)[0].style.cursor = "pointer";
                setTimeout(function() {
                    getObject(idControl).attr("href", strFunc);
                }, 2000);
            }
        }
    }

    this.disableLink = disableLink;
    function disableLink(idControl, isDisable, strFunc) {
        //@ThanhViet edited [20101223]
        if (getObject(idControl)) {

            if (isDisable) {
                getObject(idControl)[0].style.cursor = "default";
                getObject(idControl).removeAttr("href");
            }
            else {
                getObject(idControl)[0].style.cursor = "pointer";
                setTimeout(function() {
                    getObject(idControl).attr("href", strFunc);
                }, 2000);
            }
        }
    }

    // encode to escape special character
    this.urlencode = urlencode;
    function urlencode(str) {
        if (document.all) {
            var resultTmp = encodeURI(str);
            // replace $&+,/:;=?@

            resultTmp = resultTmp.replace(/&/gi, '%26').replace(/#/gi, '%23').replace(/=/gi, '%3D').replace(/\?/gi, '%3F').replace(/\+/gi, '%2B');

            return resultTmp;
        }
        var hexStr = function(dec) {
            return '%' + dec.toString(16).toUpperCase();
        };
        var ret = '',
            unreserved = /[\w.-]/, // A-Za-z0-9_.- // Tilde is not here for historical reasons; to preserve it, use rawurlencode instead
            permitList = /[&=%?]/; ///[$&+,:;=?@]/;
        str = (str + '').toString();

        for (var i = 0, dl = str.length; i < dl; i++) {
            var ch = str.charAt(i);

            if (!permitList.test(ch)) {
                // Get /n or /r
                var code = str.charCodeAt(i);
                if (code == 13) {
                    ret += "%0D"; //ch;
                } else if (code == 10) {

                    ret += "%0A"; //ch;                
                }
                else if (code == 43) {
                    ret += "%2B"; //ch;            
                }
                else if (code == 35) {
                    ret += "%23"; //ch;      

                } else {
                    ret += ch;
                }
            }
            else {
                var code = str.charCodeAt(i);

                // Reserved assumed to be in UTF-8, as in PHP
                if (code === 32) {
                    ret += '+'; // %20 in rawurlencode
                }
                else if (code < 128) { // 1 byte
                    ret += hexStr(code);
                }
                else if (code >= 128 && code < 2048) { // 2 bytes
                    ret += hexStr((code >> 6) | 0xC0);

                    ret += hexStr((code & 0x3F) | 0x80);
                }
                else if (code >= 2048 && code < 65536) { // 3 bytes
                    ret += hexStr((code >> 12) | 0xE0);

                    ret += hexStr(((code >> 6) & 0x3F) | 0x80);

                    ret += hexStr((code & 0x3F) | 0x80);
                }
                else if (code >= 65536) { // 4 bytes

                    ret += hexStr((code >> 18) | 0xF0);

                    ret += hexStr(((code >> 12) & 0x3F) | 0x80);

                    ret += hexStr(((code >> 6) & 0x3F) | 0x80);

                    ret += hexStr((code & 0x3F) | 0x80);
                }
            }
        }
        return ret;
    }

    this.closePageSignal = closePageSignal;
    function closePageSignal() {

        var ajax = new Ajax();
    }

    this.reload = reload;
    function reload() {

        window.location.reload();
    }

    this.goHome = goHome;
    function goHome() {

        window.location = "index.php";
    }

    // check valid ip address
    this.validateIP = validateIP;
    function validateIP(strIP) {

        var arrResult = strIP.split('.');

        if (arrResult.length == 4) {

            for (var i = 0; i < arrResult.length; i++) {

                if (trim(arrResult[i]) == "" || arrResult[i].length > 3 || arrResult[i] > 255 || arrResult[i] < 0) {
                    return false;
                }
            }
            return true;
        }
        return false;
    }

    // convert pixel string to int
    this.pixelToInt = pixelToInt;
    function pixelToInt(strpx) {

        return strpx.substr(0, strpx.length - 2);
    }

    // check is valid date format
    this.isDateValue = isDateValue;
    function isDateValue(Str) {

        var V, DObj = NaN;

        V = Str.match(/^(\d{4})-(\d\d)-(\d\d)$/);

        if (V) {
            V = (DObj = new Date(V[1], --V[2], V[3])).getMonth() == V[2];
        }

        return [!!V];
    }

    this.parserXML = parserXML;
    function parserXML(text) {
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
    }

    this.checkNull = checkNull;
    function checkNull(varOject) {
        if (typeof (varOject) == 'undefined' && !varOject) {
            return true;
        }
        else {
            return false;
        }
    }

    this.adjustToCenterScreen = adjustToCenterScreen;
    function adjustToCenterScreen(objDiv, width, height) {

        var iWidthScreen, iHeightScreen, iWidthDiv, iHeightDiv, posX, posY;

        // Lay width, height man hinh
        iWidthScreen = getInsideWindowWidth();
        iHeightScreen = getInsideWindowHeight();

        // Lay width, height cua div    
        iWidthDiv = (existVariable(width) && width != null) ? width : getObjectWidth(objDiv);
        iHeightDiv = (existVariable(height) && height != null) ? height : getObjectHeight(objDiv);


        // Tinh toan toa do X,Y
        posX = Math.floor((iWidthScreen - iWidthDiv) / 2);
        posY = Math.floor((iHeightScreen - iHeightDiv) / 2);

        posX = posX <= 0 ? 0 : posX;
        posY = posY <= 0 ? 0 : posY;
        // Adjust to center
        moveTo(objDiv, posX, posY);

    }

    this.adjustToTopCenterScreen = adjustToTopCenterScreen;
    function adjustToTopCenterScreen(objDiv, width, height) {
        var iWidthScreen, iHeightScreen, iWidthDiv, iHeightDiv, posX, posY;

        // Lay width, height man hinh
        iWidthScreen = getInsideWindowWidth();
        iHeightScreen = getInsideWindowHeight();

        // Lay width, height cua div    
        iWidthDiv = (existVariable(width) && width != null) ? width : getObjectWidth(objDiv);
        iHeightDiv = (existVariable(height) && height != null) ? height : getObjectHeight(objDiv);

        // Tinh toan toa do X,Y
        posX = Math.floor((iWidthScreen - iWidthDiv) / 2);
        posY = Math.floor((iHeightScreen - iHeightDiv) * 1 / 5);
        posX = posX <= 0 ? 0 : posX;
        posY = posY <= 0 ? 0 : posY;
        // Adjust to center
        moveTo(objDiv, posX, posY);

    }

    /*
    * Xu ly thong tin trong header
    * 
    * @param array arrHeader mang cac gia tri tu server response ve
    * @param array arrCheckHeader mang cac gia tri bool cho biet check phan tu nao trong arrHeader, "true" check, "false" khong check
    * Return: true (good header), false (bad header).
    *
    */
    this.headerProcessingArr = headerProcessingArr;
    function headerProcessingArr(arrHeader, arrCheckHeader) {

        // Check for banValue

        if (arrCheckHeader[0]) {
            if (arrHeader["h1"] > 0) {
                window.location.href = 'antidos.php?txtAccess=' + arrHeader["h1"];
                return false;
            }
        }

        // Check for expireSesValue
        if (arrCheckHeader[1]) {
            if (arrHeader["h2"] == "1") {
                //sessionExpireProcessing();
                // Xu ly yeu cau nguoi dung login lai
                return false;
            }
        }

        // Check for spamFailValue
        if (arrCheckHeader[2]) {
            if (arrHeader["h3"] == "1") {
                //alert("xu ly spam fail");
                // Xu ly truong hop nay
                return false;
            }
        }
        return true;
    }

    // Get innerText of object
    this.getInnerText = getInnerText;
    function getInnerText(handleObject) {
        if (document.all)    // For IE
        {
            return handleObject.innerText;

        } else {// For Mozilla Family
            return handleObject.textContent;
        }
    }

    // public method for url encoding
    this.redirect = redirect;
    function redirect(url) {
        window.location.href = url;
    }
    /**
    *
    *  URL encode / decode
    *  http://www.webtoolkit.info/
    *
    **/
    // public method for url encoding
    this.encode = encode;
    function encode(string) {
        return escape(_utf8_encode(string));
    }

    // public method for url decoding
    this.decode = decode;
    function decode(string) {
        return _utf8_decode(unescape(string));
    }

    // private method for UTF-8 encoding
    this._utf8_encode = _utf8_encode;
    function _utf8_encode(string) {
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
    }

    // private method for UTF-8 decoding
    this._utf8_decode = _utf8_decode;
    function _utf8_decode(utftext) {
        var string = "";
        var i = 0;
        var c = c1 = c2 = 0;

        while (i < utftext.length) {

            c = utftext.charCodeAt(i);

            if (c < 128) {
                string += String.fromCharCode(c);
                i++;
            }
            else if ((c > 191) && (c < 224)) {
                c2 = utftext.charCodeAt(i + 1);
                string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
                i += 2;
            }
            else {
                c2 = utftext.charCodeAt(i + 1);
                c3 = utftext.charCodeAt(i + 2);
                string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
                i += 3;
            }
        }
        return string;
    }

    //checks if browser supports placeholders
    this.isSupportsPlaceholder = function() {
        var test = document.createElement('input');
        return 'placeholder' in test;
    },

    //activates placeholder on a field
    this.placeholder = function(el) {
        if (el.val() === '') {
            el.val(el.attr('placeholder'));
            el.attr('placedholder', (el.css('color') ? el.css('color') : ''));
            el.css('color', '#ccc');
        }
    },

    //this methods removes placeholder
    this.removePlaceholder = function(el) {
        if (el.attr('placedholder')) {
            el.val('');
            el.css('color', el.attr('placedholder'));
            el.removeAttr('placedholder');
        }
    },

    //this method has to be called when u submit a form in order to fix
    //fields to submit properly
    this.removePlaceholders = function() {
        if (!isSupportsPlaceholder()) {
            $("input[placeholder]").each(function() {
                removePlaceholder($(this));
            });
        }
    }

    this.JumpToControl = JumpToControl;
    function JumpToControl(controlID) {
        var new_position = $("#" + controlID).offset();
        window.scrollTo(new_position.left, new_position.top);
    }
    this.ScrollTop = function() {
        $('html, body').animate({ scrollTop: 0 }, 0);
    };
    this.JumpToURL = JumpToURL;
    function JumpToURL(urlVal) {
        window.location.href = urlVal;
    }

    this.PrintElementByID = function(controlID) {
        $('#' + controlID).jqprint();
    };

    this.CutLast = function(input, len) {
        if (input.length < len) {
            len = input.length;
        }
        return input.substring(0, input.length - len);
    };
    this.UpperFirstCharacter = function(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);

    };

    this.roundNumber = function(num, dec) {
        var result = Math.round(num * Math.pow(10, dec)) / Math.pow(10, dec);
        return result;
    };

    this.FocusFirstInputType = FocusFirstInputType;
    function FocusFirstInputType() {
        try {
            //set focus input first
            if (typeof ($("form :input[type='text']:enabled:first")[0]) != "undefined" && $("form :input[type='text']:enabled:first")[0] != null) {
                $("form :input[type='text']:enabled:first").focus();
                $("form :input[type='text']:enabled:first").select();
            }
            else {
                if (typeof ($("form :input[type='password']:enabled:first")[0]) != "undefined" && $("form :input[type='password']:enabled:first")[0] != null) {
                    $("form :input[type='password']:enabled:first").focus();
                }
                else {
                    $("input:enabled:first").focus();
                }
            }
        }
        catch (err) {

        }
    };

    var checked = true;
    this.ResetCheckAll = ResetCheckAll;
    function ResetCheckAll() {
        checked = true;
    };
    this.CheckAll = CheckAll;
    function CheckAll(name) {
        $('input[name=' + name + ']').attr('checked', checked);
        if (checked) checked = false; else checked = true;
    };

    this.CheckAllCheckBox = CheckAllCheckBox;
    function CheckAllCheckBox(controlID, name) {
        var check = IsChecked(controlID);
        if (typeof (check) == 'undefined') {
            check = false;
        }
        $('input[name=' + name + ']').attr('checked', check);
    };

    this.IsChecked = IsChecked;
    function IsChecked(controlID) {
        return $("#" + controlID).is(':checked');
    }

    this.CheckRadio = CheckRadio;
    function CheckRadio(controlID, checked) {
        if (typeof (checked) == 'undefined') {
            checked = true;
        }
        $('#' + controlID).attr("checked", checked);
    }

    this.stripHTML = function(input) {
        return input.replace(/(<([^>]+)>)/ig, "");
    }
}
