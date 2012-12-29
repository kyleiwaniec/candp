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

  <link rel="stylesheet" href="css/jquery.mobile-1.0a1-candp.css" /> 
  <script src="http://code.jquery.com/jquery-1.4.3.min.js"></script> 
  <?PHP
require_once("Mobile_Detect.php");
$detect = new Mobile_Detect();

if ($detect->isMobile()) {
    echo ('<script src="js/jquery.mobile-1.0a1.min.js"></script>');
}
?>
  
</head> 
<body> 
 <div id="circles"></div>
<div data-role="page" id="home"> 
 
  <div data-role="header"> 
    <h1>Home</h1> 
  </div> 
 
  <div data-role="content"> 
    <p><a href="#about" data-role="button">About this app</a></p>    
  </div> 
 
</div> 
 
<div data-role="page" id="about"> 
 
  <div data-role="header"> 
    <h1>About This App</h1> 
  </div> 
 
  <div data-role="content"> 
    <p>This app rocks!</p> 
    <a href="#home" data-role="button">Go home</a> 
  </div> 
 
</div> 
 <script src="js/raphael.js"></script>
<script src="js/circlesMobile.js"></script> 

</body> 
</html> 