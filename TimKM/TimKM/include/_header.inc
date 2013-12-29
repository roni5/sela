<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TIMKM</title>

<script type="text/javascript" src="<?php echo $_objSystem->locateJPlugin('jquery-1.10.1.min.js');?>"></script>
<script type="text/javascript" src="<?php echo $_objSystem->locateJPlugin('jquery-migrate-1.2.1.min.js');?>"></script>

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
<script type="text/javascript" src="<?php echo $_objSystem->locateJPlugin('bootstrap-timepicker/js/bootstrap-timepicker.js');?>"></script>
<link type="text/css" rel="stylesheet"  href="<?php echo $_objSystem->locateJPlugin('bootstrap-timepicker/compiled/timepicker.css');?>"/>

<script type="text/javascript" src="<?php echo $_objSystem->locateJPlugin('jquery-inputmask/jquery.inputmask.bundle.min.js');?>"></script>

<link type="text/css" rel="stylesheet"  href="<?php echo $_objSystem->locateJPlugin('jquery-multi-select/css/multi-select-metro.css');?>"/>
<script type="text/javascript" src="<?php echo $_objSystem->locateJPlugin('jquery-multi-select/js/jquery.multi-select.js');?>"></script>

<link type="text/css" rel="stylesheet"  href="<?php echo $_objSystem->locateJPlugin('chosen-bootstrap/chosen/chosen.css');?>"/>
<script type="text/javascript" src="<?php echo $_objSystem->locateJPlugin('chosen-bootstrap/chosen/chosen.jquery.min.js');?>"></script>

<link type="text/css" rel="stylesheet"  href="<?php echo $_objSystem->locateJPlugin('bootstrap-fileupload/bootstrap-fileupload.css');?>"/>
<script type="text/javascript" src="<?php echo $_objSystem->locateJPlugin('bootstrap-fileupload/bootstrap-fileupload.js');?>"></script>

<link type="text/css" rel="stylesheet"  href="<?php echo $_objSystem->locateJPlugin('bootstrap-fileupload/bootstrap-fileupload.css');?>"/>
<script type="text/javascript" src="<?php echo $_objSystem->locateJPlugin('bootstrap-fileupload/bootstrap-fileupload.js');?>"></script>

<link type="text/css" rel="stylesheet"  href="<?php echo $_objSystem->locateJPlugin('data-tables/DT_bootstrap.css');?>"/>
<script type="text/javascript" src="<?php echo $_objSystem->locateJPlugin('data-tables/jquery.dataTables.min.js');?>"></script>
<script type="text/javascript" src="<?php echo $_objSystem->locateJPlugin('data-tables/DT_bootstrap.js');?>"></script>

<link type="text/css" rel="stylesheet"  href="<?php echo $_objSystem->locateJPlugin('FlexSlider/flexslider.css');?>">
<script type="text/javascript" src="<?php echo $_objSystem->locateJPlugin('FlexSlider/jquery.flexslider-min.js');?>"></script>

<script type="text/javascript" src="<?php echo $_objSystem->locateJPlugin('ckeditor/ckeditor.js');?>"></script>
<script type="text/javascript" src="<?php echo $_objSystem->locateJPlugin('ckeditor/adapters/jquery.js');?>"></script>

<link type="text/css" rel="stylesheet"  href="<?php echo $_objSystem->locateJPlugin('theme/css/style.css');?>">

<link type="text/css" rel="stylesheet"  href="<?php echo $_objSystem->locateCss('style.css');?>">

<link type="text/css" rel="stylesheet"  href="<?php echo $_objSystem->locateCss('ChromeSafariFix.css');?>">


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
			<li>
				<a href="index.php">Logo</a>
			</li>
			<li>
				<a href="article_list.php">Ăn uống <br> Giải trí</a>
			</li>
			<li>
				<a href="article_list.php">Thời trang<br>Làm đẹp</a>			
			</li>
			<li>
				<a href="article_list.php">Điện thoại<br>Máy tính</a>
			</li>
			<li>
				<a href="article_list.php">Đồ gia đình<br>Văn phòng</a>
			</li>			
			<li>
				<a href="article_list.php">Nhà cửa<br>Xe cộ</a>
			</li>			
			<li>
				<a href="article_list.php">Du lịch-Tài chính<br>Dịch vụ</a>
			</li>			
			</ul>
		</div>
		 <div id="div-login" align="right" style=""  class="navbar navbar-inverse navbar-fixed-top">
			<ul class="nav pull-right">		
				
				<!-- END  DROPDOWN -->	
				<!-- BEGIN USER LOGIN DROPDOWN -->
				<li>
					<a href="login.php" class="btn btn-mini inline">
						Đăng nhập
					</a>	
					<a href="register.php" class="btn btn-mini inline">
						Đăng ký
					</a>				
				</li>
				<!-- END USER LOGIN DROPDOWN -->
				<!-- BEGIN USER LOGIN DROPDOWN -->
				<li class="dropdown user">
					<a data-toggle="dropdown" class="dropdown-toggle" href="#">
						<img class="avatar" src="/images/default/default-avatar-male.png" alt="">
						<span class="username">Aiya Quan</span>
						<i class="icon-angle-down"></i>
					</a>
					<ul class="dropdown-menu">
						<li><a href="profile.php"><i class="icon-user"></i> Thông tin cá nhân</a></li>
						<li><a href="profile_article.php"><i class="icon-reorder"></i> Quản lý khuyến mãi</a></li>
						<li class="divider"></li>
						<li><a href="login.html"><i class="icon-signout"></i> Đăng xuất</a></li>
					</ul>
				</li>
				<!-- END USER LOGIN DROPDOWN -->
				</ul>
		 </div>
		<p></p>
    </div>
	<div class="wrapper">
		
		
       
       