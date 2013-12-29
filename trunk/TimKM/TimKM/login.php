<?php

/* TODO: Add code here */
require('config/globalconfig.php');
include_once('class/model_user.php');

$objUser = new Model_User($objConnection);

$message = '';
if ($_pgR["act"] == Model_User::ACT_LOGIN)
{
	$userName = $_pgR['txtUserName'];
	$userName = global_editor::rteSafe(html_entity_decode($userName,ENT_COMPAT ,'UTF-8' ));
	$password = $_pgR['txtPassword'];
	$password = global_editor::rteSafe(html_entity_decode($password,ENT_COMPAT ,'UTF-8' ));
	$remember = $_pgR['ckRemember'];
	
	$result = $objUser->login($userName,$password);
	if ($result)
	{
		$curPage = $_SESSION[global_common::SES_C_CUR_PAGE];
		if($curPage)
		{
			global_common::redirect($curPage);
		}
		else
		{
			global_common::redirect("index.php");
		}
	}
	else
	{
		$message = 'Đăng nhập thất bại. Thông tin đăng nhập không hợp lệ.
		<br> Nếu quên mật khẩu hãy nhấn vào <a href="forgot_password.php">đây</a> để lấy lại mật khẩu ';
	}
}

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
<?php
if($message)
{
	echo '<div class="control-group input-error"><div class="controls"><div class="help-inline message">'.$message.'</div></div></div>';
}
			?>
			
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
						<input type="checkbox" class="remember" name="ckRemember" id="ckRemember" value="1"/>
						Ghi nhớ?
					</label>
					<input type="submit" name="btnOK" id="btnOK" class="btn" value="Đăng nhập"/>
					
				</div>
			</div>
				<div class="control-group">
				
				<div class="controls">
					<a  href="forgot_password.php" name="btnForgot" id="btnForgot" class="btn btn-mini" >Quên mật khẩu?</a>
					<a   href="register.php" name="btnRegister" id="btnRegister" class="btn btn-mini" >Đăng ký tài khoản</a>
				</div>
			</div>
<?php
echo '<input type="hidden" name="act" id="act" value="'.Model_User::ACT_LOGIN.'"/>';
			?>
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
