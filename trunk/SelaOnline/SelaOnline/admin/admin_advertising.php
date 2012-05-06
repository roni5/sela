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
/// Implementations of sladvertisings represent a Advertising
///
/// </summary>
chdir("..");
/* TODO: Add code here */
require('config/globalconfig.php');
include_once('class/model_advertising.php');

?>
<?php

$objAdvertising = new Model_Advertising($objConnection);

if ($_pgR["act"] == model_Advertising::ACT_ADD)
{
	
	if (global_common::isCLogin())
	{
		//get user info
		//$c_userInfo = $_SESSION[consts::SES_C_USERINFO];
		
		//if ($objMenu->getMenuByName($_pgR['name'])) {
		//	echo global_common::convertToXML($arrHeader, array("rs",'info'), array(0,global_common::STRING_NAME_EXIST), array(0,1));
		//	return;
		//}

		$advertisingID = $_pgR['AdvertisingID'];
		$advertisingID = global_editor::rteSafe(html_entity_decode($advertisingID,ENT_COMPAT ,'UTF-8' ));
		$advertisingName = $_pgR['AdvertisingName'];
		$advertisingName = global_editor::rteSafe(html_entity_decode($advertisingName,ENT_COMPAT ,'UTF-8' ));
		$partnerID = $_pgR['PartnerID'];
		$partnerID = global_editor::rteSafe(html_entity_decode($partnerID,ENT_COMPAT ,'UTF-8' ));
		$startDate = $_pgR['StartDate'];
		$startDate = global_editor::rteSafe(html_entity_decode($startDate,ENT_COMPAT ,'UTF-8' ));
		$endDate = $_pgR['EndDate'];
		$endDate = global_editor::rteSafe(html_entity_decode($endDate,ENT_COMPAT ,'UTF-8' ));
		$adTypeID = $_pgR['AdTypeID'];
		$adTypeID = global_editor::rteSafe(html_entity_decode($adTypeID,ENT_COMPAT ,'UTF-8' ));
		$imageLink = $_pgR['ImageLink'];
		$imageLink = global_editor::rteSafe(html_entity_decode($imageLink,ENT_COMPAT ,'UTF-8' ));
		$status = $_pgR['Status'];
		$status = global_editor::rteSafe(html_entity_decode($status,ENT_COMPAT ,'UTF-8' ));
		//$strName = $_pgR['name'];
		//$strName = global_editor::rteSafe(html_entity_decode($strName,ENT_COMPAT ,'UTF-8' ));
		$resultID = $objAdvertising->insert($advertisingID,$advertisingName,$partnerID,$startDate,$endDate,$adTypeID,$imageLink,$status);
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
elseif($_pgR['act'] == model_Advertising::ACT_UPDATE)
{
	if (global_common::isCLogin())
	{
		//l?y th?ng tin user
		//$c_userInfo = $_SESSION[consts::SES_C_USERINFO];
		

		$advertisingID = $_pgR['AdvertisingID'];
		$advertisingID = global_editor::rteSafe(html_entity_decode($advertisingID,ENT_COMPAT ,'UTF-8' ));
		$advertisingName = $_pgR['AdvertisingName'];
		$advertisingName = global_editor::rteSafe(html_entity_decode($advertisingName,ENT_COMPAT ,'UTF-8' ));
		$partnerID = $_pgR['PartnerID'];
		$partnerID = global_editor::rteSafe(html_entity_decode($partnerID,ENT_COMPAT ,'UTF-8' ));
		$startDate = $_pgR['StartDate'];
		$startDate = global_editor::rteSafe(html_entity_decode($startDate,ENT_COMPAT ,'UTF-8' ));
		$endDate = $_pgR['EndDate'];
		$endDate = global_editor::rteSafe(html_entity_decode($endDate,ENT_COMPAT ,'UTF-8' ));
		$adTypeID = $_pgR['AdTypeID'];
		$adTypeID = global_editor::rteSafe(html_entity_decode($adTypeID,ENT_COMPAT ,'UTF-8' ));
		$imageLink = $_pgR['ImageLink'];
		$imageLink = global_editor::rteSafe(html_entity_decode($imageLink,ENT_COMPAT ,'UTF-8' ));
		$status = $_pgR['Status'];
		$status = global_editor::rteSafe(html_entity_decode($status,ENT_COMPAT ,'UTF-8' ));
        
		//$checkProduct = $objMenu->getMenuByName($_pgR['name']);
		//if ($checkProduct && $checkProduct['menu_id']!= $strID) {
		//	echo global_common::convertToXML($arrHeader, array("rs",'info'), array(0,global_common::STRING_NAME_EXIST), array(0,1));
		//	return;
		//}
		//$strName = $_pgR['name'];
		//$strDetail= $_pgR['detail'];
		$resultID = $objAdvertising->update($advertisingID,$advertisingName,$partnerID,$startDate,$endDate,$adTypeID,$imageLink,$status);
		
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
elseif($_pgR['act'] == model_Advertising::ACT_CHANGE_PAGE)
{
	$intPage = $_pgR['p'];
	
	$outPutHTML =  $objAdvertising->getListAdvertising($intPage);
	echo global_common::convertToXML($strMessageHeader, array('rs','inf'), array(1,$outPutHTML),array(0,1));
	return ;
}
elseif($_pgR['act'] == model_Advertising::ACT_SHOW_EDIT)
{
	
	$strAdvertisingID = $_pgR['id'];
	$arrAdvertising =  $objAdvertising->getAdvertisingByID($strAdvertisingID);
	
	echo global_common::convertToXML($strMessageHeader, array('rs','AdvertisingID','AdvertisingName','PartnerID','StartDate','EndDate','AdTypeID','ImageLink','Status'), array(1,'AdvertisingID','AdvertisingName','PartnerID','StartDate','EndDate','AdTypeID','ImageLink','Status'),array(0,1,1,1,1,1,1,1,1));
	return ;
}
elseif ($_pgR["act"] == model_Advertising::ACT_GET)
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
elseif($_pgR['act'] == model_Advertising::ACT_DELETE)
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
<script type="text/javascript" src="<?php echo $_objSystem->locateJs('sela_Advertising.js');?>"></script>
	
<!--Begin Form Input -->
<input type="hidden" id="adddocmode" name="adddocmode" value="1<?php //echo $intMode;?>" />
<input type="hidden" id="txtPage" name="txtPage" value="<?php echo $_pgR["p"]?$intPage:1;?>" />
<input type="hidden" id="txtID" name="txtID" value="" />
 <center>
<br><h2 align="center">Mananage Advertising</h2>
		<div class="input-field-border input-field-content" >
				<div id="lgTitle" class="div_admin_group_title" style="">
				<span style="cursor:default; font-family:inherit" id='status-add' name='status-add'>Add Mode</span></div>
				
				<div class="div_admin_group_content_inside" style="width: 100%; top: -20px;">
				    <table id="tblPopUp" style="width: 100%;" border="0" cellpadding="2" cellspacing="0">
                        <tbody>
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>AdvertisingID</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td width='567'><input id='txtAdvertisingID' name='txtAdvertisingID' value='' style='width: 49.5%;'  maxlength='60' type='text'></td>
						</tr>
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>AdvertisingName</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td width='567'><input id='txtAdvertisingName' name='txtAdvertisingName' value='' style='width: 49.5%;'  maxlength='150' type='text'></td>
						</tr>
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>PartnerID</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td width='567'><input id='txtPartnerID' name='txtPartnerID' value='' style='width: 49.5%;'  maxlength='60' type='text'></td>
						</tr>
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>StartDate</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td width='567'><input id='txtStartDate' name='txtStartDate' value='' style='width: 49.5%;'  maxlength='0' type='text'></td>
						</tr>
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>EndDate</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td width='567'><input id='txtEndDate' name='txtEndDate' value='' style='width: 49.5%;'  maxlength='0' type='text'></td>
						</tr>
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>AdTypeID</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td width='567'><input id='txtAdTypeID' name='txtAdTypeID' value='' style='width: 49.5%;'  maxlength='60' type='text'></td>
						</tr>
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>ImageLink</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td width='567'><input id='txtImageLink' name='txtImageLink' value='' style='width: 49.5%;'  maxlength='765' type='text'></td>
						</tr>
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>Status</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td width='567'><input id='txtStatus' name='txtStatus' value='' style='width: 49.5%;'  maxlength='60' type='text'></td>
						</tr>
                        </tbody>
                    </table>
				</div>
	

				<div class="div_admin_group_content_inside" style="margin: 4px; display: block;" align="center">		
				  <input id="btnOK" value="OK"  style="width: 50px;" onClick="_objAdvertising.btnSave_OnClick()" type="button" class="btn btn-oliver"> &nbsp;&nbsp;&nbsp;
				  <input id="btnClose" value="Cancel" align="center" style="width: 65px;" onClick="_objAdvertising.showAddMode()" type="button" class="btn btn-oliver">  
			  </div>					
		</div>	
	
		</center>
<!--End Form Input -->

   <div  id="content-admin" >
                    <div align="center">
	                    <h2>Danh s?ch</h2>									
					</div>
					<div id="list-content" style="padding:10px">
						<?php echo $objAdvertising ->getListAdvertising(1) ?>					
						</div>
	</div>

<?php 
//footer
include_once('include/_admin_footer.inc');
?>