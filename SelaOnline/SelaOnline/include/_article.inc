<script type="text/javascript" src="<?php echo $_objSystem->locateJs('sela_comment.js');?>"></script>
<script type="text/javascript">
		bkLib.onDomLoaded(function() {
			new nicEditor(
			{
				buttonList : ['save','bold','italic','underline','left','center','right','justify','ol','ul','fontSize','fontFamily','fontFormat','indent','outdent','image','link','unlink','forecolor','bgcolor'],
				
			})
			.panelInstance('comment-editor');
		});
		$(document).ready(function(){
			$('#btnPostComment').click(function(){
				_objComment.addUserComment();
			});
		});
   </script>
<?php
//require variable: $article
//print_r($article);
if($article)
{	
	//print_r($article);
	if($article[global_mapping::CreatedBy][global_mapping::Avatar])
	{
		$avatar = '/file/avatar/'.$article[global_mapping::CreatedBy][global_mapping::Avatar];
	}
	else
	{
		$avatar = '/image/default/default_logo.jpg';
	}
	echo '<div class="article-content">';
	echo '	<div class="article-memo">';
	echo '		<div class="article-memo-detail">';
	echo '			<div class="article-memo-content">';
	echo '				<div class="article-memo-control">';
	echo '					<div class="favourite"> LIKE </div>';
	echo '				</div>';
	echo '				<h2><a href="article_detail.php?articleid='.$article[global_mapping::ArticleID].'"> '.$article['Title'].'</a></h2>';
	echo '			<div class="content-detail">';
	echo '				<div class="content-block">dadaddsadadasd dadaddsadadasd dadaddsadadasd dadaddsadadasd dadaddsadadasd dadaddsadadasd dadaddsadadasd dadaddsadadasd dadaddsadadasd dadaddsadadasd ';
	echo					$article[global_mapping::Content];
	echo '				</div>';	
	echo '			</div>';
	echo '			</div>';
	
	echo '		</div>';
	echo '		<div class="article-memo-user">';
	echo '			<div class="user-info">';
	echo '				<div><img src="'.$avatar.'" width="120" height="100" /></div>';
	echo '				<div class="username">'.$article[global_mapping::CreatedBy][global_mapping::UserName].'</div>';
	echo '				<div class="created-date">'.$article[global_mapping::CreatedBy][global_mapping::CreatedDate].'</div>';
	echo '			</div>';
	echo '		</div>';
	echo '		<input type=hidden id="articleID" value="'.$article[global_mapping::ArticleID].'" />';
	echo '	</div>';
	echo '	<div class="zone-content">';
	
	echo '	</div>';
	echo '</div>';
	
}
?>