<?PHP
/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  jeffxie<jeffxie@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-13
 **/


class IndexDetails extends Tp{

	public $grouponInfoArr = array();
	private $language;
	public function initInstance() {
		//团购信息
		$this->language = getLanguage();
		$this->grouponInfoArr = $this->getData();
		$id = $this->grouponInfoArr['id'];
		if(!isset($id))
		{
			//H("","?tg=/aboutinfo/subscribe","");
		}
		//抢购会员
		$usersArr = $this->getUsers($id,$this->grouponInfoArr["groupon_start_time"]);
		$this->getDiscount();
		$this->getRemainTime();
		$this->getFocusPic();
		$this->getUserNumPercent();
		$grouponData = $this->grouponInfoArr;
		if(time()>$grouponData["groupon_end_time"])
		{
			$this->assign("groupontimestatus","stop");
		}

        	$this->assign("seo",$this->getSeo());
        	$this->assign("webinfo",$this->getConfig());
		$this->assign("grouponInfoArr",$grouponData);
        $this->assign("selePing",$this->selePing($id)); //评论数统计
		$this->assign("usersArr",$usersArr);
		$this->assign("domain",__DOMAIN__);
        $this->assign("fenxiang",$this->fenxiang($id,$grouponData["groupon_title"]));//获得分享地址
        $sysinfo = $this->getSys();
        $getGrouponDataList = $this->getGrouponDataList();
        if($sysinfo["config_mode_set"] == 2 && empty($_GET["id"]))
        {
            for($i=0;$i<count($getGrouponDataList);$i++)
            {
				$countAuthor = $this->countAuthor($getGrouponDataList[$i]["id"],$getGrouponDataList[$i]["groupon_start_time"]);
                $countnum = count($countAuthor); //多少人已购买
				$getGrouponDataList[$i]['stop_time'] = date("Y-m-d H:i:s",$countAuthor[0]["order_pay_time"]);
                $getGrouponDataList[$i]["countnum"] = $countnum;
                $getGrouponDataList[$i]["zhekou"] = $this->zhekou($getGrouponDataList[$i]["groupon_prime_price"],$getGrouponDataList[$i]["groupon_present_price"]);
                $imgtmp = split(",",$getGrouponDataList[$i]["groupon_pic"]);
                $getGrouponDataList[$i]["groupon_pic"] = $imgtmp[0];
            }
            $this->assign("getGrouponDataList",$getGrouponDataList);
            $this->display("index/daymore.html");
        }
        else{
            $this->display("index/details.html");
        }
	}

    //多少人已购买,商品ID
    public function countAuthor($oid,$groupon_start_time) {
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."order","*",array(array("order_groupon_id","=",$oid),array("order_pay_time",">",$groupon_start_time)),"",array("order_pay_time"=>"desc"));
		$orderArr = $this->conn->getAll($strSQL);
        return $orderArr;
    }

//团购时间到期并团购失败,但如果可以多次购买，则时间重置(针对一日一团)
//jeffxie<jeffxie@gmail.com> 2011-4-23
	public function resetGropuonTime($shopData)
	{
			//因为团购时间到期需要结束,因为是还可以多次购买,所以需要重置团购时间 xiezhanhui 2011-4-23
			$date = countGrouponTime($shopData["groupon_start_time"],$shopData["groupon_end_time"]);
			$updateGrouponDate = SqlBuilder::buildUpdateSql(__PREFIX_TAB__ ."groupon_info",array("groupon_start_time"=>$date["starttime"],"groupon_end_time"=>$date["endtime"]),array(array("id","=",$shopData["id"])));
			//修改团购开始和结束时间
						//echo "<script>location='".$updateGrouponDate."';</script>";die; //调试用

			$this->conn->execute($updateGrouponDate);
	}

