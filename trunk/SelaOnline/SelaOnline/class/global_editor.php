<?php


/**
 * đây là lớp xử lý của editor
 *
 */
class global_editor
{
	var $objConnection;
	/**
	 * khởi tạo đối tượng user_comment
	 *
	 * @param $object $objConnection kết nối tới CSDL
	 * @return $object đối tượng user_comment
	 * @author TinhDoan added [20101014]
	 *
	 */
	public function global_editor($objConnection)
	{
		$this->objConnection = $objConnection;		
	}
	
	/**
	 * thực hiện lấy nội dung của một page với url
	 *
	 * @param string $url địa chỉ của page
	 * @return array thông tin của page
	 * @author TinhDoan added [20101027]
	 *
	 */
	public function getContentWebPage( $url )
	{
		/*$options = array( 'http' => array(
					'user_agent'    => 'spider',        // who am i
					'max_redirects' => 20,              // stop after 10 redirects
					'timeout'       => 1000,             // timeout on response
					) );*/
		$options = array(
					'http'=>array(
					'method'=>"GET",
					'header'=>	"Host: hellochao.com\r\n" .
					"User-Agent: " . $_SERVER['HTTP_USER_AGENT'] . " \r\n" .
					"Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8 \r\n" .
					"Accept-language: en-us,en;q=0.5\r\n" .
					"Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7\r\n" .
					"Keep-Alive: 300\r\n" .
					"Connection: keep-alive\r\n" .
					"Referer: http://hellochao.com/\r\n" .
					"Cookie: bwd=" . $cookie_val2 . "; " . "bwd_data=" . $cookie_val . "\r\n"
					)
				);
		
		$context = stream_context_create( $options );
		$page    = file_get_contents( $url, false, $context );
		$result  = array( );
		global_common::writeLog("1.getContentWebPage: content: ".$page, 1, "editor.php");
		
		if ( $page != false )
			$result['content'] = $page;
		else if ( !isset( $http_response_header ) )
			return null;    // Bad url, timeout
		
		// Save the header
		$result['header'] = $http_response_header;
		
		// Get the *last* HTTP status code
		$nLines = count( $http_response_header );
		for ( $i = $nLines-1; $i >= 0; $i-- )
		{
			$line = $http_response_header[$i];
			if ( !array_key_exists('http_code', $result) && strncasecmp( "HTTP", $line, 4 ) == 0 )
			{
				$response = explode( ' ', $line );
				$result['http_code'] = $response[1];
			}
			if ( !array_key_exists('content_type', $result) && strncasecmp( "Content-Type", $line, 12 ) == 0 )
			{
				$response = explode( ' ', $line );
				$result['content_type'] = $response[1];
			}
			if ( !array_key_exists('location', $result) && strncasecmp( "location", $line, 8 ) == 0 )
			{
				$response = explode( ' ', $line );
				$result['location'] = $response[1];
			}
		}
		return $result;
	}
	public function e_strpos($haystack,$arrNeedle,$offset=0)
	{
		$pos=false;
		foreach($arrNeedle as $needle)
		{
			$temp=strpos($haystack,$needle,$offset);
			if($temp===false) continue;
			if($pos===false||$temp<$pos) $pos=$temp;
		}
		return $pos;
	}
	public function e_strrpos($haystack,$arrNeedle,$offset=0)
	{
		$pos=false;
		foreach($arrNeedle as $needle)
		{
			$temp=strrpos($haystack,$needle,$offset);
			if($temp===false) continue;
			if($pos===false||$temp>$pos) $pos=$temp+strlen($needle);
		}
		return $pos;
	}
	public function e_ltrim_words($what, $words, $char_list='') 
	{
		if(!is_array($words)) return false;
		$char_list .= " \t\n\r\0\x0B"; // default trim chars
		$pattern = "~^((".implode(")*|(", array_map('preg_quote', $words)).")*)~i";
		$str=$what;
		while(1) {
			$str=ltrim($str,$char_list);
			$temp=preg_replace($pattern, "",$str);
			if(!$temp||$temp===$str) break;
			$str=$temp;
		}
		return $str;
	} 
	public function e_rtrim_words($what, $words, $char_list='') 
	{
		if(!is_array($words)) return false;
		$char_list .= " \t\n\r\0\x0B"; // default trim chars
		$pattern = "~((".implode(")*|(", array_map('preg_quote', $words)).")*)$~i";
		$str=$what;
		while(1) {
			$str=rtrim($str,$char_list);
			$temp=preg_replace($pattern, "",$str);
			if(!$temp||$temp===$str) break;
			$str=$temp;
		}
		return $str;
	} 
	public function e_ltrim($value)
	{
		$arrCharR=array("&nbsp;","<br />");
		$list="< ";
		$value=self::e_ltrim_words($value,$arrCharR);
		//thuc hien xoa bên trái và bên phải
		$n=self::e_strpos($value,$arrCharR);
		if($n===false) return $value;
		//thuc hien xoa ben trai
		$pos=0;$flag=true;
		while($n!==false&&$pos<=$n)
		{
			if($value[$pos]=="<") $flag=false;
			elseif($value[$pos]==">") $flag=true;
			elseif($flag&&strpos($list,$value[$pos])===false) break;
			$pos++;
			if($n===$pos) {
				$temp=substr($value,0,$pos);
				$temp.=self::e_ltrim_words(substr($value,$pos),$arrCharR);
				if($temp===$value) break;
				$value=$temp;
				$n=self::e_strpos($value,$arrCharR,$pos);
				continue;
			}
		}
		while(1) {
			$temp=preg_replace("/<(.)>\s*<\/(.)>/ie", "",$value);
			if($temp===$value) break;
			$value=$temp;
		}
		return ltrim($value);
	}
	public function e_rtrim($value)
	{
		$arrCharR=array("&nbsp;","<br />");
		$list="< ";
		$value=self::e_rtrim_words($value,$arrCharR);
		//thuc hien xoa ben phai
		$n=$pos=self::e_strrpos($value,$arrCharR);
		$end=strlen($value);$flag=true;
		while($n!==false&&$pos<$end)
		{
			if($value[$pos]=="<") $flag=false;
			elseif($value[$pos]==">") $flag=true;
			elseif($flag&&strpos($list,$value[$pos])===false) break; 
			$pos++;
			if($pos===$end){
				$end=strlen($value)-$n;
				$temp=self::e_rtrim_words(substr($value,0,$n),$arrCharR);
				$temp.=substr($value,$n);
				if($temp===$value) break;
				$value=$temp;
				$n=self::e_strrpos($value,$arrCharR);
				if($n===false) break;
				$end=strlen($value)-$end;
				$pos=$n;
			}
		}	
		while(1) {
			$temp=preg_replace("/<(.)>\s*<\/(.)>/ie", "",$value);
			if($temp===$value) break;
			$value=$temp;
		}
		return rtrim($value);
	}
	public function e_trim($value)
	{
		$value=self::e_ltrim($value);
		$value=self::e_rtrim($value);
		return $value;
	}
	/**
	 * thực hiện thay đổi nội dung cho chuỗi được edit
	 *
	 * @param string $strText chuỗi nội dung edit
	 * @return string chuỗi nội dung được an toàn
	 *
	 */
	public function rteSafe($strText,$type='') 
	{
		//$strText=self::removeBlankLine($strText);
		//returns safe code for preloading in the RTE
		$tmpString = $strText;

		
		//nếu trên các thiết bị cầm tay thì thêm 1 phần chuyển từ /r/n sang tag <br />
		/*$mobileDetect = new user_mobile_detect();
		if($mobileDetect->isMobile())
		{
			$tmpString=global_common::RetToBr($tmpString);
		}*/
	
		
		//global_common::writeLog('note: '.$tmpString,0,'course.php');
		//chổ này nên dùng strip_tags($text, '<p><a>');// tham số thứ 2 là những tag chấp nhận được
		$tmpString=self::removeBlankLine($tmpString);
		

		$patterns = array();
		$replacements = array();
		$patterns[0] = '#'.chr(10).'#imsU';
		$patterns[1] = '#'.chr(13).'#imsU';
		$patterns[2] = '#'.chr(11).'#imsU';
		$patterns[3] = '#<script[^>]*>(.*)</script>|<iframe[^>]*>(.*)</iframe>|<iframe[^>]*>#imsU';
		$tmpString=strip_tags($tmpString, '<span><p><a><em><ul><li><ol><br><strong><b><img><pre><h1><h2><h3><h4><h5><h6><address><object><param>');
		if($type=='comment')
		{
			$tmpString=strip_tags($tmpString, '<span><p><a><em><ul><li><ol><br><strong><b>');
			
			$patterns[3] = '#<script[^>]*>(.*)</script>|<img[^>]*>|<iframe[^>]*>(.*)</iframe>|<iframe[^>]*>#imsU';
			
			/*$patterns[4] = '#(?<=style=".*)(color).*;(?=".*)#imsU';
			$patterns[5] = '#(?<=style=".*)(position).*[;](?=".*)#imsU';
			$patterns[6] = '#(?<=style=".*)(background).*[;](?=".*)#imsU';*/
			$patterns[4] = '#color[\s]*:[\s]*[\w\W]*?[\s]*;#is';//position//background
			$patterns[5] = '#position[\s]*:[\s]*[\w\W]*?[\s]*;#is';
			$patterns[6] = '#background[\s]*:[\s]*[\w\W]*?[\s]*;#is';
			
			$replacements[4] = '';
			$replacements[5] = '';
			$replacements[6] = '';
		}		
		$replacements[0] = ' ';		
		$replacements[1] = ' ';
		$replacements[2] = ' ';
		$replacements[3] = '';
		
		$tmpString = preg_replace($patterns, $replacements, $tmpString);
		
		//ch? này nên dùng strip_tags($text, '<p><a>');// tham s? th? 2 là nh?ng tag ch?p nh?n du?c
		return $tmpString;
		
		
		return self::e_trim($tmpString);
		//return $tmpString;
	}
	public function removeBlankLine($content)
	{
		$patterns = array();
		$replacements = array();
		$patterns[0] = '#([\s]<p>('.chr(194).'+\s*)*</p>)+\Z|\A((<p>('.chr(194).'+\s*)*</p>['.chr(32).'])+)#imsU';
		$patterns[1] = '#([\s]<p>\s*</p>)+\Z|\A((<p>\s*</p>\s)+)#imsU';
		$replacements[0] = '';
		$replacements[1] = '';
		$content=preg_replace($patterns, $replacements, $content);//
		return $content;
	}
	
