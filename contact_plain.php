<!DOCTYPE HTML>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7 ]> <html class="ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
<head>
<meta charset="UTF-8">
<title>contact - graphic design and technology services - copy &amp; paste generation</title>

<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
    		<![endif]--> 

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
    <!--[if !IE]>-->
    <link media="only screen and (max-width: 480px)" href="css/mobile.css" type="text/css" rel="stylesheet">
    <link media="only screen and (max-width: 320px)" href="css/mobilevert.css" type="text/css" rel="stylesheet">
    <!--<![endif]-->





</head>

<body>
<div class="apple_overlay" id="overlay">

	<!-- the external content is loaded inside this tag -->
	<div class="contentWrap"></div>

</div>
<div id="wrapper">

<?PHP
include_once("includes/sidebar.html");
?>
<div id="innerContent">
<h1 class="listTitle"> Contact Us </h1>
<div>
<p>We're building a really nice form for your convenience, but for now just shoot us off an email: <a href="mailto:info@candpgen.com">info@candpgeneration.com</a></p>
<p>THANKS!</p>
</div>














<!-- DO NOT change ANY of the php sections -->
  <?php
$ipi = getenv("REMOTE_ADDR");
$httprefi = getenv ("HTTP_REFERER");
$httpagenti = getenv ("HTTP_USER_AGENT");
?>
    
  <input type="hidden" name="ip" value="<?php echo $ipi ?>" />
  <input type="hidden" name="httpref" value="<?php echo $httprefi ?>" />
  <input type="hidden" name="httpagent" value="<?php echo $httpagenti ?>" />

    <div id="form">
<form action="http://www.candpgeneration.com/formmail/formmail.php?<?php if (defined("SID")) echo SID; ?>" method="post" name="ContactForm" id="ContactForm">
    <input type="hidden" name="env_report" value="REMOTE_HOST,REMOTE_ADDR,HTTP_USER_AGENT,AUTH_TYPE,REMOTE_USER" />
    <input type="hidden" name="derive_fields" value="realname = FirstName + LastName, Date=%rfcdate%, arverify=imgverify"/>
    <input type="hidden" name="required" value="FirstName:First Name,LastName:Last Name,email:Email,phone:Phone Number,notes:Message" />
    <input type="hidden" name="subject" value="Contact Us" />
    <input type="hidden" name="mail_options" value="KeepLines" />
    <input type="hidden" name="bad_url" value="http://www.candpgeneration.com/fmbadhandler/fmbadhandler.php" /> 
    <input type="hidden" name="good_template" value="thankYou.php" />  
    <input type="hidden" name="bad_template" value="template.php" /> 
    <input type="hidden" name="this_form" value="http://www.candpgeneration.com/contact.php" /> 
 
  <p><a name="FormStart" id="FormStart"></a></p>
    <input type="text" name="FirstName" size="35" placeholder="First Name"/>
    <br /><br />
    <input type="text" name="LastName" size="35" placeholder="Last Name" />
    	<br /><br />
    <input type="text" name="email" size="35" placeholder="Email"/>
    <br /> <br /> 
   
    <input type="tel" name="phone" size="35" placeholder="Phone No. Incl. Area Code"/>
   
    <br /> <br />

    <textarea name="notes" rows="6" cols="40" placeholder="Your message here"></textarea>
    </p>
  

 <img src="http://www.candpgeneration.com/formmail/verifyimg.php?<?php echo SID; ?>" alt="Image verification" name="vimg" id="vimg" /><button onclick="NewVerifyImage(); return false;">Get A Different image</button><br />
<input type="text" size="12" name="imgverify" placeholder="please enter the characters above"/>
    

  <input type="hidden" name="autorespond" value="HTMLTemplate=autorespond.php, Subject=Thank you for contacting C &amp; P Gen, FromAddr=infoduhameccandpgeneration.com" />

 

<input type="submit" value="send" class="submit" />
</form>
</div><!-- end form -->






















