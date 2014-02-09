// JavaScript Document
$(function() {	
	$('.mac').click(function(event) {
		event.preventDefault();
	event.stopImmediatePropagation();
		var macId = '#md'+$(this).attr('id');
		var topId = '#top'+$(this).attr('id');
		$(macId).toggle(200);
		$(topId).toggleClass("site-aug-sg_row add_bg");
	});
});
$(function() {	
	$(':checkbox').change(function(){
		var idName = $(this).attr('id');
		var parts = idName.split("-");
		//alert ('The id is ' + parts.length + ' pieces');
		if (parts[0] == 'cmts'){
			
			if ( $( this ).attr( 'checked' ) ){			
				$( '.site-aug-elem_tot input:checkbox[class="parent-' + parts[1] + '"]' ).attr( 'checked', 'checked' );				
				$(".parent-" + parts[1]).each(function(){
					var macChild = $(this).attr('id');
					$( '.site-aug-el_id input:checkbox[class="parent-' + macChild + '"]' ).attr( 'checked', 'checked' );
				});
			}
			else{
				$( '.site-aug-elem_tot input:checkbox[class="parent-' + parts[1] + '"]' ).removeAttr( 'checked' );
				$(".parent-" + parts[1]).each(function(){
					var macChild = $(this).attr('id');
					$( '.site-aug-el_id input:checkbox[class="parent-' + macChild + '"]' ).removeAttr( 'checked' );
				});
			}
		}
		else{
			if ( $( this ).attr( 'checked' ) ){	
			 	$( '.site-aug-el_id input:checkbox[class="parent-' + idName + '"]' ).attr( 'checked', 'checked' );
				}
			else if(parts.length >= 3){
					var end = parts.length - 1;
					var idToUncheck = parts[0];
					for(i = 1; i < end; i++){
						idToUncheck += '-' + parts[i];
					}
					//alert ('The Id to Uncheck is ' + idToUncheck);
					$( '.site-aug-elem_tot input:checkbox[id="' + idToUncheck + '"]' ).removeAttr( 'checked' );
					var id2ToUncheck = 'cmts-' + parts[0];
				$( '.site-aug-cmts input:checkbox[id="' + id2ToUncheck + '"]' ).removeAttr( 'checked' );
				}
			else{
				$( '.site-aug-el_id input:checkbox[class="parent-' + idName + '"]' ).removeAttr( 'checked' );
				var idToUncheck = 'cmts-' + parts[0];
				$( '.site-aug-cmts input:checkbox[id="' + idToUncheck + '"]' ).removeAttr( 'checked' );
					
			}
		}
	});
});

$(function() {
	$('a.nodeList').hover(function(e) {
	
	var nodeList = $(this).attr('id');	
	var html = '<div id="site-aug-info">';
		html += '<h4>Nodes</h4>';
		html += '<p>' + nodeList + '</p>';
		html += '</div>';
		
	$('#site-aug-sg_div').append(html).children('#site-aug-info').hide().fadeIn(400);
	$('#site-aug-info').css('top', e.pageY - 80)
			  .css('left',e.pageX +40);
	
	}, function() {
		$('#site-aug-info').remove();		
	});
	
	$('a.nodeList').mousemove(function(e) {
		$('#site-aug-info').css('top', e.pageY - 80)
			  .css('left',e.pageX +40);		
	});	
});
$(function() {
	$('img.hint_img').hover(function(e) {
	var Hint = $(this).attr('id');	
	var html = '<div id="site-aug-hint">';
		html += '<p>' + Hint + '</p>';
		html += '</div>';
	
	$('#container').append(html).children('#site-aug-hint').hide().fadeIn(400);	
	$('#site-aug-hint').css('top', e.pageY -100)
			  .css('left',e.pageX +40);
	
	}, function() {
		$('#site-aug-hint').remove();		
	});
	
	$('img.hint_img').mousemove(function(e) {
		$('#site-aug-hint').css('top', e.pageY -100)
			  .css('left',e.pageX +40);		
	});	
});

$(function(){
	$('a.plan_link').mouseenter(function(e){
		var planNbr = $(this).attr('id');
		
		$.ajax({
            type: 'post',
            url: 'aug_plan.php',
            data: 'plan=' + planNbr + '&type=element',	
			success: function(text) {
				var sap = $("<div/>",{
                   id: "site-aug-plan",
                   html: text,
				   css:{"position":"absolute", 'width':'450px', display:"none", 'top': e.pageY -100, 'left': e.pageX +40}
               });
               $('#content').append(sap);
               sap.fadeIn(400);
			   return false;
			}
		});
								
	}).mouseleave(function() {
		 $('#site-aug-plan').remove();
        });	
			
	$('a.plan_link').mousemove(function(e) {
		$('#site-aug-plan').css({'top': e.pageY -100, 'left': e.pageX +40});				
	});	
});

$('#content').click(function() {
	$('#site-aug-plan').remove();
        });	

$(function() {
    $('#blimit').on('change', function(event) {
        $('#utilLimit').submit();
    });
});