	/**
	 * Loai bo nhung ky tu nguy hiem trong URL de tranh tan cong ENJECTION va thay the ky tu '~' bi ma hoa. Loai cac ky tu sau: ' " #
	 *
	 * @param array $pgR Mang chua tat ca cac du lieu gui qua POST hoac GET
	 * @param array $cookie Mang chua cac para trong cookie
	 * @param array $arrExcept Mang chua cac para se duoc xu ly bang rteSafe
	 * @return mixed This is the return value description
	 * @author DoNguyen added [20110705]
	 * 
	 */
	public function paraSafe(&$pgR, &$cookie, $arrExcept)
	{
		// Khai bao nhung ky tu can tim va thay the
		// Can thay the '%7E' thanh '~' boi vi:
		// Link co ky tu '~' khi post len cac trang khac se tu dong bi ma hoa thanh '%7E'
		//      vi vay can phai replace no lai
		$arrSearch = array('union','concat','select','\'','"','`','#','%7E');
		$arrReplace = array('','','','','','','','~');
		// Tim va thay the nhung para trong URL
		foreach ($pgR as $para=>$value)
		{
			// Neu phan tu nay nam trong danh sach LOAI TRU thi KO XU LY, no duoc xu ly bang ham rteSafe
			if (array_key_exists($para, $arrExcept))
			{
				$pgR[$para] = self::rteSafe($value);
			}else{
				$pgR[$para] = str_ireplace($arrSearch,$arrReplace,$value);
			}
		}
		
		// Tim va thay the nhung para trong COOKIE
		foreach ($cookie as $para=>$value)
		{
			// Neu phan tu nay nam trong danh sach LOAI TRU thi KO XU LY, no duoc xu ly bang ham rteSafe
			if (array_key_exists($para, $arrExcept))
			{
				$cookie[$para] = self::rteSafe($value);
			}else{
				$cookie[$para] = str_ireplace($arrSearch,$arrReplace,$value);
			}
		}
	}
	
	
	/**
	 * thực hiện lấy media link từ một url
	 *
	 * @param string $urlMedia địa chỉ của một page media
	 * @return string chuỗi media link
	 * @author TinhDoan added [20101027]
	 *
	 */
	public function getMediaLinkFromURL($urlMedia)
	{
		// lấy nội dung của page
		$content = self::getContentWebPage($urlMedia);
		global_common::writeLog("1.getMediaLinkFromURL: http_code: ".$content["http_code"], 1, "global_editor.php");
		global_common::writeLog("1.getMediaLinkFromURL: location: ".$content["location"], 1, "global_editor.php");
		global_common::writeLog("1.getMediaLinkFromURL: content: ".$content["content"], 1, "global_editor.php");
		if ( $content['http_code'] == 200 )
		{
			if ( strncasecmp( "application/x-shockwave-flash", $content["content_type"], 29 ) == 0 )
			{
				global_common::writeLog("1.getMediaLinkFromURL: location: ".$content["location"], 1, "global_editor.php");
				if ( !array_key_exists('location', $content) )
				{
					$content["location"] = $urlMedia;
				}
				return "width:'420',height:'320',movie:'".$content["location"]."'";
			}
			// thực hiện lấy url media new từ nội dung vừa đọc được
			$newURLMedia = self::getMediaLinkFromContent($content["content"]);
			// nếu không lấy được new media link từ nội dung của page media
			if ( $newURLMedia == "" )
			{
				// thực hiện lấy new media link từ url media trước đó
				$newURLMedia = self::trygetMediaLinkFromURL($urlMedia);
			}
			// nếu lấy được new media link
			if ($newURLMedia)
			{
				// thực hiện lấy media link lại từ địa chỉ new media link
				return self::getMediaLinkFromURL($newURLMedia);
			}
		}
		return "";
	}
	
