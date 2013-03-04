<?php /* Smarty version 2.6.13, created on 2011-06-02 10:37:16
         compiled from system_settings.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_cp', 'system_settings.html', 45, false),array('function', 'language_cp', 'system_settings.html', 76, false),)), $this); ?>
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
<script language="javascript" type="text/javascript" src="static/js/priveimg.js"></script>
<script type="text/javascript">
<!--

$(document).ready(function(){
  $("#logo_links").hide();
  $("#upfile").click(function(){
	  $("#logo_links").hide();
	  $("#upload").show();
	  $("#preview_fake").show();
  });
  $("#links").click(function(){
	  $("#logo_links").show();
	  $("#upload").hide();
	  $("#preview_fake").hide();
  });
});

//-->
</script>
<style type="text/css">  
#preview_fake{ /* 该对象用户在IE下显示预览图片 */  
  filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale);  
}
#preview{ /* 该对象用户在FF下显示预览图片 */  
  width:150px;  
  height:150px;  
} 
#preview_size_fake{ /* 该对象只用来在IE下获得图片的原始尺寸，无其它用途 */  
  filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=image); 
  visibility:hidden;  
}  
</style>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data" name="theform">
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="77%" ><h2><?php echo smarty_function_lang_cp(array('str' => 'system_settings'), $this);?>
</h2></td>
      <td width="23%" ></td>
    </tr>
    <tr>
      <td colspan="2" class="sty"></td>
    </tr>
  </table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr height="30">
      <td height="20" class="biaoge"><?php echo smarty_function_lang_cp(array('str' => 'website_state'), $this);?>
</td>
      <td colspan="2"><?php echo smarty_function_lang_cp(array('str' => 'open'), $this);?>
<input name="website_state" type="radio" value="1" <?php if ($this->_tpl_vars['web_select']['config_frum_status'] == 1): ?>checked<?php endif; ?>>
      &nbsp;<?php echo smarty_function_lang_cp(array('str' => 'close'), $this);?>
<input type="radio" name="website_state" value="2" <?php if ($this->_tpl_vars['web_select']['config_frum_status'] == 2): ?>checked<?php endif; ?>></td>
    </tr>
	 <tr height="30">
      <td height="20" class="biaoge"><?php echo smarty_function_lang_cp(array('str' => 'website_name'), $this);?>
&nbsp;</td>
      <td colspan="2"><input name="website_name" type="text" class="required" id="website_name" size="45" value="<?php echo $this->_tpl_vars['web_select']['config_website_name']; ?>
"></td>
    </tr>
	<tr height="30">
      <td height="20" class="biaoge"><?php echo smarty_function_lang_cp(array('str' => 'tg_mode_set'), $this);?>
</td>
      <td colspan="2"><?php echo smarty_function_lang_cp(array('str' => 'one_group'), $this);?>
<input name="tg_mode_set" type="radio" value="1" <?php if ($this->_tpl_vars['web_select']['config_mode_set'] == 1): ?>checked<?php endif; ?>>
      &nbsp;<?php echo smarty_function_lang_cp(array('str' => 'one_groups'), $this);?>
<input type="radio" name="tg_mode_set" value="2" <?php if ($this->_tpl_vars['web_select']['config_mode_set'] == 2): ?>checked<?php endif; ?>></td>
    </tr>
    <tr height="30">
      <td height="20" valign="middle" class="biaoge"><?php echo smarty_function_lang_cp(array('str' => 'website'), $this);?>
</td>
      <td colspan="2"><input name="website" type="text" id="website"  size="45" value="<?php echo $this->_tpl_vars['web_select']['config_website']; ?>
"></td>
    </tr>
	<tr height="30">
	  <td height="20" valign="middle" class="biaoge"><?php echo smarty_function_lang_cp(array('str' => 'qqandmsn'), $this);?>
</td>
	  <td colspan="2"><input type="text" name="contact"  size="45" value="<?php echo $this->_tpl_vars['web_select']['config_contact']; ?>
"></td>
    </tr>
	<tr height="30">
	  <td height="20" valign="middle" class="biaoge"><?php echo smarty_function_language_cp(array('str' => 'message_key'), $this);?>
</td>
	  <td colspan="2"><input name="smskey" type="text" id="smskey" value="<?php echo $this->_tpl_vars['web_select']['config_sms_key']; ?>
" size="45"></td>
    </tr>
	<tr height="30">
	  <td height="20" valign="middle" class="biaoge"><?php echo smarty_function_lang_cp(array('str' => 'mobile'), $this);?>
</td>
	  <td colspan="2"><input type="text" name="mobile"  size="45" value="<?php echo $this->_tpl_vars['web_select']['config_mobile']; ?>
"></td>
    </tr>
	<tr height="30">
	  <td height="20" valign="middle" class="biaoge"><?php echo smarty_function_lang_cp(array('str' => 'admin_email'), $this);?>
&nbsp;</td>
	  <td colspan="2"><input type="text" name="admin_email"  size="45" value="<?php echo $this->_tpl_vars['web_select']['config_admin_email']; ?>
"></td>
	</tr>
	<tr height="30">
      <td height="20" valign="middle" class="biaoge"><?php echo smarty_function_lang_cp(array('str' => 'website_logo'), $this);?>
</td>
      <td colspan="2"><?php echo smarty_function_lang_cp(array('str' => 'logo_upfile'), $this);?>
:<input name="radiobutton" type="radio" id="upfile" value="radiobutton" checked>
      <?php echo smarty_function_lang_cp(array('str' => 'logo_links'), $this);?>
:<input type="radio" id="links" name="radiobutton" value="radiobutton"></td>
    </tr>
	<tr height="30">
      <td height="20" valign="middle" class="biaoge"></td>
      <td width="31%"><input type="text" name="logo_links" class="required" id="logo_links"  size="45" value="<?php echo $this->_tpl_vars['web_select']['config_website_logo']; ?>
"><input type="file" name="photo"  id="upload" size="35" id="photo"  onchange="onUploadImgChange(this)"></td>
      <td width="58%"><div id="preview_fake"><img id="preview" onload="onPreviewLoad(this)" src="uploadfiles/<?php echo $this->_tpl_vars['web_select']['config_website_logo']; ?>
" width="241px" height="68px"/></div><img id="preview_size_fake" width="150px" height="150px" />  </td>
	</tr>
	
	<tr height="30">
      <td height="52" valign="top" class="biaoge">&nbsp;</td>
    <td colspan="2" align="left" valign="middle"><input type="submit" id="submit" name="Submit" value="<?php echo smarty_function_lang_cp(array('str' => 'submit'), $this);?>
">    </tr>
  </table>
</form>
</body>
</html>