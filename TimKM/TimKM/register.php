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
<script type="text/javascript" src="<?php echo $_objSystem->locateJs('sela_user.js');?>"></script>
<div id="register-page">
	<form method="POST" class="form-horizontal">
		
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
			<div class="control-group">
				<label class="control-label">Tên đăng nhập *</label>
				<div class="controls">
					<input type="text" name="txtUserName" id="txtUserName" class="text" maxlength="250" />
					<span class="help-inline">Xin hãy điền tên mà bạn thích được hiển thị trên hệ thống.</span>
				</div>
			</div>
			
			<!--tr>
				<td>Tên đăng nhập</td>
				<td></td>
			</tr>
			<tr>
				<td>Mật khẩu</td>
				<td><input type="password" name="txtPassword" id="txtPassword" class="text" maxlength="250" /></td>
			</tr>
			<tr>
				<td>Xác nhận mật khẩu</td>
				<td><input type="password" name="txtRepassword" id="txtRepassword" class="text" maxlength="250" /></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="txtEmail" id="txtEmail" class="text" maxlength="250" /></td>
			</tr>
			<tr>
				<td>Họ tên</td>
				<td><input type="text" name="txtFullname" id="txtFullname" class="text" maxlength="250" /></td>
			</tr>
			<tr>
				<td>Ngày sinh</td>
				<td>
					<div class="input-append date date-picker text "  data-date-format="dd/mm/yyyy"  data-date-viewmode="days">
						<input name="txtBirthday" id="txtBirthday" class="m-wrap m-ctrl-medium date-picker input-mask" mask-data="d/m/y" size="16" type="text" value="" placeholder="dd/mm/yyyy" />
							<span class="add-on"><i class="icon-calendar"></i></span>
					</div>
				</td>
			</tr>
			<tr>
				<td>Giới tính</td>
				<td>
					<label class="radio line">
						<input type="radio" name="sex" value="1"  />
						Nam
					</label>
					<label class="radio line">
						<input type="radio" name="sex" value="0"   />
						Nữ
					</label>  
				</td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="2">
					<label class="checkbox">
						<input type="checkbox" value="" /> Tôi đã đọc và đồng ý với <a href="#" class="link">điều khoản sử dụng</a>  của hệ thống timkm.com
					</label>
				</td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" name="btnOK" id="btnOK" class="btn" value="Đăng ký"/>
					<input type="reset" name="btnReset" id="btnReset" class="btn" value="Nhập lại"/>
				</td>
			</tr-->
		</table>
	</form>
</div>
<script language="javascript" type="text/javascript">
    $(document).ready(function () {
        core.getObject("btnOK").click(function () {
               _objUser.register();
				return false;
            });
    });
</script>
<?php 
//footer
include_once('include/_footer.inc');
?>
