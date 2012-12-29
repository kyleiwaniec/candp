<!DOCTYPE HTML>
<!--[if lt IE 7 ]> <html class="ie6 nojs" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7 nojs" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8 nojs" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en" class="nojs"> <!--<![endif]-->
<head>
<meta charset="UTF-8">
<title>Modal Window: jQuery - copy &amp; paste generation</title>

<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
    		<![endif]--> 

<meta name="description" content="Modal Window - jQuery">
<meta name="author" content="Kyle Hamilton">
  
 


<style>
/* Z-index of #mask must be lower than #boxes .window */
#mask {
  position:absolute;
  z-index:9000;
  background-color:#000;
  display:none;
  top:0;
  left:0;
}
   
#boxes .window {
  position:absolute;
  width:440px;
  height:200px;
  display:none;
  z-index:9999;
  padding:20px;
}
 
 
/* Customize your modal window here, you can add background image too */
#boxes #dialog {
  width:375px; 
  height:203px;
  background-color: white;
}
</style>


</head>

<body>


<h1 class="listTitle"> Modal window </h1>

<!-- #dialog is the id of a DIV defined in the code below -->
<a href="images/apple-touch-icon.png" name="modal">Click To Open Modal Window</a>
 
<div id="boxes">
 
     
    <!-- #customize your modal window here 
 
    <div id="dialog" class="window">
        <b>Modal Window</b> | 
        
        
        <a href="#" class="close">Close it</a>
        
        <div> data from sql server 
        <a href=>city</a>
        <a href=>city 2</a>....</div>
 
    </div>
 
     -->
    
</div>

<!-- Do not remove div#mask, because you'll need it to fill the whole screen --> 
<div id="mask"></div>

<!-- must include jquery library above script -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script> 
<script>

$(function() {  
 
    //select all the a tag with name equal to modal
    $('a[name=modal]').click(function(e) {
        //Cancel the link behavior
        e.preventDefault();
        //Get the A tag
        var id = $(this).attr('href');
     
        
        function modWin(){
            var maskHeight = $(document).height();
            var maskWidth = $(window).width();
            $('#mask').css({'width':maskWidth,'height':maskHeight});
            
            //Get the window height and width
            var winH = $(window).height();
            var winW = $(window).width();

            //Set the popup window to center
            $(id).css('top',  winH/2-$(id).height()/2);
            $(id).css('left', winW/2-$(id).width()/2);
        };
        
        modWin();
         
        $(window).resize(modWin); 
         
        //transition effect     
        $('#mask').fadeIn(1000);    
        $('#mask').fadeTo("slow",0.8);  
     
        //transition effect
        $(id).fadeIn(2000); 
     
    });
     
    //if close button is clicked
    $('.window .close').click(function (e) {
        //Cancel the link behavior
        e.preventDefault();
        $('#mask, .window').hide();
    });     
     
    //if mask is clicked
    $('#mask').click(function () {
        $(this).hide();
        $('.window').hide();
    });         
     
});
</script>


</body>
</html>
