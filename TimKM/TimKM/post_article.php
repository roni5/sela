<?php
/* TODO: Add code here */
require('config/globalconfig.php');
include_once('include/_permission.inc');
include_once('include/_header.inc');
include_once('class/model_articletype.php');
include_once('class/model_article.php');
include_once('class/model_comment.php');
include_once('class/model_user.php');

$objArticle = new Model_Article($objConnection);
$objArticleType = new Model_ArticleType($objConnection);
$intMode = 0;//add mode
$parentTypes = $objArticleType->getAllArticleType(0,null, 'ParentID=0','Level');
$allTypes = $objArticleType->getAllArticleType(0,null, 'ParentID='.$parentTypes[0][global_mapping::ArticleTypeID] ,'Level');
if ($_pgR["id"])
{
	$articleID = $_pgR["id"];
	$article = $objArticle->getArticleByID($articleID);
	
	$intMode = 1;//edit mode
	$createBy = $article[global_mapping::CreatedBy];
	$currentUserID = $_SESSION[global_common::SES_C_USERINFO][global_mapping::UserID];
	if($createBy != $currentUserID)
	{
		global_common::redirectByScript("index.php");
		return;
	}
	//print_r($article[global_mapping::ArticleID]);
	$currentTypes = $objArticle->getArticleTypesByID($article[global_mapping::ArticleID]);
	//print_r($currentTypes);
	$type = $objArticleType->getArticleTypeByID($currentTypes[0]);
	$currentParentType = $type[global_mapping::ParentID];
	//print_r($currentParentType);
	$parentTypes = $objArticleType->getAllArticleType(0,null, 'ParentID=0','Level');
	
	$allTypes = $objArticleType->getAllArticleType(0,null, 'ParentID='.$currentParentType ,'Level');
	//print_r($allTypes);
	$addresses = global_common::splitString($article[global_mapping::Addresses],';');
	$districts = global_common::splitString($article[global_mapping::Dictricts],';');
	$cities = global_common::splitString($article[global_mapping::Cities],';');
	
	//print_r($parentTypes);
	//$intPage = 1;
	//$total = 0;
	//$comments = $objComment->getCommentByArticle($intPage,$total,$articleID,'*','',' CreatedDate DESC');
	//print_r($article);
}

?>
<script type="text/javascript" src="<?php echo $_objSystem->locateJs('user_article.js');?>"></script>
<script type="text/javascript" src="<?php echo $_objSystem->locateJs('user_articletype.js');?>"></script>
<div id="post-page" class="span10">
	<form method="POST" class="form-horizontal" id="post-article">
		<!--Begin Form Input -->
		<input type="hidden" id="adddocmode" name="adddocmode" value="<?php echo $intMode;?>" />
		<input type="hidden" id="ArticleID" name="ArticleID" value="<?php echo $articleID;?>" />
		<div class="table-post">
			<div class="control-group">
				<div class="controls">
					<h1 class="m-wrap title"><?php echo $intMode?'Cập nhật bài viết':'Đăng tin khuyến mãi' ?></h1>
				</div>
			</div>
			<div class="control-group margin-auto">
				<div class="controls">
					<label class="m-wrap">(*) là thông tin bắt buộc</label>
					<label class="m-wrap">KM: Khuyến mãi</label>
				</div>
			</div>
			<div class="control-group zone">
				<div class="controls">
					<h2 class="m-wrap zone-title">Thông tin đơn vị kinh doanh</h2>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Tên đơn vị *</label>
				<div class="controls">
					<input type="text" name="txtCompanyName" id="txtCompanyName" 
						class="text m-wrap span6" maxlength="255" value="<?php echo $article[global_mapping::CompanyName];?>" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Địa chỉ *</label>
				<div class="controls">
					<input type="text" name="txtCompanyAddress" id="txtCompanyAddress" class="text m-wrap span6" 
					maxlength="255" value="<?php echo $article[global_mapping::CompanyAddress];?>"/>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Web/Facebook</label>
				<div class="controls">
					<input type="text" name="txtCompanySite" id="txtCompanySite" class="text m-wrap" 
						maxlength="255" value="<?php echo $article[global_mapping::CompanyWebsite];?>" />
					<label class="m-wrap inline">Điện thoại *</label>
					<input type="text" name="txtCompanyPhone" id="txtCompanyPhone" class="text m-wrap span3" 
					placeholder="Vd: 0123456789, 0123-456-789,..." maxlength="50" value="<?php echo $article[global_mapping::CompanyPhone];?>"/>
				</div>
			</div>
			<div class="control-group zone">
				<div class="controls">
					<h2 class="m-wrap zone-title">Thông tin khuyễn mãi</h2>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Lĩnh vực *</label>
				<div class="controls">	
					<select class="span6 chosen" name="cmArea" id="cmArea" data-placeholder="Chọn lĩnh vực" tabindex="1" onchange="articleType.bindCategory(this);">
