<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TIMKM</title>

<script type="text/javascript" src="<?php echo $_objSystem->locateJPlugin('jquery-1.10.1.min.js');?>"></script>

<link type="text/css" rel="stylesheet"  href="<?php echo $_objSystem->locateJPlugin('jquery-ui/jquery-ui-1.10.3.custom.min.css');?>">
<script type="text/javascript" src="<?php echo $_objSystem->locateJPlugin('jquery-ui/jquery-ui-1.10.3.custom.min.js');?>"></script>
<script type="text/javascript" src="<?php echo $_objSystem->locateJPlugin('jquery-ui/components/jquery.ui.core.min.js');?>"></script>


<link type="text/css" rel="stylesheet"  href="<?php echo $_objSystem->locateJPlugin('bootstrap/css/bootstrap.css');?>"/>
<link type="text/css" rel="stylesheet"  href="<?php echo $_objSystem->locateJPlugin('font-awesome/css/font-awesome.min.css');?>"/>
<link type="text/css" rel="stylesheet"  href="<?php echo $_objSystem->locateJPlugin('bootstrap/css/bootstrap-responsive.min.css');?>"/>
<script type="text/javascript" src="<?php echo $_objSystem->locateJPlugin('bootstrap/js/bootstrap.min.js');?>"></script>

<script type="text/javascript" src="<?php echo $_objSystem->locateJPlugin('modernizr.custom.24574.js');?>"></script>

<script type="text/javascript" src="<?php echo $_objSystem->locateJPlugin('bootstrap-datepicker/js/bootstrap-datepicker.js');?>"></script>
<link type="text/css" rel="stylesheet"  href="<?php echo $_objSystem->locateJPlugin('bootstrap-datepicker/css/datepicker.css');?>"/>
<script type="text/javascript" src="<?php echo $_objSystem->locateJPlugin('bootstrap-daterangepicker/daterangepicker.js');?>"></script>
<script type="text/javascript" src="<?php echo $_objSystem->locateJPlugin('bootstrap-daterangepicker/date.js');?>"></script>
<link type="text/css" rel="stylesheet"  href="<?php echo $_objSystem->locateJPlugin('bootstrap-daterangepicker/daterangepicker.css');?>"/>
<script type="text/javascript" src="<?php echo $_objSystem->locateJPlugin('bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js');?>"></script>
<link type="text/css" rel="stylesheet"  href="<?php echo $_objSystem->locateJPlugin('bootstrap-datetimepicker/css/datetimepicker.css');?>"/>

<script type="text/javascript" src="<?php echo $_objSystem->locateJPlugin('jquery-inputmask/jquery.inputmask.bundle.min.js');?>"></script>

<link type="text/css" rel="stylesheet"  href="<?php echo $_objSystem->locateCss('style.css');?>">

<script type="text/javascript" src="<?php echo $_objSystem->locateJs('ajax.js');?>"></script>
<script type="text/javascript" src="<?php echo $_objSystem->locateJs('global_config.js');?>"></script>
<script type="text/javascript" src="<?php echo $_objSystem->locateJs('global_core.js');?>"></script>
<script type="text/javascript" src="<?php echo $_objSystem->locateJs('app.js');?>"></script>
<script type="text/javascript" src="<?php echo $_objSystem->locateJs('form-components.js');?>"></script>

<script>
		jQuery(document).ready(function() {
			// initiate layout and plugins
			App.init();
			FormComponents.init();
		
		});
	</script>
</head>

<body >
<div id="main" align="">
    <!--div id="subcontent" -->
    <div id="header" align="">
		<div id="header-menu">
			<ul>
			<li>Logo</li>
			<li>Ăn uống <br> Giải trí</li>
			<li>Thời trang<br>Làm đẹp</li>
			<li>Điện thoại<br>Máy tính</li>
			<li>Đồ gia đình<br>Văn phòng</li>			
			<li>Nhà cửa<br>Xe cộ</li>			
			<li>Du lịch-Tài chính<br>Dịch vụ</li>			
			</ul>
		</div>
		 <div id="div-login" align="right" style="">
			 <?php
				 if(!global_common::isCLogin() ){ ?>
						<!--form>
						  <label for="username" >Tên đăng nhập</label> <input id="username"  type="text"/>
						  <br />
						   <label for="password" >Mật khẩu</label> <input id="password" type="password"/>
						   <br />
							  <label for="remember" >Nhớ</label> <input id="remember" type="checkbox"/>
							  <input id="btnlogin" type="submit" class="btn btn-oliver" value="Đăng nhập" class="btn btn-oliver" onclick='_objUser.login();return false;'/>
							<div class="error" id="error" name="error"></div>
				 </form-->
				<?php 
			}
				else
					{
				echo '<label >Chào mừng '.$_SESSION[global_common::SES_C_USERINFO]['UserName'].'</label>
					<input id="btnChangePass" type="button" class="btn btn-oliver" class="btn btn-oliver" value="Đổi mật khẩu" onclick="core.redirect(\'index.php\');"/>
					<input id="btnlogin" type="button" class="btn btn-oliver" class="btn btn-oliver" value="Đăng xuất" onclick="_objUser.logout();"/>
					
				';
			}
			?>
		 </div>
		<p></p>
    </div>
	<div class="wrapper">
		
		
       
       