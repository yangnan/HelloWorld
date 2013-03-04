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
function smarty_function_nav($params,&$smarty)
{
    extract($params);
	$language = getLanguage();
    $conn = DBFactory::createDb(__DATANAME__);
    $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."nav","*",array(array("nav_lang","=",$language)),"",array("nav_sorting"=>"ASC"));
	$data = $conn->getAll($strSQL);
    //城市切换
    $str .= '<div id="city" class="city" style="display:none">';
    $str .= '	<ul>';

    $strSQL2 = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."city","*",array(array("nav_language ","=",$language),array("status","=",0)),"",array("sorting"=>"DESC"));
	$data2 = $conn->getAll($strSQL2);
    $dataLen2 = count($data2);
    for($i=0;$i<$dataLen2;$i++)
    {
            $str .= '<li><a href="?tg=/index/details/city/'.$data2[$i]['city_initials'].'">'.$data2[$i]['city_name'].'</a></li>';
    }



    $str .= '	</ul>';
    $str .= '</div>';
    $str .= '<div class="nav">';
    $str .= '<ul>';

    $dataLen = count($data);
    for($i=0;$i<$dataLen;$i++)
    {
        $str .= '<li><a href="'.$data[$i]["nav_link"].'">'.$data[$i]["nav_title"].'</a></li>';;
    }
    return $str;

}


?>
