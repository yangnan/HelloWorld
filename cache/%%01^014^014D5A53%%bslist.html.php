<?php /* Smarty version 2.6.13, created on 2011-06-02 10:37:20
         compiled from bslist.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_cp', 'bslist.html', 17, false),array('function', 'page2html', 'bslist.html', 40, false),)), $this); ?>
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
</head>
<body>
<form method="post" action="" name="theform">
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <td colspan="2" class="sty"></td>
    </tr>
  </table>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr class="biaoti bg">
      <td width="10%">ID</td>
      <td width="20%"><?php echo smarty_function_lang_cp(array('str' => 'name'), $this);?>
</td>
	  <td width="20%"><?php echo smarty_function_lang_cp(array('str' => 'tg'), $this); echo smarty_function_lang_cp(array('str' => 'category'), $this);?>
</td>
      <td width="10%"><?php echo smarty_function_lang_cp(array('str' => 'contacts'), $this);?>
</td>
	  <td width="10%"><?php echo smarty_function_lang_cp(array('str' => 'telephone'), $this);?>
</td>
      <td width="20%"><?php echo smarty_function_lang_cp(array('str' => 'operate'), $this);?>
</td>
    </tr>
    <?php unset($this->_sections['loop']);
$this->_sections['loop']['name'] = 'loop';
$this->_sections['loop']['loop'] = is_array($_loop=$this->_tpl_vars['bslistArr']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
    <tr class="biaoti">
      <td width="10%"><?php echo $this->_tpl_vars['bslistArr'][$this->_sections['loop']['index']]['id']; ?>
</td>
      <td width="20%"><?php echo $this->_tpl_vars['bslistArr'][$this->_sections['loop']['index']]['seller_name']; ?>
</td>
	  <td width="20%"><?php echo $this->_tpl_vars['bslistArr'][$this->_sections['loop']['index']]['class_name']; ?>
</td>
	  <td width="10%"><?php echo $this->_tpl_vars['bslistArr'][$this->_sections['loop']['index']]['seller_contact']; ?>
</td>
	  <td width="10%"><?php echo $this->_tpl_vars['bslistArr'][$this->_sections['loop']['index']]['seller_phone']; ?>
</td>
      <td width="20%"><a href='./admin.php?tg=/bsedit/id/<?php echo $this->_tpl_vars['bslistArr'][$this->_sections['loop']['index']]['id']; ?>
'>
        <?php echo smarty_function_lang_cp(array('str' => 'editor'), $this);?>
</a>
		<a onClick="return confirm('<?php echo smarty_function_lang_cp(array('str' => 'con_set_top'), $this);?>
')" href='./admin.php?tg=/bs_set_top/id/<?php echo $this->_tpl_vars['bslistArr'][$this->_sections['loop']['index']]['id']; ?>
' name="bstop">
        <?php echo smarty_function_lang_cp(array('str' => 'set_top'), $this);?>
</a>
		<a onClick="return confirm('<?php echo smarty_function_lang_cp(array('str' => 'confirm_delete'), $this);?>
')" href='./admin.php?tg=/bsdelete/id/<?php echo $this->_tpl_vars['bslistArr'][$this->_sections['loop']['index']]['id']; ?>
'>
        <?php echo smarty_function_lang_cp(array('str' => 'del'), $this);?>

        </a></td>
    </tr>
    <?php endfor; endif; ?>
    <tr>
      <td colspan="4"><?php echo smarty_function_page2html(array('str' => $this->_tpl_vars['pager']), $this);?>
</td>
    </tr>
  </table>
</form>
</body>
</html>