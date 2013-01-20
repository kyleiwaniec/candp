$(document).ready(function(){

	var image_index = 0;
	var images = collect_images();

	console.log(images);

	function collect_images(){
		var images = new Array();
		$('.flip-images img').each(function(){
			images.push($(this).attr('src'));
			$(this).remove();
		});
		return images;
	}

	function place_images(){
		
		var next_image_index = image_index+1;

		if(next_image_index==images.length){
			next_image_index = 0;
		}

		var front_image = "<img src='"+images[image_index]+"'>";
		var back_image = "<img src='"+images[next_image_index]+"'>";


		$('.back-image-top').html("").append(front_image);
		$('.back-image-bottom').html("").append(front_image);

		$('.front-image-top').html("").append(back_image);
		$('.front-image-bottom').html("").append(back_image);
	}


		$('.flip-images').append("<div class='flip-container'>\
								<div class='flip-top'>\
									<div class='shadow-top-front'></div>\
									<div class='front-image-top'></div>\
									<div class='back-image-bottom'></div>\
									<div class='shadow-top-back'></div>\
							    </div>\
							    <div class='back-image-top'></div>\
								<div class='flip-bottom'>\
									<div class='shadow-bottom'></div>\
									<div class='front-image-bottom'></div>\
								</div>\
							  </div>");

		place_images(image_index);

		$('#flip-one-more').click(function(){
			
			flip_container = $('.flip-container');
	        	new_flip_container = flip_container.clone(true);
	        	flip_container.before(new_flip_container);
	        	$("." + flip_container.attr("class") + ":last").remove();
			
			place_images();

			$('.flip-top').addClass('flip');
			$('.shadow-top-front').addClass('shadow-top-front-animate');
			$('.shadow-top-back').addClass('shadow-top-back-animate');
			$('.shadow-bottom').addClass('shadow-bottom-animate');

			image_index++;
			if(image_index==images.length){
				image_index = 0;
			}

			return false;
		});

});