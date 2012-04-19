<?php
/**
 * Class de thuc thi nhung chuc nang o muc he thong
 *
 * @author ThanhViet added [20120401]
 * 
 */


/**
 * Lớp chỉ định những hàm liên quan tới hệ thống, thư mục.
 *
 */
class global_system
{
	#region global_common
	
	const LCT_FRONT_END           =1;
	const LCT_BACK_END            =2;
	const LCT_FRONT_END_M         =3;
	const LCT_BACK_END_M          =4;
	
	const REFRESH_TIME = 2;
	
	#end region
	
	#region Variables

	// Cho biết đang đâu: front_end, back_end, mobile,...
	var $_iLocation;
	// Cho biết đang ở màn hình nào: index, search, forum,...
	var $_pName;
	// Cho biết đường dẫn trang hiện tại: http://static.hellochao.com/, http://hellochao.com/games/
	var $_curPath;
	
	#end region
	
	#region Constructors
	
	/**
	 * Contructor for this class
	 *
	 * @param int $location Cho biet location hien tai
	 * @author DoNguyen [20101007]
	 *
	 */
	public function global_system($location)
	{
		$this->_iLocation = $location;
		// Khởi tạo các biến toàn cục
		$this->_pName = $this->getPageName();
		$this->_curPath = $this->curPathURL();
	}
	
	#end region
	
	#region Public methods
		
	/**
	 * Tao duong dan tuong doi cua 1 page tuy thuoc vao location hien tai
	 *
	 * @param string $strPage Page can tao URL
	 * @return string This is the return value description
	 * @author DoNguyen [20101007]
	 */
	public function buildRelativeURL($strPage)
	{
		$prefixURL = "";
		
		switch ($this->_iLocation)
		{
			case self::LCT_FRONT_END: // 1: Front-end
				// Do thing
				break;
			
			case self::LCT_BACK_END: // 2: Back-end
				$prefixURL = "../";
				break;
			
			case self::LCT_FRONT_END_M: // 3: Front-end (for mobile)
				// Do thing
				break;
			
			case global_common::LCT_BACK_END_M: // 4: Back-end (for mobile)
				// Do thing
				break;
		}
		
		return $prefixURL.$strPage.'?uptime='.self::REFRESH_TIME;
	}
	
	/**
	 * Build full đường dẫn HTTP cho IMAGES (sử dụng constant: FOLDER_IMAGE_HTML)
	 *
	 * @param string $fileName Tên file hình
	 * @return string Đầy đủ đường dẫn HTTP của file hình
	 * @author DoNguyen added [20110408]
	 * 
	 */
	public function locateImg($fileName)
	{
		return self::buildRelativeURL(global_common::FOLDER_IMAGE_URL.$fileName);
	}
	
	/**
	 * Build full đường dẫn HTTP cho CSS (sử dụng constant: FOLDER_CSS_HTML)
	 *
	 * @param string $fileName Tên file css
	 * @return string Đầy đủ đường dẫn HTTP của file css
	 * @author DoNguyen added [20110408]
	 * 
	 */
	public function locateCss($fileName)
	{
		return self::buildRelativeURL(global_common::FOLDER_CSS_URL.$fileName);
	}
	
	/**
	 * Build full đường dẫn HTTP cho JS (sử dụng constant: FOLDER_JS_HTML)
	 *
	 * @param string $fileName Tên file JS
	 * @return string Đầy đủ đường dẫn HTTP của file JS
	 * @author DoNguyen added [20110408]
	 * 
	 */
	public function locateJs($fileName)
	{
		return self::buildRelativeURL(global_common::FOLDER_JS_URL.$fileName);
	}
	
	/**
	 * Build full đường dẫn HTTP cho IMAGES của NEWS (sử dụng constant: FOLDER_IMAGE_NEWS_HTML)
	 *
	 * @param string $fileName Tên file image
	 * @return string Đầy đủ đường dẫn HTTP của file image của news
	 * @author DoNguyen added [20110408]
	 * 
	 */
	public function locateImgNews($fileName)
	{
		return self::buildRelativeURL(global_common::FOLDER_IMAGE_NEWS_URL.$fileName);
	}
	
	/**
	 * Build đường dẫn HTTP cho avatar của user
	 *
	 * @param string $fileName Tên file làm avatar
	 * @return string Đường dẫn đầy đủ của avatar của user
	 *
	 */
	public function locateImgUser($fileName)
	{
		return self::buildRelativeURL(global_common::FOLDER_IMAGE_USERS_URL.$fileName);
	}
	#end region
	
	#region Private methods
	
	
	/**
	 * Lấy về tên trang hiện hành (không có phần đuôi .php): index, search, keywords, forum,...
	 *
	 * @return string Tên trang
	 * @author DoNguyen added [20110413]
	 */
	private function getPageName()
	{
		// Lấy giá trị từ trong SCRIPT_NAME của $_SERVER để tính: /games/index.php, /index.php -> index
		$posSlash = strrpos($_SERVER['SCRIPT_NAME'],'/'); // Tìm vị trí dấu / từ sau ra trước

		return substr($_SERVER['SCRIPT_NAME'], $posSlash + 1, strrpos($_SERVER['SCRIPT_NAME'],'.') - $posSlash - 1);
	}
	
	
	/**
	 * Lấy đường dẫn HTTP hiện tại (không bao gồm tên trang và parameter): http://static.hellochao.com/, http://hellochao.com/games/
	 *
	 * @return string Đường dẫn HTTP sau khi đã xử lý
	 * @author DoNguyen added [20110413]
	 */
	private function curPathURL() {
		$pageURL = 'http';
		if ($_SERVER['HTTPS'] == 'on') // Kiểm tra nếu đang request bằng HTTPS
		{
			$pageURL .= 's';
		}
		$pageURL .= '://';
		
		// Cần xử lý URI trước khi gắn vào:
		//     /games/?g=hang_man.swf -> /games/
		//     /index.php#!/index.php?p=3 -> /
		$curURI = $_SERVER['REQUEST_URI'];
		$lenURI = strpos($curURI,'#');
		// Bỏ từ dấu # trở đi
		if ($lenURI !== false)
		{
			$curURI = substr($curURI, 0, $lenURI);
		}
		$posSlash = strrpos($curURI,'/'); // Tìm vị trí dấu / từ sau ra trước
		$curURI = substr($curURI, 0, $posSlash + 1); // Cắt URI theo yêu cầu
		
		// Kiểm tra dùng port 80 hay port khác, nếu port khác 80 phải gắn thêm port vào
		if ($_SERVER['SERVER_PORT'] != '80') {
			$pageURL .= $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].$curURI;
		} else {
			$pageURL .= $_SERVER['SERVER_NAME'].$curURI;
		}
		
		return $pageURL;
	}
	
	#end region
}

?>