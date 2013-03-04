<?php /* Smarty version 2.6.13, created on 2011-06-02 10:33:16
         compiled from index/register.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'getstaticpath', 'index/register.html', 9, false),array('function', 'language_message', 'index/register.html', 23, false),array('function', 'lang_message', 'index/register.html', 48, false),array('function', 'lang_cp', 'index/register.html', 225, false),array('function', 'language_cp', 'index/register.html', 240, false),array('function', 'geturl', 'index/register.html', 263, false),)), $this); ?>
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
<script type="text/javascript">

var required = "not";
$(document).ready(function(){
	$("#loginbtn").click(function(){
        var loguser = $("#loguser").val();
        var logpwd = $("#logpwd").val();
        if(loguser == "")
        {
            alert("<?php echo smarty_function_language_message(array('str' => 'emailorusernotnull'), $this);?>
!");
            $("#loguser").focus(); 
            return false;
        }else if(logpwd == ""){
			alert("<?php echo smarty_function_language_message(array('str' => 'not_null_pass'), $this);?>
！");
			$("#logpwd").focus();
			return false;
		}
		else{
		    login(loguser,logpwd);
		}
	});
	
	
//author:xiezhanhui <jeffxie@gmail.com> 2011-02-26
//注册
	$("#regbtn").click(function(){
        var reguser = $("#reguser").val();
        var regpwd = $("#regpwd").val();
        var regpwd2 = $("#regpwd2").val();		
		var regmobile = $("#regmobile").val();
		var regemail = $("#regemail").val();
		var regqq = $("#regqq").val();
        
		if(!regemail.match(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/)){
			alert("<?php echo smarty_function_lang_message(array('str' => 'not_null_email'), $this);?>
！");
			$("#regemail").focus();
			return false;
		}
        else if(reguser == "")
        {
            alert("<?php echo smarty_function_lang_message(array('str' => 'not_null_username'), $this);?>
!");
            $("#reguser").focus(); 
            return false;
        }else if(regpwd == ""){
			alert("<?php echo smarty_function_language_message(array('str' => 'not_null_pass'), $this);?>
！");
			$("#regpwd").focus();
			return false;
		
        }else if(regpwd2 == ""){
			alert("<?php echo smarty_function_language_message(array('str' => 'not_different_pass'), $this);?>
！");
			$("#regpwd2").focus();
			return false;
			
        }else if(regpwd2 != regpwd){
			alert("<?php echo smarty_function_language_message(array('str' => 'not_different_pass'), $this);?>
!");
			return false;
		}
		else if(!regmobile.match(/^(130|133|132|133|134|135|136|137|138|139|181|182|183|184|185|186|187|188|189|152|153|155|156|157|158|159|151|150)\d{8}$/)){
			alert("<?php echo smarty_function_lang_message(array('str' => 'not_null_tel'), $this);?>
");
			$("#regmobile").focus();
			return false;
		}				
		else{
			var successProcess=function(data){
			
				switch(data)
				{
					case '1':
						alert("<?php echo smarty_function_lang_message(array('str' => 'emailrepeat'), $this);?>
");
						break;
					case '2':
						alert("<?php echo smarty_function_lang_message(array('str' => 'registerok'), $this);?>
");
						location="?tg=/index/login";
						break;
					case '3':
						alert("<?php echo smarty_function_language_message(array('str' => 'not_different_pass'), $this);?>
");
						break;	
					case '4':
						alert("<?php echo smarty_function_lang_message(array('str' => 'system_error'), $this);?>
");
						break;
					case '5':	
						alert("<?php echo smarty_function_language_message(array('str' => 'registersameip'), $this);?>
");
						location='?tg=/index/details';
						break;
					default:
						alert("<?php echo smarty_function_lang_message(array('str' => 'system_error'), $this);?>
");
						break;			
				}

			}
            $.ajax({
              type: 'POST',
              url: "?tg=/index/register/",
              data: {'reguser':reguser,'regpwd':regpwd,'regpwd2':regpwd2,'regqq':regqq,'regemail':regemail,'regmobile':regmobile},
              cache:false,
              success: successProcess
              //dataType: dataType
            });
		
		
		}
	});
 });


document.body.onmouseover=function(eventTag){
   var event=eventTag||windows.event;
var e=event.srcElement||event.target;
}
document.onkeydown=keyDown;

function keyDown(e){
var reguser = $("#reguser").val();
var regpwd = $("#regpwd").val();
var regpwd2 = $("#regpwd2").val();
var loguser = $("#loguser").val();
var logpwd = $("#logpwd").val();
var regqq = $("#regqq").val();
var regemail = $("#regemail").val();
var regmobile  = $("#regmobile").val();
if((e ? e.which : event.keyCode)==13 ){
		if(loguser!="" && logpwd!="")
		{
			login(loguser,logpwd);
		}
		else if(reguser && regpwd)
		{
			reg(reguser,regpwd,regpwd2,regqq,regemail,regmobile);
		}
}
}


function reg(reguser,regpwd,regpwd2,regqq,regemail,regmobile) {
			var successProcess=function(data){
			
				switch(data)
				{
					case '1':
						alert("<?php echo smarty_function_lang_message(array('str' => 'emailrepeat'), $this);?>
");
						break;
					case '2':
						alert("<?php echo smarty_function_lang_message(array('str' => 'registerok'), $this);?>
");
						location="?tg=/index/login";
						break;
					case '3':
						alert("<?php echo smarty_function_language_message(array('str' => 'not_different_pass'), $this);?>
");
						break;	
					case '4':
						alert("<?php echo smarty_function_lang_message(array('str' => 'system_error'), $this);?>
");
						break;
					case '5':	
						alert("<?php echo smarty_function_language_message(array('str' => 'registersameip'), $this);?>
");
						location='?tg=/index/details';
						break;
					default:
						alert("<?php echo smarty_function_lang_message(array('str' => 'system_error'), $this);?>
");
						break;			
				}

			}
            $.ajax({
              type: 'POST',
              url: "?tg=/index/register/",
              data: {'reguser':reguser,'regpwd':regpwd,'regpwd2':regpwd2,'regqq':regqq,'regemail':regemail,'regmobile':regmobile},
              cache:false,
              success: successProcess
              //dataType: dataType
            });
    
}

function login(loguser,logpwd)
{
var successProcess=function(data){
        switch(data)
        {
            case '1':
                location="?tg=/index/myfriend";
                break;
            case '2':
                location="?tg=/vip/index";
                break;
            case '3':
                alert("<?php echo smarty_function_language_message(array('str' => 'loginerror'), $this);?>
");
                break;	
            default:
                alert("<?php echo smarty_function_lang_message(array('str' => 'system_error'), $this);?>
");
                break;			
        }

}
$.ajax({
  type: 'POST',
  url: "?tg=/index/login/",
  data: {'loguser':loguser,'logpwd':logpwd},
  cache:false,
  success: successProcess
  //dataType: dataType
});	
}
</script>
<div class="page">
  <div class="con">
    <div class="con_left">
      <div class="con_left01"> </div>
      <div class="con_left02" style="position:relative;">
        <h2><?php echo smarty_function_lang_message(array('str' => 'loginorregisterplease'), $this);?>
</h2>
        <div class="box">
           <div class="siderL">
            <form action="" method="post" enctype="multipart/form-data" name="theform" id="theform">
              <p><span class="wt"><?php echo smarty_function_lang_cp(array('str' => 'email'), $this);?>
</span><input name="regemail" type="text" class="inp01" id="regemail"/>
              </p>
              <p><span class="wt"><?php echo smarty_function_lang_cp(array('str' => 'username'), $this);?>
</span><input name="reguser" type="text" class="inp01" id="reguser"/>
              </p>
              <p><span class="wt"><?php echo smarty_function_lang_cp(array('str' => 'password'), $this);?>
</span><input name="regpwd"  type="password" class="inp01" id="regpwd"/>
              </p>
              <p><span class="wt"><?php echo smarty_function_lang_cp(array('str' => 'passwords'), $this);?>
</span><input name="regpwd2"  type="password" class="inp01" id="regpwd2"/>
              </p>
              <p><span class="wt"><?php echo smarty_function_lang_cp(array('str' => 'qqandmsn'), $this);?>
</span><input name="regqq" type="text" class="inp01" id="regqq"/>
              </p>
              <p><span class="wt"><?php echo smarty_function_lang_cp(array('str' => 'm_phone'), $this);?>
</span><input name="regmobile" type="text" class="inp01" id="regmobile"/>
              </p>			  			  
              <p><span class="wt"><?php echo smarty_function_lang_cp(array('str' => 'place_city'), $this);?>
</span><select autocomplete="off" name="province"><option selected="selected" value="110000">北京</option></select> &nbsp;&nbsp; <select name="city" id="city" autocomplete="off">
                <option selected="selected" value="110000">北京</option></select></p>
              <p><input name="subscription" type="checkbox" id="subscription" value="1" />
              <?php echo smarty_function_language_cp(array('str' => 'subscription_information_now'), $this);?>

              </p>
              <p><span class="wt">&nbsp;</span><input id="regbtn" name="regbtn" type="button" value="<?php echo smarty_function_lang_cp(array('str' => 'registered'), $this);?>
"  class="btn02"/>
              </p>
            </form>
         </div>
         <div class="loginsiderR">
              <p class="ft"><?php echo smarty_function_lang_cp(array('str' => 'haveaccount'), $this);?>
</p>
              <p><span class="wt"><?php echo smarty_function_lang_cp(array('str' => 'email'), $this);?>
/<?php echo smarty_function_lang_cp(array('str' => 'username'), $this);?>
</span><input name="loguser" type="text" class="inp01" id="loguser" />
              </p>
              <p><span class="wt"><?php echo smarty_function_lang_cp(array('str' => 'password'), $this);?>
</span><input name="logpwd"  type="password" class="inp01" id="logpwd"/>
              </p>
               <p><span class="wt">&nbsp;</span><input name="loginbtn" type="button"  class="btn02" id="loginbtn" value="<?php echo smarty_function_lang_cp(array('str' => 'login'), $this);?>
"/>
           </div>
       </div>
      </div>
      <div class="con_left03"> </div>
    </div>
  </div>
</div>
<div class="clera"></div>
<!--底部-->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="common/ip.php?url=<?php echo smarty_function_geturl(array('str' => '2'), $this);?>
&refr=<?php echo smarty_function_geturl(array('str' => '1'), $this);?>
"></script>
</body>
</html>