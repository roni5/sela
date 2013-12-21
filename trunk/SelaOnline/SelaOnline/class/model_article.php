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
	const TABLE_BY_MONTHS_ARTICLE			= 2;
	const ACT_ADD							= 10;
	const ACT_UPDATE						= 11;
	const ACT_DELETE						= 12;
	const ACT_CHANGE_PAGE					= 13;
	const ACT_SHOW_EDIT                     = 14;
	const ACT_GET                           = 15;
	const NUM_PER_PAGE                      = 3;
	
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
		Status
		)
		VALUES (
		\'{1}\', \'{2}\', \'{3}\', \'{4}\', \'{5}\', \'{6}\', \'{7}\', \'{8}\', \'{9}\', \'{10}\', 
		\'{11}\', \'{12}\', \'{13}\', \'{14}\', \'{15}\', \'{16}\', \'{17}\', \'{18}\', \'{19}\', \'{20}\'
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
		`Status` = \'{20}\'
		WHERE `ArticleID` = \'{1}\'  ';
	
	
	const SQL_CREATE_TABLE_SL_ARTICLE		= 'CREATE TABLE `{0}` (
		
		`ArticleID` varchar(60),
		`Prefix` varchar(765),
		`Title` varchar(765),
		`FileName` varchar(765),
		`ArticleType` varchar(60),
		`Content` text(65535),
		`NotificationType` varchar(60),
		`Tags` text(65535),
		`CatalogueID` varchar(60),
		`SectionID` varchar(60),
		`NumView` bigint,
		`NumComment` bigint,
		`CreatedBy` varchar(60),
		`CreatedDate` datetime,
		`ModifiedBy` varchar(60),
		`ModifiedDate` datetime,
		`DeletedBy` varchar(60),
		`DeletedDate` datetime,
		`IsDeleted` bit,
		`Status` varchar(60),
		`Comments` text(65535),
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
	#endregion
	
	#region Public Functions
	
	public function insert( $prefix,$title,$filename,$articletype,$content,$notificationtype,$tags,$catalogueid,$sectionid,
		$numview,$numcomment,$createdby,$createddate,$modifiedby,$modifieddate,$deletedby,$deleteddate,$isdeleted,$status)
	{
		//$intID = global_common::getMaxID(self::TBL_SL_ARTICLE);
		$date = global_common::getDateTime();
		$intID = global_common::buildIDByMonth(global_common::getMaxID(Model_Article::TBL_SL_ARTICLE),
				$date,Model_Article::TABLE_BY_MONTHS_ARTICLE);
		$strTableName = global_common::builtTableName(
				Model_Article::TBL_SL_ARTICLE, global_common::getTableSuffixByMonth($intID));
		$strSQL = global_common::prepareQuery(self::SQL_INSERT_SL_ARTICLE,
				array($strTableName,$intID,global_common::escape_mysql_string($prefix),
					global_common::escape_mysql_string($title),
					global_common::escape_mysql_string($filename),
					global_common::escape_mysql_string($articletype),
					global_common::escape_mysql_string($content),
					global_common::escape_mysql_string($notificationtype),
					global_common::escape_mysql_string($tags),
					global_common::escape_mysql_string($catalogueid),
					global_common::escape_mysql_string($sectionid),
					global_common::escape_mysql_string($numview),
					global_common::escape_mysql_string($numcomment),
					global_common::escape_mysql_string($createdby),
					global_common::escape_mysql_string($createddate),
					global_common::escape_mysql_string($modifiedby),
					global_common::escape_mysql_string($modifieddate),
					global_common::escape_mysql_string($deletedby),
					global_common::escape_mysql_string($deleteddate),
					global_common::escape_mysql_string($isdeleted),
					global_common::escape_mysql_string($status)));
		
		if (!global_common::ExecutequeryWithCheckExistedTable($strSQL,self::SQL_CREATE_TABLE_SL_ARTICLE,$this->_objConnection,$strTableName))
		{
			//echo $strSQL;
			global_common::writeLog('Error add sl_article:'.$strSQL,1);
			return false;
		}	
		else
		{
			
			$arrResult = global_common::updateContents($this->_objConnection,$articletype,$intID,global_common::ARTICLE_TYPE);
			if (!$arrResult)
			{
				global_common::writeLog('sp_update_content_summary: '.$strSQL,1);
			}
		}
		return $intID;
	}
	
	public function update($articleid,$prefix,$title,$filename,$articletype,$content,$notificationtype,
		$tags,$catalogueid,$sectionid,$numview,$numcomment,$createdby,$createddate,
		$modifiedby,$modifieddate,$deletedby,$deleteddate,$isdeleted,$status)
	{
		$strTableName = self::TBL_SL_ARTICLE;
		$strSQL = global_common::prepareQuery(self::SQL_UPDATE_SL_ARTICLE,
				array($strTableName,global_common::escape_mysql_string($articleid),global_common::escape_mysql_string($prefix),
					global_common::escape_mysql_string($title),global_common::escape_mysql_string($filename),
					global_common::escape_mysql_string($articletype),global_common::escape_mysql_string($content),
					global_common::escape_mysql_string($notificationtype),global_common::escape_mysql_string($tags),
					global_common::escape_mysql_string($catalogueid),global_common::escape_mysql_string($sectionid),
					global_common::escape_mysql_string($numview),global_common::escape_mysql_string($numcomment),
					global_common::escape_mysql_string($createdby),global_common::escape_mysql_string($createddate),
					global_common::escape_mysql_string($modifiedby),global_common::escape_mysql_string($modifieddate),
					global_common::escape_mysql_string($deletedby),global_common::escape_mysql_string($deleteddate),
					global_common::escape_mysql_string($isdeleted),global_common::escape_mysql_string($status) ));
		
		if (!global_common::ExecutequeryWithCheckExistedTable($strSQL,
					self::SQL_CREATE_TABLE_SL_ARTICLE,$this->_objConnection,$strTableName))
		{
			//echo $strSQL;
			global_common::writeLog('Error add sl_article:'.$strSQL,1);
			return false;
		}	
		return $intNewID;		
	}
	
	public function getArticleByID($objID,$selectField='*') 
	{		
		$strTableName = global_common::builtTableName(
				Model_Article::TBL_SL_ARTICLE, global_common::getTableSuffixByMonth($objID));
		$strSQL .= global_common::prepareQuery(global_common::SQL_SELECT_FREE, 
				array($selectField, $strTableName ,							
					'WHERE ArticleID = \''.$objID.'\' '));
		//echo '<br>SQL:'.$strSQL;
		$arrResult =$this->_objConnection->selectCommand($strSQL);		
		if(!$arrResult)
		{
			global_common::writeLog('get sl_article ByID:'.$strSQL,1,$_mainFrame->pPage);
			return null;
		}
		$arrResult = global_common::mergeUserInfo($arrResult);
		//print_r($arrResult);
		return $arrResult[0];
	}
	
	public function updateComments($articleID, $commentID)
	{
		$strTableName = global_common::builtTableName(
				Model_Article::TBL_SL_ARTICLE, global_common::getTableSuffixByMonth($intID));
		
		$strSQL = 'call sp_update_user_comment(1,\''.$strTableName.'\',\''.
			global_mapping::ArticleID.'\',\''.$articleID.'\',\''.$commentID.'\')';	
		$arrResult= $this->_objConnection->selectMultiCommand($strSQL);
		//global_common::writeLog("updateComments: ".$strSQL,0);
		if (!$arrResult)
		{
			global_common::writeLog("updateComments: ".$strSQL,1);
			return false;
		}
		return $arrResult[0];			
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
		$arrSummary = global_common::getContentInfoByIDs($this->_objConnection, $strQueryIN,global_common::ARTICLE_TYPE);
		//print_r($arrSummary);
		if($arrSummary == null)
		{
			global_common::writeLog('Can not get content from table summary');
			return null;
		}
												
		$strSQL = Model_Article::getSQLSelectByTableName($arrSummary,-1,$limitRow,$selectField, $whereClause, $orderBy);
		$arrResult = self::getArticlesFromDB($strSQL);
		//print_r($arrResult);
		return $arrResult;
	}
	
	public function getArticleByType(&$intPage,&$total, $typeID,$selectField='*',$whereClause='',  $orderBy='')
	{		
		$arrSummary = global_common::getContentIDs($this->_objConnection, $intPage, $typeID, global_common::ARTICLE_TYPE);
		//print_r($arrSummary);
		if($arrSummary)
		{
			$strSQL = self::getSQLSelectByTableName($arrSummary,$intPage,0,$selectField,$whereClause, $orderBy);
			$arrResult = self::getArticlesFromDB($strSQL);
			//print_r($arrResult);			
			return $arrResult;
		}		
		return null;
	}
	
	public function getHTMLArticles($articles,$intPage, $total)
	{
		$strHTML = '';
		if($articles && count($articles)>0)
		{
			foreach($articles as $item)
			{
				$strHTML .= $this->getArticleMemo($item);
			}
			$strHTML .= global_common::getPagingHTMLByNum($intPage,Model_Article::NUM_PER_PAGE,$total,'_objArticle.changePage');
		}
		return $strHTML;
	}
	
	public function getAllArticle($selectField='*',$whereClause='',  $orderBy='') 
	{		
		if($whereClause)
		{
			$whereClause = ' WHERE '.$whereClause;
		}
		
		if($orderBy)
		{
			$orderBy = ' ORDER BY '.$orderBy;
		}
		$strSQL .= global_common::prepareQuery(global_common::SQL_SELECT_FREE, 
				array($selectField, self::TBL_SL_ARTICLE ,$whereClause.$orderBy));
		//echo '<br>SQL:'.$strSQL;
		$arrResult =$this->_objConnection->selectCommand($strSQL);		
		if(!$arrResult)
		{
			global_common::writeLog('get All sl_article:'.$strSQL,1,$_mainFrame->pPage);
			return null;
		}
		
		$arrResult = global_common::mergeUserInfo($arrResult);
		
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
					<td><input type="checkbox" onclick="_objArticle.showHide(\''.$arrResult[$i]['ArticleID'].'\',\''.
				$arrResult[$i]['name'].'\',this)" '.($arrResult[$i]['IsDeleted']?'':'checked=checked').' /></td>
					<td class="lastCell">'.$arrResult[$i]['Status'].'</td>
					</tr>';
		}
		$strHTML.='</tbody></table>';
		
		$strHTML .= "<div>".global_common::getPagingHTMLByNum($intPage,self::NUM_PER_PAGE,
				global_common::getTotalRecord(self::TBL_SL_ARTICLE,$this->_objConnection),
				"_objMenu.changePage")."</div>";
		return $strHTML;
	}
	
	public function getArticleMemo($article)
	{
		if($article[global_mapping::CreatedBy][global_mapping::Avatar])
		{
			$avatar = '/file/avatar/'.$article[global_mapping::CreatedBy][global_mapping::Avatar];
		}
		else
		{
			$avatar = '/image/default/default_logo.jpg';
		}
		//print_r($article);
		$strHTML = '<div class="article-memo">
				<div class="article-memo-user">
				<div class="user-info">
				<div><img src="'.$avatar.'" /></div>
				<div>'.$article[global_mapping::CreatedBy][global_mapping::UserName].'</div>
				<div>'.$article[global_mapping::CreatedBy][global_mapping::CreatedDate].'</div>
				</div>
				</div>
				<div class="article-memo-detail">
				
				<div class="article-memo-control">
				<div class="favourite"> LIKE </div>
				</div>
				<div class="article-memo-content">
				<h2 class="title"><a href="article_detail.php?articleid='.
			$article[global_mapping::ArticleID].'"> '.$article['Title'].'</a></h2>
				<p>'.$article[global_mapping::Content].'</p>
				</div>	
				<div class="article-short-info">
				<span><b>Anonymous</b> Comment: 24-12-2012</span>
				<span class="paging"> 
				<a>1</a> <a> 2</a 
				</span>
				</div>
				</div>
				
				<input type=hidden id="articleID" value="'.$article[global_mapping::ArticleID].'" />
				</div>';
		return $strHTML;
	}
	
	public function getArticleDetail($article)
	{
		if($article[global_mapping::CreatedBy][global_mapping::Avatar])
		{
			$avatar = '/file/avatar/'.$article[global_mapping::CreatedBy][global_mapping::Avatar];
		}
		else
		{
			$avatar = '/image/default/default_logo.jpg';
		}
		//print_r($article);
		$strHTML = '<div class="article-memo">
				<div class="article-memo-user">
				<div class="user-info">
				<div><img src="'.$avatar.'" /></div>
				<div>'.$article[global_mapping::CreatedBy][global_mapping::UserName].'</div>
				<div>'.$article[global_mapping::CreatedBy][global_mapping::CreatedDate].'</div>
				</div>
				</div>
				<div class="article-memo-detail">						
				<div class="article-memo-control">
				<div class="favourite"> LIKE </div>
				</div>
				<div class="article-memo-content">
				<h2 class="title"><a href="article_detail.php?articleid='.
			$article[global_mapping::ArticleID].'"> '.$article['Title'].'</a></h2>
				<p>'.$article[global_mapping::Content].'</p>
				</div>							
				</div>						
				<input type=hidden id="articleID" value="'.$article[global_mapping::ArticleID].'" />
				</div>';
		return $strHTML;
	}	
	#endregion   
	
	#region Private Functions
	
	/**
	 * get sql select articles from multi tables
	 *
	 * @param mixed $arrSummary This is a description
	 * @param mixed $intPage This is a description
	 * @param mixed $topRow top of article, 0: get all
	 * @param mixed $selectField This is a description
	 * @param mixed $whereClause This is a description
	 * @param mixed $orderBy This is a description
	 * @return mixed This is the return value description
	 *
	 */
	private function getSQLSelectByTableName($arrSummary, $intPage, $topRow,$selectField, $whereClause,$orderBy) 
	{
		if($orderBy)
		{
			$orderBy = ' ORDER BY '.$orderBy;
		}
		$listArticleID='';
		
		foreach($arrSummary as $item)
		{
			$listArticleID = $item[global_mapping::SubContents].$listArticleID;
		}
		$arrDocInTable =  global_common::getListTableName($listArticleID,$intPage,
				Model_Article::NUM_PER_PAGE,global_common::SEPARATE_BY_MONTH);
				
		$strSQL='';
		$condition = '';
		foreach ($arrDocInTable as $key=>$iDoc)
		{		
			//print_r($iDoc);				
			//check endWith ',' and then remove it
			if(global_common::endsWith($iDoc,','))
			{
				$strDocInTable = global_common::cutLast($iDoc,1);	
			}
			
			$strTableName = Model_Article::TBL_SL_ARTICLE.'_'.$key;
			if($whereClause)
			{
				$condition = 'WHERE ('.global_mapping::IsDeleted.' IS NULL or '.global_mapping::IsDeleted.' = \'0\') and `'.
					global_mapping::ArticleID.'` IN ('.$strDocInTable.') and '.$whereClause;	
			}
			else
			{
				$condition = 'WHERE ('.global_mapping::IsDeleted.' IS NULL or '.global_mapping::IsDeleted.' = \'0\') and `'.
					global_mapping::ArticleID.'` IN ('.$strDocInTable.')';	
			}
			
			if($topRow>0)
			{
				$strSQL .= "(".global_common::prepareQuery(global_common::SQL_SELECT_FREE_LIMIT, 
						array($selectField, $strTableName, $condition.$orderBy,0,$topRow ))." ) UNION ALL ";	
				
			}
			else
			{
				$strSQL .= "(".global_common::prepareQuery(global_common::SQL_SELECT_FREE, 
						array($selectField, $strTableName, $condition.$orderBy ))." ) UNION ALL ";	
			}
		}
		//xóa bỏ đoạn text UNION ALL cuối chuỗi $strSQL
		$strSQL = global_common::cutLast($strSQL,strlen('UNION ALL '));
		//echo $strSQL;
		return $strSQL;
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