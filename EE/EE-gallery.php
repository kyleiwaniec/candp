<!DOCTYPE HTML>
<!--[if lt IE 7 ]> <html class="ie6 nojs" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7 nojs" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8 nojs" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en" class="nojs"> <!--<![endif]-->
<head>
<meta charset="UTF-8">
<title>about us - graphic design and technology services - copy &amp; paste generation</title>

<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
    		<![endif]--> 

<meta name="description" content="">
<meta name="author" content="">
  
    


<style>
body, html{margin:0; padding: 0;}
   
#bg { float: left; width: 100%;  clear: both; position:relative;}
#bg img { position:relative; top:0; left:0; width: 100%; display:block; overflow: hidden;}


ul {
   margin: 0;
   padding: 0;
   list-style-position: inside; 
}
ul li {
   font: normal 12px arial, helvetica, sans-serif;
   display:block;
   float:left;
   padding:5px;
   background-color:red;
}


</style>

<!--[if gte mso 9]>
<style>
ul {
   margin: 0 0 0 24px;
   padding: 0;
   list-style-position: inside;
}
</style>
<![endif]-->
</head>

<body>

<div id="wrapper">
 <div style="text-align: center; width:100%;">
    <ul ><li>
            hi there
        </li>
        <li>
            hi where
        </li>
        <li>
            hi overthere<br/>
            and overthere
        </li>
    </ul>
        <div>
<div id="bg">
<img class="stretch" src="images/portfolio/pg_projects_fl.jpg" />
<img class="stretch" src="images/portfolio/pg_objects_fl.jpg" />
<img class="stretch" src="images/portfolio/pg_mobile_fl.jpg" />
</div>
   
</div><!-- #wrapper -->


<script src="js/jquery.tools.min.js"></script> 
<script src="js/jquery-ui-1.8.13.custom.min.js"></script> 
<script src="js/jquery.imageLoader.min.js"></script>
<script src="js/portfolio.js"></script> 

<script>
$(function(){
 
  var w = $(window).width();
  $("img").width(w-25); // accomodate scrollbars
    
  $(window).resize(function() {
    var w = $(window).width();
    $("img").width(w-25);
    });
    
  
  $('#bg img:gt(0)').css({opacity:0});
    setInterval(function(){
      $('#bg :first-child').animate({opacity:0}, {duration:2000, queue: false})
      .next('img').css({"position":"absolute"}).animate({opacity: 1}, 2000, function(){
         $('#bg :first-child').css({"opacity":"0", "position":"relative"}).appendTo('#bg'); 
         //alert("done!");
      });
      }, 3000);
      
      
 });
</script>

</body>
</html>
