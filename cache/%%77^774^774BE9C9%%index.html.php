<?php /* Smarty version 2.6.13, created on 2011-06-02 10:36:48
         compiled from index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_cp', 'index.html', 25, false),)), $this); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<TITLE>后台管理通用模板</TITLE>
<link href="templates/admin/css/style.css" rel="stylesheet" type="text/css" />
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/common.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<style>
.main_left {table-layout:auto; background:url("images/left_bg.gif"); width:178px;}
.main_left_top{ background:url("images/left_menu_bg.gif"); padding-top:2px !important; padding-top:5px;}
.main_left_title{text-align:left; padding-left:15px; font-size:14px; font-weight:bold; color:#fff;}
.left_iframe{HEIGHT: 92%; VISIBILITY: inherit;WIDTH: 180px; background:transparent;}
.main_iframe{HEIGHT: 92%; VISIBILITY: inherit; WIDTH:100%; Z-INDEX: 1}
table { font-size:12px; font-family : tahoma, 宋体, fantasy; }
td { font-size:12px; font-family : tahoma, 宋体, fantasy;}
</style>
<BODY style="MARGIN: 0px">
<div id="menubar"></div>
<!--导航部分-->
<div class="top_table">
<div class="top_table_leftbg">
	<div class="system_logo"><img src="templates/admin/images/logo_up.gif"></div>
	<div class="menu" >
		<ul>
			<li id="menu_1" onClick="getleftbar(1);"><a href="./admin.php?tg=/main/" target='frmright'><?php echo smarty_function_lang_cp(array('str' => 'backstage_homepage'), $this);?>
</a>

			<div class="menu_div"><img src="templates/admin/images/menu01_right.gif" style="vertical-align:bottom;"></div></li>

			<li id="menu_2" onClick="getleftbar(2);"><a href="./admin.php?tg=/extralist/" target='frmright'><?php echo smarty_function_lang_cp(array('str' => 'extra'), $this);?>
</a>

			<div class="menu_div"><img src="templates/admin/images/menu01_right.gif" style="vertical-align:bottom;"></div></li>

			<li id="menu_3" onClick="getleftbar(3);"><a href="./admin.php?tg=/suggestlist/" target='frmright'><?php echo smarty_function_lang_cp(array('str' => 'suggestion_manage'), $this);?>
</a>
		
			<div class="menu_div"><img src="templates/admin/images/menu01_right.gif" style="vertical-align:bottom;"></div></li>

			<li id="menu_4" onClick="getleftbar(4);"><a href="./admin.php?tg=/providelist/" target='frmright'><?php echo smarty_function_lang_cp(array('str' => 'provide_manage'), $this);?>
</a>
		
			<div class="menu_div"><img src="templates/admin/images/menu01_right.gif" style="vertical-align:bottom;"></div></li>

			<li id="menu_5" onClick="getleftbar(5);"><a href="./admin.php?tg=/templatelist/" target='frmright'><?php echo smarty_function_lang_cp(array('str' => 'style'), $this);?>
</a>
		
			<div class="menu_div"><img src="templates/admin/images/menu01_right.gif" style="vertical-align:bottom;"></div></li>
			<li id="menu_6" onClick="getleftbar(6);"><a href="./admin.php?tg=/issuedlist/" target='frmright'><?php echo smarty_function_lang_cp(array('str' => 'released_tg'), $this);?>
</a>
		
			<div class="menu_div"><img src="templates/admin/images/menu01_right.gif" style="vertical-align:bottom;"></div></li>
			<li id="menu_7" onClick="getleftbar(7);"><a href="./admin.php?tg=/citylist/" target='frmright'><?php echo smarty_function_lang_cp(array('str' => 'global_settings'), $this);?>
</a>
		
			<div class="menu_div"><img src="templates/admin/images/menu01_right.gif" style="vertical-align:bottom;"></div></li>
			
			<li id="menu_8" onClick="getleftbar(8);"><a href="./admin.php?tg=/system_settings/" target='frmright'><?php echo smarty_function_lang_cp(array('str' => 'system_settings'), $this);?>
</a>

			<div class="menu_div"><img src="templates/admin/images/menu01_right.gif" style="vertical-align:bottom;"></div></li>
			
			<li id="menu_9" onClick="getleftbar(9);"><a href="./admin.php?tg=/bslist/" target='frmright'><?php echo smarty_function_lang_cp(array('str' => 'bs_man_manage'), $this);?>
</a>
            <div class="menu_div"><img src="templates/admin/images/menu01_right.gif" style="vertical-align:bottom;"></div></li>
			
			<li id="menu_10" onClick="getleftbar(10);"><a href="./admin.php?tg=/adslist/" target='frmright'><?php echo smarty_function_lang_cp(array('str' => 'ads_manage'), $this);?>
</a>
			<div class="menu_div"><img src="templates/admin/images/menu01_right.gif" style="vertical-align:bottom;"></div></li>
			
			<li id="menu_11" onClick="getleftbar(11);"><a href="./admin.php?tg=/expresslist/" target='frmright'><?php echo smarty_function_lang_cp(array('str' => 'express_manage'), $this);?>
</a>
			<div class="menu_div"><img src="templates/admin/images/menu01_right.gif" style="vertical-align:bottom;"></div></li>
			
			<li id="menu_12" onClick="getleftbar(12);"><a href="./admin.php?tg=/seolist/" target='frmright'><?php echo smarty_function_lang_cp(array('str' => 'marketing_tool'), $this);?>
</a>
			<div class="menu_div"><img src="templates/admin/images/menu01_right.gif" style="vertical-align:bottom;"></div></li>
			 
			
            <li id="menu_15"><a href="./admin.php?tg=/logout" target='_self'><?php echo smarty_function_lang_cp(array('str' => 'exit'), $this);?>
</a>
			<div class="menu_div"><img src="templates/admin/images/menu01_right.gif" style="vertical-align:bottom;"></div></li>            
			
		</ul>
	</div>
</div>
</div>
<div style="height:24px; background:#337ABB;"></div>
<!--导航部分结束-->

<TABLE border=0 cellPadding=0 cellSpacing=0 height="92%" width="100%" style="background:#337ABB;">
<TBODY>
<TR>
  <TD align=middle id=frmTitle vAlign=top name="fmTitle" class="main_left">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="main_left_top">
	  <tr height="32">
	    <td valign="top"></td>
	    <td class="main_left_title" id="leftmenu_title"><?php echo $this->_tpl_vars['admin']['operater']; ?>
</td>
	    <td valign="top" align="right"></td>
	  </tr>
	</table>
	<IFRAME frameBorder=0 id="frmleft" name="frmleft" src="./admin.php?tg=/left/" class="left_iframe" allowTransparency="true"></IFRAME>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr height="32">
	    <td valign="top"></td>
	    <td valign="bottom" align="center"></td>
	    <td valign="top" align="right"></td>
	  </tr>
	</table>
  </td>
  <TD bgColor=#337ABB style="WIDTH: 10px">
	   <TABLE border=0 cellPadding=0 cellSpacing=0 height="100%">
	    <TBODY>
	    <TR>
	     <TD onclick=switchSysBar() style="HEIGHT: 100%">
	     <SPAN class="navPoint" id="switchPoint" title="关闭/打开左栏"><img src="templates/admin/images/right.gif"></SPAN>
	     </TD>
	    </TR>
	    </TBODY>
	   </TABLE>
     </TD>
  <TD bgcolor="#337ABB" width="100%" vAlign=top>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#C4D8ED">
	  <tr height="32">
	    <td valign="top" width="10" background="images/bg2.gif"><img src="templates/admin/images/teble_top_left.gif" alt="" /></td>
	    <td background="templates/admin/images/bg2.gif"width="28" ><img src="templates/admin/images/arrow.gif" alt="" align="absmiddle" /></td>
	    <td background="templates/admin/images/bg2.gif"><span style="float:left"></span><span style="color:#c00; font-weight:bold; float:left;width:300px;" id="dvbbsannounce"></span></td>
		<td background="templates/admin/images/bg2.gif" style="text-align:right; color: #135294; "><a href="admin.php?mod=admin&tpl=logout&operater=logout" target="_top"><?php echo $this->_tpl_vars['admin']['logout']; ?>
</a> </td>
	    <td align="right" valign="top" background="templates/admin/images/bg2.gif" width="28" ><img src="templates/admin/images/teble_top_right.gif" alt="" /></td>
	    <td align="right" width="16" bgcolor="#337ABB"></td>
	  </tr>
	</table>
	<IFRAME frameBorder=0 id="frmright" name="frmright" scrolling=yes src="./admin.php?tg=/main/" class="main_iframe"></IFRAME>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#C4D8ED;">
	<tr>
	<td><img src="templates/admin/images/teble_bottom_left.gif" alt="" width="5" height="6" /></td>
	<td align="right"><img src="templates/admin/images/teble_bottom_right.gif" alt="" width="5" height="6" /></td>
	<td align="right" width="16" bgcolor="#337ABB"></td>
	</tr>
	</table>
</TD>
</TR>
</TBODY>
</TABLE>
</body>
</html>