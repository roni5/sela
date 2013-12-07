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
 * Implementations of slarticles represent a Article
 * </summary>
 */
class Model_Article
{		   
	#region PRESERVE ExtraMethods For Article
	#endregion
    #region Contants	
    const ACT_ADD							= 10;
    const ACT_UPDATE						= 11;
    const ACT_DELETE						= 12;
    const ACT_CHANGE_PAGE					= 13;
    const ACT_SHOW_EDIT                     = 14;
    const ACT_GET                           = 15;
    const NUM_PER_PAGE                      = 15;
    
    const TBL_SL_ARTICLE			            = 'sl_article';

	const SQL_INSERT_SL_ARTICLE		= 'INSERT INTO `{0}`
		(
			ArticleID,
			Prefix,
			Title,
			FileName,
			ArticleType,
			Content,
			NotificationType,
			Tags,
			CatalogueID,
			SectionID,
			NumView,
			NumComment,
			CreatedBy,
			CreatedDate,
			ModifiedBy,
			ModifiedDate,
			DeletedBy,
			DeletedDate,
			IsDeleted,
			Status,
			comments,
			RenewedDate,
			RenewedNum
        )
        VALUES (
			\'{1}\', \'{2}\', \'{3}\', \'{4}\', \'{5}\', \'{6}\', \'{7}\', \'{8}\', \'{9}\', \'{10}\', \'{11}\', \'{12}\', \'{13}\', \'{14}\', \'{15}\', \'{16}\', \'{17}\', \'{18}\', \'{19}\', \'{20}\', \'{21}\', \'{22}\', \'{23}\'
        );';
        
	const SQL_UPDATE_SL_ARTICLE		= 'UPDATE `{0}`
		SET  
			`ArticleID` = \'{1}\',
			`Prefix` = \'{2}\',
			`Title` = \'{3}\',
			`FileName` = \'{4}\',
			`ArticleType` = \'{5}\',
			`Content` = \'{6}\',
			`NotificationType` = \'{7}\',
			`Tags` = \'{8}\',
			`CatalogueID` = \'{9}\',
			`SectionID` = \'{10}\',
			`NumView` = \'{11}\',
			`NumComment` = \'{12}\',
			`CreatedBy` = \'{13}\',
			`CreatedDate` = \'{14}\',
			`ModifiedBy` = \'{15}\',
			`ModifiedDate` = \'{16}\',
			`DeletedBy` = \'{17}\',
			`DeletedDate` = \'{18}\',
			`IsDeleted` = \'{19}\',
			`Status` = \'{20}\',
			`comments` = \'{21}\',
			`RenewedDate` = \'{22}\',
			`RenewedNum` = \'{23}\'
		WHERE `ArticleID` = \'{1}\'  ';
		   

    const SQL_CREATE_TABLE_SL_ARTICLE		= 'CREATE TABLE `{0}` (

			`ArticleID` varchar(20),
			`Prefix` varchar(255),
			`Title` varchar(255),
			`FileName` varchar(255),
			`ArticleType` varchar(20),
			`Content` ,
			`NotificationType` varchar(20),
			`Tags` ,
			`CatalogueID` varchar(20),
			`SectionID` varchar(20),
			`NumView` ,
			`NumComment` ,
			`CreatedBy` varchar(20),
			`CreatedDate` ,
			`ModifiedBy` varchar(20),
			`ModifiedDate` ,
			`DeletedBy` varchar(20),
			`DeletedDate` ,
			`IsDeleted` ,
			`Status` varchar(20),
			`comments` ,
			`RenewedDate` ,
			`RenewedNum` ,
			PRIMARY KEY(ArticleID)
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
	public function  Model_Article($objConnection)
	{
		$this->_objConnection = $objConnection;
		
	}
    #region
    
    #region Public Functions
    
    public function insert( $prefix,$title,$filename,$articletype,$content,$notificationtype,$tags,$catalogueid,$sectionid,$numview,$numcomment,$createdby,$createddate,$modifiedby,$modifieddate,$deletedby,$deleteddate,$isdeleted,$status,$comments,$reneweddate,$renewednum)
	{
		$intID = global_common::getMaxID(self::TBL_SL_ARTICLE);
		
		$strTableName = self::TBL_SL_ARTICLE;
		$strSQL = global_common::prepareQuery(self::SQL_INSERT_SL_ARTICLE,
				array(self::TBL_SL_ARTICLE,$intID,global_common::escape_mysql_string($prefix),global_common::escape_mysql_string($title),global_common::escape_mysql_string($filename),global_common::escape_mysql_string($articletype),global_common::escape_mysql_string($content),global_common::escape_mysql_string($notificationtype),global_common::escape_mysql_string($tags),global_common::escape_mysql_string($catalogueid),global_common::escape_mysql_string($sectionid),global_common::escape_mysql_string($numview),global_common::escape_mysql_string($numcomment),global_common::escape_mysql_string($createdby),global_common::escape_mysql_string($createddate),global_common::escape_mysql_string($modifiedby),global_common::escape_mysql_string($modifieddate),global_common::escape_mysql_string($deletedby),global_common::escape_mysql_string($deleteddate),global_common::escape_mysql_string($isdeleted),global_common::escape_mysql_string($status),global_common::escape_mysql_string($comments),global_common::escape_mysql_string($reneweddate),global_common::escape_mysql_string($renewednum)));
		
		if (!global_common::ExecutequeryWithCheckExistedTable($strSQL,self::SQL_CREATE_TABLE_SL_ARTICLE,$this->_objConnection,$strTableName))
		{
			//echo $strSQL;
			global_common::writeLog('Error add sl_article:'.$strSQL,1);
			return false;
		}	
		return $intID;
		
	}
    
