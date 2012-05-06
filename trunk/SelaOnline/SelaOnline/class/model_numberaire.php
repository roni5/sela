<?php
/*
 * This file was automatically generated By Code Smith 
 * Modifications will be overwritten when code smith is run
 *
 * PLEASE DO NOT MAKE MODIFICATIONS TO THIS FILE
 * Date Created 5/6/2012 1:15:55 PM
 *
 */

/* <summary>
 * Implementations of slnumberaires represent a Numberaire
 * </summary>
 */
class Model_Numberaire
{		   
	#region PRESERVE ExtraMethods For Numberaire
	#endregion
    #region Contants	
    const ACT_ADD							= 10;
    const ACT_UPDATE						= 11;
    const ACT_DELETE						= 12;
    const ACT_CHANGE_PAGE					= 13;
    const ACT_SHOW_EDIT                     = 14;
    const ACT_GET                           = 15;
    const NUM_PER_PAGE                      = 15;
    
    const TBL_SL_NUMBERAIRE			            = 'sl_numberaire';

	const SQL_INSERT_SL_NUMBERAIRE		= 'INSERT INTO `{0}`
		(
			NumberaireID,
			NumberaireName,
			CreatedBy,
			CreatedDate,
			ModifiedBy,
			ModifiedDate,
			DeletedBy,
			DeletedDate,
			IsDeleted,
			Status
        )
        VALUES (
			\'{1}\', \'{2}\', \'{3}\', \'{4}\', \'{5}\', \'{6}\', \'{7}\', \'{8}\', \'{9}\', \'{10}\'
        );';
        
	const SQL_UPDATE_SL_NUMBERAIRE		= 'UPDATE `{0}`
		SET  
			`NumberaireID` = \'{1}\',
			`NumberaireName` = \'{2}\',
			`CreatedBy` = \'{3}\',
			`CreatedDate` = \'{4}\',
			`ModifiedBy` = \'{5}\',
			`ModifiedDate` = \'{6}\',
			`DeletedBy` = \'{7}\',
			`DeletedDate` = \'{8}\',
			`IsDeleted` = \'{9}\',
			`Status` = \'{10}\'
		WHERE `NumberaireID` = \'{1}\'  ';
		   

    const SQL_CREATE_TABLE_SL_NUMBERAIRE		= 'CREATE TABLE `{0}` (

			`NumberaireID` varchar(60),
			`NumberaireName` varchar(150),
			`CreatedBy` varchar(60),
			`CreatedDate` datetime(0),
			`ModifiedBy` varchar(60),
			`ModifiedDate` datetime(0),
			`DeletedBy` varchar(60),
			`DeletedDate` datetime(0),
			`IsDeleted` bit(0),
			`Status` varchar(60),
			PRIMARY KEY(NumberaireID)
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
	public function  Model_Numberaire($objConnection)
	{
		$this->_objConnection = $objConnection;
		
	}
    #region
    
    #region Public Functions
    
    public function insert( $numberairename,$createdby,$createddate,$modifiedby,$modifieddate,$deletedby,$deleteddate,$isdeleted,$status)
	{
		$intID = global_common::getMaxID(self::TBL_SL_NUMBERAIRE);
		
		$strTableName = self::TBL_SL_NUMBERAIRE;
		$strSQL = global_common::prepareQuery(self::SQL_INSERT_SL_NUMBERAIRE,
				array(self::TBL_SL_NUMBERAIRE,$intID,global_common::escape_mysql_string($numberairename),global_common::escape_mysql_string($createdby),global_common::escape_mysql_string($createddate),global_common::escape_mysql_string($modifiedby),global_common::escape_mysql_string($modifieddate),global_common::escape_mysql_string($deletedby),global_common::escape_mysql_string($deleteddate),global_common::escape_mysql_string($isdeleted),global_common::escape_mysql_string($status)));
		
		if (!global_common::ExecutequeryWithCheckExistedTable($strSQL,self::SQL_CREATE_TABLE_SL_NUMBERAIRE,$this->_objConnection,$strTableName))
		{
			//echo $strSQL;
			global_common::writeLog('Error add sl_numberaire:'.$strSQL,1);
			return false;
		}	
		return $intID;
		
	}
    
