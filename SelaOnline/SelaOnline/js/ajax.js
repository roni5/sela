/***************************************************************
*
* Name         : Hash class
* Desciption   :
* Author       : Gia Tran Hoang
* Created on   : 
* 
* ************************************************************/
function Hash()
{
    var _lastUrl='';
    var _prefix='#!';

    this.getUrlRequest = function(urlHTTP)
    {    
        
        var param   = urlHTTP.split(_prefix);
       
        urlHTTP     = '?'+param[1];//urlHTTP.replace(urlHTTP[0],"?");
        return urlHTTP;      
    }
    this.getParameter=function( param ){
        param = param.replace(/[[]/,"\\\[").replace(/[]]/,"\\\]");
        var r1 = "[\\?&]"+param+"=([^&#]*)";
        var r2 = new RegExp( r1 );
        var r3 = r2.exec( window.location.href );
        if( r3 == null ) return "";
        else return r3[1];
    } 
    this.changeUrl=function(hashUrl)
    {
        //luu hash history khi lick
        hashObj.saveHashHistory(hashUrl);//hash.js
        //thay doi url hash
        //alert(_prefix);
        hashLink=window.location.href.split(_prefix);
        window.location.href=hashLink[0]+hashUrl;
        
    }
    this.saveHashHistory=function(hashData)
    {
        if ( $.browser.msie)
        {
            $.history({'hashData':hashData});
            return true;            
        }
        else
            return false;
    }
    //truyen vao tham so la handle cua ham thay doi url tren thanh diachi address
    this.loadHashHistory=function()
    {
        ///////////////load history IE browser
        if ( $.browser.msie )
        {
            $.history.callback = function ( reinstate, cursor ) 
            { 
                if (typeof(reinstate) == 'undefined')
                    hashObj.changeUrl('');
                else
                {                
                    if(typeof(reinstate.hashData)=='undefined')
                    {                
                        hashObj.changeUrl('');
                    }
                    else
                    {
                        hashObj.changeUrl(reinstate.hashData);
                    }
                }
            }
         }
         ///////////////load history IE browser
    }
}
var hashObj = new Hash();


/**
 * jCache - A client cache plugin for jQuery
 * Should come in handy when data needs to be cached in client to improve performance.
 * Author: 	Phan Van An 
 *			phoenixheart@gmail.com
 *			http://www.skidvn.com
 * License : Read jQuery's license

Usage:
    1. 	Include this plugin into your web document after jQuery:
    	<script type="text/javascript" src="js/jquery.jcache.js"></script>
    2.	[OPTIONAL] Set the max cached item number, for example 20
    	$.jCache.maxSize = 20; 
    3. 	Start playing around with it:
    	- Put an item into cache: $.jCache.setItem(theKey, the Value);
    	- Retrieve an item from cache: var theValue = $.jCache.getItem(theKey);
    	- ...
 */
(function (jQuery){
	this.version = '(beta)(0.0.1)';
	
	/**
	 * The maximum items this cache should hold. 
	 * If the cache is going to be overload, oldest item will be deleted (FIFO).
	 * Since the cached object is retained inside browser's state, 
	 * a too big value on a too big web apps may affect system memory.
	 * Default is 10.
	 */
	this.maxSize = 100;
	
    /**
     * An array to keep track of the cache keys
     */
	this.keys = new Array();
	
	/**
	 * Number of currently cached items
	 */
	this.cache_length = 0;
	
	/**
	 * An associated array to contain the cached items
	 */
	this.items = new Array();
	
	/*
	 * @desc	Puts an item into the cache
	 *
	 * @param	string Key of the item
	 * @param 	string Value of the item
	 * @return	string Value of the item
	 */
	this.setItem = function(pKey, pValue)
	{
		if (typeof(pValue) != 'undefined') 
		{
			if (typeof(this.items[pKey]) == 'undefined') 
			{
				this.cache_length++;
			}

			this.keys.push(pKey);
			this.items[pKey] = pValue;
			
			if (this.cache_length > this.maxSize)
			{
				this.removeOldestItem();
			}
		}
	   
		return pValue;
	}
	
	/*
	 * @desc	Removes an item from the cache using its key
	 * @param 	string Key of the item
	 */
	this.removeItem = function(pKey)
	{
		var tmp;
		if (typeof(this.items[pKey]) != 'undefined') 
		{
			this.cache_length--;
			var tmp = this.items[pKey];
			delete this.items[pKey];
		}
	   
		return tmp;
	}

	/*
	 * @desc 	Retrieves an item from the cache by its key
	 *
	 * @param 	string Key of the item
	 * @return	string Value of the item
	 */
	this.getItem = function(pKey) 
	{
		return this.items[pKey];
	}

	/*
	 * @desc	Indicates if the cache has an item specified by its key
	 * @param 	string Key of the item
	 * @return 	boolean TRUE or FALSE
	 */
	this.hasItem = function(pKey)
	{
		return typeof(this.items[pKey]) != 'undefined';
	}
	
	/**
	 * @desc	Removes the oldest cached item from the cache
	 */
	this.removeOldestItem = function()
	{
		this.removeItem(this.keys.shift());
	}
	
	/**
	 * @desc	Clears the cache
	 * @return	Number of items cleared
	 */
	this.clear = function()
	{
		var tmp = this.cache_length;
		this.keys = new Array();
		this.cache_length = 0;
		this.items = new Array();
		return tmp;
	}
	
	jQuery.jCache = this;
	return jQuery;
})(jQuery);

