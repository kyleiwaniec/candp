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
        <title>Animate on hover - copy &amp; paste generation</title>

        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
            <script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
    		<![endif]--> 

        <meta name="description" content="jQuery rollover animation effect, including image preloading php script.">
        <meta name="author" content="Kyle Hamilton">


        <!--<link rel="stylesheet" href="css/styles2.css"/>  you dont need this -->

        <style>
            ul#portfolio { margin:0; padding:0; }
            ul#portfolio li { float:left; margin:0 5px 0 0; width:250px; height:250px; list-style:none; }
            ul#portfolio li.loading { background: url(..images/loading.gif) no-repeat center center; }


        </style>



    </head>

    <body>
        <?php include_once("analyticstracking.php") ?>

        <div id="wrapper">

            <ul id="portfolio"></ul>
        </div><!-- #wrapper -->



        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>  
        <script>
            $(function () {
	// Image Sources
	var images = new Array();
		images[0] = 'http://farm4.static.flickr.com/3293/2805001285_4164179461_m.jpg';
		images[1] = 'http://farm4.static.flickr.com/3103/2801920553_656406f2dd_m.jpg';
		images[2] = 'http://farm4.static.flickr.com/3248/2802705514_b7a0ba55c9_m.jpg';
	// images length
	var max = $(images).length;
	// at least 1 image exist
	if(max>0)
	{
		// create the UL element
		var ul = $('<ul id="portfolio"></ul>');
		// append to div#wrapper
		$(ul).appendTo($('#wrapper'));
		// load the first image
		LoadImage(0,max);
	}

	// function of loading image
	// params: (int) index of image in array, (int) length of images array
	function LoadImage(index,max)
		{
			// if current index is lower then max element (max-1)
			if(index<max)
				{
					// create the LI, add loading class
					var list = $('<li id="portfolio_'+index+'"></li>').attr('class','loading');
					// append to UL
					$('ul#portfolio').append(list);
					// current LI
					var curr = $("ul#portfolio li#portfolio_"+index);
					// new image object
			        var img = new Image();
					// image onload
			        $(img).load(function () {
			            $(this).css('display','none'); // since .hide() failed in safari
			            $(curr).removeClass('loading').append(this);
			            $(this).fadeIn('slow',function(){
								// once the current loaded, trigger the next image
								LoadImage(index+1,max);
							});
			        }).error(function () {
						// on error remove current
						$(curr).remove();
						// trigger the next image
						LoadImage(index+1,max);
			        }).attr('src', images[index]);
				}
		}

});
    </script>
    </body>
</html>