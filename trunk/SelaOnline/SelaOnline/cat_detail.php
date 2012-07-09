<?php

/* TODO: Add code here */
require('config/globalconfig.php');
include_once('class/model_articletype.php');
include_once('class/model_article.php');

$objArticleType = new model_ArticleType($objConnection);
$objArticle = new model_Article($objConnection);
$htmlCategory =  $objArticleType->DisplayAllCategory();

?>

<?php
include_once('include/_header.inc');
include_once('include/_menu.inc');
if ($_pgR["catid"])
{
	$catID = $_pgR["catid"];
	$condition = global_mapping::ArticleType. '=\''.$catID.'\'';
	$orderBy = global_mapping::CreatedDate. ' DESC ';
	$arrArticle = $objArticle->getAllArticle('*',$condition,$orderBy);
}
include_once('include/_article_list.inc');
?>


<?php 
//footer
include_once('include/_footer.inc');
?>
