<?php
/*
 * This file was automatically generated By Code Smith 
 * Modifications will be overwritten when code smith is run
 *
 * PLEASE DO NOT MAKE MODIFICATIONS TO THIS FILE
 * Date Created 5/6/2012 1:16:01 PM
 *
 */

/* <summary>
 * Implementations of slusers represent a User
 * </summary>
 */
class Model_User
{		   
	#region PRESERVE ExtraMethods For User
	#endregion
    #region Contants	
    const ACT_ADD							= 10;
    const ACT_UPDATE						= 11;
    const ACT_DELETE						= 12;
    const ACT_CHANGE_PAGE					= 13;
    const ACT_SHOW_EDIT                     = 14;
    const ACT_GET                           = 15;
	const ACT_LOGIN							= 100;
	const ACT_LOGOUT						= 101;
	const ACT_CHANGE_PASS					= 102;
	const ACT_REGISTER						= 103;
	
    const NUM_PER_PAGE                      = 15;
    
    const TBL_SL_USER			            = 'sl_user';

	const SQL_INSERT_SL_USER		= 'INSERT INTO `{0}`
		(
			UserID,
			UserName,
			Password,
			Fullname,
			BirthDate,
			Address,
			Phone,
			Email,
			Sex,
			Identity,
			RoleID,
			UserRankID,
			Avartar,
			AccountID,
			IsActived
        )
        VALUES (
			\'{1}\', \'{2}\', \'{3}\', \'{4}\', \'{5}\', \'{6}\', \'{7}\', \'{8}\', \'{9}\', \'{10}\', \'{11}\', \'{12}\', \'{13}\', \'{14}\', \'{15}\'
        );';
        
	const SQL_UPDATE_SL_USER		= 'UPDATE `{0}`
		SET  
			`UserID` = \'{1}\',
			`UserName` = \'{2}\',
			`Password` = \'{3}\',
			`Fullname` = \'{4}\',
			`BirthDate` = \'{5}\',
			`Address` = \'{6}\',
			`Phone` = \'{7}\',
			`Email` = \'{8}\',
			`Sex` = \'{9}\',
			`Identity` = \'{10}\',
			`RoleID` = \'{11}\',
			`UserRankID` = \'{12}\',
			`Avartar` = \'{13}\',
			`AccountID` = \'{14}\',
			`IsActived` = \'{15}\'
		WHERE `UserID` = \'{1}\'  ';
		   

    const SQL_CREATE_TABLE_SL_USER		= 'CREATE TABLE `{0}` (

			`UserID` varchar(60),
			`UserName` varchar(150),
			`Password` varchar(765),
			`Fullname` varchar(765),
			`BirthDate` datetime(0),
			`Address` varchar(765),
			`Phone` varchar(60),
			`Email` varchar(765),
			`Sex` bit(0),
			`Identity` varchar(60),
			`RoleID` varchar(60),
			`UserRankID` varchar(60),
			`Avartar` varchar(765),
			`AccountID` varchar(765),
			`IsActived` bit(0),
			PRIMARY KEY(UserID)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;';
	
    #endregion   
    
    #region Variables
	var $_objConnection;
	#end region
	
	#region Contructors
	/**
	*  Phuong th?c kh?i t?o d?i tu?ng faq d?ng th?i t?o connection d?n db
	*
	* @param object $objConnection ??i tu?ng k?t n?i d?n db
			
	* @return void 
	*
	*/
	public function  Model_User($objConnection)
	{
		$this->_objConnection = $objConnection;
		
	}
    #region
    
    #region Public Functions
    
