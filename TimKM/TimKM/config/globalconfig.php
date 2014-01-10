<?php
// Neu tao session FAIL thi khoi tao session moi
//session_save_path('/tmp');
if(!session_start())
{
	session_regenerate_id();
}

require('class/common/include.php');
require('class/common/dbconnection.php');

require('class/application.php');
require('class/global_system.php');
//require('class/user_mobile_detect.php');
require('class/global_common.php');
require('class/global_mapping.php');

//require('class/security.php');
require('lib/log4php/LoggerManager.php');
require('class/global_editor.php');
//require('class/user_user.php');

// Tao global variables
global $_mainFrame;			// Xu ly hoac chua thong tin o muc he thong
global $_pgR;				// Tat ca parameter duoc truyen tu client. Trong code se khong dung $_GET hay $_POST nua.
global $_logger;			// Duoc su dung duy nhat trong global_common::writeLog(...)
global $_cacheXMLInfo;		// Quy dinh thong tin cache cho cac file XML
global $_cacheSQLInfo;		// Quy dinh thong tin cache cho cac cau truy can SQL
global $_cacheBusinessInfo;	// Quy dinh thong tin cache cho mot nghiep vu nao do
global $_mobileDetect;		// Detect co dang dung di dong ko

// Khoi tao gia tri cho global variables
$_pgR = global_common::getRequest();

// Create new object connection
$objConnection = new db_connection();

// Kiem tra xem dang o Front-end hay Back-end
$arrPath = explode('/', $_SERVER['SCRIPT_FILENAME']);
$strModule = $arrPath[count($arrPath)-2];
if('admin'==$strModule)
{
	$_objSystem = new global_system(global_system::LCT_BACK_END);
}
else
{
	$_objSystem = new global_system(global_system::LCT_FRONT_END);
}

/*
if(!global_common::isCLogin() && $_objSystem->_pName!='index')
{
	echo '<script>alert("Không được phép truy cập khi chưa login.");</script>';
	global_common::redirectByScript('index.php');
	exit;
}
	
//view list catalogue vấn được phép
if($_SESSION[global_common::SES_C_USERINFO]['admin_type'] == '2' && ($_objSystem->_pName=='admin_user'
			||$_objSystem->_pName=='admin_section'||$_objSystem->_pName=='admin_manufactory'||$_objSystem->_pName=='admin_menu'
			||($_objSystem->_pName=='admin_catalogue' && $_pgR['act'] != '15')) )
{
	echo '<script>alert("Không được phép truy cập trang này.!");</script>';
	global_common::redirectByScript('search.php');
	exit;
}

if($_SESSION[global_common::SES_C_USERINFO]['admin_type'] == '3' && ($_objSystem->_pName=='admin_user' 
	||$_objSystem->_pName=='admin_section' ||$_objSystem->_pName=='admin_property' ||
	$_objSystem->_pName=='admin_product' ||$_objSystem->_pName=='admin_manufactory' ||$_objSystem->_pName=='admin_menu' ||
	$_objSystem->_pName=='admin_faq' ||$_objSystem->_pName=='admin_catalogue' && $_pgR['act'] != '15'))
{
	echo '<script>alert("Không được phép truy cập trang này.!!");</script>';
	global_common::redirectByScript('search.php');
	exit;
}
*/
//print_r($_SESSION[global_common::SES_C_USERINFO]);
// Detect browser
//$_mobileDetect = new user_mobile_detect();
/*
	if('admin'==$strModule)
	{
		// Khoi tao cho bien global $_mainFrame va $_logger
		$_mainFrame = new main_frame(main_frame::LCT_BACK_END);
		$_logger = &LoggerManager::getLogger($_mainFrame->_pName);

		require('include/admin_consts.php');
		require('class/admin_global_common.php');
		
		// Write log for requests
		//Application::writeLogRequest(0);

	}else{
		// Khoi tao cho bien global $_mainFrame va $_logger
		$_mainFrame = new main_frame(main_frame::LCT_FRONT_END);
		$_logger = &LoggerManager::getLogger($_mainFrame->_pName);
	
		/**************************************** SECURITY ***********************************/
// Neu SESSION RONG va khong phai trang chay crontab thi EXIT
/*if(!trim(session_id()) && !$_SERVER["SHELL"])
{
	exit;
}*/

// Neu chay CRONTAB thi ko can security	
if (!$_SERVER["SHELL"]){
	/*			// Kiem tra va Ban nhung IP truy cap qua gioi quan cho phep
				$objAntidos = new antidos($objConnection);
				$banCode = $objAntidos->authenticated();
				if ($banCode){ // Neu bi BAN thi thoat.
					exit;
				}
			}else{*/
	// Loc du lieu dau vao, tranh SQL Enjection
	//editor::paraSafe($_pgR, $_COOKIE, consts::getArrayExceptPara());
}
/**************************************** END SECURITY ***********************************/

