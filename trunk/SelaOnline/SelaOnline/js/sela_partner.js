/*
 * This file was automatically generated By Code Smith 
 * Modifications will be overwritten when code smith is run
 *
 * PLEASE DO NOT MAKE MODIFICATIONS TO THIS FILE
 * Date Created 5/6/2012 9:03:27 PM
 *
 */



/// <summary>
/// Implementations of slpartners represent a Partner
///
/// </summary>
function Partner()
{		   
	//region PRESERVE ExtraMethods For Partner
	//endregion
    //region Contants	
    var ACT_ADD = 10;
    var ACT_UPDATE = 11;
    var ACT_DELETE = 12;
    var ACT_CHANGE_PAGE = 13;
    var ACT_SHOW_EDIT = 14;
    var ACT_GET = 15;
    var _strPage = "admin_partner.php";
    
   
    //endregion   
    
    //region Public Functions
    
    this.btnSave_OnClick = btnSave_OnClick;
    function btnSave_OnClick() {
        core.disableControl("btnOK", true);
        var isValid = true;

		var parterID = core.trim(core.getObject("txtParterID").val());
		core.ValidateInputTextBox('txtParterID','');
		if(parterID == ''){
			core.ValidateInputTextBox('txtParterID','ParterID is required', isValid);
			isValid =  false;
		}else if (parterID.length > 20) {
			core.ValidateInputTextBox('txtParterID','ParterID must be less than 20', isValid);
			isValid =  false;
		}

		var partnerName = core.trim(core.getObject("txtPartnerName").val());
		core.ValidateInputTextBox('txtPartnerName','');
		if(partnerName == ''){
			core.ValidateInputTextBox('txtPartnerName','PartnerName is required', isValid);
			isValid =  false;
		}else if (partnerName.length > 255) {
			core.ValidateInputTextBox('txtPartnerName','PartnerName must be less than 255', isValid);
			isValid =  false;
		}

		var company = core.trim(core.getObject("txtCompany").val());
		core.ValidateInputTextBox('txtCompany','');
		if(company == ''){
			core.ValidateInputTextBox('txtCompany','Company is required', isValid);
			isValid =  false;
		}else if (company.length > 255) {
			core.ValidateInputTextBox('txtCompany','Company must be less than 255', isValid);
			isValid =  false;
		}

		var address 1 = core.trim(core.getObject("txtAddress 1").val());
		core.ValidateInputTextBox('txtAddress 1','');
		if(address 1 == ''){
			core.ValidateInputTextBox('txtAddress 1','Address 1 is required', isValid);
			isValid =  false;
		}else if (address 1.length > 255) {
			core.ValidateInputTextBox('txtAddress 1','Address 1 must be less than 255', isValid);
			isValid =  false;
		}

		var address 2 = core.trim(core.getObject("txtAddress 2").val());
		core.ValidateInputTextBox('txtAddress 2','');
		if(address 2 == ''){
			core.ValidateInputTextBox('txtAddress 2','Address 2 is required', isValid);
			isValid =  false;
		}else if (address 2.length > 255) {
			core.ValidateInputTextBox('txtAddress 2','Address 2 must be less than 255', isValid);
			isValid =  false;
		}

		var address 3 = core.trim(core.getObject("txtAddress 3").val());
		core.ValidateInputTextBox('txtAddress 3','');
		if(address 3 == ''){
			core.ValidateInputTextBox('txtAddress 3','Address 3 is required', isValid);
			isValid =  false;
		}else if (address 3.length > 255) {
			core.ValidateInputTextBox('txtAddress 3','Address 3 must be less than 255', isValid);
			isValid =  false;
		}

		var address 4 = core.trim(core.getObject("txtAddress 4").val());
		core.ValidateInputTextBox('txtAddress 4','');
		if(address 4 == ''){
			core.ValidateInputTextBox('txtAddress 4','Address 4 is required', isValid);
			isValid =  false;
		}else if (address 4.length > 255) {
			core.ValidateInputTextBox('txtAddress 4','Address 4 must be less than 255', isValid);
			isValid =  false;
		}

		var address 5 = core.trim(core.getObject("txtAddress 5").val());
		core.ValidateInputTextBox('txtAddress 5','');
		if(address 5 == ''){
			core.ValidateInputTextBox('txtAddress 5','Address 5 is required', isValid);
			isValid =  false;
		}else if (address 5.length > 255) {
			core.ValidateInputTextBox('txtAddress 5','Address 5 must be less than 255', isValid);
			isValid =  false;
		}

		var email 1 = core.trim(core.getObject("txtEmail 1").val());
		core.ValidateInputTextBox('txtEmail 1','');
		if(email 1 == ''){
			core.ValidateInputTextBox('txtEmail 1','Email 1 is required', isValid);
			isValid =  false;
		}else if (email 1.length > 255) {
			core.ValidateInputTextBox('txtEmail 1','Email 1 must be less than 255', isValid);
			isValid =  false;
		}

		var email 2 = core.trim(core.getObject("txtEmail 2").val());
		core.ValidateInputTextBox('txtEmail 2','');
		if(email 2 == ''){
			core.ValidateInputTextBox('txtEmail 2','Email 2 is required', isValid);
			isValid =  false;
		}else if (email 2.length > 255) {
			core.ValidateInputTextBox('txtEmail 2','Email 2 must be less than 255', isValid);
			isValid =  false;
		}

		var email 3 = core.trim(core.getObject("txtEmail 3").val());
		core.ValidateInputTextBox('txtEmail 3','');
		if(email 3 == ''){
			core.ValidateInputTextBox('txtEmail 3','Email 3 is required', isValid);
			isValid =  false;
		}else if (email 3.length > 255) {
			core.ValidateInputTextBox('txtEmail 3','Email 3 must be less than 255', isValid);
			isValid =  false;
		}

		var email 4 = core.trim(core.getObject("txtEmail 4").val());
		core.ValidateInputTextBox('txtEmail 4','');
		if(email 4 == ''){
			core.ValidateInputTextBox('txtEmail 4','Email 4 is required', isValid);
			isValid =  false;
		}else if (email 4.length > 255) {
			core.ValidateInputTextBox('txtEmail 4','Email 4 must be less than 255', isValid);
			isValid =  false;
		}

		var email 5 = core.trim(core.getObject("txtEmail 5").val());
		core.ValidateInputTextBox('txtEmail 5','');
		if(email 5 == ''){
			core.ValidateInputTextBox('txtEmail 5','Email 5 is required', isValid);
			isValid =  false;
		}else if (email 5.length > 255) {
			core.ValidateInputTextBox('txtEmail 5','Email 5 must be less than 255', isValid);
			isValid =  false;
		}

		var phone 1 = core.trim(core.getObject("txtPhone 1").val());
		core.ValidateInputTextBox('txtPhone 1','');
		if(phone 1 == ''){
			core.ValidateInputTextBox('txtPhone 1','Phone 1 is required', isValid);
			isValid =  false;
		}else if (phone 1.length > 20) {
			core.ValidateInputTextBox('txtPhone 1','Phone 1 must be less than 20', isValid);
			isValid =  false;
		}

		var phone 2 = core.trim(core.getObject("txtPhone 2").val());
		core.ValidateInputTextBox('txtPhone 2','');
		if(phone 2 == ''){
			core.ValidateInputTextBox('txtPhone 2','Phone 2 is required', isValid);
			isValid =  false;
		}else if (phone 2.length > 20) {
			core.ValidateInputTextBox('txtPhone 2','Phone 2 must be less than 20', isValid);
			isValid =  false;
		}

		var phone 3 = core.trim(core.getObject("txtPhone 3").val());
		core.ValidateInputTextBox('txtPhone 3','');
		if(phone 3 == ''){
			core.ValidateInputTextBox('txtPhone 3','Phone 3 is required', isValid);
			isValid =  false;
		}else if (phone 3.length > 20) {
			core.ValidateInputTextBox('txtPhone 3','Phone 3 must be less than 20', isValid);
			isValid =  false;
		}

		var phone 4 = core.trim(core.getObject("txtPhone 4").val());
		core.ValidateInputTextBox('txtPhone 4','');
		if(phone 4 == ''){
			core.ValidateInputTextBox('txtPhone 4','Phone 4 is required', isValid);
			isValid =  false;
		}else if (phone 4.length > 20) {
			core.ValidateInputTextBox('txtPhone 4','Phone 4 must be less than 20', isValid);
			isValid =  false;
		}

		var phone 5 = core.trim(core.getObject("txtPhone 5").val());
		core.ValidateInputTextBox('txtPhone 5','');
		if(phone 5 == ''){
			core.ValidateInputTextBox('txtPhone 5','Phone 5 is required', isValid);
			isValid =  false;
		}else if (phone 5.length > 20) {
			core.ValidateInputTextBox('txtPhone 5','Phone 5 must be less than 20', isValid);
			isValid =  false;
		}

		var fax 1 = core.trim(core.getObject("txtFax 1").val());
		core.ValidateInputTextBox('txtFax 1','');
		if(fax 1 == ''){
			core.ValidateInputTextBox('txtFax 1','Fax 1 is required', isValid);
			isValid =  false;
		}else if (fax 1.length > 20) {
			core.ValidateInputTextBox('txtFax 1','Fax 1 must be less than 20', isValid);
			isValid =  false;
		}

		var fax 2 = core.trim(core.getObject("txtFax 2").val());
		core.ValidateInputTextBox('txtFax 2','');
		if(fax 2 == ''){
			core.ValidateInputTextBox('txtFax 2','Fax 2 is required', isValid);
			isValid =  false;
		}else if (fax 2.length > 20) {
			core.ValidateInputTextBox('txtFax 2','Fax 2 must be less than 20', isValid);
			isValid =  false;
		}

		var fax 3 = core.trim(core.getObject("txtFax 3").val());
		core.ValidateInputTextBox('txtFax 3','');
		if(fax 3 == ''){
			core.ValidateInputTextBox('txtFax 3','Fax 3 is required', isValid);
			isValid =  false;
		}else if (fax 3.length > 20) {
			core.ValidateInputTextBox('txtFax 3','Fax 3 must be less than 20', isValid);
			isValid =  false;
		}

		var fax 4 = core.trim(core.getObject("txtFax 4").val());
		core.ValidateInputTextBox('txtFax 4','');
		if(fax 4 == ''){
			core.ValidateInputTextBox('txtFax 4','Fax 4 is required', isValid);
			isValid =  false;
		}else if (fax 4.length > 20) {
			core.ValidateInputTextBox('txtFax 4','Fax 4 must be less than 20', isValid);
			isValid =  false;
		}

		var fax 5 = core.trim(core.getObject("txtFax 5").val());
		core.ValidateInputTextBox('txtFax 5','');
		if(fax 5 == ''){
			core.ValidateInputTextBox('txtFax 5','Fax 5 is required', isValid);
			isValid =  false;
		}else if (fax 5.length > 20) {
			core.ValidateInputTextBox('txtFax 5','Fax 5 must be less than 20', isValid);
			isValid =  false;
		}

		var taxNumber = core.trim(core.getObject("txtTaxNumber").val());
		core.ValidateInputTextBox('txtTaxNumber','');
		if(taxNumber == ''){
			core.ValidateInputTextBox('txtTaxNumber','TaxNumber is required', isValid);
			isValid =  false;
		}else if (taxNumber.length > 50) {
			core.ValidateInputTextBox('txtTaxNumber','TaxNumber must be less than 50', isValid);
			isValid =  false;
		}

		var accountNumber = core.trim(core.getObject("txtAccountNumber").val());
		core.ValidateInputTextBox('txtAccountNumber','');
		if(accountNumber == ''){
			core.ValidateInputTextBox('txtAccountNumber','AccountNumber is required', isValid);
			isValid =  false;
		}else if (accountNumber.length > 50) {
			core.ValidateInputTextBox('txtAccountNumber','AccountNumber must be less than 50', isValid);
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

		var parterID = core.trim(core.getObject("txtParterID").val());
		var partnerName = core.trim(core.getObject("txtPartnerName").val());
		var company = core.trim(core.getObject("txtCompany").val());
		var address 1 = core.trim(core.getObject("txtAddress 1").val());
		var address 2 = core.trim(core.getObject("txtAddress 2").val());
		var address 3 = core.trim(core.getObject("txtAddress 3").val());
		var address 4 = core.trim(core.getObject("txtAddress 4").val());
		var address 5 = core.trim(core.getObject("txtAddress 5").val());
		var email 1 = core.trim(core.getObject("txtEmail 1").val());
		var email 2 = core.trim(core.getObject("txtEmail 2").val());
		var email 3 = core.trim(core.getObject("txtEmail 3").val());
		var email 4 = core.trim(core.getObject("txtEmail 4").val());
		var email 5 = core.trim(core.getObject("txtEmail 5").val());
		var phone 1 = core.trim(core.getObject("txtPhone 1").val());
		var phone 2 = core.trim(core.getObject("txtPhone 2").val());
		var phone 3 = core.trim(core.getObject("txtPhone 3").val());
		var phone 4 = core.trim(core.getObject("txtPhone 4").val());
		var phone 5 = core.trim(core.getObject("txtPhone 5").val());
		var fax 1 = core.trim(core.getObject("txtFax 1").val());
		var fax 2 = core.trim(core.getObject("txtFax 2").val());
		var fax 3 = core.trim(core.getObject("txtFax 3").val());
		var fax 4 = core.trim(core.getObject("txtFax 4").val());
		var fax 5 = core.trim(core.getObject("txtFax 5").val());
		var taxNumber = core.trim(core.getObject("txtTaxNumber").val());
		var accountNumber = core.trim(core.getObject("txtAccountNumber").val());
		var status = core.trim(core.getObject("txtStatus").val());
	                
        strRequest = "?isAJ=1&act=" + ACT_UPDATE +  
            '&ParterID='+ core.urlencode(parterID)+
			'&PartnerName='+ core.urlencode(partnerName)+
			'&Company='+ core.urlencode(company)+
			'&Address 1='+ core.urlencode(address 1)+
			'&Address 2='+ core.urlencode(address 2)+
			'&Address 3='+ core.urlencode(address 3)+
			'&Address 4='+ core.urlencode(address 4)+
			'&Address 5='+ core.urlencode(address 5)+
			'&Email 1='+ core.urlencode(email 1)+
			'&Email 2='+ core.urlencode(email 2)+
			'&Email 3='+ core.urlencode(email 3)+
			'&Email 4='+ core.urlencode(email 4)+
			'&Email 5='+ core.urlencode(email 5)+
			'&Phone 1='+ core.urlencode(phone 1)+
			'&Phone 2='+ core.urlencode(phone 2)+
			'&Phone 3='+ core.urlencode(phone 3)+
			'&Phone 4='+ core.urlencode(phone 4)+
			'&Phone 5='+ core.urlencode(phone 5)+
			'&Fax 1='+ core.urlencode(fax 1)+
			'&Fax 2='+ core.urlencode(fax 2)+
			'&Fax 3='+ core.urlencode(fax 3)+
			'&Fax 4='+ core.urlencode(fax 4)+
			'&Fax 5='+ core.urlencode(fax 5)+
			'&TaxNumber='+ core.urlencode(taxNumber)+
			'&AccountNumber='+ core.urlencode(accountNumber)+
			'&Status='+ core.urlencode(status)+		;
        
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

		var parterID = core.trim(core.getObject("txtParterID").val());
		var partnerName = core.trim(core.getObject("txtPartnerName").val());
		var company = core.trim(core.getObject("txtCompany").val());
		var address 1 = core.trim(core.getObject("txtAddress 1").val());
		var address 2 = core.trim(core.getObject("txtAddress 2").val());
		var address 3 = core.trim(core.getObject("txtAddress 3").val());
		var address 4 = core.trim(core.getObject("txtAddress 4").val());
		var address 5 = core.trim(core.getObject("txtAddress 5").val());
		var email 1 = core.trim(core.getObject("txtEmail 1").val());
		var email 2 = core.trim(core.getObject("txtEmail 2").val());
		var email 3 = core.trim(core.getObject("txtEmail 3").val());
		var email 4 = core.trim(core.getObject("txtEmail 4").val());
		var email 5 = core.trim(core.getObject("txtEmail 5").val());
		var phone 1 = core.trim(core.getObject("txtPhone 1").val());
		var phone 2 = core.trim(core.getObject("txtPhone 2").val());
		var phone 3 = core.trim(core.getObject("txtPhone 3").val());
		var phone 4 = core.trim(core.getObject("txtPhone 4").val());
		var phone 5 = core.trim(core.getObject("txtPhone 5").val());
		var fax 1 = core.trim(core.getObject("txtFax 1").val());
		var fax 2 = core.trim(core.getObject("txtFax 2").val());
		var fax 3 = core.trim(core.getObject("txtFax 3").val());
		var fax 4 = core.trim(core.getObject("txtFax 4").val());
		var fax 5 = core.trim(core.getObject("txtFax 5").val());
		var taxNumber = core.trim(core.getObject("txtTaxNumber").val());
		var accountNumber = core.trim(core.getObject("txtAccountNumber").val());
		var status = core.trim(core.getObject("txtStatus").val());
	        
        strRequest = "?isAJ=1&act=" + ACT_ADD +  
            '&ParterID='+ core.urlencode(parterID)+
			'&PartnerName='+ core.urlencode(partnerName)+
			'&Company='+ core.urlencode(company)+
			'&Address 1='+ core.urlencode(address 1)+
			'&Address 2='+ core.urlencode(address 2)+
			'&Address 3='+ core.urlencode(address 3)+
			'&Address 4='+ core.urlencode(address 4)+
			'&Address 5='+ core.urlencode(address 5)+
			'&Email 1='+ core.urlencode(email 1)+
			'&Email 2='+ core.urlencode(email 2)+
			'&Email 3='+ core.urlencode(email 3)+
			'&Email 4='+ core.urlencode(email 4)+
			'&Email 5='+ core.urlencode(email 5)+
			'&Phone 1='+ core.urlencode(phone 1)+
			'&Phone 2='+ core.urlencode(phone 2)+
			'&Phone 3='+ core.urlencode(phone 3)+
			'&Phone 4='+ core.urlencode(phone 4)+
			'&Phone 5='+ core.urlencode(phone 5)+
			'&Fax 1='+ core.urlencode(fax 1)+
			'&Fax 2='+ core.urlencode(fax 2)+
			'&Fax 3='+ core.urlencode(fax 3)+
			'&Fax 4='+ core.urlencode(fax 4)+
			'&Fax 5='+ core.urlencode(fax 5)+
			'&TaxNumber='+ core.urlencode(taxNumber)+
			'&AccountNumber='+ core.urlencode(accountNumber)+
			'&Status='+ core.urlencode(status)+		;
        
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
        popDiv.alert('Do you want to delete ' + name + ' ?', SYSTEM_TITLE_ERROR, 2, "_objPartner.delete_OK()", "_objPartner.delete_Cancel()");

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
					core.getObject('txtParterID').val(ParterID);
					core.getObject('txtPartnerName').val(PartnerName);
					core.getObject('txtCompany').val(Company);
					core.getObject('txtAddress 1').val(Address 1);
					core.getObject('txtAddress 2').val(Address 2);
					core.getObject('txtAddress 3').val(Address 3);
					core.getObject('txtAddress 4').val(Address 4);
					core.getObject('txtAddress 5').val(Address 5);
					core.getObject('txtEmail 1').val(Email 1);
					core.getObject('txtEmail 2').val(Email 2);
					core.getObject('txtEmail 3').val(Email 3);
					core.getObject('txtEmail 4').val(Email 4);
					core.getObject('txtEmail 5').val(Email 5);
					core.getObject('txtPhone 1').val(Phone 1);
					core.getObject('txtPhone 2').val(Phone 2);
					core.getObject('txtPhone 3').val(Phone 3);
					core.getObject('txtPhone 4').val(Phone 4);
					core.getObject('txtPhone 5').val(Phone 5);
					core.getObject('txtFax 1').val(Fax 1);
					core.getObject('txtFax 2').val(Fax 2);
					core.getObject('txtFax 3').val(Fax 3);
					core.getObject('txtFax 4').val(Fax 4);
					core.getObject('txtFax 5').val(Fax 5);
					core.getObject('txtTaxNumber').val(TaxNumber);
					core.getObject('txtAccountNumber').val(AccountNumber);
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
		core.getObject('txtParterID').val('');
		core.getObject('txtPartnerName').val('');
		core.getObject('txtCompany').val('');
		core.getObject('txtAddress 1').val('');
		core.getObject('txtAddress 2').val('');
		core.getObject('txtAddress 3').val('');
		core.getObject('txtAddress 4').val('');
		core.getObject('txtAddress 5').val('');
		core.getObject('txtEmail 1').val('');
		core.getObject('txtEmail 2').val('');
		core.getObject('txtEmail 3').val('');
		core.getObject('txtEmail 4').val('');
		core.getObject('txtEmail 5').val('');
		core.getObject('txtPhone 1').val('');
		core.getObject('txtPhone 2').val('');
		core.getObject('txtPhone 3').val('');
		core.getObject('txtPhone 4').val('');
		core.getObject('txtPhone 5').val('');
		core.getObject('txtFax 1').val('');
		core.getObject('txtFax 2').val('');
		core.getObject('txtFax 3').val('');
		core.getObject('txtFax 4').val('');
		core.getObject('txtFax 5').val('');
		core.getObject('txtTaxNumber').val('');
		core.getObject('txtAccountNumber').val('');
		core.getObject('txtStatus').val('');
    }
    //endregion   
}
var _objPartner = new  Partner();
