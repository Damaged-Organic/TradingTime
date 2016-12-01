var app = app || {};

app.LicenseController = (function($, root){

	function LicenseController(){
		this.el = $("#license-holder");
		this.initialize.apply(this, arguments);
	}
	LicenseController.prototype = {
		buttons: [],
		confirmForm: [],
		confirmButton: [],
		checkbox: [],
		initialize: initialize,
		_events: _events,
		activateScrollBar: activateScrollBar,
		handleButton: handleButton,
		handleClose: handleClose,
		handleChekcbox: handleChekcbox,
		ensureForm: ensureForm
	}

	function initialize(){
		this.buttons = $(".license-button");
		this.checkbox = this.el.find("#license-agreement");

		this._events();
		this.activateScrollBar();
	}
	function _events(){
		this.buttons.on("click", $.proxy(this.handleButton, this));
		this.el.on("click", $.proxy(this.handleClose, this));
		this.el.on("change", $.proxy(this.handleChekcbox, this));
	}
	function activateScrollBar(){
		this.el.find("#license").perfectScrollbar();
	}
	function handleButton(e){
		e.preventDefault();

		var target = $(e.target).closest(".license-button"),
			className = target.data("license");

		className ? this.ensureForm(className) : this.el.addClass("hidden-footer");
		this.el.addClass("active");
	}
	function handleClose(e){
		var target = $(e.target);

		if(target.closest(".inner").length === 0){
			this.el.removeClass("active hidden-footer");
			this.checkbox.prop("checked", false);
		}
	}
	function handleChekcbox(e){
		this.checkbox.prop("checked") ? this.confirmButton.attr("disabled", false) : this.confirmButton.attr("disabled", true);
	}
	function ensureForm(className){
		this.confirmForm = this.el.find("." + className);
		this.confirmButton = this.confirmForm.find("button");

		this.confirmForm.addClass("active").siblings().removeClass("active");
		this.confirmButton.prop("disabled", true);
	}

	return LicenseController;

})(jQuery, window);