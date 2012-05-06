<?php
/*
 * This file was automatically generated By Code Smith 
 * Modifications will be overwritten when code smith is run
 *
 * PLEASE DO NOT MAKE MODIFICATIONS TO THIS FILE
 * Date Created 5/6/2012 12:46:27 PM
 *
 */

/* <summary>
 * Implementations of sldistricts represent a District
 * </summary>
 */
class Model_District
{		   
	#region PRESERVE ExtraMethods For District
	#endregion
    #region Contants	
    const ACT_ADD							= 10;
    const ACT_UPDATE						= 11;
    const ACT_DELETE						= 12;
    const ACT_CHANGE_PAGE					= 13;
    const ACT_SHOW_EDIT                     = 14;
    const ACT_GET                           = 15;
    const NUM_PER_PAGE                      = 15;
    
    const TBL_SL_DISTRICT			            = 'sl_district';

	const SQL_INSERT_SL_DISTRICT		= 'INSERT INTO `{0}`
		(
			DistricID,
			DistrictName,
			CityID,
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
			\'1\', \'2\', \'3\', \'4\', \'5\', \'6\', \'7\', \'8\', \'9\', \'10\', \'11\'
        );';
        
	const SQL_UPDATE_SL_DISTRICT		= 'UPDATE `{0}`
		SET  
			`DistricID` = \'1\',
			`DistrictName` = \'2\',
			`CityID` = \'3\',
			`CreatedBy` = \'4\',
			`CreatedDate` = \'5\',
			`ModifiedBy` = \'6\',
			`ModifiedDate` = \'7\',
			`DeletedBy` = \'8\',
			`DeletedDate` = \'9\',
			`IsDeleted` = \'10\',
			`Status` = \'11\'
		WHERE `DistricID` = \'1\'  ';
		   

    const SQL_CREATE_TABLE_SL_DISTRICT		= 'CREATE TABLE `{0}` (

			`DistricID` varchar(60),
			`DistrictName` varchar(150),
			`CityID` varchar(60),
			`CreatedBy` varchar(60),
			`CreatedDate` datetime(0),
			`ModifiedBy` varchar(60),
			`ModifiedDate` datetime(0),
			`DeletedBy` varchar(60),
			`DeletedDate` datetime(0),
			`IsDeleted` bit(0),
			`Status` varchar(60),
			PRIMARY KEY(DistricID)
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
	public function  Model_District($objConnection)
	{
		$this->_objConnection = $objConnection;
		
	}
    #region
    
    #region Public Functions
    
    public function insert( $districtname,$cityid,$createdby,$createddate,$modifiedby,$modifieddate,$deletedby,$deleteddate,$isdeleted,$status)
	{
		$intID = global_common::getMaxID(self::TBL_SL_DISTRICT);
		
		$strTableName = self::TBL_SL_DISTRICT;
		$strSQL = global_common::prepareQuery(self::SQL_INSERT_SL_DISTRICT,
				array(self::TBL_SL_DISTRICT,$intID,global_common::escape_mysql_string($districtname),global_common::escape_mysql_string($cityid),global_common::escape_mysql_string($createdby),global_common::escape_mysql_string($createddate),global_common::escape_mysql_string($modifiedby),global_common::escape_mysql_string($modifieddate),global_common::escape_mysql_string($deletedby),global_common::escape_mysql_string($deleteddate),global_common::escape_mysql_string($isdeleted),global_common::escape_mysql_string($status)));
		
		if (!global_common::ExecutequeryWithCheckExistedTable($strSQL,self::SQL_CREATE_TABLE_SL_DISTRICT,$this->_objConnection,$strTableName))
		{
			//echo $strSQL;
			global_common::writeLog('Error add sl_district:'.$strSQL,1);
			return false;
		}	
		return $intID;
		
	}
    
