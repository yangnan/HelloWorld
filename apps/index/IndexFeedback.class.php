<?PHP
/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  jialisong<jialisong@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-2-12
 **/


class IndexFeedback extends Tp{
	public function initInstance() {
		$this->putInsert();
        $this->assign("seo",$this->getSeo());
		$this->display("index/feedback.html");
	}

	public function putInsert(){
		if($_POST["upto"])
		{
			$name = $_POST["name"];
			$tel = $_POST["tel"];
			$email = $_POST["email"];
			$title = $_POST["title"];
			$content = $_POST["content"];
			$time = time();
			if($name != "" && $tel != "" && $email != "" && $title != "" && $content != ""){
					$strSQL = SqlBuilder::buildInsertSql(__PREFIX_TAB__ ."suggestion",array("suggestion_title"=>"$title","suggestion_content"=>"$content","suggestion_name"=>"$name","suggestion_tel"=>"$tel","suggestion_email"=>"$email","pubtime"=>"$time"));
					$this->conn->execute($strSQL);
					H(lang_cp::$_TGLOBAL['uilang']['submit'].lang_cp::$_TGLOBAL['uilang']['success'],"",1);
			  }else{
					H(lang_cp::$_TGLOBAL['uilang']['submit'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);
			  }

		}
	}
//获取seo信息
    public function getSeo() {
        $getSelfUrl = getUrl();
        $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."seo","*",array(array("seo_page_address","=",$getSelfUrl)));
	    $seoinfo = $this->conn->getRow($strSQL);
        return $seoinfo;

    }

}
?>