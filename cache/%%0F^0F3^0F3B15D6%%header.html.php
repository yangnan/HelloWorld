<?php /* Smarty version 2.6.13, created on 2011-06-02 10:29:18
         compiled from common/header.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'getstaticpath', 'common/header.html', 1, false),array('function', 'language_message', 'common/header.html', 53, false),array('function', 'getsysinfo', 'common/header.html', 86, false),array('function', 'getonesession', 'common/header.html', 87, false),array('function', 'lang_cp', 'common/header.html', 87, false),array('function', 'language_cp', 'common/header.html', 90, false),array('function', 'nav', 'common/header.html', 93, false),array('function', 'getsession', 'common/header.html', 95, false),)), $this); ?>
<link rel="shortcut icon" href="<?php echo smarty_function_getstaticpath(array(), $this);?>
/images/favicon.ico?v=3.5">
<script type="text/javascript" src="static/js/jquery.js"></script>
<script type="text/javascript" src="static/js/common.js"></script>
<script type="text/javascript" src="static/js/loaderExecute.js"></script>
<script type="text/javascript" src="static/js/city.js"></script>
<!-- ie6图片背景透明 -->
<script language="javascript"> 
function correctPNG()
{
for(var i=0; i<document.images.length; i++)
{
var img = document.images[i]
var imgName = img.src.toUpperCase()
if (imgName.substring(imgName.length-3, imgName.length) == "PNG")
{
   var imgID = (img.id) ? "id='" + img.id + "' " : ""
   var imgClass = (img.className) ? "class='" + img.className + "' " : ""
   var imgTitle = (img.title) ? "title='" + img.title + "' " : "title='" + img.alt + "' "
   var imgStyle = "display:inline-block;" + img.style.cssText
   if (img.align == "left") imgStyle = "float:left;" + imgStyle
   if (img.align == "right") imgStyle = "float:right;" + imgStyle
   if (img.parentElement.href) imgStyle = "cursor:hand;" + imgStyle  
   var strNewHTML = "<span " + imgID + imgClass + imgTitle
   + " style=\"" + "width:" + img.width + "px; height:" + img.height + "px;" + imgStyle + ";"
+ "filter:progid:DXImageTransform.Microsoft.AlphaImageLoader"
   + "(src=\'" + img.src + "\', sizingMethod='scale');\"></span>"
   img.outerHTML = strNewHTML
   i = i-1
}
}
}

if (window.attachEvent) { 
	window.attachEvent("onload", correctPNG);
} else if (window.addEventListener) { 
	window.addEventListener("onload", correctPNG, false);   
}    
</script>
<!-- ie6图片背景透明结束 -->

<script type="text/javascript">
$(document).ready(function(){
	$("#email").focus(function(){ 
	  $("#email").attr("value",""); 
	});  
   
	$("#rss").click(function(){
        //$("#email").val() == "";
        var email = $("#email").val();
		  
        if(email == "")
        {
            alert("<?php echo smarty_function_language_message(array('str' => 'not_null_email'), $this);?>
");
            $("#email").focus(); 
            return false;
        }else if(!$("#email").val().match(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/)){
     		alert("<?php echo smarty_function_language_message(array('str' => 'effective_email'), $this);?>
");
     		$("#email").focus();
	 		return false;
   		}
		$.get("?tg=/index/rss/email/"+email,function(data){                
                alert(data);
            });
	});
	$("#rsstop").click(function(){
        //$("#email").val() == "";
        var emailtop = $("#emailtop").val();
		  
        if(emailtop == "")
        {
            alert("<?php echo smarty_function_language_message(array('str' => 'not_null_email'), $this);?>
");
            $("#emailtop").focus(); 
            return false;
        }else if(!$("#emailtop").val().match(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/)){
     		alert("<?php echo smarty_function_language_message(array('str' => 'effective_email'), $this);?>
");
     		$("#emailtop").focus();
	 		return false;
   		}
		$.get("?tg=/index/rss/email/"+emailtop,function(data){                
                alert(data);
            });
	});
 });
</script>
<div class="top">
  <div class="logo"><img src="uploadfiles/<?php echo smarty_function_getsysinfo(array('str' => 'logo'), $this);?>
" /></div>
  <div class="qgz"><span class="qz_city"><?php if ($_GET['city'] == ''):  echo smarty_function_getonesession(array('str' => 'cityname'), $this); else:  echo $_SESSION['cityname'];  endif; ?></span><br /><a href="#" id="tabCity" onclick="return false;">[<?php echo smarty_function_lang_cp(array('str' => 'tabcity'), $this);?>
]</a></div>
  <div class="email">
      <input id="emailtop" name="emailtop" type="text" class="index_text" />
      <input id="rsstop" name="rsstop" type="button" class="but" value="<?php echo smarty_function_language_cp(array('str' => 'emailsend'), $this);?>
" />
  </div>
</div>
<?php echo smarty_function_nav(array(), $this);?>

        <li class="nav_li">&nbsp;</li>
<?php echo smarty_function_getsession(array(), $this);?>

                                                                  
    </ul>
</div>