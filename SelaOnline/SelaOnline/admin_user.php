<?php
/*
 * This file was automatically generated By Code Smith 
 * Modifications will be overwritten when code smith is run
 *
 * PLEASE DO NOT MAKE MODIFICATIONS TO THIS FILE
 * Date Created 3/25/2012 6:10:04 PM
 *
 */

/// <summary>
/// Implementations of slusers represent a User
///
/// </summary>

/* TODO: Add code here */
require('config/globalconfig.php');
include_once('class/model_user.php');

?>
<?php

$objUser = new model_User($objConnection);

if ($_pgR["act"] == model_User::ACT_ADD)
{
	
	if (global_common::isCLogin())
	{
		//get user info
		//$c_userInfo = $_SESSION[consts::SES_C_USERINFO];
		
		//if ($objMenu->getMenuByName($_pgR['name'])) {
		//	echo global_common::convertToXML($arrHeader, array("rs",'info'), array(0,global_common::STRING_NAME_EXIST), array(0,1));
		//	return;
		//}

		//$strName = $_pgR['name'];
		//$strName = global_editor::rteSafe(html_entity_decode($strName,ENT_COMPAT ,'UTF-8' ));
		$resultID = $objUser->insert($userid,$username,$password,$fullname,$birthdate,$address,$phone,$email,$sex,$identity,$roleid,$userrankid,$avartar,$accountid,$isactived);
		if ($resultID)
		{
			$arrHeader = global_common::getMessageHeaderArr($banCode);//$banCode
			echo global_common::convertToXML(
					$arrHeader, array("rs", "inf"), 
					array(1, $result), 
					array( 0, 1 )
					);
			return;
		}
		else
		{
			echo global_common::convertToXML($arrHeader, array("rs","info"), array(0,"Input data is invalid"), array(0,1));
			return;
		}
	}
	else
	{
		echo global_common::convertToXML($arrHeader, array("rs",'info'), array(0,global_common::STRING_REQUIRE_LOGIN), array(0,1));
	}
	return;
}
elseif($_pgR['act'] == model_User::ACT_UPDATE)
{
	if (global_common::isCLogin())
	{
		//l?y th?ng tin user
		//$c_userInfo = $_SESSION[consts::SES_C_USERINFO];
		

        
		//$checkProduct = $objMenu->getMenuByName($_pgR['name']);
		//if ($checkProduct && $checkProduct['menu_id']!= $strID) {
		//	echo global_common::convertToXML($arrHeader, array("rs",'info'), array(0,global_common::STRING_NAME_EXIST), array(0,1));
		//	return;
		//}
		//$strName = $_pgR['name'];
		//$strDetail= $_pgR['detail'];
		$resultID = $objUser->update($userid,$username,$password,$fullname,$birthdate,$address,$phone,$email,$sex,$identity,$roleid,$userrankid,$avartar,$accountid,$isactived);
		
		if ($resultID)
		{
			$arrHeader = global_common::getMessageHeaderArr($banCode);//$banCode
			
			echo global_common::convertToXML(
					$arrHeader, array("rs", "inf"), 
					array(1, $result ), 
					array( 0, 1 )
					);
			return;
		}
		else
		{
			echo global_common::convertToXML($arrHeader, array("rs"), array(0), array(0));
			return;
		}
	}
	else
	{
		echo global_common::convertToXML($arrHeader, array("rs",'info'), array(0,global_common::STRING_REQUIRE_LOGIN), array(0,1));
	}
	return;
}
elseif($_pgR['act'] == model_User::ACT_CHANGE_PAGE)
{
	$intPage = $_pgR['p'];
	
	$outPutHTML =  $objUser->getListUser($intPage);
	echo global_common::convertToXML($strMessageHeader, array('rs','inf'), array(1,$outPutHTML),array(0,1));
	return ;
}
elseif($_pgR['act'] == model_User::ACT_SHOW_EDIT)
{
	
	$strUserID = $_pgR['id'];
	$arrUser =  $objUser->getUserByID($strUserID);
	
	echo global_common::convertToXML($strMessageHeader, array('rs','UserID','UserName','Password','Fullname','BirthDate','Address','Phone','Email','Sex','Identity','RoleID','UserRankID','Avartar','AccountID','IsActived'), array(1,'UserID','UserName','Password','Fullname','BirthDate','Address','Phone','Email','Sex','Identity','RoleID','UserRankID','Avartar','AccountID','IsActived'),array(0,1,1,1,1,1,1,1,1,0,1,1,1,1,1,0));
	return ;
}
elseif ($_pgR["act"] == model_User::ACT_GET)
{		
	$sectionID = $_pgR["sect"];
	$arrSection= $objMenu->getAllMenuBySection($sectionID);
	if($arrSection)
	{
		$strHTML = $objMenu->outputHTMLMenu($arrSection);
		echo global_common::convertToXML($arrHeader, array("rs", "inf"), 
				array(1, $strHTML), array(0, 1));
		return;	
	}
	else
	{
		echo global_common::convertToXML($arrHeader, array("rs",'inf'),array(0,'Kh?ng c? nh?m h?ng'),array(0,0));
		return ;
	}
}
elseif($_pgR['act'] == model_User::ACT_DELETE)
{
	
	$IDName = "menu_id";
	$contentID = $_pgR["id"];
	$strTableName = user_menu::TBL_T_MENU;
	$result = global_common::updateDeleteFlag($contentID,$IDName,$strTableName ,$_pgR["status"],$objConnection);
	if($result)
	{
		$IDName = "content_id";
		$strTableName = user_faq::TBL_T_FAQ;
		$result = global_common::updateDeleteFlag($contentID,$IDName,$strTableName ,$_pgR["status"],$objConnection);
	}
	$arrHeader = global_common::getMessageHeaderArr($banCode=0,0);
	$arrKey = array("rs","id");
	$arrValue = array($result?1:0,$contentID);
	$arrIsMetaData = array(0, 1);
	echo global_common::convertToXML($arrHeader, $arrKey, $arrValue, $arrIsMetaData);
	
	return;
}
?>