    public function insert( $username,$password,$fullname,$birthdate,$address,$phone,$email,$sex,$identity,$roleid,$userrankid,$avartar,$accountid,$isactived)
	{
		$intID = global_common::getMaxID(self::TBL_SL_USER);
		$password = self::getPassword($username,$password);
		$strTableName = self::TBL_SL_USER;
		$strSQL = global_common::prepareQuery(self::SQL_INSERT_SL_USER,
				array(self::TBL_SL_USER,$intID,global_common::escape_mysql_string($username),global_common::escape_mysql_string($password),global_common::escape_mysql_string($fullname),global_common::escape_mysql_string($birthdate),global_common::escape_mysql_string($address),global_common::escape_mysql_string($phone),global_common::escape_mysql_string($email),global_common::escape_mysql_string($sex),global_common::escape_mysql_string($identity),global_common::escape_mysql_string($roleid),global_common::escape_mysql_string($userrankid),global_common::escape_mysql_string($avartar),global_common::escape_mysql_string($accountid),global_common::escape_mysql_string($isactived)));
		
		if (!global_common::ExecutequeryWithCheckExistedTable($strSQL,self::SQL_CREATE_TABLE_SL_USER,$this->_objConnection,$strTableName))
		{
			//echo $strSQL;
			global_common::writeLog('Error add sl_user:'.$strSQL,1);
			return false;
		}	
		return $intID;
	}
    
    public function update($userid,$username,$password,$fullname,$birthdate,$address,$phone,$email,$sex,$identity,$roleid,$userrankid,$avartar,$accountid,$isactived)
	{
		$strTableName = self::TBL_SL_USER;
		$strSQL = global_common::prepareQuery(self::SQL_UPDATE_SL_USER,
				array($strTableName,global_common::escape_mysql_string($userid),global_common::escape_mysql_string($username),global_common::escape_mysql_string($password),global_common::escape_mysql_string($fullname),global_common::escape_mysql_string($birthdate),global_common::escape_mysql_string($address),global_common::escape_mysql_string($phone),global_common::escape_mysql_string($email),global_common::escape_mysql_string($sex),global_common::escape_mysql_string($identity),global_common::escape_mysql_string($roleid),global_common::escape_mysql_string($userrankid),global_common::escape_mysql_string($avartar),global_common::escape_mysql_string($accountid),global_common::escape_mysql_string($isactived) ));
		
		if (!global_common::ExecutequeryWithCheckExistedTable($strSQL,self::SQL_CREATE_TABLE_SL_USER,$this->_objConnection,$strTableName))
		{
			//echo $strSQL;
			global_common::writeLog('Error add sl_user:'.$strSQL,1);
			return false;
		}	
		return $intNewID;		
	}
    
    public function getUserByID($objID,$selectField='*') 
	{		
		$strSQL .= global_common::prepareQuery(global_common::SQL_SELECT_FREE, 
				array($selectField, self::TBL_SL_USER ,							
					'WHERE UserID = \''.$objID.'\' '));
		//echo '<br>SQL:'.$strSQL;
		$arrResult =$this->_objConnection->selectCommand($strSQL);		
		if(!$arrResult)
		{
			global_common::writeLog('get sl_user ByID:'.$strSQL,1,$_mainFrame->pPage);
			return null;
		}
		//print_r($arrResult);
		return $arrResult[0];
	}
    
	public function getUserByUserName($objUserName,$selectField='*') 
	{		
		$strSQL .= global_common::prepareQuery(global_common::SQL_SELECT_FREE, 
				array($selectField, self::TBL_SL_USER ,							
					'WHERE UserName = \''.$objUserName.'\' '));
		//echo '<br>SQL:'.$strSQL;
		$arrResult =$this->_objConnection->selectCommand($strSQL);		
		if(!$arrResult)
		{
			global_common::writeLog('get sl_user By UserName:'.$strSQL,1,$_mainFrame->pPage);
			return null;
		}
		//print_r($arrResult);
		return $arrResult[0];
	}
	
    public function getAllUser($selectField='*') 
	{		
		$strSQL .= global_common::prepareQuery(global_common::SQL_SELECT_FREE, 
				array($selectField, self::TBL_SL_USER ,							
					''));
		//echo '<br>SQL:'.$strSQL;
		$arrResult =$this->_objConnection->selectCommand($strSQL);		
		if(!$arrResult)
		{
			global_common::writeLog('get All sl_user:'.$strSQL,1,$_mainFrame->pPage);
			return null;
		}
		//print_r($arrResult);
		return $arrResult;
	}
    
