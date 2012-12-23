<?php

/* TODO: Add code here */
require('config/globalconfig.php');
include_once('class/model_articletype.php');
include_once('class/model_article.php');
include_once('class/model_comment.php');
include_once('class/model_user.php');

$objArticleType = new model_ArticleType($objConnection);
$objArticle = new model_Article($objConnection);
$objComment = new Model_Comment($objConnection);
if ($_pgR["articleid"])
{
	$articleID = $_pgR["articleid"];
	$article = $objArticle->getArticleByID($articleID);
	$intPage = 1;
	$total = 0;
	$comments = $objComment->getCommentByArticle($intPage,$total,$articleID,'*','',' CreatedDate DESC');
}
?>

<?php
include_once('include/_header.inc');
include_once('include/_menu.inc');
include_once('include/_article.inc');
echo '<div id= "comment-list">';
include_once('include/_comment_list.inc');
echo '</div>';
include_once('include/_comment_editor.inc');

?>

<?php 
//footer
include_once('include/_footer.inc');
?>