    public function update($numberaireid,$numberairename,$createdby,$createddate,$modifiedby,$modifieddate,$deletedby,$deleteddate,$isdeleted,$status)
	{
		$strTableName = self::TBL_SL_NUMBERAIRE;
		$strSQL = global_common::prepareQuery(self::SQL_UPDATE_SL_NUMBERAIRE,
				array($strTableName,global_common::escape_mysql_string($numberaireid),global_common::escape_mysql_string($numberairename),global_common::escape_mysql_string($createdby),global_common::escape_mysql_string($createddate),global_common::escape_mysql_string($modifiedby),global_common::escape_mysql_string($modifieddate),global_common::escape_mysql_string($deletedby),global_common::escape_mysql_string($deleteddate),global_common::escape_mysql_string($isdeleted),global_common::escape_mysql_string($status) ));
		
		if (!global_common::ExecutequeryWithCheckExistedTable($strSQL,self::SQL_CREATE_TABLE_SL_NUMBERAIRE,$this->_objConnection,$strTableName))
		{
			//echo $strSQL;
			global_common::writeLog('Error add sl_numberaire:'.$strSQL,1);
			return false;
		}	
		return $intNewID;		
	}
    
    public function getNumberaireByID($objID,$selectField='*') 
	{		
		$strSQL .= global_common::prepareQuery(global_common::SQL_SELECT_FREE, 
				array($selectField, self::TBL_SL_NUMBERAIRE ,							
					'WHERE NumberaireID = \''.$objID.'\' '));
		//echo '<br>SQL:'.$strSQL;
		$arrResult =$this->_objConnection->selectCommand($strSQL);		
		if(!$arrResult)
		{
			global_common::writeLog('get sl_numberaire ByID:'.$strSQL,1,$_mainFrame->pPage);
			return null;
		}
		//print_r($arrResult);
		return $arrResult[0];
	}
    
    public function getAllNumberaire($selectField='*') 
	{		
		$strSQL .= global_common::prepareQuery(global_common::SQL_SELECT_FREE, 
				array($selectField, self::TBL_SL_NUMBERAIRE ,							
					''));
		//echo '<br>SQL:'.$strSQL;
		$arrResult =$this->_objConnection->selectCommand($strSQL);		
		if(!$arrResult)
		{
			global_common::writeLog('get All sl_numberaire:'.$strSQL,1,$_mainFrame->pPage);
			return null;
		}
		//print_r($arrResult);
		return $arrResult;
	}
    
    public function getListNumberaire($intPage,$orderBy='NumberaireID', $whereClause)
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
					self::TBL_SL_NUMBERAIRE,$orderBy.' '.$whereClause.' limit '.(($intPage-1)* self::NUM_PER_PAGE).','.self::NUM_PER_PAGE));
		//echo 'sql:'.$strSQL;	
		$arrResult = $this->_objConnection->selectCommand($strSQL);
		//print_r($arrResult);
		$strHTML = '<table class="tbl-list">
                    <thead>
						<td>NumberaireID</td>
						<td>NumberaireName</td>
						<td>CreatedBy</td>
						<td>CreatedDate</td>
						<td>ModifiedBy</td>
						<td>ModifiedDate</td>
						<td>DeletedBy</td>
						<td>DeletedDate</td>
						<td>IsDeleted</td>
						<td>Status</td>
                    </thead>
                    <tbody>';
		$icount = count($arrmenu);
		for($i=0;$i<$icount;$i++)
		{
			$strHTML.='<tr class="'.($i%2==0?'even':'odd').'">
						<td>'.$arrResult[$i]['NumberaireID'].'</td>
						<td>'.$arrResult[$i]['NumberaireName'].'</td>
						<td>'.$arrResult[$i]['CreatedBy'].'</td>
						<td>'.$arrResult[$i]['CreatedDate'].'</td>
						<td>'.$arrResult[$i]['ModifiedBy'].'</td>
						<td>'.$arrResult[$i]['ModifiedDate'].'</td>
						<td>'.$arrResult[$i]['DeletedBy'].'</td>
						<td>'.$arrResult[$i]['DeletedDate'].'</td>
						<td><input type="checkbox" onclick="_objNumberaire.showHide(\''.$arrResult[$i]['NumberaireID'].'\',\''.$arrResult[$i]['name'].'\',this)" '.($arrResult[$i]['IsDeleted']?'':'checked=checked').' /></td>
						<td class="lastCell">'.$arrResult[$i]['Status'].'</td>
					  </tr>';
		}
		$strHTML.='</tbody></table>';
		
		$strHTML .= "<div>".global_common::getPagingHTMLByNum($intPage,self::NUM_PER_PAGE,global_common::getTotalRecord(self::TBL_SL_NUMBERAIRE,$this->_objConnection),
				"_objMenu.changePage")."</div>";
		return $strHTML;
	}
    
    #endregion   
}
?>
