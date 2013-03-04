<?PHP
/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  jeffxie<jeffxie@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-7
 **/
class Logout extends Tp{
	public function initInstance() {
            $_SESSION["adminuser"] = "";
            $_SESSION["admininfo"] = "";
            H(lang_cp::$_TGLOBAL['uilang']['exit'],"?tg=/login");
    }
}