<?php /* Smarty version 2.6.13, created on 2011-06-02 10:37:25
         compiled from adsadd.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_cp', 'adsadd.html', 43, false),)), $this); ?>
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
<script src="static/js/date.js" type="text/javascript" charset="utf-8"></script>
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
      <td width="23%" ><a href="./admin.php?tg=/adslist/"><?php echo smarty_function_lang_cp(array('str' => 'list'), $this);?>
</a></td>
    </tr>
    <tr>
      <td colspan="2" class="sty"></td>
    </tr>
  </table>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr height="30">
      <td height="20" class="biaoge"><?php echo smarty_function_lang_cp(array('str' => 'ads_name'), $this);?>
&nbsp;</td>
      <td><input name="ads_name" type="text" class="required" id="ads_name" size="45"></td>
    </tr>
    <tr height="30">
      <td height="20" class="biaoge"><?php echo smarty_function_lang_cp(array('str' => 'ads_page'), $this);?>
</td>
      <td><?php echo smarty_function_lang_cp(array('str' => 'home_show'), $this);?>
<input name="page" type="radio" value="1" checked>
      &nbsp;<?php echo smarty_function_lang_cp(array('str' => 'list'), $this); echo smarty_function_lang_cp(array('str' => 'display'), $this);?>
<input type="radio" name="page" value="2"></td>
    </tr>
    <tr height="30">
      <td height="20" valign="middle" class="biaoge"><?php echo smarty_function_lang_cp(array('str' => 'ads_position'), $this);?>
</td>
      <td><select name="position">
        <option value="1"><?php echo smarty_function_lang_cp(array('str' => 'head'), $this);?>
</option>
        <option value="2"><?php echo smarty_function_lang_cp(array('str' => 'remind'), $this);?>
</option>
		<option value="3"><?php echo smarty_function_lang_cp(array('str' => 'tail'), $this);?>
</option>
		<option value="4"><?php echo smarty_function_lang_cp(array('str' => 'around'), $this);?>
</option>
      </select>
      </td>
    </tr>
	<tr height="30">
	  <td height="20" valign="middle" class="biaoge"><?php echo smarty_function_lang_cp(array('str' => 'ads_type'), $this);?>
&nbsp;</td>
	  <td><?php echo smarty_function_lang_cp(array('str' => 'font'), $this);?>
<input name="ads_type" type="radio" value="1" checked>
	  &nbsp;<?php echo smarty_function_lang_cp(array('str' => 'pic'), $this);?>
<input name="ads_type" type="radio" value="2"></td>
	</tr>
	<tr height="30">
      <td height="20" valign="middle" class="biaoge"><?php echo smarty_function_lang_cp(array('str' => 'start_time'), $this);?>
</td>
      <td><input type="text" name="start_time" class="required" id="start_time"  size="45" onClick="return Calendar('start_time','end_time');"></td>
    </tr>
	<tr height="30">
	  <td height="29" valign="top" class="biaoge"><?php echo smarty_function_lang_cp(array('str' => 'end_time'), $this);?>
&nbsp;</td>
	  <td align="left" valign="middle"><input type="text" name="end_time" class="required" id="end_time" size="45" onClick="return Calendar('end_time');"></td>
    </tr>
	<tr>
      <td width="8%" height="214" valign="top" class="biaoge"><label>
        <?php echo smarty_function_lang_cp(array('str' => 'content'), $this);?>

        </label></td>
      <td valign="top" align="left">
		<textarea name="gg_content" id="gg_content" style="display:none;"></textarea>
		<iframe id="tgedit" name="tgedit" src="templates/admin/TGEditor/Edit/editor.htm?id=gg_content&ReadCookie=0" frameBorder="0" marginHeight="0" marginWidth="0" scrolling="No" width="500" height="300"></iframe>
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
<script type="text/javascript">
$("#submit").click(function(){
//要做此操作,否则第一次提交无法判断其有值,xiezhanhui2011-3-16
    window.frames["tgedit"].AttachSubmit();
});
</script>
</body>
</html>