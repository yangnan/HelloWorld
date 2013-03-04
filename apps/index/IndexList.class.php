<?PHP
/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-01-11
 **/

class IndexList extends Tp{
	private $cityid;
	private $language;
	public function initInstance() {
		$this->language = getLanguage();
		//每页显示条数 xuqinghua 2011-01-11
	    $perpage = 12;
	   //实例化分页类
		$pager = new pageList(count($this->getAll()),'',$perpage);
        if(!empty($_GET["city"])){
            $this->cityid = $_GET["city"];

        }
        else if(!empty($_SESSION["city_initials"])){
            	$this->cityid = $_SESSION["city_initials"];

        }
        else{
            $this->cityid = "beijing";
        }


		//查询每页内容
		$listdata = $this->getData($pager->getStartRow(),$pager->perpage);
		$this->assign("pager",$pager);
        $this->assign("seo",$this->getSeo());
		$this->assign("list",$listdata);
		$this->display("index/list.html");


	}
//获取seo信息
    public function getSeo() {
        $getSelfUrl = getUrl();
        $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."seo","*",array(array("seo_page_address","=",$getSelfUrl)));
	    $seoinfo = $this->conn->getRow($strSQL);
        return $seoinfo;

    }
	//列表 xuqinghua 2011-01-11
	public function getData($start,$end){
        $citysql = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."city","*",array(array("city_initials","=",$this->cityid)));
	    $cityid = $this->conn->getRow($citysql);
        $_SESSION["city_initials"] = $cityid["city_initials"];
        $_SESSION["cityid"] = $cityid["id"];
        $_SESSION["cityname"] = $cityid["city_name"];

		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."groupon_info","*",array(array("groupon_city_id ","=",$cityid["id"]),array("groupon_language","=",$this->language)),array($start,$end),array("id"=>"desc"));
		$listdata = $this->conn->getAll($strSQL);
		for($i=0;$i<count($listdata);$i++)
        {
                    $picTmp = split(",",$listdata[$i]['groupon_pic']);
                    $listdata[$i]['groupon_pic'] = $picTmp[0];

        }
	if(empty($listdata))
	{
		H("","?tg=/aboutinfo/subscribe");
	}
	else{
        	return $listdata;
	}


	}
	//获取总数  分页用 xuqinghua 2011-01-11
	public function getAll(){
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."groupon_info","id",array(array("groupon_city_id ","=",$this->cityid)));
		return $this->conn->getAll($strSQL);
	}

}