<h4>We're based on the east coast, but we love everybody! </h4>
<canvas id="canvas" width="500" height="500">
    <em> (You can't see this really cute animation, because your browser doesn't support &lt;canvas&gt;.<br />
        For a better internet experience go <a href="http://www.google.com/chrome">download google chrome</a>)</em>
      
    </canvas>
    <script>
      
      // author: Kyle Hamilton for cnpgen.com - enjoy on your own site, but please attribute.
      
      
      
      if (/MSIE (\d+\.\d+);/.test(navigator.userAgent)){ //test for MSIE x.x;
         
         var ieversion=new Number(RegExp.$1) // capture x.x portion and store as a number
         
         if (ieversion<9){
          
            // prevent error message in IE < 9
             
        
            }else{  // start ie9
      
             heartthrob();
                 }; 
         }
         else{ // start all other browsers
         
            heartthrob();
         }; // end  browser detect
      
      
      
      
      
      
      function heartthrob(){
          
      
      
      
      
      var TWO_PI = Math.PI * 2;
      var canvas = document.getElementById("canvas");
      var c = canvas.getContext("2d");
      var throb = 1;
      var osc = 0;
	  
      setInterval(function(){
        
      c.fillStyle = "white";
      c.fillRect(0, 0, canvas.width, canvas.height);
      
      c.lineWidth = 8;
      c.lineCap = "round";
      c.lineJoin = "round";
      c.strokeStyle = "black";
      
      
      
     
        // I 
		function I(){
		c.save();
        c.beginPath();
        c.moveTo(20, 20);
        c.lineTo(40, 20);
        c.moveTo(30, 20);
        c.lineTo(30, 60);
        c.moveTo(20, 60);
        c.lineTo(40, 60);
        c.stroke();
		c.restore();
		}
		
		I();
		
		// Heart
		function Heart(){
        c.save();
        c.translate(80,40);
        c.scale(throb,throb);
        
        throb = 1 + .1 * Math.cos(osc);
        osc+= 0.25;
        
        c.beginPath();
        
        c.moveTo(0, 25);
        c.bezierCurveTo(0, 25, -28.0, 11, -28.0, -7.5);  
        c.bezierCurveTo(-28, -29.7, -5, -27.8, 0.0, -18.0);
        c.bezierCurveTo(5.0, -27.8, 28, -29.7, 28, -7.5);
        c.bezierCurveTo(28, 11, 0.0, 25, 0.0, 25);
        c.closePath();
        c.fillStyle = "#ee2d5b";
        c.fill();
        c.restore();
		}
		
		Heart();
		
        // N
        function N(){
          c.save();
          c.beginPath();
          c.moveTo(120, 20);
          c.lineTo(136, 20);
          c.lineTo(156, 60);
          c.lineTo(160, 60);
          c.lineTo(160, 20);
          c.moveTo(130, 20);
          c.lineTo(130, 60);
          c.moveTo(120, 60);
          c.lineTo(140, 60);
          c.moveTo(150, 20);
          c.lineTo(170, 20);
          c.stroke();
          c.restore();
        }
        
        N();
        
        function Y(){
          c.save();
          c.beginPath();
          c.moveTo(180, 20);
          c.lineTo(200, 20);
          c.moveTo(210, 20);
          c.lineTo(230, 20);
          c.moveTo(190, 20);
          c.lineTo(205, 45);
          c.moveTo(220, 20);
          c.lineTo(205, 45);
          c.moveTo(205, 45);
          c.lineTo(205, 60);
          c.moveTo(195, 60);
          c.lineTo(215, 60);
          c.stroke();
          c.restore();
        }
        
        Y();
      }, 30);
      
      };
      
      
    </script>
</div><!-- #innerContent -->
</div><!-- #wrapper -->


<script src="js/jquery.tools.min.js"></script> 
<script src="js/jquery-ui-1.8.13.custom.min.js"></script> 
<script src="js/jquery.imageLoader.min.js"></script>
<script src="js/portfolio.js"></script> 
<script src="js/jquery.placeholder-enhanced.js"></script>
<script>
// <![CDATA[
var nReload = 5;

function NewVerifyImage()
{
    if (nReload <= 2)
        if (nReload <= 0)
        {
            alert("Sorry, too many reloads.");
            return;
        }
        else
            alert("Only " + nReload + " more reloads are allowed");
    nReload--;

        // This code now works in both IE and FireFox
    var         e_img;

    e_img = document.getElementById("vimg");
    if (e_img)
                // FireFox attempts to "optimize" by not reloading
                // the image if the URL value doesn't actually change.
                // So, we make it change by adding a different
                // count parameter for each reload.
        e_img.setAttribute("src",e_img.src+'?count='+nReload);
}
// ]]>
</script>
</body>
</html>
