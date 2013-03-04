<?PHP
/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  jeffxie<jeffxie@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-14
 **/


class IndexWhysp extends Tp{
	public function initInstance() {
		//图片路径
		$picPath = $_GET['picPath'];
		//还差多少人
		$nummber = $_GET['num'];
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."order","*",array(array("order_groupon_id","=",$_GET['id'])));
		$orderArr = $this->conn->getAll($strSQL);
		foreach($orderArr as $key=>$val)
		{
			$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."users",array("id","users_realname",),array(array("id","=",$val['order_users_id'])),array(0,1));
			$userArr[$key] = $this->conn->getRow($strSQL);
			$userArr[$key]['num'] = $val['order_num'];
		}

		if(is_array($userArr) && !empty($userArr)){

			$dataLen = count($userArr);
			$userArrBak = $userArr;

			//$lastArr 最后一个会员
			$lastArr = array_pop($userArrBak);
			unset($userArrBak);
			foreach($userArr as $key=>$val)
			{
				if($val['id'] == $lastArr['id']){
					$str .="<dl id='theLastOne'>";
				}else{
					$str .="<dl>";
				}
				if($val['id'] == $lastArr['id']){
					//$str .='<div class="huihuan01" id="huihuan01" style="z-index:800;"><span >就差'.$nummber.'个了快来吧...</span></div>';
				}
				$str .="<dd><img src='".$picPath."images/tx_m.jpg' /></dd>";
				$str .="<dt>".$val['users_name']."<br />";
				$str .="抢了".$val['num']."份</dt>";
				$str .="</dl>";
			}
			//display:none;
			$str .= "<dl id='demo2' style='float:left;width:750px;'></dl><input type='hidden' id='gundong_width' value='".$dataLen."' />";
			echo $str;
		}
	}

}
