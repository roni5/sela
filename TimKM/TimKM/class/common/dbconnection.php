<?php
/**
 *  @package/@module: common
 *  Description: Db connection manager.
 *  
 */

class db_connection extends mysqli
{
	#region Consts
	#end region

	#region Variables

	private $_connection = null;
	private $_currentCursor = null;
	private $_cLogger = null;
	private $_strLastError = "";

	#end region

	#region Constructors
	
	/**
	* destruction
	*
	* @return no value
	* @author TinhDoan added [20100414]
	*
	*/
	function __detruct()
	{
		mysql_free_result($this->_currentCursor);
		mysqli_close($this->_connection);
	}
	
	#end region

	#region Public methods
	
	/**
	 * create connection
	 *
	 * @return connection
	 * @author TinhDoan added [20100414]
	 *
	 */
	function createIConnection()
	{	
		// Lay thong tin ket noi DB
		$arrDBConfig = $this->getDBInfo();
		//perform connect
		$this->_connection = mysqli_connect($arrDBConfig['HOST'], $arrDBConfig['USER_NAME'], $arrDBConfig['PASSWORD'], $arrDBConfig['DB_NAME']);
		
		// check error connection 
		if (mysqli_connect_errno()) 
		{
			$this->writeLog("Connect failed: " . mysqli_connect_error(), 1);
			exit();
		}
		// set unicode support
		if (!mysqli_set_charset($this->_connection, "utf8")) {
			$this->writeLog("Error loading character set utf8: " . mysqli_error($this->_connection), 1);
		}
		return $this->_connection;
	}
	
	/**
	 * executes a query
	 *
	 * @param string $query a query
	 * @return no value
	 * @author TinhDoan added [20100414]
	 *
	 */
	function query($query)
	{
		// No empty queries
		if (empty($query)) 
		{
			$this->writeLog("SQL is empty.", 0);
			return;
		}
		// Connect if not already
		if ($this->_connection == null) 
		{
			if(!$this->createIConnection())
			{
				$this->writeLog("Create connection is failed", 0);
				return;
			}
		}
		
		// Perform query
		$this->_currentCursor = mysqli_query($this->_connection,$query, MYSQLI_USE_RESULT);
		
		// Error handling - postgresql errors - i.e. duplicate key
		if (mysqli_error($this->_connection))
		{
			$error = mysqli_error($this->_connection);
			
			// Write log
			$this->writeLog("Execute SQL={$query}", 0);
			$this->writeLog("Execute SQL error={$error}", 1);
			
			// Store error
			$this->_strLastError = $error;
		}
	}
	
	/**
	 * executes one or multiple queries which are concatenated by a semicolon
	 *
	 * @param string $query one or multiple queries which are concatenated by a semicolon
	 * @return bool FALSE if the first statement failed.
	 * @author TinhDoan added [20100414]
	 *
	 */
	function multiQuery($query)
	{
		// No empty queries
		if (empty($query)) 
		{
			return;
		}
		// Connect if not already
		if ($this->_connection == null) 
		{
			if(!$this->createIConnection())
			{
				return;
			}
		}     
		// execute multi query
		$this->_currentCursor = mysqli_multi_query($this->_connection, $query);
		
		// Error handling - postgresql errors - i.e. duplicate key
		if (mysqli_error($this->_connection))
		{
			$error = mysqli_error($this->_connection);
			
			// Write log
			$this->writeLog("Execute multiSQL={$query}", 0);
			$this->writeLog("Execute multiSQL error={$error}", 1);
			
			// Store error
			if ($error)
			{
				$this->_strLastError = $error;
			}
		}
		
		// Success - return cursor
		return $this->_currentCursor;
	}
	
	/**
	 * get value the first column of first row
	 *
	 * @param string $strSQL a query
	 * @return unknown depending on the type of the first column
	 * @author TinhDoan added [20100414]
	 *
	 */
	function selectObject($strSQL)
	{
		$this->query($strSQL);
		if($this->_currentCursor)
		{ 		
			if($result = mysqli_fetch_array($this->_currentCursor))
			{
				mysqli_free_result($this->_currentCursor);
				return $result[0];
			}
		}
		//
		return null;
	}
	
