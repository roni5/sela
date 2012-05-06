<?php

/* TODO: Add code here */
require('config/globalconfig.php');
include_once('class/model_articletype.php');

$objArticleType = new model_ArticleType($objConnection);
$htmlCategory =  $objArticleType->DisplayAllCategory();

$objUser = new Model_User($objConnection);

if ($_pgR["act"] == Model_User::ACT_)
{
	
}

?>

<?php
include_once('include/_header.inc');
include_once('include/_menu.inc');
?>
<?php 
echo $htmlCategory;
?>
<?php 
//footer
include_once('include/_footer.inc');
?>
