/*
* [TGroupon] (C) 2011
* @author:jeffxie  <jeffxie@boshengsoft.com>
* @param $Id
* @time 2011-1-7
*/

$(function(){
	//validate 表单验证
	$("#theform").validate();

});

//xiezhanhui<jeffxie@gmail.com> leftVal为判断左侧链接作用
function getleftbar(id,leftVal)
{
    if(leftVal == "leftframes")
    {
        //为了方便这里控制id返回值,leftframes xiezhanhui
        id = 1;
    }
	var str = '';
	for(i=0;i<10;i++)
	{
		if(i == id){
			$("#menu_"+i).addClass("fontBold");
		}else{
			$("#menu_"+i).removeClass("fontBold");
		}
	}
	$.each(navArr[id],function(key,value) {

		str += "<li><a href='"+navUrlArr[id][key]+"' target='frmright'>"+value+"</a></li>";

	});
    if(leftVal == "leftframes")
    {
        return str;
    }
    else{
        $('#frmleft').contents().find('#menubar').html(str);
    }

}