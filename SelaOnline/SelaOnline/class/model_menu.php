<?php
/*
 * This file was automatically generated By Code Smith 
 * Modifications will be overwritten when code smith is run
 *
 * PLEASE DO NOT MAKE MODIFICATIONS TO THIS FILE
 * Date Created 5/6/2012 1:15:54 PM
 *
 */

/* <summary>
 * Implementations of slmenus represent a Menu
 * </summary>
 */
class Model_Menu
{		   
	#region PRESERVE ExtraMethods For Menu
	#endregion
    #region Contants	
    const ACT_ADD							= 10;
    const ACT_UPDATE						= 11;
    const ACT_DELETE						= 12;
    const ACT_CHANGE_PAGE					= 13;
    const ACT_SHOW_EDIT                     = 14;
    const ACT_GET                           = 15;
    const NUM_PER_PAGE                      = 15;
    
    const TBL_SL_MENU			            = 'sl_menu';

	const SQL_INSERT_SL_MENU		= 'INSERT INTO `{0}`
		(
			MenuID,
			MenuName,
			Link,
			NumOrder,
			IsDeleted,
			CreatedBy,
			CreatedDate,
			ModifiedBy,
			ModifiedDate,
			DeletedBy,
			DeletedDate
        )
        VALUES (
			\'{1}\', \'{2}\', \'{3}\', \'{4}\', \'{5}\', \'{6}\', \'{7}\', \'{8}\', \'{9}\', \'{10}\', \'{11}\'
        );';
        
	const SQL_UPDATE_SL_MENU		= 'UPDATE `{0}`
		SET  
			`MenuID` = \'{1}\',
			`MenuName` = \'{2}\',
			`Link` = \'{3}\',
			`NumOrder` = \'{4}\',
			`IsDeleted` = \'{5}\',
			`CreatedBy` = \'{6}\',
			`CreatedDate` = \'{7}\',
			`ModifiedBy` = \'{8}\',
			`ModifiedDate` = \'{9}\',
			`DeletedBy` = \'{10}\',
			`DeletedDate` = \'{11}\'
		WHERE `MenuID` = \'{1}\'  ';
		   

    const SQL_CREATE_TABLE_SL_MENU		= 'CREATE TABLE `{0}` (

			`MenuID` varchar(60),
			`MenuName` varchar(150),
			`Link` varchar(765),
			`NumOrder` int(0),
			`IsDeleted` bit(0),
			`CreatedBy` varchar(60),
			`CreatedDate` datetime(0),
			`ModifiedBy` varchar(60),
			`ModifiedDate` datetime(0),
			`DeletedBy` varchar(60),
			`DeletedDate` datetime(0),
			PRIMARY KEY(MenuID)
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
	public function  Model_Menu($objConnection)
	{
		$this->_objConnection = $objConnection;
		
	}
    #region
    
    #region Public Functions
    
    public function insert( $menuname,$link,$numorder,$isdeleted,$createdby,$createddate,$modifiedby,$modifieddate,$deletedby,$deleteddate)
	{
		$intID = global_common::getMaxID(self::TBL_SL_MENU);
		
		$strTableName = self::TBL_SL_MENU;
		$strSQL = global_common::prepareQuery(self::SQL_INSERT_SL_MENU,
				array(self::TBL_SL_MENU,$intID,global_common::escape_mysql_string($menuname),global_common::escape_mysql_string($link),global_common::escape_mysql_string($numorder),global_common::escape_mysql_string($isdeleted),global_common::escape_mysql_string($createdby),global_common::escape_mysql_string($createddate),global_common::escape_mysql_string($modifiedby),global_common::escape_mysql_string($modifieddate),global_common::escape_mysql_string($deletedby),global_common::escape_mysql_string($deleteddate)));
		
		if (!global_common::ExecutequeryWithCheckExistedTable($strSQL,self::SQL_CREATE_TABLE_SL_MENU,$this->_objConnection,$strTableName))
		{
			//echo $strSQL;
			global_common::writeLog('Error add sl_menu:'.$strSQL,1);
			return false;
		}	
		return $intID;
		
	}
    
