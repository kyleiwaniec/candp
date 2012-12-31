<!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 ie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 ie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 ie" lang="en"> <![endif]-->
<!--[if IE 9 ]>   <html class="no-js ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <title>Rise and Shine!</title>
        <meta charset="UTF-8">
        <script>
           
            var sunrise = function(){
            
                var sunInterval;
                var sun = document.getElementById("sun");
            
                var ypos = sun.offsetTop, xpos = sun.offsetLeft;
            
            
                var x = ypos, y = xpos, a, b, o = 0, i = 0;
            
                function rise(){
                    
                    if(ypos > 0){
                        a = Math.pow(y, 1/4);
                        b = Math.pow(x, 1/100)
                        ypos -= a;
                        xpos -= b;
                    }else{
                        clearInterval(sunInterval);
                    }
                    if(xpos < 0){
                        clearInterval(sunInterval);
                    }
                    y /= 1.038;
                    x /= 1.05;
                    
                    sun.style.top = ypos +"px";
                    sun.style.right = xpos +"px";
                    
                    o += .01;
                    sun.style.opacity = o;
                };
            
                sunInterval = setInterval(function(){
                    rise();
                    //console.log(xpos);
                }, 20);
            
            
            
            };
        
        
            
            window.onload = sunrise;
        
        </script>
        <link rel="stylesheet" href="main-styles.css"/>
        <style>
            #sun{
                height: 200px;
                width:200px;
                position:absolute;
                bottom:0;
                right:0;
                opacity:0;
                /*      background-color:#ed9017;*/
                background: -moz-radial-gradient(center, ellipse cover,  rgba(255,255,255,1) 11%, rgba(247,183,34,0.89) 33%, rgba(247,180,24,0.89) 34%, rgba(247,84,24,1) 56%);
                background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(11%,rgba(255,255,255,1)), color-stop(33%,rgba(247,183,34,0.89)), color-stop(34%,rgba(247,180,24,0.89)), color-stop(56%,rgba(247,84,24,1)));
                background: -webkit-radial-gradient(center, ellipse cover,  rgba(255,255,255,1) 11%,rgba(247,183,34,0.89) 33%,rgba(247,180,24,0.89) 34%,rgba(247,84,24,1) 56%);
                background: -o-radial-gradient(center, ellipse cover,  rgba(255,255,255,1) 11%,rgba(247,183,34,0.89) 33%,rgba(247,180,24,0.89) 34%,rgba(247,84,24,1) 56%);
/*                background: -ms-radial-gradient(center, ellipse cover,  rgba(255,255,255,1) 11%,rgba(247,183,34,0.89) 33%,rgba(247,180,24,0.89) 34%,rgba(247,84,24,1) 56%);*/
                background: radial-gradient(ellipse at center,  rgba(255,255,255,1) 11%,rgba(247,183,34,0.89) 33%,rgba(247,180,24,0.89) 34%,rgba(247,84,24,1) 56%);
            }
            html{background: #F75418; height:100%;}
            .ie #sun, .ie9 #sun{background: url(../EE/images/sun.png) no-repeat;}

        </style>
    </head>
    <body><?php include_once("analyticstracking.php") ?>

        <div class="wrapper">
        <div id="sun"></div>
<?php

require_once ("sandbox-footer.php");
?>