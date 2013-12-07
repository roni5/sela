<?php

/**
 *
 * Application class
 * get set application variables by      
 * storing serialized values to tempfiles 
 */

// TODO: DoNguyen - Rất nhiều chỗ còn dùng chuỗi với dấu nháy ", sửa lại dùng dấu nháy đơn '
class Application
{	
	#region global_common 
	 const APP_DATA = '';
	 const APP_EXTENSION = '.app';
	 const XML_EXTENSION = '.xml';
	 const APP_LOCK_EXTENSION ='.lock';
	
	#end region
	
	#region Variables 
	
	#end region
	
	#region Constructors 
	
	
	#end region   
	
	#region Public methods  
	
	/**
	 *  Doc du lieu file .app
	 * @param $fileName :duong dan toi file .app
	 * @return Du lieu dang chuoi ( unserialize)
	 */ 
	public function getVar($fileName)
	{
		$iCount = 0;
		$iMax = 10000;
		
		$strFileName =  $fileName . self::APP_EXTENSION;
		if (!self::checkExists($strFileName))
		{
			return false;
		}
		
		do
		{
			
			$strValue = file_get_contents($strFileName);
			$strValue1 = file_get_contents($strFileName);
			
			// TODO: DoNguyen - nên đảo ngược sẽ hay hơn: (!$strValue[0]) || (strlen($strValue) != strlen($strValue1))
			if ((!$strValue[0]) || (strlen($strValue) != strlen($strValue1)))
			{
				$iCount++;
				continue;
			}
			else
			{
				$value = unserialize($strValue);
				
				return $value;
			}
			
			
		} while ($iCount <= $iMax);
		
		return null;
		
	}
		
	/**
	 * Ham thuc hien chuc nang ghi file .app
	 * 
	 * @param $fileName : ten file .app
	 * @param $value  : du lieu can ghi 
	 * @param $lockFolder :folder tam de chua strLockfile
	 * @return false:that bai; true :thanh cong
	 * @author PhongHong added [20110404]
	 */
	public function setVar($fileName, $value)
	{
		$iCount = 0;
		$iMax = 10000;
        
        $strFileName =$fileName . self::APP_EXTENSION;
   		$filePath = pathinfo($fileName);
        $fileName = $filePath['filename'];
        $filePath = $filePath['dirname'].'/';
        $lockFolder = $filePath.'temp/';
        
        //echo $lockFolder;
      if(!is_dir($lockFolder))
        {
            mkdir($lockFolder);
        }
	
		$strFileLock = $lockFolder . $fileName . self::APP_LOCK_EXTENSION;
		//serializ du lieu
		$strValue = serialize($value);
	
		do
		{
			$isLocked = fopen($strFileLock, 'x');
			if (!$isLocked)
			{
				$iCount++;			
				continue;
			}
			else
			{
				file_put_contents($strFileName, $strValue);
				fclose($isLocked);
				unlink($strFileLock);
				return true;
			}
		} while ($iCount <= $iMax);
	
		return false;
	}
	
