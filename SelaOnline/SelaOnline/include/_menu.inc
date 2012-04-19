 <div id="menu" >
<?php if($_SESSION[global_common::SES_C_USERINFO]['admin_type'] == '1' 
		|| $_SESSION[global_common::SES_C_USERINFO]['admin_type'] == '2' 
		|| $_SESSION[global_common::SES_C_USERINFO]['admin_type'] == '3')
{
			    ?>	
	<a <?php echo $_objSystem->_pName=='new_faq'?'class="active"':'';?> href="new_faq.php">New FAQ</a>  <?php 
		} ?> 
		 <?php if($_SESSION[global_common::SES_C_USERINFO]['admin_type'] == '1' 
		|| $_SESSION[global_common::SES_C_USERINFO]['admin_type'] == '2' 
		|| $_SESSION[global_common::SES_C_USERINFO]['admin_type'] == '3')
		{
			    ?>	
		<a <?php echo $_objSystem->_pName=='search'?'class="active"':'';?> href="search.php">Search HTKT</a>  <?php 
		} ?>   
<?php if($_SESSION[global_common::SES_C_USERINFO]['admin_type'] == '1' 
		|| $_SESSION[global_common::SES_C_USERINFO]['admin_type'] == '2' 
		|| $_SESSION[global_common::SES_C_USERINFO]['admin_type'] == '3')
		{   
		 ?>	
		<a <?php echo $_objSystem->_pName=='search_menu'?'class="active"':'';?> href="search_menu.php">Search TTCC</a>  <?php 
		} ?>   
		
         <?php if($_SESSION[global_common::SES_C_USERINFO]['admin_type'] == '1' 
		|| $_SESSION[global_common::SES_C_USERINFO]['admin_type'] == '2')
		{    ?>
		<a <?php echo $_objSystem->_pName=='admin_product'?'class="active"':'';?> href="admin_product.php">Admin Sản phẩm</a>  <?php 
		} ?>   
		
        <?php if($_SESSION[global_common::SES_C_USERINFO]['admin_type'] == '1'){ ?>    
		<a <?php echo $_objSystem->_pName=='admin_section'?'class="active"':'';?> href="admin_section.php">Admin Ngành hàng</a>         <?php } ?>       
       <?php if($_SESSION[global_common::SES_C_USERINFO]['admin_type'] == '1'){ ?>     
		<a <?php echo $_objSystem->_pName=='admin_catalogue'?'class="active"':'';?> href="admin_catalogue.php">Admin Nhóm hàng</a>            <?php } ?>   
		<?php if($_SESSION[global_common::SES_C_USERINFO]['admin_type'] == '1'){ ?>	
		<a <?php echo $_objSystem->_pName=='admin_manufactory'?'class="active"':'';?> href="admin_manufactory.php">Admin Nhà sản xuất</a>       <?php } ?>        
		<?php if($_SESSION[global_common::SES_C_USERINFO]['admin_type'] == '1'){ ?>	
		<a <?php echo $_objSystem->_pName=='admin_user'?'class="active"':'';?> href="admin_user.php">Admin Nhân viên</a>        <?php } ?>   
			<?php if($_SESSION[global_common::SES_C_USERINFO]['admin_type'] == '1'){ ?>	
		<a <?php echo $_objSystem->_pName=='admin_menu'?'class="active"':'';?> href="admin_menu.php">Admin TTCC</a>        <?php } ?>   
        </div>