<?php
foreach($parentTypes as $item)
{
	if($item[global_mapping::ArticleTypeID] == $currentParentType)
		echo '			<option selected="selected" value="'.$item[global_mapping::ArticleTypeID].'" >'.$item[global_mapping::ArticleTypeName].'</option>';
	else
		echo '			<option value="'.$item[global_mapping::ArticleTypeID].'" >'.$item[global_mapping::ArticleTypeName].'</option>';
	
}
?>
					</select>
					<div class="help-inline message"></div>
				</div>
			</div>	
			<div class="control-group">	
				<label class="control-label">Chuyên Mục *</label>
				<div class="controls">	
					<select class="span6 chosen" name="cmCategory" id="cmCategory" data-placeholder="Chọn chuyên mục" multiple="multiple" tabindex="1">
<?php
foreach($allTypes as $item)
{
	$isSelect = false;
	//print_r($currentTypes);
	foreach($currentTypes as $selected)
	{
		if($item[global_mapping::ArticleTypeID] == $selected)
		{
			$isSelect=true;
		}
	}
	
	if($isSelect)
		echo '			<option selected="selected" value="'.$item[global_mapping::ArticleTypeID].'" >'.$item[global_mapping::ArticleTypeName].'</option>';
	else
		echo '			<option value="'.$item[global_mapping::ArticleTypeID].'" >'.$item[global_mapping::ArticleTypeName].'</option>';
}
?>
					</select>
					<div class="help-inline message"></div>					
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Loại khuyến mãi *</label>
				<div class="controls">
					<input type="text" name="txtAdTypeValue" id="txtAdTypeValue" class="text ad-value" placeholder="vd: Mua 1 tặng 1" 
					maxlength="15" value="<?php echo $article[global_mapping::AdType];?>"/>
					<div class="help-inline message"></div>			
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Từ *</label>
				<div class="controls">
					<div class="input-append date date-picker text " data-date="<?php echo $intMode?global_common::formatDateVN($article[global_mapping::StartDate]):'';?>" readonly="readonly"  data-date-format="dd/mm/yyyy"  data-date-viewmode="days">
						<input name="txtStartDate" id="txtStartDate" disabled="disabled" class="m-wrap m-ctrl-medium date-picker"
						size="16" type="text" placeholder="dd/mm/yyyy" value="<?php echo $intMode?global_common::formatDateVN($article[global_mapping::StartDate]):'';?>"/>
							<span class="add-on"><i class="icon-calendar"></i></span>
					</div>
					<label class="m-wrap inline">Đến * </label>
					<div class="input-append date date-picker text " data-date="<?php echo $intMode?global_common::formatDateVN($article[global_mapping::EndDate]):'';?>"  data-date-format="dd/mm/yyyy"  data-date-viewmode="days">
						<input name="txtEndDate" id="txtEndDate" disabled="disabled" class="m-wrap m-ctrl-medium date-picker" size="16" 
						type="text" placeholder="dd/mm/yyyy" value="<?php echo $intMode?global_common::formatDateVN($article[global_mapping::EndDate]):'';?>"/>
							<span class="add-on"><i class="icon-calendar"></i></span>
					</div>
					<div class="help-inline message"></div>			
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Happy days</label>
				<div class="controls">
					<select class="span3 chosen" name="cmHappyDays" id="cmHappyDays" data-placeholder="Chọn ngày trong tuần" multiple="multiple" tabindex="1">
						<option value="Monday">Monday</option>
						<option value="Tuesday">Tuesday</option>
						<option value="Wednesday">Wednesday</option>
						<option value="Thursday">Thursday</option>
						<option value="Friday">Friday</option>
						<option value="Saturday">Saturday</option>
						<option value="Sunday">Sunday</option>
					</select>
				</div>
			</div>
				<div class="control-group">
				<label class="control-label">Happy hours</label>
				<div class="controls">
					<div class="input-append bootstrap-timepicker-component">
						<input name="txtHappyFrom" id="txtHappyFrom" class="m-wrap m-ctrl-small timepicker-24" type="text" 
						/>
						<span class="add-on"><i class="icon-time"></i></span>
					</div>
					<label class="m-wrap inline">Đến  </label>
					<div class="input-append bootstrap-timepicker-component">
						<input name="txtHappyTo" id="txtHappyTo"  class="m-wrap m-ctrl-small timepicker-24" type="text" 
						/>
						<span class="add-on"><i class="icon-time"></i></span>
					</div>
					<div class="help-inline message"></div>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Tên chương trình KM *</label>
				<div class="controls">
					<input type="text" name="txtName" id="txtName" class="text span6 maxlength="255"  
					value="<?php echo $article[global_mapping::Title];?>"/>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Hình minh họa</label>
				<div class="controls">
					<input type="text" name="txtImage" id="txtImage" class="text span6 maxlength="255"  
					placeholder="vd: http://i134.photobucket.com/albums/q99/45748_0_square_1a.jpg"  
					value="<?php echo $article[global_mapping::FileName];?>"/>
				</div>
			</div>
			<div class="control-group address-article">
				<label class="control-label">Địa điểm *</label>
				<div class="controls">
					<input type="text" name="txtAddressArticle" id="txtAddressArticle" class="text m-wrap  span3" maxlength="255" placeholder="vd: 1A Trần Hưng Đạo" />
					<select id="optCity" name="optCity" class="chosen span2 "  data-placeholder="Chọn TP/Tỉnh" >
						<option value="HCM">HCM</option>
						<option value="HN">HN</option>
					</select>
					<select id="optDistrict" name="optDistrict"  class="chosen span2" data-placeholder="Chọn Quận/Huyện" >
						<option value="Quận 1">Quận 1</option>
						<option value="Quận 2">Quận 2</option>
						<option value="Quận 3">Quận 3</option>
					</select>	
					<a href="javascript:void(0);" class="btn btn-mini btn-add" onclick="article.addLocation(this)"/><i class="icon-plus"></i> Thêm</a>
					<a href="javascript:void(0);" class="btn btn-mini btn-update no-display" onclick="article.updateLocation(this)"/><i class="icon-ok"></i> Cập nhật</a>
					<a href="javascript:void(0);" class="btn  btn-mini btn-cancel no-display" onclick="article.cancelLocation(this)"/></i> Hủy bỏ</a>
				</div>	
