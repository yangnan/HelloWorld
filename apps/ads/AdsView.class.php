<?PHP
/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  jeffxie<jeffxie@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-17
 **/
L(__FRAME__."/shop/ShopCar.class.php");
class AdsView extends Tp{
	public function initInstance() {
        $adsData = $this->getAdsData($_POST["id"]);
        echo $adsData;
	}

	//get pay info
	public function getAdsData($id)
	{
        $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."ads","*",array(array("ads_page","=",$id),array("ads_end_time",">",time())));
        $adsData = $this->conn->getRow($strSQL);

        $img = '<img src="templates/'.T().'images/banner.gif">';
        $adsData = empty($adsData["ads_content"])?$img:"<span id=\'banner_content\'>".$adsData["ads_content"]."</span>";
        return $adsData;
	}

}
