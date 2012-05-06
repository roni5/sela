<?php
/*
 * This file was automatically generated By Code Smith 
 * Modifications will be overwritten when code smith is run
 *
 * PLEASE DO NOT MAKE MODIFICATIONS TO THIS FILE
 * Date Created 5/6/2012 12:46:28 PM
 *
 */

/* <summary>
 * Implementations of slpartners represent a Partner
 * </summary>
 */
class Model_Partner
{		   
	#region PRESERVE ExtraMethods For Partner
	#endregion
    #region Contants	
    const ACT_ADD							= 10;
    const ACT_UPDATE						= 11;
    const ACT_DELETE						= 12;
    const ACT_CHANGE_PAGE					= 13;
    const ACT_SHOW_EDIT                     = 14;
    const ACT_GET                           = 15;
    const NUM_PER_PAGE                      = 15;
    
    const TBL_SL_PARTNER			            = 'sl_partner';

	const SQL_INSERT_SL_PARTNER		= 'INSERT INTO `{0}`
		(
			ParterID,
			PartnerName,
			Company,
			Address 1,
			Address 2,
			Address 3,
			Address 4,
			Address 5,
			Email 1,
			Email 2,
			Email 3,
			Email 4,
			Email 5,
			Phone 1,
			Phone 2,
			Phone 3,
			Phone 4,
			Phone 5,
			Fax 1,
			Fax 2,
			Fax 3,
			Fax 4,
			Fax 5,
			TaxNumber,
			AccountNumber,
			CreatedBy,
			CreatedDate,
			ModifiedBy,
			ModifiedDate,
			DeletedBy,
			DeletedDate,
			Status,
			IsDeleted
        )
        VALUES (
			\'1\', \'2\', \'3\', \'4\', \'5\', \'6\', \'7\', \'8\', \'9\', \'10\', \'11\', \'12\', \'13\', \'14\', \'15\', \'16\', \'17\', \'18\', \'19\', \'20\', \'21\', \'22\', \'23\', \'24\', \'25\', \'26\', \'27\', \'28\', \'29\', \'30\', \'31\', \'32\', \'33\'
        );';
        
	const SQL_UPDATE_SL_PARTNER		= 'UPDATE `{0}`
		SET  
			`ParterID` = \'1\',
			`PartnerName` = \'2\',
			`Company` = \'3\',
			`Address 1` = \'4\',
			`Address 2` = \'5\',
			`Address 3` = \'6\',
			`Address 4` = \'7\',
			`Address 5` = \'8\',
			`Email 1` = \'9\',
			`Email 2` = \'10\',
			`Email 3` = \'11\',
			`Email 4` = \'12\',
			`Email 5` = \'13\',
			`Phone 1` = \'14\',
			`Phone 2` = \'15\',
			`Phone 3` = \'16\',
			`Phone 4` = \'17\',
			`Phone 5` = \'18\',
			`Fax 1` = \'19\',
			`Fax 2` = \'20\',
			`Fax 3` = \'21\',
			`Fax 4` = \'22\',
			`Fax 5` = \'23\',
			`TaxNumber` = \'24\',
			`AccountNumber` = \'25\',
			`CreatedBy` = \'26\',
			`CreatedDate` = \'27\',
			`ModifiedBy` = \'28\',
			`ModifiedDate` = \'29\',
			`DeletedBy` = \'30\',
			`DeletedDate` = \'31\',
			`Status` = \'32\',
			`IsDeleted` = \'33\'
		WHERE `ParterID` = \'1\'  ';
		   

    const SQL_CREATE_TABLE_SL_PARTNER		= 'CREATE TABLE `{0}` (

