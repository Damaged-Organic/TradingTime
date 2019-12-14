var app = app || {};

app.EducationController = (function(root){

	var playlistId = "PL8XYcyYSRiA6hQt3AJZAsiWQTT4kTzzit";

	function EducationController(){
		this.el = $("#education-list");
		this.initialize.apply(this, arguments);
	}

	$.extend(EducationController.prototype, app.loadTemplate, {
		button: $("#load-button"),
		video: [],
		currentPage: 0,
		youtubeService: {},
		template: null,
		initialize: initialize,
		_events: _events,
		videosLoaded: videosLoaded,
		handleMore: handleMore,
		handlePlay: handlePlay,
		updateHtml: updateHtml
	});

	function initialize(){
		this._events();
		this.youtubeService = new app.YoutubeService(playlistId, 4);
		
		this.getTemplate("http://trading-time.com/bundles/app/js/templates/educationTemplate.html", $.proxy(function(tpl){
			this.template = tpl;
		}, this));
	}
	function _events(){
		$(root).on("videos.loaded", $.proxy(this.videosLoaded, this));
		this.button.on("click", $.proxy(this.handleMore, this));
		this.el.on("click", ".play-button", $.proxy(this.handlePlay, this));
	}
	function videosLoaded(e){
		this.videos = this.youtubeService.getVideos();
		
		this.updateHtml(this.videos[this.currentPage]);
		this.currentPage++;

		this.button.removeClass("loading");
	}
	function handleMore(e){
		e.preventDefault();
		var videos = this.videos[this.currentPage];

		this.currentPage++;
		this.updateHtml(videos);
		if(this.currentPage >= this.videos.length) this.button.addClass("disabled");
	}
	function handlePlay(e){
		e.preventDefault();
		var target = $(e.target).closest(".cell"),
			videoId = target.data("video-id");
		
		target.find(".video").html('<iframe src="http://www.youtube.com/embed/'+ videoId +'?autoplay=1" frameborder="0"></iframe>').andSelf().addClass("active");
	}
	function updateHtml(videos){
		if(!videos) return;

		html = this.template({videos: videos});
		this.el.append(html);
	}

	return EducationController;

})(window);