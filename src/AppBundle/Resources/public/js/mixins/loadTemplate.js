var app = app || {};

app.loadTemplate = (function($, root){

	var loadTemplate = {
		getTemplate: getTemplate
	}

	function getTemplate(path, callback){
		$.get(path, function(tpl){
			callback(Handlebars.compile(tpl));
		});	
	}

	return loadTemplate;

})(jQuery, window);