/*
**  jhistory 0.6 - jQuery plugin allowing simple non-intrusive browser history
**  author: Jim Palmer; released under MIT license
**    collage of ideas from Taku Sano, Mikage Sawatari, david bloom and Klaus Hartl
**  CONFIG -- place in your document.ready function two possible config settings:
**    $.history._cache = 'cache.html'; // REQUIRED - location to your cache response handler (static flat files prefered)
**    $.history.stack = {<old object>}; // OPTIONAL - prefill this with previously saved history stack (i.e. saved with session)
*/
(function($) {
	// core history plugin functionality - handles singleton instantiation and history observer interval
	$.history = function ( store ) {
		// init the stack if not supplied
		if (!$.history.stack) $.history.stack = {};
		// avoid new history entries when in the middle of a callback handler
		if ($.history._locked) return false;
		// set the current unix timestamp for our history
		$.history.cursor = (new Date()).getTime().toString();
		// insert copy into the stack with current cursor
		$.history.stack[ $.history.cursor ] = $.extend( true, {}, store );
		// force the new hash we're about to write into the IE6/7 history stack
		if ( $.browser.msie )
			$('.__historyFrame')[0].contentWindow.document.open().close();
		// write the fragment id to the hash history - webkit required full href reset - ie/ff work with simple hash manipulation
		if ( $.browser.safari )
			$('.__historyFrame').contents()[0].location.href = $('.__historyFrame').contents()[0].location.href.split('?')[0] +
				'?' + $.history.cursor + '#' + $.history.cursor;
		else
			$('.__historyFrame').contents()[0].location.hash = '#' + $.history.cursor;
	}
	// initialize jhistory - the iframe controller and setinterval'd listener (pseudo observer)
	$.history.init = function () {
		// create the hidden iframe if not on the root window.document.body on-demand
		/*TODO: FIX UNDEFINE TREN IE
		$("body").append('<iframe class="__historyFrame" src="' + $.history._cache +
			'" style="border:0px; width:0px; height:0px; visibility:hidden;display:none;" ></iframe>');
		*/
		$("body").append('<iframe class="__historyFrame" src="#" style="border:0px; width:0px; height:0px; visibility:hidden;display:none;" ></iframe>');
		// setup interval function to check for changes in "history" via iframe hash and call appropriate callback function to handle it
		$.history.intervalId = $.history.intervalId || window.setInterval(function () {
				// fetch current cursor from the iframe document.URL or document.location depending on browser support
				var cursor = $(".__historyFrame").contents().attr( $.browser.msie ? 'URL' : 'location' ).toString().split('#')[1];
				// display debugging information if block id exists
				$('#__historyDebug').html('"' + $.history.cursor + '" vs "' + cursor + '" - ' + (new Date()).toString());
				// if cursors are different (forw/back hit) then reinstate data only when iframe is done loading
				if ( parseFloat($.history.cursor) >= 0 && parseFloat($.history.cursor) != ( parseFloat(cursor) || 0 ) ) {
					// set the history cursor to the current cursor
					$.history.cursor = parseFloat(cursor) || 0;
					// reinstate the current cursor data through the callback
					if ( typeof($.history.callback) == 'function' ) {
						// prevent the callback from re-inserting same history element
						$.history._locked = true;
						$.history.callback( $.history.stack[ cursor ], cursor );
						$.history._locked = false;
					}
				}
			}, 150);
	}
	$($.history.init);
})(jQuery);
/***************************************************************
*
* Name         : Ajax class
* Desciption   :
* Author       : Canh Chan
* Created on   : 
* 
* ************************************************************/

/*
* Function: 
* Description: 
* Author: Canh Chan
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