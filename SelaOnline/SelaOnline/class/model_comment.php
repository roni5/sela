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
 * Implementations of slcomments represent a Comment
 * </summary>
 */
class Model_Comment
{		   
	#region PRESERVE ExtraMethods For Comment
	#endregion
    #region Contants	
	const TABLE_BY_MONTHS_COMMENT			= 2;
    const ACT_ADD							= 10;
    const ACT_UPDATE						= 11;
    const ACT_DELETE						= 12;
    const ACT_CHANGE_PAGE					= 13;
    const ACT_SHOW_EDIT                     = 14;
    const ACT_GET                           = 15;
	const ACT_USER_COMMENT					= 16;
    const NUM_PER_PAGE                      = 10;
    
    const TBL_SL_COMMENT			            = 'sl_comment';

	const SQL_INSERT_SL_COMMENT		= 'INSERT INTO `{0}`
		(
			CommentID,
			CommentType,
			ArticleID,
			Content,
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
			\'{1}\', \'{2}\', \'{3}\', \'{4}\', \'{5}\', \'{6}\', \'{7}\', \'{8}\', \'{9}\', \'{10}\', \'{11}\', \'{12}\'
        );';
        
	const SQL_UPDATE_SL_COMMENT		= 'UPDATE `{0}`
		SET  
			`CommentID` = \'{1}\',
			`CommentType` = \'{2}\',
			`ArticleID` = \'{3}\',
			`Content` = \'{4}\',
			`CreatedBy` = \'{5}\',
			`CreatedDate` = \'{6}\',
			`ModifiedBy` = \'{7}\',
			`ModifiedDate` = \'{8}\',
			`DeletedBy` = \'{9}\',
			`DeletedDate` = \'{10}\',
			`IsDeleted` = \'{11}\',
			`Status` = \'{12}\'
		WHERE `CommentID` = \'{1}\'  ';
		   

    const SQL_CREATE_TABLE_SL_COMMENT		= 'CREATE TABLE `{0}` (
			`CommentID` varchar(60),
			`CommentType` varchar(60),
			`ArticleID` varchar(60),
			`Content` text(65535),
			`CreatedBy` varchar(60),
			`CreatedDate` datetime,
			`ModifiedBy` varchar(60),
			`ModifiedDate` datetime,
			`DeletedBy` varchar(60),
			`DeletedDate` datetime,
			`IsDeleted` bit,
			`Status` varchar(60),
			PRIMARY KEY(CommentID)
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
	public function  Model_Comment($objConnection)
	{
		$this->_objConnection = $objConnection;
		
	}
    #region
    
    #region Public Functions
    
    public function insert( $commenttype,$articleid,$content)
	{
		$date = global_common::getDateTime();
		$intID = global_common::buildIDByMonth(global_common::getMaxID(self::TBL_SL_COMMENT),
													$date,Model_Comment::TABLE_BY_MONTHS_COMMENT);
		//echo 'Comment id:'.$intID;
		//$intID = global_common::getMaxID(self::TBL_SL_COMMENT);
		// lấy tên table c_comment_detail_ để lưu thông tin comment
		$strTableName = global_common::builtTableName(
				Model_Comment::TBL_SL_COMMENT, global_common::getTableSuffixByMonth($intID));
		//$strTableName = self::TBL_SL_COMMENT;
		$strSQL = global_common::prepareQuery(Model_Comment::SQL_INSERT_SL_COMMENT,
				array($strTableName,$intID,global_common::escape_mysql_string($commenttype),
				global_common::escape_mysql_string($articleid),global_common::escape_mysql_string($content),
				global_common::escape_mysql_string($createdby),global_common::escape_mysql_string($createddate),
				global_common::escape_mysql_string($modifiedby),global_common::escape_mysql_string($modifieddate),
				global_common::escape_mysql_string($deletedby),global_common::escape_mysql_string($deleteddate),
				global_common::escape_mysql_string($isdeleted),global_common::escape_mysql_string($status)));
		//echo $strSQL;
		if (!global_common::ExecutequeryWithCheckExistedTable($strSQL,Model_Comment::SQL_CREATE_TABLE_SL_COMMENT,$this->_objConnection,$strTableName))
		{
			global_common::writeLog('Error add sl_comment:'.$strSQL,1);
			return false;
		}	
		else
		{
			$arrResult = global_common::updateContents($this->_objConnection,$articleid,$intID,global_common::COMMENT_TYPE);
			if (!$arrResult)
			{
				global_common::writeLog('sp_update_content_summary: '.$strSQL,1);
			}
		}
		return $intID;
	}
    