<?php
$total = count($addresses);
for($i=0; $i<$total; $i++)
{
	echo '		<div class="controls row-item '.($i==0?'no-border':'').'">';
	echo '			<label class="m-wrap inline span6 lbl-address">';
	echo '			<span class="location-address">'.$addresses[$i].'</span>, <span class="location-district">'.$districts[$i].'</span>, <span class="location-city">'.$cities[$i].'</span> </label>';
	echo '			<a onclick="article.clickEDIT(this);" class="btn btn-mini " href="javascript:void(0);"><i class="icon-pencil"></i> Sửa</a> ';
	echo '			<a onclick="article.clickDELETE(this);" class="btn btn-mini " href="javascript:void(0);"><i class="icon-remove"></i> Xóa</a>';
	echo '			<a onclick="article.showMap(this);" class="btn btn-mini " href="javascript:void(0);"><i class="icon-eye-open"></i> Xem Trước</a>';
	echo '		</div>';
}
?>				
			</div>
			<div class="control-group">
				<label class="control-label">Nội dung *</label>
				<div class="controls">
					<textarea class="span6 ckeditor m-wrap" name="txtContent" id="txtContent" rows="6"><?php echo $article[global_mapping::Content];?></textarea>
					<div class="help-inline message"></div>					
				</div>
			</div>
			<div class="control-group no-display">
				<label class="control-label">Tags </label>
				<div class="controls">
					<textarea id='txtTags' name='txtTags' class="m-wrap span6" rows="2"></textarea>
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
					<label class="checkbox">
						<input type="checkbox" id="chkTerm" value="" /> Tôi đã đọc và đồng ý với <a href="#" class="link">điều khoản đăng tin</a>  của hệ thống timkm.com
					</label>
					<div class="help-inline message"></div>		
				</div>
			</div>
			<div class="control-group">				
				<div class="controls">
					<input type="submit" name="btnOK" id="btnOK" class="btn" value="Đăng tin"/>
					<input type="reset" name="btnReset" id="btnReset" class="btn gray" value="Nhập lại"/>
				</div>
			</div>
		</div>
	</form>
</div>

<!--End Form Input -->
<?php 
//footer
include_once('include/_footer.inc');
include_once('include/_location.inc');

?>
<script language="javascript" type="text/javascript">
    $(document).ready(function () {
			
			core.util.deSelectOption('optCity');
			core.util.deSelectOption('optDistrict');
			
			//init all categories
			articleType.setAllCategories();
			
			core.util.getObjectByID("btnOK").click(function(){
				return;
				 //article.postArticle();			
			});
			
			core.util.getObjectByID("post-article").submit(function () {
                article.postArticle();				
				return false;				
            });
<?php
if($intMode)
{
	echo '$("#txtHappyFrom").val(\''.$article[global_mapping::StartHappyHour].'\');';
	echo '$("#txtHappyTo").val(\''.$article[global_mapping::EndHappyHour].'\');';
}
			?>
    });
</script>