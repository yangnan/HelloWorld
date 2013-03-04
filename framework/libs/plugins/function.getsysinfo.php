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
 * Name:     foot_nav<br>
 * Purpose:  to get the foot nav string<br>
 * @link http://smarty.php.net/manual/en/language.function.eval.php {eval}
 *       (Smarty online manual)
 * @author jeffxie<jeffxie@boshengsoft.com> 2011-01-06
 * @param array
 * @param Smarty
 */
function smarty_function_getsysinfo($params,&$smarty)
{
    $conn = DBFactory::createDb(__DATANAME__);
    $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."config","*");
	$str = $conn->getRow($strSQL);
    if($params["str"] == "logo")
    {
        return empty($str["config_website_logo"])||!file_exists("uploadfiles/".$str["config_website_logo"])?"logo.png":$str["config_website_logo"];
    }

}

/* vim: set expandtab: */

?>
