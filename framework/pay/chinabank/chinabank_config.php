<?PHP
//生成post 的本地url
//author:xiezhanhui <jeffxie@gmail.com> 2010-9-3 8:00
class zhifu {
    public $v_oid;
    public $v_rcvname;
    public $v_rcvaddr;
    public $v_rcvtel;
    public $v_rcvpost;
    public $v_rcvemail;
    public $v_rcvmobile;
    public $v_ordername;
    public $v_orderaddr;
    public $v_ordertel;
    public $v_orderpost;
    public $v_orderemail;
    public $v_ordermobile;
    public $v_amount;
    public $domain;
    public function __construct($domain,$data) {
        $this->domain = $domain;
        $this->v_oid=$data["v_oid"];
        $this->v_rcvname=$data["v_rcvname"];
        $this->v_rcvaddr=$data["v_rcvaddr"];
        $this->v_rcvtel=$data["v_rcvtel"];
        $this->v_rcvpost=$data["v_rcvpost"];
        $this->v_rcvemail=$data["v_rcvemail"];
        $this->v_rcvmobile=$data["v_rcvmobile"];
        $this->v_ordername=$data["v_ordername"];
        $this->v_orderaddr=$data["v_orderaddr"];
        $this->v_ordertel=$data["v_ordertel"];
        $this->v_orderpost=$data["v_orderpost"];
        $this->v_orderemail=$data["v_orderemail"];
        $this->v_ordermobile=$data["v_ordermobile"];
        $this->v_amount=$data["v_amount"];
    }
    public function createUrl() {
       $url = $this->domain . "/framework/pay/chinabank/Send.php?v_oid=" . $this->v_oid . "&v_rcvname=" . $this->v_rcvname . "&v_rcvaddr=" . $this->v_rcvaddr . "&v_rcvtel=" . $this->v_rcvtel . "&v_rcvpost=" . $this->v_rcvpost . "&v_rcvemail=" . $this->v_rcvemail . "&v_rcvmobile=" . $this->v_rcvmobile . "&v_ordername=" . $this->v_ordername . "&v_orderaddr=" . $this->v_orderaddr . "&v_ordertel=" . $this->v_ordertel . "&v_orderpost=" . $this->v_orderpost . "&v_orderemail=" . $this->v_orderemail . "&v_ordermobile=" . $this->v_ordermobile . "&v_amount=" . $this->v_amount;
        return $url;
    }

}
?>