    public function getListUser($intPage,$orderBy='UserID', $whereClause)
	{		
        if($whereClause)
        {
            $whereClause='WHERE'+ $whereClause;						
        }
        if($orderBy)
        {
            $orderBy='ORDER BY'+ $orderBy;						
        }
		$strSQL .= global_common::prepareQuery(global_common::SQL_SELECT_FREE,array('*',
					self::TBL_SL_USER,$orderBy.' '.$whereClause.' limit '.(($intPage-1)* self::NUM_PER_PAGE).','.self::NUM_PER_PAGE));
		//echo 'sql:'.$strSQL;	
		$arrResult = $this->_objConnection->selectCommand($strSQL);
		//print_r($arrResult);
		$strHTML = '<table class="tbl-list">
                    <thead>
						<td>UserID</td>
						<td>UserName</td>
						<td>Password</td>
						<td>Fullname</td>
						<td>BirthDate</td>
						<td>Address</td>
						<td>Phone</td>
						<td>Email</td>
						<td>Sex</td>
						<td>Identity</td>
						<td>RoleID</td>
						<td>UserRankID</td>
						<td>Avartar</td>
						<td>AccountID</td>
						<td>IsActived</td>
                    </thead>
                    <tbody>';
		$icount = count($arrmenu);
		for($i=0;$i<$icount;$i++)
		{
			$strHTML.='<tr class="'.($i%2==0?'even':'odd').'">
						<td>'.$arrResult[$i]['UserID'].'</td>
						<td>'.$arrResult[$i]['UserName'].'</td>
						<td>'.$arrResult[$i]['Password'].'</td>
						<td>'.$arrResult[$i]['Fullname'].'</td>
						<td>'.$arrResult[$i]['BirthDate'].'</td>
						<td>'.$arrResult[$i]['Address'].'</td>
						<td>'.$arrResult[$i]['Phone'].'</td>
						<td>'.$arrResult[$i]['Email'].'</td>
						<td><input type="checkbox" onclick="_objUser.showHide(\''.$arrResult[$i]['UserID'].'\',\''.$arrResult[$i]['name'].'\',this)" '.($arrResult[$i]['IsDeleted']?'':'checked=checked').' /></td>
						<td>'.$arrResult[$i]['Identity'].'</td>
						<td>'.$arrResult[$i]['RoleID'].'</td>
						<td>'.$arrResult[$i]['UserRankID'].'</td>
						<td>'.$arrResult[$i]['Avartar'].'</td>
						<td>'.$arrResult[$i]['AccountID'].'</td>
						<td class="lastCell"><input type="checkbox" onclick="_objUser.showHide(\''.$arrResult[$i]['UserID'].'\',\''.$arrResult[$i]['name'].'\',this)" '.($arrResult[$i]['IsDeleted']?'':'checked=checked').' /></td>
					  </tr>';
		}
		$strHTML.='</tbody></table>';
		
		$strHTML .= "<div>".global_common::getPagingHTMLByNum($intPage,self::NUM_PER_PAGE,global_common::getTotalRecord(self::TBL_SL_USER,$this->_objConnection),
				"_objMenu.changePage")."</div>";
		return $strHTML;
	}
    
	public function getPassword($username,$pass) 
	{
		//echo $user_id.$pass.'->';
		return md5($username.$pass);
	}
	
	public function login($username,$pass) 
	{
		//echo $pass;
		$enPass = $this->getPassword($username,$pass);
		//echo $enPass;
		$objUser = $this->getUserByUserName($username);
		//print_r($objUser);
		if ($objUser && $objUser['Password'] == $enPass) 
		{
			//print_r($objUser);
			return $objUser;
		}
		else
		{
			return false;	
		}
	}
    #endregion   
}
?>
