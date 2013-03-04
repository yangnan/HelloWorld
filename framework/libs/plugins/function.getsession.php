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
function smarty_function_getsession($params,&$smarty)
{
    extract($params);
	if(!$_SESSION["username"])
	{
		$str = '<li><a href="?tg=/index/login">'.lang_cp::$_TGLOBAL['uilang']["login"].'</a></li>';
		$str .= '<li><a href="?tg=/index/register">'.lang_cp::$_TGLOBAL['uilang']["registered"].'</a></li>';
	}else{
		$str = '<li><a href="?tg=/vip/index">欢迎您登录'.$_SESSION["username"].'</a>&nbsp;&nbsp;<a href="?tg=/vip/index/logstate/logout">退出</a></li>';
	}
    return $str;

}


?>