    public function update($articleid,$prefix,$title,$filename,$articletype,$content,$notificationtype,$tags,$catalogueid,$sectionid,$numview,$numcomment,$createdby,$createddate,$modifiedby,$modifieddate,$deletedby,$deleteddate,$isdeleted,$status,$comments,$reneweddate,$renewednum)
	{
		$strTableName = self::TBL_SL_ARTICLE;
		$strSQL = global_common::prepareQuery(self::SQL_UPDATE_SL_ARTICLE,
				array($strTableName,global_common::escape_mysql_string($articleid),global_common::escape_mysql_string($prefix),global_common::escape_mysql_string($title),global_common::escape_mysql_string($filename),global_common::escape_mysql_string($articletype),global_common::escape_mysql_string($content),global_common::escape_mysql_string($notificationtype),global_common::escape_mysql_string($tags),global_common::escape_mysql_string($catalogueid),global_common::escape_mysql_string($sectionid),global_common::escape_mysql_string($numview),global_common::escape_mysql_string($numcomment),global_common::escape_mysql_string($createdby),global_common::escape_mysql_string($createddate),global_common::escape_mysql_string($modifiedby),global_common::escape_mysql_string($modifieddate),global_common::escape_mysql_string($deletedby),global_common::escape_mysql_string($deleteddate),global_common::escape_mysql_string($isdeleted),global_common::escape_mysql_string($status),global_common::escape_mysql_string($comments),global_common::escape_mysql_string($reneweddate),global_common::escape_mysql_string($renewednum) ));
		
		if (!global_common::ExecutequeryWithCheckExistedTable($strSQL,self::SQL_CREATE_TABLE_SL_ARTICLE,$this->_objConnection,$strTableName))
		{
			//echo $strSQL;
			global_common::writeLog('Error add sl_article:'.$strSQL,1);
			return false;
		}	
		return $intNewID;		
	}
    
    public function getArticleByID($objID,$selectField='*') 
	{		
		$strSQL .= global_common::prepareQuery(global_common::SQL_SELECT_FREE, 
				array($selectField, self::TBL_SL_ARTICLE ,							
					'WHERE ArticleID = \''.$objID.'\' '));
		//echo '<br>SQL:'.$strSQL;
		$arrResult =$this->_objConnection->selectCommand($strSQL);		
		if(!$arrResult)
		{
			global_common::writeLog('get sl_article ByID:'.$strSQL,1,$_mainFrame->pPage);
			return null;
		}
		//print_r($arrResult);
		return $arrResult[0];
	}
    
