<?php
/* TODO: Add code here */
require('config/globalconfig.php');
include_once('class/model_article.php');
$objArticle = new Model_Article($objConnection);

if ($_pgR["act"] == model_Article::ACT_ADD)
{
	
	if (global_common::isCLogin())
	{
		//get user info
		$c_userInfo = $_SESSION[global_common::SES_C_USERINFO];
		//print_r($c_userInfo);
		//if ($objMenu->getMenuByName($_pgR['name'])) {
		//	echo global_common::convertToXML($arrHeader, array("rs",'info'), array(0,global_common::STRING_NAME_EXIST), array(0,1));
		//	return;
		//}
		//print_r($_pgR);
		$title = $_pgR[global_mapping::Title];
		$title = global_editor::rteSafe(html_entity_decode($title,ENT_COMPAT ,'UTF-8' ));
		$content = $_pgR[global_mapping::Content];
		$content = global_editor::rteSafe(html_entity_decode($content,ENT_COMPAT ,'UTF-8' ));
		$tags = $_pgR[global_mapping::Tags];
		$tags = global_editor::rteSafe(html_entity_decode($tags,ENT_COMPAT ,'UTF-8' ));
		$catalogueID = $_pgR[global_mapping::CatalogueID];
		
		$sectionID = $_pgR[global_mapping::SectionID];
		
		
		$renewedNum = global_editor::rteSafe(html_entity_decode($renewedNum,ENT_COMPAT ,'UTF-8' ));
		$companyName = global_editor::rteSafe(html_entity_decode($_pgR[global_mapping::CompanyName],ENT_COMPAT ,'UTF-8' ));
		$companyAddress = global_editor::rteSafe(html_entity_decode($_pgR[global_mapping::CompanyAddress],ENT_COMPAT ,'UTF-8' ));
		$companyWebsite = global_editor::rteSafe(html_entity_decode($_pgR[global_mapping::CompanyWebsite],ENT_COMPAT ,'UTF-8' ));
		$companyPhone = global_editor::rteSafe(html_entity_decode($_pgR[global_mapping::CompanyPhone],ENT_COMPAT ,'UTF-8' ));
		$adType = global_editor::rteSafe(html_entity_decode($_pgR[global_mapping::AdType],ENT_COMPAT ,'UTF-8' ));
		$startDate = global_editor::rteSafe(html_entity_decode($_pgR[global_mapping::StartDate],ENT_COMPAT ,'UTF-8' ));
		$endDate = global_editor::rteSafe(html_entity_decode($_pgR[global_mapping::EndDate],ENT_COMPAT ,'UTF-8' ));
		$happyDays = global_editor::rteSafe(html_entity_decode($_pgR[global_mapping::HappyDays],ENT_COMPAT ,'UTF-8' ));
		$startHappyHour = global_editor::rteSafe(html_entity_decode($_pgR[global_mapping::StartHappyHour],ENT_COMPAT ,'UTF-8' ));
		$endHappyHour = global_editor::rteSafe(html_entity_decode($_pgR[global_mapping::EndHappyHour],ENT_COMPAT ,'UTF-8' ));
		$addresses = global_editor::rteSafe(html_entity_decode($_pgR[global_mapping::Addresses],ENT_COMPAT ,'UTF-8' ));
		$dictricts = global_editor::rteSafe(html_entity_decode($_pgR[global_mapping::Dictricts],ENT_COMPAT ,'UTF-8' ));
		$cities = global_editor::rteSafe(html_entity_decode($_pgR[global_mapping::Cities],ENT_COMPAT ,'UTF-8' ));
		$fileName = global_editor::rteSafe(html_entity_decode($_pgR[global_mapping::FileName],ENT_COMPAT ,'UTF-8' ));
		$createdBy = $c_userInfo[global_mapping::UserID];
		$resultID = $objArticle->insert($title,$fileName, $content,null,$tags,$catalogueID,$createdBy,$renewedNum,$companyName,
				$companyAddress,$companyWebSit,$companyPhone,$adType,$startDate,$endDate,$happyDays,
				$startHappyHour,$endHappyHour, $addresses,$dictricts,$cities);
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
	//else
	//{
	//	echo global_common::convertToXML($arrHeader, array("rs",'info'), array(0,global_common::STRING_REQUIRE_LOGIN), array(0,1));
	//}
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
		$comments = $_pgR['comments'];
		$comments = global_editor::rteSafe(html_entity_decode($comments,ENT_COMPAT ,'UTF-8' ));
		$renewedDate = $_pgR['RenewedDate'];
		$renewedDate = global_editor::rteSafe(html_entity_decode($renewedDate,ENT_COMPAT ,'UTF-8' ));
		$renewedNum = $_pgR['RenewedNum'];
		$renewedNum = global_editor::rteSafe(html_entity_decode($renewedNum,ENT_COMPAT ,'UTF-8' ));
		$companyName = global_editor::rteSafe(html_entity_decode($_pgR[global_mapping::CompanyName],ENT_COMPAT ,'UTF-8' ));
		$companyAddress = global_editor::rteSafe(html_entity_decode($_pgR[global_mapping::CompanyAddress],ENT_COMPAT ,'UTF-8' ));
		$companyWebsite = global_editor::rteSafe(html_entity_decode($_pgR[global_mapping::CompanyWebsite],ENT_COMPAT ,'UTF-8' ));
		$companyPhone = global_editor::rteSafe(html_entity_decode($_pgR[global_mapping::CompanyPhone],ENT_COMPAT ,'UTF-8' ));
		$adType = global_editor::rteSafe(html_entity_decode($_pgR[global_mapping::AdType],ENT_COMPAT ,'UTF-8' ));
		$startDate = global_editor::rteSafe(html_entity_decode($_pgR[global_mapping::StartDate],ENT_COMPAT ,'UTF-8' ));
		$endDate = global_editor::rteSafe(html_entity_decode($_pgR[global_mapping::EndDate],ENT_COMPAT ,'UTF-8' ));
		$happyDays = global_editor::rteSafe(html_entity_decode($_pgR[global_mapping::HappyDays],ENT_COMPAT ,'UTF-8' ));
		$startHappyHour = global_editor::rteSafe(html_entity_decode($_pgR[global_mapping::StartHappyHour],ENT_COMPAT ,'UTF-8' ));
		$endHappyHour = global_editor::rteSafe(html_entity_decode($_pgR[global_mapping::EndHappyHour],ENT_COMPAT ,'UTF-8' ));
		$addresses = global_editor::rteSafe(html_entity_decode($_pgR[global_mapping::Addresses],ENT_COMPAT ,'UTF-8' ));
		$dictricts = global_editor::rteSafe(html_entity_decode($_pgR[global_mapping::Dictricts],ENT_COMPAT ,'UTF-8' ));
		$cities = global_editor::rteSafe(html_entity_decode($_pgR[global_mapping::Cities],ENT_COMPAT ,'UTF-8' ));
		
		//$checkProduct = $objMenu->getMenuByName($_pgR['name']);
		//if ($checkProduct && $checkProduct['menu_id']!= $strID) {
		//	echo global_common::convertToXML($arrHeader, array("rs",'info'), array(0,global_common::STRING_NAME_EXIST), array(0,1));
		//	return;
		//}
		//$strName = $_pgR['name'];
		//$strDetail= $_pgR['detail'];
		$resultID = $objArticle->update($articleID,$prefix,$title,$fileName,$articleType,$content,$notificationType,$tags,$catalogueID,$sectionID,$numView,$numComment,$status,$comments,$renewedDate,$renewedNum);
		
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
	
	echo global_common::convertToXML($strMessageHeader, array('rs','ArticleID','Prefix','Title','FileName','ArticleType','Content','NotificationType','Tags','CatalogueID','SectionID','NumView','NumComment','Status','comments','RenewedDate','RenewedNum'), array(1,'ArticleID','Prefix','Title','FileName','ArticleType','Content','NotificationType','Tags','CatalogueID','SectionID','NumView','NumComment','Status','comments','RenewedDate','RenewedNum'),array(0,1,1,1,1,1,1,1,1,1,1,0,0,1,1,1,0));
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