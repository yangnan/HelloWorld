<?PHP

/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-13
 **/
require_once("common/permission.php");
class Seoedit extends Tp{

	public function initInstance() {
		$this->saveData();
		$this->assign("link_url",$this->link_url());
        $this->assign("arr_seo",$this->seo_select());
		$this->display("seoedit.html");
	}

    public function seo_select(){
	   $id=$_GET['id'];
	   $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."seo","*",array(array("id","=","$id")));
	   return $this->conn->getRow($strSQL);
	}
	public function saveData(){
		//获取传过来的POST值

		if($_POST['Submit'])

		{
			$page_title = $_POST['page_title'];
			$keywords = $_POST['keywords'];
			$search = $_POST['search'];
			$page = $_POST['page'];
			$pubtime=time();
			$id=$_GET['id'];
			$strSQL = SqlBuilder::buildUpdateSql(__PREFIX_TAB__ ."seo",array("seo_title"=>"$page_title","seo_keywords"=>"$keywords","seo_page_address"=>"$page","seo_descript"=>"$search","seo_pubtime"=>"$pubtime"),array(array("id","=","$id")));

					//执行函数
				if($this->conn->execute($strSQL)){
					H(lang_cp::$_TGLOBAL['uilang']['editor'].lang_cp::$_TGLOBAL['uilang']['success'],"./admin.php?tg=/seolist/");
				}else{
					H(lang_cp::$_TGLOBAL['uilang']['editor'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);
				}
        }
    }
	public function link_url(){
	   $handle  = opendir('apps');
		$arr = array();
		while($file = readdir($handle)){
		 $newpath="apps/".$file;
		 if(is_dir($newpath)){ 
			$arr[] = $newpath ;
		 }
		} 
		$arr1=array();
		foreach($arr as $key=>$val){
		   if(ereg("(apps\/\.)",$val) || ereg("(apps\/\.\.)",$val) || eregi("(apps\/\.svn)",$val)){
		      unset($val);
		   }
		  
		  $handle1  = opendir($val);
		  while(@$file1 = readdir($handle1)){
			 $arr1[] = $file1; 
		  } 
		}
		$arr2=array_unique($arr1); //去重	
		$arr3=array();
		foreach($arr2 as $key1=>$val1){
		   if(preg_match("/^\.(.*)/",$val1)){
		      			 
		      unset($arr2[$key1]);

		   }
		   	   
		}
		sort($arr2);
		for($i=0;$i<count($arr2);$i++){
		   $arr3[$i]=preg_replace( "/\.class\.php/","",$arr2[$i]); //去掉.class.php

		}

		$arr4=array();
		foreach($arr3 as $key2=>$val2){
		   
		   $arr4[]=preg_split('/(?=[A-Z])/',$val2);//去掉
		  
		}
		$arr5=array();
		foreach($arr4 as $key3=>$val3){
		   unset($val3[0]);
		   $arr5[]="?tg=/".strtolower($val3[1])."/".strtolower($val3[2]);
		   
		}
		return $arr5;
	}
}