	/**
	 * Thuc hien cache file XML
	 * 
	 * @param $fileName:duong dan toi file XML (ko bao gom .xml)
	 * @param $keyInfo: tu khoa de truy van thong tin cau hinh cache
	 * @return $arrXML: Mang convert tu XML
	 * @author PhongHong added [20110413]
	 */
	public function getVarXML($fileName,$keyInfo = "")
	{
		global $_cacheXMLInfo;
        
        $strXMLFile = $fileName.self::XML_EXTENSION;  
        $strcacheXMLInfo = global_common::FOLDER_XML.'cacheXMLInfo.xml';      
       
		// Kiem tra su ton tai cua file xml
		if (!self::checkExists($strXMLFile))
		{
			global_common::writeLog('Khong ton tai '.$strXMLFile,0);
            return 0;
		}
		
		// Neu $keyInfo khong duoc set: lay ten file lam KEY
		if ($keyInfo == '')
		{   
		      
            // Lay ten file tu duong dan
            $keyInfo=pathinfo($fileName);		  
			$keyInfo =$keyInfo['filename'] ;
            global_common::writeLog('Keyinfo khong duoc set keyinfo ='.$keyInfo,0);
		}
		
		// TODO: DoNguyen - 2 cái if bên dưới ko được hay lắm, code như sau anh nghĩ tốt hơn

		
		if (!$_cacheXMLInfo)
		{	
			// Kiem tra su ton tai cua cacheXMLInfo
			if (!self::checkExists($strcacheXMLInfo))
			{
				global_common::writeLog('Khong co cacheXMLInfo.xml',0);  
				$arrData = self::xml2array($strXMLFile);
				
				return $arrData;
			}
			// Neu chua co $_cacheXMLInfo : doc du lieu tu cacheXMLInfo.xml
			$_cacheXMLInfo = self::getCacheInfo('xml');
						
		}
		
		// Lay thong tin cau hinh 
		$configInfo = self::getCacheInfoBykey($_cacheXMLInfo,'xml',$keyInfo);
 
		if(self::checkExists($fileName.self::APP_EXTENSION))
		{
            // Neu ton tai .app
        	// Lay du lieu tu file .App 
			$arrData = self::getVar($fileName);
				         
			// Lay thoi gian cua lan update truoc
			$lstupd = $arrData['_lstupd'];
            
			if(time()- $lstupd > $configInfo['cxiDur'] )
			{
				$arrData = self::makeAppCacheXML($fileName,$configInfo);
			}
		}
		else
		{
			$arrData = self::makeAppCacheXML($fileName,$configInfo);  
		}
		
		unset($arrData['_lstupd']);
		return $arrData;
	}
	
	/**
	 * Tao/cap nhat du lieu file app cho cau truy van $strSql
	 * @param $strSQL : cau truy van SQL
	 * @param $objConnection 
	 * @param $keyInfo : Tu khoa tim kiem thong tin cau hinh cacheSQL
	 * @return du lieu truy van
	 * @author PhongHong added [20110415] 
	 */	
	public function getVarSQL($strSQL, $objConnection, $keyInfo='')
	{	
		global $_cacheSQLInfo;
		$strCacheSQLInfo = global_common::FOLDER_XML.'cacheSQLInfo'.self::XML_EXTENSION;
		// TODO: DoNguyen - Cũng giống như bên getVarXML, nên bỏ IF bên dưới vào [if (!$_cacheSQLInfo)]
		if (!$_cacheSQLInfo)
		{ 
			if(!self::checkExists($strCacheSQLInfo))
			{
				global_common::writeLog('Không tồn tại cacheSQLInfo.xml',0);  				
				$sqlResult = $objConnection->selectCommand($strSQL);
				return $sqlResult;
			}
			// Neu chua co $$_cacheSQLInfo : doc du lieu tu cacheSQLInfo.xml
			$_cacheSQLInfo = self::getCacheInfo('sql');
			
		}
		$strAppFile = md5($strSQL);
		$strAppPath = global_common::FOLDER_SQL_CACHE.$strAppFile;

		// Lay thong tin cau hinh cache theo keyInfo
		$configInfo = self::getCacheInfoBykey($_cacheSQLInfo,'sql',$keyInfo);
		if(!self::checkExists($strAppPath.self::APP_EXTENSION))
		{	
		   //Neu chua co file .app: thuc hien truy van - tao .app - tra du lieu ve
			$sqlResult = $objConnection->selectCommand($strSQL);            			
			$sqlResult = self::makeAppCacheSQL($sqlResult,$strAppPath,$configInfo);        
		}
		else
		{
          // Neu da co .app
			$sqlResult = self::getVar($strAppPath);			
			$lstupd  =$sqlResult['_lstupd'];			
			// Kiem tra lan update truoc
			if(time() - $lstupd > $configInfo['csiDur'])
			{
			    $sqlResult = $objConnection->selectCommand($strSQL);
			    $sqlResult = self::makeAppCacheSQL($sqlResult,$strAppPath,$configInfo);
			}
			
		}	
		unset($sqlResult['_lstupd']);        
		return $sqlResult;
	
	}
	