			`ParterID` varchar(60),
			`PartnerName` varchar(765),
			`Company` varchar(765),
			`Address 1` varchar(765),
			`Address 2` varchar(765),
			`Address 3` varchar(765),
			`Address 4` varchar(765),
			`Address 5` varchar(765),
			`Email 1` varchar(765),
			`Email 2` varchar(765),
			`Email 3` varchar(765),
			`Email 4` varchar(765),
			`Email 5` varchar(765),
			`Phone 1` varchar(60),
			`Phone 2` varchar(60),
			`Phone 3` varchar(60),
			`Phone 4` varchar(60),
			`Phone 5` varchar(60),
			`Fax 1` varchar(60),
			`Fax 2` varchar(60),
			`Fax 3` varchar(60),
			`Fax 4` varchar(60),
			`Fax 5` varchar(60),
			`TaxNumber` varchar(150),
			`AccountNumber` varchar(150),
			`CreatedBy` varchar(60),
			`CreatedDate` datetime(0),
			`ModifiedBy` varchar(60),
			`ModifiedDate` datetime(0),
			`DeletedBy` varchar(60),
			`DeletedDate` datetime(0),
			`Status` varchar(60),
			`IsDeleted` bit(0),
			PRIMARY KEY(ParterID)
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
	public function  Model_Partner($objConnection)
	{
		$this->_objConnection = $objConnection;
		
	}
    #region
    
    #region Public Functions
    
    public function insert( $partnername,$company,$address 1,$address 2,$address 3,$address 4,$address 5,$email 1,$email 2,$email 3,$email 4,$email 5,$phone 1,$phone 2,$phone 3,$phone 4,$phone 5,$fax 1,$fax 2,$fax 3,$fax 4,$fax 5,$taxnumber,$accountnumber,$createdby,$createddate,$modifiedby,$modifieddate,$deletedby,$deleteddate,$status,$isdeleted)
	{
		$intID = global_common::getMaxID(self::TBL_SL_PARTNER);
		
		$strTableName = self::TBL_SL_PARTNER;
		$strSQL = global_common::prepareQuery(self::SQL_INSERT_SL_PARTNER,
				array(self::TBL_SL_PARTNER,$intID,global_common::escape_mysql_string($partnername),global_common::escape_mysql_string($company),global_common::escape_mysql_string($address 1),global_common::escape_mysql_string($address 2),global_common::escape_mysql_string($address 3),global_common::escape_mysql_string($address 4),global_common::escape_mysql_string($address 5),global_common::escape_mysql_string($email 1),global_common::escape_mysql_string($email 2),global_common::escape_mysql_string($email 3),global_common::escape_mysql_string($email 4),global_common::escape_mysql_string($email 5),global_common::escape_mysql_string($phone 1),global_common::escape_mysql_string($phone 2),global_common::escape_mysql_string($phone 3),global_common::escape_mysql_string($phone 4),global_common::escape_mysql_string($phone 5),global_common::escape_mysql_string($fax 1),global_common::escape_mysql_string($fax 2),global_common::escape_mysql_string($fax 3),global_common::escape_mysql_string($fax 4),global_common::escape_mysql_string($fax 5),global_common::escape_mysql_string($taxnumber),global_common::escape_mysql_string($accountnumber),global_common::escape_mysql_string($createdby),global_common::escape_mysql_string($createddate),global_common::escape_mysql_string($modifiedby),global_common::escape_mysql_string($modifieddate),global_common::escape_mysql_string($deletedby),global_common::escape_mysql_string($deleteddate),global_common::escape_mysql_string($status),global_common::escape_mysql_string($isdeleted)));
		
		if (!global_common::ExecutequeryWithCheckExistedTable($strSQL,self::SQL_CREATE_TABLE_SL_PARTNER,$this->_objConnection,$strTableName))
		{
			//echo $strSQL;
			global_common::writeLog('Error add sl_partner:'.$strSQL,1);
			return false;
		}	
		return $intID;
		
	}
    