//获取团购中的列表,用于一日多团状态
    public function getGrouponDataList() {
        $citySQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."city","*","","",array("sorting"=>"ASC"));
	    $city = $this->conn->getAll($citySQL);
		$onlycity = $city[0];
        if(!empty($_GET["city"])){
            $city_initials = $_GET["city"];

        }
        else if(!empty($_SESSION["city_initials"])){
            	$city_initials = $_SESSION["city_initials"];

        }
        else{
            $city_initials = $onlycity["city_initials"];
        }
        $citysql = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."city","*",array(array("city_initials","=",$city_initials)));
	    $cityid = $this->conn->getRow($citysql);
        $_SESSION["city_initials"] = $city_initials;
        $_SESSION["cityid"] = $cityid["id"];
        $_SESSION["cityname"] = $cityid["city_name"];
        $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."groupon_info","*",array(array("groupon_city_id","=",$cityid["id"]),array("groupon_language","=",$this->language)));
        $data = $this->conn->getAll($strSQL);
		for($i=0;$i<count($data);$i++)
		{
			if(($data[$i]["groupon_stop"] == 2 && $data[$i]["groupon_end_time"]<time()) || $data[$i]["groupon_end_time"]>time())
			{
				$data_new[$i] = $data[$i];
			}
		}
        return $data_new;
    }

