<?PHP
/*
 * @Description: ��Ǯ�����֧�����ؽӿڷ���
 * @Copyright (c) �Ϻ���Ǯ��Ϣ�������޹�˾
 * @version 2.0
 * @author:xiezhanhui <jeffxie@gmail.com> 2010-9-1
 */
class SendData{
//��ȡ������
    public $data;
    public $new_data; //�ӹ��Ժ������
    public function __construct($data) {
        $this->data = $data;
    //���ɼ���ǩ����
    ///����ذ�������˳��͹�����ɼ��ܴ���
        $signMsgVal = $this->appendParam($signMsgVal,"inputCharset",$this->data["inputCharset"]);
        $signMsgVal = $this->appendParam($signMsgVal,"bgUrl",$this->data["bgUrl"]);
        $signMsgVal = $this->appendParam($signMsgVal,"version",$this->data["version"]);
        $signMsgVal = $this->appendParam($signMsgVal,"language",$this->data["language"]);
        $signMsgVal = $this->appendParam($signMsgVal,"signType",$this->data["signType"]);
        $signMsgVal = $this->appendParam($signMsgVal,"merchantAcctId",$this->data["merchantAcctId"]);
        $signMsgVal = $this->appendParam($signMsgVal,"payerName",$this->data["payerName"]);
        $signMsgVal = $this->appendParam($signMsgVal,"payerContactType",$this->data["payerContactType"]);
        $signMsgVal = $this->appendParam($signMsgVal,"payerContact",$this->data["payerContact"]);
        $signMsgVal = $this->appendParam($signMsgVal,"orderId",$this->data["orderId"]);
        $signMsgVal = $this->appendParam($signMsgVal,"orderAmount",$this->data["orderAmount"]);
        $signMsgVal = $this->appendParam($signMsgVal,"orderTime",$this->data["orderTime"]);
        $signMsgVal = $this->appendParam($signMsgVal,"productName",$this->data["productName"]);
        $signMsgVal = $this->appendParam($signMsgVal,"productNum",$this->data["productNum"]);
        $signMsgVal = $this->appendParam($signMsgVal,"productId",$this->data["productId"]);
        $signMsgVal = $this->appendParam($signMsgVal,"productDesc",$this->data["productDesc"]);
        $signMsgVal = $this->appendParam($signMsgVal,"ext1",$this->data["ext1"]);
        $signMsgVal = $this->appendParam($signMsgVal,"ext2",$this->data["ext2"]);
        $signMsgVal = $this->appendParam($signMsgVal,"payType",$this->data["payType"]);
        $signMsgVal = $this->appendParam($signMsgVal,"redoFlag",$this->data["redoFlag"]);
        $signMsgVal = $this->appendParam($signMsgVal,"pid",$this->data["pid"]);
        $signMsgVal = $this->appendParam($signMsgVal,"key",$this->data["key"]);
        $this->new_data["inputCharset"] = "1";
        $this->new_data["bgUrl"] = $this->data["bgUrl"];
        $this->new_data["version"] = "v3.0";
        $this->new_data["language"] = "1";
        $this->new_data["signType"] = "1";
        $this->new_data["merchantAcctId"] = $this->data["shopid"];
        $this->new_data["payerName"] = $this->data["username"];
        $this->new_data["payerContactType"] = "";
        $this->new_data["payerContact"] = "";
        $this->new_data["orderId"] = $this->data["orderId"];
        $this->new_data["orderAmount"] = $this->data["price"];;
        $this->new_data["orderTime"] = date('YmdHis');
        $this->new_data["productName"] = $this->data["title"];
        $this->new_data["productNum"] = "1";
        $this->new_data["productId"] = "";
        $this->new_data["productDesc"] = $this->data["title"];
        $this->new_data["ext1"] = "";
        $this->new_data["ext2"] = "";
        $this->new_data["payType"] = "00";
        $this->new_data["redoFlag"] = "";
        $this->new_data["pid"] = "";
        $this->new_data["signMsg"] = strtoupper(md5($signMsgVal)); //����md5ǩ��
        return $this->new_data;

    }

	//���ܺ�����������ֵ��Ϊ�յĲ�������ַ���
	public function appendParam($returnStr,$paramId,$paramValue)
    {

		if($returnStr!=""){

				if($paramValue!=""){

					$returnStr.="&".$paramId."=".$paramValue;
				}

		}else{

			If($paramValue!=""){
				$returnStr=$paramId."=".$paramValue;
			}
		}

		return $returnStr;
	}
	//���ܺ�����������ֵ��Ϊ�յĲ�������ַ���������

}



