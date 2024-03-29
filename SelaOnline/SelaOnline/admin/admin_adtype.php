<?php
/*
 * This file was automatically generated By Code Smith 
 * Modifications will be overwritten when code smith is run
 *
 * PLEASE DO NOT MAKE MODIFICATIONS TO THIS FILE
 * Date Created 5/6/2012
 *
 */

/// <summary>
/// Implementations of sladtypes represent a AdType
///
/// </summary>
chdir("..");
/* TODO: Add code here */
require('config/globalconfig.php');
include_once('class/model_adtype.php');

?>
<?php

$objAdType = new Model_AdType($objConnection);

if ($_pgR["act"] == model_AdType::ACT_ADD)
{
	
	if (global_common::isCLogin())
	{
		//get user info
		//$c_userInfo = $_SESSION[consts::SES_C_USERINFO];
		
		//if ($objMenu->getMenuByName($_pgR['name'])) {
		//	echo global_common::convertToXML($arrHeader, array("rs",'info'), array(0,global_common::STRING_NAME_EXIST), array(0,1));
		//	return;
		//}

		$adTypeID = $_pgR['AdTypeID'];
		$adTypeID = global_editor::rteSafe(html_entity_decode($adTypeID,ENT_COMPAT ,'UTF-8' ));
		$adTypeName = $_pgR['AdTypeName'];
		$adTypeName = global_editor::rteSafe(html_entity_decode($adTypeName,ENT_COMPAT ,'UTF-8' ));
		$width = $_pgR['Width'];
		$width = global_editor::rteSafe(html_entity_decode($width,ENT_COMPAT ,'UTF-8' ));
		$height = $_pgR['Height'];
		$height = global_editor::rteSafe(html_entity_decode($height,ENT_COMPAT ,'UTF-8' ));
		$numOfDay = $_pgR['NumOfDay'];
		$numOfDay = global_editor::rteSafe(html_entity_decode($numOfDay,ENT_COMPAT ,'UTF-8' ));
		$displayPage = $_pgR['DisplayPage'];
		$displayPage = global_editor::rteSafe(html_entity_decode($displayPage,ENT_COMPAT ,'UTF-8' ));
		$cityID = $_pgR['CityID'];
		$cityID = global_editor::rteSafe(html_entity_decode($cityID,ENT_COMPAT ,'UTF-8' ));
		$status = $_pgR['Status'];
		$status = global_editor::rteSafe(html_entity_decode($status,ENT_COMPAT ,'UTF-8' ));
		//$strName = $_pgR['name'];
		//$strName = global_editor::rteSafe(html_entity_decode($strName,ENT_COMPAT ,'UTF-8' ));
		$resultID = $objAdType->insert($adTypeID,$adTypeName,$width,$height,$numOfDay,$displayPage,$cityID,$status);
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
elseif($_pgR['act'] == model_AdType::ACT_UPDATE)
{
	if (global_common::isCLogin())
	{
		//l?y th?ng tin user
		//$c_userInfo = $_SESSION[consts::SES_C_USERINFO];
		

		$adTypeID = $_pgR['AdTypeID'];
		$adTypeID = global_editor::rteSafe(html_entity_decode($adTypeID,ENT_COMPAT ,'UTF-8' ));
		$adTypeName = $_pgR['AdTypeName'];
		$adTypeName = global_editor::rteSafe(html_entity_decode($adTypeName,ENT_COMPAT ,'UTF-8' ));
		$width = $_pgR['Width'];
		$width = global_editor::rteSafe(html_entity_decode($width,ENT_COMPAT ,'UTF-8' ));
		$height = $_pgR['Height'];
		$height = global_editor::rteSafe(html_entity_decode($height,ENT_COMPAT ,'UTF-8' ));
		$numOfDay = $_pgR['NumOfDay'];
		$numOfDay = global_editor::rteSafe(html_entity_decode($numOfDay,ENT_COMPAT ,'UTF-8' ));
		$displayPage = $_pgR['DisplayPage'];
		$displayPage = global_editor::rteSafe(html_entity_decode($displayPage,ENT_COMPAT ,'UTF-8' ));
		$cityID = $_pgR['CityID'];
		$cityID = global_editor::rteSafe(html_entity_decode($cityID,ENT_COMPAT ,'UTF-8' ));
		$status = $_pgR['Status'];
		$status = global_editor::rteSafe(html_entity_decode($status,ENT_COMPAT ,'UTF-8' ));
        
		//$checkProduct = $objMenu->getMenuByName($_pgR['name']);
		//if ($checkProduct && $checkProduct['menu_id']!= $strID) {
		//	echo global_common::convertToXML($arrHeader, array("rs",'info'), array(0,global_common::STRING_NAME_EXIST), array(0,1));
		//	return;
		//}
		//$strName = $_pgR['name'];
		//$strDetail= $_pgR['detail'];
		$resultID = $objAdType->update($adTypeID,$adTypeName,$width,$height,$numOfDay,$displayPage,$cityID,$status);
		
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
elseif($_pgR['act'] == model_AdType::ACT_CHANGE_PAGE)
{
	$intPage = $_pgR['p'];
	
	$outPutHTML =  $objAdType->getListAdType($intPage);
	echo global_common::convertToXML($strMessageHeader, array('rs','inf'), array(1,$outPutHTML),array(0,1));
	return ;
}
elseif($_pgR['act'] == model_AdType::ACT_SHOW_EDIT)
{
	
	$strAdTypeID = $_pgR['id'];
	$arrAdType =  $objAdType->getAdTypeByID($strAdTypeID);
	
	echo global_common::convertToXML($strMessageHeader, array('rs','AdTypeID','AdTypeName','Width','Height','NumOfDay','DisplayPage','CityID','Status'), array(1,'AdTypeID','AdTypeName','Width','Height','NumOfDay','DisplayPage','CityID','Status'),array(0,1,1,0,0,0,1,1,1));
	return ;
}
elseif ($_pgR["act"] == model_AdType::ACT_GET)
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
elseif($_pgR['act'] == model_AdType::ACT_DELETE)
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
<script type="text/javascript" src="<?php echo $_objSystem->locateJs('sela_AdType.js');?>"></script>
	
<!--Begin Form Input -->
<input type="hidden" id="adddocmode" name="adddocmode" value="1<?php //echo $intMode;?>" />
<input type="hidden" id="txtPage" name="txtPage" value="<?php echo $_pgR["p"]?$intPage:1;?>" />
<input type="hidden" id="txtID" name="txtID" value="" />
 <center>
<br><h2 align="center">Mananage AdType</h2>
		<div class="input-field-border input-field-content" >
				<div id="lgTitle" class="div_admin_group_title" style="">
				<span style="cursor:default; font-family:inherit" id='status-add' name='status-add'>Add Mode</span></div>
				
				<div class="div_admin_group_content_inside" style="width: 100%; top: -20px;">
				    <table id="tblPopUp" style="width: 100%;" border="0" cellpadding="2" cellspacing="0">
                        <tbody>
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>AdTypeID</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td width='567'><input id='txtAdTypeID' name='txtAdTypeID' value='' style='width: 49.5%;'  maxlength='60' type='text'></td>
						</tr>
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>AdTypeName</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td width='567'><input id='txtAdTypeName' name='txtAdTypeName' value='' style='width: 49.5%;'  maxlength='150' type='text'></td>
						</tr>
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>Width</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td width='567'><input id='txtWidth' name='txtWidth' value='' style='width: 49.5%;'  maxlength='20' type='text'></td>
						</tr>
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>Height</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td width='567'><input id='txtHeight' name='txtHeight' value='' style='width: 49.5%;'  maxlength='20' type='text'></td>
						</tr>
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>NumOfDay</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td width='567'><input id='txtNumOfDay' name='txtNumOfDay' value='' style='width: 49.5%;'  maxlength='20' type='text'></td>
						</tr>
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>DisplayPage</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td width='567'><input id='txtDisplayPage' name='txtDisplayPage' value='' style='width: 49.5%;'  maxlength='60' type='text'></td>
						</tr>
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>CityID</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td width='567'><input id='txtCityID' name='txtCityID' value='' style='width: 49.5%;'  maxlength='60' type='text'></td>
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
				  <input id="btnOK" value="OK"  style="width: 50px;" onClick="_objAdType.btnSave_OnClick()" type="button" class="btn btn-oliver"> &nbsp;&nbsp;&nbsp;
				  <input id="btnClose" value="Cancel" align="center" style="width: 65px;" onClick="_objAdType.showAddMode()" type="button" class="btn btn-oliver">  
			  </div>					
		</div>	
	
		</center>
<!--End Form Input -->

   <div  id="content-admin" >
                    <div align="center">
	                    <h2>Danh s?ch</h2>									
					</div>
					<div id="list-content" style="padding:10px">
						<?php echo $objAdType ->getListAdType(1) ?>					
						</div>
	</div>

<?php 
//footer
include_once('include/_admin_footer.inc');
?>
