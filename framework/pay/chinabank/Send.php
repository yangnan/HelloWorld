<!--
 * ====================================================================
 *
 *                Send.php ��TGroupon����֧���ṩ
 *
 *  ��ҳ�����������ҳ���ж�����Ϣ,���ύ֧��������Ϣ����������֧��ƽ̨....
 *
 *
 * ====================================================================
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>����֧��</title>

<link href="css/index.css" rel="stylesheet" type="text/css">
</head>
<body onLoad="javascript:document.E_FORM.submit()">
<?php
require_once("../../../define.php");
require_once("../../../config/db.config.php");
require_once("../../../config/tp.class.php");
require_once(__FRAME__."/page/page.class.php");
require_once(__FRAME__."/db/DB.config.php");
require_once(__FRAME__."/db/DBFactory.class.php");
require_once(__FRAME__."/db/SqlBuilder.class.php");
require_once(__FRAME__."/sendmail/email.class.php");
$conn = DBFactory::createDb(__DATANAME__);
$sql = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."pay","*",array(array("id","=",3)));
$pay_config_content=$conn->getRow($sql);

//****************************************
	//$v_mid = '1001';								    // �̻��ţ�����Ϊ�����̻���1001���滻Ϊ�Լ����̻���(�ϰ��̻���Ϊ4λ��5λ,�°�Ϊ8λ)����
$v_url = __DOMAIN__ . '/framework/pay/chinabank/Receive.php';	// ����д����url,��ַӦΪ����·��,����httpЭ��

	//$key   = 'test';								    // �������û������MD5��Կ���½����Ϊ���ṩ�̻���̨����ַ��https://merchant3.chinabank.com.cn/
														// ��½��������ĵ�����������ҵ���B2C�����ڶ������������С�MD5��Կ���á�
														// ����������һ��16λ���ϵ���Կ����ߣ���Կ���64λ��������16λ�Ѿ��㹻��
$v_mid = $pay_config_content["pay_merchant_id"];
$key = $pay_config_content["pay_password"];
//****************************************


if(trim($_GET['v_oid'])<>"")					//�ж��Ƿ��д��ݶ�����
{
	   $v_oid = trim($_GET['v_oid']);
}
else
{
	   $v_oid = date('Ymd',time())."-".$v_mid."-".date('His',time());//�����ţ����鹹�ɸ�ʽ ������-�̻���-Сʱ������

}

	$v_amount = trim($_GET['v_amount']);                   //֧�����
    $v_moneytype = "CNY";                                            //����

	$text = $v_amount.$v_moneytype.$v_oid.$v_mid.$v_url.$key;        //md5����ƴ�մ�,ע��˳���ܱ�
    $v_md5info = strtoupper(md5($text));                             //md5�������ܲ�ת���ɴ�д��ĸ

	 $remark1 = trim($_GET['remark1']);					 //��ע�ֶ�1
	 $remark2 = trim($_GET['remark2']);                    //��ע�ֶ�2



	$v_rcvname   = trim($_GET['v_rcvname'])  ;		// �ջ���
	$v_rcvaddr   = trim($_GET['v_rcvaddr'])  ;		// �ջ���ַ
	$v_rcvtel    = trim($_GET['v_rcvtel'])   ;		// �ջ��˵绰
	$v_rcvpost   = trim($_GET['v_rcvpost'])  ;		// �ջ����ʱ�
	$v_rcvemail  = trim($_GET['v_rcvemail']) ;		// �ջ����ʼ�
	$v_rcvmobile = trim($_GET['v_rcvmobile']);		// �ջ����ֻ���

	$v_ordername   = trim($_GET['v_ordername'])  ;	// ����������
	$v_orderaddr   = trim($_GET['v_orderaddr'])  ;	// �����˵�ַ
	$v_ordertel    = trim($_GET['v_ordertel'])   ;	// �����˵绰
	$v_orderpost   = trim($_GET['v_orderpost'])  ;	// �������ʱ�
	$v_orderemail  = trim($_GET['v_orderemail']) ;	// �������ʼ�
	$v_ordermobile = trim($_GET['v_ordermobile']);	// �������ֻ���

?>

<!--������ϢΪ��׼�� HTML ��ʽ + ASP ���� ƴ�ն��ɵ� �������� ֧���ӿڱ�׼��ʾҳ�� �����޸�-->

<form method="post" name="E_FORM" action="https://Pay3.chinabank.com.cn/PayGate">
	<input type="hidden" name="v_mid"         value="<?php echo $v_mid;?>">
	<input type="hidden" name="v_oid"         value="<?php echo $v_oid;?>">
	<input type="hidden" name="v_amount"      value="<?php echo $v_amount;?>">
	<input type="hidden" name="v_moneytype"   value="<?php echo $v_moneytype;?>">
	<input type="hidden" name="v_url"         value="<?php echo $v_url;?>">
	<input type="hidden" name="v_md5info"     value="<?php echo $v_md5info;?>">

 <!--���¼�����Ϊ����֧����ɺ���֧��������Ϣһͬ������Ϣ����ҳ -->

	<input type="hidden" name="remark1"       value="<?php echo $remark1;?>">
	<input type="hidden" name="remark2"       value="<?php echo $remark2;?>">



<!--���¼���ֻ��������¼�ͻ���Ϣ�����Բ��ã���Ӱ��֧�� -->
	<input type="hidden" name="v_rcvname"      value="<?php echo $v_rcvname;?>">
	<input type="hidden" name="v_rcvtel"       value="<?php echo $v_rcvtel;?>">
	<input type="hidden" name="v_rcvpost"      value="<?php echo $v_rcvpost;?>">
	<input type="hidden" name="v_rcvaddr"      value="<?php echo $v_rcvaddr;?>">
	<input type="hidden" name="v_rcvemail"     value="<?php echo $v_rcvemail;?>">
	<input type="hidden" name="v_rcvmobile"    value="<?php echo $v_rcvmobile;?>">

	<input type="hidden" name="v_ordername"    value="<?php echo $v_ordername;?>">
	<input type="hidden" name="v_ordertel"     value="<?php echo $v_ordertel;?>">
	<input type="hidden" name="v_orderpost"    value="<?php echo $v_orderpost;?>">
	<input type="hidden" name="v_orderaddr"    value="<?php echo $v_orderaddr;?>">
	<input type="hidden" name="v_ordermobile"  value="<?php echo $v_ordermobile;?>">
	<input type="hidden" name="v_orderemail"   value="<?php echo $v_orderemail;?>">

</form>

</body>
</html>