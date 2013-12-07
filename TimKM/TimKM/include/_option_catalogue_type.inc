<?php
include_once('class/model_articletype.php');

/* TODO: Add code here */
$objArticleType = new Model_ArticleType($objConnection);
$arrArticleType = $objArticleType->getArticleTypeByFilter('level=\'2\'');
echo '<select id="txtCatalogueID">';
foreach($arrArticleType as $item)
{
	echo '<option value='.$item['ArticleTypeID'].'>';
	echo $item['ArticleTypeName'];
	echo '</option>';
}
echo '</select>';
?>