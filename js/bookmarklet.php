<!DOCTYPE HTML>
<!--[if lt IE 7 ]> <html class="ie6 nojs" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7 nojs" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8 nojs" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en" class="nojs"> <!--<![endif]-->
<head>
<meta charset="UTF-8">
<title>Glossy Buttons - Easy Reusable CSS - copy &amp; paste generation</title>

<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
    		<![endif]--> 

<meta name="description" content="Glossy Buttons CSS. Easy reusable code.">
<meta name="author" content="Kyle Hamilton for C'n'P Gen">
  
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


    <style>
        body{background-color: black;}
button, .glossy-button{
        font-family: helvetica, arial, sans-serif;
        font-size:14px;
        line-height:28px;
        height:31px;
        display:inline-block;
        padding:0 10px;
        color:white;
        cursor:pointer;

        
        background-color: #Ff3366;

        background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(rgba(255, 255, 255, 0.6)), color-stop(0.49, rgba(255, 255, 255, 0.3)), color-stop(0.51, rgba(255, 255, 255, 0.0)), to(rgba(255, 255, 255, 0.2))); /* Chrome,Safari4+ */
        background-image: -webkit-linear-gradient(top, rgba(255, 255, 255, 0.6) 0%, rgba(255, 255, 255, 0.3) 50%, rgba(255, 255, 255, 0.0) 51%, rgba(255, 255, 255, 0.2) 100%); /* Chrome10+,Safari5.1+ */
        background-image: -moz-linear-gradient(top, rgba(255, 255, 255, 0.6) 0%, rgba(255, 255, 255, 0.3) 50%, rgba(255, 255, 255, 0.0) 51%, rgba(255, 255, 255, 0.2) 100%); /* FF3.6+ */
        background-image: -o-linear-gradient(top, rgba(255, 255, 255, 0.6) 0%, rgba(255, 255, 255, 0.3) 50%, rgba(255, 255, 255, 0.0) 51%, rgba(255, 255, 255, 0.2) 100%); /* Opera11.10+ */
        background-image: linear-gradient(top, rgba(255, 255, 255, 0.6) 0%, rgba(255, 255, 255, 0.3) 50%, rgba(255, 255, 255, 0.0) 51%, rgba(255, 255, 255, 0.2) 100%); /* W3C */

/*        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ff7c9c', endColorstr='#f43764',GradientType=0 );  IE6-9 */
    
/*      -webkit-box-shadow: transparent 0px -2px 0px 0px, rgba(0, 0, 0, 0.1) 0px -1px 0px 0px, rgba(255, 255, 255, 0.05) 0px 1px 0px 0px inset, rgba(0, 0, 0, 0.1) 1px 0px 0px 0px, rgba(0, 0, 0, 0.1) -1px 0px 0px 0px, rgba(0, 0, 0, 0.1) 0px -1px 0px 0px inset, rgba(0, 0, 0, 0.1) 0px 1px 0px 0px, rgba(255, 255, 255, 0.8) 0px 1px 0px 0px;
        -moz-box-shadow: transparent 0px -2px 0px 0px, rgba(0, 0, 0, 0.1) 0px -1px 0px 0px, rgba(255, 255, 255, 0.05) 0px 1px 0px 0px inset, rgba(0, 0, 0, 0.1) 1px 0px 0px 0px, rgba(0, 0, 0, 0.1) -1px 0px 0px 0px, rgba(0, 0, 0, 0.1) 0px -1px 0px 0px inset, rgba(0, 0, 0, 0.1) 0px 1px 0px 0px, rgba(255, 255, 255, 0.8) 0px 1px 0px 0px;
        box-shadow: transparent 0px -2px 0px 0px, rgba(0, 0, 0, 0.1) 0px -1px 0px 0px, rgba(255, 255, 255, 0.05) 0px 1px 0px 0px inset, rgba(0, 0, 0, 0.1) 1px 0px 0px 0px, rgba(0, 0, 0, 0.1) -1px 0px 0px 0px, rgba(0, 0, 0, 0.1) 0px -1px 0px 0px inset, rgba(0, 0, 0, 0.1) 0px 1px 0px 0px, rgba(255, 255, 255, 0.8) 0px 1px 0px 0px;
*/      
        
        -webkit-border-radius: 7px;
        -moz-border-radius: 7px;
        -o-border-radius: 7px;
        border-radius: 7px;
        
        border: 3px solid #Ff3366;
        
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        -o-box-sizing: border-box; 
        box-sizing: border-box; 
        
        text-decoration:none;
        }
