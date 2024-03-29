<?php
/*
 * This file was automatically generated By Code Smith 
 * Modifications will be overwritten when code smith is run
 *
 * PLEASE DO NOT MAKE MODIFICATIONS TO THIS FILE
 * Date Created 5/6/2012
 *
 */

/* <summary>
 * Implementations of slauctions represent a Auction
 * </summary>
 */
class Model_Auction
{		   
	#region PRESERVE ExtraMethods For Auction
	#endregion
    #region Contants	
    const ACT_ADD							= 10;
    const ACT_UPDATE						= 11;
    const ACT_DELETE						= 12;
    const ACT_CHANGE_PAGE					= 13;
    const ACT_SHOW_EDIT                     = 14;
    const ACT_GET                           = 15;
    const NUM_PER_PAGE                      = 15;
    
    const TBL_SL_AUCTION			            = 'sl_auction';

	const SQL_INSERT_SL_AUCTION		= 'INSERT INTO `{0}`
		(
			AuctionID,
			ProductID,
			StartDate,
			EndDate,
			StartingPrice,
			NumOffer,
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
			\'{1}\', \'{2}\', \'{3}\', \'{4}\', \'{5}\', \'{6}\', \'{7}\', \'{8}\', \'{9}\', \'{10}\', \'{11}\', \'{12}\', \'{13}\', \'{14}\'
        );';
        
	const SQL_UPDATE_SL_AUCTION		= 'UPDATE `{0}`
		SET  
			`AuctionID` = \'{1}\',
			`ProductID` = \'{2}\',
			`StartDate` = \'{3}\',
			`EndDate` = \'{4}\',
			`StartingPrice` = \'{5}\',
			`NumOffer` = \'{6}\',
			`CreatedBy` = \'{7}\',
			`CreatedDate` = \'{8}\',
			`ModifiedBy` = \'{9}\',
			`ModifiedDate` = \'{10}\',
			`DeletedBy` = \'{11}\',
			`DeletedDate` = \'{12}\',
			`Status` = \'{13}\',
			`IsDeleted` = \'{14}\'
		WHERE `AuctionID` = \'{1}\'  ';
		   

    const SQL_CREATE_TABLE_SL_AUCTION		= 'CREATE TABLE `{0}` (

			`AuctionID` varchar(20),
			`ProductID` varchar(20),
			`StartDate` ,
			`EndDate` ,
			`StartingPrice` ,
			`NumOffer` ,
			`CreatedBy` varchar(20),
			`CreatedDate` ,
			`ModifiedBy` varchar(20),
			`ModifiedDate` ,
			`DeletedBy` varchar(20),
			`DeletedDate` ,
			`Status` varchar(20),
			`IsDeleted` ,
			PRIMARY KEY(AuctionID)
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
	public function  Model_Auction($objConnection)
	{
		$this->_objConnection = $objConnection;
		
	}
    #region
    
    #region Public Functions
    
    public function insert( $productid,$startdate,$enddate,$startingprice,$numoffer,$createdby,$createddate,$modifiedby,$modifieddate,$deletedby,$deleteddate,$status,$isdeleted)
	{
		$intID = global_common::getMaxID(self::TBL_SL_AUCTION);
		
		$strTableName = self::TBL_SL_AUCTION;
		$strSQL = global_common::prepareQuery(self::SQL_INSERT_SL_AUCTION,
				array(self::TBL_SL_AUCTION,$intID,global_common::escape_mysql_string($productid),global_common::escape_mysql_string($startdate),global_common::escape_mysql_string($enddate),global_common::escape_mysql_string($startingprice),global_common::escape_mysql_string($numoffer),global_common::escape_mysql_string($createdby),global_common::escape_mysql_string($createddate),global_common::escape_mysql_string($modifiedby),global_common::escape_mysql_string($modifieddate),global_common::escape_mysql_string($deletedby),global_common::escape_mysql_string($deleteddate),global_common::escape_mysql_string($status),global_common::escape_mysql_string($isdeleted)));
		
		if (!global_common::ExecutequeryWithCheckExistedTable($strSQL,self::SQL_CREATE_TABLE_SL_AUCTION,$this->_objConnection,$strTableName))
		{
			//echo $strSQL;
			global_common::writeLog('Error add sl_auction:'.$strSQL,1);
			return false;
		}	
		return $intID;
		
	}
    
