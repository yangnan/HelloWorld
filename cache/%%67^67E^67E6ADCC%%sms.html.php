<?php /* Smarty version 2.6.13, created on 2011-06-02 10:37:38
         compiled from sms.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_cp', 'sms.html', 22, false),)), $this); ?>
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
      <td width="23%" ></td>
    </tr>
    <tr>
      <td colspan="2" class="sty"></td>
    </tr>
  </table>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="294" valign="top" class="biaoge"><?php echo smarty_function_lang_cp(array('str' => 'mobile'), $this);?>
</td>
      <td valign="top" align="left"><p>
        <textarea name="mobile" cols="80" rows="20" id="mobile" style="display:;"></textarea>
      </p>
      <p>请用逗号分隔,例如13333333333,15000000000 </p></td>
    </tr>
    <tr>
      <td width="8%" height="214" valign="top" class="biaoge"><label>
        <?php echo smarty_function_lang_cp(array('str' => 'content'), $this);?>

        </label></td>
      <td valign="top" align="left">
		<p><br>
	        </p>
		<p>
		  <textarea name="content" cols="80" rows="20" id="send_email" style="display:;"></textarea>
        </p></td>
    </tr>
	<tr height="30">
      <td height="52" valign="top" class="biaoge">&nbsp;</td>
    <td align="left" valign="middle"><input type="submit" id="submit" name="submit" value="<?php echo smarty_function_lang_cp(array('str' => 'send'), $this);?>
">    </tr>
  </table>
</form>

</body>
</html>