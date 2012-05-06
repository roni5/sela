<?php
/*
 * This file was automatically generated By Code Smith 
 * Modifications will be overwritten when code smith is run
 *
 * PLEASE DO NOT MAKE MODIFICATIONS TO THIS FILE
 * Date Created 5/6/2012 1:07:07 PM
 *
 */

/// <summary>
/// Implementations of slrequests represent a Request
///
/// </summary>
chdir("..");
/* TODO: Add code here */
require('config/globalconfig.php');
include_once('class/model_request.php');

?>
<?php

$objRequest = new Model_Request($objConnection);

if ($_pgR["act"] == model_Request::ACT_ADD)
{
	
	if (global_common::isCLogin())
	{
		//get user info
		//$c_userInfo = $_SESSION[consts::SES_C_USERINFO];
		
		//if ($objMenu->getMenuByName($_pgR['name'])) {
		//	echo global_common::convertToXML($arrHeader, array("rs",'info'), array(0,global_common::STRING_NAME_EXIST), array(0,1));
		//	return;
		//}

		$requesID = $_pgR['RequesID'];
		$requesID = global_editor::rteSafe(html_entity_decode($requesID,ENT_COMPAT ,'UTF-8' ));
		$contentRequest = $_pgR['ContentRequest'];
		$contentRequest = global_editor::rteSafe(html_entity_decode($contentRequest,ENT_COMPAT ,'UTF-8' ));
		$requestedBy = $_pgR['RequestedBy'];
		$requestedBy = global_editor::rteSafe(html_entity_decode($requestedBy,ENT_COMPAT ,'UTF-8' ));
		$requestedDate = $_pgR['RequestedDate'];
		$requestedDate = global_editor::rteSafe(html_entity_decode($requestedDate,ENT_COMPAT ,'UTF-8' ));
		$contentRespone = $_pgR['ContentRespone'];
		$contentRespone = global_editor::rteSafe(html_entity_decode($contentRespone,ENT_COMPAT ,'UTF-8' ));
		$responedBy = $_pgR['ResponedBy'];
		$responedBy = global_editor::rteSafe(html_entity_decode($responedBy,ENT_COMPAT ,'UTF-8' ));
		$responedDate = $_pgR['ResponedDate'];
		$responedDate = global_editor::rteSafe(html_entity_decode($responedDate,ENT_COMPAT ,'UTF-8' ));
		$isApproved = $_pgR['IsApproved'];
		$isApproved = global_editor::rteSafe(html_entity_decode($isApproved,ENT_COMPAT ,'UTF-8' ));
		//$strName = $_pgR['name'];
		//$strName = global_editor::rteSafe(html_entity_decode($strName,ENT_COMPAT ,'UTF-8' ));
		$resultID = $objRequest->insert($requesID,$contentRequest,$requestedBy,$requestedDate,$contentRespone,$responedBy,$responedDate,$isApproved,);
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
elseif($_pgR['act'] == model_Request::ACT_UPDATE)
{
	if (global_common::isCLogin())
	{
		//l?y th?ng tin user
		//$c_userInfo = $_SESSION[consts::SES_C_USERINFO];
		

		$requesID = $_pgR['RequesID'];
		$requesID = global_editor::rteSafe(html_entity_decode($requesID,ENT_COMPAT ,'UTF-8' ));
		$contentRequest = $_pgR['ContentRequest'];
		$contentRequest = global_editor::rteSafe(html_entity_decode($contentRequest,ENT_COMPAT ,'UTF-8' ));
		$requestedBy = $_pgR['RequestedBy'];
		$requestedBy = global_editor::rteSafe(html_entity_decode($requestedBy,ENT_COMPAT ,'UTF-8' ));
		$requestedDate = $_pgR['RequestedDate'];
		$requestedDate = global_editor::rteSafe(html_entity_decode($requestedDate,ENT_COMPAT ,'UTF-8' ));
		$contentRespone = $_pgR['ContentRespone'];
		$contentRespone = global_editor::rteSafe(html_entity_decode($contentRespone,ENT_COMPAT ,'UTF-8' ));
		$responedBy = $_pgR['ResponedBy'];
		$responedBy = global_editor::rteSafe(html_entity_decode($responedBy,ENT_COMPAT ,'UTF-8' ));
		$responedDate = $_pgR['ResponedDate'];
		$responedDate = global_editor::rteSafe(html_entity_decode($responedDate,ENT_COMPAT ,'UTF-8' ));
		$isApproved = $_pgR['IsApproved'];
		$isApproved = global_editor::rteSafe(html_entity_decode($isApproved,ENT_COMPAT ,'UTF-8' ));
        
		//$checkProduct = $objMenu->getMenuByName($_pgR['name']);
		//if ($checkProduct && $checkProduct['menu_id']!= $strID) {
		//	echo global_common::convertToXML($arrHeader, array("rs",'info'), array(0,global_common::STRING_NAME_EXIST), array(0,1));
		//	return;
		//}
		//$strName = $_pgR['name'];
		//$strDetail= $_pgR['detail'];
		$resultID = $objRequest->update($requesID,$contentRequest,$requestedBy,$requestedDate,$contentRespone,$responedBy,$responedDate,$isApproved,);
		
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
elseif($_pgR['act'] == model_Request::ACT_CHANGE_PAGE)
{
	$intPage = $_pgR['p'];
	
	$outPutHTML =  $objRequest->getListRequest($intPage);
	echo global_common::convertToXML($strMessageHeader, array('rs','inf'), array(1,$outPutHTML),array(0,1));
	return ;
}
elseif($_pgR['act'] == model_Request::ACT_SHOW_EDIT)
{
	
	$strRequestID = $_pgR['id'];
	$arrRequest =  $objRequest->getRequestByID($strRequestID);
	
	echo global_common::convertToXML($strMessageHeader, array('rs','RequesID','ContentRequest','RequestedBy','RequestedDate','ContentRespone','ResponedBy','ResponedDate','IsApproved',), array(1,'RequesID','ContentRequest','RequestedBy','RequestedDate','ContentRespone','ResponedBy','ResponedDate','IsApproved',),array(0,1,1,1,1,1,1,1,0,));
	return ;
}
elseif ($_pgR["act"] == model_Request::ACT_GET)
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
elseif($_pgR['act'] == model_Request::ACT_DELETE)
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
include_once('include/_admin_header.inc');
include_once('include/_admin_menu.inc');
?>
<script type="text/javascript" src="<?php echo $_objSystem->locateJs('sela_Request.js');?>"></script>
	
<!--Begin Form Input -->
<input type="hidden" id="adddocmode" name="adddocmode" value="1<?php //echo $intMode;?>" />
<input type="hidden" id="txtPage" name="txtPage" value="<?php echo $_pgR["p"]?$intPage:1;?>" />
<input type="hidden" id="txtID" name="txtID" value="" />
 <center>
<br><h2 align="center">Mananage Request</h2>
		<div class="input-field-border input-field-content" >
				<div id="lgTitle" class="div_admin_group_title" style="">
				<span style="cursor:default; font-family:inherit" id='status-add' name='status-add'>Add Mode</span></div>
				
				<div class="div_admin_group_content_inside" style="width: 100%; top: -20px;">
				    <table id="tblPopUp" style="width: 100%;" border="0" cellpadding="2" cellspacing="0">
                        <tbody>
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>RequesID</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td width='567'><input id='txtRequesID' name='txtRequesID' value='' style='width: 49.5%;'  maxlength='60' type='text'></td>
						</tr>
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>ContentRequest</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td width='567'><textarea id='txtContentRequest' name='txtContentRequest'  style='width: 49.5%;'  maxlength='65535' ></textarea></td>
						</tr>
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>RequestedBy</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td width='567'><input id='txtRequestedBy' name='txtRequestedBy' value='' style='width: 49.5%;'  maxlength='60' type='text'></td>
						</tr>
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>RequestedDate</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td width='567'><input id='txtRequestedDate' name='txtRequestedDate' value='' style='width: 49.5%;'  maxlength='0' type='text'></td>
						</tr>
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>ContentRespone</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td width='567'><textarea id='txtContentRespone' name='txtContentRespone'  style='width: 49.5%;'  maxlength='65535' ></textarea></td>
						</tr>
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>ResponedBy</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td width='567'><input id='txtResponedBy' name='txtResponedBy' value='' style='width: 49.5%;'  maxlength='60' type='text'></td>
						</tr>
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>ResponedDate</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td width='567'><input id='txtResponedDate' name='txtResponedDate' value='' style='width: 49.5%;'  maxlength='0' type='text'></td>
						</tr>
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>IsApproved</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td width='567'><input id='txtIsApproved' name='txtIsApproved' value='' style='width: 49.5%;'  maxlength='0' type='chec'></td>
						</tr>
                        </tbody>
                    </table>
				</div>
	

				<div class="div_admin_group_content_inside" style="margin: 4px; display: block;" align="center">		
				  <input id="btnOK" value="OK"  style="width: 50px;" onClick="_objRequest.btnSave_OnClick()" type="button" class="btn btn-oliver"> &nbsp;&nbsp;&nbsp;
				  <input id="btnClose" value="Cancel" align="center" style="width: 65px;" onClick="_objRequest.showAddMode()" type="button" class="btn btn-oliver">  
			  </div>					
		</div>	
	
		</center>
<!--End Form Input -->

   <div  id="content-admin" >
                    <div align="center">
	                    <h2>Danh s?ch</h2>									
					</div>
					<div id="list-content" style="padding:10px">
						<?php echo $objRequest ->getListRequest(1) ?>					
						</div>
	</div>

<?php 
//footer
include_once('include/_admin_footer.inc');
?>
