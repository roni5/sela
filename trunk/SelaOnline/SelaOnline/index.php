<?php

/* TODO: Add code here */
require('config/globalconfig.php');
include_once('class/model_articletype.php');

$objArticleType = new model_ArticleType($objConnection);
$objArticleType->DisplayAllCategory();

?>