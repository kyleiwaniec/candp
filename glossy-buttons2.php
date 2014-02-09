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
  <link rel="stylesheet" href="css/styles2.css"/>
 

    <style>
        body{background-color: white;}
button, .glossy-button{
        font-family: helvetica, arial, sans-serif;
        font-size:14px;
        line-height:31px;
        height:30px;
/*        display:inline-block;*/
      
        padding-top:1px;
        padding-bottom:2px;
        
        margin-top:-1px;
        margin-bottom:1px;
        
        padding-left:10px;
        padding-right:10px;
        
        margin-left:-1px;
        margin-right:1px;
        
        color:#fff;
        cursor:pointer;

        
        background-color: #000;

        background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(rgba(255, 255, 255, 0.6)), color-stop(0.49, rgba(255, 255, 255, 0.3)), color-stop(0.51, rgba(255, 255, 255, 0.0)), to(rgba(255, 255, 255, 0.2))); /* Chrome,Safari4+ */
        background-image: -webkit-linear-gradient(top, rgba(255, 255, 255, 0.6) 0%, rgba(255, 255, 255, 0.3) 50%, rgba(255, 255, 255, 0.0) 51%, rgba(255, 255, 255, 0.2) 100%); /* Chrome10+,Safari5.1+ */
        background-image: -moz-linear-gradient(top, rgba(255, 255, 255, 0.6) 0%, rgba(255, 255, 255, 0.3) 50%, rgba(255, 255, 255, 0.0) 51%, rgba(255, 255, 255, 0.2) 100%); /* FF3.6+ */
        background-image: -o-linear-gradient(top, rgba(255, 255, 255, 0.6) 0%, rgba(255, 255, 255, 0.3) 50%, rgba(255, 255, 255, 0.0) 51%, rgba(255, 255, 255, 0.2) 100%); /* Opera11.10+ */
        background-image: linear-gradient(top, rgba(255, 255, 255, 0.6) 0%, rgba(255, 255, 255, 0.3) 50%, rgba(255, 255, 255, 0.0) 51%, rgba(255, 255, 255, 0.2) 100%); /* W3C */

/*        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ff7c9c', endColorstr='#f43764',GradientType=0 );  IE6-9 */
    
/*        -webkit-box-shadow: transparent 0px -2px 0px 0px, 
                            rgba(0, 0, 0, 0.1) 0px -1px 0px 0px, 
                            rgba(255, 255, 255, 0.05) 0px 1px 0px 0px inset, 
                            rgba(0, 0, 0, 0.1) 1px 0px 0px 0px, 
                            rgba(0, 0, 0, 0.1) -1px 0px 0px 0px, 
                            rgba(0, 0, 0, 0.1) 0px -1px 0px 0px inset, 
                            rgba(0, 0, 0, 0.1) 0px 1px 0px 0px, 
                            rgba(255, 255, 255, 0.8) 0px 2px 0px 0px;
        -moz-box-shadow:    transparent 0px -2px 0px 0px, rgba(0, 0, 0, 0.1) 0px -1px 0px 0px, rgba(255, 255, 255, 0.05) 0px 1px 0px 0px inset, rgba(0, 0, 0, 0.1) 1px 0px 0px 0px, rgba(0, 0, 0, 0.1) -1px 0px 0px 0px, rgba(0, 0, 0, 0.1) 0px -1px 0px 0px inset, rgba(0, 0, 0, 0.1) 0px 1px 0px 0px, rgba(255, 255, 255, 0.8) 0px 2px 0px 0px;
        box-shadow:         transparent 0px -2px 0px 0px, rgba(0, 0, 0, 0.1) 0px -1px 0px 0px, rgba(255, 255, 255, 0.05) 0px 1px 0px 0px inset, rgba(0, 0, 0, 0.1) 1px 0px 0px 0px, rgba(0, 0, 0, 0.1) -1px 0px 0px 0px, rgba(0, 0, 0, 0.1) 0px -1px 0px 0px inset, rgba(0, 0, 0, 0.1) 0px 1px 0px 0px, rgba(255, 255, 255, 0.8) 0px 2px 0px 0px;
      */
      
        -webkit-box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.30);
        -moz-box-shadow:    1px 1px 3px rgba(0, 0, 0, 0.30);
        box-shadow:         1px 1px 3px rgba(0, 0, 0, 0.30);         
        
        -webkit-border-radius: 7px;
        -moz-border-radius: 7px;
        -o-border-radius: 7px;
        border-radius: 7px;
        
        border: 0 !important;
        
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        -o-box-sizing: border-box; 
        box-sizing: border-box; 
        
        text-shadow:  rgba(255, 255, 255, 0.1) -1px 0, rgba(0, 0, 0, 0.3) 1px 1px;
        letter-spacing: 1px;
        text-transform: capitalize;
        
        
        
        }
        
        .pinkish{
            background-color: #Ff3366;
        }
        .lime{
            background-color: #59b606;
        }
        .blue{
            background-color: #027bbf;
        }
        .coffee{
            background-color: #832f02;
        }
        .strawberry{
            background-color: #f92020;
        }
        .dark{
            background-color: #010732;
        }
        
button:hover, .glossy-button:hover{
        background-color: #000000;
        border-color: #333333;
        
        padding-top:0;
        padding-bottom:0;
        
        margin-top:0;
        margin-bottom:0;
        
        padding-left:10px;
        padding-right:10px;
        
        margin-left:0;
        margin-right:0;
        
        
        line-height:31px;
        
    }
button:active, .glossy-button:active{
        background-color: #333333;
        border-color: #333333;
        color:#eeeeee;
       
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
<h2>Voila!</h2>
<p>buttons: <button class="pinkish">Pink</button> <button class="dark">midnight</button> <button class="lime">Lime</button> <button class="blue">blue</button> <button class="coffee">coffee</button> <button class="strawberry">strawberry</button></p>
<p>links: <a href="#" class="glossy-button">link</a> </p>
<p>&nbsp;</p>


</div
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
