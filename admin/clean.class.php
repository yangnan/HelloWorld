<?PHP

/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-13
 **/
require_once("common/permission.php");
class clean extends Tp{

	public function initInstance() {
        if($_POST)
        {
            dir_clear(__ROOT__ . "/cache/");
            dir_clear(__ROOT__ . "/templates_c/");
            H("缓存清理成功!");
        }
		$this->display("clean.html");
	}
}
?>