<?php
include_once('include/_header.inc');
include_once('include/_menu.inc');
?>
<script type="text/javascript" src="<?php echo $_objSystem->locateJs('sela_User.js');?>"></script>
	
<!--Begin Form Input -->
<input type="hidden" id="adddocmode" name="adddocmode" value="1<?php //echo $intMode;?>" />
<input type="hidden" id="txtPage" name="txtPage" value="<?php echo $_pgR["p"]?$intPage:1;?>" />
<input type="hidden" id="txtID" name="txtID" value="" />
 <center>
<br><h2 align="center">Mananage User</h2>
		<div class="input-field-border input-field-content" >
				<div id="lgTitle" class="div_admin_group_title" style="">
				<span style="cursor:default; font-family:inherit" id='status-add' name='status-add'>Add Mode</span></div>
				
				<div class="div_admin_group_content_inside" style="width: 100%; top: -20px;">
				    <table id="tblPopUp" style="width: 100%;" border="0" cellpadding="2" cellspacing="0">
                        <tbody>
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>UserID</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td width='567'><input id='txtUserID' name='txtUserID' value='' style='width: 49.5%;'  maxlength='60' type='text'></td>
						</tr>
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>UserName</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td width='567'><input id='txtUserName' name='txtUserName' value='' style='width: 49.5%;'  maxlength='150' type='text'></td>
						</tr>
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>Password</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td width='567'><input id='txtPassword' name='txtPassword' value='' style='width: 49.5%;'  maxlength='765' type='text'></td>
						</tr>
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>Fullname</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td width='567'><input id='txtFullname' name='txtFullname' value='' style='width: 49.5%;'  maxlength='765' type='text'></td>
						</tr>
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>BirthDate</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td width='567'><input id='txtBirthDate' name='txtBirthDate' value='' style='width: 49.5%;'  maxlength='0' type='text'></td>
						</tr>
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>Address</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td width='567'><input id='txtAddress' name='txtAddress' value='' style='width: 49.5%;'  maxlength='765' type='text'></td>
						</tr>
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>Phone</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td width='567'><input id='txtPhone' name='txtPhone' value='' style='width: 49.5%;'  maxlength='60' type='text'></td>
						</tr>
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>Email</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td width='567'><input id='txtEmail' name='txtEmail' value='' style='width: 49.5%;'  maxlength='765' type='text'></td>
						</tr>
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>Sex</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td width='567'><input id='txtSex' name='txtSex' value='' style='width: 49.5%;'  maxlength='0' type='chec'></td>
						</tr>
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>Identity</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td width='567'><input id='txtIdentity' name='txtIdentity' value='' style='width: 49.5%;'  maxlength='60' type='text'></td>
						</tr>
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>RoleID</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td width='567'><input id='txtRoleID' name='txtRoleID' value='' style='width: 49.5%;'  maxlength='60' type='text'></td>
						</tr>
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>UserRankID</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td width='567'><input id='txtUserRankID' name='txtUserRankID' value='' style='width: 49.5%;'  maxlength='60' type='text'></td>
						</tr>
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>Avartar</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td width='567'><input id='txtAvartar' name='txtAvartar' value='' style='width: 49.5%;'  maxlength='765' type='text'></td>
						</tr>
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>AccountID</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td width='567'><input id='txtAccountID' name='txtAccountID' value='' style='width: 49.5%;'  maxlength='765' type='text'></td>
						</tr>
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>IsActived</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td width='567'><input id='txtIsActived' name='txtIsActived' value='' style='width: 49.5%;'  maxlength='0' type='chec'></td>
						</tr>
                        </tbody>
                    </table>
				</div>
	

				<div class="div_admin_group_content_inside" style="margin: 4px; display: block;" align="center">		
				  <input id="btnOK" value="OK"  style="width: 50px;" onClick="_objsection.btnSave_OnClick()" type="button" class="btn btn-oliver"> &nbsp;&nbsp;&nbsp;
				  <input id="btnClose" value="Cancel" align="center" style="width: 65px;" onClick="_objUser.showAddMode()" type="button" class="btn btn-oliver">  
			  </div>					
		</div>	
	
		</center>
<!--End Form Input -->

   <div  id="content-admin" >
                    <div align="center">
	                    <h2>Danh s?ch</h2>									
					</div>
					<div id="list-content" style="padding:10px">
						<?php echo $objUser ->getListUser(1) ?>					
						</div>
	</div>

<?php 
//footer
include_once('include/_footer.inc');
?>
