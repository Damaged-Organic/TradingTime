var app = app || {};

app.FeedbackService = (function(root){

	function FeedbackService(){
		this.initialize.apply(this, arguments);
	}
	FeedbackService.prototype = {
		initialize: initialize,
		request: request
	}

	function initialize(){
	}
	function request(url, data){
		if(typeof(url) !== "string") return;

		return $.ajax({
			url: url,
			type: "POST",
			data: data
		});
	}

	return FeedbackService;

})(window);