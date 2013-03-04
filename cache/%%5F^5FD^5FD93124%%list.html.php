<?php /* Smarty version 2.6.13, created on 2011-06-02 10:30:07
         compiled from index/list.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'getstaticpath', 'index/list.html', 9, false),array('function', 'language_cp', 'index/list.html', 43, false),array('function', 'lang_cp', 'index/list.html', 54, false),array('function', 'page2html', 'index/list.html', 74, false),array('function', 'geturl', 'index/list.html', 106, false),array('modifier', 'date_format', 'index/list.html', 48, false),array('modifier', 'truncate', 'index/list.html', 50, false),)), $this); ?>
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
    <script src="static/js/popup_layer.js" type="text/javascript" language="javascript"></script>
    <script language="javascript">
		$(document).ready(function() {
			var t4 =  new PopupLayer({trigger:"#ele4",popupBlk:"#blk4",closeBtn:"#close4",useFx:true});
			t4.doEffects = function(way){
				way == "open"?this.popupLayer.slideDown("slow"):this.popupLayer.slideUp("slow");
			};

		});
	</script>
<div id="bannerset">
    	<div id="blk4" class="banner">
            <ul>
            <li class="bleft"></li>
            <li id="bcenter" class="bcenter"></li>
            <li class="bright"></li>
            <span class="closebtn"><a href="javascript:void(0)" id="close4">关闭</a></span>
            </ul>
        </div>
</div>
<div class="page">
        <div class="con">
        	<div class="con_left">
            	<div class="con_left01">
                </div>
                <div class="con_left02" style="position:relative;">
                	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><p class="lb01"><?php echo smarty_function_language_cp(array('str' => 'front_tg'), $this);?>
</p>
<ul class="lb_ul" >
                    <!--循环数据 xuqinghua 2011-01-11-->
                        <?php unset($this->_sections['l']);
$this->_sections['l']['name'] = 'l';
$this->_sections['l']['loop'] = is_array($_loop=$this->_tpl_vars['list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['l']['show'] = true;
$this->_sections['l']['max'] = $this->_sections['l']['loop'];
$this->_sections['l']['step'] = 1;
$this->_sections['l']['start'] = $this->_sections['l']['step'] > 0 ? 0 : $this->_sections['l']['loop']-1;
if ($this->_sections['l']['show']) {
    $this->_sections['l']['total'] = $this->_sections['l']['loop'];
    if ($this->_sections['l']['total'] == 0)
        $this->_sections['l']['show'] = false;
} else
    $this->_sections['l']['total'] = 0;
if ($this->_sections['l']['show']):

            for ($this->_sections['l']['index'] = $this->_sections['l']['start'], $this->_sections['l']['iteration'] = 1;
                 $this->_sections['l']['iteration'] <= $this->_sections['l']['total'];
                 $this->_sections['l']['index'] += $this->_sections['l']['step'], $this->_sections['l']['iteration']++):
$this->_sections['l']['rownum'] = $this->_sections['l']['iteration'];
$this->_sections['l']['index_prev'] = $this->_sections['l']['index'] - $this->_sections['l']['step'];
$this->_sections['l']['index_next'] = $this->_sections['l']['index'] + $this->_sections['l']['step'];
$this->_sections['l']['first']      = ($this->_sections['l']['iteration'] == 1);
$this->_sections['l']['last']       = ($this->_sections['l']['iteration'] == $this->_sections['l']['total']);
?>
                    	<li>
                        	<p class="lb_title"><img src="<?php echo smarty_function_getstaticpath(array(), $this);?>
images/lb_biao.jpg" /><span><?php echo ((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['l']['index']]['groupon_start_time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "Y-m-d") : smarty_modifier_date_format($_tmp, "Y-m-d")); ?>
</span></p><!--循环时间并格式化 xuqinghua  2011-01-11-->
                            <p class="lb_jj">
								<?php echo ((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['l']['index']]['groupon_shop_name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, '100', "...") : smarty_modifier_truncate($_tmp, '100', "...")); ?>

                      </p><!--标题并截取字符长度 xuqinghua  2011-01-11-->
                            <p class="lb_zitu" >
<p class="lb_zi">
                                	<span class="red"><strong><?php echo $this->_tpl_vars['list'][$this->_sections['l']['index']]['groupon_num']; ?>
</strong></span><?php echo smarty_function_lang_cp(array('str' => 'buycount'), $this);?>
<br />
<span class="xianjiad font05"><?php echo smarty_function_lang_cp(array('str' => 'now_price'), $this); echo $this->_tpl_vars['list'][$this->_sections['l']['index']]['groupon_present_price'];  echo smarty_function_lang_cp(array('str' => 'yuan'), $this);?>
<br /></span>
                                    <?php echo smarty_function_lang_cp(array('str' => 'original_price'), $this);?>
<span class="red"><strong><?php echo $this->_tpl_vars['list'][$this->_sections['l']['index']]['groupon_prime_price']; ?>
</strong></span><?php echo smarty_function_lang_cp(array('str' => 'yuan'), $this);?>
<br />
									<?php if ($this->_tpl_vars['list'][$this->_sections['l']['index']]['groupon_prime_price'] == $this->_tpl_vars['list'][$this->_sections['l']['index']]['groupon_present_price']): ?>
                                    <?php echo smarty_function_lang_cp(array('str' => 'discount'), $this);?>
<span class="red"><strong>0</strong></span><?php echo smarty_function_lang_cp(array('str' => 'yuan'), $this);?>

									<?php else: ?>
									<?php echo smarty_function_lang_cp(array('str' => 'discount'), $this);?>
<span class="red"><strong><?php echo $this->_tpl_vars['list'][$this->_sections['l']['index']]['groupon_present_price']/$this->_tpl_vars['list'][$this->_sections['l']['index']]['groupon_prime_price']*10; ?>
</strong></span><?php echo smarty_function_lang_cp(array('str' => 'zhe'), $this);?>

									<?php endif; ?>
                                </p >
<p class="lb_tu"><a href="?tg=/index/details/id/<?php echo $this->_tpl_vars['list'][$this->_sections['l']['index']]['id']; ?>
"><img src="uploadfiles/<?php echo $this->_tpl_vars['list'][$this->_sections['l']['index']]['groupon_pic']; ?>
" width="150" height="110" /></a></p>
                            </p>
                        </li>
                        <?php endfor; endif; ?>
						<!--循环结束 xuqinghua 2011-01-11-->
                    </ul>
                   
            </td>
  </tr>
  <tr><td><div class="fy">
	 <ul>
<?php echo smarty_function_page2html(array('str' => $this->_tpl_vars['pager']), $this);?>

</div></td></tr>
</table>
</div>
                <div class="con_left03">
                </div>
        	</div>
            <!--右侧-->
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
<script>
$("#closebtn").click(function(){
    closeDom("banner");
});

//读取banner数据
var successProcess=function(data){
$("#bcenter").html(data);
}
$.ajax({
  type: 'POST',
  url: "?tg=/ads/view",
  data: {'id':2},
  cache:false,
  success: successProcess
  //dataType: dataType
});
</script>
<script type="text/javascript" src="common/ip.php?url=<?php echo smarty_function_geturl(array('str' => '2'), $this);?>
&refr=<?php echo smarty_function_geturl(array('str' => '1'), $this);?>
"></script>
</body>
</html>