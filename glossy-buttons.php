<!DOCTYPE HTML>
<!--[if lt IE 7 ]> <html class="ie6 nojs" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7 nojs" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8 nojs" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en" class="nojs"> <!--<![endif]-->
<head>
<meta charset="UTF-8">
<title>Glossy Buttons - Easy Reusable CSS - copy &amp; paste generation</title>



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
        
        border: 0 !important;
        
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
<h1 class="listTitle">The Lazy Glossy Button </h1>
<div>
<p>There are some nice tools out there for making CSS gradients. Best one I know of:<br/>
Colorzilla's <a href="http://www.colorzilla.com/gradient-editor/" target="_blank">Ultimate CSS Gradient Generator</a> 
</p>

<p>
However, for a more reusable glossy button solution, here's my alternative. It means that if you want to change the color, you only change the value in one place: the background-color property.</p>

<p>
This style will work for both buttons and links, so you don't have to specify each separately.  
</p>
<h2>IE stupidity: </h2>
<p>
You can use the filter technique (commented out in the source code), but it only gives you a one dimensional gradient.<br />
<br />
And if you use border-radius (this only applies to IE9), the background, thus the gradient, extends outside the rounded corners (WTF).<br />
<br />

<div class="dropOpen"><p>So for IE, I've used a little jQuery (it's in the source) which inserts a background image on either side of the button. It has <a href="#">its limitations</a> too, but at least it looks good.</p></div>
<div class="panelContent"><div>
<p class="note">
In order to have rounded corners <em>and</em> be able to change the background-color in the stylesheet, the button image has to have the same background color around the corners as the background color of the element it's in. In this case it is black.  
</p>
</div></div>

<p>&nbsp;</p>

<h2>The CSS:</h2>
<pre>
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
}

button:active, .glossy-button:active{
        background-color: #333333;
        border-color: #333333;
        color:#eeeeee;
} 
</pre>
<p>&nbsp;</p>
<h2>Voila!</h2>
<p>some text <button>button</button> and more text</p>
<p>some text <a href="#" class="glossy-button">link</a> and more text</p>
<p>&nbsp;</p>

<p>
And for all you lazy bums, here's a <a href="http://border-radius.com/" target="_blank">border-radius CSS generator</a>, that totally rocks.
</p>

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
