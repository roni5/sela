<div id="comment-content">
	<div id="comment-editor">
		<div class="title">		
			<img class="icon" src="images/icon-comment.png" /> Viết bình luận
		</div>
		<div class="clear"></div>
		<div class="avatar">
			<img src="/images/avatar.jpg" />
		</div>
		<div class="comment_box">
			<textarea placeholder="Nội dung bình luận"></textarea>
			<input class="btn" type="button" value="Gửi" />
		</div>
		
	</div>
	
	<div id="comment-list">	
		<?php
		for($i=0;$i<20;$i++)
		{
			?>	
			<div class="item">	
				<div class="avatar">
					<img src="/images/avatar.jpg" />
				</div>
				<div class="comment-detail">
					<div class="username">
					 <a href="#">Lam Phong Nguyen</a>	
					</div>
					<div class="comment-detail-content">
						Thanks Thanks Thanks Thanks Thanks Thanks Thanks Thanks Thanks Thanks Thanks Thanks Thanks Thanks Thanks Thanks Thanks Thanks Thanks Thanks Thanks Thanks Thanks Thanks Thanks Thanks Thanks Thanks Thanks 
					</div>					
				</div>
			</div>
			
		<?php 
		}?>	
	</div>
</div>