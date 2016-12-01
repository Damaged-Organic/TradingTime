var app = app || {};

app.WebRegistrationController = (function($, root){

	"use strict";

	function WebRegistrationController(){
		this.el = $("#web-reg-holder");
		this.initialize.apply(this, arguments);
	}
	WebRegistrationController.prototype = {
		form: [],
		formData: {},
		responseHolder: [],
		webRegService: {},
		initialize: initialize,
		_events: _events,
		handleForm: handleForm,
		sendData: sendData
	}

	function initialize(){
		this.form = $("#webinar-reg-form");
		this.responseHolder = $("#response-holder");
		this.webRegService = new app.WebRegistrationService();
		this._events();

		this.form.validate();
	}
	function _events(){
		this.form.on("submit", $.proxy(this.handleForm, this));
	}
	function handleForm(e){
		e.preventDefault();

		if(!this.form.valid()) return;
		this.form.addClass("active");
		this.formData = this.form.serializeArray();

		this.sendData();
	}
	function sendData(){
		var self = this;

		this.webRegService.request(this.formData)
		.done(function(response){
			self.responseHolder.html("<p>" + response.message + "</p>").addClass("success");
			self.form[0].reset();
		})
		.fail(function(error){
			error = JSON.parse(error.responseText);
			self.responseHolder.html("<p>" + error.message + "</p>").addClass("error");
		})
		.always(function(){
			self.form.removeClass("active");

			root.setTimeout(function(){
				self.responseHolder.empty().removeClass("success error");
			}, 5000);
		});
	}

	return WebRegistrationController;

})(jQuery, window);