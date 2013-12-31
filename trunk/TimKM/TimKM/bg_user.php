<?php

/* TODO: Add code here */
require('config/globalconfig.php');
include_once('class/model_user.php');
$objUser = new Model_User($objConnection);
if ($_pgR["act"] == Model_User::ACT_REGISTER)
{
	$userName = $_pgR['username'];
	$userName = global_editor::rteSafe(html_entity_decode($userName,ENT_COMPAT ,'UTF-8' ));
	$password = $_pgR['password'];
	$password = global_editor::rteSafe(html_entity_decode($password,ENT_COMPAT ,'UTF-8' ));
	
	$fullname = $_pgR['fullname'];
	$fullname = global_editor::rteSafe(html_entity_decode($fullname,ENT_COMPAT ,'UTF-8' ));
	$birthDate = $_pgR['birthdate'];
	$birthDate = global_editor::rteSafe(html_entity_decode($birthDate,ENT_COMPAT ,'UTF-8' ));
	$email = $_pgR['email'];
	$email = global_editor::rteSafe(html_entity_decode($email,ENT_COMPAT ,'UTF-8' ));
	$sex = $_pgR['sex'];
	$sex = global_editor::rteSafe(html_entity_decode($sex,ENT_COMPAT ,'UTF-8' ));
	
	if($objUser->checkExistUserName($userName)){
		$arrHeader = global_common::getMessageHeaderArr($banCode);//$banCode
		echo global_common::convertToXML(
				$arrHeader, array('rs', 'inf'), 
				array(2, 'Tên đăng nhập đã tồn tại'), 
				array( 0, 1 )
				);
		return;
	}
	if($objUser->checkExistEmail($email)){
		$arrHeader = global_common::getMessageHeaderArr($banCode);//$banCode
		echo global_common::convertToXML(
				$arrHeader, array('rs', 'inf'), 
				array(3, 'Email đã tồn tại'), 
				array( 0, 1 )
				);
		return;
	}
	$resultID = $objUser->register($userName,$password,$fullname,$birthDate,$email,$sex);
	if ($resultID)
	{
		$arrHeader = global_common::getMessageHeaderArr($banCode);//$banCode
		echo global_common::convertToXML(
				$arrHeader, array('rs', 'inf'), 
				array(1, 'Đăng ký thành công'), 
				array( 0, 1 )
				);
		return;
	}
	else
	{
		echo global_common::convertToXML($arrHeader, array('rs','info'), array(0,'Đăng ký thất bại'), array(0,1));
		return;
	}
}
else if ($_pgR["act"] == Model_User::ACT_LOGOUT)
{
		// or this would remove all the variables in the session, but not the session itself 
		session_unset(); 		
		// this would destroy the session variables 
		session_destroy(); 
		echo global_common::convertToXML(
				$arrHeader, array('rs', 'inf'), 
				array(1, ''), 
				array( 0, 1 )
				);
		return;
}
?>