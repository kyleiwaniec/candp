<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE HTML>
<!--[if lt IE 7 ]> <html class="ie6 nojs" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7 nojs" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8 nojs" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en" class="nojs"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8">
        <title>preload on click - copy &amp; paste generation</title>

        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
            <script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
    		<![endif]--> 

        <meta name="description" content="jQuery rollover animation effect, including image preloading php script.">
        <meta name="author" content="Kyle Hamilton">
        
        <style type="text/css" media="screen">
div#loader {    /* image container */
width: 800px;
height: 600px;
border: 1px solid gray;
overflow: hidden;
}
div#loader.loading {    /* loading anim gif */
background: url(images/loading.gif) no-repeat center center;
}
</style>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript">
$(function() {
    
 var prodimages =[[
                    "http://2black.files.wordpress.com/2007/08/digital_photos_of_nature.jpg",
                    "http://3.bp.blogspot.com/-DDVlCy7Zilw/Ti_my1gTuKI/AAAAAAAACX8/WDzdYY-3nHA/s1600/pictures+of+nature-2.jpg",
                    "http://2black.files.wordpress.com/2007/08/digital_photos_of_nature-1.jpg"
                    ],[
                    "http://3.bp.blogspot.com/-DDVlCy7Zilw/Ti_my1gTuKI/AAAAAAAACX8/WDzdYY-3nHA/s1600/pictures+of+nature-2.jpg",
                    "http://www.imagegossips.com/wp-content/uploads/2011/01/552506858fotocollection.jpg",
                    "http://3.bp.blogspot.com/-GH9TdpVL2K8/Ti_mzvovHaI/AAAAAAAACYA/lhMHgy4Qm1U/s1600/pictures+of+nature-3.jpg"
                ]];   
    
    
$("#loader").click(function(){
    $('#loader').addClass('loading');
    var img = new Image();
    
    var images = [];
    
    var len = prodimages[0].length;
    
    for (var i = 0; i < len; i++ ) {
         images.push(prodimages[0][i]);
        };
			
    var max = images.length;
    
    
    
        $(img).load(function() {    // when image has loaded...
            $(this).css('display', 'none'); // hide image by default
            $('#loader').removeClass('loading').append(this);   // remove 'div#loader.loading' class (loading anim gif), then insert our image in 'loader' div
            $(this).fadeIn('slow'); // fade image in
            }).attr('src', prodimages[0][0]);
        
   
  
    }).mouseleave(function(){
        $('#loader img').detach();
        });

});
</script>
    </head>
        
      


<body>
<div id="loader" class=""></div>
</body>

    </body>
</html>
