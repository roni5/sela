<?php

/* TODO: Add code here */
require('config/globalconfig.php');
include_once('include/_permission.inc');
include_once('class/model_user.php');

$objUser = new Model_User($objConnection);

?>

<?php
include_once('include/_header.inc');
include_once('include/_menu.inc');
?>
<script type="text/javascript" src="<?php echo $_objSystem->locateJs('sela_user.js');?>"></script>
<div id="profile-page" class="page-content">
	<div class="row-fluid">
		<div class="span12">
			<!-- BEGIN PAGE TITLE & BREADCRUMB-->
			<h3 class="page-title">
				Thông tin tài khoản
			</h3>
		</div>
	</div>
	  <div class="row-fluid">	
            <div class="span12">
                <div class="span3">
                    <ul class="menu-profile">
                        <li class="active">
							<a href="javascript:void(0)"><i class="icon-user"></i>Thông tin cá nhân </a><span class="after"></span>
						</li>
                        <li class="">
							<a href="profile_article.php"><i class="icon-file-text"></i>Chương trình khuyến mãi</a>
						</li>
                    </ul>
                </div>
                <div class="span9 tabbable tabbable-custom tabbable-full-width">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#general-info" data-toggle="tab">Tổng quát</a></li>
						<li class=""><a href="#change-avatar" data-toggle="tab">Thay đổi avatar</a></li>
						<li class=""><a href="#change-profile" data-toggle="tab">Thay đổi tài khoản</a></li>
						<li class=""><a href="#change-password" data-toggle="tab">Thay đổi mật khẩu</a></li>
                    </ul>
                    <div class="tab-content">
						<div id="general-info" class="tab-pane row-fluid active" >
                            <div class="span2">
                                <img src="images/avatar.jpg" alt="" />
                            </div>
                            <ul class="unstyled span10">
                                <li><span>Tên đăng nhập:</span> JDuser</li>
                                <li><span>Họ và Tên:</span> John</li>
								 <li><span>Ngày sinh:</span> 21/12/1993</li>
                                <li><span>Giới tính:</span> Nam</li>
                                <li><span>Số điện thoại:</span> (832) 561-2323</li>                               
                                <li><span>Địa chỉ:</span> 5359 Champion Way Ln</li>
                                <li><span>Quận/Huyện:</span> Quan 1</li>
                                <li><span>Thành phố:</span> HCM</li>
                                <li><span>Email:</span> <a href="mailto:"> john@mywebsite.com</a></li>
                            </ul>
                        </div>
						<div id="change-avatar" class="tab-pane row-fluid">
                                <form action="#">
                                    <p>
                                       Hãy chọn hình làm đại diện trên hệ thống
                                    </p>
                                    <br />
                                   <div class="controls">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px;
                                                max-height: 150px; line-height: 20px;">
                                            </div>
                                            <div>
                                                <span class="btn btn-file"><span class="fileupload-new">Chọn avatar</span> <span
                                                    class="fileupload-exists">Chọn lại</span>
                                                    <input type="file" class="default" /></span> <a href="#" class="btn fileupload-exists"
                                                        data-dismiss="fileupload">Xóa</a>
                                            </div>
                                        </div>
                                        <!--span class="label label-important">Chú ý</span> <span>Attached image thumbnail is supported
                                            in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span-->
                                    </div>
									 <div class="submit-btn">
                                        <a href="#" class="btn green">Lưu thay đổi</a> 
										<input type="reset" class="btn" value="Hủy bỏ"/>
                                    </div>
								</form>
                        </div>
                        <div id="change-profile" class="tab-pane" >
                                <form action="#">
									<div class="control-group">
										<div class="controls">
											<label class="m-wrap">(*) là thông tin bắt buộc</label>
										</div>
									</div>
                                    <label class="control-label">
                                        Họ và tên *</label>
                                    <input type="text" placeholder="" class="m-wrap span8" />                                  
                                    <label class="control-label">
                                        Ngày sinh *</label>
									<div class="input-append date date-picker" data-date="21/12/2012" data-date-format="dd/mm/yyyy" data-date-viewmode="years">
										<input name="txtBirthday" id="txtBirthday" class="m-wrap m-ctrl-medium date-picker" readonly size="16" type="text" value="" /><span class="add-on"><i class="icon-calendar"></i></span>
									</div>
									 <label class="control-label">
                                        Giới tính *</label>
                                    <div class="controls">
										<label class="radio line">
											<input type="radio" name="sex" value="1"  />
											Nam
										</label>
										<label class="radio line">
											<input type="radio" name="sex" value="0"   />
											Nữ
										</label> 
									</div>
									<label class="control-label">
                                        Số điện thoại *</label>
                                    <input type="text" placeholder="Vd: 01289 567 567" class="m-wrap span8" />
									<div class="control-group">
										<label class="control-label">Địa chỉ *</label>
										<div class="controls">
											<input type="text" name="txtAddress" id="txtAddress" class="text" maxlength="250" placeholder="vd: 1A Trần Hưng Đạo" />
											<select id="optCity" name="optCity" class=" chosen" data-placeholder="Chọn TP/Tỉnh"  tabindex="1">
												<option value="HCM">HCM</option>
											</select>
											<select id="optDistrict" name="optDistrict"  class="chosen" data-placeholder="Chọn Quận/Huyện"  tabindex="1">
												<option value="Quan1">Quận 1</option>
											</select>
										</div>				
									</div>
                                    <label class="control-label">
                                        Email *</label>
									<div class="controls">
										<div class="input-icon left">
											<i class="icon-envelope"></i>
											<input type="text" placeholder="Địa chỉ email" class="m-wrap span8">    
										</div>
									</div>
                                    <div class="submit-btn">
                                        <a href="#" class="btn green">Lưu thay đổi</a> 
										<input type="reset" class="btn" value="Hủy bỏ"/>
                                    </div>
                                </form>
                        </div>
                        
                        <div id="change-password" class="tab-pane">
                                <form action="#">
                                    <label class="control-label">
                                        Mật khẩu hiện tại</label>
                                    <input type="password" class="m-wrap span8" />
                                    <label class="control-label">
                                        Mật khẩu mới</label>                                                                													
									<div class="controls">
										<input type="text" class="m-wrap span8" name="password" id="password_strength">
									</div>
                                    <label class="control-label">
                                        Nhắc lại mật khẩu mới</label>
									<div class="controls">
										   <input type="password" class="m-wrap span8" />
										<span class="help-block">Nhập lại mật khẩu mới một lần nữa!</span>									
									</div>
                                 
                                    <div class="submit-btn">
                                         <a href="#" class="btn green">Lưu thay đổi</a> 
										<input type="reset" class="btn" value="Hủy bỏ"/>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
                <!--end span9-->
            </div>
        </div>
</div>
<script language="javascript" type="text/javascript">
    $(document).ready(function () {
        core.getObject("btnOK").click(function () {
               _objUser.login();
				return false;
            });
    });
</script>
<?php 
//footer
include_once('include/_footer.inc');
?>
