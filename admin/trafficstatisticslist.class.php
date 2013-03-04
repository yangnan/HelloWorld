<?php
require_once("common/permission.php");
class trafficstatisticslist extends Tp{
	public function initInstance(){
		//分页
		$pager = new pageList(count($this->getAll()));
		$trafficstatisticslistArr = $this->getData($pager->getStartRow(),$pager->perpage);
		$all = $this->getAll();
		$this->assign("trafficstatisticslistArr",$trafficstatisticslistArr);
		$this->assign("pager",$pager);
		//参数1:1是pv,2是独立ip，参数2:1是今天2是昨天
		$yestodaypv = $this->getTodayPv(1,2); //昨天的PV
		$yestodayip = $this->getTodayPv(2,2); //昨天的IP
		$todaypv = $this->getTodayPv(1,1); //昨天的PV
		$todayip = $this->getTodayPv(2,1); //昨天的IP
		$this->assign("sumviews",$this->getOtherDayPv());
		$this->assign("yestodaypv",$yestodaypv);
		$this->assign("yestodayip",$yestodayip);
		$this->assign("todaypv",$todaypv);
		$this->assign("getAllPv",$this->getAllPv(1));
		$this->assign("getAllIp",$this->getAllPv(2));		
		$this->assign("todayip",$todayip);
		if($_GET["type"] == "font")
		{
			$this->display("trafficstatisticslist.html");
		}
		else{
			$this->display("guestviews.html");
		}
	}

	//demo列表页
	public function getData($start,$end){
	    //查询数据
		$strSQL = "select * from ".__PREFIX_TAB__ ."traffic_statistics ORDER BY access_time DESC limit ".$start.",".$end;
		return $this->conn->getAll($strSQL);
	}

	//获取全部数据（分页）
	public function getAll(){
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."traffic_statistics","*");
		return $this->conn->getAll($strSQL);
	}

	//今日访客pv计算，IP计算两种形式;昨天，今天 xiezhanhui 2011-5-14
	public function getTodayPv($type=1,$datetype=1)
	{
		if($type == 2){//1是PV，2是独立IP
			$_ct = "distinct ip";
		}
		else{
			$_ct = "*";
		}
		$today = strtotime(date("Y-m-d 00:00:00"));
		$yestoday = strtotime(date("Y-m-d 00:00:00",strtotime("-1 day")));
		$strSQL = "SELECT ".$_ct." FROM " .__PREFIX_TAB__ ."traffic_statistics WHERE ";
		if($datetype == 1)
		{
			//今天
			$strSQL .= "access_time>=$today";
		}
		else if($datetype == 2)
		{
			//昨天
			$strSQL .= "access_time>$yestoday AND access_time<$today";

		}
		return count($this->conn->getAll($strSQL));
	}
	//每日平均流量,分为独立IP和PV
	public function getOtherDayPv()
	{
		//1：获取一共多少天的流量统计,以天为单位
		//2：获取总的PV/IP
		$strDaySQL = "SELECT ".__PREFIX_TAB__."traffic_statistics.* FROM " .__PREFIX_TAB__."traffic_statistics GROUP BY  from_unixtime( access_time, '%Y%m%d' )";
		$sumDay = count($this->conn->getAll($strDaySQL)); //获取总天数
		$sumPv = $this->getAllPv(1);
		$sumIp = $this->getAllPv(2);
		return array("pv"=>$sumPv/$sumDay,"ip"=>$sumIp/$sumDay);
	}
	//历史累计PV+IP
	public function getAllPv($type=1)//pv=1,ip=2
	{
		if($type == 2){//1是PV，2是独立IP
			$_ct = "distinct ip";
		}
		else{
			$_ct = "*";
		}
		$strSQL = "SELECT ".$_ct." FROM " .__PREFIX_TAB__ ."traffic_statistics";
		return count($this->conn->getAll($strSQL));

	}


	
	
	
	//将30天以内的所有数据回传到官网，然后清理数据为0，这样做是为了避免数据库爆掉
	public function clearPvData()
	{

	}
	


}
?>