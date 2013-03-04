<?php /* Smarty version 2.6.13, created on 2011-06-02 10:37:37
         compiled from emailadd.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_cp', 'emailadd.html', 41, false),)), $this); ?>
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
<script type="text/javascript">
<!--

$(document).ready(function(){
  $("#import1").hide();
  $("#add").click(function(){
      $("#add1").show();
	  $("#import1").hide();
	  
  });
  $("#import").click(function(){
	  $("#import1").show();
	  $("#add1").hide();
  });
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
      <td height="20" class="biaoge"></td>
      <td><input type="button" name="submit" value="<?php echo smarty_function_lang_cp(array('str' => 'add'), $this);?>
" id="add">
      <input type="button" name="import" value="<?php echo smarty_function_lang_cp(array('str' => 'import'), $this);?>
" id="import">
      <input type="submit" name="derived" value="<?php echo smarty_function_lang_cp(array('str' => 'derived'), $this);?>
" id="derived"></td>
  </tr>
    <tr height="30" id="add1">
      <td height="20" class="biaoge"></td>
      <td><?php echo smarty_function_lang_cp(array('str' => 'add'), $this); echo smarty_function_lang_cp(array('str' => 'email'), $this); echo smarty_function_lang_cp(array('str' => 'address'), $this);?>
&nbsp;:&nbsp;<input name="email" type="text"></td>
    </tr>
	<tr height="30" id="import1">
      <td height="20" class="biaoge"></td>
      <td><?php echo smarty_function_lang_cp(array('str' => 'import'), $this); echo smarty_function_lang_cp(array('str' => 'email'), $this); echo smarty_function_lang_cp(array('str' => 'address'), $this);?>
&nbsp;:&nbsp;<input name="import" type="file"></td>
    </tr>
	<tr height="30" id="derived1">
      <td height="20" class="biaoge"></td>
      <td><input type="submit" id="submit" name="submit" value="<?php echo smarty_function_lang_cp(array('str' => 'submit'), $this);?>
"></td>
    </tr>
  </table>
</form>
</body>
</html>