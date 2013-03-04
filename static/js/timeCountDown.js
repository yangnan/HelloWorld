/* by zhangxinxu 2010-07-27 
* http://www.zhangxinxu.com/
* 倒计时的实现
*/
var fnTimeCountDown = function(d, o){
	var f = {
		zero: function(n){
			var n = parseInt(n, 10);
			if(n > 0){
				if(n <= 9){
					n = "0" + n;	
				}
				return String(n);
			}else{
				return "0";	
			}
		},
		dv: function(){
			d = d || Date.UTC(2050, 0, 1); //如果未定义时间，则我们设定倒计时日期是2050年1月1日
			var future = new Date(d), now = new Date();
			//现在将来秒差值
			var dur = Math.round((future.getTime() - now.getTime()) / 1000) + future.getTimezoneOffset() * 60, pms = {
				sec: "0",
				mini: "0",
				hour: "0",
				day: "0",
				month: "0",
				year: "0"
			};
			if(dur > 0){
				pms.sec = f.zero(dur % 60);
				pms.mini = Math.floor((dur / 60)) > 0? f.zero(Math.floor((dur / 60)) % 60) : "0";
				pms.hour = Math.floor((dur / 3600)) > 0? f.zero(Math.floor((dur / 3600)) % 24) : "0";
				pms.day = Math.floor((dur / 86400)) > 0? f.zero(Math.floor((dur / 86400)) % 30) : "0";
				//月份，以实际平均每月秒数计算
				pms.month = Math.floor((dur / 2629744)) > 0? f.zero(Math.floor((dur / 2629744)) % 12) : "0";
				//年份，按按回归年365天5时48分46秒算
				pms.year = Math.floor((dur / 31556926)) > 0? Math.floor((dur / 31556926)) : "0";
			}else{
				pms.sec = "0";
				pms.mini = "0";
				pms.hour = "0";
				pms.day = "0";
				pms.month = "0";
				pms.year = "0";
				document.getElementById("timeLeft").innerHTML = document.getElementById("shop_status").value;
			}
			return pms;
		},
		ui: function(){
			if(o.sec){
				o.sec.innerHTML = f.dv().sec;
			}
			if(o.mini){
				o.mini.innerHTML = f.dv().mini;
			}
			if(o.hour){
				o.hour.innerHTML = f.dv().hour;
			}
			if(o.day){
				o.day.innerHTML = f.dv().day;
			}
			if(o.month){
				o.month.innerHTML = f.dv().month;
			}
			if(o.year){
				o.year.innerHTML = f.dv().year;
			}
			setTimeout(f.ui, 1000);
		}
	};	
	f.ui();
};