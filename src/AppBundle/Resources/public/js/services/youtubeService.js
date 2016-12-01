var app = app || {};

app.YoutubeService = (function(root){

	var apiKey = "AIzaSyCnbIb-ksPXxzV2uPSUhBwszJg-4lIF86g";

	function YoutubeService(playlistId, perPage){
		this.playlistId = playlistId;
		this.perPage = perPage || 50;
		this.initialize.apply(this, arguments);
	}
	YoutubeService.prototype = {
		currentPage: 0,
		totalPages: 0,
		pageToken: "",
		videos: [],
		initialize: initialize,
		request: request,
		getVideos: getVideos
	}

	function initialize(){
		this.request();
	}
	function request(){
		var self = this;
			
		$.getJSON("https://www.googleapis.com/youtube/v3/playlistItems", {
			key: apiKey,
			part: "snippet",
			playlistId: this.playlistId,
			maxResults: this.perPage,
			pageToken: this.pageToken
		}, function(json, textStatus){
			if(self.totalPages <= 0) self.totalPages = json.pageInfo.totalResults;
			
			self.currentPage += json.pageInfo.resultsPerPage;
			self.pageToken = json.nextPageToken;
			self.videos.push(json.items);

			self.currentPage <= self.totalPages ? self.request() : $(root).trigger("videos.loaded");
		});
	}
	function getVideos(){
		return this.videos;
	}

	return YoutubeService;

})(window);