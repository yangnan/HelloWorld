<?php /* Smarty version 2.6.13, created on 2011-06-02 10:29:58
         compiled from aboutinfo/otherinfo.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'language_cp', 'aboutinfo/otherinfo.html', 8, false),array('function', 'getstaticpath', 'aboutinfo/otherinfo.html', 9, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Description" content="<?php echo $this->_tpl_vars['seo']['seo_descript']; ?>
">
<meta name="Keywords" content="<?php echo $this->_tpl_vars['seo']['seo_keywords']; ?>
">
<title><?php echo $this->_tpl_vars['seo']['seo_title']; ?>
-<?php echo smarty_function_language_cp(array('str' => 'emailsend'), $this);?>
</title>
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
<div class="page">
  <div class="con">
    <div class="con_left wt7">
      <div class="con_leftop"> </div>
      <div class="con_leftom" style="position:relative;">
        <div class="box">
           <h1 class="bod"><?php echo $this->_tpl_vars['info']['foot_nav_title']; ?>
</h1>
			<div><?php echo $this->_tpl_vars['info']['content']; ?>
</div>	
        </div>
      </div>
	  
	  	  <div class="intro">
		<?php echo smarty_function_language_cp(array('str' => 'high_quality_goods_every_day'), $this);?>

	</div>	  
	  
      <div class="con_lefter"> </div>
    </div>
	<div class="con_right">
	   <div class="m_r">
	     <a href="/"><img src="<?php echo smarty_function_getstaticpath(array(), $this);?>
/images/sidebar-yuncheng-open.png" width="230" height="80"/></a>
	    </div>
	</div>
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