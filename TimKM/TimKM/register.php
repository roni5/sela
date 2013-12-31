<?php

/* TODO: Add code here */
require('config/globalconfig.php');
include_once('class/model_user.php');

$objUser = new Model_User($objConnection);

?>

<?php
include_once('include/_header.inc');
include_once('include/_menu.inc');
?>
<div id="register-page">
	<form method="POST" id="form-register" class="form-horizontal" onsubmit=" ">
		<div class="table-register">
			<div class="control-group">
				<div class="controls">
					<h1 class="m-wrap title"> Đăng ký tài khoản</h1>
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
					<label class="m-wrap">(*) là thông tin bắt buộc</label>
				</div>
			</div>
			<div class="control-group ">
				<label class="control-label">Tên đăng nhập *</label>
				<div class="controls">
					<input type="text" name="txtUserName" id="txtUserName" class="text m-wrap" maxlength="255" />
					<div class="help-inline message">Tên đăng nhập không được rỗng</div>
					<span class="help-inline">Xin hãy điền tên mà bạn thích được hiển thị trên hệ thống.</span>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Mật khẩu *</label>
				<div class="controls">
					<input type="password" name="txtPassword" id="txtPassword" class="text" maxlength="255" />
					<div class="help-inline message"></div>
					<br>
					<span class="help-inline">Để tăng tính bảo mật thì mật khẩu phải tối thiểu 6 ký tự.</span>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Xác nhận mật khẩu *</label>
				<div class="controls">
					<input type="password" name="txtRepassword" id="txtRepassword" class="text" maxlength="255" />
					<div class="help-inline message"></div>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Email *</label>
				<div class="controls">
					<input type="text" name="txtEmail" id="txtEmail" class="text" maxlength="255" />
					<div class="help-inline message"></div>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Họ tên *</label>
				<div class="controls">
					<input type="text" name="txtFullname" id="txtFullname" class="text" maxlength="255" />
					<div class="help-inline message"></div>					
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Ngày sinh *</label>
				<div class="controls">
					<div class="input-append date date-picker text " data-date="21/12/2012"  data-date-format="dd/mm/yyyy"  data-date-viewmode="years">
						<input name="txtBirthDate" id="txtBirthDate" class="m-wrap m-ctrl-medium date-picker" size="16" type="text" value="" placeholder="dd/mm/yyyy" />
							<span class="add-on"><i class="icon-calendar"></i></span>
					</div>
					<div class="help-inline message"></div>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Giới tính *</label>
				<div class="controls">
					<label class="radio line">
						<input type="radio" name="sex" id="rdMale" value="1"  />
						Nam
					</label>
					<label class="radio line">
						<input type="radio" name="sex" id="rdFemale" value="0"   />
						Nữ
					</label> 
					<div class="help-inline message">Bạn chưa chọn giới tính</div>
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
					<label class="checkbox">
						<input type="checkbox" id="chkTerm" value="" /> Tôi đã đọc và đồng ý với <a href="#" class="link">điều khoản sử dụng</a>  của hệ thống timkm.com
					</label>
					<div class="help-inline message">Bạn cần phải đồng ý điều khoản sử dụng</div>
				</div>
			</div>
			<div class="control-group">
				
				<div class="controls">
						<input type="submit" name="btnOK" id="btnOK" class="btn" value="Đăng ký"/>
					<input type="reset" name="btnReset" id="btnReset" class="btn gray" value="Nhập lại"/>
				</div>
			</div>
		</div>
	</form>
</div>
<script language="javascript" type="text/javascript">
    $(document).ready(function () {
			/*
			core.util.getObjectByID("btnOK").click(function(){
				 user.register();			
			});
			*/
			
			core.util.getObjectByID("form-register").submit(function () {
               user.register();				
				return false;				
            });
			
    });
</script>
<?php 
//footer
include_once('include/_footer.inc');
?>