	/**
	 * Tao/cap nhat du lieu file app cho mot nghiep vu nao do
	 * 
	 * @param $fileName : Duong dan toi file .app (khong bao gom .app)
	 * @param $keyInfo : Tu khoa tim kiem thong tin cau hinh cacheBusinessInfo.xml
	 * @param $autoUpdate : co tu dong cap nhat du lieu hay khong
	 * @@param $arrClsPara : Mang doi so truyen vao cho constructor cua class
	 * @param $arrFuncPara :Mảng đối số truyền vào cho hàm thực hiện nghiệp vụ
	 * Dữ liệu app sẽ được push vào đầu của mảng đối số này.
	 * @return du lieu cache
	 * @author PhongHong added [20110418] 
	 */
	public function getVarBusiness($fileName, $keyInfo, $iautoUpdate=0,$arrClsPara,$arrFuncPara)
	{
		global $_cacheBusinessInfo;
		$strcacheBusinessInfo = global_common::FOLDER_XML.'cacheBusinessInfo'.self::XML_EXTENSION;
		$strAppFile = $fileName.self::APP_EXTENSION;
		
		// Neu $_cacheBusinessInfo chua duoc set
		if(!$_cacheBusinessInfo)
		{
			$_cacheBusinessInfo = self::getCacheInfo('business');
			
		}	
		
		// Lay thong tin cache theo KeyInfo
		$cacheCnfInfo = self::getCacheInfoBykey($_cacheBusinessInfo,'business',$keyInfo);
		// Kiem tra su ton tai cua $keyInfo va cacheBusinessInfo.xml
		if(!$cacheCnfInfo || !self::checkExists($strcacheBusinessInfo) )
		{		  
			 global_common::writeLog('Không có keyInfo hoặc chưa có cacheBusinessInfo.xml',0);			   
			 if(self::checkExists($strAppFile))
			 {
				return self::getVar($fileName);	
			 }
			 else
			 {
				global_common::writeLog('Không tồn tại file app '.$strAppFile,0);
				return null;
			 }			 
		}
	       
        //Lay du lieu tu file .app
        $arrAppData = self::getVar($fileName);
        
        $cbiCls = $cacheCnfInfo['cbiCls'];
        $cbiFnc = $cacheCnfInfo['cbiFnc'];

        // Khởi tạo đối tượng classCoFu của class ReflectionClass
        $classCoFu = new ReflectionClass($cbiCls);
        if ($arrClsPara) {
			$IclassCoFu = $classCoFu->newInstance($arrClsPara);	
        }
        else
        {
			$IclassCoFu = $classCoFu->newInstance();										
		}
        $method = $classCoFu->getMethod($cbiFnc);
        if(is_array($arrFuncPara)&& is_array($arrAppData))
        {
			array_unshift($arrFuncPara,$arrAppData);	
		}
		
        $arrData =  $method->invoke($IclassCoFu,$arrFuncPara);
        
        if($iautoUpdate)
        {					
            self::setVar($fileName,$arrData);
        }
        return $arrData;		
	}
	
	
	/**
	 * Xóa 1 file app bất kỳ
	 *
	 * @param string $varname Đường dẫn file
	 * @return boolean True -> xóa file thành công hoặc file ko tồn tại, False -> Xóa thất bại.
	 */
	public function clearVar($varname)
	{
		$strFileName = self::APP_DATA . $varname . self::APP_EXTENSION;
		
		// Check file
		if (file_exists($strFileName))
		{
			return unlink($strFileName);
		}
		
		return true;
	}
	
	/**
	  * Ghi noi tiep vao file chi dinh
	  *
	  * @param string $fileName Ten file
	  * @param string $strContent Gia tri can ghi tiep vao file
	  * @return int 1: thanh cong; 0: that bai;
	  *
	  */
	public function writeFileAppend($fileName, $strContent)
	{
		$iMax = 10;
		$iCount = 0;
		
		do
		{
			$fp = fopen($fileName, 'a');
			$iCount++;
		} while (!$fp && $iCount < $iMax); // Co gang mo file 10 lan
		
		if ($fp)
		{
			fwrite($fp, $strContent);
			fclose($fp);
			return 1; // Thanh cong
		}
		
		return 0; // That bai
	}

