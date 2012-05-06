<?php

/* TODO: Add code here */
require('config/globalconfig.php');
include_once('class/model_articletype.php');

$objArticleType = new model_ArticleType($objConnection);
$htmlCategory =  $objArticleType->DisplayAllCategory();

?>

<?php
include_once('include/_header.inc');
include_once('include/_menu.inc');
?>

<div class="article-memo">
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
</div>
<div class="article-memo">
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
</div>
<?php 
//footer
include_once('include/_footer.inc');
?>
