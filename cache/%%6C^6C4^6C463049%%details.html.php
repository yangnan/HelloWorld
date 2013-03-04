<?php /* Smarty version 2.6.13, created on 2011-06-02 10:30:06
         compiled from index/details.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'getstaticpath', 'index/details.html', 9, false),array('function', 'lang_cp', 'index/details.html', 60, false),array('function', 'language_message', 'index/details.html', 261, false),array('function', 'geturl', 'index/details.html', 434, false),)), $this); ?>
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
      <div class="con_left01"> </div>
      <div class="con_left02">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><div class="con_left02top">
                <div class="con_left_top01">
                  <div class="top01"> </div>
                  <div class="bqqg_con">
                    <div class="bqqg_con_left"> </div>
                    <div class="bqqg_con_center">
                      <p class="buynumber"><strong>￥<?php echo $this->_tpl_vars['grouponInfoArr']['groupon_present_price']; ?>

                        </strong></p>
                      <p class="buyan">
<?php if ($this->_tpl_vars['groupontimestatus'] != 'stop' || $this->_tpl_vars['grouponInfoArr']['groupon_stop'] == 2): ?>
<a href="?tg=/buy/shop/id/<?php echo $this->_tpl_vars['grouponInfoArr']['id']; ?>
"><img src="<?php echo smarty_function_getstaticpath(array(), $this);?>
images/buy.jpg" /></a>
<?php else: ?>
<img src="<?php echo smarty_function_getstaticpath(array(), $this);?>
images/buy.jpg" />
<?php endif; ?>
</p>
                    </div>
                    <div class="bqqg_con_right">
                      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="font055">
                        <tr>
                          <td height="33" align="center" ><?php echo smarty_function_lang_cp(array('str' => 'original_price'), $this);?>
</td>
                          <td height="33" align="center"><?php echo smarty_function_lang_cp(array('str' => 'discount'), $this);?>
</td>
                          <td height="33" align="center"><?php echo smarty_function_lang_cp(array('str' => 'frugal'), $this);?>
</td>
                        </tr>
                        <tr>
                          <td height="33" align="center">¥<?php echo $this->_tpl_vars['grouponInfoArr']['groupon_prime_price']; ?>
</td>
                          <td height="33" align="center"><?php echo $this->_tpl_vars['grouponInfoArr']['groupon_discount']; ?>
折</td>
                          <td height="33" align="center">¥<?php echo $this->_tpl_vars['grouponInfoArr']['groupon_save']; ?>
</td>
                        </tr>
                        <input id="shop_status" type="hidden" value="<?php echo smarty_function_lang_cp(array('str' => 'the_end'), $this);?>
" />
                      </table>
                    </div>
                  </div>
                  <div class="top02">
                    <div class="ld_left">
                      <p class="font11"><strong><?php echo smarty_function_lang_cp(array('str' => 'remainder_time'), $this);?>
</strong></p>
                      <p class="font03 dhm" id="timeLeft"><span id="day">0</span>天<br />
                        <span id="hour">0</span>小时<br />
                        <span id="mini">0</span>分钟<span id="sec">0</span>秒</p>
                    </div>
                    <script type="text/javascript" src="static/js/timeCountDown.js"></script>
                    <script type="text/javascript">
					var year = <?php echo $this->_tpl_vars['grouponInfoArr']['groupon_year']; ?>
;
					var month = <?php echo $this->_tpl_vars['grouponInfoArr']['groupon_month']; ?>
;
					var day = <?php echo $this->_tpl_vars['grouponInfoArr']['groupon_day']; ?>
;
					var hour = <?php echo $this->_tpl_vars['grouponInfoArr']['groupon_hour']; ?>
;
					var mini = <?php echo $this->_tpl_vars['grouponInfoArr']['groupon_mini']; ?>
;
					var d = Date.UTC(year, month, day, hour, mini);
					var obj = {
						  sec: document.getElementById("sec"),
						 mini: document.getElementById("mini"),
						 hour: document.getElementById("hour"),
						  day: document.getElementById("day")
					}

					fnTimeCountDown(d, obj);
					</script>
                    <div class="ld"><img src="<?php echo smarty_function_getstaticpath(array(), $this);?>
images/bg-deal-open.gif" width="38" height="70" /></div>
                  </div>
                  <p class="lin01"></p>
                  <div class="top02" style="height:102px;">
                    <p class="diu">
                      <?php echo $this->_tpl_vars['grouponInfoArr']['orderUsersNum']; ?>

                      <?php echo smarty_function_lang_cp(array('str' => 'buypeople'), $this);?>
</p>
                    <p class="sj" style="margin-left:<?php echo $this->_tpl_vars['grouponInfoArr']['groupon_userNumPercent']; ?>
px;"><img src="<?php echo smarty_function_getstaticpath(array(), $this);?>
images/pointer.jpg" /></p>
                    <p><img src="<?php echo smarty_function_getstaticpath(array(), $this);?>
images/ruler.jpg" width="193" height="20" /></p>
                    <p class="number"><span class="xs">0</span> <span class="ds">
                      <?php echo $this->_tpl_vars['grouponInfoArr']['groupon_num']; ?>

                      </span></p>
                    <p class="diq"><?php echo smarty_function_lang_cp(array('str' => 'cha'), $this);?>
<strong>
                      <?php echo $this->_tpl_vars['grouponInfoArr']['achieveGrouponNum']; ?>

                      </strong><?php echo smarty_function_lang_cp(array('str' => 'zuidirenshu'), $this);?>
</p>
                  </div>
                  <p class="lin01"></p>
                  <div class="top02" style="height:98px;">
				  
						<div class="done">
						<?php if ($this->_tpl_vars['groupontimestatus'] != 'stop'): ?>
							<img width="27" height="28/" align="absmiddle" src="<?php echo smarty_function_getstaticpath(array(), $this);?>
images/deal-buy-succ.gif">交易进行中
						<?php elseif ($this->_tpl_vars['grouponInfoArr']['groupon_stop'] == 2 && $this->_tpl_vars['groupontimestatus'] == 'stop'): ?>
							<img width="27" height="28/" align="absmiddle" src="<?php echo smarty_function_getstaticpath(array(), $this);?>
images/deal-buy-succ.gif">团购已成功<br />
							<span style="padding-left:62px;">还可以继续购买...</span>
						<?php elseif ($this->_tpl_vars['grouponInfoArr']['orderUsersNum'] < $this->_tpl_vars['grouponInfoArr']['groupon_num'] && $this->_tpl_vars['groupontimestatus'] == 'stop'): ?>
							<img width="27" height="28/" align="absmiddle" src="<?php echo smarty_function_getstaticpath(array(), $this);?>
images/deal-buy-succ.gif">团购失败<br />
						<?php else: ?>
							<img width="27" height="28/" align="absmiddle" src="<?php echo smarty_function_getstaticpath(array(), $this);?>
images/deal-buy-succ.gif">团购结束<br />
						<?php endif; ?>
						</div
						<div style="padding: 0px 10px; color: rgb(255, 51, 0);width:183px;line-height:2;">
						数量有限，再不抢就来不及啦！
						</div>
						<?php if ($this->_tpl_vars['grouponInfoArr']['orderUsersNum'] == $this->_tpl_vars['grouponInfoArr']['groupon_num']): ?>
						<div style="color: rgb(102, 102, 102);">
						<?php echo $this->_tpl_vars['grouponInfoArr']['stop_time']; ?>
达到最低团购人数：<?php echo $this->_tpl_vars['grouponInfoArr']['groupon_num']; ?>
人
						</div>
						<?php endif; ?>

				  </div>
                </div>
                <div class="con_left_top02">
                  <p class="tgjjzi"><span class="font10"><?php echo smarty_function_lang_cp(array('str' => 'groupon_now'), $this);?>
：</span>
                    <?php echo $this->_tpl_vars['grouponInfoArr']['groupon_title']; ?>

                  </p>
                  <div class="huanden" id="huandeng"><img src="<?php echo $this->_tpl_vars['grouponInfoArr']['groupon_pic']; ?>
" /></div>

                  <p class="lin"></p>
                  <div class="xtstop">
                    <div class="xtstop_left">
                      <P><img src="<?php echo smarty_function_getstaticpath(array(), $this);?>
images/xts.jpg" /></P>
                      <ul class="xtjul">
                        <?php echo $this->_tpl_vars['grouponInfoArr']['groupon_tips']; ?>

                      </ul>
                    </div>
                  </div>
                  <div class="xtsbottom"> </div>
<!--评论和关注-->
<div class="f_psamebox"><div style="width: 70px; float: left;" class="l">踩过 <span id="cai"><?php echo $this->_tpl_vars['selePing'][0]; ?>
</span></div><div style="width: 90px; float: right;" class="r"><a id="open" style="background: url(<?php echo smarty_function_getstaticpath(array(), $this);?>
images/btn_check_sa.gif) no-repeat scroll 0pt 0pt transparent; display: block; height: 35px; width: 86px;" href="#" class="f_btna checkin_button" rel="1677652"></a></div></div>
<div style="margin-left: 12px;" class="f_psamebox"><div style="width: 70px; float: left;" class="l">关注 <span id="fen"><?php echo $this->_tpl_vars['selePing'][1]; ?>
</span></div><div style="width: 90px; float: right;" class="r"><a onclick="gz();return false;" href="#" class="gz_id" rel="1677652" id="gz_id"></a></div></div>				  
                </div>
                <div class="clera"></div>
                <p class="lin01"></p>
                <div class="vip">
                  <div class="title"><span><?php echo smarty_function_lang_cp(array('str' => 'groupongive'), $this);?>
</span></div>
				  <div id="vipbig" style="width:630px;height:93px;float:right;overflow:hidden;">
                  <div class="vipcon" id="vipcon" style="width:800%;"></div>
				  </div>
                </div>
              </div></td>
          </tr>
        </table>
		<?php if ($this->_tpl_vars['grouponInfoArr']['mapstatus'] == 1): ?>
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&language=zh-CN"></script>
		<?php endif; ?>		
		<script type="text/javascript">
		//谁在抢购
		$(document).ready(function(){
			var path = "<?php echo smarty_function_getstaticpath(array(), $this);?>
";
			var achieveGrouponNum = <?php echo $this->_tpl_vars['grouponInfoArr']['achieveGrouponNum']; ?>
;
			$.get('<?php echo $this->_tpl_vars['domain']; ?>
/?tg=/index/whysp/id/<?php echo $this->_tpl_vars['grouponInfoArr']['id']; ?>
/',{picPath:path,num:achieveGrouponNum},function(data){
				if(data != ""){
					//$("#huihuan01").show();
					//alert(data);return false;
					//$("body").html(data);return false;
					$("#vipcon").html(data);
					
					//js水平滚动
					var speed=20; //数字越大速度越慢
					var tab=document.getElementById("vipbig");
					var tab1=document.getElementById("vipcon");
					var tab2=document.getElementById("demo2");
					var theLastOne=document.getElementById("theLastOne");
					if($("#gundong_width").val()<7)
					{
						tab2.innerHTML=tab1.innerHTML;
					}
					function Marquee(){
						if(tab2.offsetWidth-tab.scrollLeft<=0){
							tab.scrollLeft-=tab1.offsetWidth
						}else{
							if(theLastOne.scrollLeft==40){
								alert(40);
								//$("#huihuan01").show("slow");
								setTimeout($("#huihuan01").show("slow"),3000);
								setTimeout($("#huihuan01").hide("slow"),3000);
							}
							tab.scrollLeft++;
						}
					}
					if($("#gundong_width").val()>7)
					{
						var MyMar=setInterval(Marquee,speed);
						tab.onmouseover=function() {clearInterval(MyMar)};
						tab.onmouseout=function() {MyMar=setInterval(Marquee,speed)};
					}
					//滚动结束	
					
				}else{
					$("#vipcon").hide();
					//$("#huihuan01").hide();
				}
			});
			
			<?php if ($this->_tpl_vars['grouponInfoArr']['mapstatus'] == 1): ?>
			//google地图
			codeAddress();
			<?php endif; ?>

		});

//google地图
				  function codeAddress() {
				  $("#map_canvas").show();
					var geocoder = new google.maps.Geocoder();
					var address = $("#map").text();
					if (geocoder) {
					  geocoder.geocode( { 'address': address}, function(results, status) {
					  
						if (status == google.maps.GeocoderStatus.OK) {
						var myOptions = {
						  zoom: 14,
						  center: results[0].geometry.location,
						  disableDefaultUI: true,
						  mapTypeId: google.maps.MapTypeId.ROADMAP
						}
						  map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
						  var marker = new google.maps.Marker({
							  position: results[0].geometry.location, 
							  map: map,
							  title: address
						  });

						  var infowindow = new google.maps.InfoWindow({
							  content: address,
							  //disableAutoPan: true,
							  position: results[0].geometry.location
						  });
						  infowindow.open(map,marker);


						  //map.setCenter(results[0].geometry.location);
						} else {
						  $("#map_canvas").html("<p><?php echo smarty_function_language_message(array('str' => 'addresserror'), $this);?>
</p>");
						}
					  });
					}
				  }
		</script>
        <div class="con_left02bottom"></div>
      </div>
      <div class="con_left03"> </div>
      <div class="con_left01 bj01" style="margin-top:15px;"></div>
      <div class="con_left022" style="height:auto;" >
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>
			<h1 style="font-weight: bold;padding-left:14px;">本单详情</h1>
			<div class="con_left02left">
                <p class="txt">
                  <?php echo $this->_tpl_vars['grouponInfoArr']['groupon_content']; ?>

                </p>
              </div>
              <div class="con_left02right">
                <p class="ldjj">
				  <?php echo smarty_function_lang_cp(array('str' => 'contacts'), $this);?>
：
                  <?php echo $this->_tpl_vars['grouponInfoArr']['groupon_contact_name']; ?>
<br />
				  <?php echo smarty_function_lang_cp(array('str' => 'm_phone'), $this);?>
：
                  <?php echo $this->_tpl_vars['grouponInfoArr']['groupon_telephone']; ?>
<br />
				  m_phone：
                  <?php echo $this->_tpl_vars['grouponInfoArr']['groupon_mobile_phone']; ?>

                </p>
                <p class="map" id="map"><?php echo $this->_tpl_vars['grouponInfoArr']['groupon_address']; ?>
</p>
                <p class="mapimg" id="map_canvas" style="width:220px;height:227px; margin: auto 0;display:none"><?php echo smarty_function_language_message(array('str' => 'maploadding'), $this);?>
...</p>
              </div></td>
          </tr>
		  <tr>
		  <td>
			<div class="con_left02left">
		  <h1 style="font-weight: bold;padding-left:14px;">他们说</h1>				
                <p class="txt">
					<img src="<?php echo smarty_function_getstaticpath(array(), $this);?>
images/quote.gif" />
					<span>
                  <?php echo $this->_tpl_vars['grouponInfoArr']['theysay']; ?>

				  </span>
                </p>
              </div>	
			  
		
			<div class="con_left02left">
			<h1 style="font-weight: bold;padding-left:14px;"><?php echo $this->_tpl_vars['webinfo']['config_website_name']; ?>
说</h1>				
					<p class="txt">
					<img src="<?php echo smarty_function_getstaticpath(array(), $this);?>
images/quote.gif" />
					<span>
                  <?php echo $this->_tpl_vars['grouponInfoArr']['websitesay']; ?>

				  </span>
				  </p>
              </div>			  	  
		  </td>
		  </tr>
        </table>
      </div>
      <div class="bj03"></div>
    </div>
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
  data: {'id':1},
  cache:false,
  success: successProcess
  //dataType: dataType
});

</script>
<script type="text/javascript">
function BtHide(id){var Div = document.getElementById(id);if(Div){Div.style.display="none"}}
function BtShow(id){var Div = document.getElementById(id);if(Div){Div.style.display="block"}}

function BtTabRemove(index,head,divs) {
	var tab_heads = document.getElementById(head);
	if (tab_heads) {
	var lis = tab_heads.getElementsByTagName("li"); var as = tab_heads.getElementsByTagName("a");
	for(var i=0;i<as.length;i++){lis[i].className = "";BtHide(divs+"_"+i);if (i==index) {lis[i].className = "current";}}
	BtShow(divs+"_"+index)}
}

function BtTabOn(head,divs){
	var tab_heads=document.getElementById(head);
	if (tab_heads) {
	BtTabRemove(0,head,divs);
	var alis=tab_heads.getElementsByTagName("a");
	for(var i=0;i<alis.length;i++) {
	alis[i].num=i;
	alis[i].onclick = function(){BtTabRemove(this.num,head,divs);this.blur();return false;}
	alis[i].onfocus = function(){BtTabRemove(this.num,head,divs)}}}
}

function BtZebraStrips(id,tag) {
	var ListId = document.getElementById(id);
	if(ListId){
	var tags  = ListId.getElementsByTagName(tag);
	for(var i=0;i<tags.length;i++) {
	tags[i].className   += " barry"+i%2;
	tags[i].onmouseover = function(){this.className += " hover"}
	tags[i].onmouseout  = function(){this.className = this.className.replace(" hover","")}}}
}

function BtPopload(showId){
	var h = Math.max(document.documentElement.scrollHeight,document.documentElement.clientHeight) + 'px';
	var w = document.documentElement.scrollWidth + 'px';
	var popCss = "background:#000;opacity:0.3;filter:alpha(opacity=30);position:absolute;left:0;top:0;overflow:hidden;"
	var exsit = document.getElementById("popBox");
	if (!exsit) {
		pop_Box = document.createElement("div");pop_Box.id = "popBox";
		document.getElementsByTagName("body")[0].appendChild(pop_Box);
		pop_Box.style.cssText = popCss;pop_Box.style.zIndex = "10";
		pop_Box.style.height = h;pop_Box.style.width = w;
		
		pop_Iframe = document.createElement("iframe");pop_Iframe.id = "popIframe";
		document.getElementsByTagName("body")[0].appendChild(pop_Iframe);	
		pop_Iframe.style.cssText = popCss;pop_Iframe.style.zIndex = "9";
		pop_Iframe.style.height = h;pop_Iframe.style.width = (parseInt(w)-5)+"px";
	}
	BtShow("popIframe");BtShow("popBox");BtShow(showId);
	pop_Win = document.getElementById(showId);
	pop_Win.style.position = "absolute";
	pop_Win.style.zIndex = "11";
	pop_Win.style.top = document.documentElement.scrollTop+document.documentElement.clientHeight/2-pop_Win.offsetHeight/2+ 'px';
	pop_Win.style.left = (document.documentElement.clientWidth/2-pop_Win.offsetWidth/2) + 'px';
}
function BtPopShow(Bid,Did) { 
	var UploadBtn = document.getElementById(Bid);
	if (UploadBtn){UploadBtn.onclick = function() {BtPopload(Did);return false;}}	
}
function BtPopHide(Bid,Did) { 
	var UploadBtn = document.getElementById(Bid);
	if (UploadBtn){UploadBtn.onclick = function() {BtHide(Did);BtHide("popBox");BtHide("popIframe");return false;}}	
}

</script>

<div class="pop" id="pop">
	<a href="#" id="close" style="float:right;"><img src="<?php echo smarty_function_getstaticpath(array(), $this);?>
images/bg-newbie-close.gif" title="关闭窗口" /></a>
	<div id="posthtml" style="position:relative;right:0px;top:15px;width:500px;height:200px;">
		<form id="form1" name="form1" method="post" action="?tg=/index/ping/type/1">
			<table>
				<tr>
					<td><textarea name="content" id="content" style="width:350px;height:150px;border:1px solid #999;margin-left:20px;"></textarea></td>
				</tr>

				<tr>
					<td><input name="sid" type="hidden" id="sid" value="<?php echo $this->_tpl_vars['grouponInfoArr']['id']; ?>
" /></td>
				</tr>
				<tr>
					<td><input type="submit" name="Submit" value="提交评论" class="formbutton" style="margin-top:5px;margin-left:20px;"/></td>
				</tr>
			</table>
		</form>
	</div>
</div>
<script type="text/javascript">BtPopShow("open","pop");BtPopHide("close","pop")</script>
<script type="text/javascript" src="common/ip.php?url=<?php echo smarty_function_geturl(array('str' => '2'), $this);?>
&refr=<?php echo smarty_function_geturl(array('str' => '1'), $this);?>
"></script>
</body>
</html>