	/**
	 * Ghi full request vao file
	 *
	 * @return int 1: thanh cong; 0: that bai
	 *
	 */
	public function writeLogRequest($type = 1)
	{
		// Duoc goi tu crontab nen khong co tham so can thiet va khong can ghi lai
		if (empty($_SERVER['REQUEST_URI']))
		{
			return;
		}
		
		// Get all value of POST (neu dang thuc thi bang POST)
		$postValues = '';
		if ($_SERVER['REQUEST_METHOD'] != 'GET')
		{
			foreach ($_POST as $var => $value)
			{
				$postValues .= "&$var=$value";
			}
			
			if (!empty($postValues))
			{
				$postValues = "($postValues)";
			}
		}
		
		// Tao noi dung de ghi file
		$strContent = "[" . global_common::getDateTime() . "]\t";
		$strContent .=  global_common::getClientIP() . "\t";
		$strContent .= session_id() . "\t";
		// "CUSER_INFO" va "SES_AUTHENTICATED" ko duoc goi tu trong global_common va admin_global_common
		$strContent .= ($type == 1 ? $_SESSION['CUSER_INFO']['user_id'] : $_SESSION['SES_AUTHENTICATED']['user_id']) ."\t";
		$strContent .= $_SERVER['REQUEST_METHOD'] . "\t";
		$strContent .= $_SERVER['REQUEST_URI'] . "$postValues\n";
		
		// File name
		$suffix =  global_common::getTableSuffixByMonth( global_common::buildIDByMonth(1, global_common::getDateTime()));
		if ($type == 1)
		{
			$fileName = global_common::FOLDER_LOG . 'request_front_end' . $suffix . '.log';
		}
		else
		{
			$fileName =  global_common::FOLDER_LOG . 'request_back_end' . $suffix . '.log';
		}
		
		// Ghi va tra ve ket qua
		return self::writeFileAppend($fileName, $strContent);
	}
	
    /**
	 * thuc hien lay noi dung file xml chuyen thanh mot array
	 *
	 * @param string $fileName ten file xml
	 * @return array cac phan tu doc duoc trong file xml
	 * @author TinhDoan added [20100723]
	 *
	 */	 
	public function xml2array($fileName)
	{
		//Load file configure XML
		if (!file_exists($fileName))
		{
			return 0;
		}
		$xml = simplexml_load_file($fileName);
		
		return self::parseXML($xml);
	}
	
	/**
	* thuc hien chuyen mot doi tuong xml thanh mot mang
	*
	* @param object $xml doi tuong xml
	* @return array cac phan tu trong doi tuong xml
	* @author TinhDoan added [20100723]
	*
	*/
	public function parseXML($xml)
	{
		$arXML = array();
		$arXML['name'] = trim($xml->getName());
		$arXML['value'] = trim((string )$xml);
		
		//lay cac thuoc tinh
		$temp = array();
		foreach ($xml->attributes() as $nameAttr => $value)
		{
			$temp[$nameAttr] = trim($value);
		}
		$arXML['attribute'] = $temp;
		
		//lay cac node con
		$arXML['children'] = array();
		foreach ($xml->children() as $nameChild => $xmlchild)
		{
			$temp = self::parseXML($xmlchild);
			if (!isset($arXML['children'][$nameChild]))
			{
				$arXML['children'][$nameChild] = array();
			}
			array_push($arXML['children'][$nameChild], $temp);
		}
		
		return $arXML;
	}
	
	/**
	* Doc file xml dua vao array
	*
	* @param string $fileName$strFileName Duong dan file xml
	* @return list Mang du lieu
	* @author PhongHong edited [20110414]
	*/
	/* TODO: DoNguyen [20110710] - KO DUNG FUNCTION NAY NUA
	public function xmltoarray($strFileName)
	{
		global $arrNodes;
		$arrNodes = array();
		///
		// initialize parser
		$xml_parser = xml_parser_create();
		
		// set callback functions
		xml_set_element_handler($xml_parser, 'application::startElementHandler', 'application::endElementHandler');
		xml_set_character_data_handler($xml_parser, 'application::characterDataHandler');
		// read XML file
		if (!($fp = fopen($strFileName, 'r')))
		{
			die('File I/O error:'. $xml_file);
		}
		
		// parse XML
		while ($data = fread($fp, 4096))
		{
			// error handler
			if (!xml_parse($xml_parser, $data, feof($fp)))
			{
				die('XML parser error: ' . xml_error_string(xml_get_error_code($xml_parser)));
			}
		}
		
		// all done, clean up!
		xml_parser_free($xml_parser);
		//
		return $arrNodes;
	}*/	
	
