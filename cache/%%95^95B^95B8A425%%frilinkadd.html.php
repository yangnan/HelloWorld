<?php /* Smarty version 2.6.13, created on 2011-06-02 10:37:27
         compiled from frilinkadd.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_cp', 'frilinkadd.html', 12, false),)), $this); ?>
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
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="77%" ><h2><?php echo smarty_function_lang_cp(array('str' => 'add'), $this);?>
</h2></td>
      <td width="23%" ><a href="./admin.php?tg=/extraList/"><?php echo smarty_function_lang_cp(array('str' => 'list'), $this);?>
</a></td>
    </tr>
    <tr>
      <td colspan="2" class="sty"></td>
    </tr>
  </table>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="10%" height="40" class="biaoge"><?php echo smarty_function_lang_cp(array('str' => 'title'), $this);?>
:</td>
      <td width="90%" align="left"><input name="frilink_title" type="text" class="required" id="frilink_title" size="55"></td>
    </tr>
    <tr>
      <td height="40" valign="middle" class="biaoge"><?php echo smarty_function_lang_cp(array('str' => 'frilink_url'), $this);?>
:</td>
      <td align="left"><input type="text" name="frilink_url" class="required url" id="frilink_url" size="55"></td>
    </tr>
    <tr>
      <td height="52" valign="middle" class="biaoge"><?php echo smarty_function_lang_cp(array('str' => 'status'), $this);?>
:</td>
      <td align="left" valign="middle"><select name="status">
          <option value="1" >
          <?php echo smarty_function_lang_cp(array('str' => 'display'), $this);?>

          </option>
          <option value="0" >
          <?php echo smarty_function_lang_cp(array('str' => 'hide'), $this);?>

          </option>
        </select>
      </td>
    </tr>
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