//获取seo信息
    public function getSeo() {
        $getSelfUrl = getUrl();
        $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."seo","*",array(array("seo_page_address","=",$getSelfUrl)));
	    $seoinfo = $this->conn->getRow($strSQL);
        return $seoinfo;

    }

    //获取系统设置信息
    public function getSys() {
        $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."config","*");
	    $sysinfo = $this->conn->getRow($strSQL);
        return $sysinfo;
    }

    //折扣计算
    public function zhekou($priceold,$pricenow) {
        $zhekou = @is_int(@$pricenow/@$priceold)||@(@$pricenow/@$priceold)>=1?0:@round(@$pricenow/@$priceold,1)*10;
        return empty($zhekou)?"":$zhekou;
    }
    //查询关注和评论的数量
    public function selePing($sid) {
        $pSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ . "ping","*",array(array("tg_type_id","=",1),array("tg_sid","=",$sid))); //评论
        $gSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ . "ping","*",array(array("tg_type_id","=",2),array("tg_sid","=",$sid))); //关注
        return array(count($this->conn->getAll($pSQL)),count($this->conn->getAll($gSQL)));

    }
	//团购信息
	public function getData(){

        $citySQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."city","*","","",array("sorting"=>"ASC"));
	    $city = $this->conn->getAll($citySQL);
		$onlycity = $city[0];
       //  P($_COOKIE);

        if(!empty($_GET["city"])){
            $city_initials = $_GET["city"];
            setcookie("city_initials",$_GET["city"],time()+86400*30);
 //P($_COOKIE);

        }
        else if(!empty($_COOKIE["city_initials"])){
            	$city_initials = $_COOKIE["city_initials"];
                //P($_COOKIE);

        }
        else{
            $city_initials = $onlycity["city_initials"];
        }

        $citysql = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."city","*",array(array("city_initials","=",$city_initials)));
	    $cityid = $this->conn->getRow($citysql);
        $_SESSION["cityid"] = $cityid["id"];
        $_SESSION["cityname"] = $cityid["city_name"];
        setcookie("cityname",$cityid["city_name"],time()+86400*30);
        setcookie("cityid",$cityid["id"],time()+86400*30);
		if($_GET['id']){
			$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."groupon_info","*",array(array("id","=",$_GET['id']),array("groupon_city_id","=",$cityid["id"]),array("groupon_language","=",$this->language)),array(0,1));
			$data = $this->conn->getRow($strSQL);
		}else{
			$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."groupon_info","*",array(array("groupon_display_index","=","1"),array("groupon_city_id","=",$cityid["id"]),array("groupon_language","=",$this->language)),array(0,1));
			$data = $this->conn->getRow($strSQL);
		}
        if($data)
        {
			if($data["groupon_end_time"] <= time() && $data["groupon_stop"] == 2)
			{
				$this->resetGropuonTime($data); //重置团购时间,顺延
			}
            return $data;
        }
        else{
            H("","?tg=/aboutinfo/subscribe","");
        }
	}


	//抢购会员
	public function getUsers($id,$groupon_start_time){
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."order","*",array(array("order_groupon_id","=",$id),array("order_pay_time",">",$groupon_start_time)),"",array("order_pay_time"=>"desc"));
		$orderArr = $this->conn->getAll($strSQL);
		//抢购会员数
		$this->grouponInfoArr['orderUsersNum'] = count($orderArr)+$this->grouponInfoArr['shopman'];
		$this->grouponInfoArr['stop_time'] = date("Y-m-d H:i:s",$orderArr[0]["order_pay_time"]);
		//还差多少人到达最低团购人数
		$this->grouponInfoArr['achieveGrouponNum'] = $this->grouponInfoArr['groupon_num'] - $this->grouponInfoArr['orderUsersNum'];
	}


	//折扣及节省金额计算
	public function getDiscount(){

		$this->grouponInfoArr['groupon_save'] = $this->grouponInfoArr['groupon_prime_price'] - $this->grouponInfoArr['groupon_present_price'];
		$this->grouponInfoArr['groupon_discount'] = $this->zhekou($this->grouponInfoArr['groupon_prime_price'],$this->grouponInfoArr['groupon_present_price']);
	}

    public function getConfig() {
			$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."config","*","",array(0,1));
			$data = $this->conn->getRow($strSQL);
            return $data;
    }

	//剩余时间计算
	public function getRemainTime(){
		$nowTime = time();
		$str = date("Y/m/d/H/i/s",$this->grouponInfoArr['groupon_end_time']);
		$arr = explode("/",$str);
		$this->grouponInfoArr['groupon_year'] = $arr[0];
		$this->grouponInfoArr['groupon_month'] = $arr[1]-1;
		$this->grouponInfoArr['groupon_day'] = $arr[2];
		$this->grouponInfoArr['groupon_hour'] = $arr[3];
		$this->grouponInfoArr['groupon_mini'] = $arr[4];
	}

	//处理焦点图
	public function getFocusPic(){
		$arr = explode(",",$this->grouponInfoArr['groupon_pic']);
		foreach($arr as $key=>$val)
		{
			$picStr.=__UPLOADFILES__ ."/". $val."|";
		}
		$picStr = rtrim($picStr,'|');
		$this->grouponInfoArr['groupon_pic'] = $picStr;
	}

	//已抢购百分比（刻度）
	public function getUserNumPercent(){
        if( $this->grouponInfoArr['orderUsersNum']/$this->grouponInfoArr['groupon_num'] <= 0)
        {
            $this->grouponInfoArr['groupon_userNumPercent'] = "-5";
        }
        else{
		    $this->grouponInfoArr['groupon_userNumPercent'] = ($this->grouponInfoArr['orderUsersNum']/$this->grouponInfoArr['groupon_num'])*185;
        }
	}

    //获取分享 2011-5-17 xiezhanhui
    public function fenxiang($id,$title) {
        //sina
        $sinaUrl = "http://v.t.sina.com.cn/share/share.php?appkey=732915584&url=".__DOMAIN__.$_SERVER["REQUEST_URI"]."/r/t&title=@".urlencode($title);
        $qqUrl = "http://v.t.qq.com/share/share.php?title=" .urlencode($title)."&url=".__DOMAIN__.$_SERVER["REQUEST_URI"]."/r/q&appkey=9b56a545088e4429b36239bc2311da21";
        $doubanUrl = "http://www.douban.com/recommend/?url=".__DOMAIN__.$_SERVER["REQUEST_URI"]."/r/d&title=".urlencode($title);
        $mailUrl = "mailto:?subject=".urlencode("有兴趣么:".$title.":").__DOMAIN__.$_SERVER["REQUEST_URI"]."/r/e";
		$qzone="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?title=".urlencode($title)."&url=".__DOMAIN__."?tg=/index/details/id/".$id;
        return array("sinaurl"=>$sinaUrl,"qqurl"=>$qqUrl,"doubanurl"=>$doubanUrl,"mailurl"=>$mailUrl,"qzone"=>$qzone);
    }

}
?>
