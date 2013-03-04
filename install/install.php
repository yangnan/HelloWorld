<?php
/*
*	TGroupon 安装文件,修改自pbdigg.
*   Author:jeff<jeffxie@gmail.com>
*   Http://www.thinkgroupon.com
*/
header('Content-Type: text/html; charset=utf-8');
include 'define.php';
include 'install_function.php';
include 'install_lang_cn.php';
$timestamp				=	time();
$installfile			=	'tgroupon_com.sql';
$TGroupon_uploadfiles_dir = "uploadfiles";
$TGroupon_templates_c_dir = "templates_c";
$TGroupon_cache_dir = "cache";
$TGroupon_common_dir = "common";
$TGroupon_config_dir = "config";
$TGroupon_config_file	=	'config/db.config.php';
$TGroupon_define_file	=	'define.php';
$iswrite = array($TGroupon_uploadfiles_dir,$TGroupon_templates_c_dir,$TGroupon_cache_dir,$TGroupon_common_dir,$TGroupon_config_dir); //检测权限
$_TSVERSION = $i_message['copyname'];
//判断是否安装过
if (file_exists('install.lock'))
{
	exit($i_message['install_lock']);
}
if (!is_readable($installfile))
{
	exit($i_message['install_dbFile_error']);
}
$quit = false;
$msg = $alert = $link = $sql = $allownext = '';

