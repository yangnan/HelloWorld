<?php
//---------------------------------------------------------
//�Ƹ�ͨ��ʱ����֧������ʾ�����̻����մ��ĵ����п�������
//---------------------------------------------------------
require_once ("classes/PayRequestHandler.class.php");
class zhifu {
    public $bargainor_id;
    public $key;
    public $return_url;
    public $strDate;
    public $strTime;
    public $randNum;
    public $strReq;
    public $sp_billno;
    public $transaction_id;
    public $total_fee;
    public $desc;
    public function __construct($data) {
        $this->bargainor_id = $data["bargainor_id"];
        $this->key = $data["key"];
        $this->return_url = $data["return_url"];
        $this->strDate = $data["strDate"];
        $this->strTime = $data["strTime"];
        $this->randNum = $data["randNum"];
        $this->strReq = $data["strReq"];
        $this->sp_billno = $data["sp_billno"];
        $this->transaction_id = $data["transaction_id"];
        $this->total_fee = $data["total_fee"];
        $this->desc = $data["desc"];

    }
    public function createUrl() {
        /* ����֧��������� */
        $reqHandler = new PayRequestHandler();
        $reqHandler->init();
        $reqHandler->setKey($this->key);

        //----------------------------------------
        //����֧������
        //----------------------------------------
        $reqHandler->setParameter("bargainor_id", $this->bargainor_id);			//�̻���
        $reqHandler->setParameter("sp_billno", $this->sp_billno);					//�̻�������
        $reqHandler->setParameter("transaction_id", $this->transaction_id);		//�Ƹ�ͨ���׵���
        $reqHandler->setParameter("total_fee", $this->total_fee);					//��Ʒ�ܽ��,�Է�Ϊ��λ
        $reqHandler->setParameter("return_url", $this->return_url);				//���ش����ַ
        $reqHandler->setParameter("desc", "�����ţ�" . $this->transaction_id);	//��Ʒ����

        //�û�ip,���Ի���ʱ��Ҫ�����ip��������ʽ�����ټӴ˲���
        $reqHandler->setParameter("spbill_create_ip", $_SERVER['REMOTE_ADDR']);

        //�����URL
        $reqUrl = $reqHandler->getRequestURL();
        return $reqUrl;
    }
}
?>
