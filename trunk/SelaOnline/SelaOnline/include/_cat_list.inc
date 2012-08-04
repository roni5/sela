<?php
$arrTypes = global_common::getArrayColumn($arrCategory,global_mapping::ArticleTypeID);
$arrTopArticles = $objArticle->getTopArticleByType($arrTypes,3);
//print_r($arrTopArticles);
if($arrCategory && count($arrCategory)>0)
{
	echo '<div class="category-page">';
	echo '	<div class="category-list">';
	
	foreach($arrCategory as $item )
	{
		
		echo '	<div class="category-detail">';
		echo '		<h1 class="category-header">';
		echo			'<a href="cat_detail.php?catid='.$item[global_mapping::ArticleTypeID].'">'.$item[global_mapping::ArticleTypeName].'</a>';
		echo '		</h1>';
		foreach($arrTopArticles as $article)
		{
			//echo 'itemID:'.$item[global_mapping::ArticleTypeID].'<br>';
			//echo $article[global_mapping::ArticleType].'<br>';
			if($item[global_mapping::ArticleTypeID] == $article[global_mapping::ArticleType])
			{		
				echo $objArticle->getArticleMemo($article);	
			}
		}
		/*echo '		<div class="article-detail">';
		echo '			<div class="article-content">';
		echo				'Chuyên HDD, Đầu HD, các loại Loa, Âm Ly cao cấp: Denon, Jamo, Yamaha, system HD, 3D';
		echo '			</div>';
		echo '		</div>';*/
		echo '	</div>';
	}
	echo '	</div>';
	echo '</div>';
}
?>