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
function smarty_function_geturl($params,&$smarty)
{
    if($params["str"] == 1)
    {
        return $_SERVER["HTTP_REFERER"];
    }
    else{
        return "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    }

}


?>