	/**
	 * Them mot node cau truc file xml
	 *
	 * @param string $fileName Ten file xml
	 * @param list $arrInfoNode Thong tin node
	 * @param string $parentName Ten node cha
	 * @param int $parentPos Vi tri node cha
	 * @param string $intMode Kieu insert
	 * @return void luu file xml voi cau truc moi
	 *
	 */
	public function insertNodeXML($fileName, $arrInfoNode, $parentName = "root", $parentPos =0, $intMode = "inside", $refName = null, $pos = 0)
	{
		$xmlDoc = new DOMDocument('1.0', 'utf-8');
		if (file_exists($fileName))
		{
			//neu ton tai thi moi load
			if (!$xmlDoc->load($fileName))
			{
				return 0;
			}
		}
		else
		{
			$node = $xmlDoc->createElement('root');
			$xmlDoc->appendChild($node);
		}
		
		$parent = $xmlDoc->getElementsByTagName($parentName)->item($parentPos);
		if (!$parent)
		{
			// node cha khong ton tai trong xml
			return - 1;
		}
		//tao node moi
		$newNode = createNode($xmlDoc, $arrInfoNode['name'], $arrInfoNode['attribute'],$arrInfoNode['value']);
		
		if ($intMode == 'inside')
		{
			$parent->appendChild($newNode);
		}
		/*elseif ($intMode=="before")
		{
		if ($refName==null || $node->length<$pos) {
		return 0;
		}
		$refNode = $node->item($pos);
		$refNode->parentNode->insertBefore($newNode, $refNode);
		}
		elseif ($intMode=="after")
		{
		if ($refName==null) {
		return 0;
		}
		if($node->length>($pos+1)) {
		$refNode = $node->item($pos);
		$refNode->parentNode->insertBefore($newNode, $refNode->nextSibling);
		} else {
		$refNode = $node->item(0);
		$refNode->parentNode->appendChild($newNode);
		} 
		}*/
		$xmlDoc->save($fileName);
		return 1;
	}
	
	public function updateNodeXML($fileName, $arrInfoNode, $value, $key = 'id')
	{
		$xmlDoc = new DOMDocument();
		$xmlDoc->load($fileName);
		
		$nodes = $xmlDoc->getElementsByTagName($arrInfoNode['name']);
		if (!$nodes->item(0))
		{
			// khong ton tai node nay
			return 0;
		}
		for ($i = $nodes->length - 1; $i >= 0; $i--)
		{
			if ($nodes->item($i)->getAttribute($key) == $value)
			{
				$newNode = createNode($xmlDoc, $arrInfoNode['name'], $arrInfoNode['attribute'],
						$arrInfoNode['value']);
				$nodes->item($i)->parentNode->replaceChild($newNode, $nodes->item($i));
				break;
			}
		}
		
		$xmlDoc->save($fileName);
		return 1;
	}
	public function deleteNodeXML($fileName, $name, $value, $key = 'id')
	{
		$xmlDoc = new DOMDocument();
		$xmlDoc->load($fileName);
		
		$nodes = $xmlDoc->getElementsByTagName($name);
		if (!$nodes->item(0))
		{
			// khong ton tai node nay
			return 0;
		}
		for ($i = $nodes->length - 1; $i >= 0; $i--)
		{
			if ($nodes->item($i)->getAttribute($key) == $value)
			{
				//thu hien xoa node
				$nodes->item($i)->parentNode->removeChild($nodes->item($i));
				break;
			}
		}
		
		$xmlDoc->save($fileName);
		return 1;
	}
	#end region
	
	#region Private methods 
	
	/**
	 * Kiểm tra xem file có tồn tại không? Hàm này chỉ nên dùng trong đây để đảm bảo setVar và getVar đúng, còn bên ngoài dùng file_exist là được rồi.
	 *
	 * @param string $filePath Đường dẫn file
	 * @return boolean True -> tồn tại, False -> ko tồn tại
	 *
	 */
	private function checkExists($filePath)
	{
		clearstatcache();
		return is_file($filePath);
	}
	
