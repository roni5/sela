<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home-Call Center</title>
<link type="text/css" rel="stylesheet"  href="<?php echo $_objSystem->locateCss('style.css');?>">

<link type="text/css" rel="stylesheet"  href="<?php echo $_objSystem->locateCss('themes/base/jquery.ui.all.css');?>">

<script type="text/javascript" src="<?php echo $_objSystem->locateJs('jquery-1.7.2.min.js');?>"></script>
<script type="text/javascript" src="<?php echo $_objSystem->locateJs('ui/jquery.ui.widget.js');?>"></script>
<script type="text/javascript" src="<?php echo $_objSystem->locateJs('ui/jquery.ui.tabs.js');?>"></script>
<script type="text/javascript" src="<?php echo $_objSystem->locateJs('ui/jquery.ui.button.js');?>"></script>
<script type="text/javascript" src="<?php echo $_objSystem->locateJs('ui/jquery.ui.position.js');?>"></script>
<script type="text/javascript" src="<?php echo $_objSystem->locateJs('ui/jquery.ui.autocomplete.js');?>"></script>
<script type="text/javascript" src="<?php echo $_objSystem->locateJs('ui/jquery.ui.core.js');?>"></script>
<script type="text/javascript" src="<?php echo $_objSystem->locateJs('jquery.tooltip.js');?>"></script>

<script type="text/javascript" src="<?php echo $_objSystem->locateJs('ajax.js');?>"></script>
<script type="text/javascript" src="<?php echo $_objSystem->locateJs('global_config.js');?>"></script>
<script type="text/javascript" src="<?php echo $_objSystem->locateJs('global_core.js');?>"></script>

</head>

<body >
<div id="main" align="center">
    <!--div id="subcontent" -->
    <div id="header" align="">
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
				echo '<label >Chào mừng '.$_SESSION[global_common::SES_C_USERINFO]['name'].'</label>
					<input id="btnChangePass" type="button" class="btn btn-oliver" class="btn btn-oliver" value="Đổi mật khẩu" onclick="core.redirect(\'index.php\');"/>
					<input id="btnlogin" type="button" class="btn btn-oliver" class="btn btn-oliver" value="Đăng xuất" onclick="_objUser.logout();"/>
					
				';
			}
			?>
		 </div>
		<p></p>
    </div>
	<div class="wrapper">
		<div  id="admin-content">
       
       