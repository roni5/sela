<?php 
$section = $_pgR['txtSect'];
$cat = $_pgR['txtCat'];
$arrSection = $objSection->getAllSection();
$objSection = new user_section($objConnection);
$objCat = new user_catalogue($objConnection);
$strHTMLSection = $objSection->outputHTMLSection($arrSection,$section);
$strHTMLCat='';
if($section)
{
	$arrCat = $objCat->getAllCatBySection($section);
	$strHTMLCat = $objCat->outputHTMLCatalogue($arrCat,$cat);
}

?>
<div id="search-box">
		<div id="search_box_title" >Tìm kiếm:</div>
		<form id="frmSearch" name="frmSearch" action="search.php" method="GET" onsubmit="//return submitSearch();">
			<div>
				<?php 
				echo $strHTMLSection
				?>
				<div id="content-cat">
					<?php if($strHTMLCat)
					{
						echo $strHTMLCat;
					}
					else  
					{
		 			?>
					 <select id="txtcat" class="frmSearch-item combo-box" disabled="disabled">
						<option value="0" selected="selected">--Chọn nhóm hàng--</option>
					  </select>
			  <?php }?>
				</div>
				<input class="frmSearch-item text" type="text" id="sct" name="sct" autocomplete="on" value="<?php echo isset($_pgR['sct'])?global_common::formatOutputText($_pgR['sct']):'';   ?>" size="50" />
				<input class="frmSearch-item submit icon icon-search" type="submit" value="" /> 
				<a href="javascript:showAdvantage()" class="under-line" >Show Advantage</a>
				<div class="search-item-advantage">
					<span class="item-search-advantage">
						 <select id="txtManu" class="" >
								<option value="0" selected="selected">--Chọn NSX--</option>
								<option value="1">Nokia</option>
						</select>
					</span>
					<span class="item-search-advantage">User Guide: Tất cả <input type="radio" checked='checked' name="guide"/> Có <input type="radio" name="guide"/> Không <input type="radio" name="guide"/></span>
					<span>Sơ đồ: Tất cả <input type="radio" checked='checked' name="map"/> Có <input type="radio" name="map" /> Không <input type="radio" name="map"/></span>
				</div>
			</div>
        </form>
</div>

<script>
function showAdvantage()
{
	if ($('.search-item-advantage').css('display') == "none")
		$('.search-item-advantage').show();
	else
		$('.search-item-advantage').hide();
}

</script>