<?php

/* TODO: Add code here */
require('config/globalconfig.php');
include_once('class/model_user.php');
if ($_pgR["act"] == model_Article::ACT_ADD)
{
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
	$resultID = $objArticle->insert($articleid,$prefix,$title,$filename,$articletype,$content,$notificationtype,$tags,$catalogueid,$sectionid,$numview,$numcomment,$status);
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
	return;
}
?>