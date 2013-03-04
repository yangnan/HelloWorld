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
$language = getLanguage();
if(empty($language))
{
    //如果语言设置为空，那么读取数据库，以数据库设置为准
     $conn = DBFactory::createDb(__DATANAME__);
	 $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."config","*",array(array("id","=",1)),array(0,1));
	 $result = $conn->getRow($strSQL);
     $_SESSION["language"] = $result["config_language"];
}
$lanPath = __ROOT__ . "/language/language_cn";
require_once($lanPath . "/lang_cp.php");
require_once($lanPath . "/lang_message.php");
require_once($lanPath . "/language_cp.php");
require_once($lanPath . "/language_message.php");
