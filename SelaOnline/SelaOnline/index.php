<?php

/* TODO: Add code here */
require('config/globalconfig.php');
include_once('class/model_articletype.php');
include_once('class/model_article.php');
include_once('class/model_user.php');

$objArticleType = new model_ArticleType($objConnection);
$objArticle = new model_Article($objConnection);
$arrCategory =  $objArticleType->getAllArticleType();

$objUser = new Model_User($objConnection);

if ($_pgR["act"] == Model_User::ACT_LOGIN)
{
	
}

?>

<?php
include_once('include/_header.inc');
include_once('include/_menu.inc');
include_once('include/_cat_list.inc');
?>

<?php 
//footer
include_once('include/_footer.inc');
?>
