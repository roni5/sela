<?php
$objArticleType = new model_ArticleType($objConnection);
$objArticleType = new model_ArticleType($objConnection);
$objArticle = new model_Article($objConnection);
if($_pgR["cid"])
{
	$parentID = 0;
	$catID = $_pgR["cid"];
	$cat = $objArticleType->getArticleTypeByID($catID);
	if($cat[global_mapping::ParentID] == '0' || $cat[global_mapping::ParentID] == 0)
	{
		$parentID = $cat[global_mapping::ArticleTypeID];
		$parentCat = $cat;
	}
	else
	{
		$parentID = $cat[global_mapping::ParentID];
		$parentCat = $objArticleType->getArticleTypeByID($parentID);
	}
	$strCats = global_common::convertToQueryIN($catID);
	$allCats = $objArticleType->getAllArticleType(0,null,'ParentID='.$parentID,null);
}
elseif($_pgR["aid"])
{
	$articleID = $_pgR["aid"];
	$cats = $objArticle->getArticleTypesByID($articleID);
	$strCats = global_common::convertToQueryIN($cats);
	$catID = $cats[0];
	$cat = $objArticleType->getArticleTypeByID($catID);
	$parentID = $cat[global_mapping::ParentID];
	$parentCat = $objArticleType->getArticleTypeByID($parentID);
	$allCats = $objArticleType->getAllArticleType(0,null,'ParentID='.$parentID,null);
}


?>
<div id="left-sider">
	
	<ul>
<?php 
echo $parentCat[global_mapping::ArticleTypeName];
foreach($allCats as $item)
{
	$classActive = '';
	$link = 'article_list.php?cid='.$item[global_mapping::ArticleTypeID];
	if(strpos($strCats,'\''.$item[global_mapping::ArticleTypeID].'\'') !== false)
	{
		$classActive = 'active';
	}
	echo '<li class="'.$classActive.'">';
	echo '	<a href="'.$link.'">	'.$item[global_mapping::ArticleTypeName].'</a>';
	echo '</li>';
}
			?>
	</ul>
	
</div>