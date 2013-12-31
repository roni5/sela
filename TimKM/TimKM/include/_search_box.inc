<div id="search-box">
<label>
		<select id="optlocation">
			<option>Tỉnh/Thành Phố</option>
			<option>Hồ chí minh</option>
		</select>
	</label>
	<label>
		<select id="optlocation">
			<option>Quận/Huyện</option>
			<option>Quận 1</option>
		</select>
	</label>
	<input type="text" id="txtkeyword" placeholder="Tìm kiếm..."> 
	<input type="button" class="btnSearch" value=""/>	
<?php
if (global_common::isCLogin())
{
				?>
				<a href="post_article.php" class="btn btn-large">Đăng Tim Mới</a>
				
	<?php
}
				?>
	
</div>