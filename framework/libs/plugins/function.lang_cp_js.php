<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty {eval} function plugin
 *
 * Type:     function<br>
 * Name:     eval<br>
 * Purpose:  evaluate a template variable as a template<br>
 * @link http://smarty.php.net/manual/en/language.function.eval.php {eval}
 *       (Smarty online manual)
 * @author jeffxie<jeffxie@boshengsoft.com> 2011-1-10
 * @param array
 * @param Smarty
 */
function smarty_function_lang_cp_js($params='',&$smarty)
{
	$language = getLanguage();
	if(!empty($language))
	{
		//如果语言设置为空，那么读取数据库，以数据库设置为准
		 $conn = DBFactory::createDb(__DATANAME__);
		 $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."config","*",array(array("id","=",1)),array(0,1));
		 $result = $conn->getRow($strSQL);
		 $_SESSION["language"] = $result["config_language"];
	}
	$lanAdminPath = "templates/admin/js/language/language_".getLanguage().".js";
	return $lanAdminPath;
}
/* vim: set expandtab: */

?>
