<?PHP
/**
 * author:jeffxie<jeffxie@gmail.com>
 * 2011-01-10
 */
$act=$_GET['action']);
$type=$_GET['uploadtype']);
if($act=='upload'){
	if($type=='attach'){
		$fileType=array('rar','zip');//�����ϴ����ļ�����
	}
	elseif($type=='img'){
		$fileType=array('jpg','gif','bmp','png');
	}
	$dir = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__))))));
	$upfileDir='/uploadfiles/';
	$maxSize=500; //��λ��KB
	$fileExt=substr(strrchr($_FILES['file1']['name'],'.'),1);
	if(!in_array(strtolower($fileExt),$fileType))
		die("<script>alert('�������ϴ������͵��ļ���-808');window.parent.\$('divProcessing').style.display='none';history.back();</script>");
	if($_FILES['file1']['size']> $maxSize*1024)
		die( "<script>alert('�ļ�����');window.parent.\$('divProcessing').style.display='none';history.back();</script>");
	if($_FILES['file1']['error'] !=0)
		die("<script>alert('δ֪�����ļ��ϴ�ʧ�ܣ�');window.parent.$('divProcessing').style.display='none';history.back();</script>");
	$targetDir=$dir.$upfileDir;
	$targetFile=date('Ymd').time().strrchr($_FILES['file1']['name'],'.');
	$realFile=$targetDir.$targetFile;
	if(function_exists('move_uploaded_file')){
		 move_uploaded_file($_FILES['file1']['tmp_name'],$realFile);
		 //die("<script>window.parent.LoadIMG('{$realFile}');</script>");

	}
	else{
		@copy($_FILES['file1']['tmp_name'],$realFile);
	}
	if($type=='img'){
		die("<script>window.parent.LoadIMG('../../../../..{$upfileDir}{$targetFile}');</script>");
	}
	elseif($type=='attach'){
		die("<script>window.parent.LoadAttach('../../../../..{$upfileDir}{$targetFile}');</script>");
	}
}

?>