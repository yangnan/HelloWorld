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
function smarty_function_getcity($params,&$smarty)
{
    extract($params);
	$language = getLanguage();
    $conn = DBFactory::createDb(__DATANAME__);
    //城市切换
//省
    $strSQL1 = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."p_c","*",array(array("nav_language ","=",$language)));
	$data1 = $conn->getAll($strSQL1);
    $dataLen1 = count($data1);

    for($i=0;$i<$dataLen1;$i++)
    {
            $str .= '<dl style="background: none repeat scroll 0% 0% rgb(255, 255, 255);">';
            $str .= '<dt>'.$data1[$i]['p_c_name'].'</dt>';//输出省
            $str .= '<dd>';
            //循环城市
            $cityall = getcity($data1[$i]['id']);
            for($j=0;$j<count($cityall);$j++)
            {
                $str .= '<a href="?tg=/index/details/city/'.$cityall[$j]['city_initials'].'">'.$cityall[$j]['city_name'].'</a>';
            }
            //循环城市结束
            $str .= '</dd>';
            $str .= '</dl>';
    }

    return $str;

}

function getcity($pid) {
	$language = getLanguage();
    $conn = DBFactory::createDb(__DATANAME__);
    $strSQL1 = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."city","*",array(array("nav_language ","=",$language),array("fid","=",$pid)),"",array("sorting"=>"DESC"));
	$data1 = $conn->getAll($strSQL1);
    return $data1;

}
?>