	/**
	 * Lay thong tin cau hinh tu cacheXMLInfo hoac cacheSQLInfo hoac cacheBusinessInfo 
	 * 
	 * @param $cacheType xml||sql||business: co che cache :XML, SQL,BUSINESS 
	 * @return Mang voi moi phan tu la thong tin cua 1 item
	 * @author PhongHong added [20110413] 
	 */
	private function getCacheInfo($cacheType)
	{
		switch ($cacheType)
		{
			case 'xml':
				$strCacheInfo = 'cacheXMLInfo';
				break;
			case 'sql':
				$strCacheInfo = 'cacheSQLInfo';
				break;
			case 'business':
				$strCacheInfo = 'cacheBusinessInfo';
				break;
		}
		
		$strXMLFileName = global_common::FOLDER_XML. $strCacheInfo . self::XML_EXTENSION;
		
		$arrXML = self::xml2array($strXMLFileName);
		if (!$arrXML)
		{
			return 0;
		}
		
		$arrXML = $arrXML['children'][$strCacheInfo][0]['children']['item'];
		return $arrXML;
		
		
	}
	
	/**
	 * Lay thong tin cau hinh tu cacheXMLInfo hoac cacheSQLInfo hoac cacheBusinessInfo theo KeyInfo
	 * @param $cacheInfo : Mang thong tin cacheInfo
	 * @param $KeyInfo : Tu khoa tim kiem thong tin 
	 * @return Mang chua thong tin cau hinh theo KeyInfo 
	 * @author PhongHong added [20110413] 
	 */
	// TODO: DoNguyen - Theo như anh biết $KeyInfo được truyền vào hoặc RỖNG hoặc là KEY THẬT SỰ (không có trường hợp nào là 'default')
	// Nếu mà đúng như vậy thì hàm này tìm ẩn 1 lỗi: nếu $KeyInfo là KEY THẬT SỰ và tồn tại trong $arrInfo nhưng lúc chạy vòng lặp foreach 
	// nó duyệt qua 'default' trước thì sao? Lúc đó nó trả về giá trị của 'default' -> đây ko phải giá trị chúng ta cần.
	private function getCacheInfoBykey($arrInfo,$type,$keyInfo)
	{
		// TODO: DoNguyen - Đặt tên biến sai quy định: $KeyInfo -> $keyInfo (viết thường ký tự đầu của chữ đầu)
		switch ($type)
		{
			case 'xml':
				$key = 'cxiID';
				break;
			case 'sql':
				$key = 'csiID';
				break;
			case 'business':
				$key = 'cbiID';
				break;			
		}

		// tim keyInfo trong $arrInfo
		foreach ($arrInfo as $item)
		{
			$attr = $item['attribute'];

			if($attr) 
			{
				if($attr[$key]=='default')
				{
					$keyDefault =  $attr;	
				}				
				if ($attr[$key] == $keyInfo )
				{
					$cacheInfo = $attr;
					break;
				}		
			}
		}

		// Neu keyInfo khong co trong list item
		if(!$cacheInfo)
		 {	
			global_common::writeLog('Không tìm thấy keyInfo, sử dụng default key',0);		 
			$cacheInfo = $keyDefault;
		 }
		return $cacheInfo;
	}
	
	/**
	 * Tao/cap nhat du lieu file app tu file xml 
	 * @param $fileName : duong dan toi cache file ( ko bao gom .xml hoac .app)
	 * @param $cnfInfo Thong tin cau hinh cache cua $fileName
	 * @return du lieu moi sau khi cap nhat
	 * @author PhongHong added [20110414] 
	 */	
	private function makeAppCacheXML($fileName,$cnfInfo)
	{
		//global $_cacheXMLInfo;
		$strAppFile = $fileName . self::APP_EXTENSION;
		$strXMLFile = $fileName . self::XML_EXTENSION;
		
		$cxiID      = $cnfInfo['cxiID'];        //key de truy xuat thong tin
		$cxiMaint   = $cnfInfo['cxiMaint'];     // file co phai duoc tao tu mainternace hay khong
		
		if($cxiMaint=='true')
		{
			$cxiABK = $cnfInfo['cxiABK'];       // co tao mang theo key hay khong
			$cxiPN  = $cnfInfo['cxiPN'];        // Node cha
			$cxiIN  = $cnfInfo['cxiIN'];        // Node tung muc  
			$arrData = self::xml2array($strXMLFile); 
			
			$arrData  = $arrData['children'][$cxiPN][0]['children'][$cxiIN];
			$arrTemp  = $arrData;
			
			// TODO: DoNguyen - Xem lại 2 điều: lấy cả ATTRIBUITE và VALUE (nếu có) + Bỏ những thằng noneApp="true"
			unset($arrData);
			for($i=0;$i<count($arrTemp);$i++)
			{
				// Loai bo item co attribute noneApp="true"
				if($arrTemp[$i]['attribute']['noneApp']!='true')
				{   // Kiểm tra cách lưu trữ dữ liệu (attribute hoặc value)
					if($cnfInfo['saveAt']=='value')
					{
						$arrData[$i]['value']= $arrTemp[$i]['value'];  
					}							
					 $arrData[$i]['attribute']= $arrTemp[$i]['attribute'];  						
				}
			}
			
			if($cxiABK=='true')
			{				
				$arrDataTemp = $arrData;
				unset($arrData);
				foreach($arrDataTemp as $item)
				{				
					$arrData[$item['attribute'][$cxiID]] = $item;					
				}  
				
			}
		}
		else
		{
			$arrData = self::xml2array($strXMLFile);
		}
		
		$arrData['_lstupd'] = time();
		self::setVar($fileName,$arrData,$filePath);
		return $arrData;
	}
	
