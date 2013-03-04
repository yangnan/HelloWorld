<?php /* Smarty version 2.6.13, created on 2011-06-02 10:37:05
         compiled from extraadd.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_cp', 'extraadd.html', 12, false),)), $this); ?>
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
<form action="" method="post" enctype="multipart/form-data" name="theform" id="theform">
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="77%" ><h2><?php echo smarty_function_lang_cp(array('str' => 'add'), $this);?>
</h2></td>
      <td width="23%" ><a href="./admin.php?tg=/extralist/"><?php echo smarty_function_lang_cp(array('str' => 'list'), $this);?>
</a></td>
    </tr>
    <tr>
      <td colspan="2" class="sty"></td>
    </tr>
  </table>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="10%" height="28" class="biaoge"><?php echo smarty_function_lang_cp(array('str' => 'category'), $this);?>
</td>
      <td width="90%"><select name="extra_class" id="extra_class">
          <?php unset($this->_sections['loop']);
$this->_sections['loop']['name'] = 'loop';
$this->_sections['loop']['loop'] = is_array($_loop=$this->_tpl_vars['extraClass']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
          <option value="<?php echo $this->_tpl_vars['extraClass'][$this->_sections['loop']['index']]['id']; ?>
">
          <?php echo $this->_tpl_vars['extraClass'][$this->_sections['loop']['index']]['extra_class']; ?>

          </option>
          <?php endfor; endif; ?>
        </select>
      </td>
    </tr>
    <tr>
      <td height="40" class="biaoge"><?php echo smarty_function_lang_cp(array('str' => 'title'), $this);?>
</td>
      <td><input name="extra_title" type="text" class="required" id="extra_title" size="55"></td>
    </tr>
    <tr>
      <td width="8%" height="214" valign="top" class="biaoge"><label>
        <?php echo smarty_function_lang_cp(array('str' => 'content'), $this);?>

        </label></td>
      <td valign="top" align="left">
		<iframe id="tgedit" name="tgedit" id="tgedit" name="tgedit" src="templates/admin/TGEditor/Edit/editor.htm?id=extra_content&ReadCookie=0" frameBorder="0" marginHeight="0" marginWidth="0" scrolling="No" width="700" height="800"></iframe>
		<input type="hidden" name="extra_content" id="extra_content" value=""/>
    </tr>
    <tr>
      <td height="52" valign="middle" class="biaoge"><?php echo smarty_function_lang_cp(array('str' => 'status'), $this);?>
</td>
      <td align="left" valign="middle"><select name="status">
          <option value="1" >
          <?php echo smarty_function_lang_cp(array('str' => 'display'), $this);?>

          </option>
          <option value="0" >
          <?php echo smarty_function_lang_cp(array('str' => 'hide'), $this);?>

          </option>
        </select>
      </td>
    </tr>
    <tr>
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