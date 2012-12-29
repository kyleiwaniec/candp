<?php
$title = "Raphael.js - Animated Pie Chart";
require_once ("sandbox-header.php");
?>
<style>

            
        </style>
        <script src="../js/raphael-1.5.2-min.js"></script>

        <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
        
        <script>
Raphael.fn.drawGrid = function (x, y, w, h, wv, hv, color) {
    color = color || "#000";
    var path = ["M", Math.round(x) + .5, Math.round(y) + .5, "L", Math.round(x + w) + .5, Math.round(y) + .5, Math.round(x + w) + .5, Math.round(y + h) + .5, Math.round(x) + .5, Math.round(y + h) + .5, Math.round(x) + .5, Math.round(y) + .5],
        rowHeight = h / hv,
        columnWidth = w / wv;
    for (var i = 1; i < hv; i++) {
        path = path.concat(["M", Math.round(x) + .5, Math.round(y + i * rowHeight) + .5, "H", Math.round(x + w) + .5]);
    }
    for (i = 1; i < wv; i++) {
        path = path.concat(["M", Math.round(x + i * columnWidth) + .5, Math.round(y) + .5, "V", Math.round(y + h) + .5]);
    }
    return this.path(path.join(",")).attr({stroke: color});
};

$(function(){
	  
       
var raph = (function(){
            
        
      
        
        
        
	var width = 600;
	var height = 600;
	var r = new Raphael("graph",width,height);

	r.rect(60,0,width,height).attr({fill: '#eeeeee', stroke: '#9cf', 'stroke': 'none'});

	r.drawGrid(0, 0, width, height, 10, 10, "#000");

})(); //end raph


});

        </script>
        
        
        
        
        
<div id="graph" width="600"></div>
<?php

require_once ("sandbox-footer.php");
?>

