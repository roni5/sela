<div id="div-login" align="right" style="">
			 <?php
				 if(!global_common::isCLogin() ){ ?>
						<form>
						  <label for="username" >Tên đăng nhập</label> <input id="username"  type="text"/>
						  <br />
						   <label for="password" >Mật khẩu</label> <input id="password" type="password"/>
						   <br />
							  <label for="remember" >Nhớ</label> <input id="remember" type="checkbox"/>
							  <input id="btnlogin" type="submit" class="btn btn-oliver" value="Đăng nhập" class="btn btn-oliver" onclick='_objUser.login();return false;'/>
							<div class="error" id="error" name="error"></div>
				 </form>
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