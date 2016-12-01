var app = app || {};

$(function(){

	$("#event-countdown").countdown({
		onTimeUpdate: function(d, h, m, s){},
		onTimeEnd: function(el){
			el.closest("#webinars-list").addClass("event-start");
		},
		onCreate: function(el){
			el.find(".days.digit-holder").append("<p>Days</p>");
			el.find(".hours.digit-holder").append("<p>Hours</p>");
			el.find(".minutes.digit-holder").append("<p>Minutes</p>");
			el.find(".seconds.digit-holder").append("<p>Seconds</p>");
		}
	});

	new app.WebinarController();
	new app.WebRegistrationController();
});