/*
//����������˻���
///���¼��Ǯϵͳ��ȡ�û���ţ��û���ź��01��Ϊ����������˻��š�
$merchantAcctId="1000300079901";

//�����������Կ
///���ִ�Сд.�����Ǯ��ϵ��ȡ
$key="1234567897654321";

//�ַ���.�̶�ѡ��ֵ����Ϊ�ա�
///ֻ��ѡ��1��2��3.
///1����UTF-8; 2����GBK; 3����gb2312
///Ĭ��ֵΪ1
$inputCharset="3";

//����������֧������ĺ�̨��ַ.��[pageUrl]����ͬʱΪ�ա������Ǿ��Ե�ַ��
///��Ǯͨ�����������ӵķ�ʽ�����׽�����͵�[bgUrl]��Ӧ��ҳ���ַ�����̻�������ɺ������<result>���Ϊ1��ҳ���ת��<redirecturl>��Ӧ�ĵ�ַ��
///�����Ǯδ���յ�<redirecturl>��Ӧ�ĵ�ַ����Ǯ����֧�����GET��[pageUrl]��Ӧ��ҳ�档
$bgUrl="http://www.yoursite.com/receive.php";

//���ذ汾.�̶�ֵ
///��Ǯ����ݰ汾�������ö�Ӧ�Ľӿڴ������
///������汾�Ź̶�Ϊv2.0
$version="v2.0";

//��������.�̶�ѡ��ֵ��
///ֻ��ѡ��1��2��3
///1�������ģ�2����Ӣ��
///Ĭ��ֵΪ1
$language="1";

//ǩ������.�̶�ֵ
///1����MD5ǩ��
///��ǰ�汾�̶�Ϊ1
$signType="1";

//֧��������
///��Ϊ���Ļ�Ӣ���ַ�
$payerName="payerName";

//֧������ϵ��ʽ����.�̶�ѡ��ֵ
///ֻ��ѡ��1
///1����Email
$payerContactType="1";

//֧������ϵ��ʽ
///ֻ��ѡ��Email���ֻ���
$payerContact="";

//�̻�������
///����ĸ�����֡���[-][_]���
$orderId=date('YmdHis');

//�������
///�Է�Ϊ��λ����������������
///�ȷ�2������0.02Ԫ
$orderAmount="2";

//�����ύʱ��
///14λ���֡���[4λ]��[2λ]��[2λ]ʱ[2λ]��[2λ]��[2λ]
///�磻20080101010101
$orderTime=date('YmdHis');

//��Ʒ����
///��Ϊ���Ļ�Ӣ���ַ�
$productName="productName";

//��Ʒ����
///��Ϊ�գ��ǿ�ʱ����Ϊ����
$productNum="1";

//��Ʒ����
///��Ϊ�ַ���������
$productId="";

//��Ʒ����
$productDesc="";

//��չ�ֶ�1
///��֧��������ԭ�����ظ��̻�
$ext1="";

//��չ�ֶ�2
///��֧��������ԭ�����ظ��̻�
$ext2="";

//֧����ʽ.�̶�ѡ��ֵ
///ֻ��ѡ��00��10��11��12��13��14
///00�����֧��������֧��ҳ����ʾ��Ǯ֧�ֵĸ���֧����ʽ���Ƽ�ʹ�ã�10�����п�֧��������֧��ҳ��ֻ��ʾ���п�֧����.11���绰����֧��������֧��ҳ��ֻ��ʾ�绰֧����.12����Ǯ�˻�֧��������֧��ҳ��ֻ��ʾ��Ǯ�˻�֧����.13������֧��������֧��ҳ��ֻ��ʾ����֧����ʽ��
$payType="00";

//ͬһ������ֹ�ظ��ύ��־
///�̶�ѡ��ֵ�� 1��0
///1����ͬһ������ֻ�����ύ1�Σ�0��ʾͬһ��������û��֧���ɹ���ǰ���¿��ظ��ύ��Ρ�Ĭ��Ϊ0����ʵ�ﹺ�ﳵ�������̻�����0�������Ʒ���̻�����1
$redoFlag="0";

//��Ǯ�ĺ��������˻���
///��δ�Ϳ�Ǯǩ���������Э�飬����Ҫ��д������
$pid=""; ///��������ڿ�Ǯ���û����

*/


?>