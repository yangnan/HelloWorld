<?php /* Smarty version 2.6.13, created on 2011-06-02 10:29:18
         compiled from aboutinfo/subscribe.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'language_cp', 'aboutinfo/subscribe.html', 8, false),array('function', 'getstaticpath', 'aboutinfo/subscribe.html', 9, false),array('function', 'lang_cp', 'aboutinfo/subscribe.html', 37, false),)), $this); ?>
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
           <h1 class="bod"><?php echo smarty_function_language_cp(array('str' => 'emailsend'), $this);?>
</h1>
		   <form action="" method="post" name="sendrss">
		   <div class="eBox">
		     <p class="welcome_title"> <?php echo smarty_function_language_cp(array('str' => 'every_day_email'), $this);?>
。</p>
             <div class="mail">
			   <div class="mail_L">
			     <label><?php echo smarty_function_language_cp(array('str' => 'email_address'), $this);?>
：</label>
                  <input type="text" size="20" value="" class="f_input" name="email">
                  <span class="tips"><?php echo smarty_function_language_cp(array('str' => 'hate_spam'), $this);?>
</span>
			   </div>
			   <div class="mail_R">
			      <label id="enter-address-city-label"><?php echo smarty_function_language_cp(array('str' => 'cityplease'), $this);?>
：</label>
                      <select style="" class="f_city" name="cityid">
					  <?php unset($this->_sections['loop']);
$this->_sections['loop']['name'] = 'loop';
$this->_sections['loop']['loop'] = is_array($_loop=$this->_tpl_vars['citydata']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['loop']['show'] = true;
$this->_sections['loop']['max'] = $this->_sections['loop']['loop'];
$this->_sections['loop']['step'] = 1;
$this->_sections['loop']['start'] = $this->_sections['loop']['step'] > 0 ? 0 : $this->_sections['loop']['loop']-1;
if ($this->_sections['loop']['show']) {
    $this->_sections['loop']['total'] = $this->_sections['loop']['loop'];
    if ($this->_sections['loop']['total'] == 0)
        $this->_sections['loop']['show'] = false;
} else
    $this->_sections['loop']['total'] = 0;
if ($this->_sections['loop']['show']):

            for ($this->_sections['loop']['index'] = $this->_sections['loop']['start'], $this->_sections['loop']['iteration'] = 1;
                 $this->_sections['loop']['iteration'] <= $this->_sections['loop']['total'];
                 $this->_sections['loop']['index'] += $this->_sections['loop']['step'], $this->_sections['loop']['iteration']++):
$this->_sections['loop']['rownum'] = $this->_sections['loop']['iteration'];
$this->_sections['loop']['index_prev'] = $this->_sections['loop']['index'] - $this->_sections['loop']['step'];
$this->_sections['loop']['index_next'] = $this->_sections['loop']['index'] + $this->_sections['loop']['step'];
$this->_sections['loop']['first']      = ($this->_sections['loop']['iteration'] == 1);
$this->_sections['loop']['last']       = ($this->_sections['loop']['iteration'] == $this->_sections['loop']['total']);
?>
                         <option value="<?php echo $this->_tpl_vars['citydata'][$this->_sections['loop']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['citydata'][$this->_sections['loop']['index']]['city_name']; ?>
</option>
						 <?php endfor; endif; ?>
					  </select>
                                &nbsp;&nbsp;<input type="submit" value="<?php echo smarty_function_lang_cp(array('str' => 'subscribe'), $this);?>
" class="btn02"><span class="tips"><a href="?tg=/aboutinfo/subscribenewcity"><?php echo smarty_function_language_cp(array('str' => 'noyourcity'), $this);?>
？</a></span>			   </div>
			 
			 </div>
		   </div>
		   </form>
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