	/**
	 * thực hiện lấy new url media từ một url media
	 *
	 * @param string $urlMedia địa chỉ trang media
	 * @return string địa chỉ url media mới
	 * @author TinhDoan added [20101027]
	 *
	 */
	private function trygetMediaLinkFromURL($urlMedia)
	{
		if ( strpos( $urlMedia, 'http://www.youtube.com' ) === 0 ) 
		{
			return strpos($urlMedia, "v=") ? ("http://www.youtube.com/v/". substr( $urlMedia, strpos($urlMedia, "v=") + 2)) : "";
		}
		if ( strpos( $urlMedia, 'http://video.google.com/videoplay?docid=' ) === 0) 
		{
			return "http://video.google.com/googleplayer.swf?docId=".substr( $urlMedia, strlen("http://video.google.com/videoplay?docid=") )."&hl=en";
		}
		if ( strpos( $urlMedia, 'http://www.dailymotion.com/video/' ) === 0) 
		{
			return strpos( $urlMedia, '_') > 0 ? 
				('http://www.dailymotion.com/swf/video/'.substr( $urlMedia, strlen('http://www.dailymotion.com/video/'),strpos( $urlMedia, '_') ).'?additionalInfos=0') 
				: "";
		}
		
		return "";
	}
	
	/**
	 * resize images too large
	 *
	 * @param mixed $content This is a description
	 * @return mixed This is the return value description
	 *
	 */
	 /*
	private function resizeImage($content)
	{
		
		$pattern='#<img[^>]*>#imsU';
		preg_match_all($pattern, $content, $matches);
		$matches=$matches[0];
		$i=0;
		foreach($matches as $linkImage)
		{
			$pattern='#(?<=src=").*(?=["])#imsU';
			preg_match($pattern, $linkImage, $matche);
			$src=$matche[0];	
			
			$size=getimagesize( $src );
			$arrInfo[$i]['size']=$size;
			$strReplace='';
			if($size[0]>550)
			{
				$strReplace=$arrInfo[$i]['resized']='<a href="'.$src.'" target="_blank"><img src="'.$src.'" width="550px" boder="0"></a>';
			}
			else
			{
				$strReplace=$arrInfo[$i]['resized']='<img src="'.$src.'">';
			}
			$content=str_replace($linkImage,$strReplace,$content);

		}
		return $content;
		
	}*/
	/**
	 * lấy đĩa chỉ media url từ một chuỗi nội dung của một trang media
	 *
	 * @param string $content nội dung của trang media
	 * @return string link trang media
	 * @author TinhDoan added [20101027]
	 *
	 */
	private function getMediaLinkFromContent($content)
	{
		// khởi tạo media link kết quả
		$urlMedia = "";
		
		$content = str_replace("&lt;", "<", $content);
		$content = str_replace("&gt;", ">", $content);
		
		preg_match_all('|<object[^>]*>(.*)</object>|Ui', $content, $matches, PREG_SET_ORDER);
		
		foreach($matches as $item)
		{
			if ( strpos($item[0],"name=\"movie\"") || ( strpos($item[0],"name=") && strpos($item[0],"movie") ) )
			{
				$strResult = "";
				preg_match_all('|<[(object)(embed)][^>]+>|Ui', $item[0], $matches, PREG_SET_ORDER);
				foreach($matches as $citem)
				{
					$patterns = array('/<object/i', '/<embed /i', '/>/');
					$strResult .= preg_replace($patterns, ' ', $citem[0]);
				}
				$patterns = array('/\'/', '/\s/', '/="/', '/"/');
				$replacements = array('"', '', ":'", "',");
				$strResult = preg_replace($patterns, $replacements, $strResult);
				preg_match_all('|<param[^>]+>|Ui', $item[0], $matches, PREG_SET_ORDER);
				foreach($matches as $citem)
				{
					preg_match('|name*=*["\'](.*)["\']|Ui', $citem[0], $mnv, PREG_OFFSET_CAPTURE);
					$strResult .= $mnv[1][0];
					preg_match('|value*=*["\'](.*)["\']|Ui', $citem[0], $mnv, PREG_OFFSET_CAPTURE);
					$strResult .= ":'".$mnv[1][0]."',";
				}
				
				$pMedia = strpos($strResult,"movie:'") + 7;
				$urlMedia = ( $pMedia == 7 ) ? "" : substr($strResult, $pMedia, strpos($strResult,"',", $pMedia) - $pMedia );
			}
		}
		// thực hiện trả kết quả về
		return $urlMedia;
	}
}
?>