	/**
	* get data from a query
	 *
	 * @param string $strSQL a query
	 * @return array list data
	* @author TinhDoan added [20100414]
	 *
	 */
	function selectCommand($strSQL)
	{ 	   	 	
		$arrRows = array();
		$this->query($strSQL);
		if($this->_currentCursor)
		{ 		
			while($resultRow = mysqli_fetch_array($this->_currentCursor))
			{
				array_push($arrRows,$resultRow);
			}		
			mysqli_free_result($this->_currentCursor);
		}
		
		$pageURL = 'http';
		if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
		$pageURL .= "://";
		if ($_SERVER["SERVER_PORT"] != "80") {
			$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		} else {
			$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		}
		$pieceURL =  explode("=", $pageURL);
		//print_r($pieceURL);
		$pureURL = "";
		foreach( $pieceURL as $item)
		{
			//echo "<br />".$item. "<br />";
			if (strpos($item, "?")) 
			{
				$pureURL .= $item;
				
			} 
			else if (strpos($item,"&")) 
				{
					//echo strpos($item,"&");
					$pureURL .=substr($item,strpos($item,"&"));
					//echo "<br />".common_functions::cutLast($item,strlen($item)- strpos("=")). "<br />";
				}
		}
		if (empty($pureURL)) 
		{
			$pureURL = $pageURL;
		}
		$sessionID  =session_id();
		//global_common::writeLog("session ID1:".$sessionID,1,$pageURL);
		
		
		//global_common::writeLogConnection($sessionID,$pureURL,$strSQL,$_SESSION["request"],$pageURL);
		
		//global_common::writeLog("Once time access DB:".$strSQL,1,$pageURL);
		
		return $arrRows;
	}
	
	/**
	* get data from one or multiple queries which are concatenated by a semicolon
	* 
	* @param string $strSQL one or multiple queries which are concatenated by a semicolon
	* @return an array of arrays
	* @author TinhDoan added [20100414]
	*
	*/
	function selectMultiCommand($strSQL)
	{
		$arrTables = array();
		if($this->multiQuery($strSQL))
		{
			do {
				// Store first result set			
				if ($this->_currentCursor = mysqli_store_result($this->_connection)) 
				{
					$arrRows = array();
					while ($row = mysqli_fetch_array($this->_currentCursor)) 
					{
						array_push($arrRows,$row);
					}
					array_push($arrTables,$arrRows);
					mysqli_free_result($this->_currentCursor);
				}
			} while (mysqli_next_result($this->_connection));
		}
		return $arrTables;
	}
	
	/**
	 * get number of rows affected by execute a query
	 *
	 * @param string $strSQL a query
	 * @return int -1:error, 0:no rows matched the WHERE clause in the query, greater than zero: successful execute
	 * @author TinhDoan added [20100414]
	 *
	 */
	function executeSQL($strSQL)
	{
		$this->query($strSQL);
		$iResult = -1;
		if($this->_currentCursor)
		{
			$iResult = mysqli_affected_rows($this->_connection);
		}
		
		return $iResult;
	}
	
	/**
	 * get bool value for execute one or multiple queries which are concatenated by a semicolon
	 *
	 * @param string $strSQL one or multiple queries which are concatenated by a semicolon
	 * @return bool FALSE if the first statement failed.
	 * @author TinhDoan added [20100414]
	 *
	 */
	function executeMultiSQL($strSQL)
	{
		$result = false;
		if ($this->multiQuery($strSQL))
		{
			$result = true;
			do {
				if ($this->_currentCursor = mysqli_store_result($this->_connection)) 
				{
					mysqli_free_result($this->_currentCursor);
				}
			} while (mysqli_next_result($this->_connection));
		}
		return $result;
	}
	
	/**
	 * get Last Error
	 *
	 * @return string last error content
	 * @author TinhDoan added [20100414]
	 *
	 */
	function getLastError()
	{
		return $this->_strLastError;
	}
	
	/**
	 * write log
	 *
	 * @param string $strContent log content
	 * @param int $intType type of log
	 * @author TinhDoan added [20100413]
	 *
	 */
	function writeLog($strContent, $intType)
	{
		// Initilize log
		if($this->_cLogger == null)
		{
			require_once("lib/log4php/LoggerManager.php");
			
			$this->_cLogger = &LoggerManager::getLogger("dbconnection.php");
		}
		
		// Write log
		switch($intType)
		{
			case 0: // Debug
				$this->_cLogger->debug($strContent);
				
				break;
			case 1: // Fatal
				$this->_cLogger->fatal($strContent);
				break;
		}
	}
	
	/**
	 * get error
	 *
	 * @return string error
	 * @author TinhDoan added [20100414]
	 *
	 */
	function getErrorCode()
	{
		return mysqli_errno($this->_connection);
	}
		
	#end region

	#region Private methods
	
	/**
	 * Lấy thông tin kết nối DB
	 *
	 * @return array Chứa các thông tin kết nối DB
	 * @author DoNguyen added [20110408]
	 *
	 */
	private function getDBInfo()
	{
		/*return array('HOST'=>'localhost',
					'PORT'=>'3306',
					'DB_NAME'=>'hellochao',
					'USER_NAME'=>'root',
					'PASSWORD'=>'',
					'PERSISTENT'=>true);*/
		return array('HOST'=>'localhost',
				'PORT'=>'3306',
				'DB_NAME'=>'TimKM',
				'USER_NAME'=>'root',
				'PASSWORD'=>'',
				'PERSISTENT'=>true);
	}
	
	#end region
	

}