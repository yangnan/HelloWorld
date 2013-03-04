<?php
/**
 * Language packages
 *
 * This is a Language packages config files.
 *
 * @copyright JeffCMS (c)2010 www.thinkgroupon.com
 * @author jeffxie <jeffxie@gmail.com>
 * @version $Id: template.php, v 0.0.1 2010-8-20
 */
require_once(__FRAME__ . "/libs/Smarty.class.php");
class Tp extends Smarty{
    public $conn;
    public function __construct() {
        //配置
	    $this->conn = DBFactory::createDb(__DATANAME__);
        $this->template_dir = __ROOT__ . "/templates";
        $this->compile_dir = __ROOT__ . "/cache";
       // $this->cache_dir = __ROOT__ . "/cache";
        $this->left_delimiter = "<!--{";
        $this->right_delimiter = "}-->";
    }



    public function display($tplname="") {
        if(!empty($tplname))
        {
            parent::display($tplname);
        }
        else{
            //获取默认静态文件名称
            parent::display($this->template_dir . "/" .getUrlFile() . "/" .$_GET["view"] . ".html");
        }
    }


    //后置加载
    public function loads() {
            require_once(__ROOT__ . "/configure/language.config.php"); //加载语言包
    }

}