button:hover, .glossy-button:hover{
        background-color: #000000;
        border-color: #333333;
    /*    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#333333', endColorstr='#000000',GradientType=0 );  IE6-9 */

    }
button:active, .glossy-button:active{
        background-color: #333333;
        border-color: #333333;
        color:#eeeeee;
    /*    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#555555', endColorstr='#222222',GradientType=0 );  IE6-9 */

    } 
    
/* for IE */    
.butleft, .butright{
        background-image:url(images/butt-bg.png);
        background-repeat: no-repeat;
        height:31px;
        float:left;
        padding:0 0 0 10px;
        display:block;
    }
.butright{
        background-position: right top;
        width:10px;
        padding:0 !important;
    }
    
   
    </style>


</head>

<body>
<?php include_once("analyticstracking.php") ?>

<div id="wrapper">

<?PHP
include_once("includes/sidebar.html");
?>
<div id="innerContent">
<h1 class="listTitle">The Send This Location Bookmarklet </h1>
<div>
<a href="javascript:location.href='mailto:?SUBJECT='+document.title+'&BODY='+escape(location.href)">Send Location</a>

<a href="javascript: var title = window.location.href; if (title.indexOf('http://www.candpgeneration.com/bookmarklet/') == 0) {
    '<head><link rel=\'shortcut icon\' href=\'favicon.ico\'></head>Bookmarklet';
} else {
    (function(){document.body.appendChild(document.createElement('script')).src='http://www.candpgeneration.com/js/bookmarklet.js';})();
}">Click Me!</a>

<br />
<a href="javascript:  var id='bm.next.'+((Math.random()*9999)|0)+'@tapper-ware.net';  window[id]='<!DOCTYPE html><html><head><title>Next</title><link rel=&quot;icon&quot; type=&quot;image/png&quot; href=&quot;http://www.tapper-ware.net/devel/js/JS.Bookmarklets/icons/next.png&quot; /></head><body></body></html>';  document.location='javascript: if(window[&quot;'+id+'&quot;]){window[&quot;'+id+'&quot;]; }else{ (function(){ var f=function(e){ return !!(/next/i).exec(e.textContent)}; var l=document.querySelectorAll(&quot;a&quot;); for(var i=0;i<l.length;i++) if(f(l[i])) document.location=l[i].href; })(); void(0); }';  void(0);">Email RTR</a>
</div>
</div><!-- #innerContent -->
</div><!-- #wrapper -->


<script src="js/jquery.tools.min.js"></script> 
<script src="js/jquery-ui-1.8.13.custom.min.js"></script> 
<script src="js/portfolio.js"></script> 
<script>
    
var ieButt =(function(){
    
    if(navigator.userAgent.search(/msie/i)!= -1) { 
        
        $("button, .glossy-button").each(function(){
            var buttonText = $(this).text();
            $(this).html("<span class='butleft'>"+buttonText+"</span><span class='butright'></span>");
            var wid = $(this).find(".butleft").innerWidth() + $(this).find(".butright").innerWidth();
            $(this).css({"background-image":"none", "border":"0", "padding":"0", "box-shadow":"none", "vertical-align": "middle", "width":wid});
        
        });
    }; 
    
})();    
    
</script>
</body>
</html>
