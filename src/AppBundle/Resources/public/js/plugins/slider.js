;(function($, root){

	var pluginName = "slidy",
		defaults = {};

	function Plugin(el, options){
		this.el = $(el);
		this._options = $.extend(defaults, options);
		
		this._defaults = defaults;
		this._pluginName = pluginName;

		this.initialize.apply(this, arguments);
	}
	Plugin.prototype = {
		slideHolder: [],
		slides: [],
		slideCount: null,
		_slideWidth: null,
		visibleSlides: 3,
		slideCurrent: 0,
		initialize: initialize,
		_events: _events,
		calculateSize: calculateSize,
		setSize: setSize,
		handleSlide: handleSlide,
		slide: slide
	}
	function initialize(){
		this._events();
		this.slideHolder = this.el.find("ul");
		this.slides = this.el.find("li");
		this.slideCount = this.slides.length;

		this.calculateSize();
	}
	function _events(){
		this.el.on("click", ".arrows", $.proxy(this.handleSlide, this));
		$(root).on("resize", $.proxy(this.calculateSize, this));
	}
	function calculateSize(){
		this._slideWidth = (this.el.width() / this.visibleSlides);
		this.setSize();
	}
	function setSize(){
		this.slideHolder.css({width: this._slideWidth * this.slideCount + "px"});
		this.slides.css({width: this._slideWidth + "px"});
	}
	function handleSlide(e){
		e.preventDefault();
		var target = $(e.target).closest(".arrows");

		if(target.hasClass("arrow-left")){

			if(this.slideCurrent <= 0) return;
			this.slideCurrent--;
		} else{

			if(this.slideCurrent >= this.slideCount - this.visibleSlides) return;
			this.slideCurrent++;
		}
		this.slide();
	}
	function slide(){
		this.slideHolder.css({"margin-left": this.slideCurrent * this._slideWidth * -1 + "px"});
	}

	$.fn[pluginName] = function(options){
		return this.each(function(){
			if(!$.data(this, "plugin_" + this.pluginName)){
				$.data(this, "plugin_" + this.pluginName, new Plugin(this, options))
			}
		});
	}

})(jQuery, window);