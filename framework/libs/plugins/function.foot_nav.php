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
function smarty_function_foot_nav($params,&$smarty)
{
	$language = getLanguage();
    $conn = DBFactory::createDb(__DATANAME__);
    $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."foot_nav","*",array(array("foot_nav_lang","=",$language),array("fid","=",0)),"",array("foot_nav_sorting"=>"ASC"));
	$nav_foot_arr = $conn->getAll($strSQL);
	foreach($nav_foot_arr as $key=>$val)
	{
		$str .= "<ul>";
        if(empty($val["foot_nav_link"]))
        {
            $str .= '<li><a href="?tg=/aboutinfo/otherinfo/id/'.$val["id"].'" class="font13">'.$val["foot_nav_title"].'</a></li>';
        }
        else{
		    $str .= '<li><a href="'.$val["foot_nav_link"].'" class="font13">'.$val["foot_nav_title"].'</a></li>';
        }
		$strSQL2 = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."foot_nav","*",array(array("foot_nav_lang","=",$language),array("fid","=",$val["id"])),"",array("foot_nav_sorting"=>"ASC"));
		$nav_foot_son_arr = $conn->getAll($strSQL2);
		foreach($nav_foot_son_arr as $key2=>$val2)
		{
            if(empty($val2["foot_nav_link"]))
            {
                $str .= '<li><a href="?tg=/aboutinfo/otherinfo/id/'.$val2["id"].'" class="font12">'.$val2["foot_nav_title"].'</a></li>';
            }
            else{
                $str .= '<li><a href="'.$val2["foot_nav_link"].'" class="font12">'.$val2["foot_nav_title"].'</a></li>';
            }
		}
		$str .= '</ul>';
	}
    return $str;

}

/* vim: set expandtab: */

?>