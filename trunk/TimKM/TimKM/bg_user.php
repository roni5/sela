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
	$password = md5($strUserId.md5($password));
	$fullname = $_pgR['fullname'];
	$fullname = global_editor::rteSafe(html_entity_decode($fullname,ENT_COMPAT ,'UTF-8' ));
	$birthDate = $_pgR['birthdate'];
	$birthDate = global_editor::rteSafe(html_entity_decode($birthDate,ENT_COMPAT ,'UTF-8' ));
	$email = $_pgR['email'];
	$email = global_editor::rteSafe(html_entity_decode($email,ENT_COMPAT ,'UTF-8' ));
	$sex = $_pgR['sex'];
	$sex = global_editor::rteSafe(html_entity_decode($sex,ENT_COMPAT ,'UTF-8' ));
	$resultID = $objUser->register($userName,$password,$fullname,$birthDate,$email,$sex);
	if ($resultID)
	{
		$arrHeader = global_common::getMessageHeaderArr($banCode);//$banCode
		echo global_common::convertToXML(
				$arrHeader, array("rs", "inf"), 
				array(1, $result), 
				array( 0, 1 )
				);
		return;
	}
	else
	{
		echo global_common::convertToXML($arrHeader, array("rs","info"), array(0,"Input data is invalid"), array(0,1));
		return;
	}
}
?>