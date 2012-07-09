<?php
$arrTypes = global_common::array_column($arrCategory,global_mapping::ArticleTypeID);
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
		echo			$item[global_mapping::ArticleTypeName];
		echo '		</h1>';
		foreach($arrTopArticles as $article)
		{
			//echo 'itemID:'.$item[global_mapping::ArticleTypeID].'<br>';
			//echo $article[global_mapping::ArticleType].'<br>';
			if($item[global_mapping::ArticleTypeID] == $article[global_mapping::ArticleType])
			{			
				echo '<div class="article-memo">
						<div class="article-memo-detail">
						<div class="article-memo-content">
						<div class="article-memo-control">control</div>
						<h2>HELLO247-CHUYÊN BÁN BA LÔ, TÚI XÁCH ĐI LÀM-ĐỰNG LAPTOP-ĐI HỌC- NAM NỮ GIÁ hấp dẫn</h2>
						<div class="article-short-info">
						<span><b>sukoi</b> Comment: 24-12-2012</span>
						<span class="paging"> 
						<a>1</a> <a> 2</a 
						</span>
						</div>
						</div>
						</div>
						<div class="article-memo-user">
						<div class="user-info">
						<div><img src="/image/default/default_logo.jpg" width="120" height="100" /></div>
						User info
						</div>
						</div>
						</div>';
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