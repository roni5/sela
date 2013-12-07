<?php
//require variable: $arrArticle
//print_r($arrTopArticles);
/*if($arrArticle && count($arrArticle)>0)
{
	foreach($arrArticle as $item)
	{
		echo $objArticle->getArticleMemo($item);
	}
	echo global_common::getPagingHTMLByNum(0,Model_Article::NUM_PER_PAGE,$total,'_objArticle.changePage');
}
*/
?>
<style>
 

</style>
<div id="article-list">	
<?php
	for($i=0;$i<20;$i++)
{
	?>	
	<div class="item">	
		<div class="info article-thumbnail">
			<a><img src="/images/150x150.gif" /></a>
		</div>		
		<div class="info price"><a href="#">Giam 30%</a></div>
		<div class="info name">An vat Aiya</div>
		<div class="info artcile-title">Giam gia ngay Noel</div>
		<div class="info">Bat dau: 10/9/2013</div>
		<div class="info">Ket thuc: 10/9/2013</div>		
	</div>
	<?php
	}
	?>	
</div>