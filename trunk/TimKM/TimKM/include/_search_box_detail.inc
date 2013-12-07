<div id="search-box">
		<div id="search_box_title" >Tìm kiếm:</div>
		<form id="frmSearch" name="frmSearch" action="search_detail.php" method="GET" onsubmit="//return submitSearch();">
			<input type="hidden" id="product" name="product" value="<?php echo global_common::formatOutputText($product_id);?>" />
		<input type="hidden" id="cat" name="cat" value="<?php echo global_common::formatOutputText($cat_id);?>" />

<input type="hidden" id="cat" name="cat" value="<?php echo global_common::formatOutputText($_pgR["cat"]);?>" />
 
			  <input class="frmSearch-item text" type="text" id="sct" name="sct" autocomplete="on" value="<?php echo isset($_pgR['sct'])?global_common::formatOutputText($_pgR['sct']):'';   ?>" size="50" />
			  <input class="frmSearch-item submit icon icon-search" type="submit" value="" />
        </form>
</div>