    public function update($menuid,$menuname,$link,$numorder,$isdeleted,$createdby,$createddate,$modifiedby,$modifieddate,$deletedby,$deleteddate)
	{
		$strTableName = self::TBL_SL_MENU;
		$strSQL = global_common::prepareQuery(self::SQL_UPDATE_SL_MENU,
				array($strTableName,global_common::escape_mysql_string($menuid),global_common::escape_mysql_string($menuname),global_common::escape_mysql_string($link),global_common::escape_mysql_string($numorder),global_common::escape_mysql_string($isdeleted),global_common::escape_mysql_string($createdby),global_common::escape_mysql_string($createddate),global_common::escape_mysql_string($modifiedby),global_common::escape_mysql_string($modifieddate),global_common::escape_mysql_string($deletedby),global_common::escape_mysql_string($deleteddate) ));
		
		if (!global_common::ExecutequeryWithCheckExistedTable($strSQL,self::SQL_CREATE_TABLE_SL_MENU,$this->_objConnection,$strTableName))
		{
			//echo $strSQL;
			global_common::writeLog('Error add sl_menu:'.$strSQL,1);
			return false;
		}	
		return $intNewID;		
	}
    
    public function getMenuByID($objID,$selectField='*') 
	{		
		$strSQL .= global_common::prepareQuery(global_common::SQL_SELECT_FREE, 
				array($selectField, self::TBL_SL_MENU ,							
					'WHERE MenuID = \''.$objID.'\' '));
		//echo '<br>SQL:'.$strSQL;
		$arrResult =$this->_objConnection->selectCommand($strSQL);		
		if(!$arrResult)
		{
			global_common::writeLog('get sl_menu ByID:'.$strSQL,1,$_mainFrame->pPage);
			return null;
		}
		//print_r($arrResult);
		return $arrResult[0];
	}
    
    public function getAllMenu($selectField='*') 
	{		
		$strSQL .= global_common::prepareQuery(global_common::SQL_SELECT_FREE, 
				array($selectField, self::TBL_SL_MENU ,							
					''));
		//echo '<br>SQL:'.$strSQL;
		$arrResult =$this->_objConnection->selectCommand($strSQL);		
		if(!$arrResult)
		{
			global_common::writeLog('get All sl_menu:'.$strSQL,1,$_mainFrame->pPage);
			return null;
		}
		//print_r($arrResult);
		return $arrResult;
	}
    
    public function getListMenu($intPage,$orderBy='MenuID', $whereClause)
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
					self::TBL_SL_MENU,$orderBy.' '.$whereClause.' limit '.(($intPage-1)* self::NUM_PER_PAGE).','.self::NUM_PER_PAGE));
		//echo 'sql:'.$strSQL;	
		$arrResult = $this->_objConnection->selectCommand($strSQL);
		//print_r($arrResult);
		$strHTML = '<table class="tbl-list">
                    <thead>
						<td>MenuID</td>
						<td>MenuName</td>
						<td>Link</td>
						<td>NumOrder</td>
						<td>IsDeleted</td>
						<td>CreatedBy</td>
						<td>CreatedDate</td>
						<td>ModifiedBy</td>
						<td>ModifiedDate</td>
						<td>DeletedBy</td>
						<td>DeletedDate</td>
                    </thead>
                    <tbody>';
		$icount = count($arrmenu);
		for($i=0;$i<$icount;$i++)
		{
			$strHTML.='<tr class="'.($i%2==0?'even':'odd').'">
						<td>'.$arrResult[$i]['MenuID'].'</td>
						<td>'.$arrResult[$i]['MenuName'].'</td>
						<td>'.$arrResult[$i]['Link'].'</td>
						<td>'.$arrResult[$i]['NumOrder'].'</td>
						<td><input type="checkbox" onclick="_objMenu.showHide(\''.$arrResult[$i]['MenuID'].'\',\''.$arrResult[$i]['name'].'\',this)" '.($arrResult[$i]['IsDeleted']?'':'checked=checked').' /></td>
						<td>'.$arrResult[$i]['CreatedBy'].'</td>
						<td>'.$arrResult[$i]['CreatedDate'].'</td>
						<td>'.$arrResult[$i]['ModifiedBy'].'</td>
						<td>'.$arrResult[$i]['ModifiedDate'].'</td>
						<td>'.$arrResult[$i]['DeletedBy'].'</td>
						<td class="lastCell">'.$arrResult[$i]['DeletedDate'].'</td>
					  </tr>';
		}
		$strHTML.='</tbody></table>';
		
		$strHTML .= "<div>".global_common::getPagingHTMLByNum($intPage,self::NUM_PER_PAGE,global_common::getTotalRecord(self::TBL_SL_MENU,$this->_objConnection),
				"_objMenu.changePage")."</div>";
		return $strHTML;
	}
    
    #endregion   
}
?>
