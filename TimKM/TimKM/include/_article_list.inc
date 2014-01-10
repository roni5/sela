<?php

$articles = $objArticle->getTopArticleByType('7',10);
//print_r($articles);
?>
<style>
 

</style>
<div id="article-list">	
	<div id="articles">
	<?php
		foreach($articles as $item)
{
	$thumbnail = $item[global_mapping::FileName];
	if($thumbnail)
	{
		$thumbnail = '/images/150x150.gif';
	}
	echo '
			<div class="item">	
			<div class="info article-thumbnail">
			<a href="article_detail.php?id='.$item[global_mapping::ArticleID].'" title="'.$item[global_mapping::Title].'"><img src="'.$thumbnail.'" /></a>
			</div>		
			<div class="info price"><a href="#">'.$item[global_mapping::AdType].'</a></div>
			<div class="info name">
			<a href="article_detail.php?id='.$item[global_mapping::ArticleID].'">'.$item[global_mapping::CompanyName].'</a>
			</div>
			<div class="info artcile-title">'.$item[global_mapping::Title].'</div>
			<div class="info">Bat dau: '.global_common::formatDateVN($item[global_mapping::StartDate]).'</div>
			<div class="info">Ket thuc: '.global_common::formatDateVN($item[global_mapping::EndDate]).'</div>		
			</div>';
}
		?>	
	</div>
	<div id="advertises">
		<?php 
		//article
			include_once('_advertises.inc');
		?>	
	</div>
</div>