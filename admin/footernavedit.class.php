<?PHP

/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-11
 **/
require_once("common/permission.php");
class Footernavedit extends Tp{

	public function initInstance() {
	    $this->selectUp();
		$navdata=$this->selUp();
		$this->assign("navdata",$navdata);
		$this->assign("bigclass",$this->readBigClass());
		$this->display("footernavadd.html");
	}


	public function selUp(){
		$id=$_GET['id'];
	    $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."foot_nav","*",array(array("id","=","$id")),array("1"));
		return $this->conn->getRow($strSQL);
	}
   public function selectUp(){

      if($_POST['Submit']){
	     $id=$_GET['id'];
	     $foot_nav_title=$_POST['nav_title'];
		 $foot_nav_link=$_POST['nav_link'];
		 $foot_nav_sorting=$_POST['nav_sorting'];
         $foot_nav_pubtime = time();
		 $bigclass = $_POST["bigclass"];
         $content = $_POST["gg_content"];
         $strSQL = SqlBuilder::buildUpdateSql(__PREFIX_TAB__ ."foot_nav",array("fid"=>$bigclass,"foot_nav_title"=>"$foot_nav_title","foot_nav_link"=>"$foot_nav_link","foot_nav_sorting"=>$foot_nav_sorting,"foot_nav_pubtime"=>$foot_nav_pubtime,"content"=>$content),array(array("id","=","$id")));
        if($this->conn->execute($strSQL)){
            H(lang_cp::$_TGLOBAL['uilang']['editor'].lang_cp::$_TGLOBAL['uilang']['success'],"./admin.php?tg=/footernavlist/");
        }else{
            H(lang_cp::$_TGLOBAL['uilang']['editor'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);
        }
	  }

   }
		//ȡ
		public function readBigClass()
		{
			$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."foot_nav","*",array(array("fid","=",0)));
			return $this->conn->getAll($strSQL);
		}
}
