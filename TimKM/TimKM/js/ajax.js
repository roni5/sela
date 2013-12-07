
/***************************************************************
*
* Name         : Ajax class
* Desciption   :
* Author       :
* Created on   : 
* 
* ************************************************************/

/*
* Function: 
* Description: 
* Author: 
*/

// TIMEOUT AJAX CALLBACK

var REQUEST_TIMEOUT = 30000;

var MSG_TIMEOUT = "Không thể kết nối đến server. Vui lòng thử lại!";


var METHOD_GET = "GET";

// AJAX REQUEST MESSAGES

var MSG_AJAX_FETCHING = "Fetching Data...";

var MSG_AJAX_EXPORTING = "Exporting CSV...";

var MSG_AJAX_EDITING = "Editing...";

var MSG_AJAX_DELETING = "Deleting...";

var MSG_AJAX_ADDING = "Adding...";

var MSG_AJAX_CHECKING = "Checking...";

var MSG_AJAX_REBUILT = "Rebuilting...";

var MSG_AJAX_FETCHING_VN = "Đang xử lý...";

var MSG_AJAX_SENDING_VN = "Đang xử lý...";

var MSG_AJAX_PROCESSING = "Processing...";

 var _objAjaxActionTimeOut;
 var _objExceptTimeOut=false; // except timer for specify function
 var _timeToRemindSessionAlive = 1200000; // 20 minutes
 var _handleRemindSessionAlive = null;
 
