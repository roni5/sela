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
/// Implementations of slcomments represent a Comment
///
/// </summary>

/* TODO: Add code here */
require('config/globalconfig.php');
include_once('class/model_comment.php');

?>
<?php

$objComment = new model_Comment($objConnection);

if ($_pgR["act"] == model_Comment::ACT_ADD)
{
	
	if (global_common::isCLogin())
	{
		//get user info
		//$c_userInfo = $_SESSION[consts::SES_C_USERINFO];
		
		//if ($objMenu->getMenuByName($_pgR['name'])) {
		//	echo global_common::convertToXML($arrHeader, array("rs",'info'), array(0,global_common::STRING_NAME_EXIST), array(0,1));
		//	return;
		//}

		$createdBy = $_pgR['CreatedBy'];
		$createdBy = global_editor::rteSafe(html_entity_decode($createdBy,ENT_COMPAT ,'UTF-8' ));
		$createdDate = $_pgR['CreatedDate'];
		$createdDate = global_editor::rteSafe(html_entity_decode($createdDate,ENT_COMPAT ,'UTF-8' ));
		$modifiedBy = $_pgR['ModifiedBy'];
		$modifiedBy = global_editor::rteSafe(html_entity_decode($modifiedBy,ENT_COMPAT ,'UTF-8' ));
		$modifiedDate = $_pgR['ModifiedDate'];
		$modifiedDate = global_editor::rteSafe(html_entity_decode($modifiedDate,ENT_COMPAT ,'UTF-8' ));
		$deletedBy = $_pgR['DeletedBy'];
		$deletedBy = global_editor::rteSafe(html_entity_decode($deletedBy,ENT_COMPAT ,'UTF-8' ));
		$deletedDate = $_pgR['DeletedDate'];
		$deletedDate = global_editor::rteSafe(html_entity_decode($deletedDate,ENT_COMPAT ,'UTF-8' ));
		$isDeleted = $_pgR['IsDeleted'];
		$isDeleted = global_editor::rteSafe(html_entity_decode($isDeleted,ENT_COMPAT ,'UTF-8' ));
		//$strName = $_pgR['name'];
		//$strName = global_editor::rteSafe(html_entity_decode($strName,ENT_COMPAT ,'UTF-8' ));
		$resultID = $objComment->insert($commentid,$commenttype,$articleid,$content,$status);
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
elseif($_pgR['act'] == model_Comment::ACT_UPDATE)
{
	if (global_common::isCLogin())
	{
		//l?y th?ng tin user
		//$c_userInfo = $_SESSION[consts::SES_C_USERINFO];
		

		$createdBy = $_pgR['CreatedBy'];
		$createdBy = global_editor::rteSafe(html_entity_decode($createdBy,ENT_COMPAT ,'UTF-8' ));
		$createdDate = $_pgR['CreatedDate'];
		$createdDate = global_editor::rteSafe(html_entity_decode($createdDate,ENT_COMPAT ,'UTF-8' ));
		$modifiedBy = $_pgR['ModifiedBy'];
		$modifiedBy = global_editor::rteSafe(html_entity_decode($modifiedBy,ENT_COMPAT ,'UTF-8' ));
		$modifiedDate = $_pgR['ModifiedDate'];
		$modifiedDate = global_editor::rteSafe(html_entity_decode($modifiedDate,ENT_COMPAT ,'UTF-8' ));
		$deletedBy = $_pgR['DeletedBy'];
		$deletedBy = global_editor::rteSafe(html_entity_decode($deletedBy,ENT_COMPAT ,'UTF-8' ));
		$deletedDate = $_pgR['DeletedDate'];
		$deletedDate = global_editor::rteSafe(html_entity_decode($deletedDate,ENT_COMPAT ,'UTF-8' ));
		$isDeleted = $_pgR['IsDeleted'];
		$isDeleted = global_editor::rteSafe(html_entity_decode($isDeleted,ENT_COMPAT ,'UTF-8' ));
        
		//$checkProduct = $objMenu->getMenuByName($_pgR['name']);
		//if ($checkProduct && $checkProduct['menu_id']!= $strID) {
		//	echo global_common::convertToXML($arrHeader, array("rs",'info'), array(0,global_common::STRING_NAME_EXIST), array(0,1));
		//	return;
		//}
		//$strName = $_pgR['name'];
		//$strDetail= $_pgR['detail'];
		$resultID = $objComment->update($commentid,$commenttype,$articleid,$content,$status);
		
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
elseif($_pgR['act'] == model_Comment::ACT_CHANGE_PAGE)
{
	$intPage = $_pgR['p'];
	
	$outPutHTML =  $objComment->getListComment($intPage);
	echo global_common::convertToXML($strMessageHeader, array('rs','inf'), array(1,$outPutHTML),array(0,1));
	return ;
}
elseif($_pgR['act'] == model_Comment::ACT_SHOW_EDIT)
{
	
	$strCommentID = $_pgR['id'];
	$arrComment =  $objComment->getCommentByID($strCommentID);
	
	echo global_common::convertToXML($strMessageHeader, array('rs','CommentID','CommentType','ArticleID','Content','Status'), array(1,'CommentID','CommentType','ArticleID','Content','Status'),array(0,1,1,1,1,1));
	return ;
}
elseif ($_pgR["act"] == model_Comment::ACT_GET)
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
elseif($_pgR['act'] == model_Comment::ACT_DELETE)
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
<script type="text/javascript" src="<?php echo $_objSystem->locateJs('sela_Comment.js');?>"></script>
	
<!--Begin Form Input -->
<input type="hidden" id="adddocmode" name="adddocmode" value="1<?php //echo $intMode;?>" />
<input type="hidden" id="txtPage" name="txtPage" value="<?php echo $_pgR["p"]?$intPage:1;?>" />
<input type="hidden" id="txtID" name="txtID" value="" />
 <center>
<br><h2 align="center">Mananage Comment</h2>
		<div class="input-field-border input-field-content" >
				<div id="lgTitle" class="div_admin_group_title" style="">
				<span style="cursor:default; font-family:inherit" id='status-add' name='status-add'>Add Mode</span></div>
				
				<div class="div_admin_group_content_inside" style="width: 100%; top: -20px;">
				    <table id="tblPopUp" style="width: 100%;" border="0" cellpadding="2" cellspacing="0">
                        <tbody>
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>CommentID</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td width='567'><input id='txtCommentID' name='txtCommentID' value='' style='width: 49.5%;'  maxlength='60' type='text'></td>
						</tr>
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>CommentType</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td width='567'><input id='txtCommentType' name='txtCommentType' value='' style='width: 49.5%;'  maxlength='60' type='text'></td>
						</tr>
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>ArticleID</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td width='567'><input id='txtArticleID' name='txtArticleID' value='' style='width: 49.5%;'  maxlength='60' type='text'></td>
						</tr>
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>Content</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td width='567'><texarea id='txtContent' name='txtContent' value='' style='width: 49.5%;'  maxlength='65535' type='text'></td>
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
				  <input id="btnOK" value="OK"  style="width: 50px;" onClick="_objsection.btnSave_OnClick()" type="button" class="btn btn-oliver"> &nbsp;&nbsp;&nbsp;
				  <input id="btnClose" value="Cancel" align="center" style="width: 65px;" onClick="_objComment.showAddMode()" type="button" class="btn btn-oliver">  
			  </div>					
		</div>	
	
		</center>
<!--End Form Input -->

   <div  id="content-admin" >
                    <div align="center">
	                    <h2>Danh s?ch</h2>									
					</div>
					<div id="list-content" style="padding:10px">
						<?php echo $objComment ->getListComment(1) ?>					
						</div>
	</div>

<?php 
//footer
include_once('include/_footer.inc');
?>
