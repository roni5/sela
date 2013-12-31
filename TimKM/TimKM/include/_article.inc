<?php
if ($_pgR["id"])
{
	$articleID = $_pgR["id"];
	$article = $objArticle->getArticleByID($articleID);
	//$intPage = 1;
	//$total = 0;
	//$comments = $objComment->getCommentByArticle($intPage,$total,$articleID,'*','',' CreatedDate DESC');
	//print_r($article);
}
?>
<div id="article">
	<div id="advertises">
<?php 
//article
include_once('_advertises.inc');
		?>	
	</div>
	<div id="article-detail">
		<div id="article-content">	
			<div class="name">
<?php 
echo $article[global_mapping::CompanyName]
			?>
			</div>	
<div class="title">
<?php 
echo $article[global_mapping::Title].' '.$article[global_mapping::AdType];
echo '<p>Thời hạn từ '.$article[global_mapping::StartDate].' đến '.$article[global_mapping::EndDate].'</p>';
if($article[global_mapping::HappyDays])
{
	echo '<p>Happy day '.$article[global_mapping::HappyDays];
}

if($article[global_mapping::StartHappyHour])
{
	echo '<p>Happy hour '.$article[global_mapping::StartHappyHour].($article[global_mapping::EndHappyHour]? ' - '.$article[global_mapping::EndHappyHour]:'');
}
			?></div>	
			<div class="content">
			
<?php 

echo $article[global_mapping::Content]
			?>
			</div>			
		</div>		
<?php 
//article
include_once('_comment_editor.inc');
		?>		
	</div>
	<div id="company-info">	
		<div id="company_address">
			<div class="name">
				<?php echo $article[global_mapping::CompanyName]?>
			</div>
			<div class="address">
				<?php echo $article[global_mapping::CompanyAddress]?>
			</div>
			<div class="mobile">
				<?php echo $article[global_mapping::CompanyPhone]?>
			</div>
			<div class="website">
				<?php echo $article[global_mapping::CompanyWebsite]?>
			</div>
		</div>
		<div id="company_map">
			<img class="map-address" src="images/map.jpg" />
		</div>
		<div id="company_partner">
			<img class="partner" src="images/partner.jpg" />
			<img class="partner" src="images/partner.jpg" />
			<img class="partner" src="images/partner.jpg" />
		</div>
	</div>
</div>