<?php /* Smarty version 2.6.13, created on 2011-06-02 10:37:37
         compiled from sendemail.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_cp', 'sendemail.html', 22, false),)), $this); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<TITLE>管理页面</TITLE>
<link href="templates/admin/css/main_common.css" rel="stylesheet" type="text/css" />

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/common.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript">
<!--

$(document).ready(function(){
$("#theform").validate();
});

//-->
</script>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data" name="theform" id="theform">
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="77%" ><h2><?php echo smarty_function_lang_cp(array('str' => 'add'), $this);?>
</h2></td>
      <td width="23%" ><a href="./admin.php?tg=/emaillist/"><?php echo smarty_function_lang_cp(array('str' => 'list'), $this);?>
</a></td>
    </tr>
    <tr>
      <td colspan="2" class="sty"></td>
    </tr>
  </table>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr height="30">
      <td height="20" class="biaoge"><?php echo smarty_function_lang_cp(array('str' => 'recipient'), $this);?>
&nbsp;</td>
      <td><input name="email_recipient" type="text" class="required" id="email_recipient" size="45" value="<?php echo $this->_tpl_vars['send']; ?>
"></td>
    </tr>
    <tr height="30">
      <td height="20" class="biaoge"><?php echo smarty_function_lang_cp(array('str' => 'theme'), $this);?>
&nbsp;</td>
      <td><input name="email_theme" type="text" class="required" id="email_theme" size="45"></td>
    </tr>
    <tr>
      <td width="8%" height="214" valign="top" class="biaoge"><label>
        <?php echo smarty_function_lang_cp(array('str' => 'content'), $this);?>

        </label></td>
      <td valign="top" align="left">
		<textarea name="send_email" id="send_email" style="display:none;"></textarea>
		<iframe id="tgedit" name="tgedit" src="templates/admin/TGEditor/Edit/editor.htm?id=send_email&ReadCookie=0" frameBorder="0" marginHeight="0" marginWidth="0" scrolling="No" width="300" height="100"></iframe>
      </td>
    </tr>
	<tr height="30">
      <td height="52" valign="top" class="biaoge">&nbsp;</td>
      <td align="left" valign="middle"><input type="submit" id="submit" name="submit" value="<?php echo smarty_function_lang_cp(array('str' => 'send'), $this);?>
">
    </tr>
  </table>
</form>
<script type="text/javascript">
$("#submit").click(function(){
//要做此操作,否则第一次提交无法判断其有值,xiezhanhui2011-3-16
    window.frames["tgedit"].AttachSubmit();
});
</script>
</body>
</html>