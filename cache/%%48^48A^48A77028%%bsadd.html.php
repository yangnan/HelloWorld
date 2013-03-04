<?php /* Smarty version 2.6.13, created on 2011-06-02 10:37:21
         compiled from bsadd.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_cp', 'bsadd.html', 12, false),)), $this); ?>
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
      <td width="77%" ><h2>1.<?php echo smarty_function_lang_cp(array('str' => 'login_info'), $this);?>
</h2></td>
    </tr>
    <tr>
      <td colspan="2" class="sty"></td>
    </tr>
  </table>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="40" class="biaoge"><?php echo smarty_function_lang_cp(array('str' => 'username'), $this);?>
</td>
      <td><input name="seller_user_name" type="text" class="required" id="seller_user_name" size="45"></td>
    </tr>
	<tr>
      <td height="40" class="biaoge"><?php echo smarty_function_lang_cp(array('str' => 'password'), $this);?>
</td>
      <td><input name="seller_user_pass" type="text" class="required" id="seller_user_pass" size="45"></td>
    </tr>
  </table><p>
  
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="77%" ><h2>2.<?php echo smarty_function_lang_cp(array('str' => 'markup_info'), $this);?>
</h2></td>
    </tr>
    <tr>
      <td colspan="2" class="sty"></td>
    </tr>
  </table>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="40" class="biaoge"><?php echo smarty_function_lang_cp(array('str' => 'city_and_cate'), $this);?>
</td>
      <td><label>
		<select name="seller_city_id" id="seller_city_id">
          <?php unset($this->_sections['loop']);
$this->_sections['loop']['name'] = 'loop';
$this->_sections['loop']['loop'] = is_array($_loop=$this->_tpl_vars['bscity']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
          <option value="<?php echo $this->_tpl_vars['bscity'][$this->_sections['loop']['index']]['id']; ?>
">
          <?php echo $this->_tpl_vars['bscity'][$this->_sections['loop']['index']]['city_name']; ?>

          </option>
          <?php endfor; endif; ?>
        </select>	
      </label>-
      <label>
        <select name="seller_class_id" id="seller_class_id">
          <?php unset($this->_sections['loop']);
$this->_sections['loop']['name'] = 'loop';
$this->_sections['loop']['loop'] = is_array($_loop=$this->_tpl_vars['bsclass']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
          <option value="<?php echo $this->_tpl_vars['bsclass'][$this->_sections['loop']['index']]['id']; ?>
">
          <?php echo $this->_tpl_vars['bsclass'][$this->_sections['loop']['index']]['class_name']; ?>

          </option>
          <?php endfor; endif; ?>
        </select>
      </label></td>
    </tr>

	<tr>
      <td height="40" class="biaoge"><?php echo smarty_function_lang_cp(array('str' => 'business'), $this); echo smarty_function_lang_cp(array('str' => 'pic'), $this);?>
</td>
      <td><label>
        <input id="seller_pic" type="file" name="seller_pic" class="required" size="45"/>
        <br><?php echo smarty_function_lang_cp(array('str' => 'markup2'), $this);?>
</label></td>
    </tr>
  </table>
   
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="77%" ><h2>3.<?php echo smarty_function_lang_cp(array('str' => 'basic_info'), $this);?>
</h2></td>
    </tr>
    <tr>
      <td colspan="2" class="sty"></td>
    </tr>
  </table>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  	<tr>
      <td height="40" class="biaoge"><?php echo smarty_function_lang_cp(array('str' => 'business'), $this); echo smarty_function_lang_cp(array('str' => 'name'), $this);?>
</td>
      <td><input name="seller_name" type="text" class="required" id="seller_name" size="45"></td>
    </tr>
	<tr>
      <td height="40" class="biaoge"><?php echo smarty_function_lang_cp(array('str' => 'website'), $this); echo smarty_function_lang_cp(array('str' => 'address'), $this);?>
</td>
      <td><input name="seller_url" type="text" class="required" id="seller_url" size="45"></td>
    </tr>
	<tr>
      <td height="40" class="biaoge"><?php echo smarty_function_lang_cp(array('str' => 'contacts'), $this);?>
</td>
      <td><input name="seller_contact" type="text" class="required" id="seller_contact" size="45"></td>
    </tr>
	<tr>
      <td height="40" class="biaoge"><?php echo smarty_function_lang_cp(array('str' => 'telephone'), $this);?>
</td>
      <td><input name="seller_phone" type="text" class="required" id="seller_phone" size="45"></td>
    </tr>
	<tr>
      <td height="40" class="biaoge"><?php echo smarty_function_lang_cp(array('str' => 'business'), $this); echo smarty_function_lang_cp(array('str' => 'address'), $this);?>
</td>
      <td><input name="seller_address" type="text" class="required" id="seller_address" size="45"></td>
    </tr>
	<tr>
      <td height="40" class="biaoge"><?php echo smarty_function_lang_cp(array('str' => 'm_phone'), $this);?>
</td>
      <td><input name="seller_mobile" type="text" class="required" id="seller_mobile" size="45"></td>
    </tr>
	<tr>
      <td width="8%" height="214" valign="top" class="biaoge"><label>
        <?php echo smarty_function_lang_cp(array('str' => 'l_info'), $this);?>

        </label></td>
      <td valign="top" align="left">
		<textarea name="seller_position" id="seller_position" style="display:none;"></textarea>
		<iframe id="tgedit" name="tgedit" src="templates/admin/TGEditor/Edit/editor.htm?id=seller_position&ReadCookie=0" frameBorder="0" marginHeight="0" marginWidth="0" scrolling="No" width="700" height="150"></iframe>
      </td>
    </tr>
	<tr>
      <td width="8%" height="214" valign="top" class="biaoge"><label>
        <?php echo smarty_function_lang_cp(array('str' => 'o_info'), $this);?>

        </label></td>
      <td valign="top" align="left">
		<textarea name="seller_other" id="seller_other" style="display:none;"></textarea>
		<iframe id="tgedit" name="tgedit" src="templates/admin/TGEditor/Edit/editor.htm?id=seller_other&ReadCookie=0" frameBorder="0" marginHeight="0" marginWidth="0" scrolling="No" width="700" height="100"></iframe>
      </td>
    </tr>
	<tr>
      <td width="8%" height="214" valign="top" class="biaoge"><label>
        <?php echo smarty_function_lang_cp(array('str' => 'o_info'), $this);?>

        </label></td>
      <td valign="top" align="left">
		<textarea name="seller_else" id="seller_else" style="display:none;"></textarea>
		<iframe id="tgedit" name="tgedit" src="templates/admin/TGEditor/Edit/editor.htm?id=seller_else&ReadCookie=0" frameBorder="0" marginHeight="0" marginWidth="0" scrolling="No" width="700" height="100"></iframe>
      </td>
    </tr></table>
	
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="77%" ><h2>4.<?php echo smarty_function_lang_cp(array('str' => 'b_info'), $this);?>
</h2></td>
    </tr>
    <tr>
      <td colspan="2" class="sty"></td>
    </tr>
  </table>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="40" class="biaoge"><?php echo smarty_function_lang_cp(array('str' => 'banker'), $this);?>
</td>
      <td><input name="seller_bank_open" type="text" class="required" id="seller_bank_open" size="45"></td>
    </tr>
	<tr>
      <td height="40" class="biaoge"><?php echo smarty_function_lang_cp(array('str' => 'account_name'), $this);?>
</td>
      <td><input name="seller_bank_name" type="text" class="required" id="seller_bank_name" size="45"></td>
    </tr>
	<tr>
      <td height="40" class="biaoge"><?php echo smarty_function_lang_cp(array('str' => 'bank_account'), $this);?>
</td>
      <td><input name="seller_bank_account" type="text" class="required" id="seller_bank_account" size="45"></td>
    </tr>
  </table>
  
  
  
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
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