	/**
	 * Tao/cap nhat du lieu file app tu file xml 
	 * @param $sqlResult : Du lieu truy van sql
	 * @param $fileName : Duong dan toi file .app (khong bao gom .app)
	 * @param $cnfInfo Thong tin cau hinh cache cua $fileName
	 * @return du lieu moi sau khi cap nhat
	 * @author PhongHong added [20110416] 
	 */	 
	private function makeAppCacheSQL($sqlResult,$fileName,$cnfInfo)
	{
		$strAppFile = $fileName.self::APP_EXTENSION;
		
		$csiABK  = $cnfInfo['csiABK'];         // Co tao mang theo Key hay khong
		$csiKeyF     = $cnfInfo['csiKeyF'];   //key truy xuat thong tin
		
		if($csiABK=='true')
		{
			$sqlResultTemp = $sqlResult;
			unset($sqlResult);
			foreach($sqlResultTemp as $record)
			{
				$sqlResult[$record[$csiKeyF]] = $record;
			}
		}
		$sqlResult['_lstupd'] = time();
		
		self::setVar($fileName,$sqlResult);
		
		return $sqlResult;		
	}
	
	private function startElementHandler($parser, $name, $attributes)
	{
		global $arrNodes, $strNodeName;
		//set node name
		$strNodeName = $name;
		// process attributes
		$arrNodes[$strNodeName]['attributes'] = $attributes;
	}
	// run when end tag is found
	private function endElementHandler($parser, $name)
	{
		global $strNodeName;
		$strNodeName = "";
	}
	
	// run when cdata is found
	private function characterDataHandler($parser, $cdata)
	{
		global $arrNodes, $strNodeName;
		if ($strNodeName != '')
		{
			$arrNodes[$strNodeName]['value'] = $cdata;
		}
	}
	
	private function createNode($xmlDoc, $name, $attribute, $value)
	{
		$newNode = $xmlDoc->createElement($name);
		foreach ($attribute as $item)
		{
			$newNode->setAttribute($item['name'], $item['value']);
		}
		switch ($value['type'])
		{
			case 1:
				$newNode->appendChild($xmlDoc->createTextNode($value['value']));
				break;
			case 2:
				$newNode->appendChild($xmlDoc->createCDATASection($value['value']));
				break;
		}
		return $newNode;
	}
	
	#end region
	
	/**
	 * Doc noi dung 1 file test
	 *function readTextFile($strFileName)
	 * @param $strFileName Duong dan file
	 * @return tra ve noi dung cua file .txt
	 *
	 */
	function readTextFile($strFileName)
	{
		if(file_exists($strFileName))
		{
			return file_get_contents($strFileName);
		}
		else
		{
			return 0;
		}
		
	}
	
	/**
	 * Ghi noi dung vao mot file text
	 *
	 * @param mixed $strFileName Duong dan file
	 * @param mixed $content Noi dung file
	 * @return mixed Tra ve gia tri 0 neu ghi ko thanh cong
	 *
	 */
	function writeTextFile($strFileName,$content)
	{
		$fp = fopen($strFileName, 'w');		
		fwrite($fp, $content);
		fclose($fp);
		return;
	}
}  