//require('class/user_login.php');

// Khoi tao doi tuong xu ly login cua USER. Cac gia tri nay duoc su dung lai trong các INCLUDE cua LOGIN
//$user_login = new user_login($objConnection);
//$loginResult = $user_login->autoLogin();

// Khởi tạo đối tượng xử lý activity và user profile
//require('class/profiles/user_profile.php');
//require('class/profiles/activity_action.php');
//require('class/user_invite.php');	
//$user_profile	=	new user_profile($objConnection);
//$activity_actions = activity_action::getInstance($objConnection);
//$user_invite	= new user_invite($objConnection);	
//if (global_common::isCLogin() ) 
//{
//	$currentUser =	$user_profile->getCurrentUser();
//	global $arr_subjectUserFriends; // Mảng danh sách user_id là bạn của subjectUser
//	global $arr_subjectUserFriends; // Mảng danh sách user_id là bạn của currentUser; // Mảng danh sách user_id là bạn của subjectUser
//	global $arr_currentUserRequestSent; //Mảng danh sách user_id được currentUser gửi lời mời kết bạn ( chưa accept)
//}
//if(isset($_pgR['uid']))
//{
//	$uid =trim($_pgR['uid']);	
//}
/*else
{
	$uid = global_common::hc_encode($currentUser['user_id']);
}*/
//decode uid
/*$uid = global_common::hc_decode($uid);	

$subjectUser=null;
$subjectUser = global_common::getUserProfile($objConnection,$uid);
		
		
//Biến toàn cục chứa danh sách bạn bè của user đang đăng nhập và user đang được view profile
if($subjectUser)
	$arr_subjectUserFriends = $user_invite->convertstrFriends2arr($subjectUser['friend_users']);
if($currentUser)
{	
	$arr_currentUserFriends = $user_invite->convertstrFriends2arr($currentUser['friend_users']);
	$arr_currentUserRequestSent = $user_invite->getFriendRequestSentByUser($currentUser['user_id']);
	/*
	echo '<pre>';
				 print_r($arr_currentUserRequestSent);
				echo '</pre>';*/

//}	
// Write log for requests

//Application::writeLogRequest(0);
//}

// AUTHENTICATION
// Must be in BACK-END and not index or logout page
/*$_SESSION['STOP_DIRECT_TO_MOBILE'] = true;
if (('admin'==$strModule) && ($_mainFrame->_pName!='index') && ($_mainFrame->_pName!='logout'))
{
	//start 1:comment lại khi debug
	if (!admin_global_common::checkRequestAuthentication($objConnection))
	{
		exit;	
	}
	//end 1.
}*/
//elseif('admin'!=$strModule)
{
	// TODO: DoNguyen - Tam thoi khong cho truy cap vao m.hellochao.com
	/*$subDomainMobile = 'm.hellochao.com';
	$moduleNameForMobile = 'm';
			
	// Redirect from mobile
	if ($_pgR['f']=='mobile')
	{
		$_SESSION['STOP_DIRECT_TO_MOBILE'] = true;
	}
			
	// Get domain name
	$domainName = global_common::getDomainName();
	// Detect browser
	$mobileDetect = new user_mobile_detect();
	if ($mobileDetect->isMobile())
	{
		if (!$_SESSION['STOP_DIRECT_TO_MOBILE'])
		{
			// Tu dong chuyen den trang chu cua mobile neu:
			// 1. Truy cap khong phai la domain danh cho mobile
			// 2. Truy cap ngoai 2 trang [index.php] hoac [search.php]
			if (($domainName != $subDomainMobile) 
				|| ($domainName == $subDomainMobile && $strModule != $moduleNameForMobile)
				|| ($_mainFrame->_pName != 'index' && $_mainFrame->_pName != 'search'))
			{
				// TODO: DoNguyen - Tam thoi ngung trang mobile
				//global_common::redirectByScript('http://$subDomainMobile/m/');
				global_common::redirectByScript('http://www.hellochao.com/');
			}
		}
	}else{
		if ($domainName == $subDomainMobile && $strModule != $moduleNameForMobile)
		{
			global_common::redirectByScript('http://www.hellochao.com/');
		}
	}*/
}

//tam
//$_SESSION[global_common::SES_C_USERINFO] = "user";
//$_SESSION[global_common::SES_C_USERINFO]["active"]=1;
//$_SESSION[global_common::SES_C_USERINFO] = null;
?>