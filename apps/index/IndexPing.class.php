<?PHP
/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  jeffxie<jeffxie@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-4-22
 **/

class IndexPing extends Tp{

	public function initInstance() {

		//ajax,提交
		$uid = $_SESSION['uid'];
        $sid = $_POST["sid"];
        $uname = $_SESSION["username"];
        $this->postData($uid,$uname,$sid);

        //echo $sid;
	}


    public function postData($uid="",$uname="",$sid) {
        $ip = getIp();
        $pubtime = time();
        if($_GET["type"] == 1 && !empty($uid) && !empty($uname) && !empty($sid))
        {
            $content = $_POST["content"];
            $strSQL1 = SqlBuilder::buildInsertSql(__PREFIX_TAB__ ."ping",array("tg_type_id"=>1,"tg_sid"=>"$sid","tg_uid"=>"$uid","tg_uname"=>"$uname","tg_content"=>$content,"tg_ip"=>"$ip","tg_pubtime"=>$pubtime));
            $viewSQL1 = SqlBuilder::buildSelectSql(__PREFIX_TAB__ . "ping","*",array(array("tg_ip","=",$ip),array("tg_type_id","=",1)));
            if($this->conn->getRow($viewSQL1))
            {
                H("您已经评论过了","","-1");
                exit;
            }
            else{
                $this->conn->execute($strSQL1);
                H("评论成功","","-1");
                exit;
            }
        }
        else if($_GET["type"] == 2){
            if($_POST["classname"] == "gz_id"){
                $strSQL = SqlBuilder::buildInsertSql(__PREFIX_TAB__ ."ping",array("tg_type_id"=>2,"tg_sid"=>"$sid","tg_uid"=>"$uid","tg_uname"=>"$uname","tg_ip"=>"$ip","tg_pubtime"=>$pubtime));
                $viewSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ . "ping","*",array(array("tg_ip","=",$ip),array("tg_type_id","=",2)));
                if($this->conn->getRow($viewSQL))
                {
                   // echo 3;
                   // exit;
                }
            }
            else if($_POST["classname"] == "gz_id_no" && $_GET["type"] == 2)
            {
                $time = time()-60;//获取1分钟,1分钟之前的关注，没办法取消
                $strSQL = SqlBuilder::buildDeleteSql(__PREFIX_TAB__ ."ping",array(array("tg_ip","=",$ip),array("tg_type_id","=",2),array("tg_pubtime",">=",$time)));
            }
            if($this->conn->execute($strSQL))
            {
                echo 1;
                exit;
            }
            else{
                echo 2;
                exit;
            }
        }
        else{
            echo H("请您登录后评论","","-1");
            exit;
        }

    }

}
?>