$PHP_SELF = addslashes(htmlspecialchars($_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME']));
set_magic_quotes_runtime(0);
if (!get_magic_quotes_gpc())
{
	addS($_POST);
	addS($_GET);
}
@extract($_POST);
@extract($_GET);
?>
<html>
<head>
<title><?php echo $i_message['install_title']; ?></title>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<link href="images/style.css" rel="stylesheet" type="text/css" />
<body>
<div id='content'>
<div id='pageheader'>
	<div id="logo"><img src="images/logo.png" width="222" height="71" border="0" alt="TGroupon" /></div>
	<div id="version" class="rightheader">Version <?php echo $_TSVERSION; ?></div>
</div>
<div id='innercontent'>
	<h1>TGroupon <?php echo $_TSVERSION, ' ', $i_message['install_wizard']; ?></h1>
<?php
if (!$v)
{
?>
<div class="botBorder">
<p><span class='red'><?php echo $i_message['install_warning'];?></span></p>
</div>
<div class="botBorder">
<?php echo $i_message['install_intro'];?>
</div>
<form method="post" action="install.php?v=1">
<p class="center"><input type="submit" class="submit" value="<?php echo $i_message['install_start'];?>" /></p>
</form>
<?php
}
elseif ($v == '1')
{
?>
<h2><?php echo $i_message['install_license_title'];?></h2>
<p>
<textarea class="textarea" readonly="readonly" cols="50">
<?php echo $i_message['install_license'];?>
</textarea>
</p>
<form action="install.php?v=2" method="post">
<p><input type="checkbox" name="agree" value="1" onClick="if(this.checked==true){this.form.next.disabled=''}else{this.form.next.disabled='true'}" checked="checked" /><?php echo $i_message['install_agree'];?></p>
<p class="center"><input type="submit" style="width:200px;" class="submit" name="next" value="<?php echo $i_message['install_next'];?>" /></p>
</form>
<?php
}
elseif ($v == '2')
{
if ($agree == 'no')
{
	echo '<script>alert('.$i_message['install_disagree_license'].');history.go(-1)</script>';
}
$dirarray = array (
//如果需要创建目录，那就需要添加数组了 jeffxie@gmail.com

);
$writeable = array();
foreach ($dirarray as $key => $dir)
{
	if (writable($dir))
	{
		$writeable[$key] = $dir.result(1, 0);
	}
	else
	{
		$writeable[$key] = $dir.result(0, 0);
		$quit = TRUE;
	}
}
?>
<div class="botBorder">
<p><span class='red'><?php echo $i_message['install_dirmod'];?></span></p>
</div>
<div class="shade">
<div class="settingHead"><?php echo $i_message['install_env'];?></div>
<h5><?php echo $i_message['php_os'];?></h5>
<p><?php echo PHP_OS;result(1, 1);?></p>
<h5><?php echo $i_message['php_version'];?></h5>
<p>
<?php
echo PHP_VERSION;
if (PHP_VERSION < '5.1.2')
{
	result(0, 1);
	$quite = TRUE;
}
else
{
	result(1, 1);
}
?></p>
<h5><?php echo $i_message['file_upload'];?></h5>
<p>
<?php
if (@ini_get('file_uploads'))
{
	echo $i_message['support'],'/',@ini_get('upload_max_filesize');
}
else
{
	echo '<span class="red">'.$i_message['unsupport'].'</span>';
}
result(1, 1);
?></p>
<h5><?php echo $i_message['php_extention'];?></h5>
<p>
<?php
if (extension_loaded('mysql'))
{
	echo 'mysql:'.$i_message['support'];
	result(1, 1);
}
else
{
	echo '<span class="red">'.$i_message['php_extention_unload_mysql'].'</span>';
	result(0, 1);
	$quite = TRUE;
}
?></p>
<p>
<?php
if (extension_loaded('gd'))
{
	echo 'gd:'.$i_message['support'];
	result(1, 1);
}
else
{
	echo '<span class="red">'.$i_message['php_extention_unload_gd'].'</span>';
	result(0, 1);
	$quite = TRUE;
}
?></p>
<p>
<?php
if (extension_loaded('curl'))
{
	echo 'curl:'.$i_message['support'];
	result(1, 1);
}
else
{
	echo '<span class="red">'.$i_message['php_extention_unload_curl'].'</span>';
	result(0, 1);
	$quite = TRUE;
}
?></p>
<p>
<?php
if (extension_loaded('mbstring'))
{
	echo 'mbstring:'.$i_message['support'];
	result(1, 1);
}
else
{
	echo '<span class="red">'.$i_message['php_extention_unload_mbstring'].'</span>';
	result(0, 1);
	$quite = TRUE;
}
?></p>



<h5><?php echo $i_message['mysql'];?></h5>
<p>
<?php
if (function_exists('mysql_connect'))
{
	echo $i_message['support'];
	result(1, 1);
}
else
{
	echo '<span class="red">'.$i_message['mysql_unsupport'].'</span>';
	result(0, 1);
	$quite = TRUE;
}
?></p>


</div>
<div class="shade">
<div class="settingHead"><?php echo $i_message['dirmod'];?></div>
<?php
//批量检测写权限
foreach ($iswrite as $value)
{
    if (is_writable(TG_ROOT.$value))
    {
        echo '&nbsp;&nbsp;&nbsp;&nbsp;<span>'.$value.result(1, 0).'</span><br />';
    }
    else
    {
        echo '&nbsp;&nbsp;&nbsp;&nbsp;<span>'.$value.result(0, 1).'</span><br /';
        $quit = TRUE;
    }
}


?>
</div>
<p class="center">
	<form method="post" action='install.php?v=3'>
	<input style="width:200px;" type="submit" class="submit" id="next" name="next" value="<?php echo $i_message['install_next'];?>" <?php if($quit) echo "disabled=\"disabled\"";?>>
	</form>
</p>
<?php
}
elseif ($v == '3')
{
?>
<h2><?php echo $i_message['install_setting'];?></h2>
<form method="post" action="install.php?v=4" id="install" onSubmit="return check(this);">
<div class="shade">

<h5><?php echo $i_message['install_mysql_host'];?></h5>
<p><?php echo $i_message['install_mysql_host_intro'];?></p>
<p><input type="text" name="db_host" value="localhost" size="40" class='input' /></p>

<h5><?php echo $i_message['install_mysql_username'];?></h5>
<p><input type="text" name="db_username" value="root" size="40" class='input' /></p>

<h5><?php echo $i_message['install_mysql_password'];?></h5>
<p><input type="password" name="db_password" value="" size="40" class='input' /></p>

<h5><?php echo $i_message['install_mysql_name'];?></h5>
<p><input type="text" name="db_name" value="tgroupon" size="40" class='input' />
</p>

<h5><?php echo $i_message['install_mysql_prefix'];?></h5>
<p><?php echo $i_message['install_mysql_prefix_intro'];?></p>
<p><input type="text" name="db_prefix" value="tg_" size="40" class='input' /></p>

<h5><?php echo $i_message['site_url'];?></h5>
<p><?php echo $i_message['site_url_intro'];?></p>
<p><input type="text" name="site_url" value="<?php echo "http://".$_SERVER['HTTP_HOST'].rtrim(str_replace('\\', '/', dirname(dirname($_SERVER['SCRIPT_NAME']))),'/');?>" size="40" class='input' /></p>

</div>
<!--
<b><?php echo $i_message['isuc'];?></b>:<input type="radio" name="isuc" value="1" onClick="on_uc(this);"><?php echo $i_message['yesuc'];?><input type="radio" name="isuc" value="2" checked="checked" onClick="on_uc(this);"><?php echo $i_message['nouc'];?>
-->
<!--添加ucenter数据库配置 jeffxie 2010-8-24-->
<div class="shade" id="uc_config" style="display:none">
<div class="settingHead" style="color:red"><?php echo $i_message['add_ucenter'];?></div>

<h5><?php echo $i_message['install_mysql_host'];?></h5>
<p><?php echo $i_message['install_mysql_host_intro'];?></p>
<p><input type="text" name="uc_db_host" value="localhost" size="40" class='input' /></p>

<h5><?php echo $i_message['install_mysql_username'];?></h5>
<p><input type="text" name="uc_db_username" value="root" size="40" class='input' /></p>

<h5><?php echo $i_message['install_mysql_password'];?></h5>
<p><input type="password" name="uc_db_password" value="" size="40" class='input' /></p>

<h5><?php echo $i_message['install_mysql_name'];?></h5>
<p><input type="text" name="uc_db_name" value="ucenter" size="40" class='input' />
</p>

<h5><?php echo $i_message['install_mysql_prefix'];?></h5>
<p><?php echo $i_message['install_mysql_prefix_intro'];?></p>
<p><input type="text" name="uc_db_prefix" value="uc_" size="40" class='input' /></p>

<h5><?php echo $i_message['site_url'];?></h5>
<p><?php echo $i_message['site_url_intro'];?></p>
<p><input type="text" name="uc_site_url" value="http://localhost/uc" size="40" class='input' /></p>

</div>



<div class="shade">
<div class="settingHead"><?php echo $i_message['founder'];?></div>

<h5><?php echo $i_message['auto_increment'];?></h5>
<p><input type="text" name="first_user_id" value="1" size="40" class='input' /></p>

<h5><?php echo $i_message['install_founder_email'];?></h5>
<p><input type="text" name="email" value="jeffxie@gmail.com" size="40" class='input' /></p>

<h5><?php echo $i_message['install_founder_password'];?></h5>
<p><input type="text" name="password" value="" size="40" class='input' /></p>

<h5><?php echo $i_message['install_founder_rpassword'];?></h5>
<p><input type="text" name="rpassword" value="" size="40" class='input' /></p>


</div>
<div class="center">
	<input type="button" class="submit" name="prev" value="<?php echo $i_message['install_prev'];?>" onClick="history.go(-1)">&nbsp;
	<input type="submit" class="submit" name="next" value="<?php echo $i_message['install_next'];?>">
</form>
</div>
<script type="text/javascript" language="javascript">
function check(obj)
{
	if (!obj.db_host.value)
	{
		alert('<?php echo $i_message['install_mysql_host_empty'];?>');
		obj.db_host.focus();
		return false;
	}
	else if (!obj.db_username.value)
	{
		alert('<?php echo $i_message['install_mysql_username_empty'];?>');
		obj.db_username.focus();
		return false;
	}
	else if (!obj.db_name.value)
	{
		alert('<?php echo $i_message['install_mysql_name_empty'];?>');
		obj.db_name.focus();
		return false;
	}

	else if (obj.password.value != obj.rpassword.value)
	{
		alert('<?php echo $i_message['install_founder_rpassword_error'];?>');
		obj.rpassword.focus();
		return false;
	}
	else if (!obj.email.value)
	{
		alert('<?php echo $i_message['install_founder_email_empty'];?>');
		obj.email.focus();
		return false;
	}
	return true;
}
</script>
<?php
}
elseif ($v == '4')
{
	if(empty($db_host) || empty($db_username) || empty($db_name) || empty($db_prefix))
	{
		$msg .= '<p>'.$i_message['mysql_invalid_configure'].'<p>';
		$quit = TRUE;
	}
	elseif (!@mysql_connect($db_host, $db_username, $db_password))
	{
		$msg .= '<p style="color:red;">'.$i_message['db_error'].':'.$i_message['database_errno_'.mysql_errno()].'</p>';
		$quit = TRUE;
	}
	if(strstr($db_prefix, '.'))
	{
		$msg .= '<p>'.$i_message['mysql_invalid_prefix'].'</p>';
		$quit = TRUE;
	}

	if (strlen($password) < 6)
	{
		$msg .= '<p>'.$i_message['founder_invalid_password'].'</p>';
		$quit = TRUE;
	}
	elseif ($password != $rpassword)
	{
		$msg .= '<p>'.$i_message['founder_invalid_rpassword'].'</p>';
		$quit = TRUE;
	}
	elseif (!preg_match('/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,3}$/i', $email))
	{
		$msg .= '<p>'.$i_message['founder_invalid_email'].'</p>';
		$quit = TRUE;
	}
	else
	{
		$forbiddencharacter = array ("\\","&"," ","'","\"","/","*",",","<",">","\r","\t","\n","#","$","(",")","%","@","+","?",";","^");
		foreach ($forbiddencharacter as $value)
		{
			if (strpos($username, $value) !== FALSE)
			{
				$msg .= '<p>'.$i_message['forbidden_character'].'</p>';
				$quit = TRUE;
				break;
			}
		}
	}
//ucenter检测
if($isuc == 1)//如果选择了，就检测，否则直接跳过
{
	if(empty($uc_db_host) || empty($uc_db_username) || empty($uc_db_name) || empty($uc_db_prefix))
	{
		$msg .= '<p>'.$i_message['mysql_invalid_configure'].'<p>';
		$quit = TRUE;
	}
	elseif (!@mysql_connect($uc_db_host, $uc_db_username, $uc_db_password))
	{
		$msg .= '<p style="color:red;">ucenter数据库错误:'.$i_message['database_errno_'.mysql_errno()].'</p>';
		$quit = TRUE;
	}

	if(strstr($uc_db_prefix, '.'))
	{
		$msg .= '<p>'.$i_message['mysql_invalid_prefix'].'</p>';
		$quit = TRUE;
	}
}

//ucenter检测完毕


	if ($quit)
	{
		$allownext = 'disabled="disabled"';
		?>
		<div class="error"><?php echo $i_message['error'];?></div>
		<?php
		echo $msg;
	}
	else
	{

		$config_file_content	=	array();
		$config_file_content['db_host']			=	$db_host;
		$config_file_content['db_name']			=	$db_name;
		$config_file_content['db_username']		=	$db_username;
		$config_file_content['db_password']		=	$db_password;
		$config_file_content['db_prefix']		=	$db_prefix;
		$config_file_content['db_pconnect']		=	0;
		$config_file_content['db_charset']		=	'utf8';
		$config_file_content['dbType']			=	'MySQL';

		$default_manager_account	=	array();
		$default_manager_account['email']		=	$email;
		$default_manager_account['password']	=	$password; //暂时不考虑加入md5 jeffxie@gmail.com

		$_SESSION['config_file_content']		=	$config_file_content;
		$_SESSION['default_manager_account']	=	$default_manager_account;
		$_SESSION['first_user_id']				=	$first_user_id;
		$_SESSION['site_url']					=	$site_url;
        $_SESSION['uc_site_url']					=	$uc_site_url;
	}
?>
	<div class="botBorder">
    <h4><?php echo $i_message['create_founder'];?></h4>
		<p><?php echo $i_message['install_founder_name'], ': ', $email?></p>
		<p><?php echo $i_message['install_founder_password'], ': ', $password;?></p>
	</div>
	<div class="center">
		<form method="post" action="install.php?v=5">
		<input type="button" class="submit" name="prev" value="<?php echo $i_message['install_prev'];?>" onClick="history.go(-1)">&nbsp;
		<input type="submit" class="submit" name="next" value="<?php echo $i_message['install_next'];?>" <?=$allownext?>>
		</form>
	</div>
<?php
if($quit)
    {
            die;
    }

?>
<div class="botBorder">
<div class="botBorder">
<?php
//写配置文件
$fp = fopen(TG_ROOT.$TGroupon_config_file, 'wb');
$configfilecontent = <<<EOT
<?php
/**
 * Language packages
 *
 * This is a Language packages config files.
 *
 * @copyright JeffCMS (c)2010 www.thinkgroupon.com
 * @author jeffxie <jeffxie@gmail.com>
 * @version $Id: template.php, v 0.0.1 2010-8-20
 */
class db_config {
    public static \$dbconfig = array('db_type'=>'mysql','db_port'=>'3306','db_charset'=>'utf8','db_server'=>'$db_host','db_user'=>'$db_username','db_pwd'=>'$db_password','db_name'=>'$db_name');
}
?>
EOT;
chmod(TG_ROOT.$TGroupon_config_file, 0777);
$result_1	=	fwrite($fp, trim($configfilecontent));
@fclose($fp);

if($result_1 && file_exists(TG_ROOT.$TGroupon_config_file)){
?>
	<p><?php echo $i_message['config_log_success']; ?></p>
<?php
}else{
?>
	<p><?php echo $i_message['config_read_failed']; $quit = TRUE;?></p>

<?php
}


$fp = fopen(TG_ROOT.$TGroupon_define_file, 'wb');

$site_path	=	TG_ROOT;
//设置二级目录判断(是否安装到二级目录，而非根目录,作用于跳转路径)
$selfUrl = $_SERVER["PHP_SELF"];
$path = explode('/',$selfUrl);
if($path[1] != 'install')
{
    $www_url = $path[1];
}
//写入TGroupon.php文件
$fpphpinfo = fopen(TG_ROOT.$TGroupon_define_file, 'wb');
$phpinfo = <<<EOT
<?php
/**
 * Language packages
 *
 * This is a Language packages config files.
 *
 * @copyright JeffCMS (c)2010 www.thinkgroupon.com
 * @author jeffxie <jeffxie@gmail.com>
 * @version $Id: template.php, v 0.0.1 2010-8-20
 */
error_reporting(0);
define('__WWW_PATH__','$www_url');
define('__ROOT__',dirname(__FILE__)); //网站根
define('__MOD__',__ROOT__  . '/apps'); //模型
define('__ADMINMOD__',__ROOT__  . '/admin'); //后台模型 2011-1-7 jeffxie
define('__FRAME__',__ROOT__  . '/framework'); //框架
define('__STATIC__','static');
define('__UPLOADFILES__','uploadfiles');
define('TGROUPON','tg'); //授权
define('__PREFIX_TAB__','$db_prefix');//数据表前缀
define('__DATANAME__','$db_name'); //数据库名称
define('__DOMAIN__','$site_url'); //当前域名,有可能是二级域名,有可能是二级目录，如www.g.com/test/thinkgroupon
define('SQLDEBUG',false); //false为不在调试模式下输出SQL语句,true为打开(数据库调试模式)
define('TPLDEBUG',false); //页面信息调试
?>
EOT;
$result_n	=	fwrite($fpphpinfo, trim($phpinfo));
fclose($fpphpinfo);
if($result_n && file_exists(TG_ROOT.$TGroupon_define_file)){
?>
	<p><?php echo $i_message['define_log_success']; ?></p>
<?php
}else{
?>
	<p><?php echo $i_message['define_read_failed']; $quit = TRUE;?></p>

<?php
}
?>
	</div>
<?php
}
elseif ($v == '5')
{
	$db_config	=	$_SESSION['config_file_content'];

	if (!$db_config['db_host'] && !$db_config['db_name'])
	{
		$msg .= '<p>'.$i_message['configure_read_failed'].'</p>';
		$quit = TRUE;
	}
	else
	{
		mysql_connect($db_config['db_host'], $db_config['db_username'], $db_config['db_password']);
		$sqlv = mysql_get_server_info();
		if($sqlv < '4.1')
		{
			$msg .= '<p>'.$i_message['mysql_version_402'].'</p>';
			$quit = TRUE;
		}
		else
		{
			$db_charset	=	$db_config['db_charset'];
			$db_charset = (strpos($db_charset, '-') === FALSE) ? $db_charset : str_replace('-', '', $db_charset);

			mysql_query(" CREATE DATABASE IF NOT EXISTS `{$db_config['db_name']}` DEFAULT CHARACTER SET $db_charset ");

			if (mysql_errno())
			{
				$errormsg = $i_message['database_errno_'.mysql_errno()];
				$msg .= '<p>'.($errormsg ? $errormsg : $i_message['database_errno']).'</p>';
				$quit = TRUE;
			}
			else
			{
				mysql_select_db($db_config['db_name']);
			}

			//判断是否有用同样的数据库前缀安装过
			$re		=	mysql_query("SELECT COUNT(1) FROM {$db_config['db_prefix']}user");
			$link	=	@mysql_fetch_row($re);

			if( intval($link[0]) > 0 )
			{
				$TGroupon_rebuild	=	true;
				$msg .= '<p>'.$i_message['TGroupon_rebuild'].'</p>';
				$alert = ' onclick="return confirm(\''.$i_message['TGroupon_rebuild'].'\');"';
			}
		}
	}

if ($quit)
{
		$allownext = 'disabled="disabled"';
?>
<div class="error"><?php echo $i_message['error'];?></div>
<?php
	echo $msg;
}
else
{
?>
<div class="botBorder">
<?php
if($TGroupon_rebuild){
?>
<p style="color:red;font-size:16px;"><?php echo $i_message['TGroupon_rebuild'];?></p>
<?php
}
?>
<p><?php echo $i_message['mysql_import_data'];?></p>
</div>
<?php
}
?>
<div class="center">
	<form method="post" action="install.php?v=6">
	<input type="button" class="submit" name="prev" value="<?php echo $i_message['install_prev'];?>" onClick="history.go(-1)">&nbsp;
	<input type="submit" class="submit" name="next" value="<?php echo $i_message['install_next'];?>" <?php echo $allownext,$alert?>>
	</form>
</div>
<?php
}
elseif ($v == '6')
{
	$db_config	=	$_SESSION['config_file_content'];
	mysql_connect($db_config['db_host'], $db_config['db_username'], $db_config['db_password']);
	if (mysql_get_server_info() > '5.0')
	{
		mysql_query("SET sql_mode = ''");
	}
	$db_config['db_charset'] = (strpos($db_config['db_charset'], '-') === FALSE) ? $db_config['db_charset'] : str_replace('-', '', $db_config['db_charset']);
	mysql_query("SET character_set_connection={$db_config['db_charset']}, character_set_results={$db_config['db_charset']}, character_set_client=binary");
	mysql_select_db($db_config['db_name']);
	$tablenum = 0;
	$fp = fopen($installfile, 'rb');
	$sql = fread($fp, filesize($installfile));
	fclose($fp);


?>
<div class="botBorder">
<h4><?php echo $i_message['import_processing'];?></h4>
<div style="overflow-y:scroll;height:100px;width:715px;padding:5px;border:1px solid #ccc;">
<?php
	$db_charset	=	$db_config['db_charset'];
	$db_prefix	=	$db_config['db_prefix'];
	$sql = str_replace("\r", "\n", str_replace('`'.'tg_', '`'.$db_prefix, $sql));
	$ret = array();
	$num = 0;
	foreach(explode(";\n", trim($sql)) as $query)
	{
		$queries = explode("\n", trim($query));
		$sq = "";
		foreach($queries as $query)
		{
			$sq .= $query;
		}
		$ret[$num] = $sq;
		$num ++;
	}
	unset($sql);
	foreach($ret as $query)
	{
		$query = trim($query);
		if($query) {
			if(substr($query, 0, 12) == 'CREATE TABLE')
			{
				$name = preg_replace("/CREATE TABLE `([a-z0-9_]+)` .*/is", "\\1", $query);
				echo '<p>'.$i_message['create_table'].' '.$name.' ... <span class="blue">OK</span></p>';
				@mysql_query(createtable($query, $db_charset));
				$tablenum ++;
			}
			else
			{
				@mysql_query($query);
			}
		}
	}
?>
</div>
</div>
<?php

	//添加管理员
    $time = time();
	$siteFounder	=	$_SESSION['default_manager_account'];
    $strSQL	="UPDATE `{$db_config['db_prefix']}config` SET config_admin_email='".$siteFounder['email']."',config_website='".$_SESSION['site_url']."'";
	$sql1	=	"INSERT INTO `{$db_config['db_prefix']}admin` (`admin_name`, `admin_password`,`level`,`admin_regtime`) VALUES ( '".$siteFounder['email']."', '".$siteFounder['password']."',1,$time);";

	if( mysql_query($sql1) && mysql_query($strSQL) ){
		echo '<p>'.$i_message['create_founderpower_success'].'... <span class="blue">OK</span></p>';
	} else {
		echo '<p>'.$i_message['create_founderpower_error'].'... <span class="red">ERROR</span></p>';
		$quit	=	true;
	}



	if(!$quit){
		//锁定安装
		fopen('install.lock', 'w');
		//@unlink('index.html');
	}else{
		echo $i_message['re_install'];
	}
?>
</div>
<div class="botBorder">
<h4><?php echo $i_message['install_success'];?></h4>
<?php echo $i_message['install_success_intro'];?>
</div>
<?php
}
?>
</div>
<div class='copyright'>TGroupon <?php echo $_TSVERSION; ?> &#169; copyright 2010-2012 www.thinkgroupon.com All Rights Reserved</div>
</div>
<div style="display:none;">
<script type="text/javascript">
function on_uc(val)
{
if(val.value == 1)
{
	document.getElementById("uc_config").style.display="block";
}
else{
	document.getElementById("uc_config").style.display="none";
}
}
</script>
<script src="http://s15.cnzz.com/stat.php?id=2311221&web_id=2311221" language="JavaScript" charset="gb2312"></script>//改成自己的统计

</div>
</body>
</html>
