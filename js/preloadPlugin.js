(function($) {
	var imgList = [];
	$.extend({
		preload: function(imgArr, option) {
			var setting = $.extend({
				init: function(loaded, total) {},
				loaded: function(img, loaded, total) {},
				loaded_all: function(loaded, total) {}
			}, option);
			var total = imgArr.length;
			var loaded = 0;
			
			setting.init(0, total);
			for(var i in imgArr) {
				imgList.push($("<img />")
					.attr("src", imgArr[i])
					.load(function() {
						loaded++;
						setting.loaded(this, loaded, total);
						if(loaded == total) {
							setting.loaded_all(loaded, total);
						}
					})
				);
			}
			
		}
	});
})(jQuery);


$(function() {
	
	$.preload([
		"http://farm3.static.flickr.com/2661/3792282714_90584b41d5_b.jpg",
		"http://farm2.static.flickr.com/1266/1402810863_d41f360b2e_o.jpg"
	], {
		init: function(loaded, total) {
			$("#indicator").html("Loaded: "+loaded+"/"+total);
		},
		loaded: function(img, loaded, total) {
			$("#indicator").html("Loaded: "+loaded+"/"+total);
			$("#full-screen").append(img);
		},
		loaded_all: function(loaded, total) {
			$("#indicator").html("Loaded: "+loaded+"/"+total+". Done!");
		}
	});

});