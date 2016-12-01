;(function($, root){

	var pluginName = "countdown",
		defaults = {
			onTimeUpdate: function(el, d, h, m, s){},
			onTimeEnd: function(el){},
			onCreate: function(el){}
		},
		//seconds in time division
		days = 24 * 60 * 60,
		hours = 60 * 60,
		minutes = 60;

	function Plugin(el, options){
		this.el = $(el);
		this._options = $.extend(defaults, options);
		
		this._defaults = defaults;
		this._pluginName = pluginName;

		this.initialize.apply(this, arguments);
	}
	Plugin.prototype = {
		timestamp: null,
		digits: [],
		initialize: initialize,
		setTimeStamp: setTimeStamp,
		ensureHtml: ensureHtml,
		startCount: startCount,
		updateDigits: updateDigits
	}
	function initialize(){
		this.timestamp = this.el.data("event-end");
		this.setTimeStamp();
		this.ensureHtml();
		this.digits = this.el.find(".digit");
		this.startCount();
	}
	function setTimeStamp(){
		this.timestamp = new Date(this.timestamp).getTime();
	}
	function ensureHtml(){
		var self = this;

		this.el.addClass("countdown-holder");

		$.each(["days", "hours", "minutes", "seconds"], function(index, el){

			self.el.append("\
				<span class='"+ el +" digit-holder'>\
					<span class='"+ el +" digit'></span>\
					<span class='"+ el +" digit'></span>\
				</span>\
			");
		});
		this._options.onCreate(this.el);
	}
	function startCount(){
		var d, h, m, s, digits, timeLeft;

		timeLeft = Math.floor((this.timestamp - (new Date())) / 1000);

		if(timeLeft < 0){
			timeLeft = 0;
			this._options.onTimeEnd(this.el);
			return;
		}

		d = Math.floor(timeLeft / days);
		this.updateDigits(".days", d);
		timeLeft -= d * days;

		h = Math.floor(timeLeft / hours);
		this.updateDigits(".hours", h);
		timeLeft -= h * hours;

		m = Math.floor(timeLeft / minutes);
		this.updateDigits(".minutes", m);		
		timeLeft -= m * minutes;

		s = timeLeft;
		this.updateDigits(".seconds", s);
		
		this._options.onTimeUpdate(this.el, d, h, m, s);

		root.setTimeout($.proxy(this.startCount, this), 1000);
	}
	function updateDigits(type, value){
		this.digits.filter(type).eq(0).html(Math.floor(value/10) % 10);
		this.digits.filter(type).eq(1).html(value % 10);
	}

	$.fn[pluginName] = function(options){
		return this.each(function(){
			if(!$.data(this, "plugin_" + pluginName)){
				$.data(this, "plugin_" + pluginName, new Plugin(this, options));
			}
		});
	}

})(jQuery, window);