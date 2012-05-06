/*
 * This file was automatically generated By Code Smith 
 * Modifications will be overwritten when code smith is run
 *
 * PLEASE DO NOT MAKE MODIFICATIONS TO THIS FILE
 * Date Created 5/6/2012 9:03:27 PM
 *
 */



/// <summary>
/// Implementations of slproducts represent a Product
///
/// </summary>
function Product()
{		   
	//region PRESERVE ExtraMethods For Product
	//endregion
    //region Contants	
    var ACT_ADD = 10;
    var ACT_UPDATE = 11;
    var ACT_DELETE = 12;
    var ACT_CHANGE_PAGE = 13;
    var ACT_SHOW_EDIT = 14;
    var ACT_GET = 15;
    var _strPage = "admin_product.php";
    
   
    //endregion   
    
    //region Public Functions
    
    this.btnSave_OnClick = btnSave_OnClick;
    function btnSave_OnClick() {
        core.disableControl("btnOK", true);
        var isValid = true;

		var productID = core.trim(core.getObject("txtProductID").val());
		core.ValidateInputTextBox('txtProductID','');
		if(productID == ''){
			core.ValidateInputTextBox('txtProductID','ProductID is required', isValid);
			isValid =  false;
		}else if (productID.length > 20) {
			core.ValidateInputTextBox('txtProductID','ProductID must be less than 20', isValid);
			isValid =  false;
		}

		var productName = core.trim(core.getObject("txtProductName").val());
		core.ValidateInputTextBox('txtProductName','');
		if(productName == ''){
			core.ValidateInputTextBox('txtProductName','ProductName is required', isValid);
			isValid =  false;
		}else if (productName.length > 255) {
			core.ValidateInputTextBox('txtProductName','ProductName must be less than 255', isValid);
			isValid =  false;
		}

		var catalogueID = core.trim(core.getObject("txtCatalogueID").val());
		core.ValidateInputTextBox('txtCatalogueID','');
		if(catalogueID == ''){
			core.ValidateInputTextBox('txtCatalogueID','CatalogueID is required', isValid);
			isValid =  false;
		}else if (catalogueID.length > 20) {
			core.ValidateInputTextBox('txtCatalogueID','CatalogueID must be less than 20', isValid);
			isValid =  false;
		}

		var imageLink = core.trim(core.getObject("txtImageLink").val());
		core.ValidateInputTextBox('txtImageLink','');
		if(imageLink == ''){
			core.ValidateInputTextBox('txtImageLink','ImageLink is required', isValid);
			isValid =  false;
		}else if (imageLink.length > 255) {
			core.ValidateInputTextBox('txtImageLink','ImageLink must be less than 255', isValid);
			isValid =  false;
		}

		var manufactoryID = core.trim(core.getObject("txtManufactoryID").val());
		core.ValidateInputTextBox('txtManufactoryID','');
		if(manufactoryID == ''){
			core.ValidateInputTextBox('txtManufactoryID','ManufactoryID is required', isValid);
			isValid =  false;
		}else if (manufactoryID.length > 20) {
			core.ValidateInputTextBox('txtManufactoryID','ManufactoryID must be less than 20', isValid);
			isValid =  false;
		}

		var paymentModeID = core.trim(core.getObject("txtPaymentModeID").val());
		core.ValidateInputTextBox('txtPaymentModeID','');
		if(paymentModeID == ''){
			core.ValidateInputTextBox('txtPaymentModeID','PaymentModeID is required', isValid);
			isValid =  false;
		}else if (paymentModeID.length > 20) {
			core.ValidateInputTextBox('txtPaymentModeID','PaymentModeID must be less than 20', isValid);
			isValid =  false;
		}

		var numberaireID = core.trim(core.getObject("txtNumberaireID").val());
		core.ValidateInputTextBox('txtNumberaireID','');
		if(numberaireID == ''){
			core.ValidateInputTextBox('txtNumberaireID','NumberaireID is required', isValid);
			isValid =  false;
		}else if (numberaireID.length > 20) {
			core.ValidateInputTextBox('txtNumberaireID','NumberaireID must be less than 20', isValid);
			isValid =  false;
		}

		var storageDate = core.trim(core.getObject("txtStorageDate").val());
		core.ValidateInputTextBox('txtStorageDate','');
		if(storageDate == ''){
			core.ValidateInputTextBox('txtStorageDate','StorageDate is required', isValid);
			isValid =  false;
		}else if (core.ValidateDateTime(storageDate) == false) {
			core.getObject('txtStorageDate')[0].focus();
			strError += '<p>StorageDate is invalid!</p>';
		}

		var price = core.trim(core.getObject("txtPrice").val());
		core.ValidateInputTextBox('txtPrice','');
		if(price == ''){
			core.ValidateInputTextBox('txtPrice','Price is required', isValid);
			isValid =  false;
		}
		var amount = core.trim(core.getObject("txtAmount").val());
		core.ValidateInputTextBox('txtAmount','');
		if(amount == ''){
			core.ValidateInputTextBox('txtAmount','Amount is required', isValid);
			isValid =  false;
		}else if (amount.length > 12) {
			core.ValidateInputTextBox('txtAmount','Amount must be less than 0', isValid);
			isValid =  false;
		}
else if (core.isInteger(amount)) {
			core.ValidateInputTextBox('txtAmount','Amount is invalid', isValid);
		}

		var description = core.trim(core.getObject("txtDescription").val());
		core.ValidateInputTextBox('txtDescription','');
		if(description == ''){
			core.ValidateInputTextBox('txtDescription','Description is required', isValid);
			isValid =  false;
		}
		var status = core.trim(core.getObject("txtStatus").val());
		core.ValidateInputTextBox('txtStatus','');
		if(status == ''){
			core.ValidateInputTextBox('txtStatus','Status is required', isValid);
			isValid =  false;
		}else if (status.length > 20) {
			core.ValidateInputTextBox('txtStatus','Status must be less than 20', isValid);
			isValid =  false;
		}

	       
        if (isValid == false) {
         core.disableControl("btnOK", false);
            return;
        }
         
        if (core.getObject("adddocmode")[0].value == ADD_MODE) {
            insertNew();
        }
        else {
            edit();
        }
    }
    
    this.edit = edit;
    function edit() {

		var productID = core.trim(core.getObject("txtProductID").val());
		var productName = core.trim(core.getObject("txtProductName").val());
		var catalogueID = core.trim(core.getObject("txtCatalogueID").val());
		var imageLink = core.trim(core.getObject("txtImageLink").val());
		var manufactoryID = core.trim(core.getObject("txtManufactoryID").val());
		var paymentModeID = core.trim(core.getObject("txtPaymentModeID").val());
		var numberaireID = core.trim(core.getObject("txtNumberaireID").val());
		var storageDate = core.trim(core.getObject("txtStorageDate").val());
		var price = core.trim(core.getObject("txtPrice").val());
		var amount = core.trim(core.getObject("txtAmount").val());
		var description = core.trim(core.getObject("txtDescription").val());
		var status = core.trim(core.getObject("txtStatus").val());
	                
        strRequest = "?isAJ=1&act=" + ACT_UPDATE +  
            '&ProductID='+ core.urlencode(productID)+
			'&ProductName='+ core.urlencode(productName)+
			'&CatalogueID='+ core.urlencode(catalogueID)+
			'&ImageLink='+ core.urlencode(imageLink)+
			'&ManufactoryID='+ core.urlencode(manufactoryID)+
			'&PaymentModeID='+ core.urlencode(paymentModeID)+
			'&NumberaireID='+ core.urlencode(numberaireID)+
			'&StorageDate='+ core.urlencode(storageDate)+
			'&Price='+ core.urlencode(price)+
			'&Amount='+ core.urlencode(amount)+
			'&Description='+ core.urlencode(description)+
			'&Status='+ core.urlencode(status)		;
        
        var ajax = new Ajax();
        ajax.SendRequestToServerWithCustomMsg(_strPage, strRequest, edit_OnCallBack, true, MSG_AJAX_FETCHING_VN);
    }

    function edit_OnCallBack(xmlHTTPRequest) {
        core.disableControl("btnOK", false);
        if (xmlHTTPRequest.readyState == 4) {
            if (xmlHTTPRequest.status == 200) {
                var strRespond = core.parserXML(xmlHTTPRequest.responseText);
                if (!core.headerProcessingArr(strRespond[0], Array(true, true, false))) {
                    // ph?i kh?i t?o l?i d? tr?nh d?ng popdiv addFavourite
                    //var popDiv = new PopDiv();
                    //popDiv.init();
                    popDiv.alert(MSG_RES_OPERATION_FAIL, SYSTEM_TITLE_ERROR, 1);
                    return;
                }
                if (parseInt(strRespond[1]['rs']) == 1) {
                    showInfoBar('success', strRespond[1]["inf"]);
                    showAddMode();
                    changePage(_strPage, ACT_CHANGE_PAGE, core.getObject("txtPage").val());
                }
                else {
                    //var popDiv = new PopDiv();
                    //popDiv.init();
                    top.popDiv.childPop.alert(strRespond[1]["inf"], SYSTEM_TITLE_ERROR, 1);
                }
            }
        }
    }
    
    this.insertNew = insertNew;
    function insertNew() {

		var productID = core.trim(core.getObject("txtProductID").val());
		var productName = core.trim(core.getObject("txtProductName").val());
		var catalogueID = core.trim(core.getObject("txtCatalogueID").val());
		var imageLink = core.trim(core.getObject("txtImageLink").val());
		var manufactoryID = core.trim(core.getObject("txtManufactoryID").val());
		var paymentModeID = core.trim(core.getObject("txtPaymentModeID").val());
		var numberaireID = core.trim(core.getObject("txtNumberaireID").val());
		var storageDate = core.trim(core.getObject("txtStorageDate").val());
		var price = core.trim(core.getObject("txtPrice").val());
		var amount = core.trim(core.getObject("txtAmount").val());
		var description = core.trim(core.getObject("txtDescription").val());
		var status = core.trim(core.getObject("txtStatus").val());
	        
        strRequest = "?isAJ=1&act=" + ACT_ADD +  
            '&ProductID='+ core.urlencode(productID)+
			'&ProductName='+ core.urlencode(productName)+
			'&CatalogueID='+ core.urlencode(catalogueID)+
			'&ImageLink='+ core.urlencode(imageLink)+
			'&ManufactoryID='+ core.urlencode(manufactoryID)+
			'&PaymentModeID='+ core.urlencode(paymentModeID)+
			'&NumberaireID='+ core.urlencode(numberaireID)+
			'&StorageDate='+ core.urlencode(storageDate)+
			'&Price='+ core.urlencode(price)+
			'&Amount='+ core.urlencode(amount)+
			'&Description='+ core.urlencode(description)+
			'&Status='+ core.urlencode(status)		;
        
        var ajax = new Ajax();
        ajax.SendRequestToServerWithCustomMsg(_strPage, strRequest, insertNew_OnCallBack, true, MSG_AJAX_FETCHING_VN);
    }

    function insertNew_OnCallBack(xmlHTTPRequest) {
        core.disableControl("btnOK", false);
        if (xmlHTTPRequest.readyState == 4) {
            if (xmlHTTPRequest.status == 200) {
                var strRespond = core.parserXML(xmlHTTPRequest.responseText);
                if (!core.headerProcessingArr(strRespond[0], Array(true, true, false))) {
                    // ph?i kh?i t?o l?i d? tr?nh d?ng popdiv addFavourite
                    //var popDiv = new PopDiv();
                    //popDiv.init();
                    popDiv.alert(MSG_RES_OPERATION_FAIL, SYSTEM_TITLE_ERROR, 1);
                    return;
                }
                if (parseInt(strRespond[1]['rs']) == 1) {
                    showInfoBar('success', strRespond[1]["inf"]);
                    showAddMode();
                    changePage(_strPage, ACT_CHANGE_PAGE, 1);
                }
                else {
                    //var popDiv = new PopDiv();
                    //popDiv.init();
                    top.popDiv.childPop.alert(strRespond[1]["inf"], SYSTEM_TITLE_ERROR, 1);
                }
            }
        }
    }
    
    var _cacheURL_pdoc;
    this.deleteObj = deleteObj;
    function deleteObj(id, name) {
        //curRow = currentRowId;
        popDiv.alert('Do you want to delete ' + name + ' ?', SYSTEM_TITLE_ERROR, 2, "_objProduct.delete_OK()", "_objProduct.delete_Cancel()");

        var keyword = '';
        if (typeof core.getObject("txtGet") != 'undefined') {
            keyword = core.getObject("txtGet").val();
        }
      
        _cacheURL_pdoc = _strPage + "?isAJ=1&act=" + ACT_DELETE + "&id=" + docid + "&p=" + core.getObject("txtPage")[0].value + "&kw=" + keyword;
    }
    this.delete_Cancel = delete_Cancel;
    function delete_Cancel() {
        //core.getObject("adddocmode")[0].value = ADD_MODE;
    }
    this.delete_OK = delete_OK;
    function delete_OK() {
        // Prepare AJAX to remove selected doc from favorite list
        var ajax = new Ajax(METHOD_GET);
        ajax.SendRequestToServerWithCustomMsg(_cacheURL_pdoc, null, delete_OnCallBack, true, MSG_AJAX_FETCHING_VN);
    }
    function delete_OnCallBack(xmlHTTPRequest) {

        if (xmlHTTPRequest.readyState == 4) {
            if (xmlHTTPRequest.status == 200) {
                var strRespond = core.parserXML(xmlHTTPRequest.responseText);

                if (!core.headerProcessingArr(strRespond[0], Array(true, true, false))) {
                    popDiv.alert(MSG_RES_OPERATION_FAIL, SYSTEM_TITLE_ERROR, 1);
                    return;
                }
                if (parseInt(strRespond[1]['rs']) == 1) {
                    parent.window.showInfoBar('success', strRespond[1]["inf"]);
                    core.getObject("txtPage")[0].value = strRespond[1]["p"];
                    popDiv.hide();
                    core.getObject("list-content")[0].innerHTML = strRespond[1]['list'];
                }
                else //if(parseInt(strRespond[3]) == -1)
                {
                    popDiv.alert(MSG_RES_OPERATION_FAIL, SYSTEM_TITLE_ERROR, 1);
                }
            }
        }
    }
    
    this.showEdit = showEdit;
    function showEdit(strID) {
        showAddMode();
        strRequest = "?isAJ=1&act=" + ACT_SHOW_EDIT + "&id=" + strID; ;
        var ajax = new Ajax(METHOD_GET);
        ajax.SendRequestToServerWithCustomMsg(_strPage + strRequest, null, showEdit_OnCallBack, true, MSG_AJAX_FETCHING_VN);

    }
    function showEdit_OnCallBack(xmlHTTPRequest) {

        if (xmlHTTPRequest.readyState == 4) {
            if (xmlHTTPRequest.status == 200) {
                var strRespond = core.parserXML(xmlHTTPRequest.responseText);
                if (!core.headerProcessingArr(strRespond[0], Array(true, true, false))) {
                    popDiv.alert(MSG_RES_OPERATION_FAIL, SYSTEM_TITLE_ERROR, 1);
                    return;
                }
                if (parseInt(strRespond[1]['rs']) == 1) {
                    showInfoBar('success', MSG_RES_OPERATION_SUCCESS);
                    //alert(strRespond[1]['sens']);
                    // Add Doc && clear field
					core.getObject('txtProductID').val(ProductID);
					core.getObject('txtProductName').val(ProductName);
					core.getObject('txtCatalogueID').val(CatalogueID);
					core.getObject('txtImageLink').val(ImageLink);
					core.getObject('txtManufactoryID').val(ManufactoryID);
					core.getObject('txtPaymentModeID').val(PaymentModeID);
					core.getObject('txtNumberaireID').val(NumberaireID);
					core.getObject('txtStorageDate').val(StorageDate);
					core.getObject('txtPrice').val(Price);
					core.getObject('txtAmount').val(Amount);
					core.getObject('txtDescription').val(Description);
					core.getObject('txtStatus').val(Status);
                    core.getObject("adddocmode")[0].value = EDIT_MODE;
                    core.getObject("status-add")[0].innerHTML = 'Edit mode';
                }
                else  // Duplicate
                {
                    popDiv.alert(MSG_RES_OPERATION_FAIL, SYSTEM_TITLE_ERROR, 1);
                }
            }
        }
    }
    
    this.showAddMode = showAddMode;
    function showAddMode() {
        core.getObject("adddocmode")[0].value = ADD_MODE;
        core.getObject("status-add")[0].innerHTML = 'Add mode';
		core.getObject('txtProductID').val('');
		core.getObject('txtProductName').val('');
		core.getObject('txtCatalogueID').val('');
		core.getObject('txtImageLink').val('');
		core.getObject('txtManufactoryID').val('');
		core.getObject('txtPaymentModeID').val('');
		core.getObject('txtNumberaireID').val('');
		core.getObject('txtStorageDate').val('');
		core.getObject('txtPrice').val('');
		core.getObject('txtAmount').val('');
		core.getObject('txtDescription').val('');
		core.getObject('txtStatus').val('');
    }
    //endregion   
}
var _objProduct = new  Product();