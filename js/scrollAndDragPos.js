$(function() {

$("#chained").scrollable({easing: 'swing', circular: true}).navigator().autoscroll({
	interval: 3000		
});	

$(".items").disableSelection();


$(".items div").live('mouseenter', function(){


    var position = $(this).position();
    var xpos = position.left;
    var ypos = position.top;
    //var ypos = 115;

    var x1 = xpos, x2 = xpos;
     
    var y2 = ypos;
    var y1 = ypos-(($(this).children("img").height())-600);
 
    //alert(y1);
     
    $(this).draggable({ cursor: 'move', scroll: false, containment: [x1, y1, x2, y2] /*  axis: 'y' */});
    
});

});

