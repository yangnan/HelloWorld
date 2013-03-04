<?PHP

/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  jeffxie<jeffxie@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-6
 **/
require_once("common/permission.php");
class Index extends Tp{
	public function initInstance() {
		
		$this->display("index.html");
	}
}