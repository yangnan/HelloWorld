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
 * @author jeffxie<jeffxie@gmail.com> 2011-01-06
 * @param array
 * @param Smarty
 */
function smarty_function_frilink($params,&$smarty)
{
    extract($params);
    $conn = DBFactory::createDb(__DATANAME__);
    $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."frilink","*","","",array("id"=>"ASC"));
	$data = $conn->getAll($strSQL);
    $str = "";
    $dataLen = count($data);
    $str .= "<ul>";
    for($i=0;$i<$dataLen;$i++)
    {
        $str .= '<li style="clear:none"><a href="'.$data[$i]["frilink_url"].'" target="_blank">'.$data[$i]["frilink_title"].'</a></li>';;
    }
    $str .= "</ul>";
    return $str;

}

?>