    public function update($parterid,$partnername,$company,$address 1,$address 2,$address 3,$address 4,$address 5,$email 1,$email 2,$email 3,$email 4,$email 5,$phone 1,$phone 2,$phone 3,$phone 4,$phone 5,$fax 1,$fax 2,$fax 3,$fax 4,$fax 5,$taxnumber,$accountnumber,$createdby,$createddate,$modifiedby,$modifieddate,$deletedby,$deleteddate,$status,$isdeleted)
	{
		$strTableName = self::TBL_SL_PARTNER;
		$strSQL = global_common::prepareQuery(self::SQL_UPDATE_SL_PARTNER,
				array($strTableName,global_common::escape_mysql_string($parterid),global_common::escape_mysql_string($partnername),global_common::escape_mysql_string($company),global_common::escape_mysql_string($address 1),global_common::escape_mysql_string($address 2),global_common::escape_mysql_string($address 3),global_common::escape_mysql_string($address 4),global_common::escape_mysql_string($address 5),global_common::escape_mysql_string($email 1),global_common::escape_mysql_string($email 2),global_common::escape_mysql_string($email 3),global_common::escape_mysql_string($email 4),global_common::escape_mysql_string($email 5),global_common::escape_mysql_string($phone 1),global_common::escape_mysql_string($phone 2),global_common::escape_mysql_string($phone 3),global_common::escape_mysql_string($phone 4),global_common::escape_mysql_string($phone 5),global_common::escape_mysql_string($fax 1),global_common::escape_mysql_string($fax 2),global_common::escape_mysql_string($fax 3),global_common::escape_mysql_string($fax 4),global_common::escape_mysql_string($fax 5),global_common::escape_mysql_string($taxnumber),global_common::escape_mysql_string($accountnumber),global_common::escape_mysql_string($createdby),global_common::escape_mysql_string($createddate),global_common::escape_mysql_string($modifiedby),global_common::escape_mysql_string($modifieddate),global_common::escape_mysql_string($deletedby),global_common::escape_mysql_string($deleteddate),global_common::escape_mysql_string($status),global_common::escape_mysql_string($isdeleted) ));
		
		if (!global_common::ExecutequeryWithCheckExistedTable($strSQL,self::SQL_CREATE_TABLE_SL_PARTNER,$this->_objConnection,$strTableName))
		{
			//echo $strSQL;
			global_common::writeLog('Error add sl_partner:'.$strSQL,1);
			return false;
		}	
		return $intNewID;		
	}
    
    public function getPartnerByID($objID,$selectField='*') 
	{		
		$strSQL .= global_common::prepareQuery(global_common::SQL_SELECT_FREE, 
				array($selectField, self::TBL_SL_PARTNER ,							
					'WHERE ParterID = \''.$objID.'\' '));
		//echo '<br>SQL:'.$strSQL;
		$arrResult =$this->_objConnection->selectCommand($strSQL);		
		if(!$arrResult)
		{
			global_common::writeLog('get sl_partner ByID:'.$strSQL,1,$_mainFrame->pPage);
			return null;
		}
		//print_r($arrResult);
		return $arrResult[0];
	}
    
    public function getAllPartner($selectField='*') 
	{		
		$strSQL .= global_common::prepareQuery(global_common::SQL_SELECT_FREE, 
				array($selectField, self::TBL_SL_PARTNER ,							
					''));
		//echo '<br>SQL:'.$strSQL;
		$arrResult =$this->_objConnection->selectCommand($strSQL);		
		if(!$arrResult)
		{
			global_common::writeLog('get All sl_partner:'.$strSQL,1,$_mainFrame->pPage);
			return null;
		}
		//print_r($arrResult);
		return $arrResult;
	}
    