function Ajax(method)
{
    var _strAjaxFunctionCallBack 			= "";
    var _method                            = method?method:"POST";
    var _objAjaxTimeOutID = null;
    var _objScollPoll = null;
    var _intMaxSecondWaitingServerResponse	= 10;
    var _objTimeOutLoadingID               = null;
    var _strDivLoadingID                    = "divLoading";
    var _strDivLoadingInsideID              = "divLoading_inside";
    var _strDefaultMsg                      = "Loading... Please wait";
    var _strCustomeMsg                      = "";
    var _strFuncTimeout=null;
    var _xmlHTTPRequest;

    // TODO: TinhDoan edited [20100708]
    var _flagQueue          = false;
    var _queueRequest       = new Array();
    // TODO: GiaTran edited [20110407]
    var _timeClearCache     = 5;     //sau 5 phut nó se xoa cache
/*
* Function: 
* Description: 
* Author: Canh Chan
*/
    this.GetXMLHTTPRequest = function()
    {
	     var request = false;
	     try
	      {
		     request = new XMLHttpRequest(); /* e.g. Firefox */
	       }
	     catch(err1)
	       {
	       try
		     {
		     request = new ActiveXObject("Msxml2.XMLHTTP");/* some versions IE */
		     }
	       catch(err2)
		     {
		     try
		      {
		       request = new ActiveXObject("Microsoft.XMLHTTP");/* some versions IE */
		       }
		       catch(err3)
			     {
			     request = false;
			     }
		     }
	       }
	     return request;
    }
 
/*
* Function: 
* Description: 
* Author: Canh Chan
*/
    this.SendRequestToServer = function(strURL, strSendValues, strFuncCallBack, blnAsync, flagCache) {//them bien cache vao cuoi

        if (strURL.length == 0) {
            return;
        }

        //set function callback
        _strAjaxFunctionCallBack = strFuncCallBack;


        //get xmlHTTPRequest
        xmlHTTPRequest = this.GetXMLHTTPRequest();



        //fill parameters then send to server
        xmlHTTPRequest.open(_method, strURL, blnAsync);

        // Set timeout function


        // Set call back function
        xmlHTTPRequest.onreadystatechange = this.CallBackFromServer;
        _objAjaxActionTimeOut = window.setInterval(this.timeoutFired, REQUEST_TIMEOUT);

        // Set header
        xmlHTTPRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        // Send
        xmlHTTPRequest.send(strSendValues);
        // Set default msg
        //    if (_strCustomeMsg.length == 0) {
        //        _strCustomeMsg = _strDefaultMsg;
        //    }

        // Show div loading
        // Cho nay khong duoc thay doi vi no quyet dinh cho hanh dong KEEP_SESSION_ALIVE duoc chay ngam (khong xuat hien thong bao "Dang xu ly...")
        if (_strCustomeMsg != null && _strCustomeMsg != "") {
            //nếu có popUp thì chuyển ra trang cha để hiện processing

            if (top.$('#popupDivIframe').html() != null) {
                //showHideLoading(true);
                top.showInfoBar("processing", _strCustomeMsg);
            }
            else {
                showInfoBar("processing", _strCustomeMsg);
            }
        }

        // Remind to send request to server to keep SESSION alive
        if (typeof (_keepSessionAlive) != "undefined" && _keepSessionAlive) {
            window.clearInterval(_handleRemindSessionAlive);
            _handleRemindSessionAlive = window.setInterval(keepSessionAlive, _timeToRemindSessionAlive);
        }

        // TODO: GiaTran edited [20110407]
        //luu cache la day

        if (flagCache) {
            var info = new Array();
            info['value'] = xmlHTTPRequest;
            var d = new Date();
            info['time'] = d.getTime();
            $.jCache.setItem(strURL, info);
        }
        /////////////////////////end 

        return xmlHTTPRequest;
    }	
 
/*
* Function: 
* Description: 
* Author: Thanh Dao
*/
    this.timeoutFired = function() {
        if (_objExceptTimeOut == true) {
            _objExceptTimeOut = false;
            window.clearInterval(_objAjaxActionTimeOut);
            return;
        }
        window.clearInterval(_objAjaxActionTimeOut);
        try { xmlHTTPRequest.abort(); }
        catch (e) { }
        _strCustomeMsg = "";
        showHideLoading(false);
        if (_strFuncTimeout != null) {
            _strFuncTimeout(xmlHTTPRequest);
        }
        else {
            var popDiv = new PopDiv();
            popDiv.init();
            popDiv.alert(MSG_TIMEOUT, SYSTEM_TITLE, 1);

            //dlgBox.showDialog(SYSTEM_TITLE, MSG_TIMEOUT, null, null, 2);
        }
    }
 
    this.SendRequestToServerWithCustomMsg = function(strURL, strSendValues, strFuncCallBack, blnAsync, strCustomMsg, strFuncTimeout, objExceptTimeOut, noCheck, flagCache)//them bien co cache
    {
        // thuc hien kiem tra va dua vao queue
        if (!noCheck && _flagQueue)
        {
            // thuc hien luu thong tin request lai
            var rq = new Array();
            _queueRequest.push({
                strURL: strURL, strSendValues: strSendValues, strFuncCallBack: strFuncCallBack, blnAsync: blnAsync,
                strCustomMsg: strCustomMsg, strFuncTimeout: strFuncTimeout, objExceptTimeOut: objExceptTimeOut
            });
            return;
        }
        _flagQueue = true;
        
        window.clearInterval(_objAjaxActionTimeOut);
        if (objExceptTimeOut==null)
        {
            _objExceptTimeOut = false;
        }
        else
        {
            _objExceptTimeOut = objExceptTimeOut;
        }    

        _strCustomeMsg = strCustomMsg;    
        _strFuncTimeout = strFuncTimeout;
        this.SendRequestToServer(strURL, strSendValues, strFuncCallBack, blnAsync,flagCache);
        }
    /*
    * Function: ham ajax cache 
    * Description: 
    * Author: GiaTran edited [20110407]
    */
    this.SendRequestToServerWithCustomMsgCache = function(strURL, strSendValues, strFuncCallBack, blnAsync, strCustomMsg, strFuncTimeout, objExceptTimeOut, noCheck)//chen them bien cacheFlag
    {
        var info=new Array();
        info = $.jCache.getItem(strURL);
        var flagProccess=0;    
        var flagtemp=0;    
        if(info != undefined)
        {   
            var d=new Date();
            if(info['time'] < (d.getTime()-_timeClearCache*1000*60))
            {
               //xem nhu chua co cache va load lai thong tin moi
                flagProccess=0;
                flagtemp=1;
                //alert('xoa cach va load lai tu server');
            }
            else
            { 
                //da co cache
                flagProccess=1;             
                flagtemp=2;
                //alert('load tu cache');
            }        
        }
        else
        {
            //chua co cache
            flagProccess=0;               
            flagtemp=3;
            //alert('load tu server');
        }
        
        //neu da co cache thi goi truc tiep ham callback lun
        if(flagProccess==1)
        {        
            strFuncCallBack(info['value']);
        }
        //neu chua co cache thi goi ham ajax nhu binh thuong va luu lai cache
        else
        {
            flagCache  = true;//bat bien nay len de luu cache
           
            //ajaxLoadData(urlRequest,callbackFunction,true);//bien true de luu cache
            ajax.SendRequestToServerWithCustomMsg(strURL, strSendValues, strFuncCallBack, blnAsync, strCustomMsg, strFuncTimeout, objExceptTimeOut, noCheck, flagCache);//them bien co cache vao
        }
    }
/*
* Function: 
* Description: 
* Author: Canh Chan
*/
    this.CallBackFromServer = function() {
        if (xmlHTTPRequest.readyState == 4) {
            if (xmlHTTPRequest.status == 200) {
                //clear timeout
                window.clearTimeout(_objAjaxActionTimeOut);
                
                //ThanhViet edited 20110629
                //Tránh tắt nhanh quá
                // Hide div loading
                //nếu có popUp thì chuyển ra trang cha 
                if (top.$('#popupDivIframe').html() != null) {
                    setTimeout(function() {
                        top.showHideLoading(false);
                    }, 1000);
                }
                else {
                     setTimeout(function() {
                        showHideLoading(false);
                    }, 1000);
                }



                //call callback function
                if (_strAjaxFunctionCallBack != null) {

                    _strAjaxFunctionCallBack(xmlHTTPRequest);

                }

                // kiem tra va goi thuc hien neu con
                if (_queueRequest.length != 0) {
                    var rq = _queueRequest.shift();
                    ajax.SendRequestToServerWithCustomMsg(rq.strURL, rq.strSendValues, rq.strFuncCallBack, rq.blnAsync,
		                                                rq.strCustomMsg, rq.strFuncTimeout, rq.objExceptTimeOut, true);
                }
                else {
                    // bat co tro lai binh thuong
                    _flagQueue = false;
                    // Clear custom msg
                    _strCustomeMsg = "";
                }
            }
        }
    }

    showHideLoading = function(isVisible) {
        var divLoading = null;

        //show over page and enable or disable all page component
        if (isVisible) {
/*            var oBody = document.getElementsByTagName("BODY").item(0);

            divLoading = core.getObject(_strDivLoadingID);

            //remove divLoading if existed
            if (divLoading != null) {
                core.getObject(_strDivLoadingInsideID).innerHTML = _strCustomeMsg;
            }else{
		        var newDivLoading = document.createElement('div');
    		    
		        newDivLoading.id = _strDivLoadingID;
		        newDivLoading.style.position = "absolute";
		        newDivLoading.style.display = "block";
		        newDivLoading.style.zIndex = 100;
		        newDivLoading.backgroundColor = "#FFEEAA";
		        newDivLoading.innerHTML = "<img src='../images/loading.gif'/>&nbsp;"+_strCustomeMsg;
		        // add div de parent 
		        oBody.appendChild(newDivLoading);
            }
            // Move to current position 
            moveLoadingDiv();        */
            
            // Show LOADING...

            showInfoBar("processing",_strCustomeMsg);
        }else {
            // Clear all time out id        
            window.clearTimeout(_objTimeOutLoadingID);
            window.clearTimeout(_objScollPoll);
            
            // Hide LOADING...
            hideInfoBar();
        }
     
        // Show, hide divLoading
        //core.showHide(_strDivLoadingID, isVisible);
    }

    moveLoadingDiv = function() {
        var scrollPos = core.getScroll();
	    //move divLoading
	    core.moveTo(_strDivLoadingID, core.getInsideWindowWidth()/2 + scrollPos.x - 100, 10 + scrollPos.y);

	    // Set time out
	    _objScollPoll = window.setTimeout("moveLoadingDiv()", 300);
    }
}
//khoi tao doi tuong ajax
var ajax = new Ajax();

// Keep session alive 
function keepSessionAlive()
{
    var ajax = new Ajax(METHOD_GET);
    ajax.SendRequestToServerWithCustomMsg("index.php?act=" + ACT_REFRESH_SESSION, null , null, true, null,null,true);
}
function removeCache(hashData)
{
    //lay url de remove cache
    var strURL = window.location.href;
    strURL = strURL.split('.php');
    strURL = strURL[0].split('/');
    requestPage=strURL[strURL.length-1];
    //xu ly request url
    //remove cache theo url                 
           
    $.jCache.removeItem(requestPage+'.php'+hashObj.getUrlRequest(hashData));
}
function removeAllCache()
{                       
    $.jCache.clear();
}