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
 * @author jeffxie<jeffxie@gmail.com> 2011-01-07
 * @param array
 * @param Smarty
 * @param 获取静态文件路径
 */

function smarty_function_getstaticpath($params,&$smarty)
{

    return "templates/".T();

}





/* vim: set expandtab: */

?>
