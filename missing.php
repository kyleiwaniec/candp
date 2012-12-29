<!DOCTYPE HTML>
<!--[if lt IE 7 ]> <html class="ie6 nojs" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7 nojs" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8 nojs" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en" class="nojs"> <!--<![endif]-->
<head>
<meta charset="UTF-8">
<title>copy &amp; paste generation - 404 Error</title>


<meta name="description" content="">
<meta name="author" content="">
  
 <!-- Mobile -->
 <meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1; user-scalable=0;" /> 
    <meta name="apple-mobile-web-app-capable" content="yes" /> 
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" /> 
    <link rel="apple-touch-startup-image" href="/startup.png">
    
    <link rel="stylesheet" href="/js/jQuery.jPlayer.2.0.0/jplayer.css"/>

    <link rel="stylesheet" href="/css/overlay-apple.css"/>
    <link rel="stylesheet" href="/css/scrollable.css"/>
    <link rel="stylesheet" href="/css/styles2.css"/>
   
</head>

<body>

<div id="wrapper">

<?PHP
include_once("./includes/sidebar.html");
?>
<div id="content">
<p>&nbsp;</p>
<p>&nbsp;</p>
<h1>404 Error</h1>
<p>That means the file you're looking for could not be found - Well that's hairy...</p>
<p>&nbsp;</p>
<div id="littlePeople">
<div class="littlePeopleImg"></div> 
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

</div><!-- #content -->
</div><!-- #wrapper -->


<script src="/js/jquery.tools.min.js"></script> 
<script src="/js/jquery-ui-1.8.13.custom.min.js"></script> 
<script src="/js/jquery.imageLoader.min.js"></script>
<script src="/js/portfolio.js"></script> 
<script src="/js/jQuery.jPlayer.2.0.0/jquery.jplayer.min.js"></script>

<script>
$(function(){
        
       
	   // icons animate
	    $("#chrome_clr, #safari_clr, #firefox_clr").css({"opacity":0});
	   $("#chrome_clr, #safari_clr, #firefox_clr").mouseenter(function(){
            $(this).animate({"opacity": 1});
			}).mouseleave(function(){
				$(this).stop().animate({"opacity":0});
			  });
		    // end icons animate
	   
    
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

</body>
</html>
