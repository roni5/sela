<?php

/* TODO: Add code here */
/*lớp đối tượng chứa những phương thức chung và các hằng số chung*/
class global_common
{
	#region self
	
	/*****************************************************************************
	* 
	* MySQL Error Code
	* 
	*****************************************************************************/
	const ERR_INSERT_DUPLICATED = 1062;
	const ERR_TABLE_NOT_EXIST = 1146;
	const ERR_TABLE_UNKNOWN = 1109;
	
	
	const STRING_SEPARATE = 'abc123';
	const STRING_SEPARATE_1 = 'def567';
	const SYS_TABLE			= "_";
	const STRING_REQUIRE_LOGIN = 'Bạn chưa đăng nhập.';
	const STRING_NAME_EXIST = 'Tên nhập vào đã tồn tại.';
	/*****************************************************************************
	 * 
	 * SESSION NAME
	 * 
	 *****************************************************************************/
	const SES_C_USERINFO						= 'CUSER_INFO';
	const SES_CHANGE_PASS						= 'CHANGE_PASS_CODE'; // check vercode for forgot pass
	const SES_IS_AUTHENTICATED_CODE				= 'IS_AUTHENTICATED_CODE';
	const SES_SIMILAR_SEARCH_CONTENT			= 'SIMILAR_SEARCH_CONTENT';
	/*End SESSION NAME*/
	
	const SQL_SELECT							= "SELECT {0} FROM `{1}`;";
	
	const SQL_SELECT1							= "SELECT {0} FROM {1}";
	// CLONE: TinhDoan [201005007] - TO security.php
	const SQL_SELECT_BY_CONDITION				= "SELECT {0} FROM `{1}` WHERE {2}";
	
	const SQL_SELECT_BY_CONDITION1				= "SELECT {0} FROM {1} WHERE {2}";
	const SQL_SELECT_LIMIT						= "SELECT {0} FROM `{1}` LIMIT {2},{3}";
	const SQL_SELECT_LIMIT_BY_CONDITION			= "SELECT {0} FROM `{1}` WHERE {2} LIMIT {3},{4}";
	const SQL_SELECT_GROUP						= "SELECT {0} FROM `{1}` GROUP BY {2}";
	const SQL_SELECT_GROUP_WHERE				= "SELECT {0} FROM `{1}` WHERE {2} GROUP BY {3}";
	const SQL_SELECT_ORDER						= "SELECT {0} FROM `{1}` ORDER BY {2}";
	const SQL_SELECT_FREE                       = "SELECT {0} FROM {1} {2}";
	const SQL_SELECT_MAX_ID						= "SELECT MAX(`{0}`) as maxid FROM `{1}`";
	const SQL_SELECT_ALL_TABLES					= "SHOW TABLES;";
	const SQL_SELECT_TABLE_NAME					= "SHOW TABLES LIKE '{0}'";
	
	//ThanhViet added[20101004] Delete with multi condition.
	const SQL_DELETE_BY_MULTI_CONDITION				= "DELETE FROM `{0}` WHERE {1};";	
	
	const SQL_DELETE_BY_CONDITION				= "DELETE FROM `{0}` WHERE `{1}` = '{2}';";
	const SQL_DELETE_IN							= "DELETE FROM `{0}` WHERE `{1}` IN ({2});";
	const SQL_DELETE_ALL						= "DELETE FROM `{0}`;";	
	const SQL_DROP_TABLE						= "DROP TABLE {0};";	
	const SQL_TRUNCATE_TABLE					= "TRUNCATE TABLE {0};"; // TODO: Do Added 20100404	
	const SQL_DELETE                            = "DELETE FROM `{0}` {1}";
	const SQL_UPDATE							= "UPDATE `{0}` SET {1}";
	const SQL_UPDATE_BY_CONDITION				= "UPDATE `{0}` SET {1} WHERE {2};";
	//const for FOLDER
	
	const FOLDER_IMAGE_URL						= 'images/'; //'http://hellochao.com/images/';
	const FOLDER_SOUND_URL						= 'sound/'; //'http://hellochao.com/sound/';
	const FOLDER_CSS_URL						= 'css/'; //'http://hellochao.com/css/';
	const FOLDER_JS_URL							= 'js/'; //'http://hellochao.com/js/';
	const FOLDER_XML							= 'files/xml/';  
	const FOLDER_SQL_CACHE						= 'files/sql_cache/';
	const FOLDER_CONFIG							= 'config/';
	const FOLDER_TEMP							= 'file/security/';
	const FOLDER_SECURITY						= 'file/security/';
	const FOLDER_FILES_MAXID					= 'file/maxid/';
	const FOLDER_FILES_CONTENT					= 'filecontent/';
	const FOLDER_NEWS							= 'file/content/news/';
	const FOLDER_HELP							= 'file/content/help/';
	const FOLDER_FILES_OTHER					= 'file/other/';
	const FOLDER_IMAGE_NEWS						= 'image/news/';
	const FOLDER_IMAGE_NEWS_URL					= 'image/news/'; //'http://hellochao.com/images/news/';
	const FOLDER_IMAGE_USERS_URL				= 'image/users/'; //'http://hellochao.com/images/users/';
	const FOLDER_MAX_TEMPLATE					= 'file/other/mail_template/';
	const FOLDER_FILES_USER_CHANGE_FRONT_END	= 'file/user_change/front_end/';	
	const FOLDER_USER_CHANGE_BACK_END			= 'config/user_change/back_end/';
	const FOLDER_LOG							= 'file/log_10_/';
	const FOLDER_BUSINESS_CACHE					= 'file/business_cache/';
	
	
	const ENCODING								= 'utf-8';
	
	const ANPHABET								= "abcdefghijklmnopqrstuvwxyz";
	const TABLE_SEPERATE_CHAR					= "_";
	const OTHER_PREFIX_CHAR						= "_";	
	//end const for FOLDER
	
	#end region
	
	#region Variables
	
	#end region
	
	
	#region Contructors
	
	#end region
	
	
	#region Private Functions
	
	#end region
	
	
	#region Public Functions
	
	/**
	 * Đổ dữ liệu $_GET và $_POST vào trong $_pgR. Code trong hệ thống sẽ không xuất hiện $_GET và $_POST nữa
	 *
	 * @return array Dữ liệu tổng hợp của $_GET và $_POST
	 * @author DoNguyen added [20110413]
	 */
	public function getRequest()
	{
		// Nếu dữ liệu có cả trong $_GET và $_POST (request bằng method POST nhưng trong URL vẫn có parameter) thì gộp 2 dữ liệu này lại
		// Trường hợp $_GET và $_POST đều có 1 phần tử nào đó trùng key thì value của key đó sẽ là mảng 2 phần tử: [0] của $_GET, [1] của $_POST
		if ($_GET && $_POST)
		{
			return array_merge_recursive($_GET, $_POST);
		}
		// Nếu chỉ có dữ liệu trong $_GET (request bằng method GET)
		if ($_GET)
		{
			return $_GET;
		}
		// Ngược lại chỉ có dữ liệu trong $_POST (request bằng method POST và URL ko có bất kỳ parameter nào)
		return $_POST;
	}
	
	/**
	* Ghi log
	*
	* @param string $strContent nội dung lỗi
	* @param int $intType loại lỗi
	* @param string $strLogPage tên file xảy ra lỗi
	* @author ThanhViet added [20110912]
	*
	*/
	public function writeLog($strContent, $intType, $strLogPage='')
	{
		global $_logger;
		
		// Neu _logger chua duoc khoi tao
		if (!isset($_logger))
		{
			$_logger = &LoggerManager::getLogger($strLogPage);
		}
		
		// Write log
		switch($intType)
		{
			case 0: // Debug
				$_logger->debug($strContent);
				
				break;
			case 1: // Fatal
				$_logger->fatal($strContent);
				break;
		}
	}
	
	/**
	* thực hiện gắn các tham số cho một template câu truy vấn
	*
	* @param string $strQuery câu truy vấn mẫu có các tham số
	* @param array $arrArguments các tham số
	* @return string câu truy vấn hoàn chỉnh
	*
	*/
	public function prepareQuery($strQuery, $arrArguments)
	{
		$intCount = 0;
		
		foreach($arrArguments as $strArgument)
		{
			$strQuery = str_replace('{' . $intCount++ . '}', ($strArgument), $strQuery);
		}
		
		return $strQuery;
	}
	
	/**
	 * thuc hien escape nhung tham so cua cau truy van
	 *
	 * @param string $strQuery cau truy van co nhung lo
	 * @param array $arrArguments mang chua tham so de lap vao cau truy van
	 *					luu y nhung tham so trong mang khong duoc la bieu thuc 
	 *								(ex: $arrArguments[$i] = "field = 'abc'" - sai khong duoc phep)
	 * @return string cau truy van da duoc lap voi nhung lo da duoc escape
	 *
	 */
	public function prepareQueryEscaped($strQuery, $arrArguments)
	{
		$intCount = 0;
		
		foreach($arrArguments as $strArgument)
		{
			$strQuery = str_replace('{' . $intCount++ . '}', self::escape_mysql_string($strArgument), $strQuery);
		}
		
		return $strQuery;
	}
	/**
	* kiểm tra table đã tồn tại hay chưa
	*
	* @param object $objConnection connect to db
	* @param string $strTblName tên table
	* @return bool true đã tồn tại, false chưa có
	*
	*/
	public function isTableExisted($objConnection, $strTblName) 
	{
		if($objConnection->selectObject("SHOW TABLES LIKE '$strTblName';") != null)
		{
			return true;
		}
		
		return false;
	} 
	
	/**
	 * lấy đoạn script chuyễn qua một url khác trong khoãng thời gian bao qui định
	 *
	 * @param string $url địa chỉ url bạn luốn chuyễn
	 * @param int $timeout thời gian chuyễn url
	 * @return string một đoạn script chuyễn url
	 *
	 */
	public function redirectByScript($url, $timeout=100 )
	{
		echo "<script type=\"text/javascript\">"; 
		echo "window.setTimeout(\"window.location.href=\\\"".$url."\\\"\", $timeout);"; 
		echo "</script>";
	}	
	
	/**
	* remove multi space in string
	*
	* @param string $pString chuỗi cần remove
	* @return string chuỗi đã được remove
	*
	*/
	public function removeMultiSpaceInside($pString)
	{
		return Regex.Replace($pString, @"\s{2,}", " ");
	}
	
	// kiểm tra chuổi có kí tự unicode tổ hợp hay không
	
	/**
	 * kiểm tra chuổi có kí tự unicode tổ hợp hay không
	 *
	 * @param string $strSearch chuỗi cần kiểm tra
	 * @return bool true có, false ngược lại
	 *
	 */
	public function detect_composite_unicode($strSearch)
	{
		$pattern = "̣́̀̉̃";
		for ($i=0;$i<mb_strlen($strSearch,self::ENCODING);$i++)
		{
			if (strpos($pattern,mb_substr($strSearch,$i,1,self::ENCODING))!==false)
			{
				return true;
			}
		}
		return false;
	}
	
	// Thay thế những kí tự "unicode tổ hợp" thành "unicode"
	
	/**
	 * Thay thế những kí tự "unicode tổ hợp" thành "unicode"
	 *
	 * @param string $strSearch chuỗi cần thay thế
	 * @return string chuỗi đã được thay thế
	 *
	 */
	public function replace_composite_unicode($strSearch)
	{
		$strResult="";
		$arrSign = self::getArrayUnicode();	
		$intKeyPos;
		for ($i=mb_strlen($strSearch,self::ENCODING)-1;$i>=0;$i--)								
		{
			if ($arrSign[mb_substr($strSearch, $i, 1, self::ENCODING)]==null )
			{
				$strResult = mb_substr($strSearch, $i, 1, self::ENCODING).$strResult;
				continue;
			}
			else
			{
				$strResult = $arrSign[mb_substr($strSearch, $i, 1, self::ENCODING)][mb_substr($strSearch, $i-1, 1, self::ENCODING)].$strResult;
				$i--;				
			}
		}
		return $strResult;
	}
	
	/**
	 * Function : subtract two datetime format
	 * para     : datetime
	 * para     : datetime
	 * para     : format : d,h,m,s
	 * Return   : string
	 */
	public function datediff($date1,$date2,$format)
	{
		$datetime1=strtotime($date1);
		$datetime2=strtotime($date2);
		$dateDiff = $datetime1 - $datetime2;
		if ($format=="d")
		{
			$result =  floor($dateDiff/(60*60*24));
		}
		elseif ($format=="h")
		{
			$result =  floor($dateDiff/(60*60));
		}
		elseif ($format=="m")
		{
			$result =  floor($dateDiff/(60));
		}
		elseif ($format=="s")
		{
			$result =  floor($dateDiff);
		}
		return $result;
	}
	
	
	/**
	 * chuyễn chuỗi thành rỗng nếu chuỗi bằng null
	 *
	 * @param string $strVal chuỗi cần chuyễn
	 * @return string rỗng nếu chuỗi bằng null, ngược lại bằng chính nó
	 *
	 */
	public function nulltoEmpty($strVal)
	{
		return $strVal==null?"":$strVal;
	}
	
	// Function : convert character from MS WORD to standard character
	// Return   : string
	
	/**
	 * convert character from MS WORD to standard character
	 *
	 * @param string $string chuỗi cần thay thế
	 * @return string chuỗi đã được thay thế
	 *
	 */
	public function convert_smart_quotes($string)
	{
		$search = array('‘','’', '“', '”', '…',' '); 
		$replace = array("'", "'", '"', '"','...',' '); 
		return str_replace($search, $replace, $string);
	}
	/**
	 * thực hiện escape một chuỗi trước khi được dùng làm tham số cho câu sql. Bat buoc truyen doi so thu 2
	 *
	 * @param string $strString chuỗi cần được escape
	 * @param object $objConnection connect to db
	 * @return string chuỗi đã được escape
	 *
	 */
	public function escape_mysql_string($strString, $objConnection = null)
	{
		//TODO: TinhDoan edited [20100619]
		//return mysql_escape_string($strString);
		if ($objConnection==null){ // kiem tra neu la cac ham truoc do
			return mysql_escape_string($strString);
		}
		else { // neu ham duoc goi sau [20100619] - bat buot truyen $objConnection mat du co mat dinh null
			if ($objConnection->_connection == null) 
			{
				if(!$objConnection->createIConnection())
				{
					return $strString;
				}
			}
			return mysqli_real_escape_string($objConnection->_connection, $strString);
		}
	}
	
	// Function : convert RETURN to <BR> 
	// Return   : string
	
	/**
	 * thấy thế tất cả chuỗi con \n và \r thành <br> trong chuỗi
	 *
	 * @param string $strRep chuỗi cần được thay thế
	 * @return string chuỗi đã được thay thế
	 *
	 */
	public function RetToBr($strRep)
	{
		$strResult = str_replace("\n","<br>",$strRep);
		$strResult = str_replace("\r","",$strResult);
		return $strResult;
	}
	
	// CLONE: DoNguyen [20100503] - TO user_box.php
	
	/**
	 * thấy thế tất cả chuỗi con \n và \r thành chuỗi con mà bạn muốn trong chuỗi
	 *
	 * @param string $strRep chuỗi cần được thay thế
	 * @param string $newRep chuỗi con dùng để thay thế
	 * @return string chuỗi đã được thay thế
	 *
	 */
	public function RetToAny($strRep, $newRep)
	{
		$strResult = str_replace("\n",$newRep,$strRep);
		$strResult = str_replace("\r","",$strResult);
		return $strResult;
	}
	
	// Function : convert <BR> to RETURN
	// Return   : string
	
	/**
	 * thay thế tất chuỗi con <br> thành \n trong một chuỗi
	 *
	 * @param string $strRep chuỗi cần thay thế
	 * @return string chuỗi đã được thay thế
	 *
	 */
	public function BrToRet($strRep)
	{
		$strResult = str_replace("<br>","\n",$strRep);
		return $strResult;
	}
	
