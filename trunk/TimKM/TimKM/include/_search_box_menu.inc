<div id="search-box" align="center" style="padding-left:200px" >
		<div id="search_box_title" >Tìm kiếm:</div>
		<form id="frmSearch" name="frmSearch" action="search_menu.php" method="GET" onsubmit="//return submitSearch();">
			  <input class="frmSearch-item text" type="text" id="sct" name="sct" autocomplete="on" value="<?php echo isset($_pgR['sct'])?global_common::formatOutputText($_pgR['sct']):'';   ?>" size="50" />
			  <input class="frmSearch-item submit icon icon-search" type="submit" value="" />
        </form>
</div>