    public function update($commentid,$commenttype,$articleid,$content,$createdby,$createddate,$modifiedby,$modifieddate,$deletedby,$deleteddate,$isdeleted,$status)
	{
		$strTableName = self::TBL_SL_COMMENT;
		$strSQL = global_common::prepareQuery(self::SQL_UPDATE_SL_COMMENT,
				array($strTableName,global_common::escape_mysql_string($commentid),global_common::escape_mysql_string($commenttype),global_common::escape_mysql_string($articleid),global_common::escape_mysql_string($content),global_common::escape_mysql_string($createdby),global_common::escape_mysql_string($createddate),global_common::escape_mysql_string($modifiedby),global_common::escape_mysql_string($modifieddate),global_common::escape_mysql_string($deletedby),global_common::escape_mysql_string($deleteddate),global_common::escape_mysql_string($isdeleted),global_common::escape_mysql_string($status) ));
		
		if (!global_common::ExecutequeryWithCheckExistedTable($strSQL,self::SQL_CREATE_TABLE_SL_COMMENT,$this->_objConnection,$strTableName))
		{
			//echo $strSQL;
			global_common::writeLog('Error add sl_comment:'.$strSQL,1);
			return false;
		}	
		return $intNewID;		
	}
    
    public function getCommentByID($objID,$selectField='*') 
	{		
		$strSQL .= global_common::prepareQuery(global_common::SQL_SELECT_FREE, 
				array($selectField, self::TBL_SL_COMMENT ,							
					'WHERE CommentID = \''.$objID.'\' '));
		//echo '<br>SQL:'.$strSQL;
		$arrResult =$this->_objConnection->selectCommand($strSQL);		
		if(!$arrResult)
		{
			global_common::writeLog('get sl_comment ByID:'.$strSQL,1,$_mainFrame->pPage);
			return null;
		}
		//print_r($arrResult);
		return $arrResult[0];
	}
    
