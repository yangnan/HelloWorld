<?php /* Smarty version 2.6.13, created on 2011-06-02 10:37:32
         compiled from expressadd.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_cp', 'expressadd.html', 13, false),)), $this); ?>
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
<form action="" method="post" enctype="multipart/form-data" name="theform" id="theform">

  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="40" class="biaoge"><?php echo smarty_function_lang_cp(array('str' => 'express'), $this); echo smarty_function_lang_cp(array('str' => 'name'), $this);?>
</td>
      <td><input name="express_name" type="text" class="required" id="express_name" size="45"></td>
    </tr>
	<tr>
      <td height="40" class="biaoge"><?php echo smarty_function_lang_cp(array('str' => 'express'), $this); echo smarty_function_lang_cp(array('str' => 'address'), $this);?>
</td>
      <td><input name="express_address" type="text" class="required" id="express_address" size="45"></td>
    </tr>
	<tr>
      <td height="40" class="biaoge"><?php echo smarty_function_lang_cp(array('str' => 'express'), $this); echo smarty_function_lang_cp(array('str' => 'phone'), $this);?>
</td>
      <td><input name="express_phone" type="text" class="required" id="express_phone" size="45"></td>
    </tr>
	<tr>
      <td height="40" class="biaoge"><?php echo smarty_function_lang_cp(array('str' => 'express'), $this); echo smarty_function_lang_cp(array('str' => 'mobile'), $this);?>
</td>
      <td><input name="express_mobile" type="text" class="required" id="express_mobile" size="45"></td>
    </tr>
  </table>
  
  
  
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="52" valign="top" class="biaoge">&nbsp;</td>
      <td align="left" valign="middle"><input type="submit" id="submit" name="Submit" value="<?php echo smarty_function_lang_cp(array('str' => 'submit'), $this);?>
">
        <input type="reset" name="" value="<?php echo smarty_function_lang_cp(array('str' => 'reset'), $this);?>
"></td>
    </tr>
  </table>
</form>
</body>
</html>