<?php
//require variable: $arrArticle
//print_r($arrTopArticles);
if($arrArticle && count($arrArticle)>0)
{	
	foreach($arrArticle as $item)
	{
		echo $objArticle->getArticleMemo($item);
	}
}
?>