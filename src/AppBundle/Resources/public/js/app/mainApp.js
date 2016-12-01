var app = app || {};

$(function(){

	$(".upccoming-event").countdown({
		onTimeUpdate: function(d, h, m, s){},
		onTimeEnd: function(el){},
		onCreate: function(el){
			el.find(".days.digit-holder").append("<p>Days</p>");
			el.find(".hours.digit-holder").append("<p>Hours</p>");
			el.find(".minutes.digit-holder").append("<p>Minutes</p>");
			el.find(".seconds.digit-holder").append("<p>Seconds</p>");
		}
	});
	$(".slider-holder").slidy();
	new app.LicenseController();
});