    public function getAllArticle($intPage = 0,$selectField='*',$whereClause='',$orderBy='') 
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
				array($selectField, Model_Article::TBL_SL_ARTICLE ,							
					$whereClause.$orderBy .' limit '.(($intPage-1)* self::NUM_PER_PAGE).','.self::NUM_PER_PAGE));
        }
        else
        {
            $strSQL .= global_common::prepareQuery(global_common::SQL_SELECT_FREE, 
				array($selectField, Model_Article::TBL_SL_ARTICLE ,							
					$whereClause.$orderBy ));
        }
		//echo '<br>SQL:'.$strSQL;
		$arrResult =$this->_objConnection->selectCommand($strSQL);		
		if(!$arrResult)
		{
			global_common::writeLog('get All sl_article:'.$strSQL,1,$_mainFrame->pPage);
			return null;
		}
		//print_r($arrResult);
		return $arrResult;
	}
    
    public function getListArticle($intPage,$orderBy='ArticleID', $whereClause)
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
					self::TBL_SL_ARTICLE,$orderBy.' '.$whereClause.' limit '.(($intPage-1)* self::NUM_PER_PAGE).','.self::NUM_PER_PAGE));
		//echo 'sql:'.$strSQL;	
		$arrResult = $this->_objConnection->selectCommand($strSQL);
		//print_r($arrResult);
		$strHTML = '<table class="tbl-list">
                    <thead>
						<td>ArticleID</td>
						<td>Prefix</td>
						<td>Title</td>
						<td>FileName</td>
						<td>ArticleType</td>
						<td>Content</td>
						<td>NotificationType</td>
						<td>Tags</td>
						<td>CatalogueID</td>
						<td>SectionID</td>
						<td>NumView</td>
						<td>NumComment</td>
						<td>CreatedBy</td>
						<td>CreatedDate</td>
						<td>ModifiedBy</td>
						<td>ModifiedDate</td>
						<td>DeletedBy</td>
						<td>DeletedDate</td>
						<td>IsDeleted</td>
						<td>Status</td>
						<td>comments</td>
						<td>RenewedDate</td>
						<td>RenewedNum</td>
                    </thead>
                    <tbody>';
		$icount = count($arrmenu);
		for($i=0;$i<$icount;$i++)
		{
			$strHTML.='<tr class="'.($i%2==0?'even':'odd').'">
						<td>'.$arrResult[$i]['ArticleID'].'</td>
						<td>'.$arrResult[$i]['Prefix'].'</td>
						<td>'.$arrResult[$i]['Title'].'</td>
						<td>'.$arrResult[$i]['FileName'].'</td>
						<td>'.$arrResult[$i]['ArticleType'].'</td>
						<td>'.$arrResult[$i]['Content'].'</td>
						<td>'.$arrResult[$i]['NotificationType'].'</td>
						<td>'.$arrResult[$i]['Tags'].'</td>
						<td>'.$arrResult[$i]['CatalogueID'].'</td>
						<td>'.$arrResult[$i]['SectionID'].'</td>
						<td>'.$arrResult[$i]['NumView'].'</td>
						<td>'.$arrResult[$i]['NumComment'].'</td>
						<td>'.$arrResult[$i]['CreatedBy'].'</td>
						<td>'.$arrResult[$i]['CreatedDate'].'</td>
						<td>'.$arrResult[$i]['ModifiedBy'].'</td>
						<td>'.$arrResult[$i]['ModifiedDate'].'</td>
						<td>'.$arrResult[$i]['DeletedBy'].'</td>
						<td>'.$arrResult[$i]['DeletedDate'].'</td>
						<td><input type="checkbox" onclick="_objArticle.showHide(\''.$arrResult[$i]['ArticleID'].'\',\''.$arrResult[$i]['name'].'\',this)" '.($arrResult[$i]['IsDeleted']?'':'checked=checked').' /></td>
						<td>'.$arrResult[$i]['Status'].'</td>
						<td>'.$arrResult[$i]['comments'].'</td>
						<td>'.$arrResult[$i]['RenewedDate'].'</td>
						<td class="lastCell">'.$arrResult[$i]['RenewedNum'].'</td>
					  </tr>';
		}
		$strHTML.='</tbody></table>';
		
		$strHTML .= "<div>".global_common::getPagingHTMLByNum($intPage,self::NUM_PER_PAGE,global_common::getTotalRecord(self::TBL_SL_ARTICLE,$this->_objConnection),
				"_objMenu.changePage")."</div>";
		return $strHTML;
	}
    
	/**
	 * This is method getTopArticleByType. For show article type list page
	 *
	 * @param mixed $listTypeID This is a description
	 * @param mixed $limitRow This is a description
	 * @param mixed $selectField This is a description
	 * @return mixed This is the return value description
	 *
	 */
	public function getTopArticleByType($listTypeID,$limitRow, $selectField='*',$whereClause='',$orderBy='') 
	{		
		$arrTypeID = global_common::splitString($listTypeID);
		$strQueryIN = global_common::convertToQueryIN($arrTypeID);
		
		if($orderBy)
		{
			$orderBy = ' ORDER BY '.$orderBy;
		}

		if($whereClause)
		{
			$condition = 'WHERE ('.global_mapping::IsDeleted.' IS NULL or '.global_mapping::IsDeleted.' = \'0\') and `'.
				global_mapping::ArticleTypeID.'` IN ('.$listTypeID.') and '.$whereClause;	
		}
		else
		{
			$condition = 'WHERE ('.global_mapping::IsDeleted.' IS NULL or '.global_mapping::IsDeleted.' = \'0\') and `'.
				global_mapping::ArticleType.'` IN ('.$listTypeID.')';	
		}
		
		if($topRow < 0)
		{
			
			$topRow = consts::DEFAULT_TOP_ITEMS;
		}
		
		$strSQL = global_common::prepareQuery(global_common::SQL_SELECT_FREE_LIMIT, 
				array($selectField, self::TBL_SL_ARTICLE, $condition.$orderBy,0,$topRow ));					
		
		$arrResult = self::getArticlesFromDB($strSQL);
		//print_r($arrResult);
		return $arrResult;
	}
	
	private function getArticlesFromDB($strSQL)
	{
		$arrResult = $this->_objConnection->selectCommand($strSQL);
		if(!$arrResult)
		{
			global_common::writeLog('get sl_article from DB:'.$strSQL,1,$_mainFrame->pPage);
			return null;
		}
		return global_common::mergeUserInfo($arrResult);	
	}
	
    #endregion   
}
?>
