<!DOCTYPE HTML>
<!--[if lt IE 7 ]> <html class="ie6 nojs" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7 nojs" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8 nojs" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en" class="nojs"> <!--<![endif]-->
<head>
    
<meta charset="UTF-8">
<title>copy &amp; paste generation</title>

<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
    		<![endif]--> 

<meta name="description" content="Graphic design and web development">
<meta name="author" content="C &amp; P Generation, LLC">
<!--<link rel="stylesheet" href="css/jquery.mobile-1.0a1.min.css"/>-->
<link rel="stylesheet" href="css/styles2.css"/>

<!--<script src="http://code.jquery.com/jquery-1.6.1.min.js"></script> -->
<script src="js/jquery.tools.min.js"></script> 
<script src="js/jquery-ui-1.8.13.custom.min.js"></script> 

<link rel="stylesheet" href="js/jQuery.jPlayer.2.0.0/jplayer.css"/>
<script type="text/javascript" src="js/jQuery.jPlayer.2.0.0/jquery.jplayer.min.js"></script>

<script src="js/raphael.js"></script>
<script src="js/circlesMobile.js"></script> 
<script src="js/portfolio.js"></script> 
<script>
$(function(){

    $("#jquery_jplayer_1").jPlayer({
        ready: function () {
          $(this).jPlayer("setMedia", {
            m4a: "/sounds/giggle.m4a",
            oga: "/sounds/giggle.ogg"
          });
        },
        swfPath: "/js/jQuery.jPlayer.2.0.0",
        supplied: "m4a, oga"
      });
      
   
});
</script>
  
  <!-- Mobile -->
<meta name="viewport" content="width=device-width; initial-scale=.45; maximum-scale=.45;" /> 
<meta name="apple-mobile-web-app-capable" content="yes" /> 
<meta name="apple-mobile-web-app-status-bar-style" content="black" /> 
<link rel="apple-touch-startup-image" href="/startup.png">
    


 

</head>

<body>
<?php include_once("analyticstracking.php") ?>
<div id="circles"></div>
<?PHP
  include_once("includes/sidebar.html");
?>
<div id="content" class="offset">

<div id="logo"></div>

<h1 style="margin:0 0 25px 0; padding:0;">design meets technology</h1>

<div id="littlePeople">
    <a href="http://candpgeneration.com/arty-farty/pretty2.html" title="The worm is for you ([+_+])"><div class="littlePeopleImg"></div></a>
<div id="jquery_jplayer_1" class="jp-jplayer"></div>
  <div class="jp-audio" >
    <div class="jp-type-single">
      <div id="jp_interface_1" class="jp-interface">
        <ul class="jp-controls">
        <li><a href="#" class="jp-play" ></a></li>
        <li><a href="#" class="jp-pause" ></a></li>
        </ul>
      </div><!-- jp_interface_1 -->
     </div><!-- jp-type-single -->
    </div><!-- jp-audio" -->
</div><!-- littlePeople -->

       
       
</div><!-- content -->





</body>
</html>
