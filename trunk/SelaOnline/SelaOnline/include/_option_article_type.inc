<?php
include_once('class/model_articletype.php');

/* TODO: Add code here */
$objArticleType = new Model_ArticleType($objConnection);
$arrArticleType = $objArticleType->getAllArticleType();
echo '<select id="txtArticleType">';
foreach($arrArticleType as $item)
{
	echo '<option value='.$item['ArticleTypeID'].'>';
	echo $item['ArticleTypeName'];
	echo '</option>';
}
echo '</select>';
?>