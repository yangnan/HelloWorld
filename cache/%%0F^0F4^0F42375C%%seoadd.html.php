<?php /* Smarty version 2.6.13, created on 2011-06-02 10:37:35
         compiled from seoadd.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_cp', 'seoadd.html', 42, false),)), $this); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<TITLE>管理页面</TITLE>
<link href="templates/admin/css/main_common.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="static/js/ui.datepicker.css" type="text/css" media="screen"  charset="utf-8" />
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/common.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script src="static/js/ui.datepicker.js" type="text/javascript" charset="utf-8"></script>
<script src="static/js/ui.datepicker-zh-CN.js" type="text/javascript" charset="utf-8"></script>	
<!--<script type="text/javascript" charset="utf-8">
	jQuery(function($){
		$('#start_time').datepicker({
			yearRange: '1900:2099', //取值范围.
			showOn: 'both', //输入框和图片按钮都可以使用日历控件。
			buttonImage: 'static/js/calendar.gif', //日历控件的按钮
			buttonImageOnly: true,
			showButtonPanel: true
		});	
		$('#end_time').datepicker({
			yearRange: '1900:2099', //取值范围.
			showOn: 'both', //输入框和图片按钮都可以使用日历控件。
			buttonImage: 'static/js/calendar.gif', //日历控件的按钮
			buttonImageOnly: true,
			showButtonPanel: true
		});		
	});
</script>-->
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
      <td width="23%" ><a href="./admin.php?tg=/seolist/"><?php echo smarty_function_lang_cp(array('str' => 'list'), $this);?>
</a></td>
    </tr>
    <tr>
      <td colspan="2" class="sty"></td>
    </tr>
  </table>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr height="30">
      <td height="20" class="biaoge" width="147"><?php echo smarty_function_lang_cp(array('str' => 'page_title'), $this);?>
&nbsp;</td>
      <td width="1084"><input name="page_title" type="text" class="required" id="page_title" size="45"></td>
    </tr>
    <tr height="30">
      <td height="20" class="biaoge"><?php echo smarty_function_lang_cp(array('str' => 'keywords'), $this);?>
<br><?php echo smarty_function_lang_cp(array('str' => 'commas'), $this);?>
</td>
      <td><input name="keywords" type="text" class="required" id="keywords" size="45"></td>
    </tr>
	<tr height="30">
      <td height="20" class="biaoge"><?php echo smarty_function_lang_cp(array('str' => 'search_content'), $this);?>
</td>
      <td><input name="search" type="text" class="required" id="search" size="45"></td>
    </tr>
    <tr height="30">
      <td height="20" valign="middle" class="biaoge"><?php echo smarty_function_lang_cp(array('str' => 'page_position'), $this);?>
</td>
      <td>
	  <?php $_from = $this->_tpl_vars['link_url']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['link_url']):
?>
	  <?php echo $this->_tpl_vars['link_url']; ?>
<input name="page" type="radio" value="<?php echo $this->_tpl_vars['link_url']; ?>
">
	  <?php endforeach; endif; unset($_from); ?>
      </td>
    </tr>
	<tr height="30">
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