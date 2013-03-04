<?PHP

/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  jeffxie<jeffxie@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-4-13
 **/
require_once("common/permission.php");
class Sms extends Tp{
	public function initInstance() {
        if(!empty($_POST["mobile"]) && !empty($_POST["content"]))
        {
            $this->sendInfo($_POST);
        }
		$this->display("sms.html");
	}


    //获取短信密钥和相关信息
    public function getSmsKey() {
        $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."config","*");
	    $keyinfo = $this->conn->getRow($strSQL);
        return $keyinfo["config_sms_key"];
    }

    //接收短信信息并发送
    public function sendInfo($data) {
        $mobile = $data["mobile"]; //要发送的手机号
        $content = $data["content"];//要发送的内容
        $smskey = $this->getSmsKey();
        if(preg_match("/[0-9]+/",$mobile))
        {
            // 发送到接口,根据返回值判断发送是否成功
            switch($this->sendto($smskey,$mobile,$content))
            {
                case 1:
                    H("发送成功");
                    break;
                case 2:
                    H("发送失败,请联系TG官方是否充值");
                    break;
            }

        }
    }



    //发送短信接口
    public function sendto($key,$mobile,$content) {
        $domain = "http://www.thinkgroupon.com/bbs/sms/api.php";
        $url = "?mobile=" .$mobile ."&content=" . urlencode(iconv('utf-8','gbk',$content));
        $address = $domain . $url . "&key=" . $key;
        $address = $address ."&domain=". __DOMAIN__;
        //请求
        $handle = fopen($address,"r");
        $contents = fread($handle, 8192);
        fclose($handle);
        if(!empty($contents))
        {
            return $contents;
        }
    }
}