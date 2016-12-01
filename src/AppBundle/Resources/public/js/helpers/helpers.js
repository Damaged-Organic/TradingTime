var app = app || {};

app.Helpers = (function($, root){

	Handlebars.registerHelper("groupBy", function(every, context, options){
		var out = "", subcontext = [], i;

		if(context.length > 0){
			for(i = 0; i < context.length; i++){
				if(i > 0 && i % every === 0){
					out += options.fn(subcontext);
					subcontext = [];
				}
				subcontext.push(context[i]);
			}
			out += options.fn(subcontext);
		}
		return out;
	});

	Array.prototype.floorDimension = function(){
		var tmp = [], subArray = [], i, j;

		for(i in this){
			subArray = this[i];
			for(j in subArray){
				if(typeof(subArray[j]) === "object"){
					tmp.push(subArray[j]);
				}
			}
		}
		return tmp;
	}

})(jQuery, window);