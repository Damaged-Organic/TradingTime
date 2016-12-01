var app = app || {};

app.WebRegistrationService = (function($, root){

	"use strict";

	function WebRegistrationService(){
		this.initialize.apply(this, arguments);
	}
	WebRegistrationService.prototype = {
		initialize: initialize,
		request: request
	}

	function initialize(){}
	function request(data){
		return $.ajax({
			url: "/webinarRegister",
			type: "POST",
			data: data
		});
	}

	return WebRegistrationService;

})(jQuery, window);