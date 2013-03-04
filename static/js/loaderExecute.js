/*
* 初始化，页面加载完毕之后执行这里
* xiezhanhui <jeffxie@gmail.com>
* 2011-1-7 15:17
*/
$(document).ready(function(){
	$("#tabCity").click(function(){
				if($("#city").css("display") == "none")
				{
					$("#city").show();
					$("#tabCity")[0].src="templates/default/images/qgz_an01.jpg";
				}
				else{
					$("#city").hide();											
					$("#tabCity")[0].src="templates/default/images/qgz_an02.jpg";
				}
	});
});