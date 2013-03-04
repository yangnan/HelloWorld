<?php
/**
*
*  Copyright (c) 2003-06  TGroupon.net. All rights reserved.
*  Support : http://www.thinkgroupon.com
*  This software is the proprietary information of TGroupon.com.
*
*/
require_once(__ROOT__ . "/common/admin.php");
require_once(__ROOT__ . "/common/bakup.php");
class Bakclass extends Tp{
    public $admin_file;
    public function initInstance(){
        $this->admin_file = $_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
    }
    public function SafeFunc(){
        //Safe The Admin
    }
    public function getdirname($path){
        if(strpos($path,'\\')!==false){
            return substr($path,0,strrpos($path,'\\'));
        }elseif(strpos($path,'/')!==false){
            return substr($path,0,strrpos($path,'/'));
        }else{
            return '/';
        }
    }
}
?>