    public function update($districid,$districtname,$cityid,$createdby,$createddate,$modifiedby,$modifieddate,$deletedby,$deleteddate,$isdeleted,$status)
	{
		$strTableName = self::TBL_SL_DISTRICT;
		$strSQL = global_common::prepareQuery(self::SQL_UPDATE_SL_DISTRICT,
				array($strTableName,global_common::escape_mysql_string($districid),global_common::escape_mysql_string($districtname),global_common::escape_mysql_string($cityid),global_common::escape_mysql_string($createdby),global_common::escape_mysql_string($createddate),global_common::escape_mysql_string($modifiedby),global_common::escape_mysql_string($modifieddate),global_common::escape_mysql_string($deletedby),global_common::escape_mysql_string($deleteddate),global_common::escape_mysql_string($isdeleted),global_common::escape_mysql_string($status) ));
		
		if (!global_common::ExecutequeryWithCheckExistedTable($strSQL,self::SQL_CREATE_TABLE_SL_DISTRICT,$this->_objConnection,$strTableName))
		{
			//echo $strSQL;
			global_common::writeLog('Error add sl_district:'.$strSQL,1);
			return false;
		}	
		return $intNewID;		
	}
    
    public function getDistrictByID($objID,$selectField='*') 
	{		
		$strSQL .= global_common::prepareQuery(global_common::SQL_SELECT_FREE, 
				array($selectField, self::TBL_SL_DISTRICT ,							
					'WHERE DistricID = \''.$objID.'\' '));
		//echo '<br>SQL:'.$strSQL;
		$arrResult =$this->_objConnection->selectCommand($strSQL);		
		if(!$arrResult)
		{
			global_common::writeLog('get sl_district ByID:'.$strSQL,1,$_mainFrame->pPage);
			return null;
		}
		//print_r($arrResult);
		return $arrResult[0];
	}
    
    public function getAllDistrict($selectField='*') 
	{		
		$strSQL .= global_common::prepareQuery(global_common::SQL_SELECT_FREE, 
				array($selectField, self::TBL_SL_DISTRICT ,							
					''));
		//echo '<br>SQL:'.$strSQL;
		$arrResult =$this->_objConnection->selectCommand($strSQL);		
		if(!$arrResult)
		{
			global_common::writeLog('get All sl_district:'.$strSQL,1,$_mainFrame->pPage);
			return null;
		}
		//print_r($arrResult);
		return $arrResult;
	}
    
    public function getListDistrict($intPage,$orderBy='DistricID', $whereClause)
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
					self::TBL_SL_DISTRICT,$orderBy.' '.$whereClause.' limit '.(($intPage-1)* self::NUM_PER_PAGE).','.self::NUM_PER_PAGE));
		//echo 'sql:'.$strSQL;	
		$arrResult = $this->_objConnection->selectCommand($strSQL);
		//print_r($arrResult);
		$strHTML = '<table class="tbl-list">
                    <thead>
						<td>DistricID</td>
						<td>DistrictName</td>
						<td>CityID</td>
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
						<td>'.$arrResult[$i]['DistricID'].'</td>
						<td>'.$arrResult[$i]['DistrictName'].'</td>
						<td>'.$arrResult[$i]['CityID'].'</td>
						<td>'.$arrResult[$i]['CreatedBy'].'</td>
						<td>'.$arrResult[$i]['CreatedDate'].'</td>
						<td>'.$arrResult[$i]['ModifiedBy'].'</td>
						<td>'.$arrResult[$i]['ModifiedDate'].'</td>
						<td>'.$arrResult[$i]['DeletedBy'].'</td>
						<td>'.$arrResult[$i]['DeletedDate'].'</td>
						<td><input type="checkbox" onclick="_objDistrict.showHide(\''.$arrResult[$i]['DistricID'].'\',\''.$arrResult[$i]['name'].'\',this)" '.($arrResult[$i]['IsDeleted']?'':'checked=checked').' /></td>
						<td class="lastCell">'.$arrResult[$i]['Status'].'</td>
					  </tr>';
		}
		$strHTML.='</tbody></table>';
		
		$strHTML .= "<div>".global_common::getPagingHTMLByNum($intPage,self::NUM_PER_PAGE,global_common::getTotalRecord(self::TBL_SL_DISTRICT,$this->_objConnection),
				"_objMenu.changePage")."</div>";
		return $strHTML;
	}
    
    #endregion   
}
?>