	/**
	 * định dạng lại một chuỗi trước khi xuất ra HTML
	 *
	 * @param string $strRep chuỗi cần định dạng
	 * @return string chuỗi đã được định dạng
	 *
	 */
	public function formatOutputText($strRep)
	{
		return self::RetToBr(self::encodeHTML($strRep));		
	}
	
	public function decodeEditor($strContent)
	{
		$strContent = urldecode($strContent);
		return html_entity_decode($strContent,ENT_COMPAT ,'UTF-8' );
	}
	
	
	/**
	 * mã hóa những ký tự thành mã HTML
	 *
	 * @param string $strValue chuỗi ký tự
	 * @return string chuỗi đã được mã hóa
	 *
	 */
	public function encodeHTML($strValue)
	{
		$strHTMl = htmlentities($strValue, ENT_QUOTES, self::ENCODING);
		// không encode một số ký tự latin (tiếng việt)
		/*$arrCharList = explode(" ","ò ó ô õ Ò Ó Ô Õ ù ú Ù Ú à á â ã À Á Â Ã è é	ê È É Ê ì í Ì Í '");
		$arrBackward = explode(" ","&#242; &#243; &#244; &#245; &#210; &#211; &#212; &#213; &#249; &#250; &#249; &#250; &#217; &#218; &#224; &#225; &#226; &#227; &#192; &#193; &#194; &#195; &#232; &#233; &#234; &#200; &#201; &#202; &#236; &#237; &#204; &#205; &#039;");
		$count = count($arrCharList);
		for ($i=0;$i<$count;$i++)
		{
			$strHTMl = str_replace($arrBackward[$i],$arrCharList[$i],$strHTMl);
		}*/
		return $strHTMl;
	}
	
	/**
	 * đếm số từ của một chuỗi
	 *
	 * @param string $strCount chuỗi cần đếm
	 * @return int số từ trông chuỗi
	 *
	 */
	public function countWordsLength($strCount)
	{
		return count(self::splitKeywords($strCount));
	}
	
	/**
	 * lấy một vài ký tự bên phải của chuỗi
	 *
	 * @param string $str chuỗi ban đầu
	 * @param int $int số ký tự muốn lấy
	 * @return string chuỗi con bạn muốn lấy
	 *
	 */
	public function right($str,$int)
	{
		return substr($str,strlen($str)-$int);
	}
	
	/**
	 * kiểm tra chuỗi null
	 *
	 * @param string $str chuỗi cần kiểm tra
	 * @return bool true: là null, false ngược lại
	 *
	 */
	public function isNull($str)
	{
		return ($str==null?true:false);
	}
	
