var app = app || {};

app.StudyController = (function(root){
	
	function StudyController(){
		this.el = $("#studies-list");
		this.initialize.apply(this, arguments);
	}
	StudyController.prototype = {
		cell: [],
		initialize: initialize,
		_events: _events,
		openVideo: openVideo,
		closeVideo: closeVideo
	}

	function initialize(){
		this._events();
	}
	function _events(){
		this.el.on("click", ".video-button", $.proxy(this.openVideo, this))
				.on("click", ".icon-close", $.proxy(this.closeVideo, this))
	}
	function openVideo(e){
		e.preventDefault();
		var self = this,
			videoId = "",
			player = "";

		self.cell = $(e.target).closest(".cell").addClass("active");
		videoId = self.cell.data("video-id"),
		player = new app.PlayerDirective(videoId).getPlayer();

		setTimeout(function(){
			self.cell.find(".video").html(player);
		}, 750);
	}
	function closeVideo(e){
		e.preventDefault();

		if($(e.target).hasClass("icon-close")){
			this.cell.removeClass("active").find(".video").empty();
			this.cell = [];
		}
	}

	return StudyController;

})(window);