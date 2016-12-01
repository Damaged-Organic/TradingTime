var app = app || {};

app.FeedbackController = (function(root){

	function FeedbackController(){
		this.el = $("#feedback");
		this.initialize.apply(this, arguments);
	}
	FeedbackController.prototype = {
		form: $("#feedback-form"),
		responseHolder: $("#response-holder"),
		formData: {},
		feedbackService: {},
		initialize: initialize,
		_events: _events,
		handleForm: handleForm,
		sendMessage: sendMessage
	}

	function initialize(){
		this._events();
		this.feedbackService = new app.FeedbackService();

		this.form.validate();
	}
	function _events(){
		this.form.on("submit", $.proxy(this.handleForm, this));
	}
	function handleForm(e){
		e.preventDefault();

		if(!this.form.valid()) return;
		this.formData = this.form.serializeArray();
		this.form.addClass("active");
		this.sendMessage();
	}
	function sendMessage(){
		var self = this;

		this.feedbackService.request("/feedbackSend", this.formData)
		.done(function(response){
			self.form[0].reset();
			self.responseHolder.html("<p>"+ response.message +"</p>").addClass("success");
		})
		.fail(function(error){
			error = JSON.parse(error.responseText);
			self.responseHolder.html("<p>" + error.message + "</p>").addClass("error");
		})
		.always(function(){
			self.form.removeClass("active");

			root.setTimeout(function(){
				self.responseHolder.html("").removeClass("success error");
			}, 5000);
		});
	}

	return FeedbackController;

})(window);