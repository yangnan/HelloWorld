<?php /* Smarty version 2.6.13, created on 2011-06-02 10:37:14
         compiled from templatelist.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_cp', 'templatelist.html', 13, false),)), $this); ?>
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
      <td width="23%" >
	  <a href="./admin.php?tg=/templateimport/"><?php echo smarty_function_lang_cp(array('str' => 'import'), $this);?>
</a>
	  </td>
    </tr>
    <tr>
      <td colspan="2" class="sty"></td>
    </tr>
  </table>
  <table width="100%" border="0">
    
	<tr>
	  <?php $_from = $this->_tpl_vars['nums']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['name'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['name']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['nums']):
        $this->_foreach['name']['iteration']++;
?>
      <td><p><img src="uploadfiles/pic/<?php echo $this->_tpl_vars['nums']['template_pic']; ?>
" width="130" height="110"></p>
      <p>
	  <?php echo $this->_tpl_vars['nums']['style_name']; ?>

	  <input name="default" type="radio" value="<?php echo $this->_tpl_vars['nums']['id']; ?>
" <?php if ($this->_tpl_vars['nums']['template_default'] == 1): ?>checked<?php endif; ?> >
      <a href="./admin.php?tg=/templateedit/id/<?php echo $this->_tpl_vars['nums']['id']; ?>
"><?php echo smarty_function_lang_cp(array('str' => 'editor'), $this);?>
</a>  <a onClick="return confirm('<?php echo smarty_function_lang_cp(array('str' => 'confirm_delete'), $this);?>
')" href='./admin.php?tg=/templatedelete/id/<?php echo $this->_tpl_vars['nums']['id']; ?>
'>
        <?php echo smarty_function_lang_cp(array('str' => 'del'), $this);?>

      </a>
	  	  
	  </p><br>
	  
	  </td><?php if ($this->_tpl_vars['k']%4 == 0): ?></tr><tr><?php endif; ?>
      <?php endforeach; endif; unset($_from); ?>
    </tr>
    <tr>
      <td><div align="center">
        <input type="submit" name="submit" value="<?php echo smarty_function_lang_cp(array('str' => 'submit'), $this);?>
">
      </div></td>
      
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>