	/**
	 * kiểm tra có phải là một email hợp lệ không
	 *
	 * @param string $email chuỗi cần kiểm tra
	 * @return bool true: đúng là email, false ngược lại
	 *
	 */
	function isValidEmail($email)
	{
		if (self::isNull($email))
		{
			return false;
		}
		return eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{1,5})$", $email);
	}
	
	/**
	 * so sánh bằng hai chuỗi
	 *
	 * @param string $str1 chuỗi thứ nhất
	 * @param string $str2 chuỗi thứ hai
	 * @return bool true: bằng nhau, false ngược lại
	 *
	 */
	public function isMatch($str1,$str2)
	{
		return ($str1==$str2?true:false);
	}
	
	// Function : check valid datetime
	// Return   : string
	
	/**
	 * kiểm tra có phải là một ngày hợp lệ hay không
	 *
	 * @param int $strDay ngày
	 * @param int $strMonth tháng
	 * @param int $strYear năm
	 * @return bool true đúng, false: ngược lại
	 *
	 */
	public function isValidDate($strDay,$strMonth,$strYear)
	{
		return checkdate($strMonth,$strDay,$strYear);
	}
	// Get age from specified date	
	
	/**
	 * Get age from specified date
	 *
	 * @param date $date ngày tính tuổi
	 * @return mixed This is the return value description
	 *
	 */
	public function getAgeFromDate($date)
	{
		$currentYear = date('Y');
		$yearOfDate = date('Y',strtotime($date));
		
		return $currentYear > $yearOfDate ? ($currentYear - $yearOfDate) : 0;
	}
	
	// Get age from specified year	
	
	/**
	 * Get age from specified year
	 *
	 * @param date $year năm tính tuổi
	 * @return int số tuổi tính được
	 *
	 */
	public function getAgeFromYear($year)
	{
		$currentYear = date('Y');
		
		return $currentYear > $year ? ($currentYear - $year) : 0;
	}
	
	// Return string of sex
	
	/**
	 * lấy chuỗi thể hiện giới tính của người dùng
	 *
	 * @param int $sexCode mã giới tính
	 * @return string chuỗi thể hiện giới tính
	 *
	 */
	public function getSexString($sexCode)
	{
		return $sexCode==1?"Nam":"Nữ";
	}
	
	/*
	 * kiểm tra một chuỗi có phải là id được chia theo alphabet hay tháng không
	 *
	 * @param string $id chuỗi sẽ được kiểm tra
	 * @param bool $isAlphabet true: $isAlphabet, false: theo tháng
	 * @return bool true: là một id, false: ngược lại
	 *
	 */
	public function isValidID($id,$isAlphabet=true)
	{
		/*
		// Empty id
		if (empty($id))
		{
			return false;
		}
				
		// Get separate char
		if ($isAlphabet){
			$sepChar = substr($id,1,1);
			$indexID = substr($id,2,strlen($id)-2);
		}else{
			$sepChar = substr($id,4,1);
			$indexID = substr($id,5,strlen($id)-5);
		}
				
		// Check for right separate char
		if (($sepChar==self::SYS_TABLE || $sepChar==self::CLIENT_TABLE) && is_numeric($indexID))
		{
			return true;
		}
		*/
		return false;
	}
	
	// Get date-time to display on Forum, Message,...
	
	/**
	 * Get date-time to display on Forum, Message,...
	 *
	 * @param date $date ngày giờ bắt đầu
	 * @return string cho biết khoãng thời gian hiển thị
	 *
	 */
	public function timeAgo($date)
	{
		if(!$date)
		{
			return "";
		}
		
		// Get diff time
		$floatDate = strtotime($date);
		$floatDiffTime = floor(microtime(true)) - $floatDate;
		
		if($floatDiffTime<0)
		{
			return "";
		}
		
		// Over 24 hours
		$oneDay = 24*60*60;
		if ($floatDiffTime >= $oneDay)
		{
			
			return date("d/m/Y H:i",$floatDate);
		}else{
			$oneHour = 60*60;
			$hours = floor($floatDiffTime/$oneHour);
			$munites = floor(($floatDiffTime%$oneHour)/60);
			
			// Check for less than 1 munite
			$munites = ($hours<=0 && $munites<=0)?1:$munites;
			
			$strReturn = $hours>0?$hours." tiếng ":"";
			$strReturn .= $munites>0?$munites." phút":"";
			
			return $strReturn;
		}
	}
	/**
	 * Hàm thực hiện chức năng kiểm tra thành viên có phải là blue member hay không
	 *
	 * @param int $is_admin record is_admin của thông tin thành viên
	 * @return int 1: đúng,0:sai
	 *
	 */
	public function isBlueMemberUser($is_admin)
	{
		if ($is_admin==3) {
			return 1;
		}
		return 0;
		
	}
	
	/**
	 * kiểm tra sesion c_user có được login hay chưa
	 *
	 * @return bool true đã login, false chưa login
	 *
	 */
	public function isCLogin()
	{		
		// is authenticated
		if(isset($_SESSION[self::SES_C_USERINFO]) && $_SESSION[self::SES_C_USERINFO]["active"]==1)
		{	
			return true;
		}
		else // not authenticated
		{		
			return false;	
		}
	} 
	
	
	/**
	 * Hàm thực hiện chức năng kiểm tra thành viên có phải là supporter member hay không
	 *
	 * @param int $is_admin record is_admin của thông tin thành viên
	 * @return int 1: đúng,0:sai
	 *
	 */
	public function isSupporterUser($is_admin)
	{
		if ($is_admin==2) {
			return 1;
		}
		return 0;
		
	}
	
	/**
	* Hàm thực hiện chức năng kiểm tra thành viên có phải là thường dân hay không
	*
	* @param int $is_admin record is_admin của thông tin thành viên
	* @return int 1: đúng,0:sai
	*
	*/
	public function isNormalUser($is_admin)
	{
		if ($is_admin==0) {
			return 1;
		}
		return 0;
		
	}
	
	/**
	* Hàm thực hiện chức năng kiểm tra thành viên có phải là admin hay không
	*
	* @param int $is_admin record is_admin của thông tin thành viên
	* @return int 1: đúng,0:sai
	*
	*/
	public function isAdminUser($is_admin)
	{
		if ($is_admin==1) {
			return 1;
		}
		return 0;
		
	}
	/**
	 * thực tự động ngắt chuỗi theo chiều dài qui định
	 *
	 * @param string $strString chuỗi ban đầu quá dài
	 * @param string $lengthWordWrap chiều dài sẽ được ngắt
	 * @return string chuỗi đã được ngắt theo chiều dài qui định
	 *
	 */
	public function wrapText($strString,$lengthWordWrap)
	{
		return wordwrap($strString, $lengthWordWrap,"\n", true);
	}
	
	
	/**
	 * thực hiện chèn giá trị cho mail mẫu
	 *
	 * @param string $templateFile tên file mail mẫu
	 * @param array $arrSubjectPara mảng chứa các tham số của chủ đề mail
	 * @param array $arrContentPara chứa các tham số của nội dung mail
	 * @return array [0]->Subject; [1]->Mail content. Return NULL for failing
	 *
	 */
	public function formatMailContent($templateFile, $arrSubjectPara, $arrContentPara)
	{
		// Read mail template
		$mailTemplate = Application::readTextFile(self::FOLDER_MAX_TEMPLATE.$templateFile);
		
		// Return null if read file fail
		if (!$mailTemplate)
		{
			return null;
		}
		
		/************ Quy dinh ve format trong template mail ******************
		* - Hang dau tien la SUBJECT cua mail
		* - Tu hang thu 2 tro di moi la noi dung cua mail
		* *********************************************************************/
		
		$posEndFirstLine = strpos($mailTemplate, "\n");
		
		// Get and format subject
		$arrReturn[0] = substr($mailTemplate, 0, $posEndFirstLine);
		if ($arrSubjectPara)
		{
			$arrReturn[0] = self::prepareQuery($arrReturn[0], $arrSubjectPara);
		}
		
		// Get and format mail content
		$arrReturn[1] = substr($mailTemplate, $posEndFirstLine + 1);
		if ($arrContentPara)
		{
			$arrReturn[1] = self::prepareQuery($arrReturn[1], $arrContentPara);
		}
		// TODO: DoNguyen - Format cho quang cao {100} sau này sẽ để trong 1 function và lấy dữ liệu từ DB
		$arrReturn[1] = str_replace('{100}', 'Học tiếng Anh hiệu quả tại <a href="http://www.hellochao.com">www.hellochao.com</a>', $arrReturn[1]);
		
		// Return values
		return $arrReturn;
	}
	
	// Uppercase the first character of each word in a string
	
	/**
	 * thực hiện viết hoa cho mỗi ký tự đầu của từ trong chuỗi
	 *
	 * @param string $content chuỗi cần thay đổi
	 * @return string được viết hoa các ký tự đầu của từ trong chuỗi
	 *
	 */
	public function upperFirstCharEachWord($content)
	{
		return mb_convert_case($content, MB_CASE_TITLE, self::ENCODING);
	}
	
	// Create and encode key to pass to client, the system can login with info in this key	
	/**
	 * Create and encode key to pass to client, the system can login with info in this key	
	 *
	 * @param string $email email của người dùng
	 * @param string $pass mật khẩu của người dùng
	 * @return string chuỗi mã hóa kết hợp giữa email và pass
	 *
	 */
	public function encodeUserClientKey($email,$pass)
	{
		// Create key, encode and return
		return self::hc_encode($email.self::SEP_RETURN.$pass);
	}
	
	// Decode key passed from client, it is used to login
	// Return array 2 dimension: [0]->email, [1]->pass
	
	/**
	 * Decode key passed from client, it is used to login
	 *
	 * @param string $key chuỗi mã hóa giữa email và pass
	 * @return array 2 dimension: [0]->email, [1]->pass
	 *
	 */
	public function DecodeUserClientKey($key)
	{
		if (!$key)
		{
			return null;
		}
		
		$arrKey = explode(self::SEP_RETURN,self::hc_decode($key));
		
		if (count($arrKey)!=2)
		{
			return null;
		}
		
		return $arrKey;
	}	
	
	// Funtion : get maxid from an id by anphabet
	// Return  : string
	/**
	 * get maxid from an id by anphabet
	 *
	 * @param string $currentMaxID id hiện thời lớn nhất
	 * @param string $newContent nội dung id mới
	 * @return string id được tạo thành
	 *
	 */
	public function regetMaxIDByAlphabet($currentMaxID, $newContent)
	{
		if(empty($currentMaxID) || empty($newContent))
		{
			return $currentMaxID;
		}
		return self::buildIDByAlphabet(substr($currentMaxID,2),$newContent,(substr($currentMaxID,1,1)==self::SYS_TABLE?self::SYS_TABLE:self::CLIENT_TABLE));
		//return strtolower(substr($newContent,0,1)).substr($currentMaxID,1,strlen($currentMaxID)-1);		
	}
	
	/**
	 * generate verfication/spam code
	 *
	 * @param int $len chiều dài
	 * @return string
	 *
	 */
	public function genVerCode($len)
	{
		$arrValue = array(0=>'2',1=>'3',2=>'4',3=>'5',4=>'6',5=>'7',6=>'8',7=>'9',8=>'A',9=>'B',10=>'C',11=>'D',
				12=>'E',13=>'F',14=>'G',15=>'H',16=>'J',17=>'K',18=>'L',19=>'M',20=>'N',21=>'P',22=>'Q',
				23=>'R',24=>'S',25=>'T',26=>'U',27=>'V',28=>'W',29=>'X',30=>'Y',31=>'Z');		
		$code = "";
		for ($i=0;$i<$len;$i++)
		{
			$code .= $arrValue[mt_rand(0,31)];
		}
		return $code;
	}
	
	// Funtion : cut number of last character
	// Return  : string
	/**
	 * thực hiện cắt một vài ký tự cuối của chuỗi
	 *
	 * @param string $string chuỗi ký tự sẽ cắt
	 * @param int $num số ký tự sẽ cắt
	 * @return string chuỗi đã được cặt các ký tự cuối
	 *
	 */
	public function cutLast($string,$num=1)
	{
		if ($string!="")
		{
			$string = substr($string,0,strlen($string)-$num);
		}
		
		return $string;
	}
	
	/**
	 * Dung de lay ve 1 chuoi ky tu thuong bat ky co do lai la $lengStr
	 *
	 * @return string mot chuoi ky tu thuong bat ky
	 *
	 */
	public function randomString($lengStr)
	{
		if ($lengStr<=0)
		{
			return "";
		}
		
		$returnString = "";
		for ($iRun = 1; $iRun <= $lengStr; $iRun++)
		{
			$returnString .= chr(rand(97,122));
		}
		
		return $returnString;
	}
	
	/**
	 * thực hiện phân trang cho dữ liệu ít
	 *
	 * @param int $intCurrPage trang hiện hành
	 * @param int $intResultsInOnePage số dòng dữ liệu hiển thị trong một trang
	 * @param int $intTotalResult tổng số dòng dữ liệu có được
	 * @param string $jsFuncName tên hàm để chuyển trang
	 * @return string chuổi HTML hiển thị phân trang
	 *
	 */
	public function getPageHTML($intCurrPage, $intResultsInOnePage, $intTotalResult,$jsFuncName)
	{
		if ($intTotalResult<=$intResultsInOnePage)
			return "";
		$strPages = "";
		$i = $intCurrPage;	
		$intMaxPages = ceil($intTotalResult/$intResultsInOnePage);
		if ($intMaxPages!=0) 
			$end = floor(($intCurrPage + $intMaxPages) / $intMaxPages)*$intMaxPages + 1;
		
		// get max page number
		if($intCurrPage <= $intMaxPages)
		{
			$i = 1;
		}
		else
		{
			if ($intMaxPages!=0)
				$i = floor(($intCurrPage + $intMaxPages) / $intMaxPages)*$intMaxPages - $intMaxPages;
		}
		
		// previous
		if($intCurrPage > 1)
		{
			$strPages.= "\n<a href='javascript:$jsFuncName(". ($intCurrPage - 1) .");' >Pre</a>" . "&nbsp;&nbsp;";
		}
		// page number
		while($i <= $intMaxPages && ($i - 1) * $intResultsInOnePage < $intTotalResult)
		{				
			if($intCurrPage == $i)
			{
				$strPages.= "\n"."<b><a style=\"color:red\">". $i."</a></b>"."&nbsp;&nbsp;";
			}
			else
			{
				$strPages.=  "\n<a href='javascript:$jsFuncName(". $i .");' >". $i ."</a>" . "&nbsp;&nbsp;";
			}
			
			$i++;
		}
		
		// next
		if($intCurrPage < ceil($intTotalResult / $intResultsInOnePage))
		{
			$strPages.= "\n<a href='javascript:$jsFuncName(". ($intCurrPage + 1) .");' >Next</a>" . "&nbsp;&nbsp;";
		}
		
		return $strPages;
	}
	
	function FormatOutputDateTime($mySqlDateTime)
	{
		return substr($mySqlDateTime,8,2)."/".substr($mySqlDateTime,5,2)."/".substr($mySqlDateTime,0,4);
	}
	
	/**
	 * cat dư lieu text trong chuoi voi so tu cho truoc
	 *
	 * @param string $strContent chuoi can cat co the la HTML
	 * @param int $limit so tu can lay
	 * @return string dư lieu text doc duoc khong co HTML
	 * @author TinhDoan added [20101209]
	 *
	 */
	function splitWord($strContent, $limit)
	{
		//xoa tat ca cac dinh dang HTML
		$strContent = preg_replace(array("/<(.)*?>/e","/\n/","/\r/"), "",$strContent);
		$strContent = htmlentities($strContent, ENT_QUOTES, self::ENCODING);
		$strContent = preg_replace("/\s\s+/e", " ",$strContent);
		$strContent = html_entity_decode($strContent, ENT_QUOTES, self::ENCODING);
		// bien chuoi thanh mang
		$arrTemp = split(" ", $strContent, $limit+1);
		if (count($arrTemp)==($limit+1))
			unset($arrTemp[$limit]);
		$strContent = implode(" ", $arrTemp);
		return $strContent;
	}
	
	/**
	 * Phương thức phân trang có next,prev and first. Biết trước số trang.
	 *
	 * @param int $intCurrPage Trang hiện tại
	 * @param int $intResultsInOnePage Số lượng record hiển thị
	 * @param int $intTotalResult Tổng result
	 * @param string $jsFuncName Hàm phân trang js
	 * @return string ouput HTML
	 *
	 */
	public function getPagingHTML($intCurrPage, $intResultsInOnePage, $intTotalResult, $jsFuncName)
	{
		$strPages = '<a href=\'javascript:'.$jsFuncName.'(1);\' >Đầu Tiên</a>' . '&nbsp;&nbsp;';
		$strPages.=$intCurrPage>1?'|&nbsp;&nbsp;<a href=\'javascript:'.$jsFuncName.'('.($intCurrPage>1?($intCurrPage-1):1).');\' >Trước</a>' . '&nbsp;&nbsp;':'';
		$strPages.=$intCurrPage < ceil($intTotalResult / $intResultsInOnePage)?'|&nbsp;&nbsp;<a href=\'javascript:'.$jsFuncName.'('.(($intCurrPage < ceil($intTotalResult / $intResultsInOnePage))?($intCurrPage+1):ceil($intTotalResult / $intResultsInOnePage)+1).');\' >Tiếp</a>':'';
		return $strPages;
	}
	
	/**
	 * convert plural words to singular
	 *
	 * @param string $word Chuỗi có các từ plural
	 * @return string Chuối trả về chuyển plural sang singular
	 *
	 */
	function pluralToSingular($word){
		
		$rules = array( 
				'ss' => false, 
				'os' => 'o', 
				'ies' => 'y', 
				'xes' => 'x', 
				'oes' => 'o', 
				'ies' => 'y', 
				'ves' => 'f', 
				's' => '');
		// Loop through all the rules and do the replacement. 
		foreach(array_keys($rules) as $key){
			// If the end of the word doesn't match the key,
			// it's not a candidate for replacement. Move on
			// to the next plural ending. 
			if(substr($word, (strlen($key) * -1)) != $key) 
				continue;
			// If the value of the key is false, stop looping
			// and return the original version of the word. 
			if($key === false) 
				return $word;
			// We've made it this far, so we can do the
			// replacement. 
			return substr($word, 0, strlen($word) - strlen($key)) . $rules[$key]; 
		}
		return $word;
	}
	
	/**
	 * Định dạng lại ngày tháng khi đưa xuống CSDL
	 *
	 * $formatTime là định dạng time Ex: "Y-m-d H:i:s"
	 * $timeStamp là thời gian tính từ 1/1/1970 tới nay tính bằng giây
	 * 
	 * @return date đã format
	 *
	 */
	public function getDatetimeFromTimeStamp($formatTime, $timeStamp)
	{
		return date($formatTime, $timeStamp);
	}
	
	function cutString($string,$startPos, $max_length){  
		if (strlen($string) > $max_length){  
			$string = substr($string, $startPos, $max_length);  
			$pos = strrpos($string, " ");  
			if($pos === false) {  
				return substr($string, $startPos, $max_length)."...";  
			}  
			return substr($string, $startPos, $pos)."...";  
		}else{  
			return $string;  
		}  
	}  
	/**
	 * cat chuoi theo word
	 *
	 * @param mixed $strContent This is a description
	 * @param mixed $startPos This is a description
	 * @param mixed $numWord This is a description
	 * @return mixed This is the return value description
	 *
	 */
	public function cutString2($strContent, $startPos, $numWord)
	{
		
		
		
		
		//$strContent=str_replace('<b>', '', $strContent);
		//$strContent=str_replace('</b>', '', $strContent);
		$arrNew=array();
		$tempArr=explode(' ',$strContent);
		
		for($i=$startPos;$i<$numWord;$i++)
		{
			
			$arrNew[]=$tempArr[$i];
		}
		//nếu don van can lay van con ngan hon cau thi them dau ... vao
		$strReturn=implode(' ',$arrNew);
		if(($startPos+$numWord)<count($tempArr))
		{
			$strReturn.='...';
		}
		return $strReturn;
	}
	
	/**
	 * xoa tat ca cac tag
	 *
	 * @param mixed $content This is a description
	 * @return mixed This is the return value description
	 *
	 */
	public function deleteAllTag($content)
	{
		return preg_replace('#<[^>]*>#imsU', ' ', $content);	
	}
	/**
	 * This is method cmsConvertDbToView
	 *
	 * @param mixed $text This is a description
	 * @return mixed This is the return value description
	 *
	 */
	public function strConvertDbToView($text)
	{		  
		$text	= str_replace('\"','"',$text);
		$text	= str_replace("\\'","'",$text);
		$text	= str_replace("\\\\","\\",$text);
		
		return $text;
	}
	/**
	 * Tạo tên folder theo mỗi 4 giờ 
	 *
	 * @return folderName ex: 00 | 04 | 08....
	 *
	 */
	
	public function getFolderNameByHour()
	{
		$time =	(floor((date("H")/4))*4);
		if($time<10)
			$time='0'.$time;
		return $time;			
	}
	/**
	 * tạo các folder (nếu chưa có) khi đưa vào đường dẫn
	 *
	 * @param mixed $dir là đường dẫn (ex: folder1/folder2/folder3/folder4)
	 * @return mixed true: success; false: can't make Directory
	 *
	 */
	public function makeDir($dir)
	{
		//tach chuoi directory truyen vao
		$folderList=explode('/',$dir);
		//khoi tao cai strDir bang rong
		$strDir='';
		//lap mang de kiem tra cac folder co ton tai hay chua
		foreach($folderList as $key=>$folder)
		{
			//neu la phan tu dau tien thi khong add dau / vao
			if( $key == 0 )
			{
				$strDir=$folder;
			}
			//tu ohan tu thu 2 thi add dau / vao
			else
			{
				$strDir.='/'.$folder;
			}
			//neu thu muc do da ton tai thi kiem tra tiep thu muc con
			if(is_dir($strDir)==true)
			{				
				continue;
			}
			else//nguoc lai se tao thu muc
			{
				//neu tao khong dc thu muc se return FALSE
				if(!mkdir($strDir))
				{
					return false;
				}
			}
		}
		//neu da tao thanh cong se return TRUE
		return true;
	}
	/**
	 * tạo một tên bảng
	 *
	 * @param string $oriName phần đầu tên bảng
	 * @param string $sufname phần đuôi tên bảng
	 * @return string tên bảng được tạo thành
	 *
	 */
	public function builtTableName($oriName,$sufname)
	{
		return $oriName.global_common::TABLE_SEPERATE_CHAR.$sufname;
	}
	/**
	 * lấy thời gian hiện tại tính bằng microtime
	 *
	 */
	public function getTimeStamp()
	{
		return (float)array_sum(explode(" ",microtime()));
	}
	
	/**
	 * Phương thức ghi log connection tới db
	 *
	 * @param string $sessionID Session ID
	 * @param string $strURL Chuối URL chỉ bao gồm các param chứ không bao gồm giá trị của param
	 * @param string $strSQL Chuối truy vấn sql đến db
	 * @param int $iRequest Lần truy cấp của user
	 * @param string $strFullURL Chuối đầy đủ URL
	 * @return null
	 * @author ThanhViet added [20101210]
	 *
	 */
	function writeLogConnection($sessionID,$strURL,$strSQL,$iRequest,$strFullURL)
	{
		$strFileName = self::FOLDER_CONFIG."accessdb/$sessionID.xml";
		if(!file_exists($strFileName))
		{
			self::writeToFile($strFileName,"<access session_id='$sessionID'></access>");
		}
		$xmldoc = new DOMDocument();
		$xmldoc->load($strFileName);
		
		$root = $xmldoc->firstChild;
		//$connections = $xmldoc->getElementsByTagName("connection");
		//$isSessionExist =  false;
		
		$eURL = $xmldoc->createElement( "URL" );
		$eSQL = $xmldoc->createElement( "SQL" );
		$eREQUEST = $xmldoc->createElement( "REQUEST" );
		$eFullURL = $xmldoc->createElement( "FULLURL" );
		$eDateTime = $xmldoc->createElement( "DATETIME" );
		
		//foreach($connections as $item)
		//{
		/*$attribNode = $item->getAttributeNode('session_id');
		if ($attribNode->value == $sessionID) {*/
		$eConnection = $xmldoc->createElement( "connection" );
		$eURL->appendChild(
				$xmldoc->createTextNode($strURL)
				);
		$eConnection->appendChild( $eURL);
		
		$eSQL->appendChild(
				$xmldoc->createTextNode($strSQL )
				);
		$eConnection->appendChild( $eSQL);
		
		$eREQUEST->appendChild(
				$xmldoc->createTextNode($iRequest )
				);
		$eConnection->appendChild( $eREQUEST);
		
		$eFullURL->appendChild(
				$xmldoc->createTextNode($strFullURL )
				);
		$eConnection->appendChild( $eFullURL);
		
		$eDateTime->appendChild(
				$xmldoc->createTextNode(self::getDateTime())
				);
		$eConnection->appendChild( $eDateTime);
		
		$root->appendChild($eConnection);
		$xmldoc->save($strFileName) ;
		
	}
	/**
	 * Hàm ghi file
	 *
	 * @param string $fileName Tên file cầm ghi
	 * @param string $value Giá trị cần ghi file
	 * @return bool True->Ghi thành công. False->Ghi thất bại
	 * @author ThanhViet [20101108]
	 * 
	 */
	function writeToFile($strFileName, $value)
	{
		try
		{
			$iMax = 100; 
			$iCount = 0;
			
			// Create new file pointer
			$file_pointer = fopen($strFileName, 'w');
			
			// Write data to file
			do{
				if(!(fwrite($file_pointer,$value)))
				{
					$iCount++;
				}
				else
				{
					return true;
				}
			}while($iCount <= $iMax);
			
			if ($iCount>100)
			{
				return false;
			}
			
			return true;
		} catch (Exception $e) {
			echo '<br>Caught exception: ',  $e->getMessage(), "\n";
			return false;
		}
	}
	
	
	/**
	 * Hàm đọc nội dung từ một file
	 *
	 * @param string $fileName Tên file cần đọc
	 * @return string Giá trị đọc được. Null->Đọc thất bại
	 * @@author ThanhViet [20101108]
	 * 
	 */
	function readFromFile($strFileName)
	{	
		$iMax = 100; 
		$iCount = 0;
		
		// Check file exist
		if(!file_exists($strFileName))
		{
			return null;
		}
		
		// Try to access file
		do{
			$result = file_get_contents($strFileName);
			// read file fail
			if ($result===false)
			{
				$iCount++;
			}
			else // succeed : empty or has an value
			{
				return $result;				
			}
		}while($iCount <= $iMax);
		
		return null;
	}
	/**
	* This is method parseListIDToArray with index correspond with suffix Table
	 *
	 * @param string $IDList List ID
	 * @param int $iType Loại ID cần parse. 1->alphabet; 4->month.
	 * @return array Array of ID with index correspond with suffix Table
	 * @author ThanhViet edited [20110516]
	 */
	public function parseListIDToArray($IDList,$iType)
	{
		$arrDocInTable=array();
		if (!is_array($IDList))
		{
			$IDList = explode(",",$IDList);	
		}
		//self::writeLog("str - $iType:".substr($IDList[0],0,(strrpos($IDList[0], self::CLIENT_TABLE)) ),0,"common_fucntion");
		//tránh trường hợp array ID không được sắp xếp theo index 0,1,2,...
		$ID = array_pop($IDList);
		//lấy vị trí ngăn cách loại phân trang và số id
		$irpos = strrpos($ID, self::CLIENT_TABLE);
		//nếu không phải là table của công động c_ thì lấy theo của hellochao
		if (!$irpos) 
		{
			$irpos = strrpos($ID, self::SYS_TABLE);
		}
		array_push($IDList,$ID);
		if (strlen(substr($ID,0,$irpos) ) ==$iType)
		{
			foreach ($IDList as $key)
			{
				$arrDocInTable[substr($key,0,$iType)] .= "'$key',";
			}
		} 
		return $arrDocInTable;
	}
	
	/**
	 * Set Title for each page
	 *
	 * @param string $prefix Prefix of Title For each page user visit
	 * @param string $subffix Subffix of Title For each page user visit
	 * @return void
	 */ 
	public function setSiteTitle($prefix, $subffix)
	{
		global $_HTitle;
		$_HTitle =$prefix." | ".$subffix;
	}
	/**
	 * Set Descripttion for each page
	 *
	 * @param string $description Title For each page user visit
	 * @return void
	 */ 
	public function setSiteDescription($description)
	{
		global $_HDescription;		
		$_HDescription = $description;
	}
	
	/**
	 * Get dynamic Header for website
	 *
	 * @param int $headerType which part will be set to header.
	 * @param string $stringValue string value which to be set.
	 * @return strin
	 * $headerType:
	 * 1: description
	 * 2: keywords
	 * 3: title
	 */
	public function getSiteHeader()
	{
		global $_HTitle;
		global $_HDescription;
		global $_HKeyword;
		
		if ($_HDescription)
		{
			$strHeader .= "<meta name=\"description\" content=\"$_HDescription\"/>";
		}
		else
		{
			$strHeader .= "<meta name=\"description\" content=\"English &amp; Vietnamese Conversational Search Engine. Công cụ tìm kiếm câu đàm thoại song ngữ Anh Việt. Thêm câu nói tiếng Anh hỗ trợ cộng đồng. Diễn đàn thảo luận, chia sẽ, giải đáp về tiếng Anh. Bài viết giúp củng cố và nâng cao kiến thức tiếng Anh. Làm bài kiểm tra giúp ôn lại tất cả kiến thức tiếng Anh phổ thông và nâng cao.
					\"/>";
		}
		
		if ($_HKeyword)
		{
			$strHeader .= "<meta name=\"keywords\" content=\"$_HKeyword\"/>";
		}
		else
		{
			$strHeader .= "<meta name=\"keywords\" content=\"tìm câu nói tiếng Anh, tự điển câu nói, dịch câu Việt Anh, tìm câu nói, học tiếng Anh, đàm thoại song ngữ Anh Việt, tra câu tiếng Anh, tra nghĩa, tìm kiếm cụm từ, thảo luận, hỏi đáp, làm bài kiểm tra, bài viết, hệ thống dịch thuật, nói lưu loát tiếng Anh không cần suy nghĩ, mở miệng nói ngay - nói không cần suy nghĩ, translate system, speak English fluently, hello chào, hello chao, hellochao
					\"/>";
		}
		
		if ($_HTitle)
		{
			$strHeader .= "<title>$_HTitle</title>";
		}
		else
		{
			$strHeader .= "<title>HelloChao | Công cụ tìm kiếm câu nói tiếng Anh.</title>";
		}
		return $strHeader;
	}
	/**
	 * tạo một id theo Alphabet
	 *
	 * @param int $maxId con số id lớn nhất của bảng
	 * @param string $content môt id khác của bảng hay một ký tự đầu của id
	 * @param string $sepChar dâu ngăn cách giữa ký tự và maxid
	 * @return string id được tạo thành
	 *
	 */
	public function buildIDByAlphabet($maxId,$content,$sepChar)
	{
		if ($content==null)
		{
			$prefix = "";
		}
		else
		{
			$prefix = strtolower(substr($content,0,1));
			if (strpos(self::ANPHABET, $prefix)===false)
			{
				$prefix = self::OTHER_PREFIX_CHAR;
			}
		}
		
		return $prefix.$sepChar.$maxId;
	} 
	
	// CLONE: TinhDoan [20100504] – TO appication.php
	
	/**
	 * tạo một id theo tháng
	 *
	 * @param int $maxId con số id lớn nhất của bảng
	 * @param date $date ngày muốn tạo id
	 * @param int $months con số khoãng cách tháng tạo id
	 * @param string $sepChar dấu ngăn cách giữa ngày tháng và id lớn nhất
	 * @return string id được tạo thành
	 *
	 */
	public function buildIDByMonth($maxId, $date, $months=1)
	{
		$mon = substr($date,5,2);
		$m=str_pad(($mon%$months==0?(($mon/$months)-1)*$months:floor($mon/$months)*$months)+1,2,"0",STR_PAD_LEFT);
		return substr($date,0,4).$m.$maxId;
	} 
	
	/**
	 * / lấy phần cuối của id
	 *
	 * @param mixed $content là một id
	 * @return mixed string
	 *
	 */
	public function getTableSuffixByAlphabet($contentID)
	{
		$prefix = global_common::convertIntToChar(substr($contentID,0,2));
		//
		if (strpos(global_common::ANPHABET,strtolower($prefix)) === false)
		{
			$strPreChar = global_common::OTHER_PREFIX_CHAR;
		}
		else
		{
			$strPreChar = strtolower($prefix);
		}
		
		return $strPreChar;
	} 
	
	// CLONE: TinhDoan [20100504] – TO appication.php
	
	/**
	 * lấy phần đuôi tên bảng theo tháng
	 *
	 * @param string $content tên bảng
	 * @return string gồm 4 ký tự cuối của tên bảng
	 *
	 */
	public function getTableSuffixByMonth($content)
	{
		return substr($content,0,6);
	} 
	
	/**
	 * chuyễn bảng mã của chuỗi từ utf-16 thành utf-8
	 *
	 * @param string $text chuỗi cần được chuyển bảng mã
	 * @return string chuỗi đã được chuyễn bảng mã
	 *
	 */
	public function to_utf8($text) {
		$out="";
		$text=mb_convert_encoding($text,'UTF-16','UTF-8');
		for ($i=0;$i<mb_strlen($text,'UTF-16');$i++)
			$out.= bin2hex(mb_substr($text,$i,1,'UTF-16'));
		return $out;
	}
	/**
	 * xác định ngôn ngữ trong một chuỗi (tiếng anh hoặc tiếng việt)
	 *
	 * @param string $strText Text Content.
	 * @return int 1->Tiếng việt, 0->Tiếng anh.
	 *
	 */
	public function detect_language($strText)
	{
		$flag_Vn=false;
		for ($i=0;$i<strlen($strText);$i++)
		{
			if (ord($strText[$i])<32 || ord($strText[$i])>126)
			{
				$flag_Vn=true;
				break;
			}
		}
		if ($flag_Vn)
		{
			return 1;	
		}
		else
		{
			return 0;
		}
	}
	/**
	 * Công thêm 1 đơn vị cho ký tự vd: ('a'+1->b)
	 *
	 * @param string $cAlpha Ký tự cần công thêm
	 * @return string ký tự sau khi công thêm một đơn vị
	 *
	 */
	public function alphabetPlus($cAlpha)
	{
		if ($cAlpha=='_') {
			return 'a';
		}
		return chr(ord($cAlpha)+1);
	}
	
	// Funtion : plus an month
	// Return  : string
	
	/**
	 * lấy chuỗi gồm năm tháng của table chia theo tháng
	 *
	 * @param string $strYM chuỗi gồm năm và tháng hiện thời
	 * @param int $intAmount số tháng để chia
	 * @return string chuỗi gồm năm và tháng tạo được
	 *
	 */
	public function monthPlus($strYM,$intAmount)
	{
		$y = substr($strYM,0,2);
		$m = substr($strYM,2,2);
		if($intAmount>0)
		{
			if ($m+$intAmount>12)
			{
				$y = str_pad($y + 1,2,"0",STR_PAD_LEFT);
				$m = str_pad($m + $intAmount-12,2,"0");
			}
			else
			{
				$m = str_pad($m + $intAmount,2,"0",STR_PAD_LEFT);	
			}
		}
		else
		{
			if ($m+$intAmount>0)
			{
				$m = str_pad($m + $intAmount,2,"0",STR_PAD_LEFT);
			}
			else
			{
				$y = str_pad($y - 1,2,"0",STR_PAD_LEFT);
				$m = str_pad(12 + $m + $intAmount,2,"0");
			}
		}
		return $y.$m;
	}
	
	/**
	 * lấy ngày theo định dang "Y-m-d G:i:s"
	 *
	 * @return string ngày đã được định dạng lại
	 *
	 */
	public function getDateTime()
	{
		return date("Y-m-d G:i:s");
	} //**
	
	/**
	 * lấy ngày theo định dạng "Y-m-d G:i:s:u"
	 *
	 * @return string ngày đã được định dạng
	 *
	 */
	public function getFullDateTime()
	{
		return date("Y-m-d G:i:s:u");
	}
	
	// CLONE: DoNguyen [20100305] - TO user_box.php
	
	/**
	 * lấy ngày theo định dạng "Y-m-d"
	 *
	 * @return string ngày đã được định dạng
	 *
	 */
	public function getDate()
	{
		return date("Y-m-d");
	}
	
	/**
	 * Get micro time
	 *
	 * @return float Number of micro time
	 *
	 */
	public function getMicrotime()
	{
		list($usec, $sec) = explode(" ", microtime());
		return ((float)$usec + (float)$sec);
	}
	
	/**
	 * get message header
	 *
	 * @param int $banCode ban code
	 * @param int $ssExpire This is a description
	 * @return array message header
	 * @author TinhDoan added [20100524]
	 *
	 */
	public function getMessageHeaderArr($banCode,$ssExpire)
	{
		$arrHeader = array();
		// check ban user
		$arrHeader[0] = (empty($banCode))?0:$banCode;
		// check session expire
		if ($ssExpire!==null)
		{
			$arrHeader[1] = $ssExpire;
		}
		else
		{
			if (isset($_SESSION[self::SES_C_USERINFO]))
			{
				$arrHeader[1] = 0;
			}
			else
			{
				$arrHeader[1] = 1;
			}
		}
		// check spam code
		if ($_SESSION["SPAM_FAIL"]>5)
		{
			$arrHeader[2] = 1;
		}
		else
		{
			$arrHeader[2] = 0;
		}
		return $arrHeader;
	}
	
	/**
	 * thực hiện mã hóa một chuỗi của hellochao
	 *
	 * @param string $strSecString chuỗi cần mã hóa
	 * @param string $strKey key để mã hóa
	 * @return string chuỗi đã được mã hóa
	 *
	 */
	public function hc_encode($strSecString,$strKey='')
	{
		//Chuyen so thanh chuoi!
		$strSecString.='';
		if ($strKey==null)
		{
			if (strlen($strSecString)<=30)
			{
				$strKey = self::KEY_32;
			}
			elseif(strlen($strSecString)<=62)
			{
				$strKey = self::KEY_64;
			}
			elseif(strlen($strSecString)<=125)
			{
				$strKey = self::KEY_128;
			}
			elseif(strlen($strSecString)<=253)
			{
				$strKey = self::KEY_256;
			}
		}
		$arrCharsMD5 = self::getCharsMD5();
		$strHce1 = ""; 
		$secLen = strlen($strSecString);
		$arrKey = explode(" ",$strKey);
		$inc=3;
		if (count($arrKey)==32 )
		{
			for ($i=$secLen-1;$i>=$secLen-1;$i--)
			{		
				if(array_key_exists($strSecString[$i],$arrCharsMD5))
				{		
					$strHce1 .= $arrCharsMD5[$strSecString[$i]];
				}
				else
				{
					$strHce1 .= md5($strSecString[$i]);
				}
			}
			if (strlen($secLen)==1) 
			{
				$secLen = "0".$secLen;
			}
		}
		elseif (count($arrKey)==64)
		{
			if (substr($strSecString,0,3)!=self::PREFIX_SID)
			{
				$inc=0;
				
			}
			
			for ($i=$secLen-1;$i>=$secLen-2;$i--)
			{			
				if(array_key_exists($strSecString[$i],$arrCharsMD5))
				{	
					$strHce1 .= $arrCharsMD5[$strSecString[$i]];
				}
				else
				{
					$strHce1 .= md5($strSecString[$i]);
				}
			}
			if (strlen($secLen)==1)
			{
				$secLen = "0".$secLen;
			}
		}
		elseif (count($arrKey)==128)
		{
			for ($i=$secLen-1;$i>=$secLen-4;$i--)
			{				
				if(array_key_exists($strSecString[$i],$arrCharsMD5))
				{
					$strHce1 .= $arrCharsMD5[$strSecString[$i]];
				}
				else
				{
					$strHce1 .= md5($strSecString[$i]);
				}
			}
			if (strlen($secLen)==1)
			{
				$secLen = "00".$secLen;
			}
			elseif (strlen($secLen)==2)
			{
				$secLen = "0".$secLen;
			}
		}
		elseif (count($arrKey)==256)
		{
			for ($i=$secLen-1;$i>=$secLen-8;$i--)
			{
				if(array_key_exists($strSecString[$i],$arrCharsMD5))
				{
					$strHce1 .= $arrCharsMD5[$strSecString[$i]];
				}
				else
				{
					$strHce1 .= md5($strSecString[$i]);
				}
			}
			if (strlen($secLen)==1)
			{
				$secLen = "00".$secLen;
			}
			elseif (strlen($secLen)==2)
			{
				$secLen = "0".$secLen;
			}
		}
		
		$strHce2 = $strHce1;
		// Merge Code
		for($i=0;$i<strlen($strSecString);$i++)
		{
			$strHce2[$arrKey[$i]] = $strSecString[$i];
		}
		// Merge String Len
		$secStrLen="";
		$arrCrypt_N = self::getCRYPT_N();
		for ($i=0;$i<strlen($secLen);$i++)		
		{	
			$testChar = self::genSecChar(substr($secLen,$i,1),$arrCrypt_N);
			$secStrLen .= $testChar;
		}
		$strHce2  = substr($strHce2,0,strlen($strHce2)-strlen($secLen)).$secStrLen;
		// upset string
		//return self::upsetString($strHce2);
		return $strHce2;
	}
	
	/**
	 * thực hiện giãi mã một chuỗi của hellochao
	 *
	 * @param string $strEncodeString chuỗi cần giãi mã
	 * @param string $strKey key để giải mã
	 * @return string chuỗi đã được giãi mã
	 *
	 */
	public function hc_decode($strEncodeString,$strKey='')
	{
		// deUpset string
		$str = $strEncodeString;
		if ($strKey==null)
		{
			if (strlen($strEncodeString)==32)
			{
				$strKey = self::KEY_32;	
			}
			elseif(strlen($strEncodeString)==64)
			{
				$strKey = self::KEY_64;	
			}
			elseif(strlen($strEncodeString)==128)
			{
				$strKey = self::KEY_128;	
			}
			elseif(strlen($strEncodeString)==256)
			{
				$strKey = self::KEY_256;	
			}
		}
		//$str = self::deUpsetString($strEncodeString);
		//
		$arrKey = explode(" ",$strKey);		
		// get string lens
		$strlen="";
		$intStringlen;
		if 	(count($arrKey)==32 || count($arrKey)==64)
		{
			$intStringlen = 2;
		}
		elseif (count($arrKey)==128 || count($arrKey)==256)
		{
			$intStringlen = 3;
		}
		$arrCrypt_N = self::getCRYPT_N();
		for ($intlen=strlen($str)-$intStringlen;$intlen<strlen($str);$intlen++)
		{
			$strlen .= self::getSecChar($str[$intlen],$arrCrypt_N);
		}
		// get string by keys
		$hcd1="";
		for ($i=0;$i<(int)$strlen;$i++)
		{
			$hcd1 .=  $str[$arrKey[$i]];
		}
		$strReEncode = self::hc_encode($hcd1);
		if (substr($strEncodeString,0,strlen($strEncodeString)-$intStringlen)==substr($strReEncode,0,strlen($strReEncode)-$intStringlen))
		{
			return $hcd1;
		}
		return "";
	}	
	
	/**
	 * Phương thức tách các giá trị ngày tháng năm giờ phút giây từ chuỗi có định dạng date("Y-m-d G:i:s");
	 *
	 * @param string $strDateTime Chuỗi ngày tháng năm giờ phút giây
	 * @return array Mảng chứ các giá trị riêng biệt ngày tháng năm giờ phút giây
	 * @author ThanhViet [20110217]
	 *
	 */
	function splitDateTime($strDateTime)
	{
		// date("y-m-d h:i:s");
		$arrNow = explode(" ",$strDateTime);
		
		$strDate= $arrNow[0];
		$arrDate= explode("-",$strDate);
		
		$strTime=$arrNow[1];
		$arrTime=explode(":",$strTime);
		$arrResult = array();
		$arrResult["y"] = $arrDate[0];
		$arrResult["m"] = $arrDate[1];
		$arrResult["d"] = $arrDate[2];
		
		$arrResult["h"] = $arrTime[0];
		$arrResult["i"] = $arrTime[1];
		$arrResult["s"] = $arrTime[2];
		return $arrResult;
	}
	
	/**
	 * Tính toán số lượng ngày tháng năm giờ phút giây với số ngày tháng năm giờ phút giây cho trước
	 *
	 * @param string $strDateTime Chuoi chứa giá trị ngày tháng năm giờ phút giây
	 * @param string $type Loại giá trị cần trả về. ex:"years" ,"months" , "days" ,"hours" ,"minutes" ,"seconds"
	 * @return int Giá trị trả về tương ứng với type
	 * @author ThanhViet [20110326]
	 *
	 */
	public function calculateDateTime($strDateTime,$type) 
	{
		$arrDateTime = self::splitDateTime($strDateTime);
		switch($type) 
		{
			case 'years':
				return $arrDateTime['y'];
			case 'months':
				return $arrDateTime['y']*12 + $arrDateTime['m'];
			case 'days':
				return ($arrDateTime['y']*12 + $arrDateTime['m'])*30 + $arrDateTime['d'];
			case 'hours':
				return (($arrDateTime['y']*12 + $arrDateTime['m'])*30 + $arrDateTime['d'])*24 + $arrDateTime['h'];
			case 'minutes':
				return ((($arrDateTime['y']*12 + $arrDateTime['m'])*30 + $arrDateTime['d'])*24 + $arrDateTime['h'])*60+$arrDateTime['i'];
			case 'seconds':
				return (((($arrDateTime['y']*12 + $arrDateTime['m'])*30 + $arrDateTime['d'])*24 + $arrDateTime['h'])*60+$arrDateTime['i'])*60+$arrDateTime['s'];
		}
	}
	
	
	/**
	 * Tính thời gian còn lại giữa 2 ngày với kiểu type cho trước
	 *
	 * @param string $start chuỗi ngày bắt đầu
	 * @param string $end chuỗi này cuối
	 * @param string $type Loại giá trị cần trả về. ex:"years" ,"months" , "days" ,"hours" ,"minutes" ,"seconds"
	 * @return int Giá trị trả về tương ứng với type
	 * @author ThanhViet added [20110326]
	 *
	 */
	function timeDifference($start,$end,$type='days') {
		//change times to Unix timestamp.
		$start = strtotime($start);
		$end = strtotime($end);
		//echo "<br>Start: ". $start."<br>";
		//echo "<br>End: ".$end."<br>";
		if($start > $end) {
			return 'Please make sure the start date is less than the end date.';
		}
		//subtract dates
		$difference = $end - $start;
		
		$time = "";
		//calculate time difference.
		switch($type) {
			case 'days':
				$days = floor($difference/86400);
				return $days;
			case 'hours':
				$hours = floor($difference/3600);
				return $hours;
			case 'minutes':
				$minutes = floor($difference/60);
				return $minutes;
			case 'seconds':
				$seconds = $difference;
				return $seconds;
		}
	}
	/**
	 * Hàm cắt chuỗi với nhiều delimiter
	 *
	 * @param array $delimiters Array chứa các delimiter
	 * @param string $string Chuỗi cần cắt
	 * @return array array sau khi đã cắt
	 * @author ThanhViet [20110121]
	 */
	function explodeX($delimiters,$string)
	{
		$return_array = Array($string); // The array to return
		$d_count = 0;
		while (isset($delimiters[$d_count])) // Loop to loop through all delimiters
		{
			$new_return_array = Array();
			foreach($return_array as $el_to_split) // Explode all returned elements by the next delimiter
			{
				$put_in_new_return_array = explode($delimiters[$d_count],$el_to_split);
				foreach($put_in_new_return_array as $substr) // Put all the exploded elements in array to return
				{
					if($substr)
					{
						$new_return_array[] = $substr;
					}
				}
			}
			$return_array = $new_return_array; // Replace the previous return array by the next version
			$d_count++;
		}
		return $return_array; // Return the exploded elements
	}
	/**
	 *Hàm Convert from UTF8 to Ascii
	 *
	 * @param string $str Chuỗi cần convert sang ASCII
	 * @return string Chuỗi sau khi đã convert
	 * @author ThanhViet [20110121]
	 */
	public function utf8_to_ascii($str)
	{
		if(!$str) return false;
		$unicode = array(
				'a' => 'A|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ|á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
				'b' =>  'B',
				'c' =>  'C',
				'd' => 'D|Đ|đ',
				'e' => 'E|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ|é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
				'f' => 'F',
				'g' => 'G',
				'h' => 'H',
				'i' => 'I|Í|Ì|Ỉ|Ĩ|Ị|í|ì|ỉ|ĩ|ị',
				'j' => 'J',
				'k' => 'K',
				'l' => 'L',
				'm' => 'M',
				'n' => 'N',
				'o' => 'O|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ|ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
				'p' => 'P',
				'q' => 'Q',
				'r' => 'R',
				's' => 'S',
				't' => 'T',
				'u' => 'U|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự|ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
				'v' => 'V',
				'w' => 'W',
				'x' => 'X',
				'y' => 'Y|Ý|Ỳ|Ỷ|Ỹ|Ỵ|ý|ỳ|ỷ|ỹ|ỵ',
				'z' => 'Z');
		foreach($unicode as $nonUnicode=>$uni) 
		{
			$str = preg_replace('/('.$uni.')/i',$nonUnicode,$str);
		}
		return $str;
	}
	/**
	 * Kiểm tra chuối đưa vào có phải là chuỗi unicode ko?
	 *
	 * @param string $string Chuối input
	 * @return int 1->là unicode ; 0-> không là unicode
	 *
	 */
	public function checkUnicodeString($string) 
	{
		if (strlen($string) != strlen(utf8_decode($string)))
		{
			return 1;
		}
		else
		{
			return 0;	
		}
		
	}
	
	/**
	 * Kiểm tra xem strValue có giá trị hay không. Một chuỗi nhiều khoảng trắng cũng xem là rỗng.
	 *
	 * @param string $strValue Giá trị cần kiểm tra
	 * @return bool true: không có giá trị, false: có giá trị
	 * @author DoNguyen added [20100811]
	 */
	public function isNulOrEmpty($strValue)
	{
		return (!isset($strValue) || trim($strValue)==='');
	}
	
	/**
	 *Phương thức phần trang giống kết quả search
	 *
	 * @param int $intCurrPage Trang hiện tại
	 * @param int $intResultsInOnePage Number row in page
	 * @param int $intTotalResult Tổng kết quả
	 * @param string $jsFuncName Phương thức javascript change page
	 * @return string Chuỗi output HTML
	 *
	 */
	public function getPagingHTMLByNum2($intCurrPage, $intResultsInOnePage,$intTotalResult, $jsFuncName)
	{
		/*if ($this->_intCountRecords<=self::NUM_RESULT_PER_PAGE*5)
		{
			$intTotalResult = $this->_intCountRecords;
		}
		else
		{
			$intTotalResult = self::NUM_RESULT_PER_PAGE*5;
		}*/
		
		//$intMaxPages = ceil($intTotalResult/$intResultsInOnePage);
		$strPages = "";
		$i = $intCurrPage;	
		//$end = floor(($intCurrPage + $intMaxPages) / $intMaxPages)*$intMaxPages + 1;
		$intTotalPage = ceil($intTotalResult / $intResultsInOnePage);
		self::writeLog('totel paging search:'.$intTotalPage,0,$_mainFrame->pName);
		
		//nếu chưa đăng nhập thì chỉ hiển thị một kết quả thôi
		/*if (!$_SESSION[self::SES_C_USERINFO])
		{
			$intTotalPage = 1;	
		}
		else*/
		{
			$intTotalPage = $intTotalPage>2?2:$intTotalPage;
		}
		self::writeLog('totel paging search:'.$intTotalPage,0,$_mainFrame->pName);
		
		// Only has one page
		if($intTotalPage <= 1)
		{
			return "";
		}
		self::writeLog('totel paging search:'.$intTotalPage,0,$_mainFrame->pName);
		
		// get max page number
		if($intCurrPage < $intTotalPage)
		{
			$i = 1;
		}
		else
		{
			//$i = floor(($intCurrPage + $intMaxPages) / $intMaxPages)*$intMaxPages - $intMaxPages;
			$i = floor(($intCurrPage + $intTotalPage) / $intTotalPage)*$intTotalPage - $intTotalPage;
			
		}
		
		// previous
		if($intCurrPage > 1)
		{
			$strPages.= '<a class="m_link" href="javascript:'.$jsFuncName.'(('.$intCurrPage.' - 1),2);" >Trước</a>&nbsp;&nbsp;';
		}
		
		// page number
		//while($i < $end && ($i - 1) * $intResultsInOnePage < $intTotalResult)
		while($i <= $intTotalPage && ($i - 1) * $intResultsInOnePage < $intTotalResult)
		{
			if($intCurrPage == $i)
			{
				$strPages.= "" . $i. "&nbsp;&nbsp;";
			}
			else
			{
				$strPages.=  '<a class="m_link" href="javascript:'.$jsFuncName.'('. $i .',2);" >'. $i .'</a> &nbsp;&nbsp;';
			}
			
			$i++;
		}
		
		// next
		if($intCurrPage < ceil($intTotalResult / $intResultsInOnePage))
		{
			$strPages.= '<a class="m_link" href="javascript:'.$jsFuncName.'(('.$intCurrPage.' + 1),2);" >Tiếp</a>&nbsp;&nbsp;';
		}
		
		return $strPages;
	}
	
	/**
	 * Get string HTML paging  1,2,3,4...
	 *
	 * @param int $intCurrPage current page
	 * @param int $intResultsInOnePage number row in page
	 * @param int $intTotalResult total row
	 * @return string HTML	
	 * @author TinhDoan edited [20100427]
	 * 
	 */
	public function getPagingHTMLByNum($intCurrPage, $intResultsInOnePage, $intTotalResult, $jsFuncName)
	{
		if ($intTotalResult<=$intResultsInOnePage)
			return "";
		$strPages = "\n<b>Page &nbsp;&nbsp;</b>";
		$i = $intCurrPage;	
		$intMaxPages = ceil($intTotalResult/$intResultsInOnePage);
		
		// previous
		if($intCurrPage > 1)
		{
			$strPages.= "<a href='javascript:$jsFuncName(1);' >First</a>" . "&nbsp;&nbsp;&nbsp;&nbsp;";
			$strPages.= "<a href='javascript:$jsFuncName(". ($intCurrPage - 1) .");' >Prev</a>" . "&nbsp;&nbsp;";
		}
		else
		{
			$strPages.= "\nFirst &nbsp;&nbsp; Prev &nbsp;&nbsp;";
		}
		//page
		$strPages.= "<select id=\"txtCurrPage\" name=\"txtCurrPage\" onchange=\"$jsFuncName(this.value);\" style=\"width:50px; margin-left:20px;\"> ";
		$i = 1;
		while($i <= $intMaxPages && ($i - 1) * $intResultsInOnePage < $intTotalResult)
		{				
			if($intCurrPage == $i)
			{
				$strPages.= "<option value=\"$i\" selected=\"selected\">".$i."</option>";
			}
			else
			{
				$strPages.= "<option value=\"$i\">".$i."</option>";
			}
			
			$i++;
		}
		$strPages.= "</select> &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;";
		//last
		if($intCurrPage < $intMaxPages)
		{
			$strPages.= "<a href='javascript:$jsFuncName(".($intCurrPage + 1).");' >Next</a>" . "&nbsp;&nbsp;&nbsp;&nbsp;";
			$strPages.= "<a href='javascript:$jsFuncName(".$intMaxPages.");' >Last</a>" . "&nbsp;&nbsp;";
		}
		else
		{
			$strPages.= "Next &nbsp;&nbsp; Last &nbsp;&nbsp;";
		}
		/*
		$strPages.= "<b> Of Total Page: $intMaxPages &nbsp;&nbsp;Start Row: ";
		$strPages.= ((($intCurrPage-1)*$intResultsInOnePage)+1)."&nbsp;====>&nbsp;";
		$strPages.= (($intCurrPage*$intResultsInOnePage)>$intTotalResult)?$intTotalResult:($intCurrPage*$intResultsInOnePage);
		$strPages.= " Of Total Row: $intTotalResult</b>";
		*/
		return $strPages;
	}
	public function getPagingHTMLByNumWithType($intCurrPage, $intResultsInOnePage, $intTotalResult, $jsFuncName,$object_id,$type)
	{
		if ($intTotalResult<=$intResultsInOnePage)
			return "";
		$strPages = "\n<b>Page &nbsp;&nbsp;</b>";
		$i = $intCurrPage;	
		$intMaxPages = ceil($intTotalResult/$intResultsInOnePage);
		
		// previous
		if($intCurrPage > 1)
		{
			$strPages.= "<a href=\"javascript:$jsFuncName(1,'".$object_id."',".$type.");\" >First</a>" . "&nbsp;&nbsp;&nbsp;&nbsp;";
			$strPages.= "<a href=\"javascript:$jsFuncName(". ($intCurrPage - 1) .",'".$object_id."',".$type.");\" >Prev</a>" . "&nbsp;&nbsp;";
		}
		else
		{
			$strPages.= "\nFirst &nbsp;&nbsp; Prev &nbsp;&nbsp;";
		}
		//page
		$strPages.= "<select id=\"txtCurrPage\" name=\"txtCurrPage\" onchange=\"$jsFuncName(this.value,'".$object_id."',".$type.");\" style=\"width:50px; margin-left:20px;\"> ";
		$i = 1;
		while($i <= $intMaxPages && ($i - 1) * $intResultsInOnePage < $intTotalResult)
		{				
			if($intCurrPage == $i)
			{
				$strPages.= "<option value=\"$i\" selected=\"selected\">".$i."</option>";
			}
			else
			{
				$strPages.= "<option value=\"$i\">".$i."</option>";
			}
			
			$i++;
		}
		$strPages.= "</select> &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;";
		//last
		if($intCurrPage < $intMaxPages)
		{
			$strPages.= "<a href=\"javascript:$jsFuncName(".($intCurrPage + 1).",'".$object_id."',".$type.");\" >Next</a>" . "&nbsp;&nbsp;&nbsp;&nbsp;";
			$strPages.= "<a href=\"javascript:$jsFuncName(".$intMaxPages.",'".$object_id."',".$type.");\" >Last</a>" . "&nbsp;&nbsp;";
		}
		else
		{
			$strPages.= "Next &nbsp;&nbsp; Last &nbsp;&nbsp;";
		}
		/*
		$strPages.= "<b> Of Total Page: $intMaxPages &nbsp;&nbsp;Start Row: ";
		$strPages.= ((($intCurrPage-1)*$intResultsInOnePage)+1)."&nbsp;====>&nbsp;";
		$strPages.= (($intCurrPage*$intResultsInOnePage)>$intTotalResult)?$intTotalResult:($intCurrPage*$intResultsInOnePage);
		$strPages.= " Of Total Row: $intTotalResult</b>";
		*/
		return $strPages;
	}
	/**
	 * Phương thức phần trang chỉ có next,prev and first
	 *
	 * @param int $intCurrPage Trang hiên tại
	 * @param string $jsFuncName Hàm phần trang bằng js
	 * @return string ouput HTML
	 *
	 */
	public function getPagingHTMLByNoNum($intCurrPage, $jsFuncName)
	{
		$strPages = "<a class=\"m_link\" href=\"javascript:$jsFuncName(1);\" >Đầu Tiên</a>" . "&nbsp;&nbsp;|&nbsp;&nbsp;";
		$strPages.= "<a class=\"m_link\" href=\"javascript:$jsFuncName(".($intCurrPage>1?($intCurrPage-1):1).");\" >Trước</a>" . "&nbsp;&nbsp;|&nbsp;&nbsp;";
		$strPages.= "<a class=\"m_link\" href=\"javascript:$jsFuncName(".($intCurrPage+1).");\" >Tiếp</a>";
		return $strPages;
	}
	
	/**
	 * So sánh 2 chuỗi ngày. -1: $date1 < $date2; 0: $date1 == $date2; 1: $date1 > $date2
	 *
	 * @param string $date1 Chuỗi ngày thứ 1
	 * @param string $date2 Chuỗi ngày thứ 2
	 * @return int Giá trị cho biết kết quả so sánh
	 * @author DoNguyen added [20100812]
	 */
	public function dateComparison($date1, $date2)
	{
		$datetime1=strtotime($date1);
		$datetime2=strtotime($date2);
		$dateDiff = $datetime1 - $datetime2;
		if ($dateDiff == 0)
		{
			return $dateDiff;
		}else{
			return ($dateDiff < 0) ? -1 : 1;
		}
	}
	
	/**
	 * thực thi một câu sql nếu table chưa tồn tại thì tạo table và thực thi lại câu sql
	 *
	 * @param string $strExecuteQuery câu sql muốn thực thi
	 * @param string $strCommand câu lệnh tạo table
	 * @param object $objConnection connect to db
	 * @param string $strCheckTable tên của table
	 * @return bool true thành công, false thất bại
	 *
	 */
	public function ExecutequeryWithCheckExistedTable($strExecuteQuery,$strCommand,$objConnection,$strCheckTable)
	{
		if(!$strExecuteQuery)
		{
			return false;
		}
		// Execute query
		$result1 = $objConnection->executeSQL($strExecuteQuery);
		if ( $result1 == -1)
		{
			$errorCode = $objConnection->getErrorCode();
			if ($errorCode==global_common::ERR_TABLE_NOT_EXIST || $errorCode==global_common::ERR_TABLE_UNKNOWN 
			|| $errorCode==global_common::ERR_INSERT_DUPLICATED || !global_common::isTableExisted($objConnection,$strCheckTable))
			{
				$strCreateTable = global_common::prepareQuery($strCommand,array($strCheckTable));
				if($objConnection->executeSQL($strCreateTable) == -1)
				{
					return false;
				}
				if($objConnection->executeSQL($strExecuteQuery) == -1)
				{
					return false;
				}
			}
			else
			{
				return false;
			}
		}
		return true;
	}
	
	/**
	 * thực thi nhiều câu sql nếu table chưa tồn tại thì tạo table và thực thi lại câu sql
	 *
	 * @param string $strExecuteQuery câu sql muốn thực thi
	 * @param string $strCommand câu lệnh tạo table
	 * @param object $objConnection connect to db
	 * @param string $strCheckTable tên của table
	 * @return bool true thành công, false thất bại
	 *
	 */
	public function ExecuteMultiqueryWithCheckExistedTable($strExecuteQuery,$strCommand,$objConnection,$strCheckTable)
	{
		if(!$strExecuteQuery)
		{
			return false;
		}
		// Execute query
		$result1 = $objConnection->executeMultiSQL($strExecuteQuery);
		if ( $result1 == -1)
		{
			$errorCode = $objConnection->getErrorCode();
			if ($errorCode==self::ERR_TABLE_NOT_EXIST || $errorCode==self::ERR_TABLE_UNKNOWN || !self::isTableExisted($objConnection,$strCheckTable))
			{
				$strCreateTable = self::prepareQuery($strCommand,array($strCheckTable));
				if($objConnection->executeSQL($strCreateTable) == -1)
				{
					return false;
				}
				if($objConnection->executeMultiSQL($strExecuteQuery) == -1)
				{
					return false;
				}
			}
			else
			{
				return false;
			}
		}
		return true;
	}
	
	/**
	 * thực thi một câu sql nếu table chưa tồn tại thì tạo table và thực thi lại câu sql
	 *
	 * @param string $strExecuteQuery câu sql muốn thực thi
	 * @param string $strCommand câu lệnh tạo table
	 * @param object $objConnection connect to db
	 * @param string $strCheckTable tên của table
	 * @param int $startID số id auto incrment bắt đầu của table
	 * @return bool true thành công, false thất bại
	 * @author ThanhViet added [20110211]
	 *
	 */
	public function ExecutequeryWithCheckExistedTableAutoIncrement($strExecuteQuery,$strCommand,$objConnection,$strCheckTable,$startID)
	{
		// Execute query
		$result1 = $objConnection->executeMultiSQL($strExecuteQuery);
		if ( $result1 == false)
		{
			$errorCode = $objConnection->getErrorCode();
			if ($errorCode==self::ERR_TABLE_NOT_EXIST || $errorCode==self::ERR_TABLE_UNKNOWN || !self::isTableExisted($objConnection,$strCheckTable))
			{
				$strCreateTable = self::prepareQuery($strCommand,array($strCheckTable,$startID));
				if($objConnection->executeSQL($strCreateTable) == -1)
				{
					return false;
				}
				if($objConnection->executeMultiSQL($strExecuteQuery) == -1)
				{
					return false;
				}
			}
			else
			{
				return false;
			}
		}
		return true;
	}
	
	/**
	 * convert arrays to object xml
	 *
	 * @param array $arrHeader array header
	 * @param array $arrKey array key for array value
	 * @param array $arrValue array value for array key
	 * @param array $arrIsMetaData array meta data for array value
	 * @return array array values
	 * @author TinhDoan added [20100522]
	 *
	 */
	public function convertToXML($arrHeader, $arrKey, $arrValue, $arrIsMetaData)
	{
		$domDoc = new DOMDocument;
		$rootElt = $domDoc->createElement('r');
		$rootNode = $domDoc->appendChild($rootElt);
		
		$subElt = $domDoc->createElement('h');
		$intCount = count($arrHeader);
		$subNode = $rootNode->appendChild($subElt);
		for ($i = 1; $i<=$intCount; $i++)
		{
			$node = $domDoc->createElement("h$i");
			$textNode = $domDoc->createTextNode($arrHeader[$i-1]);
			$node->appendChild($textNode);
			$subNode->appendChild($node);
		}
		
		$subElt = $domDoc->createElement('c');
		$intCount = count($arrKey);
		$subNode = $rootNode->appendChild($subElt);
		for ($i = 0; $i<$intCount; $i++)
		{
			$node = $domDoc->createElement($arrKey[$i]);
			if ($arrIsMetaData[$i] == 1)
			{
				$textNode = $domDoc->createCDATASection($arrValue[$i]);
			}
			else
			{
				$textNode = $domDoc->createTextNode($arrValue[$i]);
			}
			$node->appendChild($textNode);
			$subNode->appendChild($node);
		}
		return $domDoc->saveXML();
	}
	
	/**
	 * encode array of ids
	 *
	 * @param array : List of id
	 * @param string : separate
	 * @return string encode
	 * @author DaoNguyen Added [20100619]
	 *
	 */
	public function encodeArrayID($arrListId, $sepChar="|")
	{
		$strEncode="";
		foreach($arrListId as $item)
		{
			$strEncode .= $item.$sepChar;
		}
		$strEncode = self::cutLast($strEncode);
		return self::hc_encode($strEncode);
	}
	
	/**
	 * encode array of ids
	 *
	 * @param string : encode string
	 * @param string : separate
	 * @return array : list id
	 * @author DaoNguyen Added [20100619]
	 *
	 */
	public function decodeArrayID($strEncode, $sepChar="|")
	{
		$strDecode = self::hc_decode($strEncode);
		$arrList = explode($sepChar, $strDecode);
		return $arrList;
	}
	/**
	 * lấy con số id lớn nhất tiếp theo của một bảng
	 *
	 * @param string $strTableName tên bảng
	 * @param int $intReserveId This is a description
	 * @param object $readonly nếu được truyền và true thì chỉ đọc lên rồi trả về, ngược lại thì tăng lên 1
	 * @return int id lớn nhất
	 *	@@author PhongHong edited[20110426]
	 */
	
	public function getMaxID($strTableName, $intReserveId=1, $readonly)
	{
		$strFileName = self::FOLDER_FILES_MAXID.$strTableName;
		
		if(!file_exists($strFileName.'.app'))
		{
			// file not exist
			$arrResult = 0;
			$result = Application::setVar($strFileName, $arrResult);
			if ($result == false)
			{
				return false;	
			}
		}
		$arrResult = Application::getVar($strFileName);
		if ($readonly)
		{
			return $arrResult;	
		}
		$firstId = $arrResult+1;
		
		$iswrite = Application::setVar($strFileName,$firstId);
		if($iswrite)
		{
			return $firstId;
		}
		
		return false;
		
	}
	public function getCharsMD5()
	{
		$arrMD5 = array(" " =>"7215ee9c7d9dc229d2921a40e899ec5f",
				"!" =>"9033e0e305f247c0c3c80d0c7848c8b3",
				"\""=>"b15835f133ff2e27c7cb28117bfae8f4",
				"%" =>"0bcef9c45bd8a48eda1b26eb0c61c869",
				"&" =>"6cff047854f19ac2aa52aac51bf3af4a",
				"'" =>"3590cb8af0bbb9e78c343b52b93773c9",
				"(" =>"84c40473414caf2ed4a7b1283e48bbf4",
				")" =>"9371d7a2e3ae86a00aab4771e39d255d",
				"*" =>"3389dae361af79b04c9c8e7057f60cc6",
				"+" =>"26b17225b626fb9238849fd60eabdf60",
				"," =>"c0cb5f0fcf239ab3d9c1fcd31fff1efc",
				"-" =>"336d5ebc5436534e61d16e63ddfca327",
				"." =>"5058f1af8388633f609cadb75a75dc9d",
				"/" =>"6666cd76f96956469e7be39d750cc7d9",
				"0" =>"cfcd208495d565ef66e7dff9f98764da",
				"1" =>"c4ca4238a0b923820dcc509a6f75849b",
				"2" =>"c81e728d9d4c2f636f067f89cc14862c",
				"3" =>"eccbc87e4b5ce2fe28308fd9f2a7baf3",
				"4" =>"a87ff679a2f3e71d9181a67b7542122c",
				"5" =>"e4da3b7fbbce2345d7772b0674a318d5",
				"6" =>"1679091c5a880faf6fb5e6087eb1b2dc",
				"7" =>"8f14e45fceea167a5a36dedd4bea2543",
				"8" =>"c9f0f895fb98ab9159f51fd0297e236d",
				"9" =>"45c48cce2e2d7fbdea1afc51c7c6ad26",
				":" =>"853ae90f0351324bd73ea615e6487517",
				";" =>"9eecb7db59d16c80417c72d1e1f4fbf1",
				"<" =>"524a50782178998021a88b8cd4c8dcd8",
				"=" =>"43ec3e5dee6e706af7766fffea512721",
				">" =>"cedf8da05466bb54708268b3c694a78f",
				"?" =>"d1457b72c3fb323a2671125aef3eab5d",
				"@" =>"518ed29525738cebdac49c49e60ea9d3",
				"A" =>"7fc56270e7a70fa81a5935b72eacbe29",
				"B" =>"9d5ed678fe57bcca610140957afab571",
				"C" =>"0d61f8370cad1d412f80b84d143e1257",
				"D" =>"f623e75af30e62bbd73d6df5b50bb7b5",
				"E" =>"3a3ea00cfc35332cedf6e5e9a32e94da",
				"F" =>"800618943025315f869e4e1f09471012",
				"G" =>"dfcf28d0734569a6a693bc8194de62bf",
				"H" =>"c1d9f50f86825a1a2302ec2449c17196",
				"I" =>"dd7536794b63bf90eccfd37f9b147d7f",
				"J" =>"ff44570aca8241914870afbc310cdb85",
				"K" =>"a5f3c6a11b03839d46af9fb43c97c188",
				"L" =>"d20caec3b48a1eef164cb4ca81ba2587",
				"M" =>"69691c7bdcc3ce6d5d8a1361f22d04ac",
				"N" =>"8d9c307cb7f3c4a32822a51922d1ceaa",
				"O" =>"f186217753c37b9b9f958d906208506e",
				"P" =>"44c29edb103a2872f519ad0c9a0fdaaa",
				"Q" =>"f09564c9ca56850d4cd6b3319e541aee",
				"R" =>"e1e1d3d40573127e9ee0480caf1283d6",
				"S" =>"5dbc98dcc983a70728bd082d1a47546e",
				"T" =>"b9ece18c950afbfa6b0fdbfa4ff731d3",
				"U" =>"4c614360da93c0a041b22e537de151eb",
				"V" =>"5206560a306a2e085a437fd258eb57ce",
				"W" =>"61e9c06ea9a85a5088a499df6458d276",
				"X" =>"02129bb861061d1a052c592e2dc6b383",
				"Y" =>"57cec4137b614c87cb4e24a3d003a3e0",
				"Z" =>"21c2e59531c8710156d34a3c30ac81d5",
				"[" =>"815417267f76f6f460a4a61f9db75fdb",
				"\\"=>"28d397e87306b8631f3ed80d858d35f0",
				"]" =>"0fbd1776e1ad22c59a7080d35c7fd4db",
				"^" =>"7e6a2afe551e067a75fafacf47a6d981",
				"_" =>"b14a7b8059d9c055954c92674ce60032",
				"`" =>"833344d5e1432da82ef02e1301477ce8",
				"a" =>"0cc175b9c0f1b6a831c399e269772661",
				"b" =>"92eb5ffee6ae2fec3ad71c777531578f",
				"c" =>"4a8a08f09d37b73795649038408b5f33",
				"d" =>"8277e0910d750195b448797616e091ad",
				"e" =>"e1671797c52e15f763380b45e841ec32",
				"f" =>"8fa14cdd754f91cc6554c9e71929cce7",
				"g" =>"b2f5ff47436671b6e533d8dc3614845d",
				"h" =>"2510c39011c5be704182423e3a695e91",
				"i" =>"865c0c0b4ab0e063e5caa3387c1a8741",
				"j" =>"363b122c528f54df4a0446b6bab05515",
				"k" =>"8ce4b16b22b58894aa86c421e8759df3",
				"l" =>"2db95e8e1a9267b7a1188556b2013b33",
				"m" =>"6f8f57715090da2632453988d9a1501b",
				"n" =>"7b8b965ad4bca0e41ab51de7b31363a1",
				"o" =>"d95679752134a2d9eb61dbd7b91c4bcc",
				"p" =>"83878c91171338902e0fe0fb97a8c47a",
				"q" =>"7694f4a66316e53c8cdd9d9954bd611d",
				"r" =>"4b43b0aee35624cd95b910189b3dc231",
				"s" =>"03c7c0ace395d80182db07ae2c30f034",
				"t" =>"e358efa489f58062f10dd7316b65649e",
				"u" =>"7b774effe4a349c6dd82ad4f4f21d34c",
				"v" =>"9e3669d19b675bd57058fd4664205d2a",
				"w" =>"f1290186a5d0b1ceab27f4e77c0c5d68",
				"x" =>"9dd4e461268c8034f5c8564e155c67a6",
				"y" =>"415290769594460e2e485922904f345d",
				"z" =>"fbade9e36a3f36d3d676c1b808451dd7",
				"{" =>"f95b70fdc3088560732a5ac135644506",
				"|" =>"b99834bc19bbad24580b3adfa04fb947",
				"}" =>"cbb184dd8e05c9709e5dcaedaa0495cf",
				"~" =>"4c761f170e016836ff84498202b99827");
		return $arrMD5;
	}
	
	/**
	 * Lay ve mot mang de tim ky tu Latin tu ky tu Unicode
	 * 
	 * @return array
	 * @author DoNguyen added [20100722]
	 * 
	 */
	public function getArrayUnicodeToLatin()
	{
		return array("á"=>"a","à"=>"a","â"=>"a","ă"=>"a","ã"=>"a","ấ"=>"a","ầ"=>"a","ắ"=>"a","ằ"=>"a","ẫ"=>"a","ẵ"=>"a",
				"ả"=>"a","ẩ"=>"a","ẳ"=>"a","ạ"=>"a","ậ"=>"a","ặ"=>"a",
				"é"=>"e","è"=>"e","ê"=>"e","ẽ"=>"e","ế"=>"e","ề"=>"e","ễ"=>"e","ẻ"=>"e","ể"=>"e","ẹ"=>"e","ệ"=>"e",
				"í"=>"i","ì"=>"i","ĩ"=>"i","ỉ"=>"i","ị"=>"i",
				"ó"=>"o","ò"=>"o","ô"=>"o","õ"=>"o","ố"=>"o","ồ"=>"o","ỗ"=>"o","ỏ"=>"o","ơ"=>"o","ổ"=>"o","ọ"=>"o",
				"ớ"=>"o","ờ"=>"o","ỡ"=>"o","ộ"=>"o","ở"=>"o","ợ"=>"o",
				"ú"=>"u","ù"=>"u","ũ"=>"u","ủ"=>"u","ư"=>"u","ụ"=>"u","ứ"=>"u","ừ"=>"u","ữ"=>"u","ử"=>"u","ự"=>"u",
				"ý"=>"y","ỳ"=>"y","ỹ"=>"y","ỷ"=>"y","ỵ"=>"y",
				"đ"=>"d");
	}
	
	public function getArrayUnicode()
	{
		return array("́"=>array("a"=>"á","ă"=>"ắ","â"=>"ấ","e"=>"é","ê"=>"ế","i"=>"í","o"=>"ó","ô"=>"ố","ơ"=>"ớ","u"=>"ú","ư"=>"ứ","y"=>"ý","A"=>"Á","Ă"=>"Ắ","Â"=>"Ấ","E"=>"É","Ê"=>"Ế","I"=>"Í","O"=>"Ó","Ô"=>"Ố","Ơ"=>"Ớ","U"=>"Ú","Ư"=>"Ứ","Y"=>"Ý"),
				"̀"=>array("a"=>"à","ă"=>"ằ","â"=>"ầ","e"=>"è","ê"=>"ề","i"=>"ì","o"=>"ò","ô"=>"ồ","ơ"=>"ờ","u"=>"ù","ư"=>"ừ","y"=>"ỳ","A"=>"À","Ă"=>"Ằ","Â"=>"Ầ","E"=>"È","Ê"=>"Ề","I"=>"Ì","O"=>"Ò","Ô"=>"Ồ","Ơ"=>"Ờ","U"=>"Ù","Ư"=>"Ừ","Y"=>"Ỳ"),
				"̉"=>array("a"=>"ả","ă"=>"ẳ","â"=>"ẩ","e"=>"ẻ","ê"=>"ể","i"=>"ỉ","o"=>"ỏ","ô"=>"ổ","ơ"=>"ở","u"=>"ủ","ư"=>"ử","y"=>"ỷ","A"=>"Ả","Ă"=>"Ẳ","Â"=>"Ẩ","E"=>"Ẻ","Ê"=>"Ể","I"=>"Ỉ","O"=>"Ỏ","Ô"=>"Ổ","Ơ"=>"Ở","U"=>"Ủ","Ư"=>"Ử","Y"=>"Ỷ"),
				"̃"=>array("a"=>"ã","ă"=>"ẵ","â"=>"ẫ","e"=>"ẽ","ê"=>"ễ","i"=>"ĩ","o"=>"õ","ô"=>"ỗ","ơ"=>"ỡ","u"=>"ũ","ư"=>"ữ","y"=>"ỹ","A"=>"Ã","Ă"=>"Ẵ","Â"=>"Ẫ","E"=>"Ẽ","Ê"=>"Ễ","I"=>"Ĩ","O"=>"Õ","Ô"=>"Ỗ","Ơ"=>"Ỡ","U"=>"Ũ","Ư"=>"Ữ","Y"=>"Ỹ"),
				"̣"=>array("a"=>"ạ","ă"=>"ặ","â"=>"ậ","e"=>"ẹ","ê"=>"ệ","i"=>"ị","o"=>"ọ","ô"=>"ộ","ơ"=>"ợ","u"=>"ụ","ư"=>"ự","y"=>"ỵ","A"=>"Ạ","Ă"=>"Ặ","Â"=>"Ậ","E"=>"Ẹ","Ê"=>"Ệ","I"=>"Ị","O"=>"Ọ","Ô"=>"Ộ","Ơ"=>"Ợ","U"=>"Ụ","Ư"=>"Ự","Y"=>"Ỵ")
				);
	}
	
	public function getExclusiveTop()
	{
		return array("b~396"=>array("b~396",279),"h~385"=>array("h~385",234),"h~383"=>array("h~383",262),"h~381"=>array("h~381",278),
				"k~377"=>array("k~377",217),"l~394"=>array("l~394",213),"l~392"=>array("l~392",299),"m~380"=>array("m~380",254),
				"p~382"=>array("p~382",223),"q~378"=>array("q~378",281),"q~379"=>array("q~379",334),"t~391"=>array("t~391",345),
				"t~388"=>array("t~388",240),"t~393"=>array("t~393",256),"t~389"=>array("t~389",233),"t~376"=>array("t~376",312),
				"v~395"=>array("v~395",276),"v~390"=>array("v~390",211),"y~384"=>array("y~384",290));
		//"k~9"=>array("k~9",70),"l~5"=>array("l~5",10),"n~10"=>array("n~10",790),"n~3"=>array("n~3",48));	
	}
	
	/**
	 * Lay ve constant tuy thuoc vao $recurrence de tien hanh thong ke trong bg_sta_request.php
	 *
	 * @param string $recurrence Loai recurrence
	 * @return array Chua mot mang cac thong so can thiet cho thong ke
	 *
	 */
	public function getStaRegRecurrence($recurrence)
	{
		switch(strtolower(trim($recurrence)))
		{
			case "5m":
				$sqlRecurrence = "5 minute";
				$minute = 5;
				$limitBan = 2.5;		// Gioi han so SECOND trung binh giua 2 request de quyet dinh BAN hay ko. Nen la boi so cua 60
				$limitWarning = 5;		// Gioi han so SECOND trung binh giua 2 request de quyet dinh bat WARNING. Nen la boi so cua 60
				$limitRecord = 2000;	// Gioi han so luong record de lay ve trong cau SQL truoc khi thong ke de tang performance
				break;
			case "15m":
				$sqlRecurrence = "15 minute";
				$minute = 15;
				$limitBan = 4;
				$limitWarning = 10;
				$limitRecord = 4000;
				break;
			case "30m":
				$sqlRecurrence = "30 minute";
				$minute = 30;
				$limitBan = 6;
				$limitWarning = 15;
				$limitRecord = 8000;
				break;
			case "1h":
				$sqlRecurrence = "1 hour";
				$minute = 60;
				$limitBan = 10;
				$limitWarning = 20;
				$limitRecord = 12500;
				break;
			case "6h":
				$sqlRecurrence = "6 hour";
				$minute = 360;
				$limitBan = 15;
				$limitWarning = 30;
				$limitRecord = 75000;
				break;
			case "12h":
				$sqlRecurrence = "12 hour";
				$minute = 720;
				$limitBan = 30;
				$limitWarning = 60;			
				$limitRecord = 150000;						
				break;
			case "1d":
				$sqlRecurrence = "1 day";
				$minute = 1440;
				$limitBan = 61;
				$limitWarning = 120;	
				$limitRecord = 300000;						
				break;
			default: // 5m
				$sqlRecurrence = "5 minute";
				$minute = 5;
				$limitBan = 2.5;		
				$limitWarning = 5;		
				$limitRecord = 2000;	
				break;
		}
		
		return array($sqlRecurrence, $minute, $limitBan, $limitWarning, $limitRecord);
	}
	
	// Lay ve danh sach cac user binh thuong nhung co them cac tinh nang dac biet cua Admin
	// Y nghia cua mang gia tri:
	//     [0]: user_id
	//     [1]: 1 -> Cho phep search khi add cap cau cho keyword, 0 -> khong cho phep
	//     [2]: 1 -> Cho phep xem thong tin an cua profile, 0 -> khong cho phep
	//     [3]: 1 -> Cho phep xem các cặp câu của user người mà chọn ẩn các cặp câu, 0 -> khong cho phep
	//     [4]: 1 -> Cho phep sửa video (nên là admin acc), 0 -> khong cho phep
	public function getSpecialUser()
	{
		// Dr. Know, Lai Tran, LT, Kha Nguyen, 
		// Thanh Thoai, Phy Pham, Nguyen Thi Doan Trang, Dao Nguyen, 
		// Baba, Tin Tin, Relaxing Đinh, Titan Trần
		// Mimi Nguyễn, Học Nguyễn, Nguyen Viet Quoc Vinh
		// Uyên (Phạm Ngô Phương Uyên), Hằng (hangtran), Thư (hoa thủy tinh)
		// phong113, Hạnh, Khánh Quách
		//
		// Đỗ Thanh Thủy, Nguyễn Thị Kim Hạ (Vicky Nguyen), Nguyễn Quỳnh Bảo Quyên
		// Nguyễn Bảo Trâm, Trịnh Xuân Nương, Nhi (TT) 
		// Ngọc, Trang 
		// le thi kim phuong, vinguyen, Nguyễn Thị Thanh Hiền
		// Nhung, Luc, D. Van
		// H. Van, Lien, Thuc
		// k~43008, m~43376, p~2051
		// n~42809
		// FreeTime (Tin)
		// Gia
		// Thang Pham
		return array(
				"b~85"=>array("b~85",1,1,1,1),// acc để test boluklak1@gmail.com
				
				"x~36"=>array("x~36",1,1,1),
				"t~51"=>array("t~51",1,1,1),
				"l~52"=>array("l~52",1,1,1),
				"k~8"=>array("k~8",1,1,1),
				"t~7"=>array("t~7",1,1,1),
				"p~37"=>array("p~37",1,1,1),
				"j~55"=>array("j~55",1,1,1),
				"s~67"=>array("s~67",1,1,1),
				"s~101"=>array("s~101",1,1,1),
				"t~130"=>array("t~130",1,1,1,1),
				"r~2224"=>array("r~2224",1,1,1),
				"t~2225"=>array("t~2225",1,1,1),
				"m~2223"=>array("m~2223",1,1,1),
				"n~1808"=>array("n~1808",1,1,1),
				"n~24109"=>array("n~24109",1,0,0),
				"u~66"=>array("u~66",1,0,0,1),
				"m~8240"=>array("m~8240",1,0,0),
				"h~8242"=>array("h~8242",1,0,0),
				"p~6079"=>array("p~6079",1,0,0),
				"b~183"=>array("b~183",1,0,1),
				"k~15998"=>array("k~15998",1,0,0),
				"l~15298"=>array("l~15298",1,0,0),
				"n~15072"=>array("n~15072",1,0,0),
				"t~15075"=>array("t~15075",1,0,0),
				"t~17724"=>array("t~17724",1,0,0),
				"n~15071"=>array("n~15071",1,0,0),
				"j~15095"=>array("j~15095",1,0,0),
				"l~15204"=>array("l~15204",1,0,0),
				"t~18303"=>array("t~18303",1,0,0),
				"p~26191"=>array("p~26191",1,0,0),
				"v~26189"=>array("v~26189",1,0,0),
				"t~26636"=>array("t~26636",1,0,0),
				"n~40060"=>array("n~40060",1,0,0),
				"a~39580"=>array("a~39580",1,0,0),
				"v~40010"=>array("v~40010",1,0,0),
				"v~40013"=>array("v~40013",1,0,0),
				"h~40009"=>array("h~40009",1,0,0),
				"l~40008"=>array("l~40008",1,0,0),
				"k~43008"=>array("k~43008",1,0,0),
				"m~43376"=>array("m~43376",1,0,0),
				"p~2051"=>array("p~2051",1,0,0),
				"n~42809"=>array("n~42809",1,0,0),
				"t~42673"=>array("t~42673",0,0,0,1),
				"t~52406"=>array("t~52406",0,0,0,1),
				"m~52344"=>array("m~52344",1,1,1));
	}
	
	public function getNational()
	{
		return array("1"=>"Việt Nam",
				"2"=>"Mỹ",
				"3"=>"Úc",
				"4"=>"Algeria",
				"5"=>"American Samoa",
				"6"=>"Andorra",
				"7"=>"Angola",
				"8"=>"Anguilla",
				"9"=>"Antarctica",
				"10"=>"Antigua And Barbuda",
				"11"=>"Argentina",
				"12"=>"Armenia",
				"13"=>"Aruba",
				"14"=>"Albania",
				"15"=>"Áo",
				"16"=>"Azerbaijan",
				"17"=>"Bahamas",
				"18"=>"Bahrain",
				"19"=>"Bangladesh",
				"20"=>"Barbados",
				"21"=>"Belarus",
				"22"=>"Bỉ",
				"23"=>"Belize",
				"24"=>"Benin",
				"25"=>"Bermuda",
				"26"=>"Bhutan",
				"27"=>"Bolivia",
				"28"=>"Bosnia And Herzegowina",
				"29"=>"Botswana",
				"30"=>"Bouvet Island",
				"31"=>"Brazil",
				"32"=>"British Indian Ocean Territory",
				"33"=>"Brunei Darussalam",
				"34"=>"Bulgaria",
				"35"=>"Burkina Faso",
				"36"=>"Burundi",
				"37"=>"Cambodia",
				"38"=>"Cameroon",
				"39"=>"Canada",
				"40"=>"Cape Verde",
				"41"=>"Cayman Islands",
				"42"=>"Central African Republic",
				"43"=>"Chad",
				"44"=>"Chile",
				"45"=>"Trung Quốc",
				"46"=>"Christmas Island",
				"47"=>"Cocos (Keeling) Islands",
				"48"=>"Colombia",
				"49"=>"Comoros",
				"50"=>"Congo",
				"51"=>"Cook Islands",
				"52"=>"Costa Rica",
				"53"=>"Cote D'Ivoire",
				"54"=>"Croatia",
				"55"=>"Cuba",
				"56"=>"Cyprus",
				"57"=>"Czech Republic",
				"58"=>"Denmark",
				"59"=>"Djibouti",
				"60"=>"Dominica",
				"61"=>"Dominican Republic",
				"62"=>"East Timor",
				"63"=>"Ecuador",
				"64"=>"Ai Cập",
				"65"=>"El Salvador",
				"66"=>"Equatorial Guinea",
				"67"=>"Eritrea",
				"68"=>"Estonia",
				"69"=>"Ethiopia",
				"70"=>"Falkland Islands",
				"71"=>"Faroe Islands",
				"72"=>"Fiji",
				"73"=>"Finland",
				"74"=>"France",
				"75"=>"France, Metropolitan",
				"76"=>"French Guiana",
				"77"=>"French Polynesia",
				"78"=>"French Southern Territories",
				"79"=>"Gabon",
				"80"=>"Gambia",
				"81"=>"Georgia",
				"82"=>"Germany",
				"83"=>"Ghana",
				"84"=>"Gibraltar",
				"85"=>"Greece",
				"86"=>"Greenland",
				"87"=>"Grenada",
				"88"=>"Guadeloupe",
				"89"=>"Guam",
				"90"=>"Guatemala",
				"91"=>"Guinea",
				"92"=>"Guinea-Bissau",
				"93"=>"Guyana",
				"94"=>"Haiti",
				"95"=>"Heard And Mc Donald Islands",
				"96"=>"Honduras",
				"97"=>"Hồng Kông",
				"98"=>"Hungary",
				"99"=>"Iceland",
				"100"=>"Ấn Độ",
				"101"=>"Indonesia",
				"102"=>"Iran",
				"103"=>"Iraq",
				"104"=>"Ireland",
				"105"=>"Israel",
				"106"=>"Ý",
				"107"=>"Jamaica",
				"108"=>"Nhật Bản",
				"109"=>"Jordan",
				"110"=>"Kazakhstan",
				"111"=>"Kenya",
				"112"=>"Kiribati",
				"113"=>"Triều Tiên",
				"114"=>"Hàn Quốc",
				"115"=>"Kuwait",
				"116"=>"Kyrgyzstan",
				"117"=>"Lao People's Republic",
				"118"=>"Latvia",
				"119"=>"Lebanon",
				"120"=>"Lesotho",
				"121"=>"Liberia",
				"122"=>"Libyan Arab Jamahiriya",
				"123"=>"Liechtenstein",
				"124"=>"Lithuania",
				"125"=>"Luxembourg",
				"126"=>"Macau",
				"127"=>"Macedonia",
				"128"=>"Madagascar",
				"129"=>"Malawi",
				"130"=>"Malaysia",
				"131"=>"Maldives",
				"132"=>"Mali",
				"133"=>"Malta",
				"134"=>"Marshall Islands",
				"135"=>"Martinique",
				"136"=>"Mauritania",
				"137"=>"Mauritius",
				"138"=>"Mayotte",
				"139"=>"Mexico",
				"140"=>"Micronesia",
				"141"=>"Moldova",
				"142"=>"Monaco",
				"143"=>"Mongolia",
				"144"=>"Montserrat",
				"145"=>"Morocco",
				"146"=>"Mozambique",
				"147"=>"Myanmar",
				"148"=>"Namibia",
				"149"=>"Nauru",
				"150"=>"Nepal",
				"151"=>"Netherlands",
				"152"=>"Netherlands Antilles",
				"153"=>"New Caledonia",
				"154"=>"New Zealand",
				"155"=>"Nicaragua",
				"156"=>"Niger",
				"157"=>"Nigeria",
				"158"=>"Niue",
				"159"=>"Norfolk Island",
				"160"=>"Northern Mariana Islands",
				"161"=>"Norway",
				"162"=>"Oman",
				"163"=>"Pakistan",
				"164"=>"Palau",
				"165"=>"Panama",
				"166"=>"Papua New Guinea",
				"167"=>"Paraguay",
				"168"=>"Peru",
				"169"=>"Philippines",
				"170"=>"Pitcairn",
				"171"=>"Poland",
				"172"=>"Portugal",
				"173"=>"Puerto Rico",
				"174"=>"Qatar",
				"175"=>"Reunion",
				"176"=>"Romania",
				"177"=>"Russian Federation",
				"178"=>"Rwanda",
				"179"=>"Saint Kitts And Nevis",
				"180"=>"Saint Lucia",
				"181"=>"Saint Vincent And The Grenadines",
				"182"=>"Samoa",
				"183"=>"San Marino",
				"184"=>"Sao Tome And Principe",
				"185"=>"Saudi Arabia",
				"186"=>"Senegal",
				"187"=>"Seychelles",
				"188"=>"Sierra Leone",
				"189"=>"Singapore",
				"190"=>"Slovakia",
				"191"=>"Slovenia",
				"192"=>"Solomon Islands",
				"193"=>"Somalia",
				"194"=>"Nam Phi",
				"195"=>"South Georgia/South Sandwich Islands",
				"196"=>"Tây Ban Nha",
				"197"=>"Sri Lanka",
				"198"=>"St Helena",
				"199"=>"St Pierre and Miquelon",
				"200"=>"Sudan",
				"201"=>"Suriname",
				"202"=>"Svalbard And Jan Mayen Islands",
				"203"=>"Swaziland",
				"204"=>"Thụy Điển",
				"205"=>"Switzerland",
				"206"=>"Syrian Arab Republic",
				"207"=>"Đài Loan",
				"208"=>"Tajikistan",
				"209"=>"Tanzania",
				"210"=>"Thái Lan",
				"211"=>"Togo",
				"212"=>"Tokelau",
				"213"=>"Tonga",
				"214"=>"Trinidad And Tobago",
				"215"=>"Tunisia",
				"216"=>"Thổ nhĩ kỳ",
				"217"=>"Turkmenistan",
				"218"=>"Turks And Caicos Islands",
				"219"=>"Tuvalu",
				"220"=>"Uganda",
				"221"=>"Ukraine",
				"222"=>"United Arab Emirates",
				"223"=>"United Kingdom",
				"224"=>"Afghanistan",
				"225"=>"United States Minor Outlying Islands",
				"226"=>"Uruguay",
				"227"=>"Uzbekistan",
				"228"=>"Vanuatu",
				"229"=>"Vatican City State",
				"230"=>"Venezuela",
				"231"=>"Virgin Islands (British)",
				"232"=>"Virgin Islands (U.S.)",
				"233"=>"Wallis And Futuna Islands",
				"234"=>"Western Sahara",
				"235"=>"Yemen",
				"236"=>"Zaire",
				"237"=>"Zambia",
				"238"=>"Zimbabwe");
	}	
	
	/**
	 * Lay ve danh sach cac para de LOAI TRU, duoc dung trong function editor:paraSafe(...) de filter nhung du lieu khong hop le
	 *
	 * @return array Mang chua danh sach cac para LOAI TRU, tham khao them function editor:paraSafe(...)
	 * @author DoNguyen added [20110706]
	 */
	public function getArrayExceptPara()
	{
		return array('sct'=>'',
				//GIA TRAN ADD
				////forum
				'cmt'=>'',
				////article
				//'titl'=>'',
				//'quot'=>'',
				//'cont'=>''
				////video				
				'titl'=>'',
				'quot'=>'',
				'cont'=>'',
				//GIA TRAN ADD END
				//ThanhViet added
				'txtEnContent'=>'','txtVnContent'=>'','txtDescription'=>'','txtSubDesc'=>'',
				//Phongvuhong add profile
				'msg'=>'','body'=>''
			
			
				);
	}
	
	/**
	 * Lay tong so record cua 1 table
	 *
	 * @param mixed $m_tableName This is a description
	 * @param mixed $objConnection This is a description
	 * @return mixed This is the return value description
	 *
	 */
	public function getTotalRecord($m_tableName,$objConnection,$strCondition)
	{
		$strSQL = self::prepareQuery(self::SQL_SELECT1,array('count(*)',$m_tableName.' '.$strCondition));
		$arrResult = $objConnection->selectCommand($strSQL);
		$intCountAll =$arrResult[0][0];
		return $intCountAll;
	}

	//lấy một đoạn văn bản đầu tiên trong một văn bản dài.
	function getFirstWords($string, $num = 1) 
	{ 
		$string = explode(' ', $string); 
		if (count($string) > $num) 
		{ 
			return implode(' ', array_slice($string, 0, $num)) . '...'; 
		} 
		else
		{
			$string =  implode(' ', $string); 
			return  self::cutString($string,0,$num*7);
		}
		
	} 
	/**
	 * Phương thức cập nhật delete_flag
	 *
	 * @param string $ContentID ID cần cập nhập
	 * @param string $IDName Tên của ID cần cập nhập
	 * @param string $strTableName Tên table cần cập nhật
	 * @param int $status status của delete_flag
	 * @param object $objConnection connect to db
	 * @return int 1:Cập nhật thành công hay 0:thất bại
	 *
	 */
	public function updateDeleteFlag($ContentID,$IDName,$strTableName,$status,$objConnection)
	{
		$strSQL = self::prepareQuery(self::SQL_UPDATE_BY_CONDITION,array($strTableName,"delete_flag=$status","$IDName='$ContentID'"));
		if ($objConnection->executeSQL($strSQL)==-1)
		{
			return 0;
		}
		return 1;
	}
	/**
	 * Phương thức cập nhật delete_flag
	 *
	 * @param string $ContentID ID cần cập nhập
	 * @param string $IDName Tên của ID cần cập nhập
	 * @param string $userID user ID cập nhập
	 * @param string $strTableName Tên table cần cập nhật
	 * @param int $status status của delete_flag
	 * @param object $objConnection connect to db
	 * @return int 1:Cập nhật thành công hay 0:thất bại
	 *
	 */
	public function updateDeleteFlagWithUserAndDate($ContentID,$IDName,$userID,$strTableName,$status,$objConnection)
	{
		//const SQL_UPDATE_BY_CONDITION				= "UPDATE `{0}` SET {1} WHERE {2};";
		if($status)
		{
			$strSQL = self::prepareQuery(self::SQL_UPDATE_BY_CONDITION,array($strTableName,"delete_flag=$status,delete_user_id='$userID',delete_date='".self::getDateTime()."'","$IDName='$ContentID'"));
		}
		else
		{
			$strSQL = self::prepareQuery(self::SQL_UPDATE_BY_CONDITION,array($strTableName,"delete_flag=$status","$IDName='$ContentID'"));
		}
		
		if ($objConnection->executeSQL($strSQL)==-1)
		{
			self::writeLog('updateDeleteFlagWithUserAndDate:'.$strSQL,1);
			return 0;
		}
		return 1;
	}
	/**
	 * Phương thức cập nhật delete_flag
	 *
	 * @param string $whereClause Dieu kien xoa
	 * @param string $userID user ID cập nhập
	 * @param string $strTableName Tên table cần cập nhật
	 * @param int $status status của delete_flag
	 * @param object $objConnection connect to db
	 * @return int 1:Cập nhật thành công hay 0:thất bại
	 *
	 */
	public function updateDeleteFlagWithUserAndDateByCondition($whereClause,$userID,$strTableName,$status,$objConnection)
	{
		//const SQL_UPDATE_BY_CONDITION				= "UPDATE `{0}` SET {1} WHERE {2};";
		if($status)
		{
			$strSQL = self::prepareQuery(self::SQL_UPDATE_BY_CONDITION,array($strTableName,"delete_flag=$status,delete_user='$userID',delete_date='".self::getDateTime()."'",$whereClause));
		}
		else
		{
			$strSQL = self::prepareQuery(self::SQL_UPDATE_BY_CONDITION,array($strTableName,"delete_flag=$status",$whereClause));
		}
		//echo $strSQL;
		if ($objConnection->executeSQL($strSQL)==-1)
		{
			self::writeLog('updateDeleteFlagWithUserAndDateByCondition:'.$strSQL,1);
			return 0;
		}
		return 1;
	}
	/**
	 * This is method deleteObject
	 *
	 * @param mixed $ContentID This is a description
	 * @param mixed $IDName This is a description
	 * @param mixed $strTableName This is a description
	 * @param mixed $objConnection This is a description
	 * @return mixed This is the return value description
	 *
	 */
	public function deleteObject($ContentID,$IDName,$strTableName,$objConnection)
	{
		$strSQL = self::prepareQuery(self::SQL_DELETE_BY_CONDITION,
				array($strTableName,$IDName,$ContentID));
		$result = $objConnection->executeSQL($strSQL);
		if ($result==-1)
		{
			self::writeLog('deleteObject:'.$strSQL,1);
			return false;
		}	
		return true;
	}
	/**
	 * This is method deleteObjectByCondition
	 *
	 * @param mixed $strWhereClause This is a description
	 * @param mixed $strTableName This is a description
	 * @param mixed $objConnection This is a description
	 * @return mixed This is the return value description
	 *
	 */
	public function deleteObjectByCondition($strWhereClause,$strTableName,$objConnection)
	{
		//"DELETE FROM `{0}` {1}";
		$strSQL = self::prepareQuery(self::SQL_DELETE,
				array($strTableName,$strWhereClause));
		$result = $objConnection->executeSQL($strSQL);
		if ($result==-1)
		{
			self::writeLog('deleteObjectByCondition:'.$strSQL,1);
			return false;
		}	
		return true;
	}
	public function formatDateTimeVN($mySqlDateTime)
	{
		return substr($mySqlDateTime,8,2)."/".substr($mySqlDateTime,5,2)."/".substr($mySqlDateTime,0,4) .' '. substr($mySqlDateTime,11,2).":".substr($mySqlDateTime,14,2).":".substr($mySqlDateTime,17,2) ;
	}
	
	
	/**
	 * This is method splitString
	 *
	 * @param string $delimiter This is a description
	 * @param string $stringValue This is a description
	 * @return array 
	 *
	 */
	public function splitString($stringValue, $delimiter=',')
	{
		if(is_array($stringValue))
		{
			$stringValue = implode($delimiter,$stringValue);
		}
		return preg_split('/'.$delimiter.'/', $stringValue , -1, PREG_SPLIT_NO_EMPTY);
	}
	
	
	/**
	 * This is method array_column to one column
	 *
	 * @param mixed $array This is a description
	 * @param mixed $column This is a description
	 * @return mixed This is the return value description
	 *
	 */
	public function getArrayColumn($array, $column)
	{
		foreach ($array as $row) $ret[] = $row[$column];
		return $ret;
	}
	
	public function convertIntToChar($asciiCode)
	{
		return chr($asciiCode);
	}
	
	public function convertCharToInt($character)
	{
		return ord($input);
	}
	
	public function mergeUserInfo($arrResult)
	{
		$arrUsers =  global_common::getArrayColumn($arrResult,'CreatedBy');
		$arrUserInfo = global_common::getUserInfo($arrUsers,$this->_objConnection);
		//print_r($arrUserInfo);
		$count = count($arrResult);
		for($i=0; $i < $count; $i++)
		{
			//print_r($arrResult[$i]);
			$arrResult[$i]['CreatedBy'] = $arrUserInfo[$arrResult[$i]['CreatedBy']];
		}
		//print_r($arrResult);
		return $arrResult;
	}
	
	/**
	 * Lấy danh sách thông tin user có trong danh sách comment
	 *
	 * @param array $$arrUserID danh sách userid
	 * @return array mãng thông tin user
	 *
	 */
	public function getUserInfo($arrUserID,$objConnection)
	{		
		//print_r($arrUserID);
		$arrUserInfo = global_common::getUserDetailByMultiTable($arrUserID, $objConnection);
		//print_r($arrUserInfo);
		foreach($arrUserInfo as $key => $info)
		{
			$arrUserInfo[$info['UserID']]=$info;
			unset($arrUserInfo[$key]);
		}		
		return $arrUserInfo;
	}
	
	/**
	 * lấy thông tin detail của một vài c_user,c_user_detail
	 *
	 * @param string $userList danh sách các id c_user
	 * @param object $objConnection connect to db
	 * @param string $selectField các cột sẽ lấy dữ liệu về
	 * @return array thông tin các user
	 * GiaTran
	 */
	private function getUserDetailByMultiTable($userList, $objConnection, $selectField='*')
	{
		// build group table - optimize select query
		$userList = global_common::splitString($userList);
		//print_r($userList);
		$arrDocInTable = array();
		foreach ($userList as $key)
		{
			$suffix = global_common::getTableSuffixByAlphabet($key);
			$arrDocInTable[$suffix] .= '\''.$key.'\',';
		}
		
		foreach ($arrDocInTable as $iDoc)
		{
			$key = global_common::getTableSuffixByAlphabet(substr($iDoc,1,2));
			$arrDocInTable[$key] = global_common::cutLast($iDoc,1);
			
			$tbName			= global_common::builtTableName(Model_User::TBL_SL_USER,$key);
			$selectField	= '*';
			$strSQL .= "(".global_common::prepareQuery(global_common::SQL_SELECT_BY_CONDITION1, array($selectField, 
						$tbName,'`UserID` IN (' . $arrDocInTable[$key] . ')')).') UNION ALL ';		
		}
		if ($strSQL != '')
		{
			$strSQL = substr($strSQL,0,strlen($strSQL)- strlen(' UNION ALL '));
		}
		if ($selectField == '')
		{
			$strSQL ='(select * from ('.$strSQL.') as tbl_user)';
		}
		else
		{
			$strSQL ='(select '.$selectField.' from ('.$strSQL.') as tbl_user)';
		}
		//echo $strSQL;
		return $objConnection->selectCommand($strSQL);
	}
	
	#end region
	
}
?>