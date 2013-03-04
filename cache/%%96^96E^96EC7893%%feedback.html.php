<?php /* Smarty version 2.6.13, created on 2011-06-02 10:30:54
         compiled from index/feedback.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_cp', 'index/feedback.html', 8, false),array('function', 'getstaticpath', 'index/feedback.html', 10, false),array('function', 'language_cp', 'index/feedback.html', 27, false),array('function', 'language_message', 'index/feedback.html', 66, false),array('function', 'geturl', 'index/feedback.html', 109, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Description" content="<?php echo $this->_tpl_vars['seo']['seo_descript']; ?>
">
<meta name="Keywords" content="<?php echo $this->_tpl_vars['seo']['seo_keywords']; ?>
">
<title><?php echo smarty_function_lang_cp(array('str' => 'provide_manage'), $this);?>
-<?php echo $this->_tpl_vars['seo']['seo_title']; ?>
</title>
<!--<link rel="stylesheet" type="text/css" href="css/style.css" />-->
<link rel="stylesheet" type="text/css" href="<?php echo smarty_function_getstaticpath(array(), $this);?>
style/style.css" />
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
    	<div class="banner"><img src="<?php echo smarty_function_getstaticpath(array(), $this);?>
images/banner.gif" /></div>
        <div class="con">
        	<div class="con_left">
            	<div class="con_left01">
                </div>
                <div class="con_left02" style="position:relative;">
                	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  						<tr>
    						<td valign="top">
    							<p class="lb01"><?php echo smarty_function_language_cp(array('str' => 'feedback'), $this);?>
</p>
        							<div class="lin"></div>
        							<div class="tgtgxx_con">
            						<ul>
                						<li>
											<span><?php echo smarty_function_language_cp(array('str' => 'feedback'), $this);?>
</span><p><input type="text" name="title" id="title" /></p>
                						</li>
                						<li style="margin-top:5px;" class="lixin">
											<span><?php echo smarty_function_language_cp(array('str' => 'questioncontent'), $this);?>
</span>
												<p class="pxin" style="height:85px;"><textarea name="content" id="content" cols="30" rows="5" style=""></textarea></p>
										</li>
										<li><span><?php echo smarty_function_language_cp(array('str' => 'yournick'), $this);?>
</span><p><input name="name" id="name" type="text" class="wbk" /></p></li>
                						<li><span><?php echo smarty_function_language_cp(array('str' => 'yourphone'), $this);?>
</span><p><input name="tel" id="tel" type="text" class="wbk" /></p></li>
                						<li><span><?php echo smarty_function_language_cp(array('str' => 'youremail'), $this);?>
</span><p><input name="email" id="email" type="text" class="wbk" /></p></li>
										<li style="margin-top:5px;">
											<span>&nbsp;</span>
												<p><input name="upto" id="upto" type="submit" class="wban" value="<?php echo smarty_function_lang_cp(array('str' => 'submit'), $this);?>
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
<script type="text/javascript">
$(document).ready(function(){
	$("#upto").click(function(){
        var title = $("#title").val();
        var content = $("#content").val();
        var name = $("#name").val();
        var tel = $("#tel").val();
		var email = $("#email").val();
        if(title == "")
        {
            alert("<?php echo smarty_function_language_message(array('str' => 'title_null'), $this);?>
！");
            $("#title").focus(); 
            return false;
        }else if(content == ""){
			alert("<?php echo smarty_function_language_message(array('str' => 'content_null'), $this);?>
！");
			$("#content").focus();
			return false;
		}else if(name == ""){
			alert("<?php echo smarty_function_language_message(array('str' => 'nick_null'), $this);?>
!");
			$("#name").focus();
			return false;
		}else if(tel == ""){
			alert("<?php echo smarty_function_language_message(array('str' => 'phone_null'), $this);?>
！");
			$("#tel").focus();
			return false;
		}else if(!$("#tel").val().match(/^\d+$/)){
			alert("<?php echo smarty_function_language_message(array('str' => 'phoneerror'), $this);?>
");
			$("#tel").focus();
			return false;
		}else if($("#email").val() == ""){
     		alert("<?php echo smarty_function_language_message(array('str' => 'not_null_email'), $this);?>
");
     		$("#email").focus();
	 		return false;
   		}else if(!$("#email").val().match(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/)){
     		alert("<?php echo smarty_function_language_message(array('str' => 'effective_email'), $this);?>
");
     		$("#email").focus();
	 		return false;
   		}
	});
 });
</script>


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
<script type="text/javascript" src="common/ip.php?url=<?php echo smarty_function_geturl(array('str' => '2'), $this);?>
&refr=<?php echo smarty_function_geturl(array('str' => '1'), $this);?>
"></script>
</body>

</html>