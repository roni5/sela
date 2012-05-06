/***************************************************************

*

* Name         : Core class

* Desciption   :

* Author       :
* Created on   : 

* 

* ************************************************************/
var CLASS_INPUT_INVALID = "input-text-invalid";

function global_core() {

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

    this.trim = trim;
    function trim(str) {

        if (str == null)

            return "";

        return str.replace(/^\s*|\s*$/g, "");

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

    // Disable/Enable one control
    this.disableControl = disableControl;
    function disableControl(idControl, isDisable) {
        //@ThanhViet edited [20101223]
        if (getObject(idControl)) {

            if (isDisable) {
                getObject(idControl)[0].style.cursor = "default";
                getObject(idControl)[0].disabled = isDisable;
            }

            else {
                getObject(idControl)[0].style.cursor = "pointer";
                setTimeout(function() {
                    getObject(idControl)[0].disabled = isDisable;
                }, 200);
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
        var xmlDoc;
        //debugger;
        if (window.DOMParser) {
            parser = new DOMParser();
            // TODO: TinhDoan edited [20100522] - can phai xem lai cho nay

            // DoNguyen editted [20100522] - Anh trim() no truoc khi dung cho chac an (vi khong biet co phai luon luon du 2 ky tu khong)

            // Anh cung chua biet nguyen nhan vi sao du 2 ky tu nay, anh nghi la do header, nhung anh doi roi van khong an thua gi
            var text_temp = trim(text); //.substr(2);
            xmlDoc = parser.parseFromString(text_temp, "text/xml");

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
        window.location.href=url;
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
}

core = new global_core();

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