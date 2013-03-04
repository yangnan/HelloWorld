<?php /* Smarty version 2.6.13, created on 2011-06-02 10:31:41
         compiled from index/tigongtuangouxinxi.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_cp', 'index/tigongtuangouxinxi.html', 6, false),array('function', 'getstaticpath', 'index/tigongtuangouxinxi.html', 8, false),array('function', 'language_message', 'index/tigongtuangouxinxi.html', 12, false),array('function', 'lang_message', 'index/tigongtuangouxinxi.html', 48, false),array('function', 'language_cp', 'index/tigongtuangouxinxi.html', 50, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo smarty_function_lang_cp(array('str' => 'provide_manage'), $this);?>
</title>
<!--<link rel="stylesheet" type="text/css" href="css/style.css" />-->
<link rel="stylesheet" type="text/css" href="<?php echo smarty_function_getstaticpath(array(), $this);?>
style/style.css" />
<script type="text/javascript">
function checkForm(){
	if(document.theform.name1.value == ""){
		alert("<?php echo smarty_function_language_message(array('str' => 'nick_null'), $this);?>
！");
		return false;
	}else if(document.theform.tel.value == ""){
		alert("<?php echo smarty_function_language_message(array('str' => 'phone_null'), $this);?>
！");
		return false;
	}else if(document.theform.input2.value == ""){
		alert("<?php echo smarty_function_language_message(array('str' => 'other_contact_null'), $this);?>
！");
		return false;
	}else if(document.theform.city.value == ""){
		alert("<?php echo smarty_function_language_message(array('str' => 'city_null'), $this);?>
！");
		return false;
	}else if(document.theform.textarea.value == ""){
		alert("<?php echo smarty_function_language_message(array('str' => 'groupon_null'), $this);?>
！");
		return false;
	}
}
</script>
</head>

<body>
<!--头部-->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<form method="post" action="" name="theform" id="theform" enctype="multipart/form-data">
<div class="page">
    	<!--<div class="banner"></div>-->
        <div class="con">
        	<div class="con_left">
            	<div class="con_left01">
                </div>
                <div class="con_left02" style="position:relative;">
                	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  						<tr>
    						<td valign="top">
    							<p class="lb01"><?php echo smarty_function_lang_cp(array('str' => 'provide_manage'), $this);?>
</p>
        							<div class="lin"></div>
        							<div class="tgtgxx_con">
        						<p><strong><?php echo smarty_function_lang_message(array('str' => 'ifyouisshop'), $this);?>
：</strong></p>
            						<ul>
            							<li><span><?php echo smarty_function_language_cp(array('str' => 'yournick'), $this);?>
</span><p><input name="name1" id="name1" type="text" class="wbk" /></p></li>
                						<li><span><?php echo smarty_function_language_cp(array('str' => 'yourphone'), $this);?>
</span><p><input name="tel" id="tel" type="text" class="wbk" /></p></li>
                						<li><span><?php echo smarty_function_lang_cp(array('str' => 'other_contact'), $this);?>
</span><p><input name="input2" id="input2" type="text" class="wbk" /></p></li>
                						<li class="ts" style="height:15px; line-height:15px; color:#999;"><span>&nbsp;</span><p style="height:15px; line-height:15px; padding:0;"><?php echo smarty_function_lang_message(array('str' => 'yourcontactplease'), $this);?>
</p></li>
                						<li>
											<span><?php echo smarty_function_lang_cp(array('str' => 'city'), $this);?>
</span><p><input type="text" name="city" id="city" /></p>
                						</li>
                						<li style="margin-top:5px;" class="lixin">
											<span><?php echo smarty_function_lang_cp(array('str' => 'groupon_content'), $this);?>
</span>
												<p class="pxin" style="height:85px;"><textarea name="textarea" id="textarea" cols="30" rows="5" style=""></textarea></p>
										</li>
										<li style="margin-top:5px;">
											<span>&nbsp;</span>
												<p><input name="upto" id="upto" type="submit" onclick="return checkForm()" class="wban" value="<?php echo smarty_function_lang_cp(array('str' => 'submit'), $this);?>
" /></p>
										</li>
           		 					</ul>
								</p>
        </div>
        </td>
  </tr>
  <tr>
  <td></td>
  </tr>
</table>
</div>
</form>
                <div class="con_left03">
                </div>
        	</div>
			<!--右部-->
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/right.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </div>
    </div>
<div class="clera"></div>
<!--底部-->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    
</body>
</html>