    public function update($auctionid,$productid,$startdate,$enddate,$startingprice,$numoffer,$createdby,$createddate,$modifiedby,$modifieddate,$deletedby,$deleteddate,$status,$isdeleted)
	{
		$strTableName = self::TBL_SL_AUCTION;
		$strSQL = global_common::prepareQuery(self::SQL_UPDATE_SL_AUCTION,
				array($strTableName,global_common::escape_mysql_string($auctionid),global_common::escape_mysql_string($productid),global_common::escape_mysql_string($startdate),global_common::escape_mysql_string($enddate),global_common::escape_mysql_string($startingprice),global_common::escape_mysql_string($numoffer),global_common::escape_mysql_string($createdby),global_common::escape_mysql_string($createddate),global_common::escape_mysql_string($modifiedby),global_common::escape_mysql_string($modifieddate),global_common::escape_mysql_string($deletedby),global_common::escape_mysql_string($deleteddate),global_common::escape_mysql_string($status),global_common::escape_mysql_string($isdeleted) ));
		
		if (!global_common::ExecutequeryWithCheckExistedTable($strSQL,self::SQL_CREATE_TABLE_SL_AUCTION,$this->_objConnection,$strTableName))
		{
			//echo $strSQL;
			global_common::writeLog('Error add sl_auction:'.$strSQL,1);
			return false;
		}	
		return $intNewID;		
	}
    
    public function getAuctionByID($objID,$selectField='*') 
	{		
		$strSQL .= global_common::prepareQuery(global_common::SQL_SELECT_FREE, 
				array($selectField, self::TBL_SL_AUCTION ,							
					'WHERE AuctionID = \''.$objID.'\' '));
		//echo '<br>SQL:'.$strSQL;
		$arrResult =$this->_objConnection->selectCommand($strSQL);		
		if(!$arrResult)
		{
			global_common::writeLog('get sl_auction ByID:'.$strSQL,1,$_mainFrame->pPage);
			return null;
		}
		//print_r($arrResult);
		return $arrResult[0];
	}
    
    public function getAllAuction($intPage = 0,$selectField='*',$whereClause='',$orderBy='') 
	{		
        if($whereClause)
		{
			$whereClause = ' WHERE '.$whereClause;
		}
		
		if($orderBy)
		{
			$orderBy = ' ORDER BY '.$orderBy;
		}
        if($intPage>0)
        {
		    $strSQL .= global_common::prepareQuery(global_common::SQL_SELECT_FREE, 
				array($selectField, Model_Auction::TBL_SL_AUCTION ,							
					$whereClause.$orderBy .' limit '.(($intPage-1)* self::NUM_PER_PAGE).','.self::NUM_PER_PAGE));
        }
        else
        {
            $strSQL .= global_common::prepareQuery(global_common::SQL_SELECT_FREE, 
				array($selectField, Model_Auction::TBL_SL_AUCTION ,							
					$whereClause.$orderBy ));
        }
		//echo '<br>SQL:'.$strSQL;
		$arrResult =$this->_objConnection->selectCommand($strSQL);		
		if(!$arrResult)
		{
			global_common::writeLog('get All sl_auction:'.$strSQL,1,$_mainFrame->pPage);
			return null;
		}
		//print_r($arrResult);
		return $arrResult;
	}
    
    public function getListAuction($intPage,$orderBy='AuctionID', $whereClause)
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
					self::TBL_SL_AUCTION,$orderBy.' '.$whereClause.' limit '.(($intPage-1)* self::NUM_PER_PAGE).','.self::NUM_PER_PAGE));
		//echo 'sql:'.$strSQL;	
		$arrResult = $this->_objConnection->selectCommand($strSQL);
		//print_r($arrResult);
		$strHTML = '<table class="tbl-list">
                    <thead>
						<td>AuctionID</td>
						<td>ProductID</td>
						<td>StartDate</td>
						<td>EndDate</td>
						<td>StartingPrice</td>
						<td>NumOffer</td>
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
						<td>'.$arrResult[$i]['AuctionID'].'</td>
						<td>'.$arrResult[$i]['ProductID'].'</td>
						<td>'.$arrResult[$i]['StartDate'].'</td>
						<td>'.$arrResult[$i]['EndDate'].'</td>
						<td>'.$arrResult[$i]['StartingPrice'].'</td>
						<td>'.$arrResult[$i]['NumOffer'].'</td>
						<td>'.$arrResult[$i]['CreatedBy'].'</td>
						<td>'.$arrResult[$i]['CreatedDate'].'</td>
						<td>'.$arrResult[$i]['ModifiedBy'].'</td>
						<td>'.$arrResult[$i]['ModifiedDate'].'</td>
						<td>'.$arrResult[$i]['DeletedBy'].'</td>
						<td>'.$arrResult[$i]['DeletedDate'].'</td>
						<td>'.$arrResult[$i]['Status'].'</td>
						<td class="lastCell"><input type="checkbox" onclick="_objAuction.showHide(\''.$arrResult[$i]['AuctionID'].'\',\''.$arrResult[$i]['name'].'\',this)" '.($arrResult[$i]['IsDeleted']?'':'checked=checked').' /></td>
					  </tr>';
		}
		$strHTML.='</tbody></table>';
		
		$strHTML .= "<div>".global_common::getPagingHTMLByNum($intPage,self::NUM_PER_PAGE,global_common::getTotalRecord(self::TBL_SL_AUCTION,$this->_objConnection),
				"_objMenu.changePage")."</div>";
		return $strHTML;
	}
    
    #endregion   
}
?>
