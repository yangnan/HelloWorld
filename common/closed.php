<?php
//include('../framework/db/DB.config.php');
//查询网站是开启还是关闭状态
   $conn = DBFactory::createDb(__DATANAME__);
   $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."config","config_frum_status");
   $result = $conn->getRow($strSQL);
   //print_r($result);
   if($result['config_frum_status']==2){
      H("","?tg=/index/closedhint");
   }
?>