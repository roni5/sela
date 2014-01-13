<?php
if ($_pgR["aid"])
{
	$articleID = $_pgR["aid"];
	$article = $objArticle->getArticleByID($articleID);
	//$intPage = 1;
	//$total = 0;
	//$comments = $objComment->getCommentByArticle($intPage,$total,$articleID,'*','',' CreatedDate DESC');
	//print_r($article);
	$addresses = global_common::splitString($article[global_mapping::Addresses],';');
	$districts = global_common::splitString($article[global_mapping::Dictricts],';');
	$cities = global_common::splitString($article[global_mapping::Cities],';');
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
echo '<p>'.$article[global_mapping::Title].' '.$article[global_mapping::AdType].'</p>';
echo '<br>';
echo '<p>Thời hạn từ '.global_common::formatDateVN($article[global_mapping::StartDate]).
		' đến '.global_common::formatDateVN($article[global_mapping::EndDate]).'</p>';
if($article[global_mapping::HappyDays])
{
	echo '<p>Happy day '.$article[global_mapping::HappyDays];
}

if($article[global_mapping::StartHappyHour])
{
	echo '<p>Happy hour '.$article[global_mapping::StartHappyHour].($article[global_mapping::EndHappyHour]? ' - '.$article[global_mapping::EndHappyHour]:'');
}
			
echo '<p class="">Áp dụng chương trình khuyến mãi tại:</p>';
$total = count($addresses);
if($total>0)
{
	for($i=0; $i<$total; $i++)
	{
		echo '		<div class="">';
		echo '			<p class="">'.$addresses[$i].'</span>, <span class="location-district">'.$districts[$i].'</span>, <span class="location-city">'.$cities[$i].'</p> ';
		echo '		</div>';
	}
}
else
{
	echo		'<p class="">Toàn bộ hệ thống</p> ';
	
}
			?>
			</div>
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
			<div class="title">
				Liên hệ:
			</div>
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
			<div class="title">
				Áp dụng KM tại:
			</div>
			<img class="map-address" src="images/map.jpg" />
		</div>
		<div id="company_partner">
			<img class="partner" src="images/partner.jpg" />
			<img class="partner" src="images/partner.jpg" />
			<img class="partner" src="images/partner.jpg" />
		</div>
	</div>
</div>