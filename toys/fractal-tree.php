<?php

$title = "Fractal Tree";
require_once ("sandbox-header.php");
?>
<style>
   
    body{
        background:url(../arty-farty/landscape.jpg) right top no-repeat #000;
        margin:0;
        padding:0;
    }
    #canvas{
        position:absolute;
        width:800px;
        height:600px;
        right:0;
        
    }
    
    #reload{
        position:absolute;
        top:15px;
        left:15px;
        cursor:pointer;
    }
    
</style>
<script src="fractal.js"></script>
<script>
    
    $(function(){
                    $("#reload").click(function(){
                      //window.location.reload();
                      context.clearRect (0,0,canvas.width,canvas.height);
                      opacity = 1;
                      drawBranches(canvas.width / 2, canvas.height, 22, 0);
                    }); 
                    
                        var opacity = 1;
			function drawBranches(startX, startY, trunkWidth, level){
                            canvas = document.getElementById("canvas");
                            context = canvas.getContext("2d");
                            //opacity = Math.cos(opacity);
                            //opacity = Math.random();
                            opacity = opacity * .9999;
                          
                           // setInterval(function(){
                            if (level < 12) {
                                
                               var changeX = 100 / (level + 1);
                                var changeY = 200 / (level + 1);

                                var topRightX = startX + Math.random() * changeX;
                                var topRightY = startY - Math.random() * changeY;

                                var topLeftX = startX - Math.random() * changeX;
                                var topLeftY = startY - Math.random() * changeY;
                                
                                
                                // draw right branch
                                context.beginPath();
                                context.moveTo(startX + trunkWidth / 4, startY);
                                context.quadraticCurveTo(startX + trunkWidth / 4, startY - trunkWidth, topRightX, topRightY);
                                context.lineWidth = trunkWidth;
                                context.lineCap = "round";
                                context.strokeStyle = "rgba(0,0,0,"+opacity+")";
                                context.stroke();

                                // draw left branch
                                context.beginPath();
                                context.moveTo(startX - trunkWidth / 4, startY);
                                context.quadraticCurveTo(startX - trunkWidth / 4, startY -
                                trunkWidth, topLeftX, topLeftY);
                                context.lineWidth = trunkWidth;
                                context.lineCap = "round";
                                context.strokeStyle = "rgba(0,0,0,"+opacity+")";
                                context.stroke();
                                
                            
                                drawBranches(topRightX, topRightY, trunkWidth * 0.7, level + 1);
                                drawBranches(topLeftX, topLeftY, trunkWidth * 0.7, level + 1);
                            
                             //  
                            
                            }
                           // }, 30);
                        }

    drawBranches(canvas.width / 2, canvas.height, 12, 0);
    

                        
		});
</script>

    <button id="reload">Draw a different tree</button>
    
<canvas id="canvas" width="800" height="800">
    <em> (You can't see this animation, because your browser doesn't support &lt;canvas&gt;.<br />
        For a better internet experience go <a href="http://www.google.com/chrome">download google chrome</a>)</em>
      
    </canvas>


<?php

require_once ("sandbox-footer.php");
?>
