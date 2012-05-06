/***************************************************************
*
* Name         : Class thuc hien nhung chuc nang o muc he thong
* Desciption   :
* Author       : DoNguyen
* Created on   : 20101007
* 
* ************************************************************/

// Cac constant duoc su dung cho class nay
var LCT_FRONT_END           =1;
var LCT_BACK_END            =2;
var LCT_FRONT_END_M         =3;
var LCT_BACK_END_M          =4;


function global_system(location)
{
    
    var _iLocation = location; // 1: Front-end; 2: Back-end; 3: Front-end (for mobile); 4: Back-end (for mobile)
    var _isLogin = 0; // 0: chua login; 1: da login

    /**
    * Tao duong dan tuong doi cua 1 page tuy thuoc vao location hien tai
    * @param string strPage Page can tao URL
    * @return string URL sau khi da tao cho phu hop voi location
    *
    * @author DoNguyen [20101007]
    */
    this.buildRelativeURL = function(strPage)
    {
        var prefixURL = "";
        switch(_iLocation)
        {
            case LCT_FRONT_END: // 1: Front-end
                // Do thing
                break;
                
            case LCT_BACK_END: // 2: Back-end
                prefixURL = "../";
                break;

            case LCT_FRONT_END_M: // 3: Front-end (for mobile)
                // Do thing
                break;
                
            case LCT_BACK_END_M: // 4: Back-end (for mobile)
                // Do thing
                break;
        }
        
        return prefixURL + strPage;
    }
    
    /**
    * Tra ve location hien tai
    * @return int Location hien tai
    *
    * @author DoNguyen [20101007]
    */
    this.getLocation = function()
    {
        return _iLocation;
    }
}