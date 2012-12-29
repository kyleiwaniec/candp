<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
.pages {
-moz-border-radius: 5px;
-webkit-border-radius: 5px;
-o-border-radius: 5px;
-ms-border-radius: 5px;
-khtml-border-radius: 5px;
border-radius: 5px;
border: 1px solid #222;
<!--position: absolute;-->
width: 850px;
<!--left: 200px;
right: 200px;-->
margin: 110px auto;
padding: 2em 5em;
background: url('img/rgba-30.png');
background: rgba(0, 0, 0, 0.3);
color: #EEE;
font-family: Georgia, Palatino, "Palatino Linotype", Times, "Times New Roman", serif;
font-size: 1.2em;
border-image: initial;
}


<script>
    
        var scrollInt;
        
        var winw = $(window).width();
        var container = $(".jspContainer").width();
        
        var speed = 1000; // the higher the number the slower the speed
        
        var boxw = $("#scrollbox").width();
        var inc1 = boxw/speed;
        
        var barw = $(".jspTrack").width();
        var inc2 = barw/speed;
        
        var pane = $(".jspPane");
        var drag = $(".jspDrag");
        
        var max = -boxw+container;

$("#left").mouseenter(function(){
        
        //console.log($(".jspPane").position().left + " - " + $(".jspPane").width());
        scrollInt = setInterval(function(){
        if (pane.position().left < 0) {
            
            pane.css({"left": "+="+inc1+"px"});
            drag.css({"left": "-="+inc2+"px"}); // the scrollbar
        }else{
            //console.log(pane.position().left);
            clearInterval(scrollInt);

            }
        }, 30);
    }).mouseleave(function(){
        clearInterval(scrollInt);
    });
    
$("#right").mouseenter(function(){
    
        //console.log(pane.position().left + " :: " + max);
        
        scrollInt = setInterval(function(){
            if (pane.position().left > max){
        
                pane.css({"left": "-="+inc1+"px"});
                drag.css({"left": "+="+inc2+"px"}); // the scrollbar

            }else{
                //console.log(pane.position().left);
                clearInterval(scrollInt);
            }
        }, 30);
        
        
        }).mouseleave(function(){
            clearInterval(scrollInt);
        });
    
 
    
</script>

<!-- old script -->

<script>
        var boxw = $("#scrollbox").width();
        var inc1 = boxw/10;
        
        var barw = $(".jspTrack").width();
        var inc2 = barw/10;
        
        var pane = $(".jspPane");
        var drag = $(".jspDrag");


$("#left").click(function(){
        
        //alert($(".jspPane").position().left + " - " + $(".jspPane").width());
        
        if (pane.position().left < 0) {
            
            pane.animate({"left": "+="+inc1+"px"}, "fast");
            drag.animate({"left": "-="+inc2+"px"}, "fast"); // the scrollbar
        }
    });
    
$("#right").click(function(){
    
        //alert(pane.position().left + " - " + w);
       
        if (pane.position().left > -boxw) {
        
            pane.animate({"left": "-="+inc1+"px"}, "fast");
            drag.animate({"left": "+="+inc2+"px"}, "fast"); // the scrollbar

            }
    });
</script>