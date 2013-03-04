<?php /* Smarty version 2.6.13, created on 2011-06-02 10:37:27
         compiled from frilinklist.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_cp', 'frilinklist.html', 13, false),array('function', 'page2html', 'frilinklist.html', 47, false),array('modifier', 'date_format', 'frilinklist.html', 38, false),)), $this); ?>
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
    <tr>
      <td width="77%" ><h2>
          <?php echo smarty_function_lang_cp(array('str' => 'list'), $this);?>

        </h2></td>
      <td width="23%" ><a href="./admin.php?tg=/frilinkadd/">
        <?php echo smarty_function_lang_cp(array('str' => 'add'), $this);?>

        </a></td>
    </tr>
    <tr>
      <td colspan="2" class="sty"></td>
    </tr>
  </table>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr class="biaoti bg">
      <td width="8%">ID</td>
      <td width="20%"><?php echo smarty_function_lang_cp(array('str' => 'title'), $this);?>
</td>
      <td width="20%"><?php echo smarty_function_lang_cp(array('str' => 'frilink_url'), $this);?>
</td>
	  <td width="10%"><?php echo smarty_function_lang_cp(array('str' => 'status'), $this);?>
</td>
	  <td width="10%"><?php echo smarty_function_lang_cp(array('str' => 'pubtime'), $this);?>
</td>
      <td width="10%"><?php echo smarty_function_lang_cp(array('str' => 'operate'), $this);?>
</td>
    </tr>
    <?php unset($this->_sections['loop']);
$this->_sections['loop']['name'] = 'loop';
$this->_sections['loop']['loop'] = is_array($_loop=$this->_tpl_vars['frilink_Arr']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
      <td width="8%"><?php echo $this->_tpl_vars['frilink_Arr'][$this->_sections['loop']['index']]['id']; ?>
</td>
      <td width="20%"><?php echo $this->_tpl_vars['frilink_Arr'][$this->_sections['loop']['index']]['frilink_title']; ?>
</td>
      <td width="20%"><?php echo $this->_tpl_vars['frilink_Arr'][$this->_sections['loop']['index']]['frilink_url']; ?>
</td>
	  <td width="10%"><?php if ($this->_tpl_vars['frilink_Arr'][$this->_sections['loop']['index']]['status'] == 0):  echo smarty_function_lang_cp(array('str' => 'hide'), $this); else:  echo smarty_function_lang_cp(array('str' => 'display'), $this); endif; ?></td>
	  <td width="10%"><?php echo ((is_array($_tmp=$this->_tpl_vars['frilink_Arr'][$this->_sections['loop']['index']]['pubtime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "Y-m-d") : smarty_modifier_date_format($_tmp, "Y-m-d")); ?>
</td>
      <td width="10%"><a href='./admin.php?tg=/frilinkedit/id/<?php echo $this->_tpl_vars['frilink_Arr'][$this->_sections['loop']['index']]['id']; ?>
'>
        <?php echo smarty_function_lang_cp(array('str' => 'editor'), $this);?>

        </a><a onclick="return confirm('<?php echo smarty_function_lang_cp(array('str' => 'confirm_delete'), $this);?>
')" href='./admin.php?tg=/frilinkdelete/id/<?php echo $this->_tpl_vars['frilink_Arr'][$this->_sections['loop']['index']]['id']; ?>
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