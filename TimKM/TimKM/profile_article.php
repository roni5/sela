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
<div id="profile-page" class="page-content">
	<div class="row-fluid">
		<div class="span12">
			<!-- BEGIN PAGE TITLE & BREADCRUMB-->
			<h3 class="page-title">
				Thông tin tài khoản
			</h3>
		</div>
	</div>
	  <div class="row-fluid">	
            <div class="span12">
                <div class="span3">
                    <ul class="menu-profile">
                        <li >
							<a href="profile.php"><i class="icon-user"></i>Thông tin cá nhân </a><span class="after"></span>
						</li>
                        <li class="active">
							<a href="javascript:void(0)"><i class="icon-file-text"></i>Chương trình khuyến mãi</a>
						</li>
                    </ul>
                </div>
                <div class="span9 tabbable tabbable-custom tabbable-full-width">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#dislaying" data-toggle="tab">Đang hiển thị</a></li>
						<li class=""><a href="#verifying" data-toggle="tab">Chờ duyệt</a></li>
						<li class=""><a href="#draff" data-toggle="tab">Lưu nháp</a></li>
						<li class=""><a href="#inactive" data-toggle="tab">Hết hạn</a></li>
						
                    </ul>
                    <div class="tab-content">
						<div id="dislaying" class="tab-pane row-fluid active" >
                             <div class="portlet box">
								<div class="portlet-title hide">
									<div class="caption">
										<!--i class="icon-reorder"></i-->
									</div>
									
									<div class="tools">                                
										<!--a href="#config-form" data-toggle="modal" class="config"></a-->
										<!--a href="javascript:;" class="reload" title="Reload"></a-->
									</div>
									<div class="actions">									
										<!--div class="btn-group">
											<a class="btn green" href="#" title="Columns" data-toggle="dropdown">
												<i class="icon-columns"></i>
												
											</a>
											<div class="dropdown-menu hold-on-click dropdown-checkboxes right column-toggler">
												<label>
													<input type="checkbox" checked column-name="Showall">Show all</label>
												<label>
													<input type="checkbox" checked column-name="Name">Name</label>
												<label>
													<input type="checkbox" checked column-name="Content">Content</label>
												<label>
													<input type="checkbox" checked column-name="CreateDate">Create Date</label>
												<label>
													<input type="checkbox" checked column-name="ModifiedDate">Modified date</label>
											</div>
										</div-->	
										<!--div class="btn-group">	
											<a class="btn green" href="#" title="Page Size" data-toggle="dropdown">
												<i class="icon-list"></i>										
											</a>
											<ul class="dropdown-menu right">
												<li><a href="#">5</a></li>
												<li><a href="#">10</a></li>
												<li><a href="#">15</a></li>
												<li><a href="#">20</a></li>											
											</ul>
										</div-->
									</div>
								</div>
								<!---->
								<div class="portlet-body">
									<table class="table table-bordered table-hover">
										<thead>
											<tr>
												<th class="span4">Tên khuyến mãi</th>
												<th>Bắt đầu</th>
												<th>Kết thúc</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Khuyến mãi tháng 12</td>
												<td>12/12/2013</td>
												<td>01/01/2014</td>
												<td>
													<a href="javascript:void(0)" class="btn btn-mini purple">Xem</a>
													<a href="javascript:void(0)" class="btn btn-mini">Sửa</a>
													<a href="javascript:void(0)" class="btn btn-mini">Ẩn tin</a>
													<a href="javascript:void(0)" class="btn btn-mini">Xóa</a>
												</td>
											</tr>
											<tr>
												<td>Khuyến mãi tháng 12</td>
												<td>12/12/2013</td>
												<td>01/01/2014</td>
												<td>
													<a href="javascript:void(0)" class="btn btn-mini purple">Xem</a>
													<a href="javascript:void(0)" class="btn btn-mini">Sửa</a>
													<a href="javascript:void(0)" class="btn btn-mini">Ẩn tin</a>
													<a href="javascript:void(0)" class="btn btn-mini">Xóa</a>
												</td>
											</tr>
											<tr>
												<td>Khuyến mãi tháng 12</td>
												<td>12/12/2013</td>
												<td>01/01/2014</td>
												<td>
													<a href="javascript:void(0)" class="btn btn-mini purple">Xem</a>
													<a href="javascript:void(0)" class="btn btn-mini">Sửa</a>
													<a href="javascript:void(0)" class="btn btn-mini">Ẩn tin</a>
													<a href="javascript:void(0)" class="btn btn-mini">Xóa</a>
												</td>
											</tr>
										</tbody>
									</table>
								</div>						
								<!-- BEGIN PAGINATION-->
								<div class="row-fluid no-background">
									<div class="span12">
										<div class="pagination pull-right margin-right">
											<ul>
												<li><a href="#" title="Trang đầu tiên"><i class="icon-step-backward"></i></a></li>
												<li><a href="#" title="Trang trước">&laquo;</a></li>
												<li><a href="#">1</a></li>
												<li><a href="#">2</a></li>
												<li><a href="#">3</a></li>
												<li><a href="#">4</a></li>
												<li><a href="#">5</a></li>
												<li><a href="#" title="Trang sau">&raquo;</a></li>
												<li><a href="#" title="Trang cuối cùng"><i class="icon-step-forward"></i></a></li>
											</ul>
										</div>
									</div>
								</div>
								<!-- END PAGINATION-->
								<!---->
							</div>
                   
                        </div>
                    
						<div id="verifying" class="tab-pane row-fluid " >
                             <div class="portlet box">
								<div class="portlet-title hide">
									<div class="caption">
										<!--i class="icon-reorder"></i-->
									</div>
									
									<div class="tools">                                
										<!--a href="#config-form" data-toggle="modal" class="config"></a-->
										<!--a href="javascript:;" class="reload" title="Reload"></a-->
									</div>
									<div class="actions">									
										<!--div class="btn-group">
											<a class="btn green" href="#" title="Columns" data-toggle="dropdown">
												<i class="icon-columns"></i>
												
											</a>
											<div class="dropdown-menu hold-on-click dropdown-checkboxes right column-toggler">
												<label>
													<input type="checkbox" checked column-name="Showall">Show all</label>
												<label>
													<input type="checkbox" checked column-name="Name">Name</label>
												<label>
													<input type="checkbox" checked column-name="Content">Content</label>
												<label>
													<input type="checkbox" checked column-name="CreateDate">Create Date</label>
												<label>
													<input type="checkbox" checked column-name="ModifiedDate">Modified date</label>
											</div>
										</div-->	
										<!--div class="btn-group">	
											<a class="btn green" href="#" title="Page Size" data-toggle="dropdown">
												<i class="icon-list"></i>										
											</a>
											<ul class="dropdown-menu right">
												<li><a href="#">5</a></li>
												<li><a href="#">10</a></li>
												<li><a href="#">15</a></li>
												<li><a href="#">20</a></li>											
											</ul>
										</div-->
									</div>
								</div>
								<!---->
								<div class="portlet-body">
									<table class="table table-bordered table-hover">
										<thead>
											<tr>
												<th class="span4">Tên khuyến mãi</th>
												<th>Bắt đầu</th>
												<th>Kết thúc</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Khuyến mãi tháng 12</td>
												<td>12/12/2013</td>
												<td>01/01/2014</td>
												<td>
													<a href="javascript:void(0)" class="btn btn-mini purple">Xem</a>
													<a href="javascript:void(0)" class="btn btn-mini">Sửa</a>
													<a href="javascript:void(0)" class="btn btn-mini">Ẩn tin</a>
													<a href="javascript:void(0)" class="btn btn-mini">Xóa</a>
												</td>
											</tr>
											<tr>
												<td>Khuyến mãi tháng 12</td>
												<td>12/12/2013</td>
												<td>01/01/2014</td>
												<td>
													<a href="javascript:void(0)" class="btn btn-mini purple">Xem</a>
													<a href="javascript:void(0)" class="btn btn-mini">Sửa</a>
													<a href="javascript:void(0)" class="btn btn-mini">Ẩn tin</a>
													<a href="javascript:void(0)" class="btn btn-mini">Xóa</a>
												</td>
											</tr>
											<tr>
												<td>Khuyến mãi tháng 12</td>
												<td>12/12/2013</td>
												<td>01/01/2014</td>
												<td>
													<a href="javascript:void(0)" class="btn btn-mini purple">Xem</a>
													<a href="javascript:void(0)" class="btn btn-mini">Sửa</a>
													<a href="javascript:void(0)" class="btn btn-mini">Ẩn tin</a>
													<a href="javascript:void(0)" class="btn btn-mini">Xóa</a>
												</td>
											</tr>
										</tbody>
									</table>
								</div>						
								<!-- BEGIN PAGINATION-->
								<div class="row-fluid no-background">
									<div class="span12">
										<div class="pagination pull-right margin-right">
											<ul>
												<li><a href="#" title="Trang đầu tiên"><i class="icon-step-backward"></i></a></li>
												<li><a href="#" title="Trang trước">&laquo;</a></li>
												<li><a href="#">1</a></li>
												<li><a href="#">2</a></li>
												<li><a href="#">3</a></li>
												<li><a href="#">4</a></li>
												<li><a href="#">5</a></li>
												<li><a href="#" title="Trang sau">&raquo;</a></li>
												<li><a href="#" title="Trang cuối cùng"><i class="icon-step-forward"></i></a></li>
											</ul>
										</div>
									</div>
								</div>
								<!-- END PAGINATION-->
								<!---->
							</div>
                   
                        </div>
                    
						<div id="draff" class="tab-pane row-fluid " >
                             <div class="portlet box">
								<div class="portlet-title hide">
									<div class="caption">
										<!--i class="icon-reorder"></i-->
									</div>
									
									<div class="tools">                                
										<!--a href="#config-form" data-toggle="modal" class="config"></a-->
										<!--a href="javascript:;" class="reload" title="Reload"></a-->
									</div>
									<div class="actions">									
										<!--div class="btn-group">
											<a class="btn green" href="#" title="Columns" data-toggle="dropdown">
												<i class="icon-columns"></i>
												
											</a>
											<div class="dropdown-menu hold-on-click dropdown-checkboxes right column-toggler">
												<label>
													<input type="checkbox" checked column-name="Showall">Show all</label>
												<label>
													<input type="checkbox" checked column-name="Name">Name</label>
												<label>
													<input type="checkbox" checked column-name="Content">Content</label>
												<label>
													<input type="checkbox" checked column-name="CreateDate">Create Date</label>
												<label>
													<input type="checkbox" checked column-name="ModifiedDate">Modified date</label>
											</div>
										</div-->	
										<!--div class="btn-group">	
											<a class="btn green" href="#" title="Page Size" data-toggle="dropdown">
												<i class="icon-list"></i>										
											</a>
											<ul class="dropdown-menu right">
												<li><a href="#">5</a></li>
												<li><a href="#">10</a></li>
												<li><a href="#">15</a></li>
												<li><a href="#">20</a></li>											
											</ul>
										</div-->
									</div>
								</div>
								<!---->
								<div class="portlet-body">
									<table class="table table-bordered table-hover">
										<thead>
											<tr>
												<th class="span4">Tên khuyến mãi</th>
												<th>Bắt đầu</th>
												<th>Kết thúc</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Khuyến mãi tháng 12</td>
												<td>12/12/2013</td>
												<td>01/01/2014</td>
												<td>
													<a href="javascript:void(0)" class="btn btn-mini purple">Xem</a>
													<a href="javascript:void(0)" class="btn btn-mini">Sửa</a>
													<a href="javascript:void(0)" class="btn btn-mini">Đăng tin</a>
													<a href="javascript:void(0)" class="btn btn-mini">Xóa</a>
												</td>
											</tr>
											<tr>
												<td>Khuyến mãi tháng 12</td>
												<td>12/12/2013</td>
												<td>01/01/2014</td>
												<td>
													<a href="javascript:void(0)" class="btn btn-mini purple">Xem</a>
													<a href="javascript:void(0)" class="btn btn-mini">Sửa</a>
													<a href="javascript:void(0)" class="btn btn-mini">Đăng tin</a>
													<a href="javascript:void(0)" class="btn btn-mini">Xóa</a>
												</td>
											</tr>
											<tr>
												<td>Khuyến mãi tháng 12</td>
												<td>12/12/2013</td>
												<td>01/01/2014</td>
												<td>
													<a href="javascript:void(0)" class="btn btn-mini purple">Xem</a>
													<a href="javascript:void(0)" class="btn btn-mini">Sửa</a>
													<a href="javascript:void(0)" class="btn btn-mini">Đăng tin</a>
													<a href="javascript:void(0)" class="btn btn-mini">Xóa</a>
												</td>
											</tr>
										</tbody>
									</table>
								</div>						
								<!-- BEGIN PAGINATION-->
								<div class="row-fluid no-background">
									<div class="span12">
										<div class="pagination pull-right margin-right">
											<ul>
												<li><a href="#" title="Trang đầu tiên"><i class="icon-step-backward"></i></a></li>
												<li><a href="#" title="Trang trước">&laquo;</a></li>
												<li><a href="#">1</a></li>
												<li><a href="#">2</a></li>
												<li><a href="#">3</a></li>
												<li><a href="#">4</a></li>
												<li><a href="#">5</a></li>
												<li><a href="#" title="Trang sau">&raquo;</a></li>
												<li><a href="#" title="Trang cuối cùng"><i class="icon-step-forward"></i></a></li>
											</ul>
										</div>
									</div>
								</div>
								<!-- END PAGINATION-->
								<!---->
							</div>
                   
                        </div>
						
						<div id="inactive" class="tab-pane row-fluid " >
                             <div class="portlet box">
								<div class="portlet-title hide">
									<div class="caption">
										<!--i class="icon-reorder"></i-->
									</div>
									
									<div class="tools">                                
										<!--a href="#config-form" data-toggle="modal" class="config"></a-->
										<!--a href="javascript:;" class="reload" title="Reload"></a-->
									</div>
									<div class="actions">									
										<!--div class="btn-group">
											<a class="btn green" href="#" title="Columns" data-toggle="dropdown">
												<i class="icon-columns"></i>
												
											</a>
											<div class="dropdown-menu hold-on-click dropdown-checkboxes right column-toggler">
												<label>
													<input type="checkbox" checked column-name="Showall">Show all</label>
												<label>
													<input type="checkbox" checked column-name="Name">Name</label>
												<label>
													<input type="checkbox" checked column-name="Content">Content</label>
												<label>
													<input type="checkbox" checked column-name="CreateDate">Create Date</label>
												<label>
													<input type="checkbox" checked column-name="ModifiedDate">Modified date</label>
											</div>
										</div-->	
										<!--div class="btn-group">	
											<a class="btn green" href="#" title="Page Size" data-toggle="dropdown">
												<i class="icon-list"></i>										
											</a>
											<ul class="dropdown-menu right">
												<li><a href="#">5</a></li>
												<li><a href="#">10</a></li>
												<li><a href="#">15</a></li>
												<li><a href="#">20</a></li>											
											</ul>
										</div-->
									</div>
								</div>
								<!---->
								<div class="portlet-body">
									<table class="table table-bordered table-hover">
										<thead>
											<tr>
												<th class="span4">Tên khuyến mãi</th>
												<th>Bắt đầu</th>
												<th>Kết thúc</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Khuyến mãi tháng 12</td>
												<td>12/12/2013</td>
												<td>01/01/2014</td>
												<td>
													<a href="javascript:void(0)" class="btn btn-mini purple">Xem</a>
													<a href="javascript:void(0)" class="btn btn-mini">Sửa</a>													
													<a href="javascript:void(0)" class="btn btn-mini">Xóa</a>
												</td>
											</tr>
											<tr>
												<td>Khuyến mãi tháng 12</td>
												<td>12/12/2013</td>
												<td>01/01/2014</td>
												<td>
													<a href="javascript:void(0)" class="btn btn-mini purple">Xem</a>
													<a href="javascript:void(0)" class="btn btn-mini">Sửa</a>													
													<a href="javascript:void(0)" class="btn btn-mini">Xóa</a>
												</td>
											</tr>
											<tr>
												<td>Khuyến mãi tháng 12</td>
												<td>12/12/2013</td>
												<td>01/01/2014</td>
												<td>
													<a href="javascript:void(0)" class="btn btn-mini purple">Xem</a>
													<a href="javascript:void(0)" class="btn btn-mini">Sửa</a>													
													<a href="javascript:void(0)" class="btn btn-mini">Xóa</a>
												</td>
											</tr>
										</tbody>
									</table>
								</div>						
								<!-- BEGIN PAGINATION-->
								<div class="row-fluid no-background">
									<div class="span12">
										<div class="pagination pull-right margin-right">
											<ul>
												<li><a href="#" title="Trang đầu tiên"><i class="icon-step-backward"></i></a></li>
												<li><a href="#" title="Trang trước">&laquo;</a></li>
												<li><a href="#">1</a></li>
												<li><a href="#">2</a></li>
												<li><a href="#">3</a></li>
												<li><a href="#">4</a></li>
												<li><a href="#">5</a></li>
												<li><a href="#" title="Trang sau">&raquo;</a></li>
												<li><a href="#" title="Trang cuối cùng"><i class="icon-step-forward"></i></a></li>
											</ul>
										</div>
									</div>
								</div>
								<!-- END PAGINATION-->
								<!---->
							</div>
                   
                        </div>
						
					</div>
                </div>
                <!--end span9-->
            </div>
        </div>
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
