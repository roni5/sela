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
	<form method="POST"  class="form-horizontal">
		<div class="table-login">
			<div class="control-group">
				<div class="controls">
					<h1 class="m-wrap title"> Đăng nhập</h1>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Tên đăng nhập</label>
				<div class="controls">
					<input type="text" name="txtUserName" id="txtUserName" class="text" maxlength="250" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Mật khẩu</label>
				<div class="controls">
					<input type="password" name="txtPassword" id="txtPassword" class="text" maxlength="250" />
				</div>
			</div>
			<div class="control-group">
			
				<div class="controls">
					<label class="radio line m-wrap l-remember">
						<input type="checkbox" class="remember" />
						Ghi nhớ?
					</label>
					<input type="submit" name="btnOK" id="btnOK" class="btn" value="Đăng nhập"/>
				</div>
			</div>
				<div class="control-group">
				
				<div class="controls">
					<input type="button" name="btnForgot" id="btnForgot" class="btn btn-mini" value="Quên mật khẩu"/>
					<input type="button" name="btnRegister" id="btnRegister" class="btn btn-mini" value="Đăng ký tài khoản"/>
				</div>
			</div>
		</div>
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
