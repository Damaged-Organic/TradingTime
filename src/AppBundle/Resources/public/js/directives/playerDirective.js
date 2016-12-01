var app = app || {};

app.PlayerDirective = (function(root){
	
	function PlayerDirective(videoId){
		this.videoId = videoId || "";
		this.initialize.apply(this, arguments);
	}
	PlayerDirective.prototype = {
		player: "",
		initialize: initialize,
		setupPlayer: setupPlayer,
		getPlayer: getPlayer
	}

	function initialize(){
		this.setupPlayer();
	}
	function setupPlayer(){
		if(!this.videoId.length) return;
		this.player = "<iframe type='text/html' src='http://www.youtube.com/embed/"+ this.videoId +"?autoplay=0' frameborder='0' allowfullscreen></iframe>";
	}
	function getPlayer(){
		return this.player;
	}

	return PlayerDirective;

})(window);