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
<div id="forgot-page">
	<form method="POST"  class="form-horizontal">
		<div class="table-forgot">
			<div class="control-group">
				<div class="controls">
					<h1 class="m-wrap title"> Yêu cầu lấy lại mật khẩu</h1>
				</div>
			</div>
			<div class="control-group">
				<label class="">Nếu bạn đã quên tên hoặc mật mã, bạn có thể yêu cầu hệ thống để gửi email thông báo cho bạn. 
				Xin khai báo địa chỉ email hoặc tên đăng nhập bạn dùng để đăng ký với hệ thống lúc trước, chúng tôi sẽ gửi hướng dẫn tới email này để giúp bạn đổi mật mã mới.</label>
			</div>
			<hr>
			<div class="control-group">
				<label class="control-label">Tên đăng nhập</label>
				<div class="controls">
					<input type="text" name="txtUserName" id="txtUserName" class="text" maxlength="250" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Hoặc</label>
				<div class="controls">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Email</label>
				<div class="controls">
					<input type="text" name="txtEmail" id="txtEmail" class="text" maxlength="250" />
				</div>
			</div>
			
			<div class="control-group">
				<div class="controls">
					<input type="submit" name="btnOK" id="btnOK" class="btn" value="Lấy lại mật khẩu"/>
					<input type="submit" name="btnOK" id="btnOK" class="btn gray" value="Thoát"/>
				</div>
			</div>
		</div>
	</form>
</div>
<script language="javascript" type="text/javascript">
    $(document).ready(function () {
       
    });
</script>
<?php 
//footer
include_once('include/_footer.inc');
?>
