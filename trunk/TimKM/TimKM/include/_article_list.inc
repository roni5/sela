<?php
$objArticleType = new model_ArticleType($objConnection);
$objArticle = new model_Article($objConnection);

$catID = $_pgR["cid"];

$allCats = $objArticleType->getAllArticleType(0,null,'ParentID='.$catID,null);
if(count($allCats)<=0)
{
	$allCatIDs = $catID;
}
else
{
	$allCatIDs = global_common::getArrayColumn($allCats,global_mapping::ArticleTypeID);
}
//print_r($allCats);

//print_r($allCatIDs);

$condidtion =global_mapping::StartDate.' <= \''.global_common::nowSQL().'\''.
	' And '.global_mapping::EndDate.' >= \''.global_common::nowSQL().'\'';
$articles = $objArticle->getTopArticleByType($allCatIDs,global_common::DEFAULT_TOP_ITEMS,null,$condidtion);
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
	if(!$thumbnail)
	{
		$thumbnail = '/images/150x150.gif';
	}
	echo '
			<div class="item">	
			<div class="info article-thumbnail">
			<a href="article_detail.php?aid='.$item[global_mapping::ArticleID].'" title="'.$item[global_mapping::Title].'"><img src="'.$thumbnail.'" /></a>
			</div>		
			<div class="info price"><a href="#">'.$item[global_mapping::AdType].'</a></div>
			<div class="info name">
			<a href="article_detail.php?aid='.$item[global_mapping::ArticleID].'">'.$item[global_mapping::CompanyName].'</a>
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