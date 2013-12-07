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
<div id="login-page">
	<form method="POST">
	
		<table class="table-login">
			<tr>
				<td colspan="2">
					<h1 class="title">Đăng nhập</h1>
				</td>
			</tr>
			<tr>
				<td>Tên đăng nhập</td>
				<td><input type="text" name="txtUserName" id="txtUserName" class="text" maxlength="250" /></td>
			</tr>
			<tr>
				<td>Mật khẩu</td>
				<td><input type="password" name="txtPassword" id="txtPassword" class="text" maxlength="250" /></td>
			</tr>
			<tr>
				<td> </td>
				<td><input type="checkbox" class="remember" />Ghi nhớ? <input type="submit" name="btnOK" id="btnOK" class="btn" value="Đăng nhập"/></td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="button" name="btnForgot" id="btnForgot" class="btn btn-mini" value="Quên mật khẩu"/>
					<input type="button" name="btnRegister" id="btnRegister" class="btn btn-mini" value="Đăng ký tài khoản"/>
				</td>
			</tr>
		</table>
	</form>
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
