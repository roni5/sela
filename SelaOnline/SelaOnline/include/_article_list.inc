<?php
//require variable: $arrArticle
//print_r($arrTopArticles);
if($arrArticle && count($arrArticle)>0)
{
	foreach($arrArticle as $item)
	{
		echo $objArticle->getArticleMemo($item);
	}
	echo global_common::getPagingHTMLByNum(0,Model_Article::NUM_PER_PAGE,$total,'_objArticle.changePage');
}
?>