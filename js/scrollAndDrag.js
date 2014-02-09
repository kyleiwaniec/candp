$(function() {

$("#chained").scrollable({easing: 'swing', circular: true}).navigator().autoscroll({
	interval: 5000		
});	

$(document).disableSelection();


$(".items div").live('mouseenter', function(){


    var offsetY = $(".items").offset();
    var offsetX = $(this).offset();
    var xpos = offsetX.left;
    var ypos = offsetY.top;

    var x1 = xpos, x2 = xpos;
     
    var y2 = ypos;
    var y1 = ypos-(($(this).children("img").height())-600);
 
    //alert(y1);
     
    $(this).draggable({ cursor: 'move', scroll: false, containment: [x1, y1, x2, y2] /*  axis: 'y' */});
    
});
$(".items").css({"left":"-967px"}); // dirty fix for an unexplained bug
});

