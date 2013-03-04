<?php /* Smarty version 2.6.13, created on 2011-06-02 10:30:06
         compiled from common/right.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'language_cp', 'common/right.html', 5, false),array('function', 'getstaticpath', 'common/right.html', 6, false),array('function', 'lang_cp', 'common/right.html', 6, false),array('function', 'extra', 'common/right.html', 16, false),array('function', 'frilink', 'common/right.html', 35, false),array('function', 'language_message', 'common/right.html', 48, false),)), $this); ?>
<div class="con_right">
            	<div class="con_right_con01">
                	<div class="con_right_top"></div>
                  <div class="con_right_center">
           	      <p class="font03"><?php echo smarty_function_language_cp(array('str' => 'invite'), $this);?>
</p>
                        <p class="zipic"><img src="<?php echo smarty_function_getstaticpath(array(), $this);?>
/images/gift.jpg" width="42" height="42" /><span><?php echo smarty_function_lang_cp(array('str' => 'yaoqinghuode'), $this);?>
<strong class="font01">￥10</strong><?php echo smarty_function_lang_cp(array('str' => 'fande'), $this);?>
</span></p>
                    <p><a href="?tg=/index/myfriend" class="font01">&gt;&gt;<?php echo smarty_function_lang_cp(array('str' => 'clicklink'), $this);?>
</a></p>
                    </div>
                    <div class="con_right_bottom"></div>
                </div>
                <div class="con_right_con01">
               	  <div class="con_right_top xzd01"><p class="font05" style="text-indent:12px; line-height:41px;"><?php echo smarty_function_lang_cp(array('str' => 'extra'), $this);?>
</p></div>
                    <div class="xiaofeifei"><img src="<?php echo smarty_function_getstaticpath(array(), $this);?>
/images/feifei.jpg" /></div>
                  <div class="con_right_center01">
                    <p class="lin"></p>
                     <?php echo smarty_function_extra(array(), $this);?>

                        <p class="zipic01" style="text-indent:0px;"><?php echo smarty_function_lang_cp(array('str' => 'buymoneycount'), $this); echo smarty_function_language_cp(array('str' => 'agreement_users'), $this); echo smarty_function_language_cp(array('str' => 'accept'), $this);?>
</p>
                  </div>
                    <div class="con_right_bottom01"></div>
                </div>
                <div class="con_right_con01">
                	<div class="con_right_top"></div>
                  <div class="con_right_center">
       	      		<p class="font03"><?php echo smarty_function_language_cp(array('str' => 'postgrouponinfo'), $this);?>
</p>
                        <p class="zipic01" style="text-indent:0px;"><?php echo smarty_function_lang_cp(array('str' => 'taobaomaijia'), $this);?>
,<a href="?tg=/index/tigongtuangouxinxi" class="font04"><?php echo smarty_function_lang_cp(array('str' => 'clickthere'), $this);?>
</a></p>
                    </div>
                    <div class="con_right_bottom"></div>
                </div>
                <div class="con_right_con01">
               	  <div class="con_right_top"></div>
                  <div class="con_right_center">
   	      		    <p class="font05 lanbj01 lanbj" style="text-indent:0px;"><?php echo smarty_function_lang_cp(array('str' => 'friendlink_manage'), $this);?>
</p>
                    <p class="lin"></p>
                        <div sizcache="9" sizset="97" class="yqlj" >
<?php echo smarty_function_frilink(array(), $this);?>

                        </div>
                  </div>
                    <div class="con_right_bottom"></div>
                </div>
                <div class="con_right_con01">
               	  <div class="con_right_top xzd"></div>
<div class="con_right_center01">
                        <p class="lin"></p>
<p class="kf01"  style="text-indent:0px;"><a href="#" class="font02"><?php echo smarty_function_language_cp(array('str' => 'nextdaygroupon'), $this);?>
？</a></p>
						
                        <p class="kf01" style="margin-top:5px; text-indent:0px;">
						
							<input name="email" id="email" type="text" class="text01" value="&nbsp;<?php echo smarty_function_language_message(array('str' => 'outletemail'), $this);?>
..." onFocus="javascript:if(this.value=='&nbsp;<?php echo smarty_function_language_message(array('str' => 'outletemail'), $this);?>
...') {this.value=''}" />&nbsp;&nbsp;<input name="rss" id="rss" type="submit" class="but01" value="<?php echo smarty_function_lang_cp(array('str' => 'subscribe'), $this);?>
" onClick=""/>


				
</p>
<p class="kf01 font09" style="margin-top:5px;">
<?php echo smarty_function_lang_cp(array('str' => 'jingxi'), $this);?>

							<span class="red">*</span><?php echo smarty_function_lang_cp(array('str' => 'serviceclose'), $this);?>
<br />
                        </p>
                  </div>
                  <div class="con_right_bottom01"></div>
                </div>
            </div>