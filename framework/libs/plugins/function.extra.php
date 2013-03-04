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
function smarty_function_extra($params,&$smarty)
{
    extract($params);
    $conn = DBFactory::createDb(__DATANAME__);
    $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."extra","*",array(array("status","=",1)),"",array("pubtime"=>"DESC"));
	$data = $conn->getRow($strSQL);
    $str = "";
    if(empty($data))
    {
    $str .= '<img height="332" width="204" src="templates/default/images/pic01.jpg">';
    }
    else{
        $str .= $data["extra_content"];
    }
    return $str;

}

?>
