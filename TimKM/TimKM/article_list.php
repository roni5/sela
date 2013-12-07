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

?>
<link type="text/css" rel="stylesheet"  href="<?php echo $_objSystem->locateJPlugin('FlexSlider/flexslider.css');?>">
<script type="text/javascript" src="<?php echo $_objSystem->locateJPlugin('FlexSlider/jquery.flexslider-min.js');?>"></script>

<script type="text/javascript"> 

</script>

<?php 
//left side
include_once('include/_left_side.inc');
?>
<?php 
//right side
include_once('include/_right_side.inc');
?>
<?php 
//search box
include_once('include/_search_box.inc');
?>
<?php 
//article list
include_once('include/_article_list.inc');
?>
<?php 
//footer
include_once('include/_footer.inc');
?>
