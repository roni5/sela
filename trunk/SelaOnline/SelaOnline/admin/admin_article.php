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
/// Implementations of slarticles represent a Article
///
/// </summary>
chdir("..");
/* TODO: Add code here */
require('config/globalconfig.php');
include_once('class/model_article.php');
include_once('class/model_articletype.php');

?>
<?php

$objArticle = new Model_Article($objConnection);
$objArticleType = new Model_ArticleType($objConnection);

if ($_pgR["act"] == model_Article::ACT_ADD)
{
	
	if (global_common::isCLogin())
	{
		//get user info
		//$c_userInfo = $_SESSION[consts::SES_C_USERINFO];
		
		//if ($objMenu->getMenuByName($_pgR['name'])) {
		//	echo global_common::convertToXML($arrHeader, array("rs",'info'), array(0,global_common::STRING_NAME_EXIST), array(0,1));
		//	return;
		//}

		$articleID = $_pgR['ArticleID'];
		$articleID = global_editor::rteSafe(html_entity_decode($articleID,ENT_COMPAT ,'UTF-8' ));
		$prefix = $_pgR['Prefix'];
		$prefix = global_editor::rteSafe(html_entity_decode($prefix,ENT_COMPAT ,'UTF-8' ));
		$title = $_pgR['Title'];
		$title = global_editor::rteSafe(html_entity_decode($title,ENT_COMPAT ,'UTF-8' ));
		$fileName = $_pgR['FileName'];
		$fileName = global_editor::rteSafe(html_entity_decode($fileName,ENT_COMPAT ,'UTF-8' ));
		$articleType = $_pgR['ArticleType'];
		$articleType = global_editor::rteSafe(html_entity_decode($articleType,ENT_COMPAT ,'UTF-8' ));
		$content = $_pgR['Content'];
		$content = global_editor::rteSafe(html_entity_decode($content,ENT_COMPAT ,'UTF-8' ));
		$notificationType = $_pgR['NotificationType'];
		$notificationType = global_editor::rteSafe(html_entity_decode($notificationType,ENT_COMPAT ,'UTF-8' ));
		$tags = $_pgR['Tags'];
		$tags = global_editor::rteSafe(html_entity_decode($tags,ENT_COMPAT ,'UTF-8' ));
		$catalogueID = $_pgR['CatalogueID'];
		$catalogueID = global_editor::rteSafe(html_entity_decode($catalogueID,ENT_COMPAT ,'UTF-8' ));
		$sectionID = $_pgR['SectionID'];
		$sectionID = global_editor::rteSafe(html_entity_decode($sectionID,ENT_COMPAT ,'UTF-8' ));
		$numView = $_pgR['NumView'];
		$numView = global_editor::rteSafe(html_entity_decode($numView,ENT_COMPAT ,'UTF-8' ));
		$numComment = $_pgR['NumComment'];
		$numComment = global_editor::rteSafe(html_entity_decode($numComment,ENT_COMPAT ,'UTF-8' ));
		$status = $_pgR['Status'];
		$status = global_editor::rteSafe(html_entity_decode($status,ENT_COMPAT ,'UTF-8' ));
		//$strName = $_pgR['name'];
		//$strName = global_editor::rteSafe(html_entity_decode($strName,ENT_COMPAT ,'UTF-8' ));
		$resultID = $objArticle->insert($prefix,$title,$fileName,$articleType,$content,$notificationType,$tags,$catalogueID,$sectionID,$numView,$numComment,$status);
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
		echo global_common::convertToXML($arrHeader, array("rs","info"), array(0,global_common::STRING_REQUIRE_LOGIN), array(0,1));
	}
	return;
}
elseif($_pgR['act'] == model_Article::ACT_UPDATE)
{
	if (global_common::isCLogin())
	{
		//l?y th?ng tin user
		//$c_userInfo = $_SESSION[consts::SES_C_USERINFO];
		

		$articleID = $_pgR['ArticleID'];
		$articleID = global_editor::rteSafe(html_entity_decode($articleID,ENT_COMPAT ,'UTF-8' ));
		$prefix = $_pgR['Prefix'];
		$prefix = global_editor::rteSafe(html_entity_decode($prefix,ENT_COMPAT ,'UTF-8' ));
		$title = $_pgR['Title'];
		$title = global_editor::rteSafe(html_entity_decode($title,ENT_COMPAT ,'UTF-8' ));
		$fileName = $_pgR['FileName'];
		$fileName = global_editor::rteSafe(html_entity_decode($fileName,ENT_COMPAT ,'UTF-8' ));
		$articleType = $_pgR['ArticleType'];
		$articleType = global_editor::rteSafe(html_entity_decode($articleType,ENT_COMPAT ,'UTF-8' ));
		$content = $_pgR['Content'];
		$content = global_editor::rteSafe(html_entity_decode($content,ENT_COMPAT ,'UTF-8' ));
		$notificationType = $_pgR['NotificationType'];
		$notificationType = global_editor::rteSafe(html_entity_decode($notificationType,ENT_COMPAT ,'UTF-8' ));
		$tags = $_pgR['Tags'];
		$tags = global_editor::rteSafe(html_entity_decode($tags,ENT_COMPAT ,'UTF-8' ));
		$catalogueID = $_pgR['CatalogueID'];
		$catalogueID = global_editor::rteSafe(html_entity_decode($catalogueID,ENT_COMPAT ,'UTF-8' ));
		$sectionID = $_pgR['SectionID'];
		$sectionID = global_editor::rteSafe(html_entity_decode($sectionID,ENT_COMPAT ,'UTF-8' ));
		$numView = $_pgR['NumView'];
		$numView = global_editor::rteSafe(html_entity_decode($numView,ENT_COMPAT ,'UTF-8' ));
		$numComment = $_pgR['NumComment'];
		$numComment = global_editor::rteSafe(html_entity_decode($numComment,ENT_COMPAT ,'UTF-8' ));
		$status = $_pgR['Status'];
		$status = global_editor::rteSafe(html_entity_decode($status,ENT_COMPAT ,'UTF-8' ));
        
		//$checkProduct = $objMenu->getMenuByName($_pgR['name']);
		//if ($checkProduct && $checkProduct['menu_id']!= $strID) {
		//	echo global_common::convertToXML($arrHeader, array("rs",'info'), array(0,global_common::STRING_NAME_EXIST), array(0,1));
		//	return;
		//}
		//$strName = $_pgR['name'];
		//$strDetail= $_pgR['detail'];
		$resultID = $objArticle->update($articleID,$prefix,$title,$fileName,$articleType,$content,$notificationType,$tags,$catalogueID,$sectionID,$numView,$numComment,$status);
		
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
elseif($_pgR['act'] == model_Article::ACT_CHANGE_PAGE)
{
	$intPage = $_pgR['p'];
	
	$outPutHTML =  $objArticle->getListArticle($intPage);
	echo global_common::convertToXML($strMessageHeader, array('rs','inf'), array(1,$outPutHTML),array(0,1));
	return ;
}
elseif($_pgR['act'] == model_Article::ACT_SHOW_EDIT)
{
	
	$strArticleID = $_pgR['id'];
	$arrArticle =  $objArticle->getArticleByID($strArticleID);
	
	echo global_common::convertToXML($strMessageHeader, array('rs','ArticleID','Prefix','Title','FileName','ArticleType','Content','NotificationType','Tags','CatalogueID','SectionID','NumView','NumComment','Status'), array(1,'ArticleID','Prefix','Title','FileName','ArticleType','Content','NotificationType','Tags','CatalogueID','SectionID','NumView','NumComment','Status'),array(0,1,1,1,1,1,1,1,1,1,1,0,0,1));
	return ;
}
elseif ($_pgR["act"] == model_Article::ACT_GET)
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
elseif($_pgR['act'] == model_Article::ACT_DELETE)
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
<script type="text/javascript" src="<?php echo $_objSystem->locateJs('sela_Article.js');?>"></script>
<script type="text/javascript">
bkLib.onDomLoaded(function() {
	new nicEditor(
	{
		buttonList : ['save','bold','italic','underline','left','center','right','justify','ol','ul','fontSize','fontFamily','fontFormat','indent','outdent','image','link','unlink','forecolor','bgcolor'],
		
	})
	.panelInstance('txtContent');
});
</script>
<!--Begin Form Input -->
<input type="hidden" id="adddocmode" name="adddocmode" value="1<?php //echo $intMode;?>" />
<input type="hidden" id="txtPage" name="txtPage" value="<?php echo $_pgR["p"]?$intPage:1;?>" />
<input type="hidden" id="txtID" name="txtID" value="" />
 <center>
<br><h2 align="center">Mananage Article</h2>
		<div class="input-field-border input-field-content" >
				<div id="lgTitle" class="div_admin_group_title" style="">
				<span style="cursor:default; font-family:inherit" id='status-add' name='status-add'>Add Mode</span></div>
				
				<div class="div_admin_group_content_inside" style="width: 100%; top: -20px;">
				    <table id="tblPopUp" style="width: 100%;" border="0" cellpadding="2" cellspacing="0">
                        <tbody>
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>Prefix</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td ><input id='txtPrefix' name='txtPrefix' value='' style='width: 80%;'  maxlength='765' type='text'></td>
						</tr>
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>Title</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td ><input id='txtTitle' name='txtTitle' value='' style='width: 80%;'  maxlength='765' type='text'></td>
						</tr>
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>FileName</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td ><input id='txtFileName' name='txtFileName' value='' style='width: 80%;'  maxlength='765' type='text'></td>
						</tr>
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>ArticleType</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td >
								<?php include_once('include/_option_article_type.inc');  ?>
							</td>
						</tr>
						
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>NotificationType</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td >
								<?php include_once('include/_option_notification_type.inc');  ?>
							</td>
						</tr>	
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>SectionID</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td >
								<?php include_once('include/_option_section_type.inc');  ?>
							</td>
						</tr>					
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>CatalogueID</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td >
								<?php include_once('include/_option_catalogue_type.inc');  ?>
							</td>
						</tr>
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>NumView</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td ><input id='txtNumView' name='txtNumView' value='' style='width: 80%;'  maxlength='20' type='text'></td>
						</tr>
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>NumComment</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td ><input id='txtNumComment' name='txtNumComment' value='' style='width: 80%;'  maxlength='20' type='text'></td>
						</tr>
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>Status</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td ><input id='txtStatus' name='txtStatus' value='' style='width: 80%;'  maxlength='60' type='text'></td>
						</tr>
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>Tags</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td ><textarea id='txtTags' name='txtTags'  style='width: 80%;'  maxlength='65535' ></textarea></td>
						</tr>
						<tr>
							<td width='110'><span style='cursor:default; font-family:inherit'>Content</span></td>
							<td width='10'><span class='forceFillForm'></span></td>
							<td>
							<div id="editor-txtContent">
								<textarea id='txtContent' name='txtContent'  style='width: 80.4%;height:400px'  maxlength='' ></textarea>
							</div>
							</td>
						</tr>
                        </tbody>
                    </table>
				</div>
	

				<div class="div_admin_group_content_inside" style="margin: 4px; display: block;" align="center">		
				 <input type="checkbox" />
				 <input id="btnOK" value="OK"  style="width: 50px;" onClick="_objArticle.btnSave_OnClick()" type="button" class="btn btn-oliver"> &nbsp;&nbsp;&nbsp;
				  <input id="btnClose" value="Cancel" align="center" style="width: 65px;" onClick="_objArticle.showAddMode()" type="button" class="btn btn-oliver">  
			  </div>					
		</div>	
	
		</center>
<!--End Form Input -->

   <div  id="content-admin" >
                    <div align="center">
	                    <h2>Danh s?ch</h2>									
					</div>
					<div id="list-content" style="padding:10px">
						<?php echo $objArticle ->getListArticle(1) ?>					
						</div>
	</div>

<?php 
//footer
include_once('include/_admin_footer.inc');
?>
