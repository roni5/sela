/*
* This file was automatically generated By Code Smith 
* Modifications will be overwritten when code smith is run
*
* PLEASE DO NOT MAKE MODIFICATIONS TO THIS FILE
* Date Created 5/6/2012
*
*/



/// <summary>
/// Implementations of slusers represent a User
///
/// </summary>
function User() {
    //region PRESERVE ExtraMethods For User
    //endregion
    //region Contants	
    var ACT_ADD = 10;
    var ACT_UPDATE = 11;
    var ACT_DELETE = 12;
    var ACT_CHANGE_PAGE = 13;
    var ACT_SHOW_EDIT = 14;
    var ACT_GET = 15;
    var ACT_LOGIN = 100;
    var ACT_LOGOUT = 101;
    var ACT_CHANGE_PASS = 102;
    var ACT_REGISTER = 103;
    var _strPage = "admin_user.php";
    var _strPageForFontEnd = "admin/admin_user.php";

    //endregion   

    //region Public Functions

    this.btnSave_OnClick = btnSave_OnClick;
    function btnSave_OnClick() {
        core.disableControl("btnOK", true);
        var isValid = true;

        var userID = core.trim(core.getObject("txtUserID").val());
        core.ValidateInputTextBox('txtUserID', '');
        if (userID == '') {
            core.ValidateInputTextBox('txtUserID', 'UserID is required', isValid);
            isValid = false;
        } else if (userID.length > 20) {
            core.ValidateInputTextBox('txtUserID', 'UserID must be less than 20', isValid);
            isValid = false;
        }

        var userName = core.trim(core.getObject("txtUserName").val());
        core.ValidateInputTextBox('txtUserName', '');
        if (userName == '') {
            core.ValidateInputTextBox('txtUserName', 'UserName is required', isValid);
            isValid = false;
        } else if (userName.length > 50) {
            core.ValidateInputTextBox('txtUserName', 'UserName must be less than 50', isValid);
            isValid = false;
        }

        var password = core.trim(core.getObject("txtPassword").val());
        core.ValidateInputTextBox('txtPassword', '');
        if (password == '') {
            core.ValidateInputTextBox('txtPassword', 'Password is required', isValid);
            isValid = false;
        } else if (password.length > 255) {
            core.ValidateInputTextBox('txtPassword', 'Password must be less than 255', isValid);
            isValid = false;
        }

        var fullname = core.trim(core.getObject("txtFullname").val());
        core.ValidateInputTextBox('txtFullname', '');
        if (fullname == '') {
            core.ValidateInputTextBox('txtFullname', 'Fullname is required', isValid);
            isValid = false;
        } else if (fullname.length > 255) {
            core.ValidateInputTextBox('txtFullname', 'Fullname must be less than 255', isValid);
            isValid = false;
        }

        var birthDate = core.trim(core.getObject("txtBirthDate").val());
        core.ValidateInputTextBox('txtBirthDate', '');
        if (birthDate == '') {
            core.ValidateInputTextBox('txtBirthDate', 'BirthDate is required', isValid);
            isValid = false;
        } else if (core.ValidateDateTime(birthDate) == false) {
            core.getObject('txtBirthDate')[0].focus();
            strError += '<p>BirthDate is invalid!</p>';
        }

        var address = core.trim(core.getObject("txtAddress").val());
        core.ValidateInputTextBox('txtAddress', '');
        if (address == '') {
            core.ValidateInputTextBox('txtAddress', 'Address is required', isValid);
            isValid = false;
        } else if (address.length > 255) {
            core.ValidateInputTextBox('txtAddress', 'Address must be less than 255', isValid);
            isValid = false;
        }

        var phone = core.trim(core.getObject("txtPhone").val());
        core.ValidateInputTextBox('txtPhone', '');
        if (phone == '') {
            core.ValidateInputTextBox('txtPhone', 'Phone is required', isValid);
            isValid = false;
        } else if (phone.length > 20) {
            core.ValidateInputTextBox('txtPhone', 'Phone must be less than 20', isValid);
            isValid = false;
        }

        var email = core.trim(core.getObject("txtEmail").val());
        core.ValidateInputTextBox('txtEmail', '');
        if (email == '') {
            core.ValidateInputTextBox('txtEmail', 'Email is required', isValid);
            isValid = false;
        } else if (email.length > 255) {
            core.ValidateInputTextBox('txtEmail', 'Email must be less than 255', isValid);
            isValid = false;
        }

        var sex = core.trim(core.getObject("txtSex").val());
        core.ValidateInputTextBox('txtSex', '');
        if (sex == '') {
            core.ValidateInputTextBox('txtSex', 'Sex is required', isValid);
            isValid = false;
        }
        var identity = core.trim(core.getObject("txtIdentity").val());
        core.ValidateInputTextBox('txtIdentity', '');
        if (identity == '') {
            core.ValidateInputTextBox('txtIdentity', 'Identity is required', isValid);
            isValid = false;
        } else if (identity.length > 20) {
            core.ValidateInputTextBox('txtIdentity', 'Identity must be less than 20', isValid);
            isValid = false;
        }

        var roleID = core.trim(core.getObject("txtRoleID").val());
        core.ValidateInputTextBox('txtRoleID', '');
        if (roleID == '') {
            core.ValidateInputTextBox('txtRoleID', 'RoleID is required', isValid);
            isValid = false;
        } else if (roleID.length > 20) {
            core.ValidateInputTextBox('txtRoleID', 'RoleID must be less than 20', isValid);
            isValid = false;
        }

        var userRankID = core.trim(core.getObject("txtUserRankID").val());
        core.ValidateInputTextBox('txtUserRankID', '');
        if (userRankID == '') {
            core.ValidateInputTextBox('txtUserRankID', 'UserRankID is required', isValid);
            isValid = false;
        } else if (userRankID.length > 20) {
            core.ValidateInputTextBox('txtUserRankID', 'UserRankID must be less than 20', isValid);
            isValid = false;
        }

        var avatar = core.trim(core.getObject("txtAvatar").val());
        core.ValidateInputTextBox('txtAvatar', '');
        if (avatar == '') {
            core.ValidateInputTextBox('txtAvatar', 'Avatar is required', isValid);
            isValid = false;
        } else if (avatar.length > 255) {
            core.ValidateInputTextBox('txtAvatar', 'Avatar must be less than 255', isValid);
            isValid = false;
        }

        var accountID = core.trim(core.getObject("txtAccountID").val());
        core.ValidateInputTextBox('txtAccountID', '');
        if (accountID == '') {
            core.ValidateInputTextBox('txtAccountID', 'AccountID is required', isValid);
            isValid = false;
        } else if (accountID.length > 255) {
            core.ValidateInputTextBox('txtAccountID', 'AccountID must be less than 255', isValid);
            isValid = false;
        }

        var isActived = core.trim(core.getObject("txtIsActived").val());
        core.ValidateInputTextBox('txtIsActived', '');
        if (isActived == '') {
            core.ValidateInputTextBox('txtIsActived', 'IsActived is required', isValid);
            isValid = false;
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

        var userID = core.trim(core.getObject("txtUserID").val());
        var userName = core.trim(core.getObject("txtUserName").val());
        var password = core.trim(core.getObject("txtPassword").val());
        var fullname = core.trim(core.getObject("txtFullname").val());
        var birthDate = core.trim(core.getObject("txtBirthDate").val());
        var address = core.trim(core.getObject("txtAddress").val());
        var phone = core.trim(core.getObject("txtPhone").val());
        var email = core.trim(core.getObject("txtEmail").val());
        var sex = core.trim(core.getObject("txtSex").val());
        var identity = core.trim(core.getObject("txtIdentity").val());
        var roleID = core.trim(core.getObject("txtRoleID").val());
        var userRankID = core.trim(core.getObject("txtUserRankID").val());
        var avatar = core.trim(core.getObject("txtAvatar").val());
        var accountID = core.trim(core.getObject("txtAccountID").val());
        var isActived = core.trim(core.getObject("txtIsActived").val());

        strRequest = "?isAJ=1&act=" + ACT_UPDATE +
            '&UserID=' + core.urlencode(userID) +
			'&UserName=' + core.urlencode(userName) +
			'&Password=' + core.urlencode(password) +
			'&Fullname=' + core.urlencode(fullname) +
			'&BirthDate=' + core.urlencode(birthDate) +
			'&Address=' + core.urlencode(address) +
			'&Phone=' + core.urlencode(phone) +
			'&Email=' + core.urlencode(email) +
			'&Sex=' + core.urlencode(sex) +
			'&Identity=' + core.urlencode(identity) +
			'&RoleID=' + core.urlencode(roleID) +
			'&UserRankID=' + core.urlencode(userRankID) +
			'&Avatar=' + core.urlencode(avatar) +
			'&AccountID=' + core.urlencode(accountID) +
			'&IsActived=' + core.urlencode(isActived);

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

        var userID = core.trim(core.getObject("txtUserID").val());
        var userName = core.trim(core.getObject("txtUserName").val());
        var password = core.trim(core.getObject("txtPassword").val());
        var fullname = core.trim(core.getObject("txtFullname").val());
        var birthDate = core.trim(core.getObject("txtBirthDate").val());
        var address = core.trim(core.getObject("txtAddress").val());
        var phone = core.trim(core.getObject("txtPhone").val());
        var email = core.trim(core.getObject("txtEmail").val());
        var sex = core.trim(core.getObject("txtSex").val());
        var identity = core.trim(core.getObject("txtIdentity").val());
        var roleID = core.trim(core.getObject("txtRoleID").val());
        var userRankID = core.trim(core.getObject("txtUserRankID").val());
        var avatar = core.trim(core.getObject("txtAvatar").val());
        var accountID = core.trim(core.getObject("txtAccountID").val());
        var isActived = core.trim(core.getObject("txtIsActived").val());

        strRequest = "?isAJ=1&act=" + ACT_ADD +
            '&UserID=' + core.urlencode(userID) +
			'&UserName=' + core.urlencode(userName) +
			'&Password=' + core.urlencode(password) +
			'&Fullname=' + core.urlencode(fullname) +
			'&BirthDate=' + core.urlencode(birthDate) +
			'&Address=' + core.urlencode(address) +
			'&Phone=' + core.urlencode(phone) +
			'&Email=' + core.urlencode(email) +
			'&Sex=' + core.urlencode(sex) +
			'&Identity=' + core.urlencode(identity) +
			'&RoleID=' + core.urlencode(roleID) +
			'&UserRankID=' + core.urlencode(userRankID) +
			'&Avatar=' + core.urlencode(avatar) +
			'&AccountID=' + core.urlencode(accountID) +
			'&IsActived=' + core.urlencode(isActived);

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
        popDiv.alert('Do you want to delete ' + name + ' ?', SYSTEM_TITLE_ERROR, 2, "_objUser.delete_OK()", "_objUser.delete_Cancel()");

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
                    core.getObject('txtUserID').val(UserID);
                    core.getObject('txtUserName').val(UserName);
                    core.getObject('txtPassword').val(Password);
                    core.getObject('txtFullname').val(Fullname);
                    core.getObject('txtBirthDate').val(BirthDate);
                    core.getObject('txtAddress').val(Address);
                    core.getObject('txtPhone').val(Phone);
                    core.getObject('txtEmail').val(Email);
                    core.getObject('txtSex').val(Sex);
                    core.getObject('txtIdentity').val(Identity);
                    core.getObject('txtRoleID').val(RoleID);
                    core.getObject('txtUserRankID').val(UserRankID);
                    core.getObject('txtAvatar').val(Avatar);
                    core.getObject('txtAccountID').val(AccountID);
                    core.getObject('txtIsActived').val(IsActived);
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
        core.getObject('txtUserID').val('');
        core.getObject('txtUserName').val('');
        core.getObject('txtPassword').val('');
        core.getObject('txtFullname').val('');
        core.getObject('txtBirthDate').val('');
        core.getObject('txtAddress').val('');
        core.getObject('txtPhone').val('');
        core.getObject('txtEmail').val('');
        core.getObject('txtSex').val('');
        core.getObject('txtIdentity').val('');
        core.getObject('txtRoleID').val('');
        core.getObject('txtUserRankID').val('');
        core.getObject('txtAvatar').val('');
        core.getObject('txtAccountID').val('');
        core.getObject('txtIsActived').val('');
    }

    function validationLogin() {
        core.disableControl("btnOK", true);
        var isValid = true;

        var userName = core.trim(core.getObject("txtUserName").val());
        core.ValidateInputTextBox('txtUserName', '');
        if (userName == '') {
            core.ValidateInputTextBox('txtUserName', 'UserName is required', isValid);
            isValid = false;
        } else if (userName.length > 50) {
            core.ValidateInputTextBox('txtUserName', 'UserName must be less than 50', isValid);
            isValid = false;
        }

        var password = core.trim(core.getObject("txtPassword").val());
        core.ValidateInputTextBox('txtPassword', '');
        if (password == '') {
            core.ValidateInputTextBox('txtPassword', 'Password is required', isValid);
            isValid = false;
        }
        else if (password.length < 6) {
            core.ValidateInputTextBox('txtPassword', 'Password must be great than 6', isValid);
            isValid = false;
        }
        else if (password.length > 255) {
            core.ValidateInputTextBox('txtPassword', 'Password must be less than 255', isValid);
            isValid = false;
        }

        if (isValid == false) {
            core.disableControl("btnOK", false);
            return false;
        }
        return true;
    }

    this.login = login;
    function login() {
        if (validationLogin() == true) {
            var password = core.trim(core.getObject("txtPassword").val());
            var username = core.trim(core.getObject("txtUserName").val());
            var strRequest = "isAJ=1&act=" + ACT_LOGIN + "&username=" + username + '&password=' + password;
            var ajax = new Ajax();
            ajax.SendRequestToServerWithCustomMsg(_strPageForFontEnd, strRequest, login_OnCallBack, true, MSG_AJAX_SENDING_VN);
        }
        else {
            core.disableControl("btnOK", false);
        }
    }

    function login_OnCallBack(xmlHTTPRequest) {

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
                }
                else {
                    showInfoBar('fail', "Thất bại.");
                    core.getObject('error')[0].innerHTML = 'Sai username hoặc password.'
                }
            }
        }
    }

    this.logout = logout;
    function logout() {

        var strRequest = "index.php?isAJ=1&act=" + ACT_LOGOUT;
        var ajax = new Ajax();
        ajax.SendRequestToServerWithCustomMsgCache(strRequest, null, logout_OnCallBack, true, MSG_AJAX_SENDING_VN);
    }
    function logout_OnCallBack(xmlHTTPRequest) {

        if (xmlHTTPRequest.readyState == 4) {
            if (xmlHTTPRequest.status == 200) {
                var strRespond = core.parserXML(xmlHTTPRequest.responseText);

                if (!core.headerProcessingArr(strRespond[0], Array(true, false, false))) {
                    //show fail
                    popDiv.alert(MSG_RES_OPERATION_FAIL, SYSTEM_TITLE_ERROR, 1);
                    return;
                }
                if (parseInt(strRespond[1]["rs"]) == 1) {

                    // alert(strRespond[1]["inf"]);
                    core.goHome();

                }
            }
        }
    }


    this.changePassword = changePassword;
    function changePassword() {
        oldpass = core.getObject('oldpass').val();
        password = core.getObject('password1').val();
        password2 = core.getObject('password2').val();
        var strError = "";
        if (password == "") {
            core.getObject("password1")[0].focus();
            strError += "<p>Mật khầu không thể rỗng.</p>";
            //popDiv.alert("Tên nhân viên không thể rỗng.", SYSTEM_TITLE_ERROR, 1);
            //return;
        }
        else if (password.length > 255) {
            core.getObject("password1")[0].focus();
            //popDiv = new PopDiv();
            //popDiv.init();
            //show fail
            strError += "<p>Mật khầu quá dài.</p>";
            //popDiv.alert("Tên nhân viên quá dài!", SYSTEM_TITLE_ERROR, 1);
            //return;
        } else if (password != password2) {
            core.getObject("password1")[0].focus();

            //show fail
            strError += "<p>Mật khầu không trùng nhau.</p>";
        }

        if (strError != "") {
            popDiv.alert(strError, SYSTEM_TITLE_ERROR, 1);
            return;
        }

        var strRequest = "index.php?isAJ=1&act=" + ACT_CHANGE_PASS + "&old=" + oldpass + '&pass=' + password;
        var ajax = new Ajax();
        ajax.SendRequestToServerWithCustomMsgCache(strRequest, null, changePassword_OnCallBack, true, MSG_AJAX_SENDING_VN);
    }

    function changePassword_OnCallBack(xmlHTTPRequest) {

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
                    core.getObject('error')[0].innerHTML = ''
                    // alert(strRespond[1]["inf"]);
                    core.reload();

                }
                else {
                    showInfoBar('fail', "Thất bại.");
                    core.getObject('error')[0].innerHTML = 'Sai password.'
                }

            }
        }
    }


    function validtionRegister() {
        core.disableControl("btnOK", true);
        var isValid = true;

        var userName = core.trim(core.getObject("txtUserName").val());
        core.ValidateInputTextBox('txtUserName', '');
        if (userName == '') {
            core.ValidateInputTextBox('txtUserName', 'UserName is required', isValid);
            isValid = false;
        } else if (userName.length > 50) {
            core.ValidateInputTextBox('txtUserName', 'UserName must be less than 50', isValid);
            isValid = false;
        }

        var password = core.trim(core.getObject("txtPassword").val());
        core.ValidateInputTextBox('txtPassword', '');
        if (password == '') {
            core.ValidateInputTextBox('txtPassword', 'Password is required', isValid);
            isValid = false;
        }
        else if (password.length < 6) {
            core.ValidateInputTextBox('txtPassword', 'Password must be great than 6', isValid);
            isValid = false;
        }
        else if (password.length > 255) {
            core.ValidateInputTextBox('txtPassword', 'Password must be less than 255', isValid);
            isValid = false;
        }

        var email = core.trim(core.getObject("txtEmail").val());
        core.ValidateInputTextBox('txtEmail', '');
        if (email == '') {
            core.ValidateInputTextBox('txtEmail', 'Email is required', isValid);
            isValid = false;
        } else if (email.length > 765) {
            core.ValidateInputTextBox('txtEmail', 'Email must be less than 255', isValid);
            isValid = false;
        }

        var fullname = core.trim(core.getObject("txtFullname").val());
        core.ValidateInputTextBox('txtFullname', '');
        if (fullname == '') {
            core.ValidateInputTextBox('txtFullname', 'Fullname is required', isValid);
            isValid = false;
        } else if (fullname.length > 765) {
            core.ValidateInputTextBox('txtFullname', 'Fullname must be less than 255', isValid);
            isValid = false;
        }

        if (isValid == false) {
            core.disableControl("btnOK", false);
            return false;
        }
        return true;
    }

    this.register = register;
    function register() {
        if (validtionRegister() == true) {
            var userName = core.trim(core.getObject("txtUserName").val());
            var password = core.trim(core.getObject("txtPassword").val());
            var fullname = core.trim(core.getObject("txtFullname").val());
            var birthDate = core.trim(core.getObject("txtBirthDate").val());
            var address = core.trim(core.getObject("txtAddress").val());
            var phone = core.trim(core.getObject("txtPhone").val());
            var email = core.trim(core.getObject("txtEmail").val());
            var sex = core.trim(core.getObject("txtSex").val());
            var identity = core.trim(core.getObject("txtIdentity").val());
            var roleID = core.trim(core.getObject("txtRoleID").val());
            var userRankID = core.trim(core.getObject("txtUserRankID").val());
            var avatar = core.trim(core.getObject("txtAvatar").val());
            var accountID = core.trim(core.getObject("txtAccountID").val());
            var isActived = core.trim(core.getObject("txtIsActived").val());

            strRequest = "?isAJ=1&act=" + ACT_REGISTER +
            //'&UserID=' + core.urlencode(userID) +
			'&UserName=' + core.urlencode(userName) +
			'&Password=' + core.urlencode(password) +
			'&Fullname=' + core.urlencode(fullname) +
            //'&BirthDate=' + core.urlencode(birthDate) +
            //'&Address=' + core.urlencode(address) +
            //'&Phone=' + core.urlencode(phone) +
			'&Email=' + core.urlencode(email);
            //'&Sex=' + core.urlencode(sex) +
            //'&Identity=' + core.urlencode(identity) +
            //'&RoleID=' + core.urlencode(roleID) +
            //'&UserRankID=' + core.urlencode(userRankID) +
            //'&Avatar=' + core.urlencode(avatar) +
            //'&AccountID=' + core.urlencode(accountID) +
            //'&IsActived=' + core.urlencode(isActived);

            var ajax = new Ajax();
            ajax.SendRequestToServerWithCustomMsg(_strPageForFontEnd, strRequest, register_OnCallBack, true, MSG_AJAX_FETCHING_VN);
        }
        else {
            core.disableControl("btnOK", false);
        }
    }

    function register_OnCallBack(xmlHTTPRequest) {
        core.disableControl("btnOK", false);
        if (xmlHTTPRequest.readyState == 4) {
            if (xmlHTTPRequest.status == 200) {
                var strRespond = core.parserXML(xmlHTTPRequest.responseText);
                if (!core.headerProcessingArr(strRespond[0], Array(true, true, false))) {
                    // ph?i kh?i t?o l?i d? tr?nh d?ng popdiv addFavourite
                    //var popDiv = new PopDiv();
                    //popDiv.init();
                    //popDiv.alert(MSG_RES_OPERATION_FAIL, SYSTEM_TITLE_ERROR, 1);
                    return;
                }
                if (parseInt(strRespond[1]['rs']) == 1) {
                    showInfoBar('success', strRespond[1]["inf"]);
                    alert("Success");
                }
                else {
                    //var popDiv = new PopDiv();
                    //popDiv.init();
                    // top.popDiv.childPop.alert(strRespond[1]["inf"], SYSTEM_TITLE_ERROR, 1);
                }
            }
        }
    }
    //endregion   
}
var _objUser = new User();
