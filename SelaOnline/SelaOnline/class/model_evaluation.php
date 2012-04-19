<?php
/*
 * This file was automatically generated By Code Smith 
 * Modifications will be overwritten when code smith is run
 *
 * PLEASE DO NOT MAKE MODIFICATIONS TO THIS FILE
 * Date Created 3/25/2012 6:16:24 PM
 *
 */

/* <summary>
 * Implementations of slevaluations represent a Evaluation
 * </summary>
 */
class model_Evaluation
{		   
	#region PRESERVE ExtraMethods For Evaluation
	#endregion
    #region Contants	
    const ACT_ADD							= 10;
    const ACT_UPDATE						= 11;
    const ACT_DELETE						= 12;
    const ACT_CHANGE_PAGE					= 13;
    const ACT_SHOW_EDIT                     = 14;
    const ACT_GET                           = 15;
    const NUM_PER_PAGE                      = 15;
    
    const TBL_SL_EVALUATION			            = 'sl_evaluation';

	const SQL_INSERT_SL_EVALUATION		= 'INSERT INTO `{0}`
		(
			ArticleID,
			EvaluationID,
			NumEvaluation,
			EvaluatedBy,
			LastEvaluated
        )
        VALUES (
			\'1\', \'2\', \'3\', \'4\', \'5\'
        );';
        
	const SQL_UPDATE_SL_EVALUATION		= 'UPDATE `{0}`
		SET  
			`ArticleID` = \'1\',
			`EvaluationID` = \'2\',
			`NumEvaluation` = \'3\',
			`EvaluatedBy` = \'4\',
			`LastEvaluated` = \'5\'
		WHERE `EvaluationID` = \'2\'  ';
		   

    const SQL_CREATE_TABLE_SL_EVALUATION		= 'CREATE TABLE `{0}` (

			`ArticleID` varchar(60),
			`EvaluationID` varchar(60),
			`NumEvaluation` bigint(0),
			`EvaluatedBy` text(65535),
			`LastEvaluated` datetime(0),
			PRIMARY KEY(EvaluationID)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;';
	
    #endregion   
    
    #region Public Functions
    
    public function insert( $articleid,$numevaluation,$evaluatedby,$lastevaluated)
	{
		$intID = global_common::getMaxID(self::TBL_SL_EVALUATION);
		
		$strTableName = self::TBL_SL_EVALUATION;
		$strSQL = global_common::prepareQuery(self::SQL_INSERT_SL_EVALUATION,
				array(self::TBL_SL_EVALUATION,$intID,global_common::escape_mysql_string($articleid),global_common::escape_mysql_string($numevaluation),global_common::escape_mysql_string($evaluatedby),global_common::escape_mysql_string($lastevaluated)));
		
		if (!global_common::ExecutequeryWithCheckExistedTable($strSQL,self::SQL_CREATE_TABLE_SL_EVALUATION,$this->_objConnection,$strTableName))
		{
			//echo $strSQL;
			global_common::writeLog('Error add sl_evaluation:'.$strSQL,1);
			return false;
		}	
		return $intID;
		
	}
    
    public function update($articleid,$evaluationid,$numevaluation,$evaluatedby,$lastevaluated)
	{
		$strTableName = self::TBL_SL_EVALUATION;
		$strSQL = global_common::prepareQuery(self::SQL_UPDATE_SL_EVALUATION,
				array($strTableName,global_common::escape_mysql_string($articleid),global_common::escape_mysql_string($evaluationid),global_common::escape_mysql_string($numevaluation),global_common::escape_mysql_string($evaluatedby),global_common::escape_mysql_string($lastevaluated) ));
		
		if (!global_common::ExecutequeryWithCheckExistedTable($strSQL,self::SQL_CREATE_TABLE_SL_EVALUATION,$this->_objConnection,$strTableName))
		{
			//echo $strSQL;
			global_common::writeLog('Error add sl_evaluation:'.$strSQL,1);
			return false;
		}	
		return $intNewID;		
	}
    
    public function getEvaluationByID($objID,$selectField='*') 
	{		
		$strSQL .= global_common::prepareQuery(global_common::SQL_SELECT_FREE, 
				array($selectField, self::TBL_SL_EVALUATION ,							
					'WHERE EvaluationID = \''.$objID.'\' '));
		//echo '<br>SQL:'.$strSQL;
		$arrResult =$this->_objConnection->selectCommand($strSQL);		
		if(!$arrResult)
		{
			global_common::writeLog('get sl_evaluation ByID:'.$strSQL,1,$_mainFrame->pPage);
			return null;
		}
		//print_r($arrResult);
		return $arrResult[0];
	}
    
    public function getAllEvaluation($selectField='*') 
	{		
		$strSQL .= global_common::prepareQuery(global_common::SQL_SELECT_FREE, 
				array($selectField, self::TBL_SL_EVALUATION ,							
					''));
		//echo '<br>SQL:'.$strSQL;
		$arrResult =$this->_objConnection->selectCommand($strSQL);		
		if(!$arrResult)
		{
			global_common::writeLog('get All sl_evaluation:'.$strSQL,1,$_mainFrame->pPage);
			return null;
		}
		//print_r($arrResult);
		return $arrResult;
	}
    
    public function getListEvaluation($intPage,$orderBy='EvaluationID', $whereClause)
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
					self::TBL_SL_EVALUATION,$orderBy.' '.$whereClause.' limit '.(($intPage-1)* self::NUM_PER_PAGE).','.self::NUM_PER_PAGE));
		//echo 'sql:'.$strSQL;	
		$arrResult = $this->_objConnection->selectCommand($strSQL);
		//print_r($arrResult);
		$strHTML = '<table class="tbl-list">
                    <thead>
						<td>ArticleID</td>
						<td>EvaluationID</td>
						<td>NumEvaluation</td>
						<td>EvaluatedBy</td>
						<td>LastEvaluated</td>
                    </thead>
                    <tbody>';
		$icount = count($arrmenu);
		for($i=0;$i<$icount;$i++)
		{
			$strHTML.='<tr class="'.($i%2==0?'even':'odd').'">
						<td>'.$arrResult[$i]['ArticleID'].'</td>
						<td>'.$arrResult[$i]['EvaluationID'].'</td>
						<td>'.$arrResult[$i]['NumEvaluation'].'</td>
						<td>'.$arrResult[$i]['EvaluatedBy'].'</td>
						<td class="lastCell">'.$arrResult[$i]['LastEvaluated'].'</td>
					  </tr>';
		}
		$strHTML.='</tbody></table>';
		
		$strHTML .= "<div>".global_common::getPagingHTMLByNum($intPage,self::NUM_PER_PAGE,global_common::getTotalRecord(self::TBL_SL_EVALUATION,$this->_objConnection),
				"_objMenu.changePage")."</div>";
		return $strHTML;
	}
    
    #endregion   
}
?>
