<?PHP
/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  jialisong<jialisong@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-2-12
 **/


class IndexTigongtuangouxinxi extends Tp{
	public function initInstance() {
		$this->putInsert();
        $this->assign("seo",$this->getSeo());
		$this->display("index/tigongtuangouxinxi.html");
	}
//获取seo信息
    public function getSeo() {
        $getSelfUrl = getUrl();
        $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."seo","*",array(array("seo_page_address","=",$getSelfUrl)));
	    $seoinfo = $this->conn->getRow($strSQL);
        return $seoinfo;

    }
	public function putInsert(){
		if($_POST["upto"])
		{
			$name1 = $_POST["name1"];
			$tel = $_POST["tel"];
			$input2 = $_POST["input2"];
			$city = $_POST["city"];
			$content = $_POST["textarea"];
			$time = time();
			if($name1 != "" && $tel != "" && $input2 != "" && $city != "" && $content != ""){
					$strSQL = SqlBuilder::buildInsertSql(__PREFIX_TAB__ ."provide",array("provide_username"=>"$name1","provide_telphone"=>"$tel","provide_contact"=>"$input2","provide_city"=>"$city","provide_content"=>"$content","pubtime"=>"$time"));
					$this->conn->execute($strSQL);
					H(lang_cp::$_TGLOBAL['uilang']['submit'].lang_cp::$_TGLOBAL['uilang']['success'],"",1);
			  }else{
					H(lang_cp::$_TGLOBAL['uilang']['submit'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);
			  }

		}
	}

}
?>