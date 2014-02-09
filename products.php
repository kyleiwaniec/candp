<!DOCTYPE HTML>
<!--[if lt IE 7 ]> <html class="ie6 nojs" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7 nojs" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8 nojs" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en" class="nojs"> <!--<![endif]-->
<head>
<meta charset="UTF-8">
<title>products - graphic design and technology services - copy &amp; paste generation</title>


<meta name="description" content="">
<meta name="author" content="">
  
 <!-- Mobile -->
 <meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1; user-scalable=0;" /> 
    <meta name="apple-mobile-web-app-capable" content="yes" /> 
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" /> 
    <link rel="apple-touch-startup-image" href="/startup.png">
    
    
    <link rel="stylesheet" type="text/css" href="css/overlay-apple.css"/>
    <link rel="stylesheet" href="css/scrollable.css"/>
    <link rel="stylesheet" href="css/styles2.css"/>
   

</head>

<body>
<?php include_once("analyticstracking.php") ?>
<div class="apple_overlay" id="overlay">

	<!-- the external content is loaded inside this tag -->
	<div class="contentWrap"></div>

</div>
<div id="wrapper">

<?PHP
include_once("includes/sidebar.html");
?>
<div id="innerContent">
<h1 class="listTitle"> Products </h1>
<div class="expPanels">

    <h3><img src="resizer-icon.jpg" alt=""/> Image Resizer App for Mac OS X</h3>
<div  class="panelContent">
    <div>
        <p>Ever wanted to really quickly resize a whole bunch of images  in one go, without having to open up a huge image editing application? </p>
        <h4 style="font-weight:bold;">
           Then Resizer is for you! Download > Unzip > Enjoy!
        </h4>
        
        <div style="float:left;">
        <img src="resizer.jpg" alt="Image Resize App" style="padding-right:20px;"/> 
        </div>
        <div style="float:left; width:40%">
        <p style="font-style:italic; margin-top:15px;">Made in JAVA, and bundled up for OS X, with the assistance of our friends at <a href="http://www.technojeeves.com">TechnoJeeves</a><br/><br/>
        <button id="resizer" ><a href="Resizer.app.zip" style="color:white; text-decoration: none; font-weight:bold;">Download Resizer</a></button>
        </p>
       
        
        </div>
           <br clear="all"/>
        <img src="resizer-screenshot.jpg" alt="Image Resize App" style="padding-right:20px;"/>  
        <p>&nbsp;</p>
    </div>
</div>
    
    
<h3><img src="images/RWTlogo.png" alt="REALWalkthru" /></h3>
<div  class="panelContent">
    <div>
<p>By combining our REDi and REALTOUR technology, C&amp;P GEN deliver a high end imaging solution for the Real Estate industry called REALWalkthru.</p>
<p>The objective of REALWalkthru is to offer clients superior Online Presence through the use of both web development and photo-imaging software. This was achieved by developing a specialized approach to taking photographs – we call Real Estate Dedicated Imaging or ‘ReDI’.
</p><p>
THE 1ST PART OF THE PROCESS requires specialist equipment for the camera, allowing a photographer to take a series of photographs that are then processed in photo-editing software and yield; ‘SuperShots’. These are images that essentially show off an entire room in close to standard format, with a minimum of distortion. The result is that the viewer has an entirely different experience than would occur were the same image achieved using a standard camera. Now, instead of a ‘cropped’ view of the room limiting the viewer to a narrow view, the whole room comes in to perspective.
</p><p>
THE 2ND PART OF THE PROCESS takes the viewer into an entirely different dynamic – Real Time Viewer Animation. Here, 360° views of each room captured using a similar process to that mentioned above are combined and then imported into a Flash movie generator producing a unique ‘Walkthru’ for each entire property - the viewer literally wanders through the property online from the comfort of their own home, using nothing more than their computer and a mouse.</p>
</p>
<p><a href="http://www.realwalkthru.com">For details, please visit our REALWalkthru.com website.</a><br /><br />
<!--    <a href="http://www.realwalkthru.com"><img src="images/RWTlogo.png" alt="REALWalkthru" />-->
    </a></p>
    </div>
</div>
</div><!-- #expPanels -->
</div><!-- #innerContent -->
</div><!-- #wrapper -->



<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="js/portfolio.js"></script> 
<?php
        echo "<script>
            \$('#resizer').click(function(e){
                e.preventDefault();
                var ip = '"; echo $_SERVER['REMOTE_ADDR']; echo "';
                var date = new Date();
                date = date.toUTCString();
                var usrAgent = navigator.userAgent;
                    $.ajax({
                      type: 'POST',
                      url: '/request.php',
                      data: {ip : ip, date : date, usrAgent : usrAgent},
                      error : function(error){console.log(error)}
                    });
                });
                </script>";
?>
</body>
</html>
