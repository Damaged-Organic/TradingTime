var app = app || {};

app.WebinarController = (function(root){

	var playlistId = "PL8XYcyYSRiA47CKd9b0Equg4MhgUZ2u7h";

	function WebinarController(){
		this.el = $("#webinars-list");
		this.initialize.apply(this, arguments);
	}

	$.extend(WebinarController.prototype, app.loadTemplate, {
		videos: [],
		topVideo: [],
		youtubeService: {},
		template: null,
		initialize: initialize,
		_events: _events,
		getVideos: getVideos,
		handlePlay: handlePlay,
		updateHtml: updateHtml
	});

	function initialize(){
		this._events();
		this.youtubeService = new app.YoutubeService(playlistId);
		
		this.getTemplate("http://trading-time.com/bundles/app/js/templates/webinarsTemplate.html", $.proxy(function(tpl){
			this.template = tpl;
		}, this));
	}
	function _events(){
		$(root).on("videos.loaded", $.proxy(this.getVideos, this));
		this.el.on("click", ".play-button", $.proxy(this.handlePlay, this));
	}
	function getVideos(e){
		this.videos = this.youtubeService.getVideos();

		// Kludge : P
		if(!this.videos.length <= 1) return;

		this.videos = this.videos.floorDimension();
		this.topVideo = this.videos.pop();

		this.updateHtml();
	}
	function handlePlay(e){
		e.preventDefault();
		var target = $(e.target).closest(".cell"),
			videoId = target.data("video-id");

		target.find(".video").html('<iframe src="http://www.youtube.com/embed/'+ videoId +'?autoplay=1" frameborder="0"></iframe>').andSelf().addClass("active");
	}
	function updateHtml(){		
		html = this.template({
			videos: this.videos,
			topVideo: this.topVideo
		});
		this.el.append(html);
	}

	return WebinarController;

})(window);