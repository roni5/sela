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
	<div id="articles">
	<?php
		for($i=0;$i<20;$i++)
	{
		?>	
		<div class="item">	
			<div class="info article-thumbnail">
				<a href="article_detail.php" title="Xem chi tiết khuyến mãi"><img src="/images/150x150.gif" /></a>
			</div>		
			<div class="info price"><a href="#">Giam 30%</a></div>
			<div class="info name">
				<a href="article_detail.php">An vat Aiya</a>
			</div>
			<div class="info artcile-title">Giam gia ngay Noel</div>
			<div class="info">Bat dau: 10/9/2013</div>
			<div class="info">Ket thuc: 10/9/2013</div>		
		</div>
		<?php
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