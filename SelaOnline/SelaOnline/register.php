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
<form method="POST">
	<table>
		<tr>
			<td>Tên đăng nhập</td>
			<td><input type="textbox" name="txtUserName" id="txtUserName" class="input-normal" maxlength="250" /></td>
		</tr>
		<tr>
			<td>Mật khẩu</td>
			<td><input type="password" name="txtPassword" id="txtPassword" class="input-normal" maxlength="250" /></td>
		</tr>
		<tr>
			<td>Xác nhận mật khẩu</td>
			<td><input type="password" name="txtRepassword" id="txtRepassword" class="input-normal" maxlength="250" /></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="textbox" name="txtEmail" id="txtEmail" class="input-normal" maxlength="250" /></td>
		</tr>
		<tr>
			<td>Họ tên</td>
			<td><input type="textbox" name="txtFullname" id="txtFullname" class="input-normal" maxlength="250" /></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="btnOK" id="btnOK" class="button-normal" value="Đăng ký"/></td>
		</tr>
	</table>
</form>
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
