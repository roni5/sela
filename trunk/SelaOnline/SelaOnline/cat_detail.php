<?php

/* TODO: Add code here */
require('config/globalconfig.php');
include_once('class/model_articletype.php');
include_once('class/model_article.php');
include_once('class/model_user.php');

$objArticleType = new Model_ArticleType($objConnection);
$objArticle = new Model_Article($objConnection);
$objUser= new Model_User($objConnection);
$htmlCategory =  $objArticleType->DisplayAllCategory();
?>
<script type="text/javascript" src="<?php echo $_objSystem->locateJs('sela_article.js');?>"></script>
<?php
include_once('include/_header.inc');
include_once('include/_menu.inc');
if ($_pgR["catid"])
{
	$catID = $_pgR["catid"];
	$intPage = $_pgR['p'];
	$condition = global_mapping::ArticleType. '=\''.$catID.'\'';
	$orderBy = global_mapping::CreatedDate. ' DESC ';
	//$arrArticle = $objArticle->getAllArticle('*',$condition,$orderBy);
	
	$arrArticle = $objArticle->getArticleByType($intPage,$total,$catID);
	$outPutHTML = $objArticle->getHTMLArticles($arrArticle,$intPage,$total);
}

?>
<div id='list-content'>
<?php echo $outPutHTML?>
</div>
<input type="hidden" id="catID" name="catID" value="<?php  echo ($_pgR['catid']?$_pgR['catid']:1)?>" />
<?php 
//footer
include_once('include/_footer.inc');
?>