	public function getAllComment($intPage = 1, $selectField='*', $whereClause='',  $orderBy='') 
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
				array($selectField, self::TBL_SL_COMMENT , $whereClause.$orderBy .' limit '.(($intPage-1)* self::NUM_PER_PAGE).','.self::NUM_PER_PAGE));
		echo '<br>SQL:'.$strSQL;
		$arrResult =$this->_objConnection->selectCommand($strSQL);		
		if(!$arrResult)
		{
			global_common::writeLog('get All sl_comment:'.$strSQL,1,$_mainFrame->pPage);
			return null;
		}
		
		$arrResult = global_common::mergeUserInfo($arrResult);
		
		//print_r($arrResult);
		return $arrResult;
	}
    
	public function getCommentByArticle(&$intPage , &$total, $articleID,$selectField='*',$whereClause='',  $orderBy='') 
	{		
		$arrSummary = global_common::getContentIDs($this->_objConnection,$intPage,$articleID,global_common::COMMENT_TYPE);
		if($arrSummary)
		{
			if($orderBy)
			{
				$orderBy = ' ORDER BY '.$orderBy;
			}
			$listCommentID='';
			
			foreach($arrSummary as $item)
			{
				$listCommentID = $item[global_mapping::SubContents].$listCommentID;
			}
			$IDList = global_common::splitString($listCommentID);
			$total = count($IDList);
			$arrDocInTable =  global_common::getListTableName($listCommentID,$intPage,Model_Comment::NUM_PER_PAGE,global_common::SEPARATE_BY_MONTH);
			$strSQL ='';
			$condition = '';
			foreach ($arrDocInTable as $key=>$iDoc)
			{		
				//check endWith ',' and then remove it
				if(global_common::endsWith($iDoc,','))
				{
					$strDocInTable = global_common::cutLast($iDoc,1);	
				}
				
				$strTableName = Model_Comment::TBL_SL_COMMENT.'_'.$key;
				if($whereClause)
				{
					$condition = 'WHERE ('.global_mapping::IsDeleted.' IS NULL or '.global_mapping::IsDeleted.' = \'0\') and `'.
						global_mapping::CommentID.'` IN ('.$strDocInTable.') and '.$whereClause;	
				}
				else
				{
					$condition = 'WHERE ('.global_mapping::IsDeleted.' IS NULL or '.global_mapping::IsDeleted.' = \'0\') and `'.
						global_mapping::CommentID.'` IN ('.$strDocInTable.')';	
				}
								
				$strSQL .= "(".global_common::prepareQuery(global_common::SQL_SELECT_FREE, 
						array($selectField, $strTableName, $condition.$orderBy ))." ) UNION ALL ";	
			}
			//xóa bỏ đoạn text UNION ALL cuối chuỗi $strSQL
			$strSQL = global_common::cutLast($strSQL,strlen('UNION ALL '));
			
			$arrResult = $this->_objConnection->selectCommand($strSQL);
			$arrResult = global_common::mergeUserInfo($arrResult);
			//print_r($arrResult);
			return $arrResult;
		}
		return null;
	}
	
    public function getListComment($intPage, $orderBy='CommentID', $whereClause)
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
					self::TBL_SL_COMMENT,$orderBy.' '.$whereClause.' limit '.(($intPage-1)* self::NUM_PER_PAGE).','.self::NUM_PER_PAGE));
		//echo 'sql:'.$strSQL;	
		$arrResult = $this->_objConnection->selectCommand($strSQL);
		//print_r($arrResult);
		$strHTML = '<table class="tbl-list">
                    <thead>
						<td>CommentID</td>
						<td>CommentType</td>
						<td>ArticleID</td>
						<td>Content</td>
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
						<td>'.$arrResult[$i]['CommentID'].'</td>
						<td>'.$arrResult[$i]['CommentType'].'</td>
						<td>'.$arrResult[$i]['ArticleID'].'</td>
						<td>'.$arrResult[$i]['Content'].'</td>
						<td>'.$arrResult[$i]['CreatedBy'].'</td>
						<td>'.$arrResult[$i]['CreatedDate'].'</td>
						<td>'.$arrResult[$i]['ModifiedBy'].'</td>
						<td>'.$arrResult[$i]['ModifiedDate'].'</td>
						<td>'.$arrResult[$i]['DeletedBy'].'</td>
						<td>'.$arrResult[$i]['DeletedDate'].'</td>
						<td><input type="checkbox" onclick="_objComment.showHide(\''.$arrResult[$i]['CommentID'].'\',\''.$arrResult[$i]['name'].'\',this)" '.($arrResult[$i]['IsDeleted']?'':'checked=checked').' /></td>
						<td class="lastCell">'.$arrResult[$i]['Status'].'</td>
					  </tr>';
		}
		$strHTML.='</tbody></table>';
		
		$strHTML .= "<div>".global_common::getPagingHTMLByNum($intPage,self::NUM_PER_PAGE,global_common::getTotalRecord(self::TBL_SL_COMMENT,$this->_objConnection),
				"_objMenu.changePage")."</div>";
		return $strHTML;
	}
    
	public function getCommentHTML($comment)
	{
		if($article[global_mapping::CreatedBy][global_mapping::Avatar])
		{
			$avatar = '/file/avatar/'.$comment[global_mapping::CreatedBy][global_mapping::Avatar];
		}
		else
		{
			$avatar = '/image/default/default_logo.jpg';
		}
		/*//print_r($article);
		$strHTML = '<div class="article-memo">
				<div class="article-memo-detail">
				<div class="article-memo-content">
				<div class="article-memo-control">
				<div class="favourite"> LIKE </div>
				</div>
				'.$comment[global_mapping::Content].'
				<div class="article-short-info">
				<span><b>Anonymous</b> Comment: 24-12-2012</span>
				</div>
				</div>
				</div>
				<div class="article-memo-user">
				<div class="user-info">
				<div><img src="'.$avatar.'" width="120" height="100" /></div>
				'.$article[global_mapping::CreatedBy][global_mapping::UserName].'
				</div>
				</div>
				<input type=hidden id="CommentID" value="'.$article[global_mapping::CommentID].'" />
				</div>';
		return $strHTML;*/
		
		$strHTML = '<div class="article-memo">
						<div class="article-memo-user">
							<div class="user-info">
								<div><img src="'.$avatar.'" /></div>
								<div>'.$comment[global_mapping::CreatedBy][global_mapping::UserName].'</div>
								<div>'.$comment[global_mapping::CreatedBy][global_mapping::CreatedDate].'</div>
							</div>
						</div>
						<div class="article-memo-detail">						
							<div class="article-memo-control">
							<div class="favourite"> LIKE </div>
							</div>
							<div class="article-memo-content">
							<p>'.$comment[global_mapping::Content].'</p>
							</div>							
						</div>						
					</div>';
		return $strHTML;
	}
    #endregion   
}
?>
