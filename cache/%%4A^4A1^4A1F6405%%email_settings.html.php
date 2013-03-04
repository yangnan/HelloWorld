<?php /* Smarty version 2.6.13, created on 2011-06-02 10:37:38
         compiled from email_settings.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_cp', 'email_settings.html', 12, false),)), $this); ?>
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
</head>
<body>
<form action="" method="post" enctype="multipart/form-data" name="theform">
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="77%" ><h2><?php echo smarty_function_lang_cp(array('str' => 'mailbox_settings'), $this);?>
</h2></td>
      <td width="23%" ></td>
    </tr>
    <tr>
      <td colspan="2" class="sty"></td>
    </tr>
  </table>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr height="30">
      <td height="20" class="biaoge"><?php echo smarty_function_lang_cp(array('str' => 'smtp_server'), $this);?>
</td>
      <td><input type="text" name="smtp_server" id="smtp_server" size="45" value="<?php echo $this->_tpl_vars['email_select']['smtp_server']; ?>
"></td>
    </tr>
	 <tr height="30">
      <td height="20" class="biaoge"><?php echo smarty_function_lang_cp(array('str' => 'smtp_port'), $this);?>
&nbsp;</td>
      <td><input name="smtp_port" type="text" id="smtp_port" size="45" value="<?php echo $this->_tpl_vars['email_select']['smtp_port']; ?>
"></td>
    </tr>
    <tr height="30">
      <td height="20" valign="middle" class="biaoge"><?php echo smarty_function_lang_cp(array('str' => 'smtp_mailboxes'), $this);?>
</td>
      <td><input name="smtp_mailboxes" type="text" id="smtp_mailboxes"  size="45" value="<?php echo $this->_tpl_vars['email_select']['smtp_mailboxes']; ?>
"></td>
    </tr>
	<tr height="30">
	  <td height="20" valign="middle" class="biaoge"><?php echo smarty_function_lang_cp(array('str' => 'smtp_accounts'), $this);?>
</td>
	  <td><input type="text" name="smtp_accounts" id="smtp_accounts"  size="45" value="<?php echo $this->_tpl_vars['email_select']['smtp_accounts']; ?>
"></td>
	</tr>
	<tr height="30">
	  <td height="20" valign="middle" class="biaoge"><?php echo smarty_function_lang_cp(array('str' => 'smtp_password'), $this);?>
</td>
	  <td><input type="password" name="smtp_password" id="smtp_password"  size="45" value="<?php echo $this->_tpl_vars['email_select']['smtp_password']; ?>
"></td>
	</tr>
	<tr height="30">
      <td height="52" valign="top" class="biaoge">&nbsp;</td>
      <td align="left" valign="middle"><input type="submit" id="submit" name="Submit" value="<?php echo smarty_function_lang_cp(array('str' => 'submit'), $this);?>
">
    </tr>
  </table>
</form>
</body>
</html>