    public function getListPartner($intPage,$orderBy='ParterID', $whereClause)
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
					self::TBL_SL_PARTNER,$orderBy.' '.$whereClause.' limit '.(($intPage-1)* self::NUM_PER_PAGE).','.self::NUM_PER_PAGE));
		//echo 'sql:'.$strSQL;	
		$arrResult = $this->_objConnection->selectCommand($strSQL);
		//print_r($arrResult);
		$strHTML = '<table class="tbl-list">
                    <thead>
						<td>ParterID</td>
						<td>PartnerName</td>
						<td>Company</td>
						<td>Address 1</td>
						<td>Address 2</td>
						<td>Address 3</td>
						<td>Address 4</td>
						<td>Address 5</td>
						<td>Email 1</td>
						<td>Email 2</td>
						<td>Email 3</td>
						<td>Email 4</td>
						<td>Email 5</td>
						<td>Phone 1</td>
						<td>Phone 2</td>
						<td>Phone 3</td>
						<td>Phone 4</td>
						<td>Phone 5</td>
						<td>Fax 1</td>
						<td>Fax 2</td>
						<td>Fax 3</td>
						<td>Fax 4</td>
						<td>Fax 5</td>
						<td>TaxNumber</td>
						<td>AccountNumber</td>
						<td>CreatedBy</td>
						<td>CreatedDate</td>
						<td>ModifiedBy</td>
						<td>ModifiedDate</td>
						<td>DeletedBy</td>
						<td>DeletedDate</td>
						<td>Status</td>
						<td>IsDeleted</td>
                    </thead>
                    <tbody>';
		$icount = count($arrmenu);
		for($i=0;$i<$icount;$i++)
		{
			$strHTML.='<tr class="'.($i%2==0?'even':'odd').'">
						<td>'.$arrResult[$i]['ParterID'].'</td>
						<td>'.$arrResult[$i]['PartnerName'].'</td>
						<td>'.$arrResult[$i]['Company'].'</td>
						<td>'.$arrResult[$i]['Address 1'].'</td>
						<td>'.$arrResult[$i]['Address 2'].'</td>
						<td>'.$arrResult[$i]['Address 3'].'</td>
						<td>'.$arrResult[$i]['Address 4'].'</td>
						<td>'.$arrResult[$i]['Address 5'].'</td>
						<td>'.$arrResult[$i]['Email 1'].'</td>
						<td>'.$arrResult[$i]['Email 2'].'</td>
						<td>'.$arrResult[$i]['Email 3'].'</td>
						<td>'.$arrResult[$i]['Email 4'].'</td>
						<td>'.$arrResult[$i]['Email 5'].'</td>
						<td>'.$arrResult[$i]['Phone 1'].'</td>
						<td>'.$arrResult[$i]['Phone 2'].'</td>
						<td>'.$arrResult[$i]['Phone 3'].'</td>
						<td>'.$arrResult[$i]['Phone 4'].'</td>
						<td>'.$arrResult[$i]['Phone 5'].'</td>
						<td>'.$arrResult[$i]['Fax 1'].'</td>
						<td>'.$arrResult[$i]['Fax 2'].'</td>
						<td>'.$arrResult[$i]['Fax 3'].'</td>
						<td>'.$arrResult[$i]['Fax 4'].'</td>
						<td>'.$arrResult[$i]['Fax 5'].'</td>
						<td>'.$arrResult[$i]['TaxNumber'].'</td>
						<td>'.$arrResult[$i]['AccountNumber'].'</td>
						<td>'.$arrResult[$i]['CreatedBy'].'</td>
						<td>'.$arrResult[$i]['CreatedDate'].'</td>
						<td>'.$arrResult[$i]['ModifiedBy'].'</td>
						<td>'.$arrResult[$i]['ModifiedDate'].'</td>
						<td>'.$arrResult[$i]['DeletedBy'].'</td>
						<td>'.$arrResult[$i]['DeletedDate'].'</td>
						<td>'.$arrResult[$i]['Status'].'</td>
						<td class="lastCell"><input type="checkbox" onclick="_objPartner.showHide(\''.$arrResult[$i]['ParterID'].'\',\''.$arrResult[$i]['name'].'\',this)" '.($arrResult[$i]['IsDeleted']?'':'checked=checked').' /></td>
					  </tr>';
		}
		$strHTML.='</tbody></table>';
		
		$strHTML .= "<div>".global_common::getPagingHTMLByNum($intPage,self::NUM_PER_PAGE,global_common::getTotalRecord(self::TBL_SL_PARTNER,$this->_objConnection),
				"_objMenu.changePage")."</div>";
		return $strHTML;
	}
    
    #endregion   
}
?>
