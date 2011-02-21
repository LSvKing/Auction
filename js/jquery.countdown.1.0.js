/*
 * 倒计时插件，主要用来限时购买
 * By Skygq 2010年11月30日
 * 版本1.0
*/
;(function($){
	$.fn.countdown = function(options){
		if (this.length == 0){
			return false;
		}
		return this.each(function(){
			var Default = {
				Sdate:null,//开始时间（格式为“2010-10-10 10:10:10”）可以设置为服务端的时间
				Edate:null,//结束日期（格式为“2010-10-10 10:10:10”）
				callback:function(){
					return false;
				}
			},
			_lT = null,
		    _cT = new Date(),
		    _eT = null,
		    _elT = null,
		    ctime = null,
		    etime = null,
		    DomId = null,
		    _timeout = null,
		    _gt = function(){
				if (_lT == null) {
		            _elT = (etime - ctime);
		            if (_elT < 0){
		            	$('#'+DomId).html("<strong>0</strong>H:<strong>0</strong>M:<strong>0</strong>S");
		            }
		            var _xT =Math.ceil(_elT/(24*60*60*1000));
		            _cT = parseInt(_cT.match(/\s(\d+)\D/)[1] * 3600) + parseInt(_cT.split(":")[1] * 60) + parseInt(_cT.split(":")[2]);
		            _eT = _xT * 24 * 3600 + parseInt(_eT.match(/\s(\d+)\D/)[1] * 3600) + parseInt(_eT.split(":")[1] * 60) + parseInt(_eT.split(":")[2]);
		            _lT = _elT/1000;
		        }
		        if (_elT > 0) {
		            if (_lT >= 0) {
		                var _H = Math.floor(_lT / 3600);
		                var _M = Math.floor((_lT - _H * 3600) / 60);
		                var _S = (_lT - _H * 3600) % 60;
		                $('#'+DomId).html("<strong>" + _H + "</strong>H:<strong>" + _M + "</strong>M:<strong>" + _S + "</strong>S");
		                _lT--;
		            } else {
		                clearInterval(_timeout);
		                if(s.callback && $.isFunction(s.callback)){
							s.callback.call(this);
						}
		            }
		        } else {
		            clearInterval(_timeout);
		            if(s.callback && $.isFunction(s.callback)){
						s.callback.call(this);
					}
		        }
			},
			strDateTime = function(str){//判断日期时间的输入是否正确，类型必须形如为：2010-01-01 01:01:01
				var reg = /^(\d{1,4})(-|\/)(\d{1,2})\2(\d{1,2}) (\d{1,2}):(\d{1,2}):(\d{1,2})$/;
				var r = str.match(reg);
				if(r==null)return false;
				var d= new Date(r[1], r[3]-1,r[4],r[5],r[6],r[7]);
				return (d.getFullYear()==r[1]&&(d.getMonth()+1)==r[3]&&d.getDate()==r[4]&&d.getHours()==r[5]&&d.getMinutes()==r[6]&&d.getSeconds()==r[7]);
			}
			var s = $.extend({}, Default, options || {});
			DomId = this.id;
			if (DomId == 'null'){
				return;
			}
			_eT = s.Edate;
			if (!strDateTime(_eT)){
				alert('结束日期格式不正确');
				return false;
			}
			if (s.Sdate != null){
				_cT = s.Sdate;
			}
			_cT = _cT.toString();
            cdate = _cT.replace(/-/g, '/');
            _eT = _eT.toString();
            edate = _eT.replace(/-/g, '/');
            ctime = new Date(cdate);
            etime = new Date(edate);
            _timeout = setInterval(_gt, 1000)
		});
	}
})(jQuery);