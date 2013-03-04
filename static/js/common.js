/*
	[TGroupon] (C) 2011
	$Id: common.js 2011-1-7 jeffxie $
*/


function closeDom(id)
{
	$("#"+id).css("display","none");
}


/*
* [TGroupon] (C) 2011
* @author:xiezhanhui  <jeffxie@gmail.com>
* @param $Id
* @time 2011-1-7 15:08
* Open the window
*/
function openDom(id)
{
	$("#"+id).show();
}


function QueryString()
{
	var name,value,i;
	var str=location.href;
	var num=str.indexOf("?")
	str=str.substr(num+1);
	var arrtmp=str.split("/");
	for(i=1;i <= arrtmp.length;i++){
		if(i%2)
		{
			this[arrtmp[i]] = arrtmp[i+1];
		}
	}
}

function gz(uid,sid,uname) {
    var classname = $("#gz_id")[0].className;
    var successProcess=function(data){
            switch(data)
            {
                case '1':
                    alert("操作成功");
                    if(classname == 'gz_id')
                    {
                        $("#gz_id").removeClass("gz_id");
                        $("#gz_id").addClass("gz_id_no");
                        $("#fen").html((parseInt($("#fen").html())+1));
                    }
                    else{
                        $("#fen").html((parseInt($("#fen").html())-1));
                        $("#gz_id").removeClass("gz_id_no");
                        $("#gz_id").addClass("gz_id");
                    }
                    break;
                case '2':
                    alert("关注失败");
                    break;
                case '3':
                    alert("您已经关注过了");
                    break;
                case '4':
                    alert("请登录后提交");
                    break;
                default:
                    alert("系统错误,请联系管理");
                    break;
            }

    }

    $.ajax({
      type: 'POST',
      url: "?tg=/index/ping/type/2",
      data: {'sid':$("#sid").val(),'classname':classname},
      cache:false,
      success: successProcess
      //dataType: dataType
    });
}