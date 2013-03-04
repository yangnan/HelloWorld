<?PHP
session_start();
?>
<html>
<head>
<?PHP
// 这里只取第一语言设置 （其他可根据需要增强功能，这里只做简单的方法演示）
include 'install_lang_cn.php';
include "define.php";
include 'install_function.php';
$_SESSION["language"] = "cn";
?>
<title><?=$i_message['install_title'];?></title>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<link href="images/style.css" rel="stylesheet" type="text/css" />
<body>
<div id='content'>
<div id='pageheader'>
	<div id="logo"><img src="images/logo.png" width="222" height="71" border="0" alt="TGroupon" /></div>
	<div id="version" class="rightheader">Version 3.5 </div>
</div>
<div id='innercontent'>
	<h1><?=$i_message['copyname'];?></h1>
    <div class="botBorder">
        <p style="font-size:16px"><?=$i_message['install_welcome'];?></p>
    </div>
	<form method="get" action="install.php">
		<p class="center"><input type="submit" class="submit" value=" <?=$i_message['index_button']?> " /></p>
	</form>
</div>
</div>
<div class='copyright'>TGroupon V3.5 &#169; copyright 2010-2012 www.thinkgroupon.com All Rights Reserved</div>
</div>
<div style="display:none;">
<script src="http://s15.cnzz.com/stat.php?id=2311221&web_id=2311221" language="JavaScript" charset="gb